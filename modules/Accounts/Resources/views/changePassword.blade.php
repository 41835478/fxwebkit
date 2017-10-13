@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.changePassword'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.changePassword') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.changePassword') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('accounts::accounts.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>

                        <div class="panel-body">
                            {!! Form::open(['class'=>'panel form-horizontal']) !!}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.password') }}</label>
                                        {!! Form::password('password',$userInfo['password'],['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.confirmPassword') }}</label>
                                        {!! Form::password('password_confirmation',$userInfo['password_confirmation'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                            <div class="panel-footer text-right">
                                <a href="{{ route('accounts.accountsList')}}">
                                    <button type="submit" class="btn btn-primary" name="edit_id"
                                            value="{{ $userInfo['account_id']}}">{{ trans('accounts::accounts.save') }}</button>
                                </a>
                            </div>
                            {!! Form::close() !!}
                        </div>
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
            <h1>{{ trans('accounts::accounts.changePassword') }}</h1>
        </div>

        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('accounts::accounts.changePassword') }}</span>
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.password') }}</label>

                            {!! Form::password('password',$userInfo['password'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.confirmPassword') }}</label>
                            {!! Form::password('password_confirmation',$userInfo['password_confirmation'],['class'=>'form-control']) !!}

                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
                <!-- row -->
                {!!   View('admin/partials/messages')->with('errors',$errors) !!}
            </div>




            <div class="panel-footer text-right">
                <a href="{{ route('accounts.accountsList')}}">
                    <button type="submit" class="btn btn-primary" name="edit_id"
                            value="{{ $userInfo['account_id']}}">{{ trans('accounts::accounts.save') }}</button>
                </a>
            </div>
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