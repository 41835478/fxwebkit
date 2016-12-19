@extends('client.layouts.main')
@section('title', trans('reports::reports.dailyReport'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('reports::reports.dailyReport') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('reports::reports.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('reports::reports.dailyReport') }}</li>
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


                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.login'), 'LOGIN', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.time'), 'TIME', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('reports::reports.Group'), 'GROUP', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('reports::reports.bank'), 'BANK', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('reports::reports.Balance_Prev'), 'BALANCE_PREV', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('reports::reports.Balance'), 'BALANCE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('reports::reports.deposit'), 'DEPOSIT', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('reports::reports.credit'), 'CREDIT', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('reports::reports.PROFIT_CLOSED'), 'PROFIT_CLOSED', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">{!! th_sort(trans('reports::reports.Equity'), 'EQUITY', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="13">{!! th_sort(trans('reports::reports.Margin'), 'MARGIN', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">{!! th_sort(trans('reports::reports.MarginFree'), 'MARGIN_FREE', $oResults) !!}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class='{{ $class }}'>
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                                        <td>{{ $oResult->TIME }}</td>
                                        <td>{{ $oResult->GROUP }}</td>
                                        <td>{{ $oResult->BANK }}</td>
                                        <td>{{ $oResult->BALANCE_PREV }}</td>
                                        <td>{{ $oResult->BALANCE }}</td>
                                        <td>{{ $oResult->DEPOSIT }}</td>
                                        <td>{{ $oResult->CREDIT }}</td>
                                        <td>{{ $oResult->PROFIT_CLOSED }}</td>
                                        <td>{{ $oResult->PROFIT }}</td>
                                        <td>{{ $oResult->EQUITY }}</td>
                                        <td>{{ $oResult->MARGIN }}</td>
                                        <td>{{ $oResult->MARGIN_FREE }}</td>

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


        @stop
        @section('hidden')


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
                    </div>
                </li>

                <div class=" nav-input-div form-group ">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                            <span class="lbl">{{ trans('accounts::accounts.AllGroups') }}</span>
                        </label>
                    </div>
                    {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
                </div>



                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    <!-- ___________________END___________________-->


    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('reports::reports.dailyReport') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')


            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.dailyReport') }}


                    </div>
                </div>
                <table class="table table-bordered table-striped" style="display: table">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.login'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.time'), 'TIME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Group'), 'GROUP', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.bank'), 'BANK', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Balance_Prev'), 'BALANCE_PREV', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Balance'), 'BALANCE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.deposit'), 'DEPOSIT', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.credit'), 'CREDIT', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.PROFIT_CLOSED'), 'PROFIT_CLOSED', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Equity'), 'EQUITY', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Margin'), 'MARGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.MarginFree'), 'MARGIN_FREE', $oResults) !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                       @if (count($oResults))
                        {{-- */$i=0;/* --}}
                        {{-- */$class='';/* --}}
                        @foreach($oResults as $oResult)
                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                        <tr class='{{ $class }}'> 
                            <td>{{ $oResult->LOGIN }}</td>
                            <td>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                            <td>{{ $oResult->TIME }}</td>
                            <td>{{ $oResult->GROUP }}</td>
                            <td>{{ $oResult->BANK }}</td>
                            <td>{{ $oResult->BALANCE_PREV }}</td>
                            <td>{{ $oResult->BALANCE }}</td>
                            <td>{{ $oResult->DEPOSIT }}</td>
                            <td>{{ $oResult->CREDIT }}</td>
                            <td>{{ $oResult->PROFIT_CLOSED }}</td>
                            <td>{{ $oResult->PROFIT }}</td>
                            <td>{{ $oResult->EQUITY }}</td>
                            <td>{{ $oResult->MARGIN }}</td>
                            <td>{{ $oResult->MARGIN_FREE }}</td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer text-right">
                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}

                    @if($oResults->total()>25)

                    <div class="DT-lf-right change_page_all_div" >
                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}
                        {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                    @endif

                    <div class="col-sm-3  padding-xs-vr">

                        <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults->total() }} {{trans('reports::reports.entries')}}</span>
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