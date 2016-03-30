
@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')


	<div id="content-wrapper">
		<div class="page-header">
			<h1>{{ trans('translate') }}</h1>
		</div>

		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">{{ trans('translate') }}</span>


	{!!  Form::open(['method'=>'get']) !!}
				{!! Form::select('module',$modules,$module,['onChange'=>'$(this).parent().submit();']) !!}
				{!! Form::select('language',$languages,$language,['onChange'=>'$(this).parent().submit();']) !!}
	{!! Form::select('file',$files,$file,['onChange'=>'$(this).parent().submit();']) !!}
	{!! Form::close() !!}
		</div>
			{!! Form::open() !!}
			<div class="panel-body">
				<div class="row">

					@foreach($enArray as $key=>$value)
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label class="control-label col-xs-4">{{ $key  }}</label>

							@if(array_key_exists($key,$otherLanguageArray))
								{!! Form::text('translate['.$key.']',$otherLanguageArray[$key],['class'=>'col-xs-8']) !!}
							@else
								{!! Form::text('translate['.$key.']',$value,['class'=>'col-xs-8']) !!}
							@endif

						</div>
					</div>

					@endforeach
					</div>
				</div>
			<div class="panel-footer">
				{!! Form::hidden('module',$module) !!}
				{!! Form::hidden('language',$language) !!}
				{!! Form::hidden('file',$file) !!}
				{!! Form::submit('save',['class'=>'btn btn-primary']) !!}
			</div>
			{!! Form::close() !!}
	</div>
	</div>





@stop

