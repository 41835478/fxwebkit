@extends('admin.layouts.main')
@section('title', trans('reports::reports.commission'))
@section('content')

            <!-- ______________________________________-->
          <style type="text/css">
    #content-wrapper{ padding: 0px; margin: 0px !important;height: auto; overflow:visible !important ;}
    .nav-input-div{padding:7px;}
    .mail-container-header{
        border-bottom: 1px solid #ccc;
        margin-bottom: 7px;
        padding: 5px !important;
    }
      .theme-default .page-mail{ overflow: visible;height: auto; min-height: 800px;}
    .center_page_all_div{ padding: 0px 10px;}
    .mail-nav .navigation{margin-top: 35px;}
</style>
<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
				{!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                                <ul class="sections" >
                <li class="active"><a href="#"> <i class="fa fa-search"></i> search </a></li>
                <li><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">
                    
						<div class="input-group date datepicker-warpper">
							{!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm']) !!}
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
						</div>
                    </div></li>
                
                
                   <li><div  class=" nav-input-div  ">
                       <div class="input-group date datepicker-warpper">
							{!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
						</div>
                       </div></li>
                   <li>
                   <div class="   nav-input-div">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
								<span class="lbl">{{ trans('reports::reports.AllGroups') }}</span>
							</label>
						</div>
					</div>
                   </li>
                   <li><div  class=" nav-input-div  ">{!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-groups-slc']) !!}</div></li>
                 


                <li><div  class=" nav-input-div  ">
					{!! Form::submit(trans('general.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


				{!! Form::hidden('sort', $aFilterParams['sort']) !!}
				{!! Form::hidden('order', $aFilterParams['order']) !!}
				{!! Form::close() !!}

        </div>
    </div>
            <!-- ___________________END___________________-->
            

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('reports::reports.commission') }}
        </div>
        <div class="center_page_all_div">
			@include('admin.partials.messages')

			@if (count($oResults[0]))
				<div class="stat-panel no-margin-b">
					<div class="stat-row">
						<div class="stat-counters bg-info no-padding text-center">
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Total Results {{ $oResults[0]->total() }}</span>
							</div>
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Results From {{ $oResults[0]->firstItem() }} to {{ $oResults[0]->lastItem() }}</span>
							</div>
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Page {{ $oResults[0]->currentPage() }} of {{ $oResults[0]->lastPage() }}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="padding-xs-vr"></div>
			@endif
			@if (count($oResults[0]))
				<div class="stat-panel no-margin-b">
					<div class="stat-row">
						<div class="stat-counters bg-info no-padding text-center">
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Total Commission : {{ round($oResults[1], 2) }}</span>
							</div>
							<div class="stat-cell col-xs-4 padding-xs-vr">
								<span class="text-xs">Total Lots : {{ round($oResults[2], 2) }}</span>
							</div>
							
						</div>
					</div>
				</div>
				<div class="padding-xs-vr"></div>
			@endif

			<div class="table-info">
				<div class="table-header">
					<div class="table-caption">
						{{ trans('reports::reports.commission') }}

						@if (count($oResults[0]))
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
							<th class="no-warp">{!! th_sort(trans('general.Symbol'), 'SYMBOL', $oResults[0]) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Commission'), 'COMMISSION', $oResults[0]) !!}</th>
							<th class="no-warp">{!! th_sort(trans('general.Lots'), 'VOLUME', $oResults[0]) !!}</th>
						</tr>
					</thead>
					<tbody>
						@if (count($oResults[0]))
							@foreach($oResults[0] as $oResult)
								<tr>
									<td>{{ $oResult->SYMBOL }}</td>
									<td>{{ round($oResult->COMMISSION, 2) }}</td>
									<td>{{ $oResult->VOLUME }}</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
				<div class="table-footer text-center">
					@if (count($oResults[0]))
						{!! str_replace('/?', '?', $oResults[0]->appends(Input::except('page'))->render()) !!}
					@endif
				</div>
			</div>
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