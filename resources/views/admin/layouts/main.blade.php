<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
	<meta name="_token" content="{{ csrf_token() }}" />
	<title>@yield('title') - {{ app_name() }}</title>
	<!-- Bootstrap Core CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/bootstrap/dist/css/bootstrap.min.css') !!}

	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/tablesaw-master/dist/tablesaw.css') !!}
			<!-- animation CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/css/animate.css') !!}
			<!-- Custom CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/css/style.css') !!}
			<!-- color CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/css/colors/default.css')!!}
			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/js/ie.min.js') !!}

</head>
<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">





	@include('admin.partials.header')
	@include('admin.partials.menu')

	@yield('content')


</div>
<!-- /#wrapper -->

@section('script')
		<!-- jQuery -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/jquery/dist/jquery.min.js') !!}
		<!-- Bootstrap Core JavaScript -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/bootstrap/dist/js/bootstrap.min.js') !!}

		<!--slimscroll JavaScript -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/js/jquery.slimscroll.js') !!}
		<!--Wave Effects -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/js/waves.js') !!}
		<!-- Custom Theme JavaScript -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/js/custom.min.js') !!}
		<!-- jQuery peity -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/tablesaw-master/dist/tablesaw.js') !!}
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/tablesaw-master/dist/tablesaw-init.js') !!}
		<!--Style Switcher -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') !!}

@show


</body>
</html>