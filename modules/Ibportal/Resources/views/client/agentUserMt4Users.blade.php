@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.mt4Users'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.mt4Users') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.mt4Users') }}</li>
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

                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>

                        @if (count($oResults))
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! Form::label('check_all',trans('ibportal::ibportal.Login')) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('ibportal::ibportal.live'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('ibportal::ibportal.Name'), 'NAME', $oResults) !!}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                    <tr>
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->NAME }}</td>

                                    </tr>



                                @endforeach
                            @endif

                            </tbody>
                        </table>
                        @endif


                        @if (count($oResults))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                                </div>

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

                                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}

                                        {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                                        {!! Form::close() !!}
                                    </div>

                                @endif

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
            <h3 class="title-heading">{{ trans('user.Search') }}</h3>
            {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}

            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-success">
                        {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                        <label for="exactLogin">{{ trans('ibportal::ibportal.ExactLogin') }}</label>
                    </div>
                </div>
            </div>

            <div class="form-group" id="from_login_li">
                <div class="col-md-12">
                    {!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('ibportal::ibportal.FromLogin'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group" id="to_login_li">
                <div class="col-md-12">
                    {!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('ibportal::ibportal.ToLogin'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group" id="login_li">
                <div class="col-md-12">
                    {!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('ibportal::ibportal.Login'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('ibportal::ibportal.Name'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12"></label>
                <div class="col-md-12">
                    {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                </div>
            </div>

            {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('hidden')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('ibportal::ibportal.search') }} </a></li>
                    <li>
                        <div class="   nav-input-div">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                    <span class="lbl">{{ trans('ibportal::ibportal.ExactLogin') }}</span>
                                </label>
                            </div>
                        </div>
                    </li>
                    <li id="from_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('ibportal::ibportal.FromLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="to_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('ibportal::ibportal.ToLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="login_li">
                        <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('ibportal::ibportal.Login'),'class'=>'form-control input-sm']) !!}</div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('ibportal::ibportal.Name'),'class'=>'form-control input-sm']) !!}</div>
                    </li>



                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
                {{ trans('ibportal::ibportal.mt4Users') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')
                <div class="table-light">

                    <div class="panel-footer text-right">

                    </div>

                    @if (count($oResults))

                        <table class="table table-bordered" style="display:table;">
                            <thead>
                            <tr>
                                <th>{!! Form::label('check_all',trans('ibportal::ibportal.Login')) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.live'), 'server_id', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.Name'), 'NAME', $oResults) !!}</th>
                                  </tr>
                            </thead>
                            <tbody>

                            @foreach($oResults as $oResult)
                                <tr>

                                    <td>{{ $oResult->LOGIN }}</td>
                                    <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                    <td>{{ $oResult->NAME }}</td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
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

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                                    {!! Form::close() !!}
                                </div>

                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                            </div>
                        @else
                            <div class="col-sm text-left">
                                <span class="text-xs"><h3>{{trans('ibportal::ibportal.no_assign_account')}}</h3></span>
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>

    <script src="{{ asset('/assets/js/jquery.2.0.3.min.js') }}"></script>
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