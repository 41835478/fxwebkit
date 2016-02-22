@extends('client.layouts.main')
@section('title', trans('general.addMt4User'))
@section('content')

<div class="page-header">
    <h1>{{ trans('general.addMt4User') }}</h1>
</div>  

<div class="panel">
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel-heading">
        <span class="panel-title">{{ trans('general.user_details') }}</span>
    </div>

    <div class="panel-body">
        <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
          @if(!$denyLiveAccount)
            <li class="active" >
                <a href="#profile-tabs-board" data-toggle="tab">{{ trans('general.assign_existing_mt4') }}</a>
            </li>
            <li >
                <a href="{{ route('client.mt4LiveAccount')}}" >{{ trans('general.mt4LiveAccount') }}</a>
            </li>
            @endif
            <li >
                <a href="{{ route('client.mt4DemoAccount')}}" >{{ trans('general.mt4DemoAccount') }}</a>
            </li>

        </ul>
  

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.Login') }}</label>
                {!! Form::text('login',$userInfo['login'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.password') }}</label>
                {!! Form::password("password",["class"=>"form-control","value"=>$userInfo['password']]) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->
      </div>

@if($errors->any())
<div class="alert alert-danger alert-dark">
    @foreach($errors->all() as $key=>$error)
    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
    @endforeach

</div>
@endif
<div class="panel-footer text-right">
    <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('general.assign') }}</button>
</div>
</div>
{!! Form::close() !!}
@stop
@section("script")
@parent
<script>
    init.push(function () {
        var options = {
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }

        $('input[name="birthday"]').datepicker(options);

    });

    $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
        $(this).valid();
    });
    

</script>
@stop