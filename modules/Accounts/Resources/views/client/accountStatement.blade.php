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
    
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
          
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')
        
            <div class="padding-xs-vr"></div>


            <!-- ___________________________footer_summery_____________-->
            @if (count($oResults))
            <div class="table-info">
                <ul id="profile-tabs" class="nav nav-tabs">
                    <li class="active">
                        <a href="#profile-tabs-board" data-toggle="tab">{{ trans('accounts::accounts.summry') }}</a>
                    </li>
                    <li >
                        <a href="{{ route('clients.accounts.mt4Leverage').'?login='.$oResults->LOGIN}}" >{{ trans('accounts::accounts.leverage') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='.$oResults->LOGIN}} ">{{ trans('accounts::accounts.changePassword') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='.$oResults->LOGIN}}" >{{ trans('accounts::accounts.internalTransfer') }}</a>
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