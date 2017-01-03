@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.edit_account'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.edit_account') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.edit_account') }}</li>
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

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.first_name') }}</label>
                                        {!! Form::text('first_name',$userInfo['first_name'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.last_name') }}</label>
                                        {!! Form::text('last_name',$userInfo['last_name'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.Email') }}</label>
                                        {!! Form::text('email',$userInfo['email'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.Password') }}</label>
                                        {!! Form::password("password",["class"=>"form-control","value"=>$userInfo['password']]) !!}

                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.Nickname') }}</label>
                                        {!! Form::text('nickname',$userInfo['nickname'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.address') }}</label>
                                        {!! Form::text('address',$userInfo['address'],['class'=>'form-control']) !!}

                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.Birthday') }}</label>
                                        {!! Form::text('birthday',$userInfo['birthday'],['class'=>'form-control mydatepicker']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.Phone') }}</label>
                                        {!! Form::text('phone',$userInfo['phone'],['class'=>'form-control']) !!}

                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">

                                        <label class="control-label">{{ trans('accounts::accounts.Country') }}</label>
                                        {!! Form::select('country',$userInfo['country_array'],$userInfo['country'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.City') }}</label>
                                        {!! Form::text('city',$userInfo['city'],['class'=>'form-control']) !!}
                                    </div>

                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.ZipCode') }}</label>
                                        {!! Form::text('zip_code',$userInfo['zip_code'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <label class="control-label "
                                           style="text-align: left;display: block;">{{ trans('accounts::accounts.gender') }}</label>

                                    <div class="radio-list">
                                        <label class="radio-inline p-0">
                                            <div class="radio radio-info">
                                                {!! Form::radio('gender',0,!$userInfo['gender'],['id'=>'gender_radio_0','class'=>'radio']) !!}
                                                <label for="gender_radio_0">{{ trans('accounts::accounts.male') }}</label>
                                            </div>
                                        </label>
                                        <label class="radio-inline">
                                            <div class="radio radio-info">
                                                {!! Form::radio('gender',1,$userInfo['gender'],['id'=>'gender_radio_1','class'=>'radio']) !!}
                                                <label for="gender_radio_1">{{ trans('accounts::accounts.female') }} </label>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        <div class="panel-footer text-right">
                            <a href="{{ route('accounts.detailsAccount') }}">
                                <button type="submit" class="btn btn-primary" name="edit_id"
                                        value="{{ $userInfo['edit_id']}}">{{ trans('accounts::accounts.save') }}</button>
                            </a>

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
            <h1>{{ trans('accounts::accounts.edit_account') }}</h1>
        </div>


        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('accounts::accounts.edit_account') }}</span>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.first_name') }}</label>
                            {!! Form::text('first_name',$userInfo['first_name'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.last_name') }}</label>
                            {!! Form::text('last_name',$userInfo['last_name'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.Email') }}</label>
                            {!! Form::text('email',$userInfo['email'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.Password') }}</label>
                            {!! Form::password("password",["class"=>"form-control","value"=>$userInfo['password']]) !!}

                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.Nickname') }}</label>
                            {!! Form::text('nickname',$userInfo['nickname'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.address') }}</label>
                            {!! Form::text('address',$userInfo['address'],['class'=>'form-control']) !!}

                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.Birthday') }}</label>
                            {!! Form::text('birthday',$userInfo['birthday'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.Phone') }}</label>
                            {!! Form::text('phone',$userInfo['phone'],['class'=>'form-control']) !!}

                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">

                            <label class="control-label">{{ trans('accounts::accounts.Country') }}</label>
                            {!! Form::select('country',$userInfo['country_array'],$userInfo['country'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.City') }}</label>
                            {!! Form::text('city',$userInfo['city'],['class'=>'form-control']) !!}
                        </div>

                    </div>
                    <!-- col-sm-6 -->
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.ZipCode') }}</label>
                            {!! Form::text('zip_code',$userInfo['zip_code'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <label class="control-label "
                               style="text-align: left;display: block;">{{ trans('accounts::accounts.gender') }}</label>

                        <div class="radio col-xs-2">
                            <label class='gender_radio_0'>
                                {!! Form::radio('gender', 0,!$userInfo['gender'],['id'=>'gender_radio_0','class'=>'px']) !!}
                                <span class="lbl">{{ trans('accounts::accounts.male') }}</span>
                            </label>
                        </div>
                        <div class="radio col-xs-2">
                            <label class='gender_radio_1'>

                                {!! Form::radio('gender',1,$userInfo['gender'],['id'=>'gender_radio_1','class'=>'px']) !!}
                                <span class="lbl">{{ trans('accounts::accounts.female') }}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
            <div class="panel-footer text-right">
                <a href="{{ route('accounts.detailsAccount') }}">
                    <button type="submit" class="btn btn-primary" name="edit_id"
                            value="{{ $userInfo['edit_id']}}">{{ trans('accounts::accounts.save') }}</button>
                </a>

                {!! Form::close() !!}
            </div>
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

                $('#jq-validation-select2').select2({
                    allowClear: true,
                    placeholder: 'Select a country...'
                }).change(function () {
                    $(this).valid();
                });

            </script>
@stop