@extends('admin.layouts.main')
@section('title', trans('reports::reports.OpenOrders'))
@section('content')

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
                <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('reports::reports.search') }} </a></li>
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

                <li class="divider"></li>

                <li>
                    <div class=" nav-input-div">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('all_symbols', 1, $aFilterParams['all_symbols'], ['class'=>'px','id'=>'all-symbols-chx']) !!}
                                <span class="lbl">{{ trans('reports::reports.AllSymbols') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li><div  class=" nav-input-div  ">{!! Form::select('symbol[]', $aSymbols, $aFilterParams['symbol'], ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-symbols-slc']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}</div></li>




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
            {{ trans('reports::reports.OpenOrders') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')



            <div class="table-light">
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
                <table class="table table-bordered table-striped">
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
                        {{-- */$i=0;/* --}}
                        {{-- */$class='';/* --}}
                        @foreach($oResults as $oResult)
                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                        <tr class='{{ $class }}'> 
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
                <div class="table-footer ">
                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}

                    @if($oResults->total()>25)
                    <div class="DT-lf-right change_page_all_div" >



                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}                 



                        {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn', 'name' => 'search']) !!}



                    </div>
                    @endif 

                    <div class="col-sm-3">
                        <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults->total() }} {{trans('reports::reports.entries')}}</span>
                    </div>
                    @endif
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