<div class="row" id="headerMenuRow">
    <div class="container">
        <div id="mainMenuDiv">
            <ul id="mainMenuUl">
                <li class="">
                    <a href="/">Home</a>
                </li>
                @foreach($menu_array as $menu)
                    <li class=" @if($menu['id'] == $selected_id )  active @endif "><a href="#">{{ str_replace('-',' ',$menu['translate']) }}</a>
                        @if(isset($menu['children']) && $menu['children']!= null)
                        <div class="zeroSubmenuDiv">
                            <div class="subMenuDiv">

                                <ul class="submenuUl">
                                    @foreach($menu['children'] as $sub_menu)
                                    <li class="@if($sub_menu['id'] == $selected_id )   active @endif" >
                                        <a href="{{ asset(strtolower($sub_menu['name'])) }}">
                                            {{  str_replace('-',' ',$sub_menu['translate']) }}
                                        </a> </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                    </li>
                @endforeach

            </ul>
        </div>
    </div>

    <div class="horizLine">&nbsp;</div>
</div>


{{--<ul class="b-top-nav__1level_wrap ">--}}

    {{--@foreach($menu_array as $menu)--}}

    {{--<li class=" b-top-nav__1level f-top-nav__1level  f-primary-b  @if($menu['id'] == $selected_id )  active @endif ">--}}
        {{--<a href='{{ asset($menu['name']) }}' onclick="return false;" >--}}

            {{--<i class="fa fa-folder-open b-menu-1level-ico"></i>{{ str_replace('-',' ',$menu['translate']) }}<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span>--}}

        {{--</a>--}}


        {{--@if(isset($menu['children']) && $menu['children']!= null)--}}
            {{--<div class="b-top-nav__dropdomn" style="display:none;opacity:0; ">--}}
                {{--<ul class=" b-top-nav__2level_wrap ">--}}

                {{--@foreach($menu['children'] as $sub_menu)--}}
                        {{--<li class=" b-top-nav__2level f-top-nav__2level f-primary  @if($sub_menu['id'] == $selected_id )   active @endif">--}}
                            {{--<a href='{{ asset(strtolower($sub_menu['name'])) }}' >--}}
                                {{--{{  str_replace('-',' ',$sub_menu['translate']) }}--}}
                            {{--</a>--}}
                        {{--</li>--}}
                          {{--@endforeach--}}
                {{--<ul>--}}
            {{--</div>--}}

        {{--@endif--}}



    {{--</li>--}}


    {{--@endforeach--}}

{{--</ul>--}}
