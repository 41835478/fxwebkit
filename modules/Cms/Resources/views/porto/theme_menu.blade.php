<nav style="    clear: right;">
    <ul class="nav nav-pills nav-main" id="mainMenu">

        @foreach($menu_array as $menu)

            <li   class="@if($menu['id'] == $selected_id )  active @endif @if(isset($menu['children']) && $menu['children']!= null) dropdown @endif" >
                <a href="@if(!$menu['disable'] ) {{asset($menu['name'])}} @else # @endif">{{ str_replace('-',' ',$menu['translate']) }}</a>

                @if(isset($menu['children']) && $menu['children']!= null)
                <ul class="dropdown-menu">
                    @foreach($menu['children'] as $sub_menu)
                    <li @if($sub_menu['id'] == $selected_id )   class="active" @endif><a href="{{ asset($sub_menu['name']) }}">  {{  str_replace('-',' ',$sub_menu['translate']) }}</a></li>
                    @endforeach
                </ul>

                @endif

            </li>

        @endforeach

 </nav>
