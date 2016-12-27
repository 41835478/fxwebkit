<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
	<meta name="_token" content="{{ csrf_token() }}" />
	<title>@yield('title') - {{ app_name() }}</title>
	<!-- Bootstrap Core CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/bootstrap/dist/css/bootstrap.min.css') !!}
	<!-- animation CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/css/animate.css') !!}
	<!-- Custom CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/css/style.css') !!}
	<!-- color CSS -->
	{!! HTML::style('/assets/'.config('fxweb.layoutAssetsFolder').'/css/colors/blue.css') !!}
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="{{ theme_attr(false) }} {{$class}}">
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register" style="background-image:url({{'/assets/'.config('fxweb.layoutAssetsFolder').'/images/backgrounds/signin-bg-'.$random.'.jpg'}}) !important;">


	@yield('content')
</section>

@section('script')
		<!-- jQuery -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap Core JavaScript -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- Menu Plugin JavaScript -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') !!}

<!--slimscroll JavaScript -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/js/jquery.slimscroll.js') !!}
<!--Wave Effects -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/js/waves.js') !!}
<!-- Custom Theme JavaScript -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/js/custom.min.js') !!}
<!--Style Switcher -->
{!! HTML::script('/assets/'.config('fxweb.layoutAssetsFolder').'/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') !!}
@show

</body>
</html>
























