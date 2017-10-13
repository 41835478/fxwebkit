@extends('admin.layouts.main')
@section('title', trans('request::request.changePassword'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('request::request.internalTransfer') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('request::request.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('request::request.internalTransfer') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('request::request.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <h3 class="box-title m-b-0">{{ trans('request::request.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('request::request.tableDescription') }}</p>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('request::request.comment') }}</label>
                                        {!! Form::text('comment',$changePassword['comment'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- row -->


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('request::request.reason') }}</label>
                                        {!! Form::text('reason',$changePassword['reason'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">

                                        <label class="control-label">{{ trans('request::request.status') }}</label>
                                        {!! Form::select('status',$changePassword['status_array'],$changePassword['status'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                                    </div>
                                </div><!-- col-sm-6 -->
                            </div>
                        </div>
                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        <div class="panel-footer text-right">

                            {!! Form::hidden('logId', $changePassword['logId'])  !!}
                            <button type="submit" class="btn btn-primary" name="save"
                                    value="">{{ trans('request::request.save') }}</button>
                            <button type="submit" class="btn btn-primary" name="saveAndSend"
                                    value="">{{ trans('request::request.saveAndSend') }}</button>
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
        <h1>{{ trans('request::request.changePassword') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('request::request.comment') }}</label>
                    {!! Form::text('comment',$changePassword['comment'],['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('request::request.reason') }}</label>
                    {!! Form::text('reason',$changePassword['reason'],['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <!-- row -->

        <div class="row">
        <div class="col-sm-12">
            <div class="form-group no-margin-hr">

                <label class="control-label">{{ trans('request::request.status') }}</label>
                {!! Form::select('status',$changePassword['status_array'],$changePassword['status'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div>
    </div>
        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="logId"
                value="{{ $changePassword['logId']}}">{{ trans('request::request.save') }}</button>

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

        $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });

    </script>
@stop