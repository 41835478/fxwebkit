
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
    <header id="position_2">

        <div class="container">
            <h1 class="logo">
                <a href="index.html">
                    <img alt="Porto Website Template" src="{{ asset($asset_folder.'porto') }}/img/logo.png">
                </a>
            </h1>
            <div class="search">
                <form class="form-search">
                    <input type="text" class="input-medium search-query" placeholder="Search...">
                    <button class="search" type="submit"><i class="icon-search"></i></button>
                </form>
            </div>



            @if(isset($positions["position_2"]) )
                @foreach($positions['position_2'] as $position)
                    {!! $position !!}
                @endforeach
            @endif


        </div>
    </header>

    <div role="main" class="main">
        <div id="content" class="content full">

            <div class="slider-container">
                <div class="slider" id="revolutionSlider">
                    <ul>
                        <li data-transition="fade" data-slotamount="10" data-masterspeed="300">
                            <img src="img/slides/slide-bg.jpg" data-fullwidthcentering="on" alt="">

                            <div class="caption sft stb"
                                 data-x="70"
                                 data-y="180"
                                 data-speed="300"
                                 data-start="1000"
                                 data-easing="easeOutExpo"><img src="img/slides/slide-title-border.png" alt=""></div>

                            <div class="caption top-label lfl stl"
                                 data-x="120"
                                 data-y="180"
                                 data-speed="300"
                                 data-start="500"
                                 data-easing="easeOutExpo">LOOKING FOR A</div>

                            <div class="caption sft stb"
                                 data-x="310"
                                 data-y="180"
                                 data-speed="300"
                                 data-start="1000"
                                 data-easing="easeOutExpo"><img src="img/slides/slide-title-border.png" alt=""></div>

                            <div class="caption main-label sft stb"
                                 data-x="0"
                                 data-y="235"
                                 data-speed="300"
                                 data-start="1500"
                                 data-easing="easeOutExpo">WEB DESIGN?</div>

                            <div class="caption bottom-label sft stb"
                                 data-x="43"
                                 data-y="290"
                                 data-speed="500"
                                 data-start="2000"
                                 data-easing="easeOutExpo">Check out our options and features.</div>

                            <div class="caption fade"
                                 data-x="500"
                                 data-y="50"
                                 data-speed="500"
                                 data-start="2500"
                                 data-easing="easeOutExpo"><img src="img/slides/slide-concept.png" alt=""></div>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="home-intro">
                <div class="container">

                    <div class="row">
                        <div class="span8">
                            <p>
                                The fastest way to grow your business with the leader in <em>Technology.</em>
                                <span>Check out our options and features included.</span>
                            </p>
                        </div>
                        <div class="span4">
                            <div class="get-started">
                                <a href="#" class="btn btn-large btn-primary">Get Started Now!</a>
                                <div class="learn-more">or <a href="index.html">learn more.</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">

                <div class="row center">
                    <div class="span12">
                        <h2 class="short">Porto is <strong class="inverted">incredibly</strong> beautiful and responsive design.</h2>
                        <p class="featured lead">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.
                        </p>
                    </div>
                </div>

            </div>

            <div class="home-concept">
                <div class="container">

                    <div class="row center">
                        <span class="sun"></span>
                        <span class="cloud"></span>
                        <div class="span2 offset1">
                            <div class="process-image">
                                <img src="img/home-concept-item-1.png" alt="" />
                            </div>
                            <span class="shadow"></span>
                            <strong>Strategy</strong>
                        </div>
                        <div class="span2">
                            <div class="process-image">
                                <img src="img/home-concept-item-2.png" alt="" />
                            </div>
                            <span class="shadow"></span>
                            <strong>Planning</strong>
                        </div>
                        <div class="span2">
                            <div class="process-image">
                                <img src="img/home-concept-item-3.png" alt="" />
                            </div>
                            <span class="shadow"></span>
                            <strong>Build</strong>
                        </div>
                        <div class="span4 offset1">
                            <div class="project-image">
                                <div id="fcSlideshow" class="fc-slideshow">
                                    <ul class="fc-slides">
                                        <li><a href="portfolio-single-project.html"><img src="img/projects/project-home-1.jpg" /></a></li>
                                        <li><a href="portfolio-single-project.html"><img src="img/projects/project-home-2.jpg" /></a></li>
                                    </ul>
                                </div>
                            </div>
                            <span class="shadow big"></span>
                            <strong class="our-work">Our Work</strong>
                        </div>
                    </div>

                    <hr class="tall" />

                </div>
            </div>

            <div class="container">

                <div class="row">
                    <div class="span8">
                        <h2>Our <strong>Features</strong></h2>
                        <div class="row">
                            <div class="span4">
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-group"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">Customer Support</h4>
                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-file"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">HTML5 / CSS3 / JS</h4>
                                        <p class="tall">Lorem ipsum dolor sit amet, adip.</p>
                                    </div>
                                </div>
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-google-plus"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">500+ Google Fonts</h4>
                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-adjust"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">Colors</h4>
                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-film"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">Sliders</h4>
                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur.</p>
                                    </div>
                                </div>
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-ok"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">Icons</h4>
                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-reorder"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">Buttons</h4>
                                        <p class="tall">Lorem ipsum dolor sit, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="icon-desktop"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h4 class="shorter">Lightbox</h4>
                                        <p class="tall">Lorem sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <h2>and more...</h2>
                        <div class="accordion" id="accordion">
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="icon-lightbulb"></i> Group Item #1</a>
                                </div>
                                <div id="collapseOne" class="accordion-body collapse in">
                                    <div class="accordion-inner">
                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor odio vulputate eleifend in in tortorodio vulputate eleifend in in tortor.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="icon-bell-alt"></i> Group Item #2</a>
                                </div>
                                <div id="collapseTwo" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="icon-laptop"></i> Group Item #3</a>
                                </div>
                                <div id="collapseThree" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="tall" />

                <div class="row center">
                    <div class="span12">
                        <h2 class="short">We're not the only ones <strong>excited</strong> about Porto Template...</h2>
                        <h4 class="lead tall">5,500 customers in 100 countries use Porto Template. Meet our customers.</h4>
                    </div>
                </div>
                <div class="row center">
                    <div class="flexslider unstyled" data-plugin-options='{"directionNav":false, "animation":"slide", "slideshow": false, "maxVisibleItems": 6}'>
                        <ul class="slides">
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-1.jpg" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-2.jpg" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-3.jpg" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-4.jpg" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-5.jpg" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-6.jpg" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-4.jpg" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="span2">
                                    <img class="mobile-max-width" src="img/logo-client-2.jpg" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="map-section">
                <section class="featured footer map">
                    <div class="container">
                        <div class="row">
                            <div class="span6">
                                <div class="recent-posts">
                                    <h2>Latest <strong>Blog</strong> Posts</h2>
                                    <div class="row">
                                        <div class="flexslider unstyled" data-plugin-options='{"directionNav":false, "animation":"slide"}'>
                                            <ul class="slides">
                                                <li>
                                                    <div class="span3">
                                                        <article>
                                                            <div class="date">
                                                                <span class="day">15</span>
                                                                <span class="month">Jan</span>
                                                            </div>
                                                            <h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
                                                        </article>
                                                    </div>
                                                    <div class="span3">
                                                        <article>
                                                            <div class="date">
                                                                <span class="day">15</span>
                                                                <span class="month">Jan</span>
                                                            </div>
                                                            <h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
                                                        </article>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="span3">
                                                        <article>
                                                            <div class="date">
                                                                <span class="day">12</span>
                                                                <span class="month">Jan</span>
                                                            </div>
                                                            <h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
                                                        </article>
                                                    </div>
                                                    <div class="span3">
                                                        <article>
                                                            <div class="date">
                                                                <span class="day">11</span>
                                                                <span class="month">Jan</span>
                                                            </div>
                                                            <h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
                                                        </article>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="span3">
                                                        <article>
                                                            <div class="date">
                                                                <span class="day">15</span>
                                                                <span class="month">Jan</span>
                                                            </div>
                                                            <h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
                                                        </article>
                                                    </div>
                                                    <div class="span3">
                                                        <article>
                                                            <div class="date">
                                                                <span class="day">15</span>
                                                                <span class="month">Jan</span>
                                                            </div>
                                                            <h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
                                                        </article>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="span6">
                                                <a class="btn btn-flat btn-mini btn-primary pull-right pull-bottom-phone" href="#">View All Posts <i class="icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <h2><strong>What</strong> Client’s Say</h2>
                                <div class="row">
                                    <div class="flexslider flexslider-top-title unstyled" data-plugin-options='{"controlNav":false, "slideshow": false, "animationLoop": true, "animation":"slide"}'>
                                        <ul class="slides">
                                            <li>
                                                <div class="span6">
                                                    <blockquote class="testimonial">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.  Donec hendrerit vehicula est, in consequat.  Donec hendrerit vehicula est, in consequat.</p>
                                                    </blockquote>
                                                    <div class="testimonial-arrow-down"></div>
                                                    <div class="testimonial-author">
                                                        <div class="thumbnail thumbnail-small">
                                                            <img src="img/clients/client-1.jpg" alt="">
                                                        </div>
                                                        <p><strong>John Smith</strong><span>CEO & Founder - Red Wine</span></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="span6">
                                                    <blockquote class="testimonial">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </blockquote>
                                                    <div class="testimonial-arrow-down"></div>
                                                    <div class="testimonial-author">
                                                        <div class="thumbnail thumbnail-small">
                                                            <img src="img/clients/client-1.jpg" alt="">
                                                        </div>
                                                        <p><strong>John Smith</strong><span>CEO & Founder - Crivos</span></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-ribon">
                    <span>Get in Touch</span>
                </div>
                <div class="span3">
                    <h4>Newsletter</h4>
                    <p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>
                    <form class="form-inline">
                        <div class="input-append">
                            <input class="span2" placeholder="Email Address" type="text">
                            <button class="btn" type="button">Go!</button>
                        </div>
                    </form>
                </div>
                <div class="span3">
                    <h4>Latest Tweet</h4>
                    <div id="tweet" class="twitter">
                        <p>Please wait...</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="contact-details">
                        <h4>Contact Us</h4>
                        <ul class="contact">
                            <li><p><i class="icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
                            <li><p><i class="icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
                            <li><p><i class="icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="span2">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a title="Facebook" target="_blank" href="http://www.facebook.com" data-placement="bottom" rel="tooltip"><i class="icon-facebook"></i><span>Facebook</span></a>
                        <a title="Twitter" href="http://www.twitter.com" data-placement="bottom" rel="tooltip"><i class="icon-twitter"></i><span>Twitter</span></a>
                        <a title="Linkedin" href="http://www.linkedin.com" data-placement="bottom" rel="tooltip"><i class="icon-linkedin"></i><span>Linkedin</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="span1">
                        <a href="index.html" class="logo">
                            <img alt="Porto Website Template" src="img/logo-footer.png">
                        </a>
                    </div>
                    <div class="span7">
                        <p>© Copyright 2013 by Crivos. All Rights Reserved.</p>
                    </div>
                    <div class="span4">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="page-faq.html">FAQ's</a></li>
                                <li><a href="sitemap.html">Sitemap</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
