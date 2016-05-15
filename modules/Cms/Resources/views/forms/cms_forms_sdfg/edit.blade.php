@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit sdfg</h1>
    <hr/>

    {!! Form::model($cms_forms_sdfg, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_sdfg', $cms_forms_sdfg->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('dsfg') ? 'has-error' : ''}}">
                {!! Form::label('dsfg', trans('dsfg'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('dsfg', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('dsfg', '<p class="help-block">:message</p>') !!}
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