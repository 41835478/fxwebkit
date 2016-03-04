@extends('admin.layouts.main')
@section('title', trans('general.settings'))
@section('content')

    <div class="page-header">
        <h1>{{ trans('general.settings') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('general.settings') }}</span>
        </div>


            <div class="panel-body">

                <div class="panel-group" id="accordion-example">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne">
                                {{ trans('general.liveServerConfig') }}
                            </a>
                        </div> <!-- / .panel-heading -->
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckHost') }}</label>
                                            {!! Form::text('mt4CheckHost',config('fxweb.mt4CheckHost'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckPort') }}</label>
                                            {!! Form::text('mt4CheckPort',config('fxweb.mt4CheckPort'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.name ') }}</label>
                                            {!! Form::text('liveServerName',config('fxweb.liveServerName'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .panel-body -->
                        </div> <!-- / .collapse -->
                    </div> <!-- / .panel -->

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseTwo">
                                {{ trans('general.demoServerConfig') }}
                            </a>
                        </div> <!-- / .panel-heading -->
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckDemoHost') }}</label>
                                            {!! Form::text('mt4CheckDemoHost',config('fxweb.mt4CheckDemoHost'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckDemoPort') }}</label>
                                            {!! Form::text('mt4CheckDemoPort',config('fxweb.mt4CheckDemoPort'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.name ') }}</label>
                                            {!! Form::text('demoServerName',config('fxweb.demoServerName'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .panel-body -->
                        </div> <!-- / .collapse -->
                    </div> <!-- / .panel -->

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseThree">
                                {{ trans('general.adminInformation') }}
                            </a>
                        </div> <!-- / .panel-heading -->
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.adminEmail') }}</label>
                                            {!! Form::text('adminEmail',config('fxweb.adminEmail'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                            </div> <!-- / .panel-body -->
                        </div> <!-- / .collapse -->
                    </div> <!-- / .panel -->
                </div> <!-- / .panel-group -->

            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dark">
                    @foreach($errors->all() as $key=>$error)
                        <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                    @endforeach

                </div>
            @endif
            <div class="panel-footer text-right">
                <a href="{{ route('accounts.detailsAccount') }}">
                    <button type="submit" class="btn btn-primary" name="edit_id"
                            value="0">{{ trans('general.save') }}</button>
                </a>

                {!! Form::close() !!}
            </div>
        </div>
        @stop
        @section("script")
            @parent
            <script>
                init.push(function () {
                    var options = {
                        format: "yyyy-mm-dd",
                        todayBtn: "linked",
                        orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
                    }

                    $('input[name="birthday"]').datepicker(options);

                });

                $('#jq-validation-select2').select2({
                    allowClear: true,
                    placeholder: 'Select a country...'
                }).change(function () {
                    $(this).valid();
                });

            </script>
@stop