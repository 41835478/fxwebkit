<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pluton Theme by BraphBerry.com</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'pluton/css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'pluton/css/bootstrap-responsive.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'pluton/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'pluton/css/pluton.css') }}" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="{{ asset('pluton/css/pluton-ie7.css') }}" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'pluton/css/jquery.cslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'pluton/css/jquery.bxslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'pluton/css/animate.css') }}" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset($asset_folder.'pluton/images/ico/apple-touch-icon-144.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset($asset_folder.'pluton/images/ico/apple-touch-icon-114.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset($asset_folder.'pluton/images/apple-touch-icon-72.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset($asset_folder.'pluton/images/ico/apple-touch-icon-57.png') }}">
        <link rel="shortcut icon" href="{{ asset($asset_folder.'pluton/images/ico/favicon.ico') }}">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="{{ asset($asset_folder.'pluton/images/logo.png') }}" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right theme_posion_div"  id="position_13">
 @if(isset($positions["position_13"]) )
    @foreach($positions['position_13'] as $position)
    {!! $position !!}
    @endforeach 
@endif 
                      
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <!--  <div id="home" > -->
        <div  class="theme_posion_div" id="position_2">
 @if(isset($positions["position_2"]) )
    @foreach($positions['position_2'] as $position)
    {!! $position !!}
    @endforeach 
@endif  
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <!--<div class="section primary-section" id="service" style="border:1px solid #f00;"> -->
            <div   class="theme_posion_div section primary-section" id="position_3">
 @if(isset($positions["position_3"]) )
    @foreach($positions['position_3'] as $position)
    {!! $position !!}
    @endforeach 
@endif  
        </div>
        <!-- Service section end -->
        <!-- Portfolio section start -->
        <div class="theme_posion_div section secondary-section" id="position_4">
             @if(isset($positions["position_4"]) )
    @foreach($positions['position_4'] as $position)
    {!! $position !!}
    @endforeach 
@endif  
        </div>
        <!-- Portfolio section end -->
        <!-- About us section start -->
        <!-- <div class="  section primary-section" id="about"> -->
        <div class=" theme_posion_div section primary-section" id="position_5">
                         @if(isset($positions["position_5"]) )
    @foreach($positions['position_5'] as $position)
    {!! $position !!}
    @endforeach 
@endif 
        </div>
        <!-- About us section end -->
        <!-- <div class="section secondary-section"> -->
        <div class=" theme_posion_div section secondary-section" id="position_12">
                         @if(isset($positions["position_12"]) )
    @foreach($positions['position_12'] as $position)
    {!! $position !!}
    @endforeach 
@endif 
        </div>
        <!-- Client section start -->
        <!-- Client section start -->
       <!-- <div id="clients"> -->
               <div class=" theme_posion_div section primary-section" id="position_6">
                         @if(isset($positions["position_6"]) )
    @foreach($positions['position_6'] as $position)
    {!! $position !!}
    @endforeach 
@endif 
        </div>
      <!--   <div class="section third-section"> -->
               <div class=" theme_posion_div section primary-section" id="position_7">
                         @if(isset($positions["position_7"]) )
    @foreach($positions['position_7'] as $position)
    {!! $position !!}
    @endforeach 
@endif 
        </div>
        <!-- Price section start -->
        <!-- <div id="price" class="section secondary-section">-->
        <div class=" theme_posion_div" id="position_8">
            @if(isset($positions["position_8"]) )
            @foreach($positions['position_8'] as $position)
            {!! $position !!}
            @endforeach 
            @endif 
        </div>
        <!-- Price section end -->
        <!-- Newsletter section start -->
       <!-- <div class="section third-section"> -->
             <div class=" theme_posion_div" id="position_9">
            @if(isset($positions["position_9"]) )
            @foreach($positions['position_9'] as $position)
            {!! $position !!}
            @endforeach 
            @endif 
            </div>
   
        <!-- Newsletter section end -->
        
        
        <!-- Contact section start -->
        <!-- <div id="contact" class="contact"> -->
          <div class=" theme_posion_div contact" id="position_10">
            @if(isset($positions["position_10"]) )
            @foreach($positions['position_10'] as $position)
            {!! $position !!}
            @endforeach 
            @endif 
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
                      <div class=" theme_posion_div contact" id="position_11">
            @if(isset($positions["position_11"]) )
            @foreach($positions['position_11'] as $position)
            {!! $position !!}
            @endforeach 
            @endif 
           
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="{{ asset($asset_folder.'pluton/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/jquery.mixitup.js') }}"></script>
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/modernizr.custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/jquery.bxslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/jquery.cslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/jquery.placeholder.js') }}"></script>
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/jquery.inview.js') }}"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="{{ asset('pluton/js/respond.min.js') }}"></script>
        <![endif]-->
        <script type="text/javascript" src="{{ asset($asset_folder.'pluton/js/app.js') }}"></script>
    </body>
</html>