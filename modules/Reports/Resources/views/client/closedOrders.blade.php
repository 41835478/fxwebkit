@extends('client.layouts.main')
@section('title', trans('reports::reports.ClosedOrders'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('reports::reports.ClosedOrders') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('reports::reports.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('reports::reports.ClosedOrders') }}</li>
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


                        <h3 class="box-title m-b-0">{{ trans('reports::reports.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('reports::reports.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.server'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('reports::reports.type'), 'CMD', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('reports::reports.SL'), 'SL', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('reports::reports.TP'), 'TP', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="13">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oResults) !!}</th>


                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

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
                                    <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults->total() }} {{trans('reports::reports.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
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
                        <div class="checkbox checkbox-success">
                            {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                            <label for="exactLogin">{{ trans('reports::reports.ExactLogin') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="from_login_li">
                    <div class="col-md-12">
                        {!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group" id="to_login_li">
                    <div class="col-md-12">
                        {!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group" id="login_li">
                    <div class="col-md-12">
                        {!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}
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
                        <div class="checkbox checkbox-success">
                            {!! Form::checkbox('all_symbols', 1, $aFilterParams['all_symbols'], ['class'=>'px','id'=>'all-symbols-chx']) !!}
                            <label for="all-symbols-chx">{{ trans('reports::reports.AllSymbols') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('symbol[]', $aSymbols,((!is_array($aFilterParams['symbol']))? explode(',',$aFilterParams['symbol']):$aFilterParams['symbol']), ['multiple'=>true,'class'=>'form-control input-sm','disabled'=>true,'id'=>'all-symbols-slc']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}
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
                {!! Form::close()!!}
            </div>
        </div>


        @stop
        @section('hidden')




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






                <div class="primary_table_div info" >
                    <div class="table">


                        <div class="thead">
                            <div class="tr">



                                <div class="th">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.server'), 'server_id', $oResults) !!}</div>
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
                                        <div class="td"><label>{!! trans('reports::reports.server') !!} : </label><p>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</p></div>
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








                <div class="table-footer">
                    @if (count($oResults))
                        {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}

                        @if($oResults->total()>25)
                            <div class="DT-lf-right change_page_all_div" >



                                {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}



                                {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}



                            </div>
                        @endif
                        <div class="col-xs-12 col-lg-3">
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