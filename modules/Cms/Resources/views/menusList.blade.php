@extends(Config::get('cms.admin_theme'))

@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('cms::cms.menusList') }}</h1>

        {!! Form::open(['url'=>asset('cms/menus/menus-list'),'method'=>'get','class'=>'language_select_form']) !!}

        {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
        {!! Form::submit(trans('cms::cms.translate'),["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}

        {!! Form::close() !!}


    </div>



    <div class="table-light">
        <div class="table-header">
            <div class="table-caption">
                {!! Form::open(['url'=>asset('cms/menus/insert-new-menu') ,'id'=>'create_menu_form','class'=>'']) !!}

                {!! Form::text('new_menu_name_input','',['placeholder'=>trans('cms::cms.new_menu_name'),'class'=>'form-control ']) !!}
                {!! Form::submit( trans('cms::cms.create_new_menu'),["name"=>'new_menu_submit','class'=>'btn btn-primary btn-flat' ]) !!}


                {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                {!! Form::close() !!}


            </div>
        </div>
        @if($selected_language==1)
            {!! Form::open(['url'=>asset('cms/menus/menus')]) !!}
            <table border="0" class="table table-bordered table-striped cms_table" style="display: table">
                <thead>
                <th>{{ trans('cms::cms.id') }}</th>
                <th>{{ trans('cms::cms.title') }}</th>
                <th></th>
                </thead>
                <tbody>
                {{-- */$i=0;/* --}}
                {{-- */$class='';/* --}}
                @foreach($menus as $menu)
                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                    <tr class='{{ $class }}'>


                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->title }}</td>

                        <td>
                            {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_menu_submit' ,'class'=>'icon_button red_icon tooltip_number','data-original-title'=>trans('cms::cms.delete'),'onclick'=>'if(!confirm("Are you sure you want to delete menu with all links in it")) return false;','type'=>'submit','value'=>$menu->id ]) !!}
                            {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'selected_id' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$menu->id ]) !!}
                        </td>
                    <tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::close() !!}

        @else

            {!! Form::open(['url'=>asset('cms/menus/save-translate')]) !!}
            <table border="0" class="table table-bordered" style="display: table">
                <thead>
                <th>{{ trans('cms::cms.id') }}</th>
                <th>{{ trans('cms::cms.title') }}</th>
                <th>
                    {!! Form::hidden('selected_language',$selected_language) !!}
                    {!! Form::submit('save '.$languages[$selected_language].' translate',["name"=>'save_menu_name_translate','class'=>'btn btn-primary btn-flat' ]) !!}
                </th>

                </thead>
                <tbody>
                @foreach($menus as $menu)

                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->title }}</td>
                        <td>{!! Form::text('translate_title['.$menu->id.']',(isset($menu->cms_menus_languages->first()->translate))? $menu->cms_menus_languages->first()->translate:'',['placeholder'=>$menu->title .' ( '.$languages[$selected_language].' ) ']) !!}</td>
                        </td>
                    <tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::close() !!}
        @endif
    </div>

        </div>

    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pagesList.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script >

        init.push(function () {
            $('.tooltip_number').tooltip();
        });
    </script>
@stop