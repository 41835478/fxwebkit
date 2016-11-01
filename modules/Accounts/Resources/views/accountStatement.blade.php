@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accountStatement'))
@section('content')
    <div id="content-wrapper">

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
                        <a href="{{ route('accounts.mt4UserDetails').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}&from_date=&to_date=&search=Search&sort=asc&order=login"><i class="fa fa-file-text"></i>{{ trans('accounts::accounts.summry') }}</a>
                    </li>

                        <li>
                            <a href="{{ route('accounts.mt4Leverage').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}"><i class="fa fa-level-up"></i> {{ trans('accounts::accounts.leverage') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('accounts.mt4ChangePassword').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}} "><i class="fa fa-users"></i>{{ trans('accounts::accounts.changePassword') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('accounts.mt4InternalTransfer').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}"><i class="fa fa-retweet tooltip_number"></i> {{ trans('accounts::accounts.internalTransfer') }}</a>
                        </li>


                        <li >
                            <a href="{{ route('accounts.withDrawal').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}"><i class="fa fa-external-link"></i> {{ trans('accounts::accounts.withDrawal') }}</a>
                        </li>

                    <li class="">
                        <a href="{{ route('accounts.mt4AssignedUsers').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}"><i class="fa fa-link"></i>{{ trans('accounts::accounts.assignedUsers') }}</a>
                    </li>
                </ul>
            </div>

            <!-- ___________________________footer_summery_____________-->
            @if (count($oResults))
                <div class="panel-body " id="mt4StatementListAllDiv">

                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.registration_date') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->REGDATE }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.meta_quotes_id') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->MQID }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>


                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.name') }} </label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->NAME }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.phone_password :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->MQID }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>


                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.state :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->STATE }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.country') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->COUNTRY }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>


                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.address :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->ADDRESS }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.zip_code') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->ZIPCODE }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.phone') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->PHONE }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.email') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->EMAIL }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.id_number :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->ID }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.status :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->STATUS }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.leverage :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">1:{{ $oResults->LEVERAGE }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.tax') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->TAXES }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.deposit_withdrawal') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $aSummery['deposit'] }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.credit_facility') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $aSummery['credit_facility'] }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.closed_trade') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $aSummery['closed_trade'] }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.floating') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $aSummery['floating'] }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.margin :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->MARGIN }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.balance :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->BALANCE }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>


                    <div class="row">
                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.equity :') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ $oResults->EQUITY }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->

                        <div class="col-xs-4 col-sm-2 text-right">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.free_margin') }}</label>
                            </div>
                        </div>
                        <!-- ol-sm-6 -->
                        <div class="col-xs-8 col-sm-4 text-left">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{  $oResults->MARGIN_FREE }}</label>
                            </div>
                        </div>
                        <!--ol-sm-6 -->
                    </div>

                </div>

                <table class="table table-bordered user-info-table " id="mt4StatementTable">
                    <tr>
                        <th colspan="3">{{ trans('accounts::accounts.registration_date') }} </th>
                        <td>{{ $oResults->REGDATE }}</td>
                        <th>{{ trans('accounts::accounts.meta_quotes_id') }} </th>
                        <td>{{ $oResults->MQID }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('accounts::accounts.name') }} </th>
                        <td colspan="3">{{ $oResults->NAME }}</td>
                        <th>{{ trans('accounts::accounts.phone_password :') }} </th>
                        <td>{{ $oResults->PASSWORD_PHONE }}</td>
                    </tr>
                    <tr>

                        <th>{{ trans('accounts::accounts.state :') }} </th>
                        <td>{{ $oResults->STATE }}</td>
                        <th>{{ trans('accounts::accounts.country') }} </th>
                        <td>{{ $oResults->COUNTRY }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('accounts::accounts.address :') }} </th>
                        <td colspan="3">{{ $oResults->ADDRESS }}</td>
                        <th>{{ trans('accounts::accounts.zip_code') }} </th>
                        <td>{{ $oResults->ZIPCODE }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('accounts::accounts.phone') }} </th>
                        <td>{{ $oResults->PHONE }}</td>
                        <th>{{ trans('accounts::accounts.email') }}</th>
                        <td colspan="3">{{ $oResults->EMAIL }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('accounts::accounts.id_number :') }} </th>
                        <td>{{ $oResults->ID }}</td>
                        <th>{{ trans('accounts::accounts.status :') }} </th>
                        <td>{{ $oResults->STATUS }}</td>
                        <th>{{ trans('accounts::accounts.leverage :') }}</th>
                        <td>1:{{ $oResults->LEVERAGE }}</td>
                    </tr>

                    <tr>

                        <th>{{ trans('accounts::accounts.tax') }} </th>
                        <td>{{ $oResults->TAXES }}%</td>
                        <th class="no-warp">{{ trans('accounts::accounts.deposit_withdrawal') }}</th>
                        <td>{{ $aSummery['deposit'] }}</td>
                        <th class="no-warp">{{ trans('accounts::accounts.credit_facility') }}</th>
                        <td>{{ $aSummery['credit_facility'] }}</td>
                    </tr>

                    <tr>
                        <th class="no-warp">{{ trans('accounts::accounts.closed_trade') }} </th>
                        <td>{{ $aSummery['closed_trade'] }}</td>
                        <th class="no-warp">{{ trans('accounts::accounts.floating') }} </th>
                        <td>{{ $aSummery['floating'] }}</td>
                        <th class="no-warp">{{ trans('accounts::accounts.margin :') }} </th>
                        <td>{{ $oResults->MARGIN }}</td>
                    </tr>
                    <tr>
                        <th class="no-warp">{{ trans('accounts::accounts.balance :') }} </th>
                        <td>{{ $oResults->BALANCE }}</td>
                        <th class="no-warp">{{ trans('accounts::accounts.equity :') }} </th>
                        <td>{{ $oResults->EQUITY }}</td>
                        <th class="no-warp">{{ trans('accounts::accounts.free_margin') }} </th>
                        <td>{{ $oResults->MARGIN_FREE }}</td>
                    </tr>
                </table>




            @endif
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