@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.accounts'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.agent') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.agent') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        {!! Form::open(['id'=>'assign_form']) !!}
                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>


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
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-priority="1">{!!  Form::checkbox('check_all','0',false,['id'=>'check_all']).'  '.th_sort(trans('ibportal::ibportal.id'), 'id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('ibportal::ibportal.first_name'), 'first_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('ibportal::ibportal.last_name'), 'last_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('ibportal::ibportal.Email'), 'email', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('ibportal::ibportal.lastLogin'), 'last_login', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! trans('ibportal::ibportal.plan') !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                    <tr>
                                        <td>{!! Form::checkbox('users_checkbox[]',$oResult->id,false,['class'=>'users_checkbox']) !!}  {{ $oResult->id }}</td>
                                        <td>{{ $oResult->first_name }}</td>
                                        <td>{{ $oResult->last_name }}</td>
                                        <td>{{ $oResult->email }}</td>
                                        <td>{{ $oResult->last_login }}</td>
                                        <td> @if(isset($oResult->agentPlan)) {{  $oResult->agentPlan->plan->name }} @endif</td>
                                        <td>
                                            @if(isset($oResult->user_id ) || (isset($oResult->agentPlan) && $oResult->agentPlan->first()->user_id) )
                                                {!! Form::button('<a><i class="fa fa-unlink"></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->id  ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('ibportal::ibportal.un_assign'),'type'=>'submit' ]) !!}
                                            @else
                                                {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->id ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('ibportal::ibportal.assign'),'type'=>'submit' ]) !!}
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                            <div class="tableFooter">
                                {!! Form::button( trans('ibportal::ibportal.assign') ,['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary' ]) !!}
                                {!! Form::button(trans('ibportal::ibportal.un_assign'),['name'=>'un_sign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}

                            </div>
                        @endif

                        {!! Form::hidden('agent_id', $aFilterParams['agent_id']) !!}
                        {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                        {!! Form::hidden('order', $aFilterParams['order']) !!}
                        {!! Form::close() !!}


                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->
    <div class="right-side-panel">
        <div class="scrollable-right container">
            <!-- .Theme settings -->
            <h3 class="title-heading">{{ trans('ibportal::ibportal.search') }}</h3>




            {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}


            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('ibportal::ibportal.id'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('ibportal::ibportal.first_name'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('ibportal::ibportal.last_name'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('ibportal::ibportal.Email'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>


            <div class="form-group">
                <div class="col-md-12">
                    <div class="radio-list">
                        <label class="radio-inline p-0">
                            <div class="radio radio-info">
                                {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                                <label for="signed_0">{{ trans('ibportal::ibportal.all') }}</label>
                            </div>
                        </label>
                        <label class="radio-inline">
                            <div class="radio radio-info">
                                {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}
                                <label for="signed_1">{{ trans('ibportal::ibportal.assigned') }}</label>
                            </div>
                        </label>
                    </div>

                </div>
            </div>

        <div class="form-group">
            <label class="col-md-12"></label>
            <div class="col-md-12">
                {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

            </div>
        </div>

            {!! Form::hidden('agent_id', $aFilterParams['agent_id']) !!}
            {!! Form::hidden('plan_id', $aFilterParams['plan_id']) !!}
            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close( ) !!}


    </div>
    </div>
@stop
@section('script')
    @parent
    <script>


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



        $('input[name="check_all"]').click(function () {
            if ($(this).prop("checked")) {
                $(".users_checkbox").prop("checked", true);
            } else {

                $(".users_checkbox").prop("checked", false);
            }
        });

    </script>

@stop

@section('hidden')

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
                            <div class="primary_table_div info" >
                                <div class="table">
                                    <div class="thead">
                                        <div class="tr">
                                        <div class="th">{!!  Form::checkbox('check_all','0',false,['id'=>'check_all']).'  '.th_sort(trans('ibportal::ibportal.id'), 'id', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('ibportal::ibportal.first_name'), 'first_name', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('ibportal::ibportal.last_name'), 'last_name', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('ibportal::ibportal.Email'), 'email', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('ibportal::ibportal.lastLogin'), 'last_login', $oResults) !!}</div>
                                        <div class="th">{!! trans('ibportal::ibportal.plan') !!}</div>
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


                                                <div class="td">{!! Form::checkbox('users_checkbox[]',$oResult->id,false,['class'=>'users_checkbox']) !!}  {{ $oResult->id }}</div>
                                                <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->first_name }}</p></div>
                                                <div class="td"><label>{!! trans('ibportal::ibportal.last_name') !!} : </label><p>{{ $oResult->last_name }}</p></div>
                                                <div class="td"><label>{!! trans('ibportal::ibportal.Email') !!} : </label><p>{{ $oResult->email }}</p></div>
                                                <div class="td"><label>{!! trans('ibportal::ibportal.lastLogin') !!} : </label><p>{{ $oResult->last_login }}</p></div>
                                                <div class="td"><label>{!! trans('ibportal::ibportal.plan') !!} : </label><p>@if(isset($oResult->agentPlan)) {{  $oResult->agentPlan->plan->name }} @endif</p></div>
                                                <div class="td">
                                                        @if(isset($oResult->user_id ) || (isset($oResult->agentPlan) && $oResult->agentPlan->first()->user_id) )
                                                            {!! Form::button('<a><i class="fa fa-unlink"></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->id  ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('ibportal::ibportal.un_assign'),'type'=>'submit' ]) !!}
                                                        @else

                                                            {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->id ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('ibportal::ibportal.assign'),'type'=>'submit' ]) !!}
                                                        @endif
                                                </div>


                                                </div>
                                            @endforeach
                                        @endif




                                    </div>







                                </div>

                                <div class="tableFooter">
                                    {!! Form::button( trans('ibportal::ibportal.assign') ,['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary' ]) !!}
                                    {!! Form::button(trans('ibportal::ibportal.un_assign'),['name'=>'un_sign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}

                                </div>
                            </div>





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