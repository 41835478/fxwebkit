@extends(Config::get('cms.admin_theme'))

@section('content')
<div id="cms_add_page_all_div">
    <form action="" method="get" name="pages_select_from">
        <select name="page_id" onchange="$(this).parent().submit();">
            @foreach($pages as $page)
            <option {{ ($page->id ==$page_id)? 'selected':"" }} value="{{ $page->id }}">{{ $page->title }}</option>
            @endforeach
        </select>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="submit" value="display page"  name="display_page_submit">

    </form>

    <form action="" method="post">
        <input type="text" name='new_page_name_input' placeholder="new page name" >

        <input type="hidden" name="page_id" value="{{ $page_id }}" />
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="submit" name="new_page_submit" value="create new page">

    </form>

</div>
@if($page_id)

@include('cms::'.Config::get('cms.theme_folder').'.theme')



<div id="add_module_form_all_div">
    <div class="close_pupup_div" >X</div>   
    <form  class="form"action="" method="post">
        <div class="form_head_div">

            add module to the page

        </div>
        <div class="form_body_div">

            <div class="from_row_div">
                <label for="module_type_0" >
                    <label class="form_lable">

                        <input type="radio" name="type" id="module_type_0" class="module_type_radio" value="0"  checked="true">   
                    </label>

                    <select name="module_id" onchange="get_module_options($(this))" onload="$(this).change();">
                        @foreach($modules_list as $key=>$module)
                        <option value="{{ $key }}" data-type="{{ $module['type'] or 0 }}">{{ $module['name'] }}</option>
                        @endforeach
                    </select>
                   <!--  <input type="text" name="module_variable" id="module_variable"  placeholder="module variables"> -->
                    <select name="module_variable" id="module_variable" >

                    </select>
                </label>
            </div>


            <div class="from_row_div">
                <label for="module_type_1" >
                    <lable class="form_lable">
                        <input type="radio" name="type" id="module_type_1"  class="module_type_radio" value="-1" >
                    </lable>
                    <select name="menu_id">
                        @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                        @endforeach
                    </select>
                </label>
            </div><!-- .from_row_div -->

            <div class="from_row_div">
                <label for="module_type_2" >
                    <lable class="form_lable">
                        <input type="radio" name="type"  id="module_type_2" class="module_type_radio" value="-2" >
                    </lable>
                    <label  >articles place</label>
                </label>
            </div ><!-- .from_row_div -->



            <div class="from_row_div">
                <lable class="form_lable">module order</lable>
                <input type="text" name='order' placeholder="module order" >
                </dvi><!-- from_row_div -->

                <div class="from_row_div">
                    <label class="form_lable">
                        float
                    </label>
                    <select name="float">
                        @foreach($float_array as $key=>$float)
                        <option value="{{ $key }}">{{ $float }}</option>
                        @endforeach
                    </select>
                </div><!-- .from_row_div -->

                <div class="from_row_div">
                    <label class="form_lable">
                        display
                    </label>
                    <select name="display">
                        @foreach($display_array as $key=>$display)
                        <option value="{{ $key }}">{{ $display }}</option>
                        @endforeach
                    </select>
                </div><!-- .from_row_div -->


                <div class="from_row_div">
                    <label class="form_lable">


                        <input type="radio" name="all_pages" id="all_pages_0" value="0" >  
                    </label>
                    <label for="all_pages_0">all page</label>
                </div>


                <div class="from_row_div">
                    <label class="form_lable">

                        <input type="radio" name="all_pages" id="all_pages_1"  value="1" checked="true" >        
                    </label>  
                    <label for="all_pages_1">just selected pages</label>
                </div>


                <div class="from_row_div">
                    <label class="form_lable">

                        <input type="radio" name="all_pages"  id="all_pages_2" value="2"  >       
                    </label>
                    <label for="all_pages_2">except pages</label>  
                </div>


                <div class="from_row_div">
                    <label class="form_lable">
select pages
                    </label>
                    <select name="selected_pages[]" multiple="true"> 
                        @foreach($pages as $page)
                        <option {{ ($page->id ==$page_id)? 'selected':"" }} value="{{ $page->id }}">{{ $page->title }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="from_row_div">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="position"id="add_module_position_name_input" value="" />
                    <input type="hidden" name="page_id" value="{{ $page_id }}" />
                    <input type="submit" name="add_module_submit" value="add module">
                </div>

            </div><!-- .form_body_div -->
    </form>

</div>

<form id="remove_module_form" method="post">

    <input type="hidden" name="page_id" value="{{ $page_id }}" />
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="remove_module_id" id="remove_module_id" value="" >
</form>
@endif

<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pages.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_pages.js') }}"></script>

@stop