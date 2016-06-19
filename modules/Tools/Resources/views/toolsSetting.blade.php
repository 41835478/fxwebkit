@extends('admin.layouts.main')
@section('title', trans('tools::tools.settings'))
@section('content')

    @if (Session::get('refresh'))
        <script>window.location.reload();</script>
    @endif

    
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('tools::tools.settings') }}</h1>
        </div>

        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('tools::tools.settings') }}</span>
            </div>

            <div class="panel-body">

                <div class="panel-group" id="accordion-example">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                               href="#collapseOne">
                                {{ trans('tools::tools.clientSettings') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="panel-body">
                                <div class="row">


                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('is_client', 1,$toolsSetting['is_client'], ['class'=>'px','id'=>'is_client']) !!}
                                                <span class="lbl">{{ trans('tools::tools.is_client') }}</span>
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

                </div>
                <!-- / .panel-group -->

            </div>

            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
            <div class="panel-footer text-right">

                <button type="submit" class="btn btn-primary" name="edit_id"
                        value="0">{{ trans('tools::tools.save') }}</button>
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

                $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
                    $(this).valid();
                });

            </script>
        @stop

