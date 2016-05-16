<!DOCTYPE html>
<html>
<head>

    <script src="{{ asset($asset_folder.'houseofborse') }}/js/jquery/jquery-1.11.1.min.js"></script>
    <script src="{{ asset($asset_folder.'houseofborse') }}/old/js/scripts.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >

    <link rel="icon" type="image/png" href="{{ asset($asset_folder.'houseofborse') }}/images/logo-HD.png"/>


    <link href="{{ asset($asset_folder.'houseofborse') }}/old/css/style-en.css" rel="stylesheet">

    <link href="{{ asset($asset_folder.'houseofborse') }}/old/css/style.min.css" rel="stylesheet">



    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- bxslider -->
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/bxslider/jquery.bxslider.css">
    <!-- End bxslider -->
    <!-- flexslider -->
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/flexslider/flexslider.css">
    <!-- End flexslider -->

    <!-- bxslider -->
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/radial-progress/style.css">
    <!-- End bxslider -->

    <!-- Animate css -->
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/css/animate.css">
    <!-- End Animate css -->

    <!-- Bootstrap css -->
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/css/bootstrap.min.css">
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">
    <!-- End Bootstrap css -->

    <!-- Jquery UI css -->
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/jqueryui/jquery-ui.css">
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/jqueryui/jquery-ui.structure.css">
    <!-- End Jquery UI css -->

    <!-- Fancybox -->
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/fancybox/jquery.fancybox.css">
    <!-- End Fancybox -->

    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/fonts/fonts.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link type="text/css" data-themecolor="default" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/css/main-default.css">

    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/rs-plugin/css/settings.css">
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/rs-plugin/css/settings-custom.css">
    <link type="text/css" rel='stylesheet' href="{{ asset($asset_folder.'houseofborse') }}/js/rs-plugin/videojs/video-js.css">

    <!--
    <link href="{{ asset($asset_folder.'houseofborse') }}/old/css/style.min.css" rel="stylesheet" type="text/css" />
-->

    <meta charset="UTF-8">

    <title>
        House Of Borse
    </title>
    <meta name="description" content="The first financial brokerage established for professional traders, wealth managers, investment fund managers and financial institutions" />
    <meta name="keywords" content="Borse, Financial, Forex, Credit cards, Banking, Technical analysis, stocks, CFDs, Options" />

 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js" defer async></script>

    <script>

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-63021416-1', 'auto');

        ga('send', 'pageview');

    </script>

    <!-- Start of StatCounter Code for Default Guide -->
    <script type="text/javascript">
        var sc_project=10825145;
        var sc_invisible=1;
        var sc_security="3317dc35";
        var scJsHost = (("https:" == document.location.protocol) ?
                "https://secure." : "http://www.");
        document.write("<sc"+"ript type='text/javascript' src='" +
                scJsHost+
                "statcounter.com/counter/counter.js'></"+"script>");
    </script>
    <noscript><div class="statcounter"><a title="free hit
counters" href="http://statcounter.com/"
                                          target="_blank"><img class="statcounter"
                                                               src="http://c.statcounter.com/10825145/0/3317dc35/1/"
                                                               alt="free hit counters"></a></div></noscript>
    <!-- End of StatCounter Code for Default Guide -->




</head>

<body>






<header>
    <section class="clearfix @if( isset($_COOKIE['accept_cookie_policy']))  hide @endif " id="cookie-bar">
        <p><i class="fa fa-lightbulb-o"></i>
            We use cookies to enhance the performance and functionality of our site, which ultimately improves your browsing experience. By continuing to browse this site you are agreeing to our use of cookies.
            <a href="path('showPage', {'id':1198,'parentid':0, 'slug':'privacy-policy'})"> LEARN MORE </a><span id="closebox"><i class="fa fa-times" onClick="$(this).parent().parent().parent().hide();document.cookie='accept_cookie_policy=true'"></i></span></p>
    </section>


    @if(isset($positions["house_top_header_line"]) )
        @foreach($positions['house_top_header_line'] as $position)
            {!! $position !!}
        @endforeach
    @endif


    <div class="container b-header__box b-relative">
        <a href="/" class="b-left b-logo primary_logo_a" ><img class="color-theme" data-retina src="{{ asset($asset_folder.'houseofborse') }}/img/logo_header.svg" alt="Logo" /></a>

        <div class="b-header-r b-right">
            <div class="b-top-nav-show-slide f-top-nav-show-slide b-right j-top-nav-show-slide"><i class="fa fa-align-justify"></i></div>
            <nav class="b-top-nav f-top-nav b-right j-top-nav">

                @if(isset($positions["house_main_menu"]) )
                    @foreach($positions['house_main_menu'] as $position)
                        {!! $position !!}
                    @endforeach
                @endif

            </nav>
        </div>
    </div>


    @if(isset($positions["house_header"]) )
        @foreach($positions['house_header'] as $position)
            {!! $position !!}
        @endforeach
    @endif
</header>
<div class="j-menu-container"></div>




<section id="main-warp">

    <section id="page-warp">

        <div class="container" style="padding:0px; width:100%;">
@if(isset($positions["house_main_slider"]) )
    @foreach($positions['house_main_slider'] as $position)
        {!! $position !!}
    @endforeach
@endif




@if(isset($positions["house_aside"]) || isset($positions["house_body"]) )

        <div class="container">

<div id="sidebar"class="col-xs-3">
            @if(isset($positions["house_aside"]) )
                @foreach($positions['house_aside'] as $position)
                    {!! $position !!}
                @endforeach
            @endif
</div>



            <div id="page-contents" class=" @if(isset($positions["house_aside"]) )col-xs-9 @else col-xs-12  @endif" >


                @if(isset($positions["house_body"]) )
                    @foreach($positions['house_body'] as $position)
                        {!! $position !!}
                    @endforeach
                @endif
            </div><!--#page-contents-->

        </div><!--.container-->
@endif








@if(isset($positions["house_position_1"]) )
    @foreach($positions['house_position_1'] as $position)
        {!! $position !!}
    @endforeach
@endif




@if(isset($positions["house_footer_upper"]) )
    @foreach($positions['house_footer_upper'] as $position)
        {!! $position !!}
    @endforeach
@endif


@if(isset($positions["house_footer"]) )
    @foreach($positions['house_footer'] as $position)
        {!! $position !!}
    @endforeach
@endif

</div>
    </section><!--#page-warp-->
    </section>


<script src="{{ asset($asset_folder.'houseofborse') }}/js/breakpoints.js"></script>
<!-- bootstrap -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/scrollspy.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/bootstrap-progressbar/bootstrap-progressbar.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/bootstrap.min.js"></script>
<!-- end bootstrap -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/masonry.pkgd.min.js"></script>
<script src='{{ asset($asset_folder.'houseofborse') }}/js/imagesloaded.pkgd.min.js'></script>
<!-- bxslider -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/bxslider/jquery.bxslider.min.js"></script>
<!-- end bxslider -->
<!-- flexslider -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/flexslider/jquery.flexslider.js"></script>
<!-- end flexslider -->
<!-- smooth-scroll -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/smooth-scroll/SmoothScroll.js"></script>
<!-- end smooth-scroll -->
<!-- carousel -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<!-- end carousel -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/rs-plugin/videojs/video.js"></script>

<!-- jquery ui -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/jqueryui/jquery-ui.js"></script>
<!-- end jquery ui -->
<script type="text/javascript" language="javascript"
        src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCfVS1-Dv9bQNOIXsQhTSvj7jaDX7Oocvs"></script>
<!-- Modules -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/sliders.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/ui.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/retina.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/animate-numbers.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/parallax-effect.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/settings.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/maps-google.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/color-themes.js"></script>
<!-- End Modules -->

<!-- Audio player -->
<script type="text/javascript" src="{{ asset($asset_folder.'houseofborse') }}/js/audioplayer/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="{{ asset($asset_folder.'houseofborse') }}/js/audioplayer/js/jplayer.playlist.min.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/audioplayer.js"></script>
<!-- end Audio player -->

<!-- radial Progress -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/radial-progress/jquery.easing.1.3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.13/d3.min.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/radial-progress/radialProgress.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/progressbars.js"></script>
<!-- end Progress -->

<!-- Google services -->
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/google-chart.js"></script>
<!-- end Google services -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/j.placeholder.js"></script>

<!-- Fancybox -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/fancybox/jquery.fancybox.pack.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/fancybox/jquery.mousewheel.pack.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/fancybox/jquery.fancybox.custom.js"></script>
<!-- End Fancybox -->
<script src="{{ asset($asset_folder.'houseofborse') }}/js/user.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/timeline.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/fontawesome-markers.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/markerwithlabel.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/cookie.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/loader.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/scrollIt/scrollIt.min.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/modules/navigation-slide.js"></script>
<script src="{{ asset($asset_folder.'houseofborse') }}/js/home_page_slider.js"></script>

</body>



</html>
