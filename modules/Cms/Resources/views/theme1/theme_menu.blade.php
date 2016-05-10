  <ul class="nav" id="top-navigation">
      @foreach($menu_array as $menu)
      <li class="main_menu_li"><a href="{{ asset($menu['name']) }}"  @if($menu['id'] == $selected_id )   class="active" @endif  >{{ $menu['name'] }}</a>
      @if(isset($menu['children']) && $menu['children']!= null)
      <div class="sub_menu_container"> <div class="sub_menu">
      @foreach($menu['children'] as $sub_menu)
      <a href="{{ asset($sub_menu['name']) }}"  @if($sub_menu['id'] == $selected_id )   class="active" @endif  >{{ $sub_menu['name'] }}</a>
      
      @endforeach
          </div></div>
      @endif 
      
      </li>
      @endforeach
                        </ul>

<style type="text/css">
    .main_menu_li:hover  .sub_menu_container{ display: block;}
    .sub_menu_container{ position:relative; overflow: visible; z-index: 999999; display: none;   }
    .sub_menu{ position: absolute; top: 0px; right: 0px;  }
    .sub_menu a{
        display: block;
        padding: 5px;
        text-align: center;
        color:#fff;
         background-color:rgba(24,26,28,0.7);
         min-width: 120px;
    }   
    .sub_menu a:hover{

        color:rgb(24,26,28);
         background-color:#fff;
    }
</style>