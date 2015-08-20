@extends('admin.layouts.main')
@section('title', trans('reports::reports.OpenOrders'))
@section('content')
	<div class="page-header">
		<h1>{{ trans('reports::reports.OpenOrders') }}</h1>
	</div>

	<div class="row">
		<div class="col-sm-2">
			<div class="panel panel-info panel-dark">
				<div class="panel-heading">
					<span class="panel-title">
						<i class="panel-title-icon fa fa-search"></i>
						{{ trans('general.Search') }}
					</span>
				</div>
				{!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
				<div class="panel-body">

					<div class="row form-group no-border-t no-padding-t">
						{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}
					</div>
					<div class="row form-group no-border-t no-padding-t">
						{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}
					</div>

					<div class="row form-group no-margin-b">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
								<span class="lbl">{{ trans('reports::reports.AllGroups') }}</span>
							</label>
						</div>
					</div>
					<div class="row form-group no-border-t no-padding-t">
						{!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-groups-slc']) !!}
					</div>

					<div class="row form-group no-margin-b">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('all_symbols', 1, $aFilterParams['all_symbols'], ['class'=>'px','id'=>'all-symbols-chx']) !!}
								<span class="lbl">{{ trans('reports::reports.AllSymbols') }}</span>
							</label>
						</div>
					</div>
					<div class="row form-group no-border-t no-padding-t">
						{!! Form::select('symbol[]', $aSymbols, $aFilterParams['symbol'], ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-symbols-slc']) !!}
					</div>

					<div class="row form-group no-margin-b">
						{!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}
					</div>

				</div>

				<div class="panel-footer text-right">
					{!! Form::submit(trans('general.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
				</div>
				{!! Form::hidden('sort', $aFilterParams['sort']) !!}
				{!! Form::hidden('order', $aFilterParams['order']) !!}
				{!! Form::close() !!}
			</div>
		</div>
		<div class="col-sm-10">
			@include('admin.partials.messages')

			@if (count($oResults))
				<div class="stat-panel no-margin-b">
					<div class="stat-row">
						<div class="stat-counters bg-info no-padding text-center">
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Total Results {{ $oResults->total() }}</span>
							</div>
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Results From {{ $oResults->firstItem() }} to {{ $oResults->lastItem() }}</span>
							</div>
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Page {{ $oResults->currentPage() }} of {{ $oResults->lastPage() }}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="padding-xs-vr"></div>
			@endif

			<div class="table-info">
				<div class="table-header">
					<div class="table-caption">
						{{ trans('reports::reports.OpenOrders') }}

						@if (count($oResults))
							<div class="panel-heading-controls">
								<div class="btn-group btn-group-xs">
									<button data-toggle="dropdown" type="button" class="btn btn-success dropdown-toggle">
										<span class="fa fa-cog"></span>&nbsp;
										<span class="fa fa-caret-down"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right">
										<li>
											<a href="{{ Request::fullUrl() }}&export=xls">
												<i class="dropdown-icon fa fa-camera-retro"></i>
												{{ trans('general.Export') }}
											</a>
										</li>
									</ul>
								</div>
							</div>
						@endif
					</div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="no-warp">{!! th_sort(trans('general.Order#'), 'TICKET', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Login'), 'LOGIN', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Symbol'), 'SYMBOL', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Type'), 'CMD', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Lots'), 'VOLUME', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.OpenPrice'), 'OPEN_PRICE', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.SL'), 'SL', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.TP'), 'TP', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Commission'), 'COMMISSION', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Swaps'), 'SWAPS', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Price'), 'CLOSE_PRICE', $oResults) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Profit'), 'PROFIT', $oResults) !!}</th>
						</tr>
					</thead>
					<tbody>
						@if (count($oResults))
							@foreach($oResults as $oResult)
								<tr>
									<td>{{ $oResult->TICKET }}</td>
									<td>{{ $oResult->LOGIN }}</td>
									<td>{{ $oResult->SYMBOL }}</td>
									<td>{{ $oResult->TYPE }}</td>
									<td>{{ $oResult->VOLUME }}</td>
									<td>{{ $oResult->OPEN_PRICE }}</td>
									<td>{{ $oResult->SL }}</td>
									<td>{{ $oResult->TP }}</td>
									<td>{{ $oResult->COMMISSION }}</td>
									<td>{{ $oResult->SWAPS }}</td>
									<td>{{ $oResult->CLOSE_PRICE }}</td>
									<td>{{ $oResult->PROFIT }}</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
				<div class="table-footer">
					@if (count($oResults))
						{!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
					@endif
				</div>
			</div>
		</div>
	</div>
	<script>
		init.push(function () {
			$('#all-groups-chx').change(function(){
				if ($('#all-groups-chx').prop('checked')) {
					$('#all-groups-slc').attr('disabled', 'disabled');
				} else {
					$('#all-groups-slc').removeAttr('disabled');
				}
			});

			$('#all-symbols-chx').change(function(){
				if ($('#all-symbols-chx').prop('checked')) {
					$('#all-symbols-slc').attr('disabled', 'disabled');
				} else {
					$('#all-symbols-slc').removeAttr('disabled');
				}
			});

			if ($('#all-groups-chx').prop('checked')) {
				$('#all-groups-slc').attr('disabled', 'disabled');
			} else {
				$('#all-groups-slc').removeAttr('disabled');
			}

			if ($('#all-symbols-chx').prop('checked')) {
				$('#all-symbols-slc').attr('disabled', 'disabled');
			} else {
				$('#all-symbols-slc').removeAttr('disabled');
			}
		});
	</script>
@stop