@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.settings'))
@section('content')

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


                            <div class="col-sm-6">
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
                    value="0">{{ trans('accounts::accounts.save') }}</button>
        </a>

        {!! Form::close() !!}
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

        $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });

    </script>
@stop