@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')

    <div id="page-wrapper" style="min-height: 502px;">

<div class="container-fluid">


    <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
        <div class="col-lg-12">
            <h4 class="page-title">{{ trans('dashboard.PageTitle') }}</h4>
        </div>
        <div class="col-sm-6 col-md-6 col-xs-12">
            <ol class="breadcrumb pull-left">
                <li><a href="#">Admin</a></li>
                <li class="active">{{ trans('dashboard.PageTitle') }}</li>
            </ol>
        </div>
        <div class="col-sm-6 col-md-6 col-xs-12">
            <form role="search" class="app-search hidden-xs pull-right">
                <input type="text" placeholder=" {{ trans('general.Search') }} ..." class="form-control">
                <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
            </form>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">{{ trans('dashboard.user') }} / {{ trans('dashboard.mt4User') }} </h3>
                <p class="text-muted m-b-30 font-13">  {{ trans('dashboard.request') }} </p>




                <div class="row row-in">

                    <div class="col-lg-4 col-sm-6 row-in-br" onclick="window.location.href='{{ route('accounts.accountsList').'?active=0'}}';">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="fa fa-users"></i>
                                <h5 class="text-muted vb">{{ trans('dashboard.user') }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-danger">
                                              {{$statistics['usersNumber']}}</h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-4 col-sm-6 row-in-br  b-r-none" onclick="window.location.href='{{ route('accounts.accountsList').'?active=1'}}';">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                                <h5 class="text-muted vb">{{ trans('dashboard.activeAccount') }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-megna">{{$statistics['activeUsersNumber']}}</h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 col-sm-6 row-in-br" onclick="window.location.href='{{ route('accounts.accountsList').'?active=2'}}';">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                                <h5 class="text-muted vb">{{ trans('dashboard.notActive') }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-primary">{{  $statistics['usersNumber'] - $statistics['activeUsersNumber']}}</h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>






                <div class="row row-in">




                    <div class="col-lg-4 col-sm-6  b-0" onclick="window.location.href='{{ route('accounts.Mt4UsersList').'?server_id=-1'}}';">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-user" data-icon=""></i>
                                <h5 class="text-muted vb">{{ trans('dashboard.mt4User') }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-success">{{$statistics['mt4UsersNumber']}}</h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="col-lg-4 col-sm-6 row-in-br" onclick="window.location.href=' {{ route('accounts.Mt4UsersList').'?server_id=1'}}';">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                <h5 class="text-muted vb"> {{ trans('dashboard.demoMt4User') }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-danger"> {{$statistics['mt4UsersNumber'] - $statistics['liveMt4UsersNumber'] }}</h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>








                    <div class="col-lg-4 col-sm-6 row-in-br  b-r-none" onclick="window.location.href='{{ route('accounts.Mt4UsersList').'?server_id=0'}}';">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                                <h5 class="text-muted vb"> {{ trans('dashboard.liveMt4User') }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-megna"> {{ 	$statistics['liveMt4UsersNumber']}}</h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
















                <table class="table full-color-table full-info-table hover-table">
                    <thead>
                    <tr>
                        <th class="no-warp">{!! (trans('dashboard.request')) !!}</th>
                        <th class="no-warp">{!! (trans('dashboard.complete')) !!}</th>
                        <th class="no-warp">{!! (trans('dashboard.pending')) !!}</th>
                        <th class="no-warp">{!! (trans('dashboard.fail')) !!}</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th>{!! (trans('dashboard.internalTransfer')) !!}</th>
                        <td>{{$InternalTransfer['complete']}}</td>
                        <td>{{$InternalTransfer['pending']}}</td>
                        <td>{{$InternalTransfer['fail']}}</td>

                    </tr>
                    <tr>
                        <th>{!! (trans('dashboard.withdrawal')) !!}</th>
                        <td>{{$Withdrawal['complete']}}</td>
                        <td>{{$Withdrawal['pending']}}</td>
                        <td>{{$Withdrawal['fail']}}</td>

                    </tr>
                    <tr>
                        <th>{!! (trans('dashboard.changeLeverage')) !!}</th>
                        <td>{{$ChangeLeverage['complete']}}</td>
                        <td>{{$ChangeLeverage['pending']}}</td>
                        <td>{{$ChangeLeverage['fail']}}</td>

                    </tr>

                    <tr>
                        <th>{!! (trans('dashboard.changePassword')) !!}</th>
                        <td>{{$ChangePassword['complete']}}</td>
                        <td>{{$ChangePassword['pending']}}</td>
                        <td>{{$ChangePassword['fail']}}</td>

                    </tr>

                    <tr>
                        <th>{!! (trans('dashboard.addAccount')) !!}</th>
                        <td>{{$AddAccount['complete']}}</td>
                        <td>{{$AddAccount['pending']}}</td>
                        <td>{{$AddAccount['fail']}}</td>

                    </tr>

                    <tr>
                        <th>{!! (trans('dashboard.assignAccounts')) !!}</th>
                        <td>{{$AssingAccounts['complete']}}</td>
                        <td>{{$AssingAccounts['pending']}}</td>
                        <td>{{$AssingAccounts['fail']}}</td>

                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
    </div>
@stop
@section('content')

    <div id="content-wrapper">
        <div class="page-header">
            <h1><i class="fa fa-dashboard page-header-icon"></i>{{ trans('dashboard.PageTitle') }}</h1>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="stat-panel ">
                <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
                <a href="{{ route('accounts.accountsList').'?active=0'}}"
                   class="stat-cell col-xs-5 bg-info bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    <i class="fa fa-users"></i>&nbsp;&nbsp;<strong>{{$statistics['usersNumber']}}</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="{{ route('accounts.accountsList').'?active=1'}}"
                               class="stat-cell bg-info padding-sm valign-middle">
                                {{$statistics['activeUsersNumber']}} {{ trans('dashboard.activeAccount') }}
                                <i class="fa fa-check pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="{{ route('accounts.accountsList').'?active=2'}}"
                               class="stat-cell bg-info darken padding-sm valign-middle">
                                {{  $statistics['usersNumber'] - $statistics['activeUsersNumber']}} {{ trans('dashboard.notActive') }}
                                <i class="fa fa-times pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="{{ route('accounts.accountsList').'?active=0'}}"
                               class="stat-cell bg-info darker padding-sm valign-middle">
                                {{$statistics['usersNumber']}}{{ trans('dashboard.user') }}
                                <i class="fa fa-users pull-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.stat-rows -->
                </div>
                <!-- /.stat-cell -->
            </div>

        </div>


        <div class="col-xs-12 col-sm-6">
            <div class="stat-panel ">
                <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
                <a href="{{ route('accounts.Mt4UsersList').'?server_id=-1'}}"
                   class="stat-cell col-xs-5 bg-info bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    <i class="fa fa-exchange"></i>&nbsp;&nbsp;<strong>{{$statistics['mt4UsersNumber']}}</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="{{ route('accounts.Mt4UsersList').'?server_id=0'}}"
                               class="stat-cell bg-info padding-sm valign-middle">
                                {{ 	$statistics['liveMt4UsersNumber']}}{{ trans('dashboard.liveMt4User') }}
                                <i class="fa fa-thumbs-up pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="{{ route('accounts.Mt4UsersList').'?server_id=1'}}"
                               class="stat-cell bg-info darken padding-sm valign-middle">
                                {{$statistics['mt4UsersNumber'] - $statistics['liveMt4UsersNumber'] }}{{ trans('dashboard.demoMt4User') }}
                                <i class="fa fa-user pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="{{ route('accounts.Mt4UsersList').'?server_id=-1'}}"
                               class="stat-cell bg-info darker padding-sm valign-middle">
                                {{$statistics['mt4UsersNumber']}}{{ trans('dashboard.mt4User') }}
                                <i class="fa fa-users pull-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.stat-rows -->
                </div>
                <!-- /.stat-cell -->
            </div>

        </div>

        <div class="col-xs-12">
            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('dashboard.request') }}
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="no-warp">{!! (trans('dashboard.request')) !!}</th>
                        <th class="no-warp">{!! (trans('dashboard.complete')) !!}</th>
                        <th class="no-warp">{!! (trans('dashboard.pending')) !!}</th>
                        <th class="no-warp">{!! (trans('dashboard.fail')) !!}</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th>{!! (trans('dashboard.internalTransfer')) !!}</th>
                        <td>{{$InternalTransfer['complete']}}</td>
                        <td>{{$InternalTransfer['pending']}}</td>
                        <td>{{$InternalTransfer['fail']}}</td>

                    </tr>
                    <tr>
                        <th>{!! (trans('dashboard.withdrawal')) !!}</th>
                        <td>{{$Withdrawal['complete']}}</td>
                        <td>{{$Withdrawal['pending']}}</td>
                        <td>{{$Withdrawal['fail']}}</td>

                    </tr>
                    <tr>
                        <th>{!! (trans('dashboard.changeLeverage')) !!}</th>
                        <td>{{$ChangeLeverage['complete']}}</td>
                        <td>{{$ChangeLeverage['pending']}}</td>
                        <td>{{$ChangeLeverage['fail']}}</td>

                    </tr>

                    <tr>
                        <th>{!! (trans('dashboard.changePassword')) !!}</th>
                        <td>{{$ChangePassword['complete']}}</td>
                        <td>{{$ChangePassword['pending']}}</td>
                        <td>{{$ChangePassword['fail']}}</td>

                    </tr>

                    <tr>
                        <th>{!! (trans('dashboard.addAccount')) !!}</th>
                        <td>{{$AddAccount['complete']}}</td>
                        <td>{{$AddAccount['pending']}}</td>
                        <td>{{$AddAccount['fail']}}</td>

                    </tr>

                    <tr>
                        <th>{!! (trans('dashboard.assignAccounts')) !!}</th>
                        <td>{{$AssingAccounts['complete']}}</td>
                        <td>{{$AssingAccounts['pending']}}</td>
                        <td>{{$AssingAccounts['fail']}}</td>

                    </tr>

                    </tbody>
                </table>
            </div>

        </div>


        <div class="clearFix" style="clear:both;"></div>


    </div>

@stop

