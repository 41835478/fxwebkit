@extends('admin.layouts.main')
@section('title', trans('general.assignMt4ToMassGroup'))
@section('content')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active">
                        <a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('general.Search') }} </a>
                    </li>
                    <li>
                        <div class="nav-input-div">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                    <span class="lbl">{{ trans('general.ExactLogin') }}</span>
                                </label>
                            </div>
                        </div>
                    </li>
                    <li id="from_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('general.FromLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="to_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('general.ToLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="login_li">
                        <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('general.Login'),'class'=>'form-control input-sm']) !!}</div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('general.name '),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                            <label for="signed_0">{{ trans('general.all') }}</label>
                            {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}<label
                                    for="signed_1">{{ trans('general.assigned') }}</label>

                        </div>
                    </li>
                    <li>

                        <div class=" nav-input-div form-group ">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                                    <span class="lbl">{{ trans('general.AllGroups') }}</span>
                                </label>
                            </div>
                            {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
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
                {!! Form::close() !!}

            </div>
        </div>

        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('general.assignMt4ToMassGroup') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">


                    <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                        <li>

                            <a href="{{ route('admin.assginToMassAccountsList').'?group_id='.$aFilterParams['group_id'] }}">{{ trans('general.assginToUsers') }}</a>
                        </li>
                        <li class="active">

                            <a href="{{ route('admin.assignToMassGroup').'?group_id='.$aFilterParams['group_id']}}">{{ trans('general.assignedMt4Users') }}</a>

                        </li>
                    </ul>




                    <div class="panel-footer text-right">

                    </div>

                    @if (count($oResults))
                        {!! Form::open() !!}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).'  '.Form::label('check_all',trans('general.Login')) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('general.liveDemo'), 'server_id', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('general.name '), 'NAME', $oResults) !!}</th>
                                <th class="no-warp">{!! th_sort(trans('general.group'), 'GROUP', $oResults) !!}</th>
                                <th class="no-warp">{!! trans('general.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($oResults as $oResult)
                                <tr>

                                    <td>{!! Form::checkbox('users_checkbox[]',$oResult->uid,false,['class'=>'users_checkbox']) !!} {{ $oResult->LOGIN }}</td>
                                    <td>{{ ($oResult->server_id=="1")? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                                    <td>{{ $oResult->NAME }}</td>
                                    <td>{{ $oResult->GROUP }}</td>
                                    <td>

                                        @if(isset($oResult->user_id ) || (isset($oResult->massGroup->first()->user_id) ))
                                            {!! Form::button('<a><i class="fa fa-unlink"></i></a>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->uid  ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                        @else

                                            {!! Form::button('<a><i class="fa fa-link"></i></a>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->uid ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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
                        </table>
                    @endif
                    {!! Form::close() !!}
                    <div class="table-footer">


                        @if (count($oResults))
                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}

                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">
                                    {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}

                                    {!! Form::hidden('group_id', $aFilterParams['group_id']) !!}
                                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                    {!! Form::hidden('order', $aFilterParams['order']) !!}
                                    {!! Form::hidden('group', (is_array($aFilterParams['group']))?join(',',$aFilterParams['group']):$aFilterParams['group']) !!}
                                    {!! Form::hidden('signed',$aFilterParams['signed']) !!}
                                    {!! Form::hidden('all_groups', $aFilterParams['all_groups']) !!}
                                    {!! Form::hidden('exactLogin', $aFilterParams['exactLogin']) !!}

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('general.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('general.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                                    {!! Form::close() !!}
                                </div>

                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
                            </div>
                        @else
                            <div class="col-sm text-left">
                                <span class="text-xs"><h3>{{trans('general.no_assign_account')}}</h3></span>
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