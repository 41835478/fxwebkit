@extends('admin.layouts.main')
@section('title', trans('reports::reports.ClosedOrders'))
@section('content')
	<div class="page-header">
		<h1>{{ trans('reports::reports.ClosedOrders') }}</h1>
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

					<div class="row form-group">
						<div class="input-group date datepicker-warpper">
							{!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm']) !!}
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
						</div>
					</div>
					<div class="row form-group no-border-t no-padding-t">
						<div class="input-group date datepicker-warpper">
							{!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
						</div>
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
				{!! Form::close() !!}
			</div>
		</div>
		<div class="col-sm-10">
			@include('admin.partials.messages')
			<div class="table-info">
				<div class="table-header overflow-a">
					<div class="table-caption pull-left">
						{{ trans('reports::reports.ClosedOrders') }}
					</div>
					<div class="pull-right">
						@if (count($oResults))
							<a href="{{ Request::fullUrl() }}&export=xls" class="btn btn-xs btn-labeled btn-success">
								<span class="btn-label icon fa fa-camera-retro"></span>
								{{ trans('general.Export') }}
							</a>
						@endif
					</div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>{{ trans('general.Order#') }}</th>
							<th>{{ trans('general.Login') }}</th>
							<th>{{ trans('general.Symbol') }}</th>
							<th>{{ trans('general.Type') }}</th>
							<th>{{ trans('general.Lots') }}</th>
							<th>{{ trans('general.OpenPrice') }}</th>
							<th>{{ trans('general.SL') }}</th>
							<th>{{ trans('general.TP') }}</th>
							<th>{{ trans('general.Commission') }}</th>
							<th>{{ trans('general.Swaps') }}</th>
							<th>{{ trans('general.Price') }}</th>
							<th>{{ trans('general.Profit') }}</th>
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
			var options = {
				todayBtn: "linked",
				orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto',
				format: "yyyy-mm-dd"
			}
			$('.datepicker-warpper').datepicker(options);

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