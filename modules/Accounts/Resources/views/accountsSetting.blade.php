@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.settings'))
@section('content')

    @if (Session::get('refresh'))
        <script>window.location.reload();</script>
    @endif

    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('accounts::accounts.settings') }}</h1>
        </div>


        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('accounts::accounts.settings') }}</span>
        </div>

        <div class="panel-body">

            <div class="panel-group" id="accordion-example">
                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseOne">
                            {{ trans('accounts::accounts.clientSettings') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseOne" class="panel-collapse in">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('is_client', 1, $accountsSetting['is_client'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.is_client') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>




<hr>
                            <div class="row">
                                <div><span>{{trans('general.selectVisibleTabs')}}</span></div>

                            @foreach(config('accounts.client_menu') as $index=>$tab)
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('client_menu_display['.$index.']', 1,$tab['display'], ['class'=>'px','id'=>'tab'.$tab['title']]) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.'.$tab['title']) }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach

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
                            {{ trans('accounts::accounts.denyLiveAccount') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('denyLiveAccount', 1, $accountsSetting['denyLiveAccount'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.denyLiveAccount') }}</span>
                                        </label>
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
                            {{ trans('accounts::accounts.operationsSettings') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('showMt4Leverage', 1, $accountsSetting['showMt4Leverage'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.showMt4Leverage') }}</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- col-sm-6 -->


                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('showMt4ChangePassword', 1, $accountsSetting['showMt4ChangePassword'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.showMt4ChangePassword') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('allowTransferToUnsignedMT4', 1, $accountsSetting['allowTransferToUnsignedMT4'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.allowTransferToUnsignedMT4') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('showMt4Transfer', 1, $accountsSetting['showMt4Transfer'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.showMt4Transfer') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->


                            </div>

                            <hr>
                            <div class="row">


                                <div class="col-sm-6" style="display: none;">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('directOrderToMt4Server', 1, $accountsSetting['directOrderToMt4Server'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.directOrderToMt4Server') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('showWithDrawal', 1, $accountsSetting['showWithDrawal'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.showWithDrawal') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <hr>

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.changeLeverageWarning') }}</label>
                                        {!! Form::text('changeLeverageWarning',config('accounts.changeLeverageWarning'),['class'=>'form-control']) !!}

                                    </div>
                                </div>
                            </div>

                            <!-- row -->
                        </div>
                        <!-- / .panel-body -->
                    </div>
                    <!-- / .collapse -->
                </div>
                <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseOperations1">
                            {{ trans('accounts::accounts.operationsForwardSettings') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseOperations1" class="panel-collapse collapse">
                        <div class="panel-body">


                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('directLeverageOrderToMt4Server', 1, $accountsSetting['directLeverageOrderToMt4Server'], ['class'=>'px','id'=>'directLeverageOrderToMt4Server']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.directLeverageOrderToMt4Server') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('directChangePasswordOrderToMt4Server', 1, $accountsSetting['directChangePasswordOrderToMt4Server'], ['class'=>'px','id'=>'directChangePasswordOrderToMt4Server']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.directChangePasswordOrderToMt4Server') }}</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- col-sm-6 -->
                            </div>
                            <hr>
                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('directTransferOrderToMt4Server', 1, $accountsSetting['directTransferOrderToMt4Server'], ['class'=>'px','id'=>'directTransferOrderToMt4Server']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.directTransferOrderToMt4Server') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('directLiveAccountOrderToMt4Server', 1, $accountsSetting['directLiveAccountOrderToMt4Server'], ['class'=>'px','id'=>'directLiveAccountOrderToMt4Server']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.directLiveAccountOrderToMt4Server') }}</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- col-sm-6 -->
                            </div>
                            <hr>
                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('directWithDrawalOrderToMt4Server', 1, $accountsSetting['directWithDrawalOrderToMt4Server'], ['class'=>'px','id'=>'directWithDrawalOrderToMt4Server']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.directWithDrawalOrderToMt4Server') }}</span>
                                        </label>
                                    </div>
                                </div>


                                <!-- col-sm-6 -->
                            </div>
                            <hr>


                            <!-- row -->
                        </div>
                        <!-- / .panel-body -->
                    </div>
                    <!-- / .collapse -->
                </div>
                <!-- / .panel -->


                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseFour">
                            {{ trans('accounts::accounts.apiSettings') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">

                                <!-- col-sm-6 -->

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.apiMasterPassword') }}</label>
                                        {!! Form::text('apiMasterPassword',config('accounts.apiMasterPassword'),['class'=>'form-control']) !!}

                                    </div>
                                </div>

                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->
                            <hr>
                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('apiReqiredConfirmMt4Password', 1, $accountsSetting['apiReqiredConfirmMt4Password'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('accounts::accounts.apiReqiredConfirmMt4Password') }}</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <!-- col-sm-6 -->
                        </div>
                        <!-- row -->
                    </div>
                    <!-- / .panel-body -->
                </div>
                <!-- / .collapse -->
            </div>
            <!-- / .panel -->
        </div>
        <!-- / .panel-group -->
        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
        <div class="panel-footer text-right">
            <a href="{{ route('accounts.detailsAccount') }}">
                <button type="submit" class="btn btn-primary" name="edit_id"
                        value="0">{{ trans('accounts::accounts.save') }}</button>
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

        $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });

    </script>
@stop