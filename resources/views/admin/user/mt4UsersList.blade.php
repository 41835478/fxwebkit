@extends('admin.layouts.main')
@section('title', trans('reports::reports.accounts'))
@section('content')
<style type="text/css">
    #content-wrapper{ padding: 0px; margin: 0px;}
    .nav-input-div{padding:7px;}
    .mail-container-header{
        border-bottom: 1px solid #ccc;
        margin-bottom: 7px;
        padding: 5px !important;
    }
    .theme-default .page-mail{ overflow: visible;height: auto; min-height: 800px;}
    .center_page_all_div{ padding: 0px 10px;}
    .mail-nav .navigation{margin-top: 35px;}
</style>
<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections">
                <li class="active"><a href="#"> <i class="fa fa-search"></i> search </a></li>
                <li>
                    <div class="   nav-input-div">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                <span class="lbl">{{ trans('reports::reports.ExactLogin') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div></li>

                <li><div  class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('reports::reports.Name'),'class'=>'form-control input-sm']) !!}</div></li>
                
                <li>

                    <div class=" nav-input-div form-group ">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                                <span class="lbl">{{ trans('reports::reports.AllGroups') }}</span>
                            </label>
                        </div>
                        {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
                    </div>

                </li>


                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('general.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close() !!}


        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('general.mt4UsersList') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')

            @if (count($oResults))
            <div class="stat-panel no-margin-b">
                <div class="stat-row">
                    <div class="stat-counters bg-info no-padding text-center">
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Total Results {{ $oResults->total() }}</span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Results From {{ $oResults->firstItem() }} to {{ $oResults->lastItem() }}</span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-xs-vr">
                            <span class="text-xs">Page {{ $oResults->currentPage() }} of {{ $oResults->lastPage() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="padding-xs-vr"></div>
            @endif

            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('general.mt4UsersList') }}



                    </div>
                </div>

              @if (count($oResults))
                {!! Form::open() !!}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('user.mt4UserLogin'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('user.mt4UserName'), 'NAME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('user.mt4UserGroup'), 'GROUP', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('user.mt4UserBalance'), 'BALANCE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('user.mt4UserEquity'), 'EQUITY', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('user.mt4UserCountry'), 'COUNTRY', $oResults) !!}</th>
                            <th class="no-warp"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($oResults as $oResult)
                        <tr>
                           
                            <td>{{ $oResult->LOGIN }}</td>
                            <td>{{ $oResult->NAME }}</td>
                            <td>{{ $oResult->GROUP }}</td>
                            <td>{{ $oResult->BALANCE }}</td>
                            <td>{{ $oResult->EQUITY }}</td>
                            <td>{{ $oResult->COUNTRY }}</td>
                            <td>
                                
                                <a href="{{ route('admin.mt4UsersDetails').'?edit_id='.$oResult->LOGIN }}" class="fa fa-edit"></a>
                                <a href="{{ route('admin.mt4UsersList').'?delete_id='.$oResult->LOGIN }}" class="fa fa-trash-o"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                @endif
                {{ Form::close() }}
                <div class="table-footer text-center">
                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
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