@extends('admin.layouts.main')
@section('title', trans('general.settings'))
@section('content')

    @if (Session::get('refresh'))
        <script>window.location.reload();</script>
    @endif


    <div id="content-wrapper">
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
                                <hr>
                                {!! $editGroupLive !!}
                                <hr>
                                {!! $editDepositLive  !!}
                                <hr>
                                {!! $editleverage !!}


                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
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
                                <hr>
                                {!! $editGroupDemo !!}
                                <hr>
                                {!! $editDepositDemo  !!}
                                <hr>
                                {!! $editleverageDemo !!}
                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->





                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseDemoAccount">
                                {{ trans('general.demoAccountServer') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseDemoAccount" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.demoAccountHost') }}</label>
                                            {!! Form::text('demoAccountHost',config('fxweb.demoAccountHost'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.demoAccountPort') }}</label>
                                            {!! Form::text('demoAccountPort',config('fxweb.demoAccountPort'),['class'=>'form-control']) !!}
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
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

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.senderEmail') }}</label>
                                            {!! Form::text('senderEmail',config('fxweb.senderEmail'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.displayName') }}</label>
                                            {!! Form::text('displayName',config('fxweb.displayName'),['class'=>'form-control']) !!}
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
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

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('EnableFacebookRegister', 1, config('fxweb.EnableFacebookRegister'), ['class'=>'px','id'=>'EnableFacebookRegister']) !!}
                                                <span class="lbl">{{ trans('general.EnableFacebookRegister') }}</span>
                                            </label>
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
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
                                            <label class="control-label">{{ trans('general.driver') }}</label>
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

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('EnableGoogleRegister', 1, config('fxweb.EnableGoogleRegister'), ['class'=>'px','id'=>'EnableGoogleRegister']) !!}
                                                <span class="lbl">{{ trans('general.EnableGoogleRegister') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
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

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('EnableLinkedinRegister', 1, config('fxweb.EnableLinkedinRegister'), ['class'=>'px','id'=>'EnableLinkedinRegister']) !!}
                                                <span class="lbl">{{ trans('general.EnableLinkedinRegister') }}</span>
                                            </label>
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseEight">
                                {{ trans('general.layoutAssetsFolder') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.layoutAssetsFolder') }}</label>
                                            {!! Form::text('layoutAssetsFolder',config('fxweb.layoutAssetsFolder'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                <div class="panel-footer text-right">
                    <a href="{{ route('accounts.detailsAccount') }}">
                        <button type="submit" class="btn btn-primary" name="edit_id"
                                value="0">{{ trans('general.save') }}</button>
                    </a>
                </div>

            </div>
        </div>
    </div>

                {!! Form::close() !!}


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


        $('.dropDownEditAllDiv .add').click(function () {
            var arrayName = $(this).data('arrayname');
            console.log(arrayName);
            var key = $('#keyInput_' + arrayName).val();
            var value = $('#valueInput_' + arrayName).val();

            $('#select_' + arrayName).append('<option value="' + key + ',' + value + '" onclick="$(this).remove();">' + value + '</option>');
            $('.dropDownEditAllDiv  option').attr('selected', 'selected');
        });
        $('button[type="submit"],input[type="submit"]').click(function () {
            $('.dropDownEditAllDiv  option').attr('selected', 'selected');
        });


    </script>
@stop