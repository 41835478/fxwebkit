@extends('admin.layouts.main')
@section('content')
    {{--*/ $dCounter = 0 /*--}}
    <div id="content-wrapper">
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
                <div class="panel-body">
                    <div class="well">

                        <div class="col-sm-12">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('general.template') }}</label>
                                {!! Form::select('templateId', $aTemplates, $templateId, array('class' => ' form-control', 'id' => 'template-name','onchange'=>'$("#showTemplateForm").submit()')) !!}

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('general.language') }}</label>
                                {!! Form::select('lang', $aLanguages, $sLanguage, array('class' => 'form-control', 'id' => 'template-language','onchange'=>'$("#showTemplateForm").submit()')) !!}

                            </div>
                        </div>

                        {!! Form::close() !!}


                        {!! Form::open(array('class'=>'form-horizontal')) !!}


                        <div class="col-xm-12">
                            <div class="form-group no-margin-hr  body">
                                <label class="control-label">{{ trans('general.subject') }}</label>
                                {!! Form::text('subject', $subject, ['class' => ' form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xm-12">
                            <div class="form-group no-margin-hr  body">
                                <label class="control-label">{{ trans('general.sendTo') }}</label>
                                {!! Form::select('group_id', $aMassGroups, $group_id, array('class' => 'form-control')) !!}

                            </div>
                        </div>

                        <div class="well body">
                            {!! Form::textarea('template_body', $sContent, array('id'=>'editor1','class' => 'form-control ckeditor')) !!}
                        </div>
                        <div class="form-actions  text-right">


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
        </div>

@stop