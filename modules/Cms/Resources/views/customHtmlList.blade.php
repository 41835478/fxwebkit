@extends(Config::get('cms.admin_theme'))

@section('content')

    <div class="page-header">
        <h1>{{ trans('cms::cms.customHTMLList') }}</h1>
    </div>
    {!! Form::open(['url'=>asset('cms/customHtml/custom-html'),'method'=>'get', 'style'=>'margin-bottom:30px']) !!}

    {!! Form::submit(trans('cms::cms.create_new_HTML'),["name"=>'new_article_submit','class'=>'btn btn-primary' ]) !!}

    {!! Form::close() !!}



    <div class="table-light">
        <div class="table-header">
            <div class="table-caption">

                {{ trans('cms::cms.custom_HTML_list') }}
            </div>
        </div>
        {!! Form::open(['url'=>asset('cms/customHtml/custom-html')]) !!}
        <table border="0" class="table table-bordered table-striped">
            <thead>
            <th>{{ trans('cms::cms.id') }}</th>
            <th>{{ trans('cms::cms.title') }}</th>
            <th></th>
            </thead>
            <tbody>
            {{-- */$i=0;/* --}}
            {{-- */$class='';/* --}}
            @foreach($customHtmls as $key=>$customHtml)
                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                <tr class='{{ $class }}'>


                    <td>{{ $key }}</td>
                    <td>{{ $customHtml }}</td>


                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_customHtml_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete custom html with its links")) return false;','class'=>'icon_button red_icon','type'=>'submit','value'=>$key ]) !!}
                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_customHtml_page' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$key ]) !!}
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_custmHtmlList.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
@stop
