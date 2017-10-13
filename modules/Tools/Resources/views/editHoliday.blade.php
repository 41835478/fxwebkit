    @extends('admin.layouts.main')
    @section('title', trans('tools::tools.addContract'))
    @section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{ trans('tools::tools.futureContract') }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">{{ trans('tools::tools.ModuleTitle') }}</a></li>
                            <li class="active">{{ trans('tools::tools.futureContract') }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <form role="search" class="app-search hidden-xs pull-right">
                            <input type="text" placeholder=" {{ trans('tools::tools.search') }} ..." class="form-control">
                            <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">

                            {!! Form::open(['class'=>'panel form-horizontal']) !!}

                            <h3 class="box-title m-b-0">{{ trans('tools::tools.tableHead') }}</h3>
                            <p class="text-muted m-b-20">{{ trans('tools::tools.tableDescription') }}</p>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('tools::tools.name') }}</label>
                                            {!! Form::text('name',$holidayInfo['name'],['class'=>'form-control','id'=>'nameInput']) !!}
                                        </div>
                                    </div><!-- col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('tools::tools.start_date') }}</label>
                                            {!! Form::text('start_date',$holidayInfo['start_date'],['class'=>'form-control mydatepicker']) !!}
                                        </div>
                                    </div><!-- col-sm-6 -->

                                </div><!-- row -->



                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('tools::tools.end_date') }}</label>
                                            {!! Form::text('end_date',$holidayInfo['end_date'],['class'=>'form-control mydatepicker']) !!}

                                        </div>
                                    </div><!-- col-sm-6 -->
                                </div><!-- row -->


                            </div>
                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                            <div class="panel-footer text-right">
                                <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $holidayInfo['id']  or 0 }}">{{ trans('tools::tools.save') }}</button>
                            </div>
                        </div>
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
        <h1>{{ trans('tools::tools.add_holiday') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}


    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.name') }}</label>
                    {!! Form::text('name',$holidayInfo['name'],['class'=>'form-control','id'=>'nameInput']) !!}
                </div>
            </div><!-- col-sm-6 -->

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.start_date') }}</label>
                    {!! Form::text('start_date',$holidayInfo['start_date'],['class'=>'form-control']) !!}
                </div>
            </div><!-- col-sm-6 -->

        </div><!-- row -->



        <div class="row">

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.end_date') }}</label>
                    {!! Form::text('end_date',$holidayInfo['end_date'],['class'=>'form-control']) !!}

                </div>
            </div><!-- col-sm-6 -->
        </div><!-- row -->


    </div>
            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $holidayInfo['id']  or 0 }}">{{ trans('tools::tools.save') }}</button>
    </div>
</div>
    {!! Form::close() !!}
    @stop
    @section("script")
    @parent
    <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">
    <script src="/assets/js/autoCompleteInput.js"></script>
    <script>
        init.push(function () {
        var options = {
        format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }

        $('input[name="end_date"],input[name="start_date"]').datepicker(options);
        });

    </script>
    @stop