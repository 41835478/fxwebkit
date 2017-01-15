@extends('admin.layouts.main')
@section('title', trans('user.edit_user'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('user.edit_user') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.settings') }}</a></li>
                        <li class="active">{{ trans('user.edit_user') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('user.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('user.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('user.tableDescription') }}</p>

                        <div class="panel-body">
                            {!! Form::open(['class'=>'panel form-horizontal']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.first_name') }}</label>
                                        {!! Form::text('first_name',$userInfo['first_name'],['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.last_name') }}</label>
                                        {!! Form::text('last_name',$userInfo['last_name'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.email') }}</label>
                                        {!! Form::text('email',$userInfo['email'],['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.ZipCode') }}</label>
                                        {!! Form::text('zip_code',$userInfo['zip_code'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.Nickname') }}</label>
                                        {!! Form::text('nickname',$userInfo['nickname'],['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.address') }}</label>
                                        {!! Form::text('address',$userInfo['address'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.BirthDay') }}</label>
                                        {!! Form::text('birthday',$userInfo['birthday'],['class'=>'form-control mydatepicker']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.Phone') }}</label>
                                        {!! Form::text('phone',$userInfo['phone'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.Country') }}</label>
                                        {!! Form::select('country',$userInfo['country_array'],$userInfo['country'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.City') }}</label>
                                        {!! Form::text('city',$userInfo['city'],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label " style="text-align: left;display: block;">{{ trans('user.gender') }}</label>
                                    <div class="radio-list">
                                        <label class="radio-inline p-0">
                                            <div class="radio radio-info">
                                                {!! Form::radio('gender',0,!$userInfo['gender'],['id'=>'gender_radio_0','class'=>'radio']) !!}
                                                <label for="gender_radio_0">{{ trans('user.male') }}</label>
                                            </div>
                                        </label>
                                        <label class="radio-inline">
                                            <div class="radio radio-info">
                                                {!! Form::radio('gender',1,$userInfo['gender'],['id'=>'gender_radio_1','class'=>'radio']) !!}
                                                <label for="gender_radio_1">{{ trans('user.female') }} </label>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                            <div class="panel-footer text-right">
                                <a href="{{ route('general.userDetails') }}">
                                    <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('user.save') }}</button></a>

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
    <h1>{{ trans('user.edit_user') }}</h1>
</div>


{!! Form::open(['class'=>'panel form-horizontal']) !!}


<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.first_name') }}</label>
                {!! Form::text('first_name',$userInfo['first_name'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.last_name') }}</label>
                {!! Form::text('last_name',$userInfo['last_name'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.email') }}</label>
                {!! Form::text('email',$userInfo['email'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.password') }}</label>


                {!! Form::password("password",["class"=>"form-control","value"=>$userInfo['password']]) !!}
            </div>
        </div><!-- col-sm-6 -->

    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.Nickname') }}</label>
                {!! Form::text('nickname',$userInfo['nickname'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.address') }}</label>
                {!! Form::text('address',$userInfo['address'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.BirthDay') }}</label>
                {!! Form::text('birthday',$userInfo['birthday'],['class'=>'form-control mydatepicker']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.Phone') }}</label>
                {!! Form::text('phone',$userInfo['phone'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">

                <label class="control-label">{{ trans('user.Country') }}</label>
                {!! Form::select('country',$userInfo['country_array'],$userInfo['country'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.City') }}</label>
                {!! Form::text('city',$userInfo['city'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
        </div>

        <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.ZipCode') }}</label>
                {!! Form::text('zip_code',$userInfo['zip_code'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->

        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label">Membership</label>
                <div class="radio-list">
                    <label class="radio-inline p-0">
                        <div class="radio radio-info">
                            <input type="radio" name="radio" id="radio1" value="option1">
                            <label for="radio1">Option 1</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="radio radio-info">
                            <input type="radio" name="radio" id="radio2" value="option2">
                            <label for="radio2">Option 2 </label>
                        </div>
                    </label>
                </div>
            </div>

            </div>
        </div>
    </div><!-- row -->
</div>
        {!!   View('admin/partials/messages')->with('errors',$errors) !!}


<div class="panel-footer text-right">
    <a href="{{ route('general.userDetails') }}">
        <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('user.save') }}</button></a>

    {!! Form::close() !!}
</div>
        </div>
@stop
@section('script')
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