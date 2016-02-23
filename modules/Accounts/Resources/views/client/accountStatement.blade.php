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

            @if($showMt4Leverage)
                <li>
                    <a href="{{ route('clients.accounts.mt4Leverage').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}">{{ trans('accounts::accounts.leverage') }}</a>
                </li>
            @endif
            @if($showMt4ChangePassword)
                <li>
                    <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}} ">{{ trans('accounts::accounts.changePassword') }}</a>
                </li>
            @endif
            @if($showMt4Transfer)
                <li >
                    <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}">{{ trans('accounts::accounts.internalTransfer') }}</a>
                </li>
            @endif
        </ul>
    </div>

        <!-- ___________________________footer_summery_____________-->
        @if (count($oResults))
        <table class="table table-bordered user-info-table">
            <tr>
                <th colspan="3">{{ trans('accounts::accounts.registration_date') }} </th><td>{{ $oResults->REGDATE }}</td>
                <th  >{{ trans('accounts::accounts.meta_quotes_id') }} </th><td>{{ $oResults->MQID }}</td>
            </tr>
            <tr>
                <th >{{ trans('accounts::accounts.name') }} </th><td colspan="3">{{ $oResults->NAME }}</td>
                <th  >{{ trans('accounts::accounts.phone_password :') }} </th><td>{{ $oResults->PASSWORD_PHONE }}</td>
            </tr>
            <tr>

                <th >{{ trans('accounts::accounts.state :') }} </th><td >{{ $oResults->STATE }}</td>
                <th  >{{ trans('accounts::accounts.country') }} </th><td>{{ $oResults->COUNTRY }}</td>
            </tr>
            <tr>
                <th >{{ trans('accounts::accounts.address :') }} </th><td  colspan="3">{{ $oResults->ADDRESS }}</td>
                <th >{{ trans('accounts::accounts.zip_code') }} </th><td >{{ $oResults->ZIPCODE }}</td>
            </tr>
            <tr>
                <th >{{ trans('accounts::accounts.phone') }} </th><td >{{ $oResults->PHONE }}</td>
                <th >{{ trans('accounts::accounts.email') }}</th><td  colspan="3">{{ $oResults->EMAIL }}</td>
            </tr>
            <tr>
                <th >{{ trans('accounts::accounts.id_number :') }} </th><td >{{ $oResults->ID }}</td>
                <th >{{ trans('accounts::accounts.status :') }} </th><td >{{ $oResults->STATUS }}</td>
                <th >{{ trans('accounts::accounts.leverage :') }}</th><td >{{ $oResults->LEVERAGE }}</td>
            </tr>
           
            <tr>

                <th >{{ trans('accounts::accounts.tax') }} </th><td >{{ $oResults->TAXES }}%</td>
                <th class="no-warp">{{ trans('accounts::accounts.deposit_withdrawal') }}</th><td>{{ $aSummery['deposit'] }}</td>
                <th class="no-warp">{{ trans('accounts::accounts.credit_facility') }}</th><td>{{ $aSummery['credit_facility'] }}</td>
            </tr>
       
            <tr>
                <th class="no-warp">{{ trans('accounts::accounts.closed_trade') }} </th><td>{{ $aSummery['closed_trade'] }}</td>
                <th class="no-warp">{{ trans('accounts::accounts.floating') }} </th><td>{{ $aSummery['floating'] }}</td>
                <th class="no-warp">{{ trans('accounts::accounts.margin :') }} </th><td>{{ $oResults->MARGIN }}</td>
            </tr>
            <tr>
                <th class="no-warp">{{ trans('accounts::accounts.balance :') }} </th><td>{{ $oResults->BALANCE }}</td>
                <th class="no-warp">{{ trans('accounts::accounts.equity :') }} </th><td>{{ $oResults->EQUITY }}</td>
                <th class="no-warp">{{ trans('accounts::accounts.free_margin') }} </th><td>{{ $oResults->MARGIN_FREE }}</td>
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