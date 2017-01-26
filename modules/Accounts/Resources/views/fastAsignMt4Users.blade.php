@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accounts'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.accounts') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.accounts') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('accounts::accounts.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>


            <ul ul id="uidemo-tabs-default-demo" class="noIcons nav nav-tabs">
                <li>
                    <a href="{{ route('accounts.detailsAccount').'?edit_id='.$aFilterParams['account_id'] }}">{{ trans('accounts::accounts.details') }}</a>
                </li>
                <li class="active">

                    <a href="{{ route('accounts.asignMt4Users').'?account_id='.$aFilterParams['account_id']}}">{{ trans('accounts::accounts.assignedMt4Users') }}</a>
                </li>
            </ul>


            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>

                        <div class="panel-heading">
                            <span class="panel-title">{{ trans('accounts::accounts.enterMt4User') }}</span>
                        </div>

                        <div class="panel-body">
                            {!! Form::open(['class'=>'panel form-horizontal']) !!}
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label">{{ trans('accounts::accounts.Login') }}</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">

                                        {!! Form::text('users_checkbox[]','',['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                                    {!! Form::hidden('server_id',0) !!}
                                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                    {!! Form::hidden('order', $aFilterParams['order']) !!}
                                    {!! Form::button(trans('accounts::accounts.assign'),['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary']) !!}
                                </div>
                            </div>
                                   {!! Form::close() !!}
                        </div>

                        @if (count($oResults))
                        {!! Form::open() !!}
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>
                                <th scope="col"data-tablesaw-priority="1">
                                    {!! Form::checkbox('check_all','0',false,['id'=>'check_all']).
                                    Form::label('check_all',trans('accounts::accounts.Login')) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('accounts::accounts.server'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('accounts::accounts.Group'), 'GROUP', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('accounts::accounts.reg_date'), 'REGDATE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! trans('accounts::accounts.action') !!}</th>
                                <div class="form-group">
                                </div>
                            </tr>
                            </thead>
                            <tbody>

                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                    <tr>
                                        <td >{!! Form::checkbox('users_checkbox[]',$oResult->LOGIN.','.$oResult->server_id,false,['class'=>'users_checkbox']) !!}{{ $oResult->LOGIN }}</td>
                                        <td >{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->NAME }}</td>
                                        <td>{{ $oResult->GROUP }}</td>
                                        <td>{{ $oResult->LASTDATE }}</td>
                                        <td>1:{{ $oResult->LEVERAGE }}</td>
                                        <td>
                                            @if(isset($oResult->users_id ))

                                                {!! Form::button('<a><i class="fa fa-unlink "></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->LOGIN.','.$oResult->server_id  ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('accounts::accounts.un_assign') ,'type'=>'submit' ]) !!}
                                            @else

                                                {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->LOGIN.','.$oResult->server_id  ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('accounts::accounts.assign'),'type'=>'submit' ]) !!}
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                            <div class="tableFooter" style="border:1px solid #eee">
                                {!! Form::button(trans('accounts::accounts.assign'),['name'=>'asign_mt4_users_submit','value'=>'1'  ,'class'=>'btn btn-info btn-sm',' data-original-title'=>trans('accounts::accounts.assign'),'type'=>'submit' ]) !!}
                                {!! Form::button(trans('accounts::accounts.un_assign'),['name'=>'un_sign_mt4_users_submit','value'=>'1'  ,'class'=>'btn btn-info btn-sm',' data-original-title'=>trans('accounts::accounts.un_assign'),'type'=>'submit' ]) !!}
                            </div>

                    {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                    {!! Form::hidden('order', $aFilterParams['order']) !!}
                    {!! Form::hidden('group', (is_array($aFilterParams['group']))?join(',',$aFilterParams['group']):$aFilterParams['group']) !!}
                    {!! Form::hidden('signed',$aFilterParams['signed']) !!}
                    {!! Form::hidden('all_groups', $aFilterParams['all_groups']) !!}
                    {!! Form::hidden('exactLogin', $aFilterParams['exactLogin']) !!}
                    {!! Form::hidden('signed', $aFilterParams['signed']) !!}
                    {!! Form::close() !!}

                    @endif
                        @if (count($oResults))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
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
            <h3 class="title-heading">{{ trans('accounts::accounts.search') }}</h3>
            {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-success">
                        {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                        <label for="exactLogin">{{ trans('accounts::accounts.ExactLogin') }}</label>
                    </div>
                </div>
            </div>

            <div class="form-group" id="from_login_li">
                <div class="col-md-12">
                    {!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('accounts::accounts.FromLogin'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group" id="to_login_li">
                <div class="col-md-12">
                    {!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('accounts::accounts.ToLogin'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group" id="login_li">
                <div class="col-md-12">
                    {!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.Name'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="radio-list">
                        <label class="radio-inline p-0">
                            <div class="radio radio-info">
                                {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                                <label for="signed_0">{{ trans('accounts::accounts.unAssigned') }}</label>
                            </div>
                        </label>
                        <div style="clear: both"></div>
                        <label class="radio-inline p-0">
                            <div class="radio radio-info">
                                {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}
                                <label for="signed_1">{{ trans('accounts::accounts.assigned') }}</label>
                            </div>
                        </label>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-success">
                        {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                        <label for="all-groups-chx">{{ trans('accounts::accounts.AllGroups') }}</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12"></label>
                <div class="col-md-12">
                    {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                </div>
            </div>

            {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close()!!}
        </div>
    </div>

@stop

@section('script')
@parent
<script>


    $('input[name="check_all"]').click(function () {
        if ($(this).prop("checked")) {
            $("input[name='users_checkbox[]']").prop("checked", true);
        } else {

            $("input[name='users_checkbox[]']").prop("checked", false);
        }
    });

</script>
@stop

@section('hidden')

    <div class="theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active">
                        <a href="#"><i
                                    class="fa fa-search"></i> {{ trans('accounts::accounts.search') }} </a>
                    </li>
                    <li>
                        <div class="nav-input-div">

                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                    <span class="lbl">{{ trans('accounts::accounts.ExactLogin') }}</span>
                                </label>
                            </div>
                        </div>
                    </li>
                    <li id="from_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('accounts::accounts.FromLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="to_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('accounts::accounts.ToLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="login_li">
                        <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}</div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.Name'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                            <label for="signed_0">{{ trans('accounts::accounts.unAssigned') }}</label>
                            {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}<label
                                    for="signed_1">{{ trans('accounts::accounts.assigned') }}</label>

                        </div>
                    </li>
                    <li>

                        <div class=" nav-input-div form-group ">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                                    <span class="lbl">{{ trans('accounts::accounts.AllGroups') }}</span>
                                </label>
                            </div>
                            {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
                        </div>

                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>

                {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close() !!}

            </div>
        </div>

        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('accounts::accounts.accounts') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">


                    <ul ul id="uidemo-tabs-default-demo" class="noIcons nav nav-tabs">
                        <li>
                            <a href="{{ route('accounts.detailsAccount').'?edit_id='.$aFilterParams['account_id'] }}">{{ trans('accounts::accounts.details') }}</a>
                        </li>
                        <li class="active">

                            <a href="{{ route('accounts.asignMt4Users').'?account_id='.$aFilterParams['account_id']}}">{{ trans('accounts::accounts.assignedMt4Users') }}</a>
                        </li>
                    </ul>


                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('accounts::accounts.asignMt4User') }}

                        </div>
                    </div>

                    {!! Form::open(['class'=>'panel form-horizontal']) !!}

                    <div class="panel-heading">
                        <span class="panel-title">{{ trans('accounts::accounts.enterMt4User') }}</span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">{{ trans('accounts::accounts.Login') }}</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">

                                    {!! Form::text('users_checkbox[]','',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!-- col-sm-6 -->

                            <div class="col-sm-2">
                                {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                                {!! Form::hidden('server_id',0) !!}
                                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                {!! Form::hidden('order', $aFilterParams['order']) !!}

                                {!! Form::button(trans('accounts::accounts.assign'),['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary']) !!}


                            </div>
                        </div>
                        <!-- row -->

                    </div>

                    {!! Form::close() !!}
                    <div class="panel-footer text-right">

                    </div>

                    @if (count($oResults))
                        {!! Form::open() !!}

                        <div class="primary_table_div info" >
                            <div class="table">


                                <div class="thead">
                                    <div class="tr">

                                        <div class="th">{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all',trans('accounts::accounts.Login')) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.server'), 'server_id', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.Group'), 'GROUP', $oResults) !!}</div>

                                        <div class="th">{!! th_sort(trans('accounts::accounts.reg_date'), 'REGDATE', $oResults) !!}</div>

                                        <div class="th">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</div>
                                        <div class="th">{!! trans('accounts::accounts.action') !!}</div>

                                    </div>
                                </div>


                                <div class="tbody">

                                    @if (count($oResults))
                                        {{-- */$i=0;/* --}}
                                        {{-- */$class='';/* --}}
                                        @foreach($oResults as $oResult)
                                            {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                            <div class="tr {{ $class }}">




                                                <div class="td"><label>{!! trans('accounts::accounts.Login') !!} : </label><p>{!! Form::checkbox('users_checkbox[]',$oResult->LOGIN.','.$oResult->server_id,false,['class'=>'users_checkbox']) !!}{{ $oResult->LOGIN }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.server') !!} : </label><p>{{ ($oResult->server_id=="1")? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.Name') !!} : </label><p>{{ $oResult->NAME }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.Group') !!} : </label><p>{{ $oResult->GROUP }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.last_date') !!} : </label><p>{{ $oResult->LASTDATE }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.leverage') !!} : </label><p>1:{{ $oResult->LEVERAGE }}</p></div>
                                                <div class="td">
                                                    @if(isset($oResult->users_id ))

                                                        {!! Form::button('<a><i class="fa fa-unlink "></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->LOGIN.','.$oResult->server_id  ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('accounts::accounts.un_assign') ,'type'=>'submit' ]) !!}
                                                    @else

                                                        {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->LOGIN.','.$oResult->server_id  ,'class'=>'icon_button red_icon tooltip_number',' data-original-title'=>trans('accounts::accounts.assign'),'type'=>'submit' ]) !!}
                                                    @endif
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tableFooter" style="border:1px solid #eee">
                                {!! Form::button(trans('accounts::accounts.assign'),['name'=>'asign_mt4_users_submit','value'=>'1'  ,'class'=>'btn btn-info btn-sm',' data-original-title'=>trans('accounts::accounts.assign'),'type'=>'submit' ]) !!}
                                {!! Form::button(trans('accounts::accounts.un_assign'),['name'=>'un_sign_mt4_users_submit','value'=>'1'  ,'class'=>'btn btn-info btn-sm',' data-original-title'=>trans('accounts::accounts.un_assign'),'type'=>'submit' ]) !!}


                            </div>
                        </div>




                        {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                        {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                        {!! Form::hidden('order', $aFilterParams['order']) !!}
                        {!! Form::hidden('group', (is_array($aFilterParams['group']))?join(',',$aFilterParams['group']):$aFilterParams['group']) !!}
                        {!! Form::hidden('signed',$aFilterParams['signed']) !!}
                        {!! Form::hidden('all_groups', $aFilterParams['all_groups']) !!}
                        {!! Form::hidden('exactLogin', $aFilterParams['exactLogin']) !!}
                        {!! Form::hidden('signed', $aFilterParams['signed']) !!}


                        {!! Form::close() !!}
                    @endif
                    <div class="table-footer">


                        @if (count($oResults))
                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}

                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">
                                    {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}

                                    {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                    {!! Form::hidden('order', $aFilterParams['order']) !!}
                                    {!! Form::hidden('group', (is_array($aFilterParams['group']))?join(',',$aFilterParams['group']):$aFilterParams['group']) !!}
                                    {!! Form::hidden('signed',$aFilterParams['signed']) !!}
                                    {!! Form::hidden('all_groups', $aFilterParams['all_groups']) !!}
                                    {!! Form::hidden('exactLogin', $aFilterParams['exactLogin']) !!}

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                                    {!! Form::close() !!}
                                </div>

                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                            </div>
                        @else
                            <div class="col-sm text-left">
                                <span class="text-xs"><h3>{{trans('accounts::accounts.no_assign_account')}}</h3></span>
                            </div>
                        @endif

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

        init.push(function () {
            // Single select
            $("select[name='users_checkbox[]']").select2({
                allowClear: true,
                placeholder: "Enter Log In"
            });


        });


        $('input[name="check_all"]').click(function () {
            if ($(this).prop("checked")) {
                $("input[name='users_checkbox[]']").prop("checked", true);
            } else {

                $("input[name='users_checkbox[]']").prop("checked", false);
            }
        });
    </script>
@stop