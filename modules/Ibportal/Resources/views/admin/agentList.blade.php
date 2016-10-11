@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.agent'))
@section('content')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('ibportal::ibportal.search') }} </a></li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('ibportal::ibportal.id'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('ibportal::ibportal.first_name'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('ibportal::ibportal.last_name'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('ibportal::ibportal.Email'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>

                    <li><div  class=" nav-input-div  ">{!! Form::select('agents', $agents, $agent, ['class'=>'form-control  input-sm']) !!}</div></li>



                    <li>
                        <div class=" nav-input-div  ">

                            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                            {!! Form::hidden('order', $aFilterParams['order']) !!}
                            {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>


            </div>
        </div>

        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('ibportal::ibportal.agent') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('ibportal::ibportal.agent') }}
                        </div>
                    </div>



                    <div class="primary_table_div info" >
                        <div class="table">


                            <div class="thead">
                                <div class="tr">


                                <div class="th">{!! th_sort(trans('ibportal::ibportal.id'), 'id', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('ibportal::ibportal.first_name'), 'first_name', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('ibportal::ibportal.last_name'), 'last_name', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('ibportal::ibportal.Email'), 'email', $oResults) !!}</div>
                                <div class="th"></div>
                                </div>
                            </div>


                            <div class="tbody">

                                @if (count($oResults))
                                    {{-- */$i=0;/* --}}
                                    {{-- */$class='';/* --}}
                                    @foreach($oResults as $oResult)
                                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                        <div class="tr {{ $class }}">


                                        <div class="td"><label>{!! trans('ibportal::ibportal.id') !!} : </label><p>{{ $oResult->id }}</p></div>
                                        <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->first_name }}</p></div>
                                        <div class="td"><label>{!! trans('ibportal::ibportal.last_name') !!} : </label><p>{{ $oResult->last_name }}</p></div>
                                        <div class="td"><label>{!! trans('ibportal::ibportal.Email') !!} : </label><p>{{ $oResult->email }}</p></div>
                                        <div class="td">
                                                @if(!$oResult->isAgent)
                                                    <a href="{{ route('admin.ibportal.addAgents').'?agentId='.$oResult->id }}"
                                                       class="fa fa-plus tooltip_number"
                                                       data-original-title="{{trans('ibportal::ibportal.makeUserAgent')}}"></a>
                                                @else

                                                    <a href="{{ route('admin.ibportal.agentUsres').'?agentId='.$oResult->id }}"
                                                       class="fa fa-users tooltip_number"
                                                       data-original-title="{{trans('ibportal::ibportal.agentUsres')}}"></a>
                                                    <a href="{{ route('admin.ibportal.agentPlans').'?agentId='.$oResult->id }}"
                                                       class="fa fa-briefcase tooltip_number"
                                                       data-original-title="{{trans('ibportal::ibportal.agentPlans')}}"></a>
                                                    <!--
                                        <a href="{{ route('admin.ibportal.agentCommission').'?agentId='.$oResult->id }}"
                                           class="fa fa-money tooltip_number"
                                           data-original-title="{{trans('ibportal::ibportal.agentCommission')}}"></a>
                                           -->

                                                    <a href="{{ route('admin.ibportal.assignAgents').'?agentId='.$oResult->id }}"
                                                       class="fa  fa-link  tooltip_number"
                                                       data-original-title="{{trans('ibportal::ibportal.assignAgents')}}"></a>

                                                    <a href="{{ route('admin.ibportal.agentMoney').'?agentId='.$oResult->id }}"
                                                       class="fa fa-money tooltip_number"
                                                       data-original-title="{{trans('ibportal::ibportal.agentMoney')}}"></a>

                                                    <a href="{{ route('admin.ibportal.summary').'?agentId='.$oResult->id }}"
                                                       class="fa fa-bar-chart-o tooltip_number"
                                                       data-original-title="{{trans('ibportal::ibportal.summary')}}"></a>

                                                    <a href="{{ route('admin.ibportal.assignUsresAgent').'?agent_id='.$oResult->id }}"
                                                       class="fa  fa-link  tooltip_number"
                                                       data-original-title="{{trans('ibportal::ibportal.assignUsersToAgent')}}"></a>
                                                @endif
                                                </div>

                                        </div>
                                    @endforeach
                                @endif




                            </div>







                        </div>

                        <div class="tableFooter">

                        </div>
                    </div>



                    <div class="table-footer">
                        @if (count($oResults))
                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">


                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}



                                    {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                </div>
                            @endif

                            <div class="col-xs-12 col-lg-3">
                                <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
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