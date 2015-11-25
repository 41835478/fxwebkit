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

                <li><div  class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.name'),'class'=>'form-control input-sm']) !!}</div></li>
                <li>
                    <div  class=" nav-input-div  ">
                        {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}<label for="signed_0">All</label>
                        {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}<label for="signed_1">Assigned</label>

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
              <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
            {{ trans('accounts::accounts.accounts') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')

            <div class="table-info">
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
                        </div><!-- col-sm-6 -->

                        <div class="col-sm-2">
                            {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                            {!! Form::hidden('order', $aFilterParams['order']) !!}

                            {!! Form::button('Assign',['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary']) !!}


                        </div>
                    </div><!-- row -->

                </div>

                {!! Form::close() !!}
                <div class="panel-footer text-right">

                </div>

         @if (count($oResults))
                {!! Form::open() !!}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all','Login') !!}</th>

                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.Group'), 'GROUP', $oResults) !!}</th>
                            <th class="no-warp">{!! trans('accounts::accounts.action') !!}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($oResults as $oResult)
                        <tr>
                      
                            <td>{!! Form::checkbox('users_checkbox[]',$oResult->LOGIN,false,['class'=>'users_checkbox']) !!}{{ $oResult->LOGIN }}</td>
                            <td>{{ $oResult->NAME }}</td>
                            <td>{{ $oResult->GROUP }}</td>
                            <td>

                                @if(isset($oResult->users_id ) )    
                                {!! Form::button('<i class="fa fa-unlink"></i>',['name'=>'un_sign_mt4_users_submit_id','value'=>$oResult->LOGIN  ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                @else
                               
                                 {!! Form::button('<i class="fa fa-link"></i>',['name'=>'asign_mt4_users_submit_id','value'=>$oResult->LOGIN  ,'class'=>'icon_button red_icon','type'=>'submit' ]) !!}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">

                                {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                {!! Form::hidden('order', $aFilterParams['order']) !!}

                                {!! Form::button('Assign',['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit','class'=>'btn btn-primary' ]) !!}
                                {!! Form::button('Un Assign',['name'=>'un_sign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
                @endif
                {!! Form::close() !!}
                <div class="table-footer text-right">
                    
               
                
                  
                @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                    
                    @if($oResults->total()>25)

                    <div class="DT-lf-right change_page_all_div" >
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
   
                    <div class="col-sm-3  padding-xs-vr">
                        <span class="text-xs">Showing {{ $oResults->firstItem() }} to {{ $oResults->lastItem() }} of {{ $oResults->total() }} entries</span>
                    </div>
                     @else
                    <div class="col-sm text-left">
                        <span class="text-xs"><h3>No Assign Account</h3></span>
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