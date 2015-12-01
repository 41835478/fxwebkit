@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<div class="page-header">
		<h1>{{ trans('accounts::accounts.edit_account') }}</h1>
	</div>

{!! Form::open(['class'=>'panel form-horizontal']) !!}

<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('tools::tools.name') }}</label>
                {!! Form::text('name',$userInfo['name'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('tools::tools.symbol') }}</label>
                {!! Form::text('symbol',$userInfo['symbol'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

      
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('tools::tools.exchange') }}</label>
                {!! Form::text('exchange',$userInfo['exchange'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('tools::tools.month') }}</label>
                {!! Form::text('month',date('F', mktime(0, 0, 0, $userInfo['month'], 10)),['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('tools::tools.year') }}</label>
                {!! Form::text('year',$userInfo['year'],['class'=>'form-control']) !!}

            </div>
        </div><!-- col-sm-6 -->
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('tools::tools.start_date') }}</label>
                {!! Form::text('start_date',$userInfo['start_date'],['class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->

    <div class="row">
        
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('tools::tools.expiry_date') }}</label>
                {!! Form::text('expiry_date',$userInfo['expiry_date'],['class'=>'form-control']) !!}

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
     <a href="{{ route('tools.futureContract') }}">
         <button type="submit" class="btn btn-primary" name="id" value="{{ $userInfo['id']}}">{{ trans('general.save') }}</button></a>
         
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

        $('input[name="expiry_date"],input[name="start_date"]').datepicker(options);
        

    });

    $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
        $(this).valid();
    });

</script>
@stop