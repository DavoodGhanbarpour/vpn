<?php

namespace App\Http\Controllers\Admin;

use App\Facades\InvoiceFacade;
use App\Facades\UserFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssignInboundsRequest;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Inbound;
use App\Models\Server;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        UserFacade::upsert($request->validated());

        return redirect()->route('admin.users.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.users.index', [
            'users' => User::withCount('activeSubscriptions')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.pages.users.edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        if (UserFacade::isEmailUnique($request->get('email'), [$user->email])) {
            return back()->withErrors([
                __('validation.exists', ['attribute' => $request->get('email')]),
            ]);
        }

        $inputs = $request->validated();
        if (!isset($inputs['password'])) {
            unset($inputs['password']);
        }

        UserFacade::upsert($inputs, $user->id);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        UserFacade::delete($id);

        return redirect()->route('admin.users.index');
    }

    public function inbounds(User $user)
    {
        $result = [];
        foreach (Inbound::withCount('activeSubscriptions')->with('server')->get() as $key => $each) {
            $result[$key] = $each;
            $result[$key]->subscription_data = $each->activeSubscriptions()
                ->whereIn('inbound_id', $user->activeSubscriptions()->pluck('inbound_id'))
                ->first()
                ?->pivot ?: null;
        }

        return view('admin.pages.users.inbounds', [
            'user' => $user,
            'inbounds' =>
                collect($result)->sortBy('subscription_data', SORT_REGULAR, true),
            'servers' => Server::all()
        ]);
    }


    public function invoices(User $user)
    {
        return view('admin.pages.users.invoices', [
            'invoices' => $user->invoices,
            'user' => $user
        ]);
    }

    public function subscriptions(User $user)
    {
        return view('admin.pages.users.subscriptions', [
            'subscriptions' => $user->inbounds,
            'user' => $user
        ]);
    }

    public function assignInbounds(AssignInboundsRequest $request, User $user): RedirectResponse
    {
        $data = collect($request->get('inbounds'))->map(function ($item, $key) {
            if ($item['subscription_price']) {
                $item['subscription_price'] = removeSeparator($item['subscription_price']);
            }
            return $item;
        });

        $user->inbounds()->with('activeSubscriptions')->sync($data ?: []);

        InvoiceFacade::deletePreviousDebitInvoices($user->id);

        $user->inbounds->map(function ($inbound) {
            if (Carbon::parse($inbound->pivot->end_date)->gte(now()))
                InvoiceFacade::sendDebit($inbound->pivot->id);
        });
        return redirect()->route('admin.users.index');
    }
}
