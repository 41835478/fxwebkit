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
				<a href=""><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Dashboard</span></a>
			</li>

		
		</ul>
	</div>
</div>