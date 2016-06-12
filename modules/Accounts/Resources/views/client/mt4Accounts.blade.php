@extends('client.layouts.main')
@section('title', trans('accounts::accounts.mt4UsersList'))
@section('content')

        <div class="theme-default page-mail ">


            <div class="mail-container page-left">
                <div class="mail-container-header">
                    {{ trans('accounts::accounts.mt4_users_lists') }}
                </div>
                <div class="center_page_all_div">
                    @include('client.partials.messages')

                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('accounts::accounts.mt4Users') }}
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.liveDemo'), 'server_id', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.reg_date'), 'REGDATE', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.last_date'), 'LASTDATE', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</th>
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
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                                        <td>{{ $oResult->NAME }}</td>
                                        <td>{{ $oResult->REGDATE }}</td>
                                        <td>{{ $oResult->LASTDATE }}</td>
                                        <td>{{ $oResult->LEVERAGE }}</td>
                                        <td>
                                            <a href="{{ route('clients.accounts.mt4UserDetails').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-file-text tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.mt4UserDetails')}}"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="table-footer ">

                            @if (count($oResults))
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                @if($oResults->total()>25)
                                    <div class="DT-lf-right change_page_all_div">

                                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}

                                        {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                    </div>
                                @endif
                                <div class="col-sm-3">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {!! Form::close() !!}
    <script>
        init.push(function () {

            $('.tooltip_number').tooltip();


            $('#all-groups-chx').change(function () {

                if ($('#all-groups-chx').prop('checked')) {
                    $('#all-groups-slc').attr('disabled', 'disabled');
                } else {
                    $('#all-groups-slc').removeAttr('disabled');
                }
            });
            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }


            $('#exactLogin').change(function () {
                if ($('#exactLogin').prop('checked')) {
                    $("#from_login_li,#to_login_li").hide();
                    $("#login_li").show();
                } else {
                    $("#from_login_li,#to_login_li").show();
                    $("#login_li").hide();
                }
            });

            if ($('#exactLogin').prop('checked')) {
                $("#from_login_li,#to_login_li").hide();
                $("#login_li").show();
            } else {
                $("#from_login_li,#to_login_li").show();
                $("#login_li").hide();
            }

        });

    </script>
@stop