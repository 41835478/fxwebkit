@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<div class="page-header">
    <h1>{{ trans('general.addMt4User') }}</h1>
</div>
<div class="panel">
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel-heading">
        <span class="panel-title">{{ trans('accounts::accounts.user_details') }}</span>
    </div>

    <div class="panel-body">
        <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
            <li  >
                <a href="{{ route('client.addMt4User')}}">{{ trans('general.assign_existing_mt4') }}</a>
            </li>
            <li class="active">
                <a href="{{ route('client.addMt4UserFullDetails')}}" >{{ trans('general.create_new_mt4') }}</a>
            </li>
        </ul>
    </div>
    <div class="row">
        
         <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.leverage') }}</label>
                {!! Form::select('array_leverage',$array_leverage,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
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
                <label class="control-label">{{ trans('general.deposit') }}</label>
                {!! Form::select('array_deposit',$array_deposit,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
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
        
       
    </div><!-- row -->

    <div class="row">
        
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.investor') }}</label>
                {!! Form::password("investor",["class"=>"form-control","value"=>$mt4_user_details['password']]) !!}
            </div>
        </div><!-- col-sm-6 -->

       

      
    </div><!-- row -->

    

    <div class="row">
        
        
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