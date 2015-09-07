@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.menusList') }}</h1>

{!! Form::open(['url'=>asset('cms/menus/menus-list'),'method'=>'get','class'=>'language_select_form']) !!}

    {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
    {!! Form::submit('translate',["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}
    
{!! Form::close() !!}


	</div>



<div class="table-info">
    <div class="table-header">
        <div class="table-caption">
{!! Form::open(['url'=>asset('cms/menus/insert-new-menu') ,'id'=>'create_menu_form','class'=>'']) !!}

    {!! Form::text('new_menu_name_input','',['placeholder'=>'new menu name','class'=>'form-control ']) !!}
    {!! Form::submit('create new menu',["name"=>'new_menu_submit','class'=>'btn btn-primary btn-flat' ]) !!}
    
                            
                        @if($errors->any())
                        <div class="alert alert-danger alert-dark">
                            @foreach($errors->all() as $key=>$error)
                            <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
                            @endforeach
                        </div>
                        @endif
                        
{!! Form::close() !!}


        </div>
    </div>
    @if($selected_language==1)
    {!! Form::open(['url'=>asset('cms/menus/menus')]) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>title</th>
      <th></th>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td >{{ $menu->id }}</td>
                    <td >{{ $menu->title }}</td>
                 
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_menu_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$menu->id ]) !!}
                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'selected_id' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$menu->id ]) !!}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
        
       @else 
 
    {!! Form::open(['url'=>asset('cms/menus/save-translate')]) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>title</th>
            <th>
                {!! Form::hidden('selected_language',$selected_language) !!}
                {!! Form::submit('save '.$languages[$selected_language].' translate',["name"=>'save_menu_name_translate','class'=>'btn btn-primary btn-flat' ]) !!}
            </th>
         
            </thead>
            <tbody>
                @foreach($menus as $menu)
             
                <tr>
                    <td >{{ $menu->id }}</td>
                    <td >{{ $menu->title }}</td>
                    <td>{!! Form::text('translate_title['.$menu->id.']',(isset($menu->cms_menus_languages->first()->translate))? $menu->cms_menus_languages->first()->translate:'',['placeholder'=>$menu->title .' ( '.$languages[$selected_language].' ) ']) !!}</td>
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}      
        @endif
</div>

<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pagesList.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
@stop