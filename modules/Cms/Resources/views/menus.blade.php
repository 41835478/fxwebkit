@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.menuBuilder') }}</h1>
	</div>


@if($selected_id != 0)
<div id="add_menu_item_form_all_div">
    
    <div class="close_pupup_div" >X</div>   
    {!! Form::open(['url'=>asset('cms/menus/insert-new-menu-item'),'class'=>'form']) !!}
    <div class="form_head_div">
        add link to this menu
    </div>
    
    <div class="form_body_div">
        
        <div class="from_row_div">
            <label class="form_lable">
            {!! Form::radio('type', 0, true, ['class' => 'module_type_radio','id'=>'module_type_0']) !!}
            </label>
            {!! Form::select('page_id',$pages ,['class'=>'form-control ']) !!}
        </div>
        
        <div class="from_row_div">
            <label class="form_lable">
                {!! Form::radio('type', 1, false, ['class' => 'module_type_radio','id'=>'module_type_1']) !!}
            </label>
            {!! Form::select('article_id',$articles,['class'=>'form-control ']) !!}
        </div>
        
        <div class="from_row_div">
            {!! Form::label('item_name_input','this will be the link /name_of_link',['class'=>'form_lable']) . Form::text('item_name_input', '',  ['placeholder' => 'menu item name']) !!}
        </div>
        
        <div class="from_row_div">
            {!!  Form::label('parent_item_id','the parent link',['class'=>'form_lable']) .Form::select('parent_item_id',array_add($menu_items->lists('name','id'),'0','select parent'),0,['class'=>'form-control ']) !!}
        </div>

        <div class="from_row_div">
            {!!  Form::label('disable',' disable or enable',['class'=>'form_lable']) .Form::select('disable',$disable_array,['class'=>'form-control ']) !!}
        </div>

        <div class="from_row_div">
            {!!   Form::label('hide','hide or show',['class'=>'form_lable']) .Form::select('hide',$hide_array,['class'=>'form-control ']) !!}
        </div>

        <div class="form_row_div">
            {!! Form::hidden('selected_id',$selected_id ) !!}
            {!! Form::submit('add link',["name"=>'add_menu_item_submit','class'=>'btn btn-primary' ]) !!}
        </div>
    </div><!-- .form_body_div -->
{!! Form::close() !!}
</div>

<div class="table-info">
    <div class="table-header">
        <div class="table-caption">

            {!! Form::button('add link',["id"=>'show_add_menu_item_button','onclick'=>'show_add_menu_item();','class'=>'btn btn-primary btn-flat' ]) !!}
                  
                        @if($errors->any())
                        <div class="alert alert-danger alert-dark">
                            @foreach($errors->all() as $key=>$error)
                            <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
                            @endforeach
                        </div>
                        @endif
        </div>
    </div>
    {!! Form::open() !!}
    {!! Form::hidden('selected_id',$selected_id) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>parent id</th>
            <th>parent </th>
            <th> disable</th>
            <th>hide</th>
            <th>link to page</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($menu_items as $item)
                <tr>
                    <td >{{ $item->id }}</td>
                    <td >{{ $item->name }}</td>
                    <td >{{ $item->parent_item_id }} </td>
                    <td> {{ $item->cms_menus_items['name'] }}</td>
                    <td >{{ $item->disable }}</td>
                    <td >{{ $item->hide }}</td>
                    <td >
                        @if($item->type == 0)
                        page  ({{ $item->page['title'] }})
                        @else
                        article ({{ $item->article['title'] }})
                        @endif
                    </td>
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_menu_item_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$item->id ]) !!}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
</div>


<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">the render menu preview  </span>
    </div>
    <div class="panel-body" id="preview_menu_div">
        
        
        
        <div class="dropdown" style="position:relative">
            
   {!! $menu_preview !!}
   
</div>
   
        
    </div>
    
    <div class="panel-body"  >
        {!! $render_menu_html !!}
    </div>
</div>

@endif
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>
@stop