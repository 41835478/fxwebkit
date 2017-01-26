@extends('admin.layouts.main')
@section('title', trans('general.accounts'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title"
                 style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.massGroupsList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.Settings') }}</a></li>
                        <li class="active">{{ trans('general.massGroupsList') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('general.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs noIcons">
                <li class="active">

                    <a href="{{ route('admin.assginToMassAccountsList').'?group_id='.$aFilterParams['group_id'] }}">{{ trans('general.assginToUsers') }}</a>
                </li>
                <li>

                    <a href="{{ route('admin.assignToMassGroup').'?group_id='.$aFilterParams['group_id']}}">{{ trans('general.assignedMt4Users') }}</a>

                </li>
            </ul>


            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">


                        <h3 class="box-title m-b-0">{{ trans('general.tableHead') }}</h3>

                        <p class="text-muted m-b-20">{{ trans('general.tableDescription') }}</p>

                        @if (count($oResults))
                            {!! Form::open() !!}

                            <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe"
                               data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                               data-tablesaw-mode-switch>

                            <thead>
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).'  '.Form::label('check_all',trans('general.Login')) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('general.server'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('general.name '), 'NAME', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('general.group'), 'GROUP', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('general.last_login'), 'last_login', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

                                        <td>{!! Form::checkbox('users_checkbox[]',$oResult->uid,false,['class'=>'users_checkbox']) !!} {{ $oResult->LOGIN }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->NAME }}</td>
                                        <td>{{ $oResult->GROUP }}</td>
                                        <td>{{ $oResult->last_login }}</td>
                                        <td>
                                            @if(isset($oResult->user_id ) || (isset($oResult->massGroup) && $oResult->massGroup->first()->user_id) )
                                                {!! Form::button('<a><i class="fa fa-unlink"></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->uid  ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                            @else

                                                {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->uid ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        <tfoot>
                        <tr>
                            <td colspan="5">

                                {!! Form::hidden('group_id', $aFilterParams['group_id']) !!}
                                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                {!! Form::hidden('order', $aFilterParams['order']) !!}

                                {!! Form::button( trans('general.assign') ,['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary' ]) !!}
                                {!! Form::button(trans('general.un_assign'),['name'=>'un_sign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}
                            </td>
                        </tr>
                        </tfoot>



                    {!! Form::close() !!}

                    @endif
                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in</footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->

        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('user.Search') }}</h3>


                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}


                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('general.id'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('general.first_name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('general.last_name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('general.Email'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                        <label for="signed_0">{{ trans('general.all') }}</label>
                        {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}<label
                                for="signed_1">{{ trans('general.assigned') }}</label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12"></label>

                    <div class="col-md-12">
                        {!! Form::submit(trans('user.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                    </div>
                </div>

                {!! Form::hidden('group_id', $aFilterParams['group_id']) !!}
                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close( ) !!}


            </div>
        </div>


        @stop
        @section('hidden')

            <div class="padding">
                <div class="theme-default page-mail">
                    <div class="mail-nav">
                        <div class="navigation">
                            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                            <ul class="sections">
                                <li class="active"><a href="#"> <i
                                                class="fa fa-search"></i> {{ trans('general.Search') }} </a></li>

                                <li>
                                    <div class=" nav-input-div  ">
                                        {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('general.id'),'class'=>'form-control input-sm']) !!}
                                    </div>
                                </li>
                                <li>
                                    <div class=" nav-input-div  ">
                                        {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('general.first_name'),'class'=>'form-control input-sm']) !!}
                                    </div>
                                </li>
                                <li>
                                    <div class=" nav-input-div  ">
                                        {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('general.last_name'),'class'=>'form-control input-sm']) !!}
                                    </div>
                                </li>
                                <li>
                                    <div class=" nav-input-div  ">
                                        {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('general.Email'),'class'=>'form-control input-sm']) !!}
                                    </div>
                                </li>

                                <li>
                                    <div class=" nav-input-div  ">
                                        {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                                        <label for="signed_0">{{ trans('general.all') }}</label>
                                        {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}
                                        <label
                                                for="signed_1">{{ trans('general.assigned') }}</label>

                                    </div>
                                </li>

                                <li>
                                    <div class=" nav-input-div  ">
                                        {!! Form::submit(trans('general.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                                    </div>
                                </li>
                                <li class="divider"></li>
                            </ul>


                            {!! Form::hidden('group_id', $aFilterParams['group_id']) !!}
                            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                            {!! Form::hidden('order', $aFilterParams['order']) !!}
                            {!!  Form::close() !!}

                        </div>
                    </div>

                    <div class="mail-container ">

                        <div class="mail-container-header">
                            {{ trans('general.accounts') }}
                        </div>

                        <div class="center_page_all_div">
                            @include('admin.partials.messages')

                            <div class="table-light">

                                <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs noIcons">
                                    <li class="active">

                                        <a href="{{ route('admin.assginToMassAccountsList').'?group_id='.$aFilterParams['group_id'] }}">{{ trans('general.assginToUsers') }}</a>
                                    </li>
                                    <li>

                                        <a href="{{ route('admin.assignToMassGroup').'?group_id='.$aFilterParams['group_id']}}">{{ trans('general.assignedMt4Users') }}</a>

                                    </li>
                                </ul>

                                <div class="table-header">

                                    <div class="table-caption">
                                        {{ trans('general.accounts') }}
                                    </div>
                                </div>

                                @if (count($oResults))
                                    {!! Form::open() !!}

                                    <div class="primary_table_div info">
                                        <div class="table">


                                            <div class="thead">
                                                <div class="tr">


                                                    <div class="th">{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).'  '.Form::label('check_all',trans('general.Login')) !!}</div>
                                                    <div class="th">{!! th_sort(trans('general.server'), 'server_id', $oResults) !!}</div>
                                                    <div class="th">{!! th_sort(trans('general.name '), 'NAME', $oResults) !!}</div>
                                                    <div class="th">{!! th_sort(trans('general.group'), 'GROUP', $oResults) !!}</div>
                                                    <div class="th">{!! th_sort(trans('general.last_login'), 'last_login', $oResults) !!}</div>
                                                    <div class="th"></div>

                                                </div>
                                            </div>


                                            <div class="tbody">

                                                @if (count($oResults))
                                                    {{--*/$i=0;/* --}}
                                                    {{--*/$class='';/* --}}
                                                    @foreach($oResults as $oResult)
                                                        {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                                        <div class="tr {{ $class }}">


                                                            <div class="td"><label>{!! trans('general.Login') !!}
                                                                    : </label>

                                                                <p>{!! Form::checkbox('users_checkbox[]',$oResult->uid,false,['class'=>'users_checkbox']) !!} {{ $oResult->LOGIN }}</p>
                                                            </div>
                                                            <div class="td"><label>{!! trans('general.server') !!}
                                                                    : </label>

                                                                <p>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</p>
                                                            </div>
                                                            <div class="td">
                                                                <label>{!! trans('general.name') !!}  </label>

                                                                <p>{{ $oResult->NAME }}</p></div>
                                                            <div class="td"><label>{!! trans('general.group') !!}
                                                                    : </label>

                                                                <p>{{ $oResult->GROUP }}</p></div>
                                                            <div class="td"><label>{!! trans('general.last_login') !!}
                                                                    : </label>

                                                                <p>{{ $oResult->last_login }}</p></div>
                                                            <div class="td">
                                                                @if(isset($oResult->user_id ) || (isset($oResult->massGroup) && $oResult->massGroup->first()->user_id) )
                                                                    {!! Form::button('<a><i class="fa fa-unlink"></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->uid  ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                                                @else

                                                                    {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->uid ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                                                @endif
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tableFooter">
                                        </div>

                                        <tfoot>
                                        <tr>
                                            <td colspan="5">

                                                {!! Form::hidden('group_id', $aFilterParams['group_id']) !!}
                                                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                                {!! Form::hidden('order', $aFilterParams['order']) !!}

                                                {!! Form::button( trans('general.assign') ,['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary' ]) !!}
                                                {!! Form::button(trans('general.un_assign'),['name'=>'un_sign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}
                                            </td>
                                        </tr>
                                        </tfoot>

                                    </div>

                                    {!! Form::close() !!}

                                @endif


                                <div class="table-footer">

                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                    @if($oResults->total()>25)
                                        {!! Form::open(['method'=>'get']) !!}
                                        <div class="DT-lf-right change_page_all_div">


                                            {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('general.page'),'class'=>'form-control input-sm']) !!}



                                            {!! Form::submit(trans('general.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                        </div>
                                        {!! Form::hidden('group_id', $aFilterParams['group_id']) !!}
                                        {!! Form::close() !!}
                                    @endif

                                    <div class="col-sm-3">
                                        <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
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