@extends(Config::get('cms.admin_theme'))

@section('content')
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('cms::cms.articlesList') }}</h1>
        </div>

        {!! Form::open(['url'=>asset('cms/articles/article'),'method'=>'get', 'style'=>'margin-bottom:30px']) !!}

        {!! Form::submit(trans('cms::cms.create_new_article'),["name"=>'new_article_submit','class'=>'btn btn-primary' ]) !!}

        {!! Form::close() !!}


        <div class="table-light">
            <div class="table-header">
                <div class="table-caption">

                    {{ trans('cms::cms.articlesList') }}
                </div>
            </div>
            {!! Form::open(['url'=>asset('cms/articles/articles')]) !!}
            <table border="0" class="table table-bordered table-striped cms_table">
                <thead>
                <th>{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all',trans('cms::cms.select_all')) !!}</th>
                <th>{{ trans('cms::cms.id') }}</th>
                <th>{{ trans('cms::cms.title') }}</th>
                <th>{{ trans('cms::cms.page') }} </th>
                <th></th>
                </thead>
                <tbody>
                {{-- */$i=0;/* --}}
                {{-- */$class='';/* --}}
                @foreach($articles as $article)
                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                    <tr class='{{ $class }}'>
                        <td>{!! Form::checkbox('articles_checkbox[]',$article->id,false,['class'=>'articles_checkbox']) !!}</td>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $pages[$article->page_id] }}</td>
                        </td>
                        <td>
                            {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_article_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete articles with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$article->id ]) !!}
                            {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_article_page' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$article->id ]) !!}
                        </td>
                    <tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_groub_article_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete articles with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}

                        <div style="width:250px;display: inline-block; ">
                            {!! Form::select('pages_select',$pages,0) !!}
                        </div>
                        {!! Form::button(trans('cms::cms.change_articles_page'),['name'=>'change_groub_article_pages_submit' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}
                    </td>
                </tr>
                </tfoot>
            </table>
            {!! Form::close() !!}
        </div>

        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_articlesList.css') }}">
        <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
        <!-- Javascript -->
        <script>

            init.push(function () {

                $('.tooltip_number').tooltip();
                // Single select
                $("select[name='pages_select']").select2({
                    allowClear: true,
                    placeholder: "select page"
                });


            });
            $('input[name="check_all"]').click(function () {
                if ($(this).prop("checked")) {
                    $("input[name='articles_checkbox[]']").prop("checked", true);
                } else {

                    $("input[name='articles_checkbox[]']").prop("checked", false);
                }
            });
        </script>
        <!-- / Javascript -->
@stop