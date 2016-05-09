
@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')

	<div id="content-wrapper">
	<div class="page-header">
		<h1><i class="fa fa-dashboard page-header-icon"></i>{{ trans('dashboard.PageTitle') }}</h1>
	</div>

	<div class="col-xs-12 col-sm-6" >
		<div class="stat-panel ">
			<!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
			<a href="{{ route('accounts.accountsList').'?active=0'}}" class="stat-cell col-xs-5 bg-info bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
				<i class="fa fa-users"></i>&nbsp;&nbsp;<strong>{{$statistics['usersNumber']}}</strong>
			</a> <!-- /.stat-cell -->
			<!-- Without padding, extra small text -->
			<div class="stat-cell col-xs-7 no-padding valign-middle">
				<!-- Add parent div.stat-rows if you want build nested rows -->
				<div class="stat-rows">
					<div class="stat-row">
						<!-- Success background, small padding, vertically aligned text -->
						<a href="{{ route('accounts.accountsList').'?active=1'}}" class="stat-cell bg-info padding-sm valign-middle">
							{{$statistics['activeUsersNumber']}} {{ trans('dashboard.activeAccount') }}
							<i class="fa fa-check pull-right"></i>
						</a>
					</div>
					<div class="stat-row">
						<!-- Success darken background, small padding, vertically aligned text -->
						<a href="{{ route('accounts.accountsList').'?active=2'}}" class="stat-cell bg-info darken padding-sm valign-middle">
							{{  $statistics['usersNumber'] - $statistics['activeUsersNumber']}} {{ trans('dashboard.notActive') }}
							<i class="fa fa-times pull-right"></i>
						</a>
					</div>
					<div class="stat-row">
						<!-- Success darker background, small padding, vertically aligned text -->
						<a href="{{ route('accounts.accountsList').'?active=0'}}" class="stat-cell bg-info darker padding-sm valign-middle">
							{{$statistics['usersNumber']}}{{ trans('dashboard.user') }}
							<i class="fa fa-users pull-right"></i>
						</a>
					</div>
				</div> <!-- /.stat-rows -->
			</div> <!-- /.stat-cell -->
		</div>

	</div>


	<div class="col-xs-12 col-sm-6" >
		<div class="stat-panel ">
			<!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
			<a href="{{ route('accounts.Mt4UsersList').'?server_id=-1'}}"  class="stat-cell col-xs-5 bg-info bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
				<i class="fa fa-exchange"></i>&nbsp;&nbsp;<strong>{{$statistics['mt4UsersNumber']}}</strong>
			</a> <!-- /.stat-cell -->
			<!-- Without padding, extra small text -->
			<div class="stat-cell col-xs-7 no-padding valign-middle">
				<!-- Add parent div.stat-rows if you want build nested rows -->
				<div class="stat-rows">
					<div class="stat-row">
						<!-- Success background, small padding, vertically aligned text -->
						<a href="{{ route('accounts.Mt4UsersList').'?server_id=0'}}" class="stat-cell bg-info padding-sm valign-middle">
						{{ 	$statistics['liveMt4UsersNumber']}}{{ trans('dashboard.liveMt4User') }}
							<i class="fa fa-thumbs-up pull-right"></i>
						</a>
					</div>
					<div class="stat-row">
						<!-- Success darken background, small padding, vertically aligned text -->
						<a href="{{ route('accounts.Mt4UsersList').'?server_id=1'}}" class="stat-cell bg-info darken padding-sm valign-middle">
							{{$statistics['mt4UsersNumber'] - $statistics['liveMt4UsersNumber'] }}{{ trans('dashboard.demoMt4User') }}
							<i class="fa fa-user pull-right"></i>
						</a>
					</div>
					<div class="stat-row">
						<!-- Success darker background, small padding, vertically aligned text -->
						<a href="{{ route('accounts.Mt4UsersList').'?server_id=-1'}}" class="stat-cell bg-info darker padding-sm valign-middle">
							{{$statistics['mt4UsersNumber']}}{{ trans('dashboard.mt4User') }}
							<i class="fa fa-users pull-right"></i>
						</a>
					</div>
				</div> <!-- /.stat-rows -->
			</div> <!-- /.stat-cell -->
		</div>

	</div>

	<div class="clearFix" style="clear:both;"></div>


</div>

@stop

