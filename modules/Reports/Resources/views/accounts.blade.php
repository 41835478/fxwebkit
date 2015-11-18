@extends('admin.layouts.main')
@section('title', trans('reports::reports.accounts'))
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
                                <span class="lbl">{{ trans('reports::reports.ExactLogin') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('reports::reports.Name'),'class'=>'form-control input-sm']) !!}</div></li>
                <li>

                    <div class=" nav-input-div form-group ">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                                <span class="lbl">{{ trans('reports::reports.AllGroups') }}</span>
                            </label>
                        </div>
                        {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
                    </div>

                </li>


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

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('reports::reports.accounts') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')


            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.accounts') }}

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
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Name'), 'NAME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Group'), 'GROUP', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Equity'), 'EQUITY', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Balance'), 'BALANCE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.AgentAccount'), 'AGENT_ACCOUNT', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Margin'), 'MARGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.MarginFree'), 'MARGIN_FREE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Leverage'), 'LEVERAGE', $oResults) !!}</th>
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
                          <td><a href="{{ route('accounts.mt4UserDetails').'?login='. $oResult->LOGIN }}&from_date=&to_date=&search=Search&sort=asc&order=login" class="fa fa-file-text"></a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer text-center">
                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                   
                    <div class="col-sm-3  padding-xs-vr">
                        <span class="text-xs">Showing {{ $oResults->firstItem() }} to {{ $oResults->lastItem() }} of {{ $oResults->total() }} entries</span>
                    </div>
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


        $('#exactLogin').change(function () {
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