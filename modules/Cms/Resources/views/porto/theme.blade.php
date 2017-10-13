<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <title>Fx - Webkit</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="Crivos.com">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/css/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/vendor/flexslider/flexslider.css" media="screen" />
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/vendor/fancybox/jquery.fancybox.css" media="screen" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/css/theme.css">
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/css/theme-elements.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/css/theme-responsive.css" />

    <!-- Current Page Styles -->
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/vendor/revolution-slider/css/settings.css" media="screen" />
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/vendor/revolution-slider/css/captions.css" media="screen" />
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/vendor/circle-flip-slideshow/css/component.css" media="screen" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset($asset_folder.'porto') }}/img/favicon.ico">
    <link rel="apple-touch-icon" href="{{ asset($asset_folder.'porto') }}/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset($asset_folder.'porto') }}/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset($asset_folder.'porto') }}/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset($asset_folder.'porto') }}/img/apple-touch-icon-144x144.png">

    <!-- Head Libs -->
    <script src="{{ asset($asset_folder.'porto') }}/vendor/modernizr.js"></script>

    <!--[if IE]>
    <link rel="stylesheet" href="{{ asset($asset_folder.'porto') }}/css/ie.css">
    <![endif]-->

    <!--[if lte IE 8]>
    <script src="{{ asset($asset_folder.'porto') }}/vendor/respond.js"></script>
    <![endif]-->

    <!-- Facebook OpenGraph Tags -->
    <meta property="og:title" content="Porto Website Template."/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.crivos.com/themes/porto"/>
    <meta property="og:image" content="http://www.crivos.com/themes/porto/"/>
    <meta property="og:site_name" content="Porto"/>
    <meta property="fb:app_id" content=""/> <!-- Use your own API Key. Go to http://developers.facebook.com/ for more information. -->
    <meta property="og:description" content="Porto - Responsive HTML5 Template"/>

</head>
<body>

<div class="body">
    <header >

        <div class="container" id="position_2">



            @if(isset($positions["position_2"]) )
                @foreach($positions['position_2'] as $position)
                    {!! $position !!}
                @endforeach
            @endif


        </div>
    </header>

    <div role="main" class="main">
        <div id="content" class="content full">


            @if(isset($positions["position_3"]) )
                @foreach($positions['position_3'] as $position)
                    {!! $position !!}
                @endforeach
            @endif



            <div class="container">



                @if(isset($positions["position_4"]) )
                    @foreach($positions['position_4'] as $position)
                        {!! $position !!}
                    @endforeach
                @endif



            </div>

                <div class="container">
                    <div class="row">
                        <div class="span8">

                            @if(isset($positions["position_10"]) )
                                @foreach($positions['position_10'] as $position)
                                    {!! $position !!}
                                @endforeach
                            @endif

                        </div>
                        <div class="span4">

                            @if(isset($positions["position_11"]) )
                                @foreach($positions['position_11'] as $position)
                                    {!! $position !!}
                                @endforeach
                            @endif

                        </div>


                    </div>
                </div>


                @if(isset($positions["position_5"]) )
                    @foreach($positions['position_5'] as $position)
                        {!! $position !!}
                    @endforeach
                @endif

            <div class="container">

                <div class="row">

                    @if(isset($positions["position_6"]) )
                        @foreach($positions['position_6'] as $position)
                            {!! $position !!}
                        @endforeach
                    @endif

                </div>





                    @if(isset($positions["position_7"]) )
                        @foreach($positions['position_7'] as $position)
                            {!! $position !!}
                        @endforeach
                    @endif



            </div>






                @if(isset($positions["position_8"]) )
                    @foreach($positions['position_8'] as $position)
                        {!! $position !!}
                    @endforeach
                @endif
        </div>
    </div>

    @if(isset($positions["position_9"]) )
        @foreach($positions['position_9'] as $position)
            {!! $position !!}
        @endforeach
    @endif

</div>

<!-- Libs -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset($asset_folder.'porto') }}/vendor/jquery.js"><\/script>')</script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/jquery.easing.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/jquery.cookie.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/master/style-switcher/style.switcher.js"></script> <!-- Style Switcher -->
<script src="{{ asset($asset_folder.'porto') }}/vendor/bootstrap.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/selectnav.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/twitterjs/twitter.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/revolution-slider/js/jquery.themepunch.plugins.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/revolution-slider/js/jquery.themepunch.revolution.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/flexslider/jquery.flexslider.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="{{ asset($asset_folder.'porto') }}/vendor/fancybox/jquery.fancybox.js"></script>

<script src="{{ asset($asset_folder.'porto') }}/js/plugins.js"></script>

<!-- Current Page Scripts -->
<script src="{{ asset($asset_folder.'porto') }}/js/views/view.home.js"></script>

<!-- Theme Initializer -->
<script src="{{ asset($asset_folder.'porto') }}/js/theme.js"></script>
<script src="https://raw.githubusercontent.com/remy/twitterlib/master/twitterlib.min.js"></script>
<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
<!--
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
-->

</body>
</html>
