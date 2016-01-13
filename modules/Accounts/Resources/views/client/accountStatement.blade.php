@extends('client.layouts.main')
@section('title', trans('accounts::accounts.accountStatement'))
@section('content')


<div class="page-header">
    <h1>{{ trans('accounts::accounts.user_details') }}</h1>
</div>

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">{{ trans('accounts::accounts.user_details') }}</span>
    </div>
    <div class="panel-body">
        <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
            <li class="active">
                 <a href="#profile-tabs-board" data-toggle="tab">{{ trans('accounts::accounts.summry') }}</a>
            </li>
            <li class="">
                <a href="{{ route('clients.accounts.mt4Leverage').'?login='.$oResults->LOGIN}}" >{{ trans('accounts::accounts.leverage') }}</a>
            </li>
            <li class="">
                <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='.$oResults->LOGIN}} ">{{ trans('accounts::accounts.changePassword') }}</a>
            </li> 
            <li class="">
              <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='.$oResults->LOGIN}}" >{{ trans('accounts::accounts.internalTransfer') }}</a>
            </li> 
        </ul>
    </div>

        <!-- ___________________________footer_summery_____________-->
        @if (count($oResults))
        <table class="table table-bordered user-info-table">
            <tr>
                <th colspan="3">Registration date : </th><td>{{ $oResults->REGDATE }}</td>
                <th  >MetaQuotes ID : </th><td>{{ $oResults->MQID }}</td>
            </tr>
            <tr>
                <th >Name : </th><td colspan="3">{{ $oResults->NAME }}</td>
                 <th >City : </th><td >{{ $oResults->CITY }}</td>
            </tr>
            <tr>
               
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
           <th >Leverage : </th><td >{{ $oResults->LEVERAGE }}</td>
            </tr>
           
            <tr>
               
                <th >tax : </th><td >{{ $oResults->TAXES }}%</td>
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

    @endif
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