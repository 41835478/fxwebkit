@extends('mt4configrations::layouts.master')

@section('content')
	
	<h1>Hello World</h1>
	
	<p>
		This view is loaded from module: {!! config('mt4configrations.name') !!}
	</p>

@stop