@extends('client.layouts.main')
@section('title', trans('accounts::accounts.mt4UsersList'))
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
                                <span class="lbl">{{ trans('accounts::accounts.ExactLogin') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('accounts::accounts.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('accounts::accounts.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.Name'),'class'=>'form-control input-sm']) !!}</div></li>

                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('accounts::accounts.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>

            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}


        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('accounts::accounts.accounts') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')

            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('accounts::accounts.mt4Users') }}  
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Equity'), 'EQUITY', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Balance'), 'BALANCE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.AgentAccount'), 'AGENT_ACCOUNT', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Margin'), 'MARGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.MarginFree'), 'MARGIN_FREE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Leverage'), 'LEVERAGE', $oResults) !!}</th>
                            <th class="no-warp"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($oResults))
                        @foreach($oResults as $oResult)
                        <tr>
                            <td>{{ $oResult->LOGIN }}</td>
                            <td>{{ $oResult->NAME }}</td>
                            <td>{{ $oResult->EQUITY }}</td>
                            <td>{{ $oResult->BALANCE }}</td>

                            <td>{{ $oResult->AGENT_ACCOUNT }}</td>
                            <td>{{ $oResult->MARGIN }}</td>
                            <td>{{ $oResult->MARGIN_FREE }}</td>
                            <td>{{ $oResult->LEVERAGE }}</td>
                            <td><a href="{{ route('accounts.mt4UserDetails').'?login='. $oResult->LOGIN }}&from_date=&to_date=&search=Search&sort=asc&order=login" class="fa fa-file-text"></a></td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer text-right ">

                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}

                    <div class="DT-lf-right change_page_all_div" >
                  
                           
                              
                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}                 
                    
                            
                               
                                    {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                               
                            
                   
                    </div>
                    <div class="col-sm-3  padding-xs-vr">
                        <span class="text-xs">Showing {{ $oResults->firstItem() }} to {{ $oResults->lastItem() }} of {{ $oResults->total() }} entries</span>
                    </div> 
                    @endif
                </div>  
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