

<ul class="b-top-nav__1level_wrap ">

    @foreach($menu_array as $menu)

    <li class=" b-top-nav__1level f-top-nav__1level  f-primary-b  @if($menu['id'] == $selected_id )  active @endif ">
        <a href='{{ asset($menu['name']) }}' >

            <i class="fa fa-folder-open b-menu-1level-ico"></i>{{ str_replace('-',' ',$menu['name']) }}<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span>

        </a>


        @if(isset($menu['children']) && $menu['children']!= null)
            <div class="b-top-nav__dropdomn" style="display:none;opacity:0; ">
                <ul class=" b-top-nav__2level_wrap ">

                @foreach($menu['children'] as $sub_menu)
                        <li class=" b-top-nav__2level f-top-nav__2level f-primary  @if($sub_menu['id'] == $selected_id )   active @endif">
                            <a href='{{ asset(strtolower($sub_menu['name'])) }}' >
                                {{  str_replace('-',' ',$sub_menu['name']) }}
                            </a>
                        </li>
                          @endforeach
                <ul>
            </div>

        @endif



    </li>


    @endforeach

</ul>
