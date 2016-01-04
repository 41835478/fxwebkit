@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<div class="page-header">
		<h1>{{ trans('accounts::accounts.addAccount') }}</h1>
	</div>
{!! Form::open(['class'=>'panel form-horizontal']) !!}
<div class="panel-body">
    
    <div class="table-info">
                <ul id="profile-tabs" class="nav nav-tabs">
                    <li >
                        <a href="{{ route('client.addMt4User')}}">{{ trans('general.exiest') }}</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('client.addMt4UserFullDetails')}}" >{{ trans('general.mt4UserDetilails') }}</a>
                    </li>  
                </ul>
            </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.name ') }}</label>
                {!! Form::text('first_name',$mt4_user_details['first_name'].' '.$mt4_user_details['last_name'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.group') }}</label>
               {!! Form::select('array_group',$array_group,'',['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.Email') }}</label>
                {!! Form::text('email',$mt4_user_details['email'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        
         <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.Password') }}</label>
                {!! Form::password("password",["class"=>"form-control","value"=>$mt4_user_details['password']]) !!}

            </div>
        </div><!-- col-sm-6 -->
       
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.deposit') }}</label>
               {!! Form::select('array_deposit',$array_deposit,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.address') }}</label>
                {!! Form::text('address',$mt4_user_details['address'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        
        <div class="col-sm-6">
             <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.leverage') }}</label>
                 {!! Form::select('array_leverage',$array_leverage,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
       
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.Phone') }}</label>
                {!! Form::text('phone',$mt4_user_details['phone'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">

                <label class="control-label">{{ trans('accounts::accounts.Country') }}</label>
                {!! Form::select('country',$mt4_user_details['country_array'],$mt4_user_details['country'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.City') }}</label>
                {!! Form::text('city',$mt4_user_details['city'],['class'=>'form-control']) !!}           
            </div>
            
        </div><!-- col-sm-6 -->
    </div>
          
     <div class="row">
        <div class="col-sm-6">
             <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.ZipCode') }}</label>
                {!! Form::text('zip_code',$mt4_user_details['zip_code'],['class'=>'form-control']) !!}           
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.investor') }}</label>
                {!! Form::password("investor",["class"=>"form-control","value"=>$mt4_user_details['password']]) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div>   
</div>
@if($errors->any())
<div class="alert alert-danger alert-dark">
    @foreach($errors->all() as $key=>$error)
    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
    @endforeach
</div>
@endif
<div class="panel-footer text-right">
    <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $mt4_user_details['edit_id']  or 0 }}">{{ trans('accounts::accounts.submit') }}</button>
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