@extends('admin.layouts.main')
@section('content')





    <div id="page-wrapper" style="min-height: 366px;">
        <div class="container-fluid">





            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.massMailler') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">Fxwebkit</a></li>
                        <li class="active">{{ trans('general.massMailler') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('user.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ trans('general.massMailler') }}</h3>
                        <p class="text-muted m-b-30 font-13">{{ trans('general.massMailler') }} <code> {{ trans('general.email') }}</code></p>
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