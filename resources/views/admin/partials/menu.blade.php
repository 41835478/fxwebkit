<div id="main-menu" role="navigation">
    <div id="main-menu-inner">
        <div class="menu-content top" id="menu-content-demo">
            <div>
                <br><img src="data:image/jpeg;base64,{{ current_user()->getAvatar() }}" alt="" class="">
                <div class="btn-group">
                    <a href="{{ route('admin.users.profile') }}" class="btn btn-xs btn-primary btn-outline dark">
                        <i class="fa fa-user"></i>
                    </a>
                    <a href="{{ route('admin.editProfile') }}" class="btn btn-xs btn-primary btn-outline dark">
                        <i class="fa fa-cog"></i>
                    </a>
                    <a href="{{ route('admin.auth.logout') }}" class="btn btn-xs btn-danger btn-outline dark">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </div>
        </div>
        <ul class="navigation">
            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="menu-icon fa fa-dashboard"></i>
                    <span class="mm-text">{{ trans('dashboard.PageTitle') }}</span>
                </a>
            </li>
            {{--*/ $aAdminMenu = get_admin_menu() /*--}}
            @if(count($aAdminMenu))
            @foreach($aAdminMenu as $aModule)
            <li class="mm-dropdown">
                <a href="{{$aModule['route']}}">
                    <i class="menu-icon fa {{$aModule['icon']}}"></i>
                    <span class="mm-text">{{$aModule['title']}}</span>
                </a>
                @if (count($aModule['menu']))
                <ul>
                    @foreach($aModule['menu'] as $aSubMenu)
                    <li>
                        <a tabindex="-1" href="{{ $aSubMenu['route'] }}">
                            <i class="menu-icon fa {{ $aSubMenu['icon'] }}"></i>
                            <span class="mm-text">{{ $aSubMenu['title'] }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
            @endif

        </ul>
    </div>
</div>