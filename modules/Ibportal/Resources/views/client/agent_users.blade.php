@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.agent_users'))
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

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
                {{ trans('ibportal::ibportal.agent_users') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('ibportal::ibportal.agent_users') }}
                        </div>
                    </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.id'), 'id', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.first_name'), 'first_name', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.last_name'), 'last_name', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.Email'), 'email', $oResults) !!}</th>

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


                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}



                                    {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                </div>
                            @endif

                            <div class="col-sm-3">
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