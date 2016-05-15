@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit bbbbb</h1>
    <hr/>

    {!! Form::model($cms_forms_bbbbb, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_bbbbb', $cms_forms_bbbbb->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('bbbb') ? 'has-error' : ''}}">
                {!! Form::label('bbbb', trans('bbbb'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('bbbb', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('bbbb', '<p class="help-block">:message</p>') !!}
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