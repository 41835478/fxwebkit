@extends(Config::get('cms.admin_theme'))

@section('content')


	<div class="page-header">
		<h1>{{ trans('cms::cms.pageBuilder') }}</h1>
        </div>


<aside id="modules_list"> 
    <div 
        id="-2" 
        content_id="0" 
        float="0"
        selected_pages="{{ $page_id }}" 
        all_pages="1"
        value="0" 
        class="reorderable module_list_button"
        draggable="true" 
        onclick="show_module_config_form($(this));" 
        onblur="hide_module_config_form($(this));"
        ondrop="show_module_config_form($(this));alert(4);"
        >main article place</div>
    
    <div id="-1" data-type="database"
         onclick="get_module_options($(this),'http://localhost:8000/cms/modules/module-options-list')"
         class=" module_list_button">
        menus
    </div>
         
         <div class="sub_module_all_div"></div>    
         
         
    @foreach($modules_list as $key=>$module)
    <div id="{{ $key }}" content_id="0" 
         @if(isset($module['type']))
          data-type="{{ $module['type'] }}"
          onclick="get_module_options($(this),'{{ asset('cms/modules/module-options-list') }}')"
          
         class=" module_list_button" >{{ $module['name'] }}



        
         @else
         
         class="dragable module_list_button" float="0" all_pages='1' selected_pages="{{ $page_id }}"  >{{ $module['name'] }}
         @endif
         
         
         
  </div>
         <div class="sub_module_all_div"></div>       
         
    
    @endforeach
 <div id="trash_div" class="dropable" ><i class="fa fa-trash-o"></i></div>
     
</aside>

<section id="theme_section">

@foreach($themeRows as $row)


<div class="themeRow">
    @foreach( $row as $column)

    <div class="{{ $column['class'] }}">
        <div class="dropable"  id="{{ $column['name'] }}"> 
        @if(isset($positions[$column["name"].""]))
        @foreach($positions[$column["name"].""] as $position)
        {!! $position !!}
        @endforeach 
        @endif
        
    </div> 
        </div>
    @endforeach
    <div class="clearfix"></div>
</div>
@endforeach
</section>

    {!! Form::open(['url'=>asset('cms/pages/add-module'),'id'=>'module_config_form']) !!}

    <div class="form_row">
    <div class="radio_select_all_div">
        <input type="hidden" name="float" value="0" >
        <label value="1"> left </label>
        <label value="0">no float</label>
        <label value="2">right</label>
    </div>
    </div>
    
    
    <div class="form_row">
    <div class="radio_select_all_div">
        <input type="hidden" name="all_pages" value="0" >
        <label value="0"> all_pages </label>
        <label value="1">selected pages</label>
        <label value="2">except pages </label>
    </div>
       
        
    <div class="multi_select_all_div">
        <input type="hidden" name="selected_pages" value="1,3" >
        @foreach($pages as $key=>$page)
        
        <label value="{{ $key }}"> {{ $page }} </label>
        @endforeach
    </div>
        
    </div>
    
         {!! Form::hidden('position',$page_id ,['id'=>'position_name_input' ,]) !!}
         {!! Form::hidden('module_value','' ) !!}
         {!! Form::hidden('type','' ) !!}
         {!! Form::hidden('content_id','' ) !!}
        
         {!! Form::hidden('page_id',$page_id ) !!}
         {!! Form::close() !!}

  





    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_themePostions.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_themePostions.js') }}"></script>
    
    
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'/myDragDrop/css/dragDrop.css') }}">
    <script src="{{ asset($asset_folder.'/myDragDrop/js/dragDropClass.js') }}"></script>
    
@stop