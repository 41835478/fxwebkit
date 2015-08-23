@extends(Config::get('cms.admin_theme'))

@section('content')
<div id="cms_add_page_all_div">
    {!! Form::open(['url'=>asset('cms/pages/pages'),'name'=>'pages_select_form','class'=>'panel form-horizontal']) !!}
                    <div class="panel-heading">
                        <span class="panel-title">select page </span>
                    </div>
                    <div class="panel-body">
                        {!! Form::select('go_to_page',$pages,$page_id,["onchange"=>'$("form[name=pages_select_form]").submit()','class'=>'form-control input-sm']) !!}
                        {!! Form::submit('display page',["name"=>'display_page_submit','class'=>'btn btn-primary' ]) !!}
                    </div>
    {!! Form::close()!!}
</div>


@if($page_id)

@include('cms::'.Config::get('cms.theme_folder').'.theme')



<div id="add_module_form_all_div">
    <div class="close_pupup_div" >X</div>   
    {!! Form::open(['url'=>asset('cms/pages/add-module'),'class'=>'panel form-horizontal']) !!}
                <div class="panel-heading">
                    <span class="panel-title">add module to the page </span>
                </div>
                <div class="panel-body">

        <div class="form-group">
            <label for="module_type_0" >
                <label class="col-sm-4 control-label">
                    {!! Form::radio('type', 0, true, ['class' => 'module_type_radio','id'=>'module_type_0']) !!}
                </label>

                <select name="module_id" onchange="get_module_options($(this),'{{ asset('cms/modules/module-options') }}')" 'class'='form-control input-sm' onload="$(this).change();">
                        @foreach($modules_list as $key=>$module)
                        <option value="{{ $key }}" data-type="{{ $module['type'] or 0 }}">{{ $module['name'] }}</option>
                    @endforeach
                </select>

                <select name="module_variable" id="module_variable" >

                </select>
            </label>
        </div>


        <div class="form-group">
                <lable class="col-sm-4 control-label">
                    {!! Form::radio('type', -1, '', ['class' => 'module_type_radio','id'=>'module_type_1']) !!}
                </lable>
                {!! Form::select('menu_id',$menus ) !!}
        </div>

        <div class="form-group">
                <lable class="col-sm-4 control-label">
                    {!! Form::radio('type', -2,'', ['class' => 'module_type_radio','id'=>'module_type_2'])  !!}
                </lable>
                <label  >articles place</label>
        </div >



        <div class="form-group">
        {!! Form::label('order','module order',['class'=>'col-sm-4 control-label']) . Form::text('order','',['placeholder'=>'module order','class'=>'form-control input-sm']) !!}
        </dvi>

            <div class="form-group">
                {!! Form::label('float','float',['class'=>'col-sm-4 control-label']) .Form::select('float',$float_array,['class'=>'form-control input-sm']) !!}
            </div>

        <div class="form-group">
                {!!  Form::label('display','display',['class'=>'col-sm-4 control-label']) .Form::select('display',$display_array,['class'=>'form-control input-sm']) !!}
        </div>


            <div class="form-group">
                <label class="col-sm-4 control-label">
                    {!! Form::radio('all_pages', 0,['id'=>'all_pages_0'])  !!}
                </label>
                <label for="all_pages_0">all page</label>
            </div>


            <div class="form-group">
                <label class="col-sm-4 control-label">
                    {!! Form::radio('all_pages', 1,true,['id'=>'all_pages_1'])  !!}
                </label>  
                <label for="all_pages_1">just selected pages</label>
            </div>


            <div class="form-group">
                <label class="col-sm-4 control-label">
                    {!! Form::radio('all_pages', 2,false,['id'=>'all_pages_2'])  !!}       
                </label>
                <label for="all_pages_2">except pages</label>  
            </div>


            <div class="form-group">
                {!!  Form::label('selected_pages','select pages',['class'=>'col-sm-4 control-label']) .Form::select('selected_pages[]',$pages,$page_id,["onchange"=>'$(this).parent().submit()',"multiple"=>"true",'class'=>'form-control input-sm']) !!}
            </div>


            <div class="form-group">
                {!! Form::hidden('position',$page_id ,['id'=>'add_module_position_name_input']) !!}
                {!! Form::hidden('page_id',$page_id ) !!}
                {!! Form::submit('add module',["name"=>'add_module_submit','class'=>'btn btn-primary' ]) !!}
            </div>

        </div>
 {!! Form::close() !!}

    </div>

    {!! Form::open(['url'=>asset('cms/pages/pages'),'id'=>'remove_module_form','class'=>'form-control input-sm']) !!}
    {!! Form::hidden('page_id',$page_id ) !!}
    {!! Form::hidden('remove_module_id','',['id'=>'remove_module_id'] ) !!}
    {!! Form::close() !!}

    @endif


    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pages.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_pages.js') }}"></script>

    @stop