@extends('client.layouts.main')
@section('title', trans('reports::reports.accounts'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('reports::reports.accounts') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('reports::reports.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('reports::reports.accounts') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('reports::reports.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        @if (count($oResults))
                            <div class="stat-panel no-margin-b">
                                <div class="stat-row">
                                    <div class="stat-counters bg-panel no-padding text-center">
                                        <div class="stat-cell-account col-xs-4 padding-xs-vr">
                                            <span class="text-xs">{{ trans('reports::reports.account') }}{{ $oResults->LOGIN }} </span>
                                        </div>
                                        <div class="stat-cell-account col-xs-4 padding-xs-vr">
                                            <span class="text-xs">{{ trans('reports::reports.name') }}{{ $oResults->NAME }}  </span>
                                        </div>
                                        <div class="stat-cell-account col-xs-4 padding-xs-vr">
                                            <span class="text-xs">{{ trans('reports::reports.leverage') }} 1:{{ $oResults->LEVERAGE }} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="table-caption">
                            {{ trans('reports::reports.OpenOrders') }} {{ trans('reports::reports.actual') }}
                        </div>

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.server'), 'server_id', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oOpenActualResults) !!}</th>                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('reports::reports.type'), 'CMD', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('reports::reports.SL'), 'SL', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('reports::reports.TP'), 'TP', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="13">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oOpenActualResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oOpenActualResults) !!}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oOpenActualResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oOpenActualResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

                                        <td>{{ $oResult->TICKET }}</td>
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->SYMBOL }}</td>
                                        <td>{{ $oResult->TYPE }}</td>
                                        <td> @if(!($oResult->CMD==6 || $oResult->CMD==7 )) {{ $oResult->VOLUME }}@endif</td>
                                        <td>{{ $oResult->OPEN_TIME }}</td>
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
                        @if (count($oOpenActualResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oOpenActualResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oOpenActualResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oOpenActualResults->total() }} {{trans('reports::reports.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oOpenActualResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif


                        <div class="table-caption">
                            {{ trans('reports::reports.OpenOrders') }} {{ trans('reports::reports.pending') }}
                        </div>

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.server'), 'server_id', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('reports::reports.type'), 'CMD', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('reports::reports.SL'), 'SL', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('reports::reports.TP'), 'TP', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="13">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oOpenPendingResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oOpenPendingResults) !!}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oOpenPendingResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oOpenPendingResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

                                        <td>{{ $oResult->TICKET }}</td>
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->SYMBOL }}</td>
                                        <td>{{ $oResult->TYPE }}</td>
                                        <td> @if(!($oResult->CMD==6 || $oResult->CMD==7 )) {{ $oResult->VOLUME }}@endif</td>
                                        <td>{{ $oResult->OPEN_TIME }}</td>
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
                        @if (count($oOpenPendingResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oOpenPendingResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oOpenPendingResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oOpenPendingResults->total() }} {{trans('reports::reports.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oOpenPendingResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif

                        <div class="white-box">
                            <h3 class="box-title m-b-0">{{ trans('reports::reports.ClosedOrders') }}</h3>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#actual" aria-controls="actual" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-actual"></i></span><span class="hidden-xs">{{ trans('reports::reports.actual') }}</span></a></li>
                                <li role="presentation" class=""><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-pending"></i></span> <span class="hidden-xs">{{ trans('reports::reports.pending') }}</span></a></li>
                                <li role="presentation" class=""><a href="#Balance" aria-controls="Balance" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-Balance"></i></span> <span class="hidden-xs">{{ trans('reports::reports.Balance') }}</span></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="actual">
                                    <div class="col-md-12">
                                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                            <thead>
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.server'), 'server_id', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('reports::reports.type'), 'CMD', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('reports::reports.SL'), 'SL', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('reports::reports.TP'), 'TP', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="13">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oCloseActualResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oCloseActualResults) !!}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (count($oCloseActualResults))
                                                {{--*/$i=0;/*--}}
                                                {{--*/$class='';/*--}}
                                                @foreach($oCloseActualResults as $oResult)
                                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                                    <tr class="tr {{ $class }}">
                                                        <td>{{ $oResult->TICKET }}</td>
                                                        <td>{{ $oResult->LOGIN }}</td>
                                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                                        <td>{{ $oResult->SYMBOL }}</td>
                                                        <td>{{ $oResult->TYPE }}</td>
                                                        <td> @if(!($oResult->CMD==6 || $oResult->CMD==7 )) {{ $oResult->VOLUME }}@endif</td>
                                                        <td>{{ $oResult->OPEN_TIME }}</td>
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
                                        @if (count($oCloseActualResults))
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-6 ">
                                                    <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oCloseActualResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oCloseActualResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oCloseActualResults->total() }} {{trans('reports::reports.entries')}}</span>
                                                </div>


                                                <div class="col-xs-12 col-sm-6 ">
                                                    {!! str_replace('/?', '?', $oCloseActualResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="pending">
                                    <div class="col-md-12">
                                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                            <thead>
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.server'), 'server_id', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('reports::reports.type'), 'CMD', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('reports::reports.SL'), 'SL', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('reports::reports.TP'), 'TP', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="13">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oClosePendingResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oClosePendingResults) !!}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (count($oClosePendingResults))
                                                {{--*/$i=0;/*--}}
                                                {{--*/$class='';/*--}}
                                                @foreach($oClosePendingResults as $oResult)
                                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                                    <tr class="tr {{ $class }}">
                                                        <td>{{ $oResult->TICKET }}</td>
                                                        <td>{{ $oResult->LOGIN }}</td>
                                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                                        <td>{{ $oResult->SYMBOL }}</td>
                                                        <td>{{ $oResult->TYPE }}</td>
                                                        <td> @if(!($oResult->CMD==6 || $oResult->CMD==7 )) {{ $oResult->VOLUME }}@endif</td>
                                                        <td>{{ $oResult->OPEN_TIME }}</td>
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
                                        @if (count($oClosePendingResults))
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-6 ">
                                                    <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oClosePendingResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oClosePendingResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oClosePendingResults->total() }} {{trans('reports::reports.entries')}}</span>
                                                </div>


                                                <div class="col-xs-12 col-sm-6 ">
                                                    {!! str_replace('/?', '?', $oClosePendingResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="Balance">
                                    <div class="col-md-12">
                                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                            <thead>
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oCloseBalanceResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oCloseBalanceResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.server'), 'server_id', $oCloseBalanceResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oCloseBalanceResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('reports::reports.close_time'), 'CLOSE_TIME', $oCloseBalanceResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('reports::reports.comment'), 'COMMENT', $oCloseBalanceResults) !!}</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oCloseBalanceResults) !!}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (count($oCloseBalanceResults))
                                                {{--*/$i=0;/*--}}
                                                {{--*/$class='';/*--}}
                                                @foreach($oCloseBalanceResults as $oResult)
                                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                                    <tr class="tr {{ $class }}">
                                                        <td>{{ $oResult->TICKET }}</td>
                                                        <td>{{ $oResult->LOGIN }}</td>
                                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                                        <td>{{ $oResult->OPEN_TIME }}</td>
                                                        <td>{{ $oResult->CLOSE_TIME }}</td>
                                                        <td>{{ $oResult->COMMENT }}</td>
                                                        <td>{{ $oResult->PROFIT }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        @if (count($oCloseBalanceResults))
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-6 ">
                                                    <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oCloseBalanceResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oCloseBalanceResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oCloseBalanceResults->total() }} {{trans('reports::reports.entries')}}</span>
                                                </div>


                                                <div class="col-xs-12 col-sm-6 ">
                                                    {!! str_replace('/?', '?', $oCloseBalanceResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (count($oResults))
                            <div class="panel-body " id="mt4StatementListAllDiv">

                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.registration_date') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->REGDATE }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.meta_quotes_id') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->MQID }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>


                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.name') }} </label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->NAME }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.phone_password :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->MQID }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>


                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.state :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->STATE }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.country') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->COUNTRY }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>


                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.address :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->ADDRESS }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.zip_code') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->ZIPCODE }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.phone') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->PHONE }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.email') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->EMAIL }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.id_number :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->ID }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.status :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->STATUS }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.leverage :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">1:{{ $oResults->LAVARGE }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.tax') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->TAXES }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.deposit_withdrawal') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $aSummery['deposit'] }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.credit_facility') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $aSummery['credit_facility'] }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.closed_trade') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $aSummery['closed_trade'] }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.floating') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $aSummery['floating'] }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.margin :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->MARGIN }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.balance :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->BALANCE }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>


                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.equity :') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ $oResults->EQUITY }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->

                                    <div class="col-xs-4 col-sm-2 text-right">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('accounts::accounts.free_margin') }}</label>
                                        </div>
                                    </div>
                                    <!-- ol-sm-6 -->
                                    <div class="col-xs-8 col-sm-4 text-left">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{  $oResults->MARGIN_FREE }}</label>
                                        </div>
                                    </div>
                                    <!--ol-sm-6 -->
                                </div>

                            </div>

                            <table class="table table-bordered user-info-table " id="mt4StatementTable">
                                <tr>
                                    <th colspan="3">{{ trans('accounts::accounts.registration_date') }} </th>
                                    <td>{{ $oResults->REGDATE }}</td>
                                    <th>{{ trans('accounts::accounts.meta_quotes_id') }} </th>
                                    <td>{{ $oResults->MQID }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('accounts::accounts.name') }} </th>
                                    <td colspan="3">{{ $oResults->NAME }}</td>
                                    <th>{{ trans('accounts::accounts.phone_password :') }} </th>
                                    <td>{{ $oResults->PASSWORD_PHONE }}</td>
                                </tr>
                                <tr>

                                    <th>{{ trans('accounts::accounts.state :') }} </th>
                                    <td>{{ $oResults->STATE }}</td>
                                    <th>{{ trans('accounts::accounts.country') }} </th>
                                    <td>{{ $oResults->COUNTRY }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('accounts::accounts.address :') }} </th>
                                    <td colspan="3">{{ $oResults->ADDRESS }}</td>
                                    <th>{{ trans('accounts::accounts.zip_code') }} </th>
                                    <td>{{ $oResults->ZIPCODE }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('accounts::accounts.phone') }} </th>
                                    <td>{{ $oResults->PHONE }}</td>
                                    <th>{{ trans('accounts::accounts.email') }}</th>
                                    <td colspan="3">{{ $oResults->EMAIL }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('accounts::accounts.id_number :') }} </th>
                                    <td>{{ $oResults->ID }}</td>
                                    <th>{{ trans('accounts::accounts.status :') }} </th>
                                    <td>{{ $oResults->STATUS }}</td>
                                    <th>{{ trans('accounts::accounts.leverage :') }}</th>
                                    <td>1:{{ $oResults->LEVERAGE }}</td>
                                </tr>

                                <tr>

                                    <th>{{ trans('accounts::accounts.tax') }} </th>
                                    <td>{{ $oResults->TAXES }}%</td>
                                    <th class="no-warp">{{ trans('accounts::accounts.deposit_withdrawal') }}</th>
                                    <td>{{ $aSummery['deposit'] }}</td>
                                    <th class="no-warp">{{ trans('accounts::accounts.credit_facility') }}</th>
                                    <td>{{ $aSummery['credit_facility'] }}</td>
                                </tr>

                                <tr>
                                    <th class="no-warp">{{ trans('accounts::accounts.closed_trade') }} </th>
                                    <td>{{ $aSummery['closed_trade'] }}</td>
                                    <th class="no-warp">{{ trans('accounts::accounts.floating') }} </th>
                                    <td>{{ $aSummery['floating'] }}</td>
                                    <th class="no-warp">{{ trans('accounts::accounts.margin :') }} </th>
                                    <td>{{ $oResults->MARGIN }}</td>
                                </tr>
                                <tr>
                                    <th class="no-warp">{{ trans('accounts::accounts.balance :') }} </th>
                                    <td>{{ $oResults->BALANCE }}</td>
                                    <th class="no-warp">{{ trans('accounts::accounts.equity :') }} </th>
                                    <td>{{ $oResults->EQUITY }}</td>
                                    <th class="no-warp">{{ trans('accounts::accounts.free_margin') }} </th>
                                    <td>{{ $oResults->MARGIN_FREE }}</td>
                                </tr>
                            </table>
                        @endif

                        {{--@if (count($oResults))--}}
                        {{--<div class="row">--}}

                        {{--<div class="col-xs-12 col-sm-6 ">--}}
                        {{--<span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults->total() }} {{trans('reports::reports.entries')}}</span>--}}
                        {{--</div>--}}


                        {{--<div class="col-xs-12 col-sm-6 ">--}}
                        {{--{!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->
        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('reports::reports.search') }}</h3>

                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm mydatepicker']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm mydatepicker']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </div>

                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close() !!}
            </div>
        </div>


@stop
{{--@section('hidden')--}}


{{--<div class="theme-default page-mail">--}}
{{--<div class="mail-nav">--}}
{{--<div class="navigation">--}}
{{--{!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}--}}
{{--<ul class="sections">--}}
{{--<li class="active"><a href="#"> <i class="fa fa-search"></i> {{trans('reports::reports.search') }}</a></li>--}}

{{--<li>--}}
{{--<div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div>--}}
{{--</li>--}}

{{--<li>--}}
{{--<div class=" nav-input-div  ">--}}

{{--<div class="input-group date datepicker-warpper">--}}
{{--{!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm']) !!}--}}
{{--<span class="input-group-addon">--}}
{{--<i class="fa fa-calendar"></i>--}}
{{--</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</li>--}}


{{--<li>--}}
{{--<div class=" nav-input-div  ">--}}
{{--<div class="input-group date datepicker-warpper">--}}
{{--{!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}--}}
{{--<span class="input-group-addon">--}}
{{--<i class="fa fa-calendar"></i>--}}
{{--</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</li>--}}

{{--<li>--}}
{{--<li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>--}}
{{--</li>--}}
{{--<li>--}}
{{--<div class=" nav-input-div  ">--}}
{{--{!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="divider"></li>--}}
{{--</ul>--}}


{{--{!! Form::hidden('sort', $aFilterParams['sort']) !!}--}}
{{--{!! Form::hidden('order', $aFilterParams['order']) !!}--}}
{{--{!! Form::close() !!}--}}


{{--</div>--}}
{{--</div>--}}

{{--<div class="mail-container ">--}}
{{--<div class="mail-container-header">--}}
{{--{{ trans('reports::reports.accounts') }}--}}
{{--</div>--}}
{{--<div class="center_page_all_div">--}}
{{--@include('admin.partials.messages')--}}


{{--@if (count($oResults))--}}
{{--<div class="stat-panel no-margin-b">--}}
{{--<div class="stat-row">--}}
{{--<div class="stat-counters bg-panel no-padding text-center">--}}
{{--<div class="stat-cell-account col-xs-4 padding-xs-vr">--}}
{{--<span class="text-xs">{{ trans('reports::reports.account') }}{{ $oResults->LOGIN }} </span>--}}
{{--</div>--}}
{{--<div class="stat-cell-account col-xs-4 padding-xs-vr">--}}
{{--<span class="text-xs">{{ trans('reports::reports.name') }}{{ $oResults->NAME }}  </span>--}}
{{--</div>--}}
{{--<div class="stat-cell-account col-xs-4 padding-xs-vr">--}}
{{--<span class="text-xs">{{ trans('reports::reports.leverage') }}{{ $oResults->LEVERAGE }} </span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endif--}}
{{--<div class="padding-xs-vr"></div>--}}

{{--<!-- _____________open _  order___________________-->--}}
{{--<div class="table-light">--}}
{{--<div class="table-header">--}}
{{--<div class="table-caption">--}}
{{--{{ trans('reports::reports.OpenOrders') }}--}}


{{--</div>--}}
{{--</div>--}}


{{--<div class="primary_table_div info" >--}}
{{--<div class="table">--}}


{{--<div class="thead">--}}
{{--<div class="tr">--}}



{{--<div class="th">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.type'), 'CMD', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.SL'), 'SL', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.TP'), 'TP', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oOpenResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oOpenResults) !!}</div>--}}



{{--</div>--}}
{{--</div>--}}

{{--<div class="tbody">--}}

{{--@if (count($oOpenResults))--}}
{{-- */$i=0;/* --}}
{{-- */$class='';/* --}}
{{--@foreach($oOpenResults as $oResult)--}}
{{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
{{--<div class="tr {{ $class }}">--}}




{{--<div class="td"><label>{!! trans('reports::reports.order#') !!} : </label><p>{{ $oResult->TICKET }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.Login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.liveDemo') !!} : </label><p>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.symbol') !!} : </label><p>{{ $oResult->SYMBOL }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.type') !!} : </label><p>{{ $oResult->TYPE }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.lots') !!} : </label><p>{{ $oResult->VOLUME }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.open_time') !!} : </label><p>{{ $oResult->OPEN_TIME }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.open_Price') !!} : </label><p>{{ $oResult->OPEN_PRICE }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.SL') !!} : </label><p>{{ $oResult->SL }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.TP') !!} : </label><p>{{ $oResult->TP }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.Commission') !!} : </label><p>{{ $oResult->COMMISSION }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.swaps') !!} : </label><p>{{ $oResult->SWAPS }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.price') !!} : </label><p>{{ $oResult->CLOSE_PRICE }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.profit') !!} : </label><p>{{ $oResult->PROFIT }}</p></div>--}}

{{--</div>--}}
{{--@endforeach--}}
{{--@endif--}}

{{--</div>--}}

{{--<div class="tableFooter">--}}

{{--</div>--}}
{{--</div>--}}

{{--</div>--}}

{{--<div class="table-footer text-right">--}}
{{--@if (count($oOpenResults))--}}
{{--{!! str_replace('/?', '?', $oOpenResults->appends(Input::except('page'))->render()) !!}--}}

{{--@if($oOpenResults->total()>25)--}}

{{--<div class="DT-lf-right change_page_all_div" >--}}
{{--{!! Form::text('page',$oOpenResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}--}}
{{--{!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}--}}
{{--</div>--}}
{{--@endif--}}

{{--<div class="col-sm-3  padding-xs-vr">--}}

{{--<span class="text-xs">{{trans('reports::reports.showing')}} {{ $oOpenResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oOpenResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oOpenResults->total() }} {{trans('reports::reports.entries')}}</span>--}}
{{--</div>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="table-light">--}}
{{--<div class="table-header">--}}
{{--<div class="table-caption">--}}
{{--{{ trans('reports::reports.ClosedOrders') }}--}}
{{--</div>--}}
{{--</div>--}}





{{--<div class="primary_table_div info" >--}}
{{--<div class="table">--}}


{{--<div class="thead">--}}
{{--<div class="tr">--}}



{{--<div class="th">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.type'), 'CMD', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.SL'), 'SL', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.TP'), 'TP', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oCloseResults) !!}</div>--}}
{{--<div class="th">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oCloseResults) !!}</div>--}}



{{--</div>--}}
{{--</div>--}}


{{--<div class="tbody">--}}



{{--@if (count($oCloseResults))--}}
{{-- */$i=0;/* --}}
{{-- */$class='';/* --}}
{{--@foreach($oCloseResults as $oResult)--}}
{{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
{{--<div class="tr {{ $class }}">--}}




{{--<div class="td"><label>{!! trans('reports::reports.order#') !!} : </label><p>{{ $oResult->TICKET }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.Login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.symbol') !!} : </label><p>{{ $oResult->SYMBOL }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.type') !!} : </label><p>{{ $oResult->TYPE }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.lots') !!} : </label><p>{{ $oResult->VOLUME }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.open_time') !!} : </label><p>{{ $oResult->OPEN_TIME }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.open_Price') !!} : </label><p>{{ $oResult->OPEN_PRICE }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.SL') !!} : </label><p>{{ $oResult->SL }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.TP') !!} : </label><p>{{ $oResult->TP }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.Commission') !!} : </label><p>{{ $oResult->COMMISSION }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.swaps') !!} : </label><p>{{ $oResult->SWAPS }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.price') !!} : </label><p>{{ $oResult->CLOSE_PRICE }}</p></div>--}}
{{--<div class="td"><label>{!! trans('reports::reports.profit') !!} : </label><p>{{ $oResult->PROFIT }}</p></div>--}}


{{--</div>--}}
{{--@endforeach--}}
{{--@endif--}}

{{--</div>--}}


{{--</div>--}}

{{--<div class="tableFooter">--}}

{{--</div>--}}
{{--</div>--}}

{{--<div class="table-footer text-right">--}}
{{--@if (count($oCloseResults))--}}
{{--{!! str_replace('/?', '?', $oCloseResults->appends(Input::except('page'))->render()) !!}--}}

{{--@if($oCloseResults->total()>25)--}}

{{--<div class="DT-lf-right change_page_all_div" >--}}
{{--{!! Form::text('page',$oCloseResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}--}}
{{--{!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}--}}
{{--</div>--}}
{{--@endif--}}

{{--<div class="col-sm-3  padding-xs-vr">--}}

{{--<span class="text-xs">{{trans('reports::reports.showing')}} {{ $oCloseResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oCloseResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oCloseResults->total() }} {{trans('reports::reports.entries')}}</span>--}}
{{--</div>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}


{{--@if (count($oResults))--}}
{{--<div class="panel-body " id="mt4StatementListAllDiv">--}}

{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.registration_date') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->REGDATE }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.meta_quotes_id') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->MQID }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}


{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.name') }} </label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->NAME }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.phone_password :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->MQID }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}


{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.state :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->STATE }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.country') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->COUNTRY }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}


{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.address :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->ADDRESS }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.zip_code') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->ZIPCODE }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.phone') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->PHONE }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.email') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->EMAIL }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.id_number :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->ID }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.status :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->STATUS }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.leverage :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->LAVARGE }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.tax') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->TAXES }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.deposit_withdrawal') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $aSummery['deposit'] }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.credit_facility') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $aSummery['credit_facility'] }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.closed_trade') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $aSummery['closed_trade'] }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.floating') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $aSummery['floating'] }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.margin :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->MARGIN }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.balance :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->BALANCE }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}


{{--<div class="row">--}}
{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.equity :') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ $oResults->EQUITY }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}

{{--<div class="col-xs-4 col-sm-2 text-right">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{ trans('accounts::accounts.free_margin') }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ol-sm-6 -->--}}
{{--<div class="col-xs-8 col-sm-4 text-left">--}}
{{--<div class="form-group no-margin-hr">--}}
{{--<label class="control-label">{{  $oResults->MARGIN_FREE }}</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--ol-sm-6 -->--}}
{{--</div>--}}

{{--</div>--}}

{{--<table class="table table-bordered user-info-table " id="mt4StatementTable">--}}
{{--<tr>--}}
{{--<th colspan="3">{{ trans('accounts::accounts.registration_date') }} </th>--}}
{{--<td>{{ $oResults->REGDATE }}</td>--}}
{{--<th>{{ trans('accounts::accounts.meta_quotes_id') }} </th>--}}
{{--<td>{{ $oResults->MQID }}</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<th>{{ trans('accounts::accounts.name') }} </th>--}}
{{--<td colspan="3">{{ $oResults->NAME }}</td>--}}
{{--<th>{{ trans('accounts::accounts.phone_password :') }} </th>--}}
{{--<td>{{ $oResults->PASSWORD_PHONE }}</td>--}}
{{--</tr>--}}
{{--<tr>--}}

{{--<th>{{ trans('accounts::accounts.state :') }} </th>--}}
{{--<td>{{ $oResults->STATE }}</td>--}}
{{--<th>{{ trans('accounts::accounts.country') }} </th>--}}
{{--<td>{{ $oResults->COUNTRY }}</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<th>{{ trans('accounts::accounts.address :') }} </th>--}}
{{--<td colspan="3">{{ $oResults->ADDRESS }}</td>--}}
{{--<th>{{ trans('accounts::accounts.zip_code') }} </th>--}}
{{--<td>{{ $oResults->ZIPCODE }}</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<th>{{ trans('accounts::accounts.phone') }} </th>--}}
{{--<td>{{ $oResults->PHONE }}</td>--}}
{{--<th>{{ trans('accounts::accounts.email') }}</th>--}}
{{--<td colspan="3">{{ $oResults->EMAIL }}</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<th>{{ trans('accounts::accounts.id_number :') }} </th>--}}
{{--<td>{{ $oResults->ID }}</td>--}}
{{--<th>{{ trans('accounts::accounts.status :') }} </th>--}}
{{--<td>{{ $oResults->STATUS }}</td>--}}
{{--<th>{{ trans('accounts::accounts.leverage :') }}</th>--}}
{{--<td>{{ $oResults->LEVERAGE }}</td>--}}
{{--</tr>--}}

{{--<tr>--}}

{{--<th>{{ trans('accounts::accounts.tax') }} </th>--}}
{{--<td>{{ $oResults->TAXES }}%</td>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.deposit_withdrawal') }}</th>--}}
{{--<td>{{ $aSummery['deposit'] }}</td>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.credit_facility') }}</th>--}}
{{--<td>{{ $aSummery['credit_facility'] }}</td>--}}
{{--</tr>--}}

{{--<tr>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.closed_trade') }} </th>--}}
{{--<td>{{ $aSummery['closed_trade'] }}</td>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.floating') }} </th>--}}
{{--<td>{{ $aSummery['floating'] }}</td>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.margin :') }} </th>--}}
{{--<td>{{ $oResults->MARGIN }}</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.balance :') }} </th>--}}
{{--<td>{{ $oResults->BALANCE }}</td>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.equity :') }} </th>--}}
{{--<td>{{ $oResults->EQUITY }}</td>--}}
{{--<th class="no-warp">{{ trans('accounts::accounts.free_margin') }} </th>--}}
{{--<td>{{ $oResults->MARGIN_FREE }}</td>--}}
{{--</tr>--}}
{{--</table>--}}
{{--@endif--}}

{{--</div>--}}


{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<script>--}}
{{--init.push(function () {--}}
{{--var options = {--}}
{{--todayBtn: "linked",--}}
{{--orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto',--}}
{{--format: "yyyy-mm-dd"--}}
{{--}--}}
{{--$('.datepicker-warpper').datepicker(options);--}}


{{--});--}}
{{--</script>--}}
{{--@stop--}}