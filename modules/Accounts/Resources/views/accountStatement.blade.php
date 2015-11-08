@extends('admin.layouts.main')
@section('title', trans('reports::reports.accounts'))
@section('content')
<style type="text/css">
    #content-wrapper{ padding: 0px; margin: 0px;}
    .nav-input-div{padding:7px;}
    .mail-container-header{
        border-bottom: 1px solid #ccc;
        margin-bottom: 7px;
        padding: 5px !important;
    }
    .center_page_all_div{ padding: 0px 10px;}
    .mail-nav .navigation{margin-top: 35px;}
    .user-info-table th{ text-align: right;}
    .user-info-table td{ text-align: left;}
</style>
<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections">
                <li><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div> </li>

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
            {{ trans('reports::reports.accounts') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')


            @if (count($oResults))
            <div class="stat-panel no-margin-b">
                <div class="stat-row">
                    <div class="stat-counters bg-info no-padding text-center">
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Account :{{ $oResults->LOGIN }} </span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Name :{{ $oResults->NAME }}  </span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Leverage :{{ $oResults->LEVERAGE }} </span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="padding-xs-vr"></div>

        

            <!-- ___________________________footer_summery_____________-->
            @if (count($oResults))
            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.Summary') }}

                    </div>
                </div>
                <table class="table table-bordered user-info-table">
                    <tr>
                        <th colspan="3">Registration date : </th><td>{{ $oResults->REGDATE }}</td>
                        <th  >MetaQuotes ID : </th><td>{{ $oResults->MQID }}</td>
                    </tr>
                    <tr>
                        <th >Name : </th><td colspan="3">{{ $oResults->NAME }}</td>
                        <th  >Phone password : </th><td>{{ $oResults->PASSWORD_PHONE }}</td>
                    </tr>
                    <tr>
                        <th >City : </th><td >{{ $oResults->CITY }}</td>
                        <th >State : </th><td >{{ $oResults->STATE }}</td>
                        <th  >Country : </th><td>{{ $oResults->COUNTRY }}</td>
                    </tr>
                    <tr>
                        <th >Address : </th><td  colspan="3">{{ $oResults->ADDRESS }}</td>
                        <th >Zip-code : </th><td >{{ $oResults->ZIPCODE }}</td>
                    </tr>
                    <tr>
                        <th >Phone : </th><td >{{ $oResults->PHONE }}</td>
                        <th >Email : </th><td  colspan="3">{{ $oResults->EMAIL }}</td>
                    </tr>
                    <tr>
                        <th >ID number : </th><td >{{ $oResults->ID }}</td>
                        <th >Status : </th><td >{{ $oResults->STATUS }}</td>
                        <th  >Color : </th><td>{{ $oResults->USER_COLOR }}</td>
                    </tr>
                    <tr>
                        <th >Group : </th><td >{{ $oResults->GROUP }}</td>
                        <th >comment : </th><td  colspan="3">{{ $oResults->COMMENT }}</td>
                    </tr>
                    <tr>
                        <th >Leverage : </th><td >{{ $oResults->LEVERAGE }}</td>
                        <th >tax : </th><td >{{ $oResults->TAXES }}%</td>
                        <th  >Agent account : </th><td>{{ $oResults->AGENT_ACCOUNT }}</td>
                    </tr>
                    <tr>
                        <th class="no-warp"></th><td></td>
                        <th class="no-warp">Deposit / Withdrawal :</th><td>{{ $aSummery['deposit'] }}</td>
                        <th class="no-warp">Credit Facility :</th><td>{{ $aSummery['credit_facility'] }}</td>
                    </tr>
                    <tr>
                        <th class="no-warp">Closed Trade P/L : </th><td>{{ $aSummery['closed_trade'] }}</td>
                        <th class="no-warp">Floating P/L : </th><td>{{ $aSummery['floating'] }}</td>
                        <th class="no-warp">Margin : </th><td>{{ $oResults->MARGIN }}</td>
                    </tr>
                    <tr>
                        <th class="no-warp">Balance : </th><td>{{ $oResults->BALANCE }}</td>
                        <th class="no-warp">Equity : </th><td>{{ $oResults->EQUITY }}</td>
                        <th class="no-warp">Free Margin : </th><td>{{ $oResults->MARGIN_FREE }}</td>
                    </tr>
                </table>				

                <div class="table-footer">

                </div>
            </div>
            @endif
            <!--______________tables__________-->
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


    });
</script>
@stop