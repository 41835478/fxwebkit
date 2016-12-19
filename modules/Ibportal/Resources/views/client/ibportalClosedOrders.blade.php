@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.ClosedOrders'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.ClosedOrders') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.ClosedOrders') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('ibportal::ibportal.order#'), 'TICKET', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('ibportal::ibportal.Login'), 'LOGIN', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('ibportal::ibportal.server'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('ibportal::ibportal.symbol'), 'SYMBOL', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('ibportal::ibportal.type'), 'CMD', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('ibportal::ibportal.lots'), 'VOLUME', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('ibportal::ibportal.open_time'), 'open_time', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('ibportal::ibportal.open_Price'), 'OPEN_PRICE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('ibportal::ibportal.SL'), 'SL', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('ibportal::ibportal.TP'), 'TP', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('ibportal::ibportal.Commission'), 'COMMISSION', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">{!! th_sort(trans('ibportal::ibportal.swaps'), 'SWAPS', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="13">{!! th_sort(trans('ibportal::ibportal.price'), 'CLOSE_PRICE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('ibportal::ibportal.profit'), 'PROFIT', $oResults) !!}</th>


                            </tr>
                            </thead>
                            <tbody>



                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}


                                    <tr>

                                        <td>{{ $oResult->TICKET }}</td>
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->SYMBOL }}</td>
                                        <td>{{ $oResult->TYPE }}</td>
                                        <td>{{ $oResult->VOLUME }}</td>
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


                        @if (count($oResults))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->
@stop

@section('hidden')


<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections" >
                <li class="active"><a href="#"> <i class="fa fa-search"></i>{{ trans('ibportal::ibportal.search') }}</a></li>
                <li>
                    <div class="   nav-input-div">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                <span class="lbl">{{ trans('ibportal::ibportal.ExactLogin') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('ibportal::ibportal.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('ibportal::ibportal.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('ibportal::ibportal.Login'),'class'=>'form-control input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">

                        <div class="input-group date datepicker-warpper">
                            {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('ibportal::ibportal.FromDate'),'class'=>'form-control input-sm']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div></li>


                <li><div  class=" nav-input-div  ">
                        <div class="input-group date datepicker-warpper">
                            {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('ibportal::ibportal.ToDate'),'class'=>'form-control input-sm']) !!}
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
                                <span class="lbl">{{ trans('ibportal::ibportal.AllSymbols') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li><div  class=" nav-input-div  ">{!! Form::select('symbol[]', $aSymbols,((!is_array($aFilterParams['symbol']))? explode(',',$aFilterParams['symbol']):$aFilterParams['symbol']), ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-symbols-slc']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}</div></li>




                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
            {{ trans('ibportal::ibportal.ClosedOrders') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')



            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('ibportal::ibportal.ClosedOrders') }}



                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.order#'), 'TICKET', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.Login'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.server'), 'server_id', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.symbol'), 'SYMBOL', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.type'), 'CMD', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.lots'), 'VOLUME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.open_time'), 'open_time', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.open_Price'), 'OPEN_PRICE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.SL'), 'SL', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.TP'), 'TP', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.close_time'), 'close_time', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.Commission'), 'COMMISSION', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.swaps'), 'SWAPS', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.price'), 'CLOSE_PRICE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.profit'), 'PROFIT', $oResults) !!}</th>


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
                            <td>{{config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
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



                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}



                        {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}



                    </div>
                    @endif
                    <div class="col-sm-3 ">
                        <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
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