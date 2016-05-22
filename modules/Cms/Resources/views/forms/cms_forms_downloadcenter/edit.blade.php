@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit Download Center</h1>
    <hr/>

    {!! Form::model($cms_forms_downloadcenter, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_downloadcenter', $cms_forms_downloadcenter->id],
        'class' => 'form-horizontal'
    ]) !!}

        <div class="form-group ">
            {!! Form::label('name', trans('name'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6 file">
                <div >
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
            {!! Form::label('file', trans('file'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6 file">
                <div >
                    {!! Form::text('file', null, ['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
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