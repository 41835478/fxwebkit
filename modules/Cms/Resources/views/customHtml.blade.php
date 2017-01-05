@extends(Config::get('cms.admin_theme'))

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('cms::cms.pagesList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('cms::cms.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('cms::cms.pagesList') }}</li>
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
                <div class="col-lg-12">
                    <div class="white-box">
                        @if($selected_id>0)
                            {!! Form::open(['url'=>asset('/cms/customHtml/custom-html'),'class'=>'language_select_form']) !!}
                            {!! Form::hidden('customHtml_id',$selected_id) !!}
                            {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
                            {!! Form::submit(trans('cms::cms.translate'),["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}

                            {!! Form::close() !!}
                        @endif
                        <h3 class="box-title m-b-0">Kitchen Sink</h3>
                        <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                            @if($selected_language == 1)
                                {!! Form::open(['url'=>asset('cms/customHtml/insert-edit-custom-html'),'class'=>'panel form-horizontal']) !!}
                                <div class="panel-heading">

                                    <span class="panel-title">{{ trans('cms::cms.custom_HTML')}}</span>
                                </div>
                                <div class="panel-body">

                                    {!! Form::text('title',(isset($edit_customHtml->title))?  $edit_customHtml->title:'',['id'=>'title','placeholder'=>trans('cms::cms.title'),'class'=>'form-control ']) !!}
                                    {!! Form::textarea('editor1',(isset($edit_customHtml->body))?  $edit_customHtml->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
                                    {!! Form::hidden('customHtml_id' ,$selected_id) !!}


                                    {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                                </div>

                                <div class="panel-footer">

                                    {!! Form::submit(trans('cms::cms.insert_new_custom_Html'),["name"=>'insert_customHtml_submit','id'=>'insert_customHtml_submit','class'=>'btn btn-primary' ]) !!}

                                    @if($selected_id > 0)
                                        {!! Form::hidden('edit_customHtml_id',$selected_id) !!}
                                        {!! Form::submit(trans('cms::cms.save_edits'),["name"=>'edit_customHtml_submit','id'=>'edit_customHtml_submit','class'=>'btn btn-primary' ]) !!}

                                    @endif
                                </div>
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['url'=>asset('/cms/customHtml/save-custom-html-translate'),'class'=>'panel form-horizontal']) !!}
                                <div class="panel-heading">
                                    <span class="panel-title">{{ trans('cms::cms.article') }} </span>
                                </div>
                                <div class="panel-body">

                                    {!! Form::text('title',(isset($edit_customHtml->title))?  $edit_customHtml->title:'',['id'=>'title','placeholder'=>'title','class'=>'form-control ']) !!}
                                    {!! Form::textarea('editor1',(isset($edit_customHtml->body))?  $edit_customHtml->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
                                    {!! Form::hidden('customHtml_id' ,$selected_id) !!}
                                    {!! Form::hidden('selected_language' ,$selected_language) !!}
                                    {!! Form::submit('save translate',["name"=>'editcustomHtml_submit','id'=>'edit_customHtml_submit','class'=>'btn btn-primary' ]) !!}


                                </div>
                    </div>
                    {!! Form::close() !!}
                    @endif

                </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_customHtml.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDITOR.replace( textarea );
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: " {{ asset('/cms/articles/file-browser') }}",
            filebrowserUploadUrl: "{{ asset('/cms/articles/upload-image' ).'?_token='. csrf_token() }}"
        });

    </script>

@stop
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('cms::cms.newCustomHTML') }}</h1>
        @if($selected_id>0)
            {!! Form::open(['url'=>asset('/cms/customHtml/custom-html'),'class'=>'language_select_form']) !!}
            {!! Form::hidden('customHtml_id',$selected_id) !!}
            {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
            {!! Form::submit(trans('cms::cms.translate'),["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}

            {!! Form::close() !!}
        @endif
    </div>


    @if($selected_language == 1)
        {!! Form::open(['url'=>asset('cms/customHtml/insert-edit-custom-html'),'class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">

            <span class="panel-title">{{ trans('cms::cms.custom_HTML')}}</span>
        </div>
        <div class="panel-body">

            {!! Form::text('title',(isset($edit_customHtml->title))?  $edit_customHtml->title:'',['id'=>'title','placeholder'=>trans('cms::cms.title'),'class'=>'form-control ']) !!}
            {!! Form::textarea('editor1',(isset($edit_customHtml->body))?  $edit_customHtml->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
            {!! Form::hidden('customHtml_id' ,$selected_id) !!}


            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
        </div>

        <div class="panel-footer">

            {!! Form::submit(trans('cms::cms.insert_new_custom_Html'),["name"=>'insert_customHtml_submit','id'=>'insert_customHtml_submit','class'=>'btn btn-primary' ]) !!}

            @if($selected_id > 0)
                {!! Form::hidden('edit_customHtml_id',$selected_id) !!}
                {!! Form::submit(trans('cms::cms.save_edits'),["name"=>'edit_customHtml_submit','id'=>'edit_customHtml_submit','class'=>'btn btn-primary' ]) !!}

            @endif
        </div>
        {!! Form::close() !!}
    @else
        {!! Form::open(['url'=>asset('/cms/customHtml/save-custom-html-translate'),'class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('cms::cms.article') }} </span>
        </div>
        <div class="panel-body">

            {!! Form::text('title',(isset($edit_customHtml->title))?  $edit_customHtml->title:'',['id'=>'title','placeholder'=>'title','class'=>'form-control ']) !!}
            {!! Form::textarea('editor1',(isset($edit_customHtml->body))?  $edit_customHtml->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
            {!! Form::hidden('customHtml_id' ,$selected_id) !!}
            {!! Form::hidden('selected_language' ,$selected_language) !!}
            {!! Form::submit('save translate',["name"=>'editcustomHtml_submit','id'=>'edit_customHtml_submit','class'=>'btn btn-primary' ]) !!}


        </div>
        </div>
        {!! Form::close() !!}
    @endif



    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_customHtml.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDITOR.replace( textarea );
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: " {{ asset('/cms/articles/file-browser') }}",
            filebrowserUploadUrl: "{{ asset('/cms/articles/upload-image' ).'?_token='. csrf_token() }}"
        });

    </script>

@stop