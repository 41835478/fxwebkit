@extends('client.layouts.main')
@section('title', trans('tools::tools.addContract'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('tools::tools.futureContract') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('tools::tools.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('tools::tools.futureContract') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('tools::tools.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">



                        <h3 class="box-title m-b-0">{{ trans('tools::tools.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('tools::tools.tableDescription') }}</p>

                        <div class="panel">

                            <div class="panel-heading">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">

                                            <label class="control-label">{{ $holidayInfo['name'] }}</label>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->


                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{trans('tools::tools.from').' '.$holidayInfo['start_date'] }}</label>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->

                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('tools::tools.to :').' '.$holidayInfo['end_date'] }}</label>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->

                                </div>
                                <!-- row -->
                            </div>


                            <div class="panel-body">


                                <div class="table-light">

                                    <ul id="uidemo-tabs-default-demo" class="nav nav-tabs noIcons">
                                        @foreach($aDates as $oneDate)

                                            <li @if($oneDate == $date) class="active" @endif >
                                                <a href="{{ route('tools.holidayDetails') }}?holiday_id={{$holidayInfo['id']}}&date={{$oneDate}}"> {{$oneDate}}</a>
                                            </li>
                                        @endforeach


                                    </ul>

                                    <table class="table table-bordered table-striped" style="display: table">
                                        <tbody>


                                        @foreach($aSymbolsHours as  $key=>$symbol)
                                            <tr>
                                                <td> {{ $key }}</td>
                                                <td>
                                                    <div class="hoursLneAllDiv">
                                                        @for($i=0;$i<24;$i++)
                                                            <div class="oneHourDiv">{{$i}}</div>
                                                        @endfor
                                                        {{-- */$symbol_id=0;/* --}}
                                                        @if(count($symbol))

                                                            @foreach($symbol as $period)
                                                                <div data-original-title="{{$period[2] }} - {{$period[3]}}"
                                                                     class="hourPeriodDiv"
                                                                     style="left:{{$period[0] }}%;width:{{$period[1] - $period[0] }}%;"></div>
                                                                {{-- */$symbol_id=$period[4];/* --}}
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="{{ route('tools.deleteSymbol') }}?delete_id={{$symbol_id}}&holiday_id={{$holidayInfo['id']}}&date={{$oneDate}}" class="fa fa-trash-o"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>


                                </div>


                            </div>
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
        @section("script")
            @parent
            <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">
            <script>

                init.push(function () {
                    $('.hourPeriodDiv').tooltip();
                });

                init.push(function () {
                    var options = {
                        format: "yyyy-mm-dd",
                        todayBtn: "linked",
                        orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
                    }

                    $('input[name="expiry_date"],input[name="start_date"]').datepicker(options);
                });

                var options2 = {
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: false,
                    showInputs: false,
                    orientation: $('body').hasClass('right-to-left') ? {x: 'right', y: 'auto'} : {x: 'auto', y: 'auto'}
                }
                $('input[name="end_time"],input[name="start_time"]').timepicker(options2);


                $('.securitiesCheckbox').change(function () {
                    var security_id = $(this).val();

                    if ($(this).prop("checked")) {
                        $(".symbols_tr_" + security_id + " .symbolsCheckbox").prop("checked", true);
                    } else {

                        $(".symbols_tr_" + security_id + " .symbolsCheckbox").prop("checked", false);
                    }
                });
            </script>
        @stop
        @section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('tools::tools.trading_hours_over_the').' '. $holidayInfo['name']  }}</h1>
    </div>

    <div class="panel">

        <div class="panel-heading">
            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">

                        <label class="control-label">{{ $holidayInfo['name'] }}</label>
                    </div>
                </div>
                <!-- col-sm-6 -->


                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{trans('tools::tools.from')}}{{ $holidayInfo['start_date'] }}</label>
                    </div>
                </div>
                <!-- col-sm-6 -->

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{trans('tools::tools.to :')}} {{ $holidayInfo['end_date'] }}</label>
                    </div>
                </div>
                <!-- col-sm-6 -->

            </div>
            <!-- row -->
        </div>


        <div class="panel-body">


            <div class="table-light">

                <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                    @foreach($aDates as $oneDate)

                        <li @if($oneDate == $date) class="active" @endif >
                            <a href="{{ route('client.tools.holidayDetails') }}?holiday_id={{$holidayInfo['id']}}&date={{$oneDate}}"> {{$oneDate}}</a>
                        </li>
                    @endforeach


                </ul>

                <table class="table table-bordered table-striped">
                    <tbody>


                    @foreach($aSymbolsHours as  $key=>$symbol)
                        <tr>
                            <td> {{ $key }}</td>
                            <td>
                                <div class="hoursLneAllDiv">
                                    @for($i=0;$i<24;$i++)
                                        <div class="oneHourDiv">{{$i}}</div>
                                    @endfor
                                        {{-- */$symbol_id=0;/* --}}
                                    @if(count($symbol))

                                        @foreach($symbol as $period)
                                            <div data-original-title="{{$period[2] }} - {{$period[3]}}"
                                                 class="hourPeriodDiv"
                                                 style="left:{{$period[0] }}%;width:{{$period[1] - $period[0] }}%;"></div>
                                                {{-- */$symbol_id=$period[4];/* --}}
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <style type="text/css">
                    .hoursLneAllDiv {
                        width: 100%;
                        height: 30px;
                        position: relative;
                    }

                    .hourPeriodDiv {
                        position: absolute;
                        height: 30px;
                        background-color: rgba(141, 195, 40, 0.46);
                    }

                    .oneHourDiv {
                        width: 4.166666666666%;
                        margin-right: -1px;
                        margin-left: 1px;
                        border-left: 1px solid #aaa;
                        float: left;
                        height: 30px;
                        background-color: #ccc;
                        color: #fff;
                        text-align: center;
                        padding-top: 5px;
                    }
                </style>

            </div>


        </div>
    </div>
        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">
    </div>

</div>
@stop
@section("script")
    @parent
    <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">
    <script>

        init.push(function () {
            $('.hourPeriodDiv').tooltip();
        });

        init.push(function () {
            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }

            $('input[name="expiry_date"],input[name="start_date"]').datepicker(options);
        });

        var options2 = {
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            showInputs: false,
            orientation: $('body').hasClass('right-to-left') ? {x: 'right', y: 'auto'} : {x: 'auto', y: 'auto'}
        }
        $('input[name="end_time"],input[name="start_time"]').timepicker(options2);


        $('.securitiesCheckbox').change(function () {
            var security_id = $(this).val();

            if ($(this).prop("checked")) {
                $(".symbols_tr_" + security_id + " .symbolsCheckbox").prop("checked", true);
            } else {

                $(".symbols_tr_" + security_id + " .symbolsCheckbox").prop("checked", false);
            }
        });
    </script>
@stop