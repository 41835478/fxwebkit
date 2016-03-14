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
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseOne">
                            {{ trans('general.liveServerConfig') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
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
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.name ') }}</label>
                                        {!! Form::text('liveServerName',config('fxweb.liveServerName'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / .panel-body -->
                    </div>
                    <!-- / .collapse -->
                </div>
                <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseTwo">
                            {{ trans('general.demoServerConfig') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
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
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.name ') }}</label>
                                        {!! Form::text('demoServerName',config('fxweb.demoServerName'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / .panel-body -->
                    </div>
                    <!-- / .collapse -->
                </div>
                <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseThree">
                            {{ trans('general.adminInformation') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.adminEmail') }}</label>
                                        {!! Form::text('adminEmail',config('fxweb.adminEmail'),['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->
                </div>
                <!-- / .panel-group -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseFour">
                            {{ trans('general.facebook') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.callback') }}</label>
                                        {!! Form::text('facebookLoginCallback',config('fxweb.facebookLoginCallback'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.provider') }}</label>
                                        {!! Form::text('facebookLoginProvider',config('fxweb.facebookLoginProvider'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.driver') }}</label>
                                        {!! Form::text('facebookLoginDriver',config('fxweb.facebookLoginDriver'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.identifier') }}</label>
                                        {!! Form::text('facebookLoginIdentifier',config('fxweb.facebookLoginIdentifier'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.app_id') }}</label>
                                        {!! Form::text('facebookLoginApp_id',config('fxweb.facebookLoginApp_id'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.secret') }}</label>
                                        {!! Form::text('facebookLoginSecret',config('fxweb.facebookLoginSecret'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseFive">
                            {{ trans('general.google') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.callback') }}</label>
                                        {!! Form::text('googleCallback',config('fxweb.googleCallback'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.provider') }}</label>
                                        {!! Form::text('googleProvider',config('fxweb.googleProvider'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('generaldriver') }}</label>
                                        {!! Form::text('googleDriver',config('fxweb.googleDriver'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.identifier') }}</label>
                                        {!! Form::text('googleIdentifier',config('fxweb.googleIdentifier'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.secret') }}</label>
                                        {!! Form::text('googleSecret',config('fxweb.googleSecret'),['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseSix">
                            {{ trans('general.linkedin') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.callback') }}</label>
                                        {!! Form::text('linkedinCallback',config('fxweb.linkedinCallback'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.provider') }}</label>
                                        {!! Form::text('linkedinProvider',config('fxweb.linkedinProvider'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.driver') }}</label>
                                        {!! Form::text('linkedinDriver',config('fxweb.linkedinDriver'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.identifier') }}</label>
                                        {!! Form::text('linkedinIdentifier',config('fxweb.linkedinIdentifier'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.secret') }}</label>
                                        {!! Form::text('linkedinSecret',config('fxweb.linkedinSecret'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    </div>







                        <div class="panel">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                                   href="#collapseSeven">
                                    {{ trans('general.webTrader') }}
                                </a>
                            </div>
                            <!-- / .panel-heading -->
                            <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body">



                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">{{ trans('general.LinkTradeForUser') }}</label>
                                                {!! Form::text('LinkTradeForUser',config('fxweb.LinkTradeForUser'),['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('EnableLinkTradeForUser', 1, config('fxweb.EnableLinkTradeForUser'), ['class'=>'px','id'=>'EnableLinkTradeForUser']) !!}
                                                    <span class="lbl">{{ trans('general.EnableLinkTradeForUser') }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                                       href="#collapseE">
                                        {{ trans('general.demo') }}
                                    </a>
                                </div>
                                <!-- / .panel-heading -->
                                <div id="collapseE" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class=" nav-input-div ">
                                                    <label class="control-label">{{ trans('general.demo') }}</label>
                                                    {!! Form::select('symbols',config('fxweb.demoArray'),'',['id'=>'symbolsMultiSelect','multiple'=>'multiple','class'=>'form-control']) !!}

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group no-margin-hr">

                                                    {!! Form::text('key',config('fxweb.key'),['placeholder'=>trans('general.key'),'class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group no-margin-hr">

                                                    {!! Form::text('value',config('fxweb.value'),['placeholder'=>trans('general.value'),'class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

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