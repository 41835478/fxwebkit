@extends('admin.layouts.main')
@section('title', trans('general.addMassGroup'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.addMassGroup') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.settings') }}</a></li>
                        <li class="active">{{ trans('general.addMassGroup') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('general.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('general.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('general.tableDescription') }}</p>

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('general.group_name') }}</label>
                                        {!! Form::text('group_name',$massGroup['group_name'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->




                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        <div class="panel-footer text-right">

                            <button type="submit" class="btn btn-primary" name="id"
                                    value="{{ $massGroup['id'] }}">{{ trans('general.save') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
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
            <h1>{{ trans('general.addMassGroup') }}</h1>
        </div>
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('general.group_name') }}</label>
                        {!! Form::text('group_name',$massGroup['group_name'],['class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- row -->
        </div>



        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">

        <button type="submit" class="btn btn-primary" name="id"
                value="{{ $massGroup['id'] }}">{{ trans('general.save') }}</button>
    </div>
</div>
    {!! Form::close() !!}
@stop
@section("script")
    @parent
@stop