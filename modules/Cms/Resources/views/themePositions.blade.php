@extends(Config::get('cms.admin_theme'))

@section('content')


	<div class="page-header">
		<h1>{{ trans('cms::cms.pageBuilder') }}</h1>
                <input class="btn btn-primary btn-flat" type="submit" value="save page">
	</div>


<aside id="modules_list"> 
   
    @foreach($modules_list as $key=>$module)
    <div id="{{ $key }}" 
         @if(isset($module['type']))
          data-type="{{ $module['type'] }}"
          onclick="get_module_options($(this),'{{ asset('cms/modules/module-options-list') }}')"
          
         class=" module_list_button" >{{ $module['name'] }}



        
         @else
         
         class="dragable module_list_button" >{{ $module['name'] }}
         @endif
         
         
         
  </div>
         <div class="sub_module_all_div"></div>       
         
    
    @endforeach
    
</aside>

<section id="theme_section">
@foreach($themeRows as $row)


<div class="themeRow">
    @foreach( $row as $column)

    <div class="{{ $column['class'] }}">
    <div class="dropable " id="{{ $column['name'] }}"> 
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



        <div class="form-group from_row_div">
            <label for="module_type_0" >
                <label class="col-sm-4 control-label">
                    {!! Form::radio('type', 0, true, ['class' => 'module_type_radio ','id'=>'module_type_0']) !!}
                </label>

                <select name="module_id" onchange="get_module_options($(this),'{{ asset('cms/modules/module-options') }}')" 'class'='form-control input-sm' onload="$(this).change();">
                        @foreach($modules_list as $key=>$module)
                        <option value="{{ $key }}" data-type="{{ $module['type'] or 0 }}">{{ $module['name'] }}</option>
                    @endforeach
                </select>

            </label>
        </div>

    
<div class="switcher switcher-colorGeneratorDemo checked"><input type="checkbox" data-class="switcher-colorGeneratorDemo" checked="checked" id="switchers-demo-default"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>
         {!! Form::label('type','menus').Form::radio('type', -1, '', ['class' => 'module_type_radio','id'=>'module_type_1']) !!}
         {!! Form::label('type','articles place').Form::radio('type', -2,'', ['class' => 'module_type_radio','id'=>'module_type_2'])  !!}
         {!! Form::label('float','left').Form::radio('float',1,'',['class'=>'float_radio']) !!}
         {!! Form::label('float','right').Form::radio('float',2,'',['class'=>'float_radio']) !!}
         {!! Form::label('all_pages','all pages').Form::radio('all_pages', 0,['id'=>'all_pages_0'])  !!}
         {!! Form::label('all_pages','just selected pages').Form::radio('all_pages', 1,true,['id'=>'all_pages_1'])  !!}
         {!! Form::label('all_pages','except pages').Form::radio('all_pages', 2,false,['id'=>'all_pages_2'])  !!}    
         {!! Form::label('selected_pages','select pages',['class'=>'col-sm-4 control-label']) .Form::select('selected_pages[]',$pages,$page_id,['id'=>'multi_pages_select',"multiple"=>"true",'class'=>'form-control input-sm']) !!}     
         {!! Form::hidden('position',$page_id ,['id'=>'add_module_position_name_input']) !!}
         {!! Form::hidden('page_id',$page_id ) !!}
         {!! Form::submit('add module',["name"=>'add_module_submit','class'=>'btn btn-primary' ]) !!}
         {!! Form::close() !!}

  





    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_themePostions.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_themePostions.js') }}"></script>
    
    
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'/myDragDrop/css/dragDrop.css') }}">
    <script src="{{ asset($asset_folder.'/myDragDrop/js/dragDropClass.js') }}"></script>
@stop