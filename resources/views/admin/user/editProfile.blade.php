@extends('admin.layouts.main')
@section('title', trans('accounts.addAccount'))
@section('content')

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
                <label class="control-label">{{ trans('user.Email') }}</label>
                {!! Form::text('email',$userInfo['email'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.Password') }}</label>
                {!! Form::password('password',['class'=>'form-control','value'=>$userInfo['password']]) !!}

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
                <label class="control-label">{{ trans('user.Birthday') }}</label>
                {!! Form::text('birthday',$userInfo['birthday'],['class'=>'form-control']) !!}
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
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.ZipCode') }}</label>
                {!! Form::text('zip_code',$userInfo['zip_code'],['class'=>'form-control']) !!}           
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <label class="control-label " style="text-align: left;display: block;">{{ trans('user.gender') }}</label>
            <div class="radio col-xs-2">
                <label class='gender_radio_0'>
                    {!! Form::radio('gender', 0,!$userInfo['gender'],['id'=>'gender_radio_0','class'=>'px']) !!}
                    <span class="lbl">{{ trans('user.male') }}</span>
                </label>
            </div>
            <div class="radio col-xs-2">
                <label class='gender_radio_1'>

                    {!! Form::radio('gender',1,$userInfo['gender'],['id'=>'gender_radio_1','class'=>'px']) !!}
                    <span class="lbl">{{ trans('user.female') }}</span>
                </label>
            </div>
        </div>
    </div><!-- row -->
</div>
@if($errors->any())
<div class="alert alert-danger alert-dark">
    @foreach($errors->all() as $key=>$error)
    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
    @endforeach

</div>
@endif
<div class="panel-footer text-right">
    <a href="{{ route('admin.users.profile')}}">
        <button type="submit" class="btn btn-primary" name="edit_id" >{{ trans('general.save') }}</button></a>
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