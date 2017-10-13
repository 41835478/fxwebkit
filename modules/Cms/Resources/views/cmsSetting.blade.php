@extends('admin.layouts.main')
@section('title', trans('cms::cms.settings'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.settings') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.settings') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        {!! Form::open(['class'=>'panel form-horizontal']) !!}
                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>

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


                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        <div class="panel-footer text-right">

                            <button type="submit" class="btn btn-primary" name="edit_id"
                                    value="0">{{ trans('ibportal::ibportal.save') }}</button>
                            </a>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
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
            @section('hidden')

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