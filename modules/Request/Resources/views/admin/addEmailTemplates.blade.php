@extends('admin.layouts.main')
@section('title', trans('request::request.emailTemplates'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('request::request.emailTemplates') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('request::request.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('request::request.email') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('request::request.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
            <fieldset>
                {!! Form::open(array('method'=>'get','id'=>'showTemplateForm')) !!}
                <div class="panel">
                <div class="panel-body">

                    <div class="well">
                        <div class="col-sm-12">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('request::request.template') }}</label>
                                {!! Form::select('template_name', $aTemplates, $template_name, array('class' => ' form-control', 'id' => 'template-name','onchange'=>'$("#showTemplateForm").submit()')) !!}

                            </div>
                        </div>
                        <!-- col-sm-6 -->

                        <div class="col-xs-4">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('request::request.language') }}</label>
                                {!! Form::select('lang', $aLanguages, $sLanguage, array('class' => 'form-control', 'id' => 'template-language','onchange'=>'$("#showTemplateForm").submit()')) !!}

                            </div>
                        </div>
                        <!-- col-sm-6 -->

                        <div class="col-xs-4">
                            <div class="form-group no-margin-hr  body">
                                <label class="control-label">{{ trans('request::request.type') }}</label>
                                {!! Form::select('type',$aType, $type, ['class' => ' form-control','onchange'=>'$("#showTemplateForm").submit()']) !!}
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group no-margin-hr  body">
                                <label class="control-label">{{ trans('request::request.status') }}</label>
                                {!! Form::select('status',$aStatus, $status, ['class' => ' form-control','onchange'=>'$("#showTemplateForm").submit()']) !!}
                            </div>
                        </div>


                        {!! Form::close() !!}

                        <div style='clear:both'></div>
                    </div>
                        {!! Form::open(array('class'=>'form-horizontal')) !!}

                    <div class="col-xs-12">
                        <div class="form-group no-margin-hr  body">
                            <label class="control-label">{{ trans('request::request.subject') }}</label>
                            {!! Form::text('title', $title, ['class' => ' form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group no-margin-hr  body">
                            <label class="control-label">{{ trans('request::request.to_field') }}</label>
                            {!! Form::text('to_field', $to_field, ['class' => ' form-control']) !!}
                        </div>
                    </div>


                    <div class="col-xs-6">
                        <div class="form-group no-margin-hr  body">
                            <label class="control-label">{{ trans('request::request.to_email') }}</label>
                            {!! Form::text('to_email', $to_email, ['class' => ' form-control']) !!}
                        </div>
                    </div>

                <div class="clearfix"></div>

                    <div class="well body">
                            {!! Form::textarea('template_body', $mail, array('id'=>'editor1','class' => 'form-control ckeditor')) !!}
                        </div>
                        <div class="panel-footer text-right">
                            {!! Form::hidden('templateId',$id) !!}
                            {!! Form::hidden('template_name',$template_name) !!}
                            {!! Form::hidden('lang',$sLanguage) !!}
                            {!! Form::hidden('status',$status) !!}
                            {!! Form::hidden('type',$type) !!}

                            {!! Form::submit(trans('request::request.delete'), array('name'=>'delete','class'=>'btn btn-danger pull-right btn-flat')) !!}

                            {!! Form::submit(trans('request::request.save'), array('name'=>'save','style'=>'margin:0px 10px;','class'=>'btn btn-primary pull-left btn-flat')) !!}

                            {!! Form::submit(trans('request::request.saveNew'), array('name'=>'saveNew','class'=>'btn btn-primary  pull-left btn-flat')) !!}
                        </div>

                        {!! Form::close() !!}
                </div>
                </div>

            </fieldset>
                    </div></div></div></div></div>

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