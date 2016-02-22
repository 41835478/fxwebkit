@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.settings'))
@section('content')

<div class="page-header">
		<h1>{{ trans('accounts::accounts.settings') }}</h1>
	</div>

<div class="panel">
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel-heading">
        <span class="panel-title">{{ trans('accounts::accounts.settings') }}</span>
    </div>

    <!-- TODO[moaid] translate this page check design of input and add adminpixel design like edit user profile page -->
<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                {!! Form::text('mt4CheckHost',config('fxweb.mt4CheckHost'),[]) !!}
                <label class="control-label">{{ trans('general.mt4CheckHost') }}</label>

            </div>
</div>


        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                {!! Form::text('mt4CheckPort',config('fxweb.mt4CheckPort'),[]) !!}
                <label class="control-label">{{ trans('general.mt4CheckPort') }}</label>

            </div>
        </div>

</div>
<hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                {!! Form::text('mt4CheckDemoHost',config('fxweb.mt4CheckDemoHost'),[]) !!}
                <label class="control-label">{{ trans('general.mt4CheckDemoHost') }}</label>

            </div>
        </div>


        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                {!! Form::text('mt4CheckDemoPort',config('fxweb.mt4CheckDemoPort'),[]) !!}
                <label class="control-label">{{ trans('general.mt4CheckDemoPort') }}</label>

            </div>
        </div>

    </div>

@if($errors->any())
<div class="alert alert-danger alert-dark">
    @foreach($errors->all() as $key=>$error)
    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
    @endforeach

</div>
@endif
<div class="panel-footer text-right">
     <a href="{{ route('accounts.detailsAccount') }}">
         <button type="submit" class="btn btn-primary" name="edit_id" value="0">{{ trans('accounts::accounts.save') }}</button></a>
         
{!! Form::close() !!}
</div>
</div>
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