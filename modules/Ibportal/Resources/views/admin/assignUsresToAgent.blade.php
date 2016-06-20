@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.accounts'))
@section('content')

    <div class="padding">
        <div class="theme-default page-mail">
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
                                {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                                <label for="signed_0">{{ trans('ibportal::ibportal.all') }}</label>
                                {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}<label
                                        for="signed_1">{{ trans('ibportal::ibportal.assigned') }}</label>

                            </div>
                        </li>

                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                            </div>
                        </li>
                        <li class="divider"></li>
                    </ul>


                    {!! Form::hidden('agent_id', $aFilterParams['agent_id']) !!}
                    {!! Form::hidden('plan_id', $aFilterParams['plan_id']) !!}
                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                    {!! Form::hidden('order', $aFilterParams['order']) !!}
                    {!!  Form::close() !!}

                </div>
            </div>


            <div class="mail-container ">

                <div class="mail-container-header">
                    {{ trans('ibportal::ibportal.accounts') }}

                </div>

                <div class="center_page_all_div">
                    @include('admin.partials.messages')

                    <div class="table-light">


                        <div class="table-header">

                            <div class="table-caption">
                                {{ trans('ibportal::ibportal.assignUsersToAgent') }}
                            </div>
                        </div>

                        {!! Form::open(['id'=>'assign_form']) !!}
                        <div class="panel">
                            <div class="panel-body">
                                <div class="col-xm-6">
                                    {!! Form::label('plan_id',trans('ibportal::ibportal.agentPlans')) !!}
                                    {!! Form::select('plan_id',$aPlans,$plan_id, ['class'=>'form-control input-sm','onChange'=>'$(\'#assign_form\').submit();']) !!}

                                    <br>
                                </div>
                            </div>
                        </div>

                    @if (count($oResults))

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="no-warp">{!!  Form::checkbox('check_all','0',false,['id'=>'check_all']).'  '.th_sort(trans('ibportal::ibportal.id'), 'id', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.first_name'), 'first_name', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.last_name'), 'last_name', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.Email'), 'email', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.lastLogin'), 'last_login', $oResults) !!}</th>
                                    <th class="no-warp">{!! trans('ibportal::ibportal.plan') !!}</th>
                                    <th class="no-warp"></th>
                                </tr>
                                </thead>
                                <tbody>

                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class='{{ $class }}'>
                                        <td>{!! Form::checkbox('users_checkbox[]',$oResult->id,false,['class'=>'users_checkbox']) !!}  {{ $oResult->id }}</td>
                                        <td>{{ $oResult->first_name }}</td>
                                        <td>{{ $oResult->last_name }}</td>
                                        <td>{{ $oResult->email }}</td>
                                        <td>{{ $oResult->last_login }}</td>

                                        <td>@if(isset($oResult->agentPlan)) {{  $oResult->agentPlan->plan->name }} @endif</td>
                                        <td>
                                            @if(isset($oResult->user_id ) || (isset($oResult->agentPlan) && $oResult->agentPlan->first()->user_id) )
                                                {!! Form::button('<a><i class="fa fa-unlink"></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->id  ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('ibportal::ibportal.un_assign'),'type'=>'submit' ]) !!}
                                            @else

                                                {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->id ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('ibportal::ibportal.assign'),'type'=>'submit' ]) !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="7">

                                        {!! Form::button( trans('ibportal::ibportal.assign') ,['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary' ]) !!}
                                        {!! Form::button(trans('ibportal::ibportal.un_assign'),['name'=>'un_sign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>



                        @endif

                        {!! Form::hidden('agent_id', $aFilterParams['agent_id']) !!}


                        {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                        {!! Form::hidden('order', $aFilterParams['order']) !!}
                        {!! Form::close() !!}



                        <div class="table-footer">

                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                            @if($oResults->total()>25)
                                {!! Form::open(['method'=>'get']) !!}
                                <div class="DT-lf-right change_page_all_div">


                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}



                                    {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                </div>

                                {!! Form::hidden('plan_id', $aFilterParams['plan_id']) !!}
                                {!! Form::hidden('agent_id', $aFilterParams['agent_id']) !!}
                                {!! Form::close() !!}
                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('script')
    @parent
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



        $('input[name="check_all"]').click(function () {
            if ($(this).prop("checked")) {
                $(".users_checkbox").prop("checked", true);
            } else {

                $(".users_checkbox").prop("checked", false);
            }
        });

    </script>

@stop