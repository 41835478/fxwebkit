@extends('admin.layouts.main')
@section('title', trans('cms::cms.settings'))
@section('content')

    @if (Session::get('refresh'))
        <script>window.location.reload();</script>
    @endif

    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('cms::cms.settings') }}</h1>
        </div>

        <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('cms::cms.settings') }}</span>
        </div>

        <div class="panel-body">

            <div class="panel-group" id="accordion-example">
                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseOne">
                            {{ trans('cms::cms.themeSettings') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseOne" class="panel-collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('cms::cms.asset_folder') }}</label>
                                        {!! Form::text('asset_folder',config('cms.asset_folder'),['class'=>'form-control']) !!}
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('cms::cms.admin_theme') }}</label>
                                        {!! Form::text('admin_theme',config('cms.admin_theme'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('cms::cms.theme_folder') }}</label>
                                        {!! Form::text('theme_folder',config('cms.theme_folder'),['class'=>'form-control']) !!}
                                    </div>
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


            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
        <div class="panel-footer text-right">

            <button type="submit" class="btn btn-primary" name="edit_id"
                    value="0">{{ trans('cms::cms.save') }}</button>
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