@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accounts'))
@section('content')

    <div class="padding">
        <div class="theme-default page-mail">
            <div class="mail-nav">
                <div class="navigation">
                    {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                    <ul class="sections">
                        <li class="active"><a href="#"> <i
                                        class="fa fa-search"></i> {{ trans('accounts::accounts.search') }} </a></li>

                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('accounts::accounts.id'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('accounts::accounts.first_name'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('accounts::accounts.last_name'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('accounts::accounts.Email'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>

                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::select('active', $aActive, $aFilterParams['active'], ['class'=>'form-control  input-sm']) !!}</div>
                        </li>

                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                            </div>
                        </li>
                        <li class="divider"></li>
                    </ul>


                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                    {!! Form::hidden('order', $aFilterParams['order']) !!}


                </div>
            </div>

            <div class="mail-container ">
                <div class="mail-container-header">
                    {{ trans('accounts::accounts.accounts') }}
                </div>
                <div class="center_page_all_div">
                    @include('admin.partials.messages')

                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('accounts::accounts.accounts') }}
                                <a href="{{ route('accounts.addAccount') }}" style="float:right;">
                                    <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                           value="{{ trans('accounts::accounts.addAccount') }}"> </a>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.id'), 'id', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.first_name'), 'first_name', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.last_name'), 'last_name', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.Email'), 'email', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('accounts::accounts.lastLogin'), 'last_login', $oResults) !!}</th>
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
                                        <td>{{ $oResult->last_login }}</td>

                                        <td>
                                            <a href="{{ route('accounts.editAccount').'?edit_id='.$oResult->id }}"
                                               class="fa fa-edit tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.editAccount')}}"></a>
                                            <a href="{{ route('accounts.deleteAccount').'?delete_id='.$oResult->id }}"
                                               class="fa fa-trash-o tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.deleteAccount')}}"></a>
                                            <a href="{{ route('accounts.detailsAccount').'?edit_id='.$oResult->id }}"
                                               class="fa fa-file-text tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.detailsAccount')}}"></a>
                                            <a href="{{ route('accounts.asignMt4Users').'?account_id='.$oResult->id }}"
                                               class="fa fa-link tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.asignMt4Users')}}"></a>

                                            @if(!$oResult->hasAnyAccess('user.block'))

                                                <a href="{{ route('accounts.unBlockAccount').'?account_id='.$oResult->id }}"
                                                   class="fa fa-unlock tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.blockAccount')}}"></a>

                                            @else

                                                <a href="{{ route('accounts.blockAccount').'?account_id='.$oResult->id }}"
                                                   class="fa fa-lock tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.unBlockAccount')}}"> </a>
                                            @endif

                                            @if(!$oResult->hasAnyAccess('user.denyLiveAccount'))

                                                <a href="{{ route('accounts.unAllowedLiveAccount').'?account_id='.$oResult->id }}"
                                                   class="fa fa-circle-o tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.unAllowedLiveAccount')}}"></a>

                                            @else

                                                <a href="{{ route('accounts.allowLiveAccoun').'?account_id='.$oResult->id }}"
                                                   class="fa fa-check-circle-o tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.allowLiveAccoun')}}"></a>
                                            @endif


                                            @if(!count($oResult->activations))
                                                <a href="{{ route('accounts.activateUser').'?account_id='.$oResult->id }}"
                                                   class="fa fa-check tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.activateUser')}}"></a>
                                            @endif

                                            @if((count($oResult->activations) && $oResult->activations[0]->completed ==0) || !count($oResult->activations))
                                            <a href="{{ route('accounts.activateUser').'?account_id='.$oResult->id }}"
                                               class="fa fa-check tooltip_number" data-original-title="{{trans('accounts::accounts.activateUser')}}"></a>
@endif

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="table-footer">
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