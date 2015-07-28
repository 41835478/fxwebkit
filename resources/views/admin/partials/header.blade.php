<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
	<button type="button" id="main-menu-toggle">
		<i class="navbar-icon fa fa-bars icon"></i>
		<span class="hide-menu-text">HIDE MENU</span>
	</button>

	<div class="navbar-inner">
		<div class="navbar-header">
			<a href="index.html" class="navbar-brand">
				<div>
					{!! HTML::image('assets/img/logo.png') !!}
				</div>
				{{ app_name() }}
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse">
				<i class="navbar-icon fa fa-bars"></i>
			</button>
		</div>

		<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
			<div>
				<div class="right clearfix">
					<ul class="nav navbar-nav pull-right right-navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
								<img src="data:image/jpeg;base64,{{ current_user()->getAvatar() }}" alt="">
								<span>{{ current_user()->getName() }}</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">
										<i class="dropdown-icon fa fa-user"></i>&nbsp;&nbsp;
										{{ Lang::get('general.Profile') }}
									</a>
								</li>
								<li>
									<a href="#">
										<i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;
										{{ Lang::get('general.Settings') }}
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="{{ route('admin.auth.logout') }}">
										<i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;
										{{ Lang::get('general.Logout') }}
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>