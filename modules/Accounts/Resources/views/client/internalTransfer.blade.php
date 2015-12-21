@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<div class="page-header">
    <h1>{{ trans('accounts::accounts.internalTransfer') }}</h1>
</div>
{!! Form::open(['class'=>'panel form-horizontal']) !!}

<div class="panel-body">
    
 
    
     <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.login2') }}</label>
            {!! Form::password("login2",["class"=>"form-control","value"=>$internalTransfer['login2']]) !!}
        </div>
    </div><!-- col-sm-6 -->
    
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.amount') }}</label>
           {!! Form::text('amount',$internalTransfer['amount'],['class'=>'form-control']) !!}
        </div>
    </div><!-- col-sm-6 -->
    
    @if($Pssword==true)
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.oldPassword') }}</label>
            {!! Form::password("oldPassword",["class"=>"form-control","value"=>$internalTransfer['oldPassword']]) !!}
        </div>
    </div><!-- col-sm-6 -->


   
    @endif
</div>

<div class="panel-footer text-right">
    {!! Form::hidden('login',$login)!!}
    {!! Form::submit(trans('accounts::accounts.save'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
</div>

<div class="alert alert-danger alert-dark">
    @foreach($errors->all() as $key=>$error)
    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
    @endforeach
</div>

{!! Form::close() !!}
@stop