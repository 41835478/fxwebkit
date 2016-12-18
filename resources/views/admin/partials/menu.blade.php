  <!-- .Side panel -->
  <div class=" side-mini-panel"   >
    <ul class="mini-nav">
         <div class="togglediv"><a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a></div>



  {{--*/ $aAdminMenu = get_admin_menu() /*--}}
            @if(count($aAdminMenu))
            @foreach($aAdminMenu as $aModule)

            {{--{{$aModule['route']}}--}}
            {{--{{$aModule['icon']}}--}}
            {{----}}




<li class="@if( $aModule['title']=="Settings") selected @endif"> <a href="javascript:void(0)"><i class="fa {{$aModule['icon']}}" data-icon="v"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
        <h3 class="menu-title">{{$aModule['title']}}</h3>
        <div class="searchable-menu">
            <form role="search" class="menu-search">
                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
        </div>
        <ul class="sidebar-menu">

                        @if (count($aModule['menu']))
                 @foreach($aModule['menu'] as $aSubMenu)

                 {{--{{ $aSubMenu['icon'] }}--}}

 <li><a href=" {{ $aSubMenu['route'] }}?search=1">{{ $aSubMenu['title'] }}</a></li>
                    @endforeach

                @endif



            <hr>
            <h3 class="menu-title">Other Demos</h3>
            <li><a href="../eliteadmin-inverse/index.html" target="_blank">Eliteadmin Inverse</a></li>
        </ul>
        <!-- Left navbar-header end -->
    </div>
</li>



            @endforeach
            @endif
    </ul>
  </div>
  <!-- /.Side panel -->





















{{--"data:image/jpeg;base64,{{ current_user()->getAvatar() }}--}}
{{--{{ route('admin.users.profile') }}--}}
{{--{{ route('admin.auth.logout') }}--}}
{{--{{ route('admin.index') }}--}}
{{--{{ trans('dashboard.PageTitle') }}--}}

            {{--*/ $aAdminMenu = get_admin_menu() /*--}}
            {{--@if(count($aAdminMenu))--}}
            {{--@foreach($aAdminMenu as $aModule)--}}

            {{--{{$aModule['route']}}--}}
            {{--{{$aModule['icon']}}--}}
            {{--{{$aModule['title']}}--}}

                {{--@if (count($aModule['menu']))--}}
                 {{--@foreach($aModule['menu'] as $aSubMenu)--}}
                 {{--{{ $aSubMenu['route'] }}--}}
                 {{--{{ $aSubMenu['icon'] }}--}}
{{--{{ $aSubMenu['title'] }}--}}

                    {{--@endforeach--}}

                {{--@endif--}}


            {{--@endforeach--}}
            {{--@endif--}}

