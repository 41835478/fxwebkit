@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')


    <div class="page-header">
        <h1>{{ trans('accounts::accounts.user_details') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel">

        <div class="panel-heading">
            <span class="panel-title">{{ trans('accounts::accounts.user_details') }}</span>
        </div>

        <div class="panel-body">
            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li>
                    <a href="{{ route('clients.accounts.mt4UserDetails').'?login='.$login.'&server_id='.$server_id}}&from_date=&to_date=&search=Search&sort=asc&order=login">{{ trans('accounts::accounts.summry') }}</a>
                </li>
                @if($showMt4Leverage)
                    <li class="active">
                        <a href="{{ route('clients.accounts.mt4Leverage').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.leverage') }}</a>
                    </li>
                @endif
                @if($showMt4ChangePassword)
                    <li>
                        <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='.$login.'&server_id='.$server_id}} ">{{ trans('accounts::accounts.changePassword') }}</a>
                    </li>
                @endif
                @if($showMt4Transfer)
                    <li>
                        <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.internalTransfer') }}</a>
                    </li>
                @endif
                @if($showMt4Transfer)
                    <li >
                        <a href="{{ route('client.accounts.withDrawal').'?login='.$oResults->LOGIN.'&server_id='.$oResults->server_id}}">{{ trans('accounts::accounts.withDrawal') }}</a>
                    </li>
                @endif
            </ul>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.leverage') }}</label>
                        {!! Form::select('leverage',$Result,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
                @if($Pssword==true)
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.mt4AccountPassword') }}</label>
                            {!! Form::password("password",["class"=>"form-control","value"=>$changeleverage['oldPassword']]) !!}

                        </div>
                    </div><!-- col-sm-6 -->
                    @endif<!-- col-sm-6 -->
            </div>


            <!-- col-sm-6 -->


            <div class="panel-footer text-right">
                {!! Form::hidden('login',$login)!!}
                {!! Form::hidden('server_id',$server_id)!!}
                {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
            </div>
        </div>


        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach
            </div>
        @endif

        {!! Form::close() !!}
        @stop

        @section("script")
            @parent
            <script>


                $('#jq-validation-select2').select2({
                    allowClear: true,
                    placeholder: 'Select a country...'
                }).change(function () {
                    $(this).valid();
                });

            </script>
@stop