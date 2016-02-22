@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.settings'))
@section('content')

<div class="page-header">
		<h1>{{ trans('ibportal::ibportal.settings') }}</h1>
	</div>

<div class="panel">
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel-heading">
        <span class="panel-title">{{ trans('ibportal::ibportal.settings') }}</span>
    </div>

<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.agreemment') }}</label>
                {!! Form::text('agreemment',$ibportalSetting['agreemment'],['class'=>'form-control']) !!}
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
     <a href="{{ route('accounts.detailsAccount') }}">
         <button type="submit" class="btn btn-primary" name="edit_id" value="0">{{ trans('ibportal::ibportal.save') }}</button></a>
         
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