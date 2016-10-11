@extends('admin.layouts.main')
@section('title', trans('tools::tools.addContract'))
@section('content')
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