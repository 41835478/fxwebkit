@extends('admin.layouts.main')
@section('content')
    {{--*/ $dCounter = 0 /*--}}

    <div class="page-header">
        <div class="page-title">
            <h1>{{ trans('general.massMailler') }}</h1>
        </div>
    </div>
<div class="panel">
 
    <div class="panel-heading">
        <span class="panel-title">{{ trans('general.massMailler') }}</span>
    </div>
    
    {!! Form::open(array('method'=>'get','id'=>'showTemplateForm')) !!}
    <fieldset>

        <div class="well">

            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.template') }}</label>
                    {!! Form::select('templateId', $aTemplates, $templateId, array('class' => ' form-control', 'id' => 'template-name','onchange'=>'$("#showTemplateForm").submit()')) !!}

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

                {!! Form::open(array('class'=>'form-horizontal')) !!}


<div class="col-xm-12">
                <div class="form-group no-margin-hr  body">
                    <label class="control-label">{{ trans('general.subject') }}</label>
                    {!! Form::text('subject', $subject, ['class' => ' form-control']) !!}
                </div>
        </div>



            <div class="well body">
                    {!! Form::textarea('template_body', $sContent, array('id'=>'editor1','class' => 'form-control ckeditor')) !!}
                </div>
                <div class="form-actions align-right">


                    {!! Form::submit(trans('general.save'), array('name'=>'save', 'class'=>'btn btn-primary btn-flat')) !!}
                    {!! Form::submit(trans('general.saveAndSend'), array('name'=>'saveSend', 'class'=>'btn btn-primary btn-flat')) !!}
                    {!! Form::submit(trans('general.send'), array('name'=>'send', 'class'=>'btn btn-primary btn-flat')) !!}
                </div>
            {!! Form::hidden('templateId', $templateId) !!}
            {!! Form::hidden('lang', $sLanguage) !!}
            {!! Form::close() !!}

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