@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit Career Center</h1>
    <hr/>

    {!! Form::model($cms_forms_careercenter, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_careercenter', $cms_forms_careercenter->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
                {!! Form::label('firstName', trans('firstName'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
                {!! Form::label('lastName', trans('lastName'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('jobApplyingFor') ? 'has-error' : ''}}">
                {!! Form::label('jobApplyingFor', trans('jobApplyingFor'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('jobApplyingFor', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('jobApplyingFor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Email') ? 'has-error' : ''}}">
                {!! Form::label('Email', trans('Email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CurrentBasicSalary') ? 'has-error' : ''}}">
                {!! Form::label('CurrentBasicSalary', trans('CurrentBasicSalary'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CurrentBasicSalary', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CurrentBasicSalary', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CoverLetter') ? 'has-error' : ''}}">
                {!! Form::label('CoverLetter', trans('CoverLetter'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CoverLetter', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CoverLetter', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('eligible') ? 'has-error' : ''}}">
                {!! Form::label('eligible', trans('eligible'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('eligible', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('eligible', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cv') ? 'has-error' : ''}}">
                {!! Form::label('cv', trans('cv'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('cv', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cv', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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