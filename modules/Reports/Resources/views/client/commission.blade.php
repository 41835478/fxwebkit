@extends('client.layouts.main')
@section('title', trans('reports::reports.commission'))
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
            {{ trans('reports::reports.commission') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')


            @if (count($oResults[0]))
                <div class="stat-panel no-margin-b">
                    <div class="stat-row">
                        <div class="stat-counters bg-panel no-padding text-center">
                            <div class="stat-cell col-xs-4 padding-xs-vr">
                                <span class="text-xs">{{ trans('reports::reports.total_commission') }}{{ round($oResults[1], 2) }}</span>
                            </div>
                            <div class="stat-cell col-xs-4 padding-xs-vr">
                                <span class="text-xs">{{ trans('reports::reports.total_lots') }} {{ round($oResults[2], 2) }}</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="padding-xs-vr"></div>
            @endif

            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.commission') }}



                    </div>
                </div>


                <div class="primary_table_div info" >
                    <div class="table">


                        <div class="thead">
                            <div class="tr">





                                <div class="th">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oResults[0]) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oResults[0]) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oResults[0]) !!}</div>



                            </div>
                        </div>


                        <div class="tbody">




                            @if (count($oResults[0]))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults[0] as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <div class="tr {{ $class }}">








                                        <div class="td"><label>{!! trans('reports::reports.symbol') !!} : </label><p>{{ $oResult->SYMBOL }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Commission') !!} : </label><p>{{ round($oResult->COMMISSION, 2) }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.lots') !!} : </label><p>{{ $oResult->VOLUME }}</p></div>


                                    </div>
                                @endforeach
                            @endif




                        </div>







                    </div>

                    <div class="tableFooter">

                    </div>
                </div>




                <div class="table-footer text-right">
                    @if (count($oResults[0]))
                        {!! str_replace('/?', '?', $oResults[0]->appends(Input::except('page'))->render()) !!}

                        @if($oResults[0]->total()>25)

                            <div class="DT-lf-right change_page_all_div" >
                                {!! Form::text('page',$oResults[0]->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}
                                {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                            </div>
                        @endif

                        <div class="col-xs-12 col-lg-3">

                            <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults[0]->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults[0]->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults[0]->total() }} {{trans('reports::reports.entries')}}</span>
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