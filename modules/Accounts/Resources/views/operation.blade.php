@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')


{!! Form::open(['class'=>'panel form-horizontal']) !!}
 
 
<div class="panel-body">
     <div class="table-info">
                <ul id="profile-tabs" class="nav nav-tabs">
                    <li>
                        <a href="{{ route('accounts.mt4UserDetails').'?login='.$login}}&from_date=&to_date=&search=Search&sort=asc&order=login">{{ trans('accounts::accounts.summry') }}</a>
                    </li>
                    <li >      
                        <a href="{{ route('accounts.mt4Leverage').'?login='.$login}}" >{{ trans('accounts::accounts.leverage') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('accounts.mt4ChangePassword').'?login='.$login}} ">{{ trans('accounts::accounts.changePassword') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('accounts.mt4InternalTransfer').'?login='.$login}}" >{{ trans('accounts::accounts.internalTransfer') }}</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('accounts.mt4Operation').'?login='.$login}}" >{{ trans('accounts::accounts.operation') }}</a>
                    </li>

                    <li class="">
                        <a href="{{ route('accounts.mt4AssignedUsers').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.assignedUsers') }}</a>
                    </li>
                </ul>
            </div>
    
      <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.operation') }}</label>
            {!! Form::select('operation',$Result,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
        </div>
    </div><!-- col-sm-6 -->
    
      <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.amount') }}</label>
           {!! Form::text('amount',$changeOperation['amount'],['class'=>'form-control']) !!}
        </div>
    </div><!-- col-sm-6 -->
    
     
    @if($Pssword==true)
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.mt4AccountPassword') }}</label>
            {!! Form::password("password",["class"=>"form-control","value"=>$changeOperation['oldPassword']]) !!}

        </div>
    </div><!-- col-sm-6 -->
    @endif
</div>
<div class="panel-footer text-right">
    {!! Form::hidden('login',$login)!!}
    {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
</div>

{!!   View('admin/partials/messages')->with('errors',$errors) !!}

{!! Form::close() !!}
@stop

@section("script")
@parent
<script>
 

    $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
        $(this).valid();
    });

</script>
@stop