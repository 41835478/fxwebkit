@extends('cms::'.Config::get('cms.theme_folder').'.theme')
@section('header')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'develop_theme_iframe.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'develop_theme_iframe.js') }}"></script>


@stop
{{--  @include('cms::'.Config::get('cms.theme_folder').'.theme') --}}


<div id="add_module_form_all_div">
    <div class="close_pupup_div" onclick="$(this).parent().hide();">X</div>
    {!! Form::open(['url'=>asset('cms/pages/add-module'),'id'=>'add_module_to_web_19999_form','class'=>'panel form-horizontal']) !!}
    <div class="panel-heading">
        <span class="panel-title">{{ trans('cms::cms.add_module_to') }} </span>
    </div>
    <div class="panel-body">

        <div class="form-group from_row_div">
            <label for="module_type_0">
                <label class="col-sm-4 control-label">
                    {!! Form::radio('type', 0, true, ['class' => 'module_type_radio','id'=>'module_type_0']) !!}
                </label>

                <select name="module_id"
                        onchange="get_module_options($(this),'{{ asset('cms/modules/module-options') }}')"
                'class'='form-control input-sm' onload="$(this).change();">
                @foreach($modules_list as $key=>$module)
                    <option value="{{ $key }}" data-type="{{ $module['type'] or 0 }}">{{ $module['name'] }}</option>
                    @endforeach
                </select>


                    <select name="module_variable" id="module_variable">

                    </select>
            </label>
        </div>


        <div class="form-group from_row_div">
            <lable class="col-sm-4 control-label">
                {!! Form::radio('type', -1, '', ['class' => 'module_type_radio','id'=>'module_type_1']) !!}
            </lable>
            {!! Form::select('menu_id',$menus ) !!}
        </div>

        <div class="form-group from_row_div">
            <lable class="col-sm-4 control-label">
                {!! Form::radio('type', -2,'', ['class' => 'module_type_radio','id'=>'module_type_2'])  !!}
            </lable>
            <label>{{ trans('cms::cms.articles_place') }}</label>
        </div>


        <div class="form-group from_row_div">
            {!! Form::label('order','module order',['class'=>'col-sm-4 control-label']) . Form::text('order','',['placeholder'=>'module order','class'=>'form-control input-sm']) !!}

            <div class="from_row_div">
                {!! Form::label('float','float',['class'=>'col-sm-4 control-label']) .Form::select('float',$float_array,['class'=>'form-control input-sm']) !!}
            </div>

            <div class="from_row_div">
                {!!  Form::label('display','display',['class'=>'col-sm-4 control-label']) .Form::select('display',$display_array,['class'=>'form-control input-sm']) !!}
            </div>


            <div class="from_row_div">
                <label class="col-sm-4 control-label">
                    {!! Form::radio('all_pages', 0,['id'=>'all_pages_0'])  !!}
                </label>
                <label for="all_pages_0">{{ trans('cms::cms.all_page') }}</label>
            </div>


            <div class="from_row_div">
                <label class="col-sm-4 control-label">
                    {!! Form::radio('all_pages', 1,true,['id'=>'all_pages_1'])  !!}
                </label>
                <label for="all_pages_1">{{ trans('cms::cms.just_selected_pages') }}</label>
            </div>


            <div class="from_row_div">
                <label class="col-sm-4 control-label">
                    {!! Form::radio('all_pages', 2,false,['id'=>'all_pages_2'])  !!}
                </label>
                <label for="all_pages_2">{{ trans('cms::cms.except_pages') }}</label>
            </div>


            <div class="from_row_div">
                {!!  Form::label('selected_pages','select pages',['class'=>'col-sm-4 control-label']) .Form::select('selected_pages[]',$pages,$page_id,['id'=>'multi_pages_select',"onchange"=>'$(this).parent().submit()',"multiple"=>"true",'class'=>'form-control input-sm']) !!}
            </div>


            <div class="from_row_div">
                {!! Form::hidden('position',$page_id ,['id'=>'add_module_position_name_input']) !!}
                {!! Form::hidden('page_id',$page_id ) !!}
                {!! Form::submit('add module',["name"=>'add_module_submit','class'=>'btn btn-primary' ]) !!}
            </div>

        </div>
        {!! Form::close() !!}

    </div>
</div>


{!! Form::open(['url'=>asset('cms/pages/pages'),'id'=>'remove_module_form','class'=>'form-control input-sm']) !!}
{!! Form::hidden('page_id',$page_id ) !!}
{!! Form::hidden('remove_module_id','',['id'=>'remove_module_id'] ) !!}
{!! Form::close() !!}
