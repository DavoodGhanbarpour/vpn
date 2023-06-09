@extends('admin.layout.main')

@section('title', __('app.pageComponents.add') .' '. __('app.servers.server'))

@section('content')

    <form action="{{ route('admin.servers.store') }}" method="POST" class="card">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.title')}}</label>
                    <div>
                        <input type="text" name="title" class="form-control" placeholder="{{__('app.general.title')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.start_date')}}</label>
                    <div>
                        <input type="text" name="start_date" class="form-control datepicker"
                               placeholder="{{__('app.general.start_date')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.end_date')}}</label>
                    <div>
                        <input type="text" name="end_date" class="form-control datepicker"
                               placeholder="{{__('app.general.end_date')}}">
                    </div>
                </div>



                <div class="col-md-4" id="twoInputsParent">
                    <div class="row">

                        <div class="col-md-12 mb-3" id="inputParent">
                            <label class="form-label required">{{__('app.general.ip')}}</label>
                            <div>
                                <input type="text" name="ip" class="form-control" placeholder="{{__('app.general.ip')}}">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label required">{{__('app.general.subscription_price')}}</label>
                            <div>
                                <input type="text" name="subscription_price" class="form-control number_format"
                                    placeholder="{{__('app.general.subscription_price')}}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{__('app.general.description')}}</label>
                            <div>
                                <textarea id="textarea" name="description" rows="4" class="form-control resize-none"
                                    placeholder="{{__('app.general.description')}}">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer text-end">
            <div class="d-flex">
                <x-buttons.cancel/>
                <x-buttons.submit/>
            </div>
        </div>

    </form>

    @include('components.libs.pwt-datepicker')

    @push('scripts')
        <script>
            $(document).ready(adjustTextareaHeight);
            function adjustTextareaHeight() {
                let height = Math.round(($('#inputParent').height() * 2) - $('#inputParent label').height() + 8);
                console.log('height', height);
                $('#textarea').css('height', `${height}px`)
            }
        </script>
    @endpush

@endsection
