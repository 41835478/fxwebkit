@extends('client.layouts.main')
@section('title', trans('accounts::accounts.accountStatement'))
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
                <li><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}</div> </li>

                <li><div  class=" nav-input-div  ">

                        <div class="input-group date datepicker-warpper">
                            {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('accounts::accounts.FromDate'),'class'=>'form-control input-sm']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div></li>


                <li><div  class=" nav-input-div  ">
                        <div class="input-group date datepicker-warpper">
                            {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('accounts::accounts.ToDate'),'class'=>'form-control input-sm']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div></li>
                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('accounts::accounts.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
            {{ trans('accounts::accounts.accounts') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')
           

            <!-- ___________________________footer_summery_____________-->
            @if (count($oResults))
            <div class="table-info">
                <ul id="profile-tabs" class="nav nav-tabs">
                    <li class="active">
                        <a href="#profile-tabs-board" data-toggle="tab">Board</a>
                    </li>
                    <li>
                        <a href="{{ route('clients.accounts.mt4Leverage')}}" >Timeline</a>
                    </li>
                    <li>
                        <a href="#profile-tabs-followers" data-toggle="tab">Followers</a>
                    </li>
                    <li>
                        <a href="#profile-tabs-following" data-toggle="tab">Following</a>
                    </li>
                </ul>

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