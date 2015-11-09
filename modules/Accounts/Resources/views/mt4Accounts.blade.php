@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.mt4UsersList'))
@section('content')
<style type="text/css">
    #content-wrapper{ padding: 0px; margin: 0px;}
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
            <ul class="sections">
                <li class="active"><a href="#"> <i class="fa fa-search"></i> search </a></li>
                                                   <li>
                   <div class="   nav-input-div">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
								<span class="lbl">{{ trans('accounts::accounts.ExactLogin') }}</span>
							</label>
						</div>
					</div>
                   </li>
                 <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('accounts::accounts.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('accounts::accounts.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}</div></li>
            <li><div  class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.Name'),'class'=>'form-control input-sm']) !!}</div></li>
                <li>

                    <div class=" nav-input-div form-group ">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                                <span class="lbl">{{ trans('accounts::accounts.AllGroups') }}</span>
                            </label>
                        </div>
                        {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
                    </div>

                </li>


                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('accounts::accounts.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close() !!}


        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('accounts::accounts.accounts') }}
        </div>
        <div class="center_page_all_div">
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
                        {{ trans('reports::reports.accounts') }}  
                        <a href="{{ route('accounts.addMt4User') }}" style="float:right;">
                        <input name="new_menu_submit" class="btn btn-primary btn-flat" type="submit" value="{{ trans('general.add_mt4_user') }}"> </a>
                   </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Group'), 'GROUP', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Equity'), 'EQUITY', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Balance'), 'BALANCE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.AgentAccount'), 'AGENT_ACCOUNT', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Margin'), 'MARGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.MarginFree'), 'MARGIN_FREE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Leverage'), 'LEVERAGE', $oResults) !!}</th>
                            <th class="no-warp"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($oResults))
                        @foreach($oResults as $oResult)
                        <tr>
                            <td>{{ $oResult->LOGIN }}</td>
                            <td>{{ $oResult->NAME }}</td>
                            <td>{{ $oResult->GROUP }}</td>
                            <td>{{ $oResult->EQUITY }}</td>
                            <td>{{ $oResult->BALANCE }}</td>
                            
                            <td>{{ $oResult->AGENT_ACCOUNT }}</td>
                            <td>{{ $oResult->MARGIN }}</td>
                            <td>{{ $oResult->MARGIN_FREE }}</td>
                            <td>{{ $oResult->LEVERAGE }}</td>
                       <td><a href="{{ route('accounts.mt4UserDetails').'?login='. $oResult->LOGIN }}&from_date=&to_date=&search=Search&sort=asc&order=login">details</a></td>
                     
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer text-center">
                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    init.push(function () {


        $('#all-groups-chx').change(function () {

            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }
        });
        if ($('#all-groups-chx').prop('checked')) {
            $('#all-groups-slc').attr('disabled', 'disabled');
        } else {
            $('#all-groups-slc').removeAttr('disabled');
        }
                        
                        
			$('#exactLogin').change(function(){
				if ($('#exactLogin').prop('checked')) {
                                    $("#from_login_li,#to_login_li").hide();
                                    $("#login_li").show();
				} else {
                                    $("#from_login_li,#to_login_li").show();
                                    $("#login_li").hide();
				}
			});

				if ($('#exactLogin').prop('checked')) {
                                    $("#from_login_li,#to_login_li").hide();
                                    $("#login_li").show();
				} else {
                                    $("#from_login_li,#to_login_li").show();
                                    $("#login_li").hide();
				}

    });

</script>
@stop