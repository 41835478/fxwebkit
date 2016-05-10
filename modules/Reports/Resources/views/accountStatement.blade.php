@extends('admin.layouts.main')
@section('title', trans('reports::reports.accounts'))
@section('content')


    <div class="theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i class="fa fa-search"></i> {{trans('reports::reports.search') }}</a></li>

                    <li>
                        <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">

                            <div class="input-group date datepicker-warpper">
                                {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm']) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class=" nav-input-div  ">
                            <div class="input-group date datepicker-warpper">
                                {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </li>

                    <li>
                    <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>


                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close() !!}


            </div>
        </div>

        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('reports::reports.accounts') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')


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
                                    <span class="text-xs">{{ trans('reports::reports.leverage') }}{{ $oResults->LEVERAGE }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="padding-xs-vr"></div>

                <!-- _____________open _  order___________________-->
                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('reports::reports.OpenOrders') }}


                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.open_time'), 'OPEN_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.type'), 'CMD', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.SL'), 'SL', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.TP'), 'TP', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.close_time'), 'CLOSE_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.taxes'), 'TAXES', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oOpenResults) !!}</th>
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


                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('reports::reports.ClosedOrders') }}


                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.open_time'), 'OPEN_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.type'), 'CMD', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.SL'), 'SL', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.TP'), 'TP', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.close_time'), 'CLOSE_TIME', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.taxes'), 'TAXES', $oCloseResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oOpenResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oOpenResults) !!}</th>
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
                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('reports::reports.Summary') }}

                            </div>
                        </div>
                        <table class="table table-bordered user-info-table">
                            <tr>
                                <th colspan="3">{{ trans('reports::reports.registration_date') }}</th>
                                <td>{{ $oResults->REGDATE }}</td>
                                <th>{{ trans('reports::reports.name') }} </th>
                                <td colspan="3">{{ $oResults->NAME }}</td>
                            </tr>

                            <tr>
                                <th>{{ trans('reports::reports.city') }} </th>
                                <td>{{ $oResults->CITY }}</td>
                                <th>{{ trans('reports::reports.state') }} </th>
                                <td>{{ $oResults->STATE }}</td>
                                <th>{{ trans('reports::reports.country') }} </th>
                                <td>{{ $oResults->COUNTRY }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('reports::reports.address') }} </th>
                                <td colspan="3">{{ $oResults->ADDRESS }}</td>
                                <th>{{ trans('reports::reports.zip_code') }} </th>
                                <td>{{ $oResults->ZIPCODE }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('reports::reports.phone') }} </th>
                                <td>{{ $oResults->PHONE }}</td>
                                <th>{{ trans('reports::reports.email') }}</th>
                                <td colspan="3">{{ $oResults->EMAIL }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('reports::reports.id_number') }} </th>
                                <td>{{ $oResults->ID }}</td>
                                <th>{{ trans('reports::reports.status') }} </th>
                                <td>{{ $oResults->STATUS }}</td>

                            </tr>

                            <tr>
                                <th>{{ trans('reports::reports.leverage') }}</th>
                                <td>{{ $oResults->LEVERAGE }}</td>
                                <th>{{ trans('reports::reports.tax') }} </th>
                                <td>{{ $oResults->TAXES }}%</td>

                            </tr>
                            <tr>
                                <th class="no-warp"></th>
                                <td></td>
                                <th class="no-warp">{{ trans('reports::reports.deposit_withdrawal') }}</th>
                                <td>{{ $aSummery['deposit'] }}</td>
                                <th class="no-warp">{{ trans('reports::reports.credit_facility') }}</th>
                                <td>{{ $aSummery['credit_facility'] }}</td>
                            </tr>
                            <tr>
                                <th class="no-warp">{{ trans('reports::reports.closed_trade') }} </th>
                                <td>{{ $aSummery['closed_trade'] }}</td>
                                <th class="no-warp">{{ trans('reports::reports.floating') }} </th>
                                <td>{{ $aSummery['floating'] }}</td>
                                <th class="no-warp">{{ trans('reports::reports.margin') }} </th>
                                <td>{{ $oResults->MARGIN }}</td>
                            </tr>
                            <tr>
                                <th class="no-warp">{{ trans('reports::reports.balance') }} </th>
                                <td>{{ $oResults->BALANCE }}</td>
                                <th class="no-warp">{{ trans('reports::reports.equity') }} </th>
                                <td>{{ $oResults->EQUITY }}</td>
                                <th class="no-warp">{{ trans('reports::reports.free_margin') }} </th>
                                <td>{{ $oResults->MARGIN_FREE }}</td>
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