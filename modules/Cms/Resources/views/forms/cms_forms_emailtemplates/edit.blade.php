@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit email templates</h1>
    <hr/>

    {!! Form::model($cms_forms_emailtemplate, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_emailtemplates', $cms_forms_emailtemplate->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', trans('Name'), ['class' => 'col-sm-12 ']) !!}
                <div class="col-sm-12">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


        <div class="form-group {{ $errors->has('admin_email') ? 'has-error' : ''}}">
            @if($templateType =='admin')
            {!! Form::label('name', trans('admin email'), ['class' => 'col-sm-12  ']) !!}
            @else

                {!! Form::label('name', trans('Email field name'), ['class' => 'col-sm-12  ']) !!}
                @endif
            <div class="col-sm-12">
                {!! Form::text('admin_email', null, ['class' => 'form-control']) !!}
                {!! $errors->first('admin_email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('template') ? 'has-error' : ''}}">
                {!! Form::label('template', trans('Template'), ['class' => 'col-sm-12 ']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('template', null, ['class' => 'form-control','id'=>'editor1']) !!}
                    {!! $errors->first('template', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-9 col-sm-3">


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

@section('script')
    @parent
    <script src="/cms_assets/ckeditor/ckeditor.js"></script>
    <script>
        //CKEDITOR.replace( textarea );
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: " {{ asset('/cms/articles/file-browser') }}",
            filebrowserUploadUrl: "{{ asset('/cms/articles/upload-image' ).'?_token='. csrf_token() }}"
        });
    </script>
    </div>

@endsection