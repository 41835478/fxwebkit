@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('accounts::accounts.addAccount') }}</h1>
        </div>
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.group_name') }}</label>
                        {!! Form::text('group_name',$massGroup['group_name'],['class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- row -->
        </div>



    @if($errors->any())
        <div class="alert alert-danger alert-dark">
            @foreach($errors->all() as $key=>$error)
                <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="id"
                value="{{ $massGroup['id']  or 0 }}">{{ trans('accounts::accounts.save') }}</button>
    </div>
</div>
    {!! Form::close() !!}
@stop
@section("script")
    @parent
@stop