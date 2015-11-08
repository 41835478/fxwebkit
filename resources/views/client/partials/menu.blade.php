<div id="main-menu" role="navigation">
	<div id="main-menu-inner">
		<div class="menu-content top" id="menu-content-demo">
			<div>
				<div class="text-bg"><span class="text-slim">{{ Lang::get('general.Welcome') }},</span> <span class="text-semibold">{{ current_user()->getFirstName() }}</span></div>
				<img src="data:image/jpeg;base64,{{ current_user()->getAvatar() }}" alt="" class="">
				<div class="btn-group">
					<a href="{{ route('client.users.profile') }}" class="btn btn-xs btn-primary btn-outline dark">
						<i class="fa fa-user"></i>
					</a>
					<a href="{{ route('client.users.settings') }}" class="btn btn-xs btn-primary btn-outline dark">
						<i class="fa fa-cog"></i>
					</a>
					<a href="{{ route('client.auth.logout') }}" class="btn btn-xs btn-danger btn-outline dark">
						<i class="fa fa-power-off"></i>
					</a>
				</div>
			</div>
		</div>
		<ul class="navigation">
			<li>
				<a href=" "><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Dashboard</span></a>
			</li>
			<li>
				<a href="{{ route('clients.reports.closedOrders') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">close order</span></a>
			</li>
			<li>
				<a href="{{ route('clients.reports.openOrders') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">open order</span></a>
			</li>

			<li>
				<a href="{{ route('clients.reports.accounts') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Accounts</span></a>
			</li>

			<li>
				<a href="{{ route('clients.reports.accountStatement') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Account Statement</span></a>
			</li>


			<li>
				<a href="{{ route('clients.reports.commission') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Commission</span></a>
			</li>

			<li>
				<a href="{{ route('clients.reports.agentCommission') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Agent Commission</span></a>
			</li>

			<li>
				<a href="{{ route('clients.reports.accountant') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Accountant </span></a>
			</li>
{{--*/ $aAdminMenu = get_client_menu() /*--}}
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