@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Create New contact us</h1>
    <hr/>

    {!! Form::open(['url' => '/cms/cms_forms_contactus', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
                {!! Form::label('firstName', trans('cms::cms.firstName'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
                {!! Form::label('lastName', trans('cms::cms.lastName'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('yourEmail') ? 'has-error' : ''}}">
                {!! Form::label('yourEmail', trans('cms::cms.yourEmail'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('yourEmail', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('yourEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mobileNumber') ? 'has-error' : ''}}">
                {!! Form::label('mobileNumber', trans('cms::cms.cms::cms.mobileNumber'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('mobileNumber', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mobileNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('priority') ? 'has-error' : ''}}">
                {!! Form::label('priority', trans('cms::cms.priority'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('priority', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
                {!! Form::label('department', trans('cms::cms.department'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('department', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                {!! Form::label('subject', trans('cms::cms.subject'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                {!! Form::label('message', trans('cms::cms.message'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('message', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
</div>
@endsection