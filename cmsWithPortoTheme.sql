-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2016 at 11:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fxweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_articles`
--

CREATE TABLE IF NOT EXISTS `cms_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `page_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_articles_languages`
--

CREATE TABLE IF NOT EXISTS `cms_articles_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_articles_id` int(10) unsigned NOT NULL,
  `cms_languages_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cms_articles_languages_cms_articles_id_foreign` (`cms_articles_id`),
  KEY `cms_articles_languages_cms_languages_id_foreign` (`cms_languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_contents`
--

CREATE TABLE IF NOT EXISTS `cms_contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_customhtml`
--

CREATE TABLE IF NOT EXISTS `cms_customhtml` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `cms_customhtml`
--

INSERT INTO `cms_customhtml` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'headerContactUs', '<nav>\r\n\r\n\r\n<ul class="nav nav-pills nav-top">\r\n	<li class="phone"><span><i class="icon-phone"></i>(123) 456-7890</span></li>\r\n</ul>\r\n</nav>\r\n', '2016-02-09 08:43:19', '2016-02-17 08:18:06'),
(2, 'headerSocialIcons', '<div class="social-icons" data-original-title="" facebook="" style="padding-top:10px;">\r\n<a data-original-title="facebook" data-placement="bottom" href="http://www.facebook.com" rel="tooltip" title="">\r\n<i class="icon-facebook"></i><span>Facebook</span>\r\n</a>\r\n <a data-original-title="Twitter" data-placement="bottom" href="http://www.twitter.com" rel="tooltip" title=""><i class="icon-twitter"></i><span>Twitter</span></a> <a data-original-title="Linkedin" data-placement="bottom" href="http://www.linkedin.com" rel="tooltip" title=""><i class="icon-linkedin"></i><span>Linkedin</span></a></div>\r\n\r\n<div style="clear:both">&nbsp;</div>\r\n', '2016-02-09 09:02:26', '2016-02-17 08:34:55'),
(3, 'searchForm', '<div class="search">\r\n						<form class="form-search">\r\n							<input type="text" class="input-medium search-query" placeholder="Search...">\r\n							<button class="search" type="submit"><i class="icon-search"></i></button>\r\n						</form>\r\n					</div>', '2016-02-09 09:42:33', '2016-02-09 09:42:33'),
(4, 'headerLogo', '<h1 class="logo"><a href="/"><img alt="Porto Website Template" src="/cms_assets/porto/img/logo.png" /> </a></h1>\r\n', '2016-02-09 09:46:37', '2016-02-17 08:18:54'),
(5, 'slider', '<div class="slider-container">\r\n<div class="slider" id="revolutionSlider">\r\n<ul>\r\n	<li data-masterspeed="300" data-slotamount="10" data-transition="fade"><img alt="" data-fullwidthcentering="on" src="/cms_assets/porto/img/slides/slide-bg.jpg" />\r\n	<div class="caption sft stb" data-easing="easeOutExpo" data-speed="300" data-start="1000" data-x="70" data-y="180"><img alt="" src="/cms_assets/porto/img/slides/slide-title-border.png" /></div>\r\n\r\n	<div class="caption top-label lfl stl" data-easing="easeOutExpo" data-speed="300" data-start="500" data-x="120" data-y="180">LOOKING FOR A</div>\r\n\r\n	<div class="caption sft stb" data-easing="easeOutExpo" data-speed="300" data-start="1000" data-x="310" data-y="180"><img alt="" src="/cms_assets/porto/img/slides/slide-title-border.png" /></div>\r\n\r\n	<div class="caption main-label sft stb" data-easing="easeOutExpo" data-speed="300" data-start="1500" data-x="0" data-y="235">Mohammad ?</div>\r\n\r\n	<div class="caption bottom-label sft stb" data-easing="easeOutExpo" data-speed="500" data-start="2000" data-x="43" data-y="290">Check out our options and features.</div>\r\n\r\n	<div class="caption fade" data-easing="easeOutExpo" data-speed="500" data-start="2500" data-x="500" data-y="50"><img alt="" src="/cms_assets/porto/img/slides/slide-concept.png" /></div>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n', '2016-02-09 10:18:14', '2016-02-10 05:23:37'),
(6, 'homeIntro', '		<div class="home-intro">\r\n						<div class="container">\r\n\r\n							<div class="row">\r\n								<div class="span8">\r\n									<p>\r\n										The fastest way to grow your business with the leader in <em>Technology.</em>\r\n										<span>Check out our options and features included.</span>\r\n									</p>\r\n								</div>\r\n								<div class="span4">\r\n									<div class="get-started">\r\n										<a href="#" class="btn btn-large btn-primary">Get Started Now!</a>\r\n										<div class="learn-more">or <a href="index.html">learn more.</a></div>\r\n									</div>\r\n								</div>\r\n							</div>\r\n\r\n						</div>\r\n					</div>\r\n', '2016-02-10 03:36:39', '2016-02-10 03:36:39'),
(7, 'aboutWebSiteText', '<div class="row center">\r\n                    <div class="span12">\r\n                        <h2 class="short">Porto is <strong class="inverted">incredibly</strong> beautiful and responsive design.</h2>\r\n                        <p class="featured lead">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.\r\n                        </p>\r\n                    </div>\r\n                </div>', '2016-02-10 03:39:17', '2016-02-10 03:39:17'),
(8, 'homeConcept', '<div class="home-concept">\r\n<div class="container">\r\n<div class="row center">\r\n<div class="span2 offset1">\r\n<div class="process-image"><img alt="" src="/cms_assets/porto/img/home-concept-item-1.png" /></div>\r\n<strong>Strategy</strong></div>\r\n\r\n<div class="span2">\r\n<div class="process-image"><img alt="" src="/cms_assets/porto/img/home-concept-item-2.png" /></div>\r\n<strong>Planning</strong></div>\r\n\r\n<div class="span2">\r\n<div class="process-image"><img alt="" src="/cms_assets/porto/img/home-concept-item-3.png" /></div>\r\n<strong>Build</strong></div>\r\n\r\n<div class="span4 offset1">\r\n<div class="project-image">\r\n<div class="fc-slideshow" id="fcSlideshow">\r\n<ul class="fc-slides">\r\n	<li><a href="portfolio-single-project.html"><img src="/cms_assets/porto/img/projects/project-home-1.jpg" /></a></li>\r\n	<li><a href="portfolio-single-project.html"><img src="/cms_assets/porto/img/projects/project-home-2.jpg" /></a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<strong class="our-work">Our Work</strong></div>\r\n</div>\r\n\r\n<hr class="tall" /></div>\r\n</div>\r\n', '2016-02-10 03:43:12', '2016-02-10 08:34:03'),
(9, 'ourFeatures', '<div class="span8">\r\n                        <h2>Our <strong>Features</strong></h2>\r\n                        <div class="row">\r\n                            <div class="span4">\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-group"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">Customer Support</h4>\r\n                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>\r\n                                    </div>\r\n                                </div>\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-file"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">HTML5 / CSS3 / JS</h4>\r\n                                        <p class="tall">Lorem ipsum dolor sit amet, adip.</p>\r\n                                    </div>\r\n                                </div>\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-google-plus"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">500+ Google Fonts</h4>\r\n                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>\r\n                                    </div>\r\n                                </div>\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-adjust"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">Colors</h4>\r\n                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                            <div class="span4">\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-film"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">Sliders</h4>\r\n                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur.</p>\r\n                                    </div>\r\n                                </div>\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-ok"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">Icons</h4>\r\n                                        <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>\r\n                                    </div>\r\n                                </div>\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-reorder"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">Buttons</h4>\r\n                                        <p class="tall">Lorem ipsum dolor sit, consectetur adip.</p>\r\n                                    </div>\r\n                                </div>\r\n                                <div class="feature-box">\r\n                                    <div class="feature-box-icon">\r\n                                        <i class="icon-desktop"></i>\r\n                                    </div>\r\n                                    <div class="feature-box-info">\r\n                                        <h4 class="shorter">Lightbox</h4>\r\n                                        <p class="tall">Lorem sit amet, consectetur adip.</p>\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>', '2016-02-10 03:44:50', '2016-02-10 03:44:50'),
(10, 'ourFeaturesAndMore', '<div class="span4">\r\n                        <h2>and more...</h2>\r\n                        <div class="accordion" id="accordion">\r\n                            <div class="accordion-group">\r\n                                <div class="accordion-heading">\r\n                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="icon-lightbulb"></i> Group Item #1</a>\r\n                                </div>\r\n                                <div id="collapseOne" class="accordion-body collapse in">\r\n                                    <div class="accordion-inner">\r\n                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor odio vulputate eleifend in in tortorodio vulputate eleifend in in tortor.\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                            <div class="accordion-group">\r\n                                <div class="accordion-heading">\r\n                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="icon-bell-alt"></i> Group Item #2</a>\r\n                                </div>\r\n                                <div id="collapseTwo" class="accordion-body collapse">\r\n                                    <div class="accordion-inner">\r\n                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                            <div class="accordion-group">\r\n                                <div class="accordion-heading">\r\n                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="icon-laptop"></i> Group Item #3</a>\r\n                                </div>\r\n                                <div id="collapseThree" class="accordion-body collapse">\r\n                                    <div class="accordion-inner">\r\n                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>', '2016-02-10 03:45:47', '2016-02-10 03:45:47'),
(11, 'hr', '<hr class="tall">', '2016-02-10 03:46:47', '2016-02-10 03:46:47'),
(12, 'we are not the one', '  <div class="row center">\r\n<div class="span12">\r\n<h2 class="short">We&#39;re not the only ones <strong>excited</strong> about Porto Template...</h2>\r\n\r\n<h4 class="lead tall">5,500 customers in 100 countries use Porto Template. Meet our customers.</h4>\r\n</div>\r\n</div>', '2016-02-10 03:48:15', '2016-02-10 06:14:02'),
(13, 'flexslider', '<div class="row center">\r\n<div class="flexslider unstyled" data-plugin-options="{&quot;directionNav&quot;:false, &quot;animation&quot;:&quot;slide&quot;, &quot;slideshow&quot;: false, &quot;maxVisibleItems&quot;: 6}">\r\n<ul class="slides">\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-1.jpg" /></div>\r\n	</li>\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-2.jpg" /></div>\r\n	</li>\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-3.jpg" /></div>\r\n	</li>\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-4.jpg" /></div>\r\n	</li>\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-5.jpg" /></div>\r\n	</li>\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-6.jpg" /></div>\r\n	</li>\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-4.jpg" /></div>\r\n	</li>\r\n	<li>\r\n	<div class="span2"><img alt="" class="mobile-max-width" src="/cms_assets/porto/img/logo-client-2.jpg" /></div>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n', '2016-02-10 03:49:47', '2016-02-10 08:34:59'),
(14, 'mapSection', '<div class="map-section">\r\n<section class="featured footer map">\r\n<div class="container">\r\n<div class="row">\r\n<div class="span6">\r\n<div class="recent-posts">\r\n<h2>Latest <strong>Blog</strong> Posts</h2>\r\n\r\n<div class="row">\r\n<div class="flexslider unstyled" data-plugin-options="{&quot;directionNav&quot;:false, &quot;animation&quot;:&quot;slide&quot;}">\r\n<ul class="slides">\r\n	<li>\r\n	<div class="span3">\r\n	<article>\r\n	<div class="date"><span class="day">15</span> <span class="month">Jan</span></div>\r\n\r\n	<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a class="read-more" href="/">read more <i class="icon-angle-right"></i></a></p>\r\n	</article>\r\n	</div>\r\n\r\n	<div class="span3">\r\n	<article>\r\n	<div class="date"><span class="day">15</span> <span class="month">Jan</span></div>\r\n\r\n	<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a class="read-more" href="/">read more <i class="icon-angle-right"></i></a></p>\r\n	</article>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="span3">\r\n	<article>\r\n	<div class="date"><span class="day">12</span> <span class="month">Jan</span></div>\r\n\r\n	<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a class="read-more" href="/">read more <i class="icon-angle-right"></i></a></p>\r\n	</article>\r\n	</div>\r\n\r\n	<div class="span3">\r\n	<article>\r\n	<div class="date"><span class="day">11</span> <span class="month">Jan</span></div>\r\n\r\n	<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a class="read-more" href="/">read more <i class="icon-angle-right"></i></a></p>\r\n	</article>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="span3">\r\n	<article>\r\n	<div class="date"><span class="day">15</span> <span class="month">Jan</span></div>\r\n\r\n	<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a class="read-more" href="/">read more <i class="icon-angle-right"></i></a></p>\r\n	</article>\r\n	</div>\r\n\r\n	<div class="span3">\r\n	<article>\r\n	<div class="date"><span class="day">15</span> <span class="month">Jan</span></div>\r\n\r\n	<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a class="read-more" href="/">read more <i class="icon-angle-right"></i></a></p>\r\n	</article>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="row">\r\n<div class="span6"><a class="btn btn-flat btn-mini btn-primary pull-right pull-bottom-phone" href="#">View All Posts <i class="icon-arrow-right"></i></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="span6">\r\n<h2><strong>What</strong> Client&rsquo;s Say</h2>\r\n\r\n<div class="row">\r\n<div class="flexslider flexslider-top-title unstyled" data-plugin-options="{&quot;controlNav&quot;:false, &quot;slideshow&quot;: false, &quot;animationLoop&quot;: true, &quot;animation&quot;:&quot;slide&quot;}">\r\n<ul class="slides">\r\n	<li>\r\n	<div class="span6">\r\n	<blockquote class="testimonial">\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Donec hendrerit vehicula est, in consequat. Donec hendrerit vehicula est, in consequat.</p>\r\n	</blockquote>\r\n\r\n	<div class="testimonial-arrow-down">&nbsp;</div>\r\n\r\n	<div class="testimonial-author">\r\n	<div class="thumbnail thumbnail-small"><img alt="" src="/cms_assets/porto/img/clients/client-1.jpg" /></div>\r\n\r\n	<p><strong>John Smith</strong><span>CEO &amp; Founder - Red Wine</span></p>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="span6">\r\n	<blockquote class="testimonial">\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n	</blockquote>\r\n\r\n	<div class="testimonial-arrow-down">&nbsp;</div>\r\n\r\n	<div class="testimonial-author">\r\n	<div class="thumbnail thumbnail-small"><img alt="" src="/cms_assets/porto/img/clients/client-1.jpg" /></div>\r\n\r\n	<p><strong>John Smith</strong><span>CEO &amp; Founder - Crivos</span></p>\r\n	</div>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n', '2016-02-10 03:51:24', '2016-02-10 08:37:04'),
(15, 'footer', '<footer>\r\n<div class="container">\r\n<div class="row">\r\n<div class="footer-ribon"><span>Get in Touch</span></div>\r\n\r\n<div class="span3">\r\n<h4>Newsletter</h4>\r\n\r\n<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>\r\n\r\n<form class="form-inline">\r\n<div class="input-append"><input class="span2" placeholder="Email Address" type="text" /><button class="btn" type="button">Go!</button></div>\r\n</form>\r\n</div>\r\n\r\n<div class="span3">\r\n<h4>Latest Tweet</h4>\r\n\r\n<div class="twitter" id="tweet">\r\n<p>Please wait...</p>\r\n</div>\r\n</div>\r\n\r\n<div class="span4">\r\n<div class="contact-details">\r\n<h4>Contact Us</h4>\r\n\r\n<ul class="contact">\r\n	<li>\r\n	<p><i class="icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p>\r\n	</li>\r\n	<li>\r\n	<p><i class="icon-phone"></i> <strong>Phone:</strong> (123) 456-6666</p>\r\n	</li>\r\n	<li>\r\n	<p><i class="icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="span2">\r\n<h4>Follow Us</h4>\r\n\r\n<div class="social-icons"><a data-placement="bottom" href="http://www.facebook.com" rel="tooltip" target="_blank" title="Facebook"><i class="icon-facebook"></i><span>Facebook</span></a> <a data-placement="bottom" href="http://www.twitter.com" rel="tooltip" title="Twitter"><i class="icon-twitter"></i><span>Twitter</span></a> <a data-placement="bottom" href="http://www.linkedin.com" rel="tooltip" title="Linkedin"><i class="icon-linkedin"></i><span>Linkedin</span></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="footer-copyright">\r\n<div class="container">\r\n<div class="row">\r\n<div class="span1"><a class="logo" href="index.html"><img alt="Porto Website Template" src="/cms_assets/porto/img/logo-footer.png" /> </a></div>\r\n\r\n<div class="span7">\r\n<p>&copy; Copyright 2013 by Crivos. All Rights Reserved.</p>\r\n</div>\r\n\r\n<div class="span4">\r\n<nav id="sub-menu">\r\n<ul>\r\n	<li><a href="page-faq.html">FAQ&#39;s</a></li>\r\n	<li><a href="sitemap.html">Sitemap</a></li>\r\n	<li><a href="contact-us.html">Contact</a></li>\r\n</ul>\r\n</nav>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</footer>\r\n', '2016-02-10 03:52:40', '2016-02-10 08:33:04'),
(16, 'aboutUs_breadcrumbs', '<section class="page-top">\r\n					<div class="container">\r\n						<div class="row">\r\n							<div class="span12">\r\n								<ul class="breadcrumb">\r\n									<li><a href="index.html">Home</a> <span class="divider">/</span></li>\r\n									<li class="active">About Us</li>\r\n								</ul>\r\n							</div>\r\n						</div>\r\n						<div class="row">\r\n							<div class="span12">\r\n								<h2>About Us</h2>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</section>', '2016-02-10 07:08:21', '2016-02-10 07:08:21'),
(17, 'title_(our history)', '<div class="span12">\r\n							<h3 class="pull-top">Our <strong>History</strong></h3>\r\n						</div>', '2016-02-10 07:10:57', '2016-02-10 07:10:57'),
(18, 'imgs_text_multi_row_(our history)', '<div class="span12">\r\n<ul class="timeline">\r\n	<li>\r\n	<div class="thumb"><img alt="" src="/cms_assets/porto/img/office-4.jpg" /></div>\r\n\r\n	<div class="featured-box" style="height: auto;">\r\n	<div class="box-content">\r\n	<h4><strong>2012</strong></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumb"><img alt="" src="/cms_assets/porto/img/office-3.jpg" /></div>\r\n\r\n	<div class="featured-box" style="height: auto;">\r\n	<div class="box-content">\r\n	<h4><strong>2010</strong></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia.</p>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumb"><img alt="" src="/cms_assets/porto/img/office-2.jpg" /></div>\r\n\r\n	<div class="featured-box" style="height: auto;">\r\n	<div class="box-content">\r\n	<h4><strong>2005</strong></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumb"><img alt="" src="/cms_assets/porto/img/office-1.jpg" /></div>\r\n\r\n	<div class="featured-box" style="height: auto;">\r\n	<div class="box-content">\r\n	<h4><strong>2000</strong></h4>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>\r\n	</div>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n', '2016-02-10 07:12:46', '2016-02-10 08:32:25'),
(19, 'article(who we are)', '\r\n<h3><strong>Who</strong> We Are</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>\r\n\r\n<p>Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing <span class="alternative-font">metus</span> sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula.</p>\r\n\r\n', '2016-02-10 07:16:49', '2016-02-10 08:10:02'),
(20, 'rightTabs', '\r\n<div class="featured-box featured-box-quaternary" style="height: auto;">\r\n<div class="box-content">\r\n<h4>Behind the scenes</h4>\r\n\r\n<ul class="flickr-feed" data-plugin-options="{" qstrings="">\r\n</ul>\r\n</div>\r\n</div>\r\n', '2016-02-10 07:18:09', '2016-02-10 08:10:19'),
(21, 'text with right button', '<div class="row">\r\n						<div class="span10">\r\n							<p class="lead">\r\n								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non pulvinar. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh <span class="alternative-font">metus.</span>\r\n							</p>\r\n						</div>\r\n						<div class="span2">\r\n							<a href="#" class="btn btn-large btn-primary pull-top">Join Our Team!</a>\r\n						</div>\r\n					</div>', '2016-02-10 07:20:03', '2016-02-10 07:20:03'),
(22, 'blackTitle(new way)', '<h2>The New Way to <strong>Success</strong></h2>', '2016-02-10 07:49:38', '2016-02-10 07:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `cms_customhtml_languages`
--

CREATE TABLE IF NOT EXISTS `cms_customhtml_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_customhtml_id` int(10) unsigned NOT NULL,
  `cms_languages_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cms_customhtml_languages_cms_customhtml_id_foreign` (`cms_customhtml_id`),
  KEY `cms_customhtml_languages_cms_languages_id_foreign` (`cms_languages_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_customhtml_languages`
--

INSERT INTO `cms_customhtml_languages` (`id`, `cms_customhtml_id`, `cms_languages_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 15, 2, 'تابعنا', '<p>تابعنا على</p>\r\n', '2016-03-08 07:45:49', '2016-03-08 07:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `cms_languages`
--

CREATE TABLE IF NOT EXISTS `cms_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charset` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `dir` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_languages`
--

INSERT INTO `cms_languages` (`id`, `name`, `charset`, `code`, `dir`) VALUES
(1, 'English', 'Utf-8', 'en', 'ltr'),
(2, 'Arabic', 'utf-8', 'ar', 'rtl');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE IF NOT EXISTS `cms_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'porto', '2016-02-09 07:55:34', '2016-02-09 07:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_items`
--

CREATE TABLE IF NOT EXISTS `cms_menus_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_item_id` int(11) NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `disable` tinyint(1) NOT NULL,
  `hide` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cms_menus_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_menus_items`
--

INSERT INTO `cms_menus_items` (`id`, `name`, `parent_item_id`, `menu_id`, `disable`, `hide`, `type`, `content_id`, `page_id`, `created_at`, `updated_at`) VALUES
(1, 'home', 0, 1, 0, 0, 0, 0, 3, '2016-02-09 07:56:19', '2016-02-10 08:13:23'),
(2, 'aboutus', 0, 1, 0, 0, 0, 0, 2, '2016-02-09 08:32:02', '2016-02-09 08:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_items_languages`
--

CREATE TABLE IF NOT EXISTS `cms_menus_items_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_menus_items_id` int(10) unsigned NOT NULL,
  `cms_languages_id` int(10) unsigned NOT NULL,
  `translate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cms_menus_items_languages_cms_menus_items_id_foreign` (`cms_menus_items_id`),
  KEY `cms_menus_items_languages_cms_languages_id_foreign` (`cms_languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_languages`
--

CREATE TABLE IF NOT EXISTS `cms_menus_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_menus_id` int(10) unsigned NOT NULL,
  `cms_languages_id` int(10) unsigned NOT NULL,
  `translate` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cms_menus_languages_cms_menus_id_foreign` (`cms_menus_id`),
  KEY `cms_menus_languages_cms_languages_id_foreign` (`cms_languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_translate`
--

CREATE TABLE IF NOT EXISTS `cms_menus_translate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `translate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_modules`
--

CREATE TABLE IF NOT EXISTS `cms_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'aboutus', '2016-02-09 08:31:03', '2016-02-09 08:31:03'),
(3, 'index', '2016-02-10 07:45:30', '2016-02-10 07:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages_contents`
--

CREATE TABLE IF NOT EXISTS `cms_pages_contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `page_id` int(10) unsigned NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `float` int(11) NOT NULL,
  `display` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `all_pages` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cms_pages_contents_page_id_foreign` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `cms_pages_contents`
--

INSERT INTO `cms_pages_contents` (`id`, `module_id`, `type`, `page_id`, `module_name`, `order`, `float`, `display`, `position`, `all_pages`, `created_at`, `updated_at`) VALUES
(4, '1', 0, 2, 'delete', 2, 0, 0, 'position_2', 0, '2016-02-09 08:43:43', '2016-02-17 08:27:44'),
(9, '6', 0, 3, 'delete', 1, 0, 0, 'position_3', 1, '2016-02-10 04:35:40', '2016-02-10 08:14:43'),
(11, '7', 0, 3, 'delete', 0, 0, 0, 'position_4', 1, '2016-02-10 05:33:39', '2016-02-10 07:46:01'),
(13, '8', 0, 3, 'delete', 0, 0, 0, 'position_5', 1, '2016-02-10 06:04:37', '2016-02-10 07:46:04'),
(15, '9', 0, 3, 'delete', 0, 0, 0, 'position_6', 1, '2016-02-10 06:09:32', '2016-02-10 07:46:10'),
(16, '10', 0, 3, 'delete', 0, 0, 0, 'position_6', 1, '2016-02-10 06:09:51', '2016-02-10 07:46:17'),
(17, '11', 0, 3, 'delete', 0, 0, 0, 'position_7', 1, '2016-02-10 06:21:12', '2016-02-10 07:46:30'),
(18, '12', 0, 3, 'delete', 0, 0, 0, 'position_7', 1, '2016-02-10 06:21:38', '2016-02-10 07:46:33'),
(19, '13', 0, 3, 'delete', 0, 0, 0, 'position_7', 1, '2016-02-10 06:22:08', '2016-02-10 07:46:35'),
(20, '14', 0, 3, 'delete', 0, 0, 0, 'position_8', 1, '2016-02-10 06:22:36', '2016-02-10 07:46:43'),
(23, '5', 0, 3, 'delete', 0, 0, 0, 'position_3', 1, '2016-02-10 07:41:12', '2016-02-10 08:14:43'),
(24, '16', 0, 2, 'delete', 0, 0, 0, 'position_3', 1, '2016-02-10 07:47:37', '2016-02-10 07:47:37'),
(25, '22', 0, 2, 'delete', 0, 0, 0, 'position_4', 1, '2016-02-10 07:51:09', '2016-02-10 07:51:09'),
(26, '21', 0, 2, 'delete', 1, 0, 0, 'position_4', 1, '2016-02-10 07:51:39', '2016-02-10 07:55:10'),
(27, '11', 0, 2, 'delete', 0, 0, 0, 'position_5', 1, '2016-02-10 07:52:33', '2016-02-10 07:55:42'),
(28, '19', 0, 2, 'delete', 0, 0, 0, 'position_10', 1, '2016-02-10 07:53:52', '2016-02-10 08:10:46'),
(29, '20', 0, 2, 'delete', 0, 0, 0, 'position_11', 1, '2016-02-10 07:54:08', '2016-02-10 08:10:51'),
(31, '17', 0, 2, 'delete', 0, 0, 0, 'position_6', 1, '2016-02-10 07:57:36', '2016-02-10 07:57:36'),
(32, '18', 0, 2, 'delete', 2, 0, 0, 'position_6', 1, '2016-02-10 07:58:14', '2016-02-10 07:59:22'),
(33, '2', 0, 3, 'delete', 1, 2, 0, 'position_2', 0, '2016-02-10 08:15:39', '2016-02-17 08:27:48'),
(34, '4', 0, 3, 'delete', 0, 0, 0, 'position_2', 0, '2016-02-10 08:15:59', '2016-02-17 08:27:48'),
(35, '1', -1, 3, 'delete', 3, 0, 0, 'position_2', 0, '2016-02-10 08:16:35', '2016-02-17 08:27:44'),
(36, '15', 0, 3, 'delete', 0, 0, 0, 'position_9', 0, '2016-02-10 08:19:27', '2016-02-10 08:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages_contents_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages_contents_pages` (
  `pages_id` int(10) unsigned NOT NULL,
  `pages_contents_id` int(10) unsigned NOT NULL,
  KEY `cms_pages_contents_pages_pages_id_foreign` (`pages_id`),
  KEY `cms_pages_contents_pages_pages_contents_id_foreign` (`pages_contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_pages_contents_pages`
--

INSERT INTO `cms_pages_contents_pages` (`pages_id`, `pages_contents_id`) VALUES
(3, 23),
(3, 9),
(3, 11),
(3, 13),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 31),
(2, 32);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages_modules`
--

CREATE TABLE IF NOT EXISTS `cms_pages_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `float` int(11) NOT NULL,
  `display` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cms_pages_modules_page_id_foreign` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_articles_languages`
--
ALTER TABLE `cms_articles_languages`
  ADD CONSTRAINT `cms_articles_languages_cms_articles_id_foreign` FOREIGN KEY (`cms_articles_id`) REFERENCES `cms_articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_articles_languages_cms_languages_id_foreign` FOREIGN KEY (`cms_languages_id`) REFERENCES `cms_languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_customhtml_languages`
--
ALTER TABLE `cms_customhtml_languages`
  ADD CONSTRAINT `cms_customhtml_languages_cms_customhtml_id_foreign` FOREIGN KEY (`cms_customhtml_id`) REFERENCES `cms_customhtml` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_customhtml_languages_cms_languages_id_foreign` FOREIGN KEY (`cms_languages_id`) REFERENCES `cms_languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_menus_items`
--
ALTER TABLE `cms_menus_items`
  ADD CONSTRAINT `cms_menus_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `cms_menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_menus_items_languages`
--
ALTER TABLE `cms_menus_items_languages`
  ADD CONSTRAINT `cms_menus_items_languages_cms_languages_id_foreign` FOREIGN KEY (`cms_languages_id`) REFERENCES `cms_languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_menus_items_languages_cms_menus_items_id_foreign` FOREIGN KEY (`cms_menus_items_id`) REFERENCES `cms_menus_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_menus_languages`
--
ALTER TABLE `cms_menus_languages`
  ADD CONSTRAINT `cms_menus_languages_cms_languages_id_foreign` FOREIGN KEY (`cms_languages_id`) REFERENCES `cms_languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_menus_languages_cms_menus_id_foreign` FOREIGN KEY (`cms_menus_id`) REFERENCES `cms_menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_pages_contents`
--
ALTER TABLE `cms_pages_contents`
  ADD CONSTRAINT `cms_pages_contents_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_pages_contents_pages`
--
ALTER TABLE `cms_pages_contents_pages`
  ADD CONSTRAINT `cms_pages_contents_pages_pages_contents_id_foreign` FOREIGN KEY (`pages_contents_id`) REFERENCES `cms_pages_contents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_pages_contents_pages_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_pages_modules`
--
ALTER TABLE `cms_pages_modules`
  ADD CONSTRAINT `cms_pages_modules_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
