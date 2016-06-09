@extends('client.layouts.main')
@section('title', trans('reports::reports.ClosedOrders'))
@section('content')




<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections" >
                <li class="active"><a href="#"> <i class="fa fa-search"></i>{{ trans('reports::reports.search') }}</a></li>
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
                <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>
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
                    <div class="  nav-input-div">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('all_symbols', 1, $aFilterParams['all_symbols'], ['class'=>'px','id'=>'all-symbols-chx']) !!}
                                <span class="lbl">{{ trans('reports::reports.AllSymbols') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li><div  class=" nav-input-div  ">{!! Form::select('symbol[]', $aSymbols,  ((!is_array($aFilterParams['symbol']))? explode(',',$aFilterParams['symbol']):$aFilterParams['symbol']), ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-symbols-slc']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}</div></li>




                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}


        </div>
    </div>
    <!-- ___________________END___________________-->


    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('reports::reports.ClosedOrders') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')



            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.ClosedOrders') }}


                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.type'), 'CMD', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.SL'), 'SL', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.TP'), 'TP', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.close_time'), 'close_time', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oResults) !!}</th>


                    </tr>
                    </thead>
                    <tbody>
                    @if (count($oResults))
                        {{-- */$i=0;/* --}}
                        {{-- */$class='';/* --}}
                        @foreach($oResults as $oResult)
                            {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                            <tr class='{{ $class }}'>
                                <td>{{ $oResult->TICKET }}</td>
                                <td>{{ $oResult->LOGIN }}</td>
                                <td>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                                <td>{{ $oResult->SYMBOL }}</td>
                                <td>{{ $oResult->TYPE }}</td>
                                <td>{{ $oResult->VOLUME }}</td>
                                <td>{{ $oResult->OPEN_TIME }}</td>
                                <td>{{ $oResult->OPEN_PRICE }}</td>
                                <td>{{ $oResult->SL }}</td>
                                <td>{{ $oResult->TP }}</td>
                                <td>{{ $oResult->CLOSE_TIME }}</td>
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

                        @if($oResults->total()>25)
                            <div class="DT-lf-right change_page_all_div" >



                                {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}



                                {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}



                            </div>
                        @endif
                        <div class="col-sm-3 ">
                            <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults->total() }} {{trans('reports::reports.entries')}}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{!! Form::close() !!}
<script>
    init.push(function () {
        var options = {
            todayBtn: "linked",
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto',
            format: "yyyy-mm-dd"
        }
        $('.datepicker-warpper').datepicker(options);

        $('#all-groups-chx').change(function () {
            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }
        });

        $('#all-symbols-chx').change(function () {
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