@extends(Config::get('cms.admin_theme'))

@section('content') 

	<div class="page-header">
		<h1>{{ trans('cms::cms.newArticle') }}</h1>
 @if($selected_id>0)               
{!! Form::open(['url'=>asset('/cms/articles/articles'),'class'=>'language_select_form']) !!}
     {!! Form::hidden('article_id',$selected_id) !!}
    {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
    {!! Form::submit('translate',["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}
    
{!! Form::close() !!}
@endif
	</div>


@if($selected_language == 1)
{!! Form::open(['url'=>asset('/cms/articles/insert-edit-article'),'class'=>'panel form-horizontal']) !!}
                <div class="panel-heading">
                    <span class="panel-title">article </span>
                </div>
                <div class="panel-body">
                    {!! Form::text('title',(isset($edit_article->title))?  $edit_article->title:'',['id'=>'title','placeholder'=>'title','class'=>'form-control ']) !!}
                    {!! Form::textarea('editor1',(isset($edit_article->body))?  $edit_article->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
                    {!! Form::hidden('article_id' ,$selected_id) !!}
                    {!! Form::select('page_id',$pages,(isset($edit_article->page_id))?  $edit_article->page_id:0 ) !!}
                    {!! Form::submit('insert new article',["name"=>'insert_article_submit','id'=>'insert_article_submit','class'=>'btn btn-primary' ]) !!}
                    
                    @if($selected_id > 0) 
                    {!! Form::hidden('edit_article_id',$selected_id) !!}
                    {!! Form::submit('save edits',["name"=>'edit_article_submit','id'=>'edit_article_submit','class'=>'btn btn-primary' ]) !!}
                    
                    @endif
                    
             @if($errors->any())
                        <div class="alert alert-danger alert-dark">
                            @foreach($errors->all() as $key=>$error)
                            <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
                            @endforeach
                        </div>
                        @endif
                </div>
{!! Form::close() !!}
@else
{!! Form::open(['url'=>asset('/cms/articles/save-article-translate'),'class'=>'panel form-horizontal']) !!}
                <div class="panel-heading">
                    <span class="panel-title">article </span>
                </div>
                <div class="panel-body">
                    {!! Form::text('title',(isset($edit_article->title))?  $edit_article->title:'',['id'=>'title','placeholder'=>'title','class'=>'form-control ']) !!}
                    {!! Form::textarea('editor1',(isset($edit_article->body))?  $edit_article->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
                    {!! Form::hidden('article_id' ,$selected_id) !!}
                    {!! Form::hidden('selected_language' ,$selected_language) !!}
                    {!! Form::submit('save translate',["name"=>'edit_article_submit','id'=>'edit_article_submit','class'=>'btn btn-primary' ]) !!}
                    
                    
                </div>
{!! Form::close() !!}
@endif


<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_articles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_articles.js') }}"></script>
<script>
//CKEDITOR.replace( textarea );
CKEDITOR.replace('editor1', {
    filebrowserBrowseUrl:" {{ asset('/cms/articles/file-browser') }}",
    filebrowserUploadUrl: "{{ asset('/cms/articles/upload-image' ).'?_token='. csrf_token() }}"
});

</script>

@stop