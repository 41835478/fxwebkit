@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" style="min-height: 366px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ trans('general.emailTemplates') }}</h3>
                        <p class="text-muted m-b-30 font-13">{{ trans('general.emailTemplates') }} <code> {{ trans('general.email') }}</code></p>
                        <div class="row">
                            <div class="col-md-12">
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
                        <!-- col-sm-6 -->

                        <div class="col-sm-12">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('general.language') }}</label>
                                {!! Form::select('lang', $aLanguages, $sLanguage, array('class' => 'form-control', 'id' => 'template-language','onchange'=>'$("#showTemplateForm").submit()')) !!}

                            </div>
                        </div>
                        <!-- col-sm-6 -->

                        {!! Form::close() !!}

                        <div style='clear:both'></div>
                    </div>
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
                        <div class="panel-footer text-right">
                            {!! Form::hidden('templateId',$templateId) !!}
                            {!! Form::hidden('lang',$sLanguage) !!}

                            {!! Form::submit(trans('general.delete'), array('name'=>'delete','class'=>'btn btn-danger pull-right btn-flat')) !!}

                            {!! Form::submit(trans('general.save'), array('name'=>'save','style'=>'margin:0px 10px;','class'=>'btn btn-primary pull-left btn-flat')) !!}

                            {!! Form::submit(trans('general.saveNew'), array('name'=>'saveNew','class'=>'btn btn-primary  pull-left btn-flat')) !!}
                        </div>

                </div>

            </fieldset>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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