@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accounts'))
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
                <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('accounts::accounts.search') }} </a></li>
                
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('accounts::accounts.id'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('accounts::accounts.first_name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('accounts::accounts.last_name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li>
                    <div  class=" nav-input-div  ">
                        {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('accounts::accounts.Email'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>




                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close() !!}


        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('accounts::accounts.accounts') }}
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
                        {{ trans('accounts::accounts.accounts') }}  
                        <a href="{{ route('accounts.addAccount') }}" style="float:right;">
                        <input name="new_menu_submit" class="btn btn-primary btn-flat" type="submit" value="{{ trans('accounts::accounts.addAccount') }}"> </a>
                   </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.id'), 'id', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.first_name'), 'first_name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.last_name'), 'last_name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Email'), 'email', $oResults) !!}</th>

                            <th class="no-warp"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($oResults))
                        @foreach($oResults as $oResult)
                        <tr>
                            <td>{{ $oResult->id }}</td>
                            <td>{{ $oResult->first_name }}</td>
                            <td>{{ $oResult->last_name }}</td>
                            <td>{{ $oResult->email }}</td>
                            <td>
                                <a href="{{ route('accounts.addAccount').'?edit_id='.$oResult->id }}" class="fa fa-edit"></a>
                                <a href="{{ route('accounts.addAccount').'?delete_id='.$oResult->id }}" class="fa fa-trash-o"></a>
                                <a href="{{ route('accounts.detailsAccount').'?edit_id='.$oResult->id }}" class="fa fa-file-text"></a>   
                                <a href="{{ route('accounts.asignMt4Users').'?account_id='.$oResult->id }}" class="fa fa-plus-square-o"></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
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