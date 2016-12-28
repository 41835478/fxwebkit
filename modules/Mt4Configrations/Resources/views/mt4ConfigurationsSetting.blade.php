@extends('admin.layouts.main')
@section('title', trans('mt4configrations::mt4configrations.settings'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('mt4configrations::mt4configrations.group') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('mt4configrations::mt4configrations.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('mt4configrations::mt4configrations.group') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('mt4configrations::mt4configrations.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <h3 class="box-title m-b-0">{{ trans('mt4configrations::mt4configrations.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('mt4configrations::mt4configrations.tableDescription') }}</p>

                        <div class="panel-body">

                            <div class="panel-group" id="accordion-example">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                                           href="#collapseOne">
                                            {{ trans('mt4configrations::mt4configrations.apiAdminPassword') }}
                                        </a>
                                    </div>
                                    <!-- / .panel-heading -->
                                    <div id="collapseOne" class="panel-collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('mt4configrations::mt4configrations.apiAdminPassword') }}</label>
                                                        {!! Form::text('apiAdminPassword',$mt4ConfigurationsSetting['apiAdminPassword'],['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                                <!-- col-sm-6 -->
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
                                    value="0">{{ trans('mt4configrations::mt4configrations.save') }}</button>
                            </a>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->


        @stop
        @section('hidden')



    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('mt4configrations::mt4configrations.settings') }}</h1>
        </div>

        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('mt4configrations::mt4configrations.settings') }}</span>
            </div>

            <div class="panel-body">

                <div class="panel-group" id="accordion-example">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                               href="#collapseOne">
                                {{ trans('mt4configrations::mt4configrations.apiAdminPassword') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('mt4configrations::mt4configrations.apiAdminPassword') }}</label>
                                            {!! Form::text('apiAdminPassword',$mt4ConfigurationsSetting['apiAdminPassword'],['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
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
                    value="0">{{ trans('mt4configrations::mt4configrations.save') }}</button>
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