@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit currency convertor</h1>
    <hr/>

    {!! Form::model($cms_forms_currencyconvertor, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_currencyconvertor', $cms_forms_currencyconvertor->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
                {!! Form::label('from', trans('from'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('from', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('to') ? 'has-error' : ''}}">
                {!! Form::label('to', trans('to'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('to', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('to', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                {!! Form::label('amount', trans('amount'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
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