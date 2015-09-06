@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.menuBuilder') }}</h1>
                
	</div>


@if($selected_id != 0)
<div id="add_menu_item_form_all_div">
     
    {!! Form::open(['url'=>asset('cms/menus/insert-new-menu-item'),'class'=>'form']) !!}
    <div class="form_head_div">
        add link to this menu
    </div>
    
    <div class="form_body_div">
        
        <div class="from_row_div">
            <label class="form_lable">
                
            {!! Form::radio('type', 0, ($menu_item==0 || $menu_item->type)? true:false, ['class' => 'module_type_radio','id'=>'module_type_0']) !!}
            </label>
            {!! Form::select('page_id',$pages,($menu_item==0 || $menu_item->type)? 0:$menu_item->page_id,['class'=>'form-control ']) !!}
        </div>
        
        
    </div><!-- .form_body_div -->
{!! Form::close() !!}
</div>


@endif
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>
@stop