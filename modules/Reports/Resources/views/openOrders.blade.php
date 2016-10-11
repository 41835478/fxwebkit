@extends('admin.layouts.main')
@section('title', trans('reports::reports.OpenOrders'))
@section('content')


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
                <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>
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
                <li><div  class=" nav-input-div  ">{!! Form::select('symbol[]', $aSymbols, ((!is_array($aFilterParams['symbol']))? explode(',',$aFilterParams['symbol']):$aFilterParams['symbol']), ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-symbols-slc']) !!}</div></li>
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

                    </div>
                </div>














                <div class="primary_table_div info" >
                    <div class="table">


                        <div class="thead">
                            <div class="tr">



                                <div class="th">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.type'), 'CMD', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.SL'), 'SL', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.TP'), 'TP', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oResults) !!}</div>



                            </div>
                        </div>


                        <div class="tbody">




                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <div class="tr {{ $class }}">




                                        <div class="td"><label>{!! trans('reports::reports.order#') !!} : </label><p>{{ $oResult->TICKET }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.Login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.symbol') !!} : </label><p>{{ $oResult->SYMBOL }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.type') !!} : </label><p>{{ $oResult->TYPE }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.lots') !!} : </label><p>{{ $oResult->VOLUME }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.open_time') !!} : </label><p>{{ $oResult->OPEN_TIME }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.open_Price') !!} : </label><p>{{ $oResult->OPEN_PRICE }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.SL') !!} : </label><p>{{ $oResult->SL }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.TP') !!} : </label><p>{{ $oResult->TP }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Commission') !!} : </label><p>{{ $oResult->COMMISSION }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.swaps') !!} : </label><p>{{ $oResult->SWAPS }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.price') !!} : </label><p>{{ $oResult->CLOSE_PRICE }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.profit') !!} : </label><p>{{ $oResult->PROFIT }}</p></div>




                                    </div>
                                @endforeach
                            @endif




                        </div>







                    </div>

                    <div class="tableFooter">

                    </div>
                </div>















                <div class="table-footer ">
                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}

                    @if($oResults->total()>25)
                    <div class="DT-lf-right change_page_all_div" >



                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}



                        {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}



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
    {!! Form::close() !!}
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