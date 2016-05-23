@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit demo account</h1>
    <hr/>

    {!! Form::model($cms_forms_demoaccount, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_demoaccount', $cms_forms_demoaccount->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', trans('email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Firstname') ? 'has-error' : ''}}">
                {!! Form::label('Firstname', trans('Firstname'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Firstname', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Firstname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Lastname') ? 'has-error' : ''}}">
                {!! Form::label('Lastname', trans('Lastname'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Lastname', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Lastname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Mobilenumber') ? 'has-error' : ''}}">
                {!! Form::label('Mobilenumber', trans('Mobilenumber'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Mobilenumber', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Mobilenumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Country') ? 'has-error' : ''}}">
                {!! Form::label('Country', trans('Country'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Country', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Country', '<p class="help-block">:message</p>') !!}
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