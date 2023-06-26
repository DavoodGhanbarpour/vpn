@extends('admin.layout.main')

@section('title', __('app.inbounds.inbounds'))

@section('actions')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <a href="{{ route('admin.servers.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 5l0 14"/>
                    <path d="M5 12l14 0"/>
                </svg>
                {{__('app.pageComponents.add') .' '. __('app.servers.server')}}
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table card-table table-vcenter datatable">
                    <thead>
                    <tr>
                        <th>
                            <button class="table-sort" data-sort="sort-index">{{__('app.pageComponents.index')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-title">{{__('app.servers.title')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-ip">{{__('app.servers.ip')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-date">{{__('app.servers.start_date')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-date">{{__('app.servers.end_date')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-description">{{__('app.servers.description')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-users-count">{{__('app.servers.subscription_price_per_month')}}</button>
                        </th>
                        <th>{{__('app.pageComponents.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($servers as $eachServer)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-title">{{$eachServer->title}}</td>
                                <td class="sort-ip">{{$eachServer->ip}}</td>
                                <td class="sort-date">
                                    {{convertDate($eachServer->start_date)}}
                                </td>
                                <td class="sort-date">
                                    {{convertDate($eachServer->end_date)}}
                                </td>
                                <td class="sort-description">
                                    {{$eachServer->description}}
                                </td>
                                <td class="sort-users-count">
                                    {{$eachServer->subscription_price_per_month}}
                                </td>
                                <td class="copy-parent">
                                    <div class="btn-list flex-nowrap">
                                        <x-buttons.edit :link="route('admin.servers.edit', ['inbound' => $eachServer->id])"/>
                                        <x-buttons.destroy :link="route('admin.servers.destroy', ['inbound' => $eachServer->id])"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('components.scripts.copy')
    @endpush

@endsection