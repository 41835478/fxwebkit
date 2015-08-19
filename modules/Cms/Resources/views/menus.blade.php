@extends(Config::get('cms.admin_theme'))

@section('content')

<form action="" method="post" id="create_menu_form">
        <input type="text" name='new_menu_name_input' placeholder="new menu name" >

        <input type="hidden" name="selected_id" value="{{ $selected_id }}" />
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="submit" name="new_menu_submit" value="create new menu">

</form>

@if(count($menus))
<form action="" method="post" name="pages_select_from">
        <select name="selected_id" onchange="$(this).parent().submit();">
            @foreach($menus as $menu)
            <option {{ ($menu->id ==$selected_id)? 'selected':"" }} value="{{ $menu->id }}">{{ $menu->title }}</option>
            @endforeach
        </select>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="submit" value="display menu"  name="select_menu_submit">
        <input type="submit" value="delete menu"  name="delete_menu_submit">

    </form>
@endif

@if($selected_id != 0)


<button id="show_add_menu_item_button" onclick="show_add_menu_item();">add item</button>

<div id="add_menu_item_form_all_div">
    <div class="close_pupup_div" >X</div>   
    <form action="" method="post" class="form">
   
                <div class="form_head_div">

            add link to this menu

        </div>
        <div class="form_body_div">
            
            <div class="from_row_div">
                    <label class="form_lable">
         <input type="radio" name="type" class="menu_type_radio" value="0"  checked="true">
                    </label>
        <select name="page_id">
            @foreach($pages as $page)
            <option value="{{ $page->id }}">{{ $page->title }}</option>
            @endforeach
        </select>
            </div>
         <div class="from_row_div">
                    <label class="form_lable">
         <input type="radio" name="type" class="menu_type_radio" value="1"  checked="true">
                    </label>
        <select name="article_id">
            @foreach($articles as $article)
            <option value="{{ $article->id }}">{{ $article->title }}</option>
            @endforeach
        </select>
         </div>
     
              
         <div class="from_row_div">
                    <label class="form_lable">
                        this will be the link /name_of_link
                    </label>
           <input name="item_name_input" placeholder="menu item name">
         </div>
         
         <div class="from_row_div">
                    <label class="form_lable">
      the parent link
                    </label>
        <select name="parent_item_id">
            <option value="0">select parent node</option>
            @foreach($menu_items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
         </div>

        <div class="from_row_div">
                    <label class="form_lable">
                        disable or enable
                    </label>
        <select name="disable">
            @foreach($disable_array as $key=>$disable)
            <option value="{{ $key }}">{{ $disable }}</option>
            @endforeach
        </select>
        </div>
                        
                        <div class="from_row_div">
                    <label class="form_lable">
              hide or show
                    </label>
                        
        <select name="hide">
            @foreach($hide_array as $key=>$hide)
            <option value="{{ $key }}">{{ $hide }}</option>
            @endforeach
        </select>
                        </div>
            
            <div class="form_row_div">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        
        <input type="hidden" name="selected_id" value="{{ $selected_id }}" />
        <input type="submit" name="add_menu_item_submit" value="add link">
            </div>
        </div><!-- .form_body_div -->
    </form>

</div>


<form method="post">
    <table border="0" class="primary_table">
    <thead>
    <th>id</th>
    <th>name</th>
    <th>parent id</th>
    <th>parent </th>
    <th> disable</th>
    <th>hide</th>
    <th>link to page</th>
    <th>remove</th>
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
    <td><button name="remove_menu_item_submit" value="{{ $item->id }}">X</button> </td>
        <tr>
    @endforeach
</tbody>
<tfoot>

</tfoot>
</table>
    
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
</form>
<div id="preview_menu_div">
    <h3>the render menu preview </h3>
    {!! $render_menu_html !!}
    
</div>
@endif
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>

@stop