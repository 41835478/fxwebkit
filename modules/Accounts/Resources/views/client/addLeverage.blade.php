@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<div class="page-header">
		<h1>{{ trans('accounts::accounts.leverage') }}</h1>
	</div>
{!! Form::open(['class'=>'panel form-horizontal']) !!}



 <div class="col-sm-6">
            <div class="form-group no-margin-hr">

                <label class="control-label">{{ trans('accounts::accounts.leverage') }}</label>
                {!! Form::select('country',$oResult,['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
      
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.Password') }}</label>
                {!! Form::password("password",["class"=>"form-control","value"=>'123']) !!}

            </div>
        </div><!-- col-sm-6 -->

    

<div class="panel-footer text-right">
    <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('accounts::accounts.save') }}</button>
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