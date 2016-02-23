@extends('admin.layouts.main')
@section('title', trans('tools::tools.addContract'))
@section('content')
    {{-- TODO[moaid] translate this page and put the right words and titles --}}
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

                <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                    @foreach($aDates as $oneDate)

                        <li @if($oneDate == $date) class="active" @endif >
                            <a href="{{ route('tools.holidayDetails') }}?holiday_id={{$holidayInfo['id']}}&date={{$oneDate}}"> {{$oneDate}}</a>
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

                            <td>
                                <a href="{{ route('tools.deleteSymbol') }}?delete_id={{$symbol_id}}&holiday_id={{$holidayInfo['id']}}&date={{$oneDate}}" class="fa fa-trash-o"></a>
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
    @if($errors->any())
        <div class="alert alert-danger alert-dark">
            @foreach($errors->all() as $key=>$error)
                <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="panel-footer text-right">
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