@extends(Config::get('cms.admin_theme'))

@section('content') 


<form action="" method="get" name="articles_select_from">
    <select name="article_id" onchange="$(this).parent().submit();">
        <option value="0" >new article</option>
        @foreach($articles as $article)
        <option {{ ($article->id ==$selected_id)? 'selected':"" }} value="{{ $article->id }}">{{ $article->title }}</option>
        @endforeach
    </select>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="submit" value="display article"  name="select_article_submit"> 

</form>





<form method="post">
    <input type="text" name="title" id="title" value="{{ $edit_article->title or '' }}" placeholder="title">
    <textarea name="editor1" id="editor1">{{ $edit_article->body or ''}}</textarea>

    <input type="hidden" name="article_id" value="{{{ $selected_id }}}" />
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <select name="page_id">
        @foreach($pages as $page)
        <option value="{{ $page->id }}"  @if(isset($edit_article->page_id) && $edit_article->page_id == $page->id  ) selected @endif >{{ $page->title }}</option>
        @endforeach
    </select>


    <input type="submit" name="insert_article_submit" id="insert_article_submit" value="insert new article">
    @if($selected_id > 0) 
    <input type="hidden" name="edit_article_id" value="{{ $selected_id }}">
    <input type="submit" name="edit_article_submit" id="edit_article_submit" value="save edits">

    <input type="submit" value="delete article"  name="delete_article_submit">
    @endif
</form>
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_articles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_articles.js') }}"></script>
<script>
//CKEDITOR.replace( textarea );
            CKEDITOR.replace('editor1', {
                filebrowserBrowseUrl: '/cms/file_browser',
                filebrowserUploadUrl: "/cms/upload?_token={{{ csrf_token() }}}"
            });

</script>

@stop