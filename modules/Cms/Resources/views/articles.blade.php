@extends(Config::get('cms.admin_theme'))

@section('content') 

{!! Form::open(['name'=>'articles_select_from','class'=>'panel form-horizontal']) !!}
                <div class="panel-heading">
                    <span class="panel-title">new menu </span>
                </div>
                <div class="panel-body">
                    {!! Form::select('edit_article_page',$articles,$selected_id,['onchange'=>'$("form[name=articles_select_from]").submit();']) !!}
                    {!! Form::button('<i class="fa fa-cog"></i>',["name"=>'select_article_submit','type'=>'submit','class'=>'icon_button blue_icon' ]) !!}
                </div>
{!! Form::close() !!}

{!! Form::open(['class'=>'panel form-horizontal']) !!}
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

                </div>
{!! Form::close() !!}



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