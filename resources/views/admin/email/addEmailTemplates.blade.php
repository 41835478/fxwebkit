@extends('admin.layouts.main')
@section('content')
{{--*/ $dCounter = 0 /*--}}

<div class="page-header">
    <div class="page-title">
        <h1>{{ trans('general.emailTemplates') }}</h1>
    </div>
</div>

{!! Form::open(array('method'=>'get','id'=>'showTemplateForm')) !!}
<fieldset>
    
        <div class="well">

            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.template') }}</label>
                    {!! Form::select('name', $aTemplates, $sTemplate, array('class' => ' form-control', 'id' => 'template-name','onchange'=>'$("#showTemplateForm").submit()')) !!}
                
                </div>
            </div><!-- col-sm-6 -->

            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.language') }}</label>
                   {!! Form::select('lang', $aLanguages, $sLanguage, array('class' => 'form-control', 'id' => 'template-language','onchange'=>'$("#showTemplateForm").submit()')) !!}
                
                </div>
            </div><!-- col-sm-6 -->

            {!! Form::close() !!}
            <div style='clear:both'></div>
            @if ($sContent)
            {!! Form::open(array('class'=>'form-horizontal')) !!}
            <div class="well body">
                {!! Form::textarea('template_body', $sContent, array('id'=>'editor1','class' => 'form-control ckeditor')) !!}
            </div>
            <div class="form-actions align-right">
                {!! Form::hidden('name',$sTemplate) !!}
                {!! Form::hidden('lang',$sLanguage) !!}
                {!! Form::submit(trans('general.save'), array('class'=>'btn btn-primary btn-flat')) !!}
            </div>

            {!! Form::close() !!}
            @endif
        </div>
    </div>
</fieldset>
@stop
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
@stop