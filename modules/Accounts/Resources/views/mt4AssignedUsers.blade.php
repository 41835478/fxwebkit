@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.user_details'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.assignedUsers') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.mt4Users') }} / {{ trans('accounts::accounts.assignedUsers') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('accounts::accounts.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li>
                    <a href="{{ route('accounts.mt4UserDetails').'?login='.$login.'&server_id='.$server_id}}&from_date=&to_date=&search=Search&sort=asc&order=login"><i class="fa fa-file-text"></i>{{ trans('accounts::accounts.summry') }}</a>
                </li>
                <li>

                    <a href="{{ route('accounts.mt4Leverage').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-level-up"></i> {{ trans('accounts::accounts.leverage') }}</a>
                </li>
                <li  >
                    <a href="{{ route('accounts.mt4ChangePassword').'?login='.$login.'&server_id='.$server_id}} "><i class="fa fa-users"></i>{{ trans('accounts::accounts.changePassword') }}</a>
                </li>
                <li>
                    <a href="{{ route('accounts.mt4InternalTransfer').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-retweet tooltip_number"></i></i>{{ trans('accounts::accounts.internalTransfer') }}</a>
                </li>
                <li  >
                    <a href="{{ route('accounts.withdrawal').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-external-link"></i></i>{{ trans('accounts::accounts.withdrawal') }}</a>
                </li>

                <li class="active">
                    <a href="{{ route('accounts.mt4AssignedUsers').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-link"></i>{{ trans('accounts::accounts.assignedUsers') }}</a>
                </li>

            </ul>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        {!! Form::open(['class'=>'panel form-horizontal']) !!}
                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>



                            <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                <thead>
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('accounts::accounts.id'), 'id', $oResults) !!}</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('accounts::accounts.first_name'), 'first_name', $oResults) !!}</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('accounts::accounts.last_name'), 'last_name', $oResults) !!}</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('accounts::accounts.Email'), 'email', $oResults) !!}</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5"></th>

                                </tr>
                                </thead>
                                <tbody>


                                @if (count($oResults))
                                    {{--*/$i=0;/*--}}
                                    {{--*/$class='';/*--}}
                                    @foreach($oResults as $oResult)
                                        {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}

                                        <tr>
                                            <td>{{ $oResult->id }}</td>
                                            <td>{{ $oResult->first_name }}</td>
                                            <td>{{ $oResult->last_name }}</td>
                                            <td>{{ $oResult->email }}</td>
                                            <td>
                                                <a href="{{ route('accounts.unssignUserFromMt4User').'?user_id='.$oResult->id.'&login='.$login.'&server_id='.$server_id }}"
                                                   class="fa fa-unlink tooltip_number" data-original-title="{{trans('accounts::accounts.un_assign')}}"></a>

                                            </td>
                                        </tr>

                                    @endforeach
                                @endif

                                </tbody>
                            </table>


                            {{--@if (count($oResults))--}}
                                {{--<div class="row">--}}

                                    {{--<div class="col-xs-12 col-sm-6 ">--}}
                                        {{--<span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>--}}
                                    {{--</div>--}}


                                    {{--<div class="col-xs-12 col-sm-6 ">--}}
                                        {{--{!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}


                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                            {!! Form::close() !!}
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
@section('hidden')
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('accounts::accounts.user_details') }}</h1>
        </div>
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel">

            <div class="panel-heading">
                <span class="panel-title">{{ trans('accounts::accounts.user_details') }}</span>
            </div>

            <div class="panel-body">
                <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                    <li>
                        <a href="{{ route('accounts.mt4UserDetails').'?login='.$login.'&server_id='.$server_id}}&from_date=&to_date=&search=Search&sort=asc&order=login"><i class="fa fa-file-text"></i>{{ trans('accounts::accounts.summry') }}</a>
                    </li>
                    <li>

                        <a href="{{ route('accounts.mt4Leverage').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-level-up"></i> {{ trans('accounts::accounts.leverage') }}</a>
                    </li>
                    <li  >
                        <a href="{{ route('accounts.mt4ChangePassword').'?login='.$login.'&server_id='.$server_id}} "><i class="fa fa-users"></i>{{ trans('accounts::accounts.changePassword') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('accounts.mt4InternalTransfer').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-retweet tooltip_number"></i></i>{{ trans('accounts::accounts.internalTransfer') }}</a>
                    </li>
                    <li  >
                        <a href="{{ route('accounts.withdrawal').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-external-link"></i></i>{{ trans('accounts::accounts.withdrawal') }}</a>
                    </li>

                    <li class="active">
                        <a href="{{ route('accounts.mt4AssignedUsers').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-link"></i>{{ trans('accounts::accounts.assignedUsers') }}</a>
                    </li>

                </ul>




                <table class="table table-bordered table-striped" style="display: table">
                    <thead>
                    <tr>
                        <th class="no-warp">{!! th_sort(trans('accounts::accounts.id'), 'id', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('accounts::accounts.first_name'), 'first_name', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('accounts::accounts.last_name'), 'last_name', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('accounts::accounts.Email'), 'email', $oResults) !!}</th>
                        <th class="no-warp"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($oResults))
                        {{-- */$i=0;/* --}}
                        {{-- */$class='';/* --}}
                        @foreach($oResults as $oResult)
                            {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                            <tr class='{{ $class }}'>
                                <td>{{ $oResult->id }}</td>
                                <td>{{ $oResult->first_name }}</td>
                                <td>{{ $oResult->last_name }}</td>
                                <td>{{ $oResult->email }}</td>
                                <td>
                                    <a href="{{ route('accounts.unssignUserFromMt4User').'?user_id='.$oResult->id.'&login='.$login.'&server_id='.$server_id }}"
                                       class="fa fa-unlink tooltip_number" data-original-title="{{trans('accounts::accounts.un_assign')}}"></a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>




            </div>


            {!!   View('admin/partials/messages')->with('errors',$errors) !!}

            {!! Form::close() !!}
        </div>
        <script>

            init.push(function () {

                $('.tooltip_number').tooltip();

            });
        </script>
        @stop

