@extends('admin.layouts.main')
@section('title', trans('accounts.addAccount'))
@section('content')

{!! Form::open(['class'=>'panel form-horizontal']) !!}
<div class="panel-heading">
    <span class="panel-title">{{ trans('general.new_mt4_user') }}</span>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.name') }}</label>
                {!! Form::text('name',$userInfo['name'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.phone_password') }}</label>
                 {!! Form::password("phone_password",["class"=>"form-control","value"=>$userInfo['phone_password']]) !!}

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
                <label class="control-label">{{ trans('user.group') }}</label>
                {!! Form::text('group',$userInfo['group'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.status') }}</label>
                {!! Form::text('status',$userInfo['status'],['class'=>'form-control']) !!}
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
                <label class="control-label">{{ trans('user.id_number') }}</label>
                {!! Form::text('id_number',$userInfo['id_number'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.state') }}</label>
                {!! Form::text('state',$userInfo['state'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">

                <label class="control-label">{{ trans('user.Country') }}</label>
                {!! Form::select('country',$userInfo['country_array'],$userInfo['country'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>

            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.Phone') }}</label>
                {!! Form::text('Phone',$userInfo['Phone'],['class'=>'form-control']) !!}           
            </div>

            
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.City') }}</label>
                {!! Form::text('city',$userInfo['city'],['class'=>'form-control']) !!}           
            </div>
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.ZipCode') }}</label>
                {!! Form::text('zip_code',$userInfo['zip_code'],['class'=>'form-control']) !!}           
            </div>

        </div><!-- col-sm-6 -->

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
    <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $userInfo['edit_id']  or 0 }}">save</button>

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