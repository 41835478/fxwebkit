@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Create New Referring Partner</h1>
    <hr/>

    {!! Form::open(['url' => '/cms/cms_forms_referringpartner', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
                {!! Form::label('fullname', trans('cms::cms.fullname'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                {!! Form::label('mobile', trans('cms::cms.mobile'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', trans('cms::cms.email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('countryOfResidence') ? 'has-error' : ''}}">
                {!! Form::label('countryOfResidence', trans('cms::cms.countryOfResidence'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('countryOfResidence', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('countryOfResidence', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('countryOfTargetBroker') ? 'has-error' : ''}}">
                {!! Form::label('countryOfTargetBroker', trans('cms::cms.countryOfTargetBroker'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('countryOfTargetBroker', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('countryOfTargetBroker', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                {!! Form::label('message', trans('cms::cms.message'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
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