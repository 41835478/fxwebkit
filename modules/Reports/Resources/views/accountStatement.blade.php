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
    .center_page_all_div{ padding: 0px 10px;}
    .mail-nav .navigation{margin-top: 35px;}
</style>
<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections">
                <li><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div> </li>

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


            @if (count($oResults))
            <div class="stat-panel no-margin-b">
                <div class="stat-row">
                    <div class="stat-counters bg-info no-padding text-center">
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Account :{{ $oResults->LOGIN }} </span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Name :{{ $oResults->NAME }}  </span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Leverage :{{ $oResults->LEVERAGE }} </span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="padding-xs-vr"></div>

            <!-- _____________open _  order___________________-->
            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.OpenOrders') }}

                        @if (count($oOpenResults))
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
                            <th class="no-warp">{!! th_sort(trans('general.Order#'), 'TICKET', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.OpenTime'), 'OPEN_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Symbol'), 'SYMBOL', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Type'), 'CMD', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Lots'), 'VOLUME', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.OpenPrice'), 'OPEN_PRICE', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.SL'), 'SL', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.TP'), 'TP', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.CloseTime'), 'CLOSE_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Taxes'), 'TAXES', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Swaps'), 'SWAPS', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Price'), 'CLOSE_PRICE', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Profit'), 'PROFIT', $oOpenResults) !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($oOpenResults))
                        @foreach($oOpenResults as $oResult)
                        <tr>
                            <td>{{ $oResult->TICKET }}</td>
                            <td>{{ $oResult->OPEN_TIME }}</td>
                            <td>{{ $oResult->SYMBOL }}</td>
                            <td>{{ $oResult->TYPE }}</td>
                            <td>{{ $oResult->VOLUME }}</td>
                            <td>{{ $oResult->OPEN_PRICE }}</td>
                            <td>{{ $oResult->SL }}</td>
                            <td>{{ $oResult->TP }}</td>
                            <td>{{ $oResult->CLOSE_TIME }}</td>
                            <td>{{ $oResult->TAXES }}</td>
                            <td>{{ $oResult->SWAPS }}</td>
                            <td>{{ $oResult->CLOSE_PRICE }}</td>
                            <td>{{ $oResult->PROFIT }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer">

                </div>
            </div>

            <!-- ___________________close_order______________-->



            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.ClosedOrders') }}

                        @if (count($oCloseResults))
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
                            <th class="no-warp">{!! th_sort(trans('general.Order#'), 'TICKET', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.OpenTime'), 'OPEN_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Symbol'), 'SYMBOL', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Type'), 'CMD', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Lots'), 'VOLUME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.OpenPrice'), 'OPEN_PRICE', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.SL'), 'SL', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.TP'), 'TP', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.CloseTime'), 'CLOSE_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Taxes'), 'TAXES', $oCloseResults) !!}</th>

                            <th class="no-warp">{!! th_sort(trans('general.Swaps'), 'SWAPS', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Price'), 'CLOSE_PRICE', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('general.Profit'), 'PROFIT', $oCloseResults) !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($oCloseResults))
                        @foreach($oCloseResults as $oResult)
                        <tr>
                            <td>{{ $oResult->TICKET }}</td>
                            <td>{{ $oResult->OPEN_TIME }}</td>
                            <td>{{ $oResult->SYMBOL }}</td>
                            <td>{{ $oResult->TYPE }}</td>
                            <td>{{ $oResult->VOLUME }}</td>
                            <td>{{ $oResult->OPEN_PRICE }}</td>
                            <td>{{ $oResult->SL }}</td>
                            <td>{{ $oResult->TP }}</td>
                            <td>{{ $oResult->CLOSE_TIME }}</td>
                            <td>{{ $oResult->TAXES }}</td>
                            <td>{{ $oResult->SWAPS }}</td>
                            <td>{{ $oResult->CLOSE_PRICE }}</td>
                            <td>{{ $oResult->PROFIT }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer text-center">

                </div>
            </div>

            <!-- ___________________________footer_summery_____________-->
            @if (count($oResults))
            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.Summary') }}

                    </div>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th class="no-warp">Deposit / Withdrawal :</th><td>{{ $aSummery['deposit'] }}</td>
                        <th class="no-warp">Credit Facility :</th><td>{{ $aSummery['credit_facility'] }}</td>
                        <th class="no-warp"></th><td></td>
                    </tr>
                    <tr>
                        <th class="no-warp">Closed Trade P/L : </th><td>{{ $aSummery['closed_trade'] }}</td>
                        <th class="no-warp">Floating P/L : </th><td>{{ $aSummery['floating'] }}</td>
                        <th class="no-warp">Margin : </th><td>{{ $oResults->MARGIN }}</td>
                    </tr>
                    <tr>
                        <th class="no-warp">Balance : </th><td>{{ $oResults->BALANCE }}</td>
                        <th class="no-warp">Equity : </th><td>{{ $oResults->EQUITY }}</td>
                        <th class="no-warp">Free Margin : </th><td>{{ $oResults->MARGIN_FREE }}</td>
                    </tr>
                </table>				

                <div class="table-footer">

                </div>
            </div>
            @endif
            <!--______________tables__________-->
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


    });
</script>
@stop