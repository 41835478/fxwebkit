@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.user_details'))
@section('content')
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
                        <a href="{{ route('accounts.withDrawal').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-external-link"></i></i>{{ trans('accounts::accounts.withDrawal') }}</a>
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

