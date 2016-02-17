-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 12:41 PM
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
-- Table structure for table `activations`
--

CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=251 ;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(45, 51, '2NNtwTJNXAOsGSuQxG7E0T4kk5xWb3Cc', 1, '2015-11-08 10:12:09', '2015-11-08 10:12:09', '2015-11-08 10:12:09'),
(58, 68, 'tcF5CCEsmcLbj6wDcx2tR2D38ZX6RkBq', 1, '2015-11-11 10:13:31', '2015-11-11 10:13:31', '2015-11-11 10:13:31'),
(66, 75, 'UH8Num8iwPC72mlDzg5x0TYnrjndU1T9', 1, '2015-11-11 10:56:16', '2015-11-11 10:56:16', '2015-11-11 10:56:16'),
(67, 76, 'iipkuKvfMUHGiX3D4ClQK52pJtuldzW3', 1, '2015-11-11 11:22:31', '2015-11-11 11:22:31', '2015-11-11 11:22:31'),
(68, 77, 'fzAaROKyfvo1ydAlnVwJD3IaX4uIe7DS', 1, '2015-11-11 11:25:49', '2015-11-11 11:25:49', '2015-11-11 11:25:49'),
(69, 78, 'sNV7gYyBoiRStgZokAoGEJR5Rr9mRefe', 1, '2015-11-11 11:26:43', '2015-11-11 11:26:43', '2015-11-11 11:26:43'),
(70, 79, 'YV5g5HnS8jJRAXCArQFHdYuVUmpDydfj', 1, '2015-11-11 11:27:53', '2015-11-11 11:27:53', '2015-11-11 11:27:53'),
(71, 80, 'IXVcjhErpzBZ3xX4yceG9aWRCr5IxCYt', 1, '2015-11-11 11:28:35', '2015-11-11 11:28:35', '2015-11-11 11:28:35'),
(72, 81, '7W88950lDXod7IuSCpXhGVWlHb3i52M4', 1, '2015-11-11 11:29:34', '2015-11-11 11:29:34', '2015-11-11 11:29:34'),
(73, 82, 'BRwWImhhgxP82Jk577uD6Hfff8R2ygWG', 1, '2015-11-11 11:30:16', '2015-11-11 11:30:16', '2015-11-11 11:30:16'),
(74, 83, '5n8H9SfEG4tjqlf5wWe7s3BitLcdvy68', 1, '2015-11-11 11:30:44', '2015-11-11 11:30:44', '2015-11-11 11:30:44'),
(75, 84, 'b3kNbjyNYtxEr3TlhZSobriQY13BmmJM', 1, '2015-11-11 11:31:55', '2015-11-11 11:31:55', '2015-11-11 11:31:55'),
(76, 85, '2EiGgopCPxDNLE9ckXh7sLDPZSotwG7t', 1, '2015-11-11 11:35:13', '2015-11-11 11:35:13', '2015-11-11 11:35:13'),
(77, 86, 'lofvLuGW37LGbdDcC1WwSpKhsfiwppGF', 1, '2015-11-11 11:36:58', '2015-11-11 11:36:58', '2015-11-11 11:36:58'),
(78, 87, 'rQYZVzBOXfpMwoLobcyDabnMZyo7y6KR', 1, '2015-11-11 11:43:11', '2015-11-11 11:43:11', '2015-11-11 11:43:11'),
(79, 88, 'nHrxf14AUkfFWUYyPLLdTS9slyFCQ5sb', 1, '2015-11-11 11:43:41', '2015-11-11 11:43:41', '2015-11-11 11:43:41'),
(80, 89, 'GdU828Mc0PyYjuDUNk4R3GjGhSrycIgI', 1, '2015-11-11 11:44:03', '2015-11-11 11:44:03', '2015-11-11 11:44:03'),
(81, 90, 'k1LSDrOUcYKtfCh7uhuMZtIBQniKM87l', 1, '2015-11-11 11:45:59', '2015-11-11 11:45:59', '2015-11-11 11:45:59'),
(82, 91, 'vLYM5qSgvpYeO0mT9RMQyAWmM8rsQMvO', 1, '2015-11-11 11:46:15', '2015-11-11 11:46:15', '2015-11-11 11:46:15'),
(83, 92, 'ko8U747ylmWjKE2s8ymsgw6xBAFYF5fB', 1, '2015-11-11 11:46:45', '2015-11-11 11:46:45', '2015-11-11 11:46:45'),
(84, 93, '6nOiPnbuqtgK1SavGTotpDnRy6UgNBwG', 1, '2015-11-11 12:04:26', '2015-11-11 12:04:26', '2015-11-11 12:04:26'),
(85, 94, 'dC0wf6SMQ5ct702jz1fSLRyAJGpXPVR5', 1, '2015-11-11 12:06:56', '2015-11-11 12:06:56', '2015-11-11 12:06:56'),
(86, 95, 'yc8R28i37X0f7Vju9dVC09z5zFaQ6muz', 1, '2015-11-11 12:07:44', '2015-11-11 12:07:44', '2015-11-11 12:07:44'),
(153, 162, 'GfFVqwvLn2ZCVkLPs8ToWRMVuA4dx3Me', 1, '2015-11-12 12:31:28', '2015-11-12 12:31:28', '2015-11-12 12:31:28'),
(154, 163, 'LI4iA3M7Um8QPugELY8GHsW5yRNJdEvc', 1, '2015-11-12 12:34:36', '2015-11-12 12:34:36', '2015-11-12 12:34:36'),
(155, 164, 'fvLZhOLg487m4JZyWHocXLVY7wbSD5Ki', 1, '2015-11-12 12:35:45', '2015-11-12 12:35:45', '2015-11-12 12:35:45'),
(225, 232, '3UybmJ5Jj9tEJseUSE62LtQLw6uKPC0v', 1, '2015-11-17 13:29:01', '2015-11-17 13:29:01', '2015-11-17 13:29:01'),
(227, 234, 'rISg5bJDtL7vsTWiKeXFIHrbhn4RzhUx', 1, '2015-11-18 06:55:41', '2015-11-18 06:55:41', '2015-11-18 06:55:41'),
(235, 241, '2UZPcUVo9deUkxA04Wv0aTO16X0URYbZ', 1, '2015-12-13 06:24:03', '2015-12-13 06:24:03', '2015-12-13 06:24:03'),
(247, 314, 'kUJTdT9R6kXQA0WF4ltMOvGldpwbJjKu', 1, '2015-12-23 11:45:34', '2015-12-23 11:45:34', '2015-12-23 11:45:34'),
(248, 315, 'jDeZJSxjh22Y5LbvejzrTcHl5ntKOswa', 1, '2016-02-02 04:19:52', '2016-02-02 04:19:52', '2016-02-02 04:19:52'),
(249, 316, 'QfnNXNdfKmbLs3JngxHQAYCINaZcVB1m', 1, '2016-02-02 04:26:28', '2016-02-02 04:26:28', '2016-02-02 04:26:28'),
(250, 317, '3okbVOyVTRRUidgq3zXTWLfcssMHJp4r', 1, '2016-02-02 04:29:52', '2016-02-02 04:29:52', '2016-02-02 04:29:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `configrations_groups`
--

CREATE TABLE IF NOT EXISTS `configrations_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `timeout` int(11) NOT NULL,
  `otp_mode` int(11) NOT NULL,
  `company` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `signature` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `support_page` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_server` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_login` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `support_email` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `templates` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `copies` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `default_leverage` int(11) NOT NULL,
  `default_deposit` double NOT NULL,
  `maxsecurities` int(11) NOT NULL,
  `ConGroupSec` double(8,2) NOT NULL,
  `ConGroupMargin` double(8,2) NOT NULL,
  `secmargins_total` int(11) NOT NULL,
  `currency` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `credit` double NOT NULL,
  `margin_call` int(11) NOT NULL,
  `margin_mode` int(11) NOT NULL,
  `margin_stopout` int(11) NOT NULL,
  `interestrate` double NOT NULL,
  `use_swap` int(11) NOT NULL,
  `news` int(11) NOT NULL,
  `rights` int(11) NOT NULL,
  `check_ie_prices` int(11) NOT NULL,
  `maxpositions` int(11) NOT NULL,
  `close_reopen` int(11) NOT NULL,
  `hedge_prohibited` int(11) NOT NULL,
  `close_fifo` int(11) NOT NULL,
  `hedge_largeleg` int(11) NOT NULL,
  `unused_rights` int(11) NOT NULL,
  `securities_hash` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `margin_type` int(11) NOT NULL,
  `archive_period` int(11) NOT NULL,
  `archive_max_balance` int(11) NOT NULL,
  `stopout_skip_hedged` int(11) NOT NULL,
  `archive_pending_period` int(11) NOT NULL,
  `news_languages` int(11) NOT NULL,
  `news_languages_total` int(11) NOT NULL,
  `reserved` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `configrations_groups`
--

INSERT INTO `configrations_groups` (`id`, `group`, `enable`, `timeout`, `otp_mode`, `company`, `signature`, `support_page`, `smtp_server`, `smtp_login`, `smtp_password`, `support_email`, `templates`, `copies`, `reports`, `default_leverage`, `default_deposit`, `maxsecurities`, `ConGroupSec`, `ConGroupMargin`, `secmargins_total`, `currency`, `credit`, `margin_call`, `margin_mode`, `margin_stopout`, `interestrate`, `use_swap`, `news`, `rights`, `check_ie_prices`, `maxpositions`, `close_reopen`, `hedge_prohibited`, `close_fifo`, `hedge_largeleg`, `unused_rights`, `securities_hash`, `margin_type`, `archive_period`, `archive_max_balance`, `stopout_skip_hedged`, `archive_pending_period`, `news_languages`, `news_languages_total`, `reserved`) VALUES
(1, 'manager', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, '', 0, 0, 0, 0, 0, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'demoforex', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, 'USD', 0, 50, 1, 30, 0, 1, 1, 27, 0, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'preliminary', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 0, 'USD', 0, 50, 1, 30, 0, 1, 1, 31, 0, 0, 0, 0, 0, 0, 0, '\n×Fe3åÁçF', 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'testUSD', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, 'USD', 0, 50, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'testEUR', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, 'EUR', 0, 50, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'testJPY', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, 'GBP', 0, 50, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'testCHF', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, 'USD', 0, 50, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'testGBP', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, 'GBP', 0, 50, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'test', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 10, 'USD', 0, 80, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'system', 0, 0, 0, 'Golden Royal Index FZE', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 0, 'USD', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'ggg', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 5, 'USD', 0, 50, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'fgfgfg', 1, 7, 0, 'FX River LLC', '', '', '', '', '', '', '', 0, 0, 0, 0, 4096, 0.00, 0.00, 0, 'USD', 0, 50, 1, 30, 0, 1, 1, 31, 1, 0, 0, 0, 0, 0, 0, '¦±938`Ö¬êó', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `configrations_groups_margin`
--

CREATE TABLE IF NOT EXISTS `configrations_groups_margin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` tinyint(4) NOT NULL,
  `symbol` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `swap_long` double NOT NULL,
  `swap_short` double NOT NULL,
  `margin_divider` double NOT NULL,
  `reserved` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `configrations_groups_margin`
--

INSERT INTO `configrations_groups_margin` (`id`, `position`, `symbol`, `swap_long`, `swap_short`, `margin_divider`, `reserved`) VALUES
(1, 0, 'EURGBP', 0.000007, 0.000017, 1, 0),
(2, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(3, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(4, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(5, 4, 'USDJPY', 0, 0, 1, 0),
(6, 0, 'EURGBP', -0.000009, -0.000003, 1, 0),
(7, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(8, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(9, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(10, 4, 'USDJPY', 0, 0, 1, 0),
(11, 0, 'EURGBP', -0.000009, -0.000003, 1, 0),
(12, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(13, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(14, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(15, 4, 'USDJPY', 0, 0, 1, 0),
(16, 0, 'EURGBP', -0.000009, -0.000003, 1, 0),
(17, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(18, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(19, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(20, 4, 'USDJPY', 0, 0, 1, 0),
(21, 0, 'EURGBP', -0.000009, -0.000003, 1, 0),
(22, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(23, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(24, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(25, 4, 'USDJPY', 0, 0, 1, 0),
(26, 0, 'EURGBP', -0.000009, -0.000003, 1, 0),
(27, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(28, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(29, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(30, 4, 'USDJPY', 0, 0, 1, 0),
(31, 0, 'EURGBP', -0.000009, -0.000003, 1, 0),
(32, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(33, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(34, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(35, 4, 'USDJPY', 0, 0, 1, 0),
(36, 0, 'AUDCHF', -0.000095, -0.000041, 2, 0),
(37, 1, 'AUDNZD', 0.000012, 0.000048, 4, 0),
(38, 2, 'AUDUSD', -0.000093, -0.00004, 5, 0),
(39, 3, 'EURGBP', 0.000007, 0.000017, 6, 0),
(40, 4, 'EURUSD', 0.000004, 0.000012, 1, 0),
(41, 5, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(42, 6, 'NZDUSD', -0.000112, -0.000048, 1, 0),
(43, 7, 'USDCAD', 0.000016, 0.000039, 1, 0),
(44, 8, 'USDCHF', -0.000009, -0.000003, 1, 0),
(45, 9, 'USDJPY', -0.000932, -0.000179, 1, 0),
(46, 0, 'EURGBP', -0.000009, -0.000003, 1, 0),
(47, 1, 'EURUSD', 0.000004, 0.000012, 1, 0),
(48, 2, 'GBPUSD', -0.000022, -0.000007, 1, 0),
(49, 3, 'USDCHF', -0.000009, -0.000003, 1, 0),
(50, 4, 'USDJPY', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `configrations_groups_securities`
--

CREATE TABLE IF NOT EXISTS `configrations_groups_securities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` tinyint(4) NOT NULL,
  `show` int(11) NOT NULL,
  `trade` int(11) NOT NULL,
  `execution` int(11) NOT NULL,
  `comm_base` double NOT NULL,
  `comm_type` int(11) NOT NULL,
  `comm_lots` int(11) NOT NULL,
  `comm_agent` double NOT NULL,
  `comm_agent_type` int(11) NOT NULL,
  `spread_diff` int(11) NOT NULL,
  `lot_min` int(11) NOT NULL,
  `lot_max` int(11) NOT NULL,
  `lot_step` int(11) NOT NULL,
  `ie_deviation` int(11) NOT NULL,
  `confirmation` int(11) NOT NULL,
  `trade_rights` int(11) NOT NULL,
  `ie_quick_mode` int(11) NOT NULL,
  `autocloseout_mode` int(11) NOT NULL,
  `comm_tax` double NOT NULL,
  `comm_agent_lots` int(11) NOT NULL,
  `freemargin_mode` int(11) NOT NULL,
  `reserved` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Dumping data for table `configrations_groups_securities`
--

INSERT INTO `configrations_groups_securities` (`id`, `position`, `show`, `trade`, `execution`, `comm_base`, `comm_type`, `comm_lots`, `comm_agent`, `comm_agent_type`, `spread_diff`, `lot_min`, `lot_max`, `lot_step`, `ie_deviation`, `confirmation`, `trade_rights`, `ie_quick_mode`, `autocloseout_mode`, `comm_tax`, `comm_agent_lots`, `freemargin_mode`, `reserved`) VALUES
(1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1000000, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1000000, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 2, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1000000, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1000000, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 1, 1, 1, 1, 2, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 1, 2, 0, 0, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 2, 1, 1, 2, 0, 0, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 3, 1, 1, 2, 0, 0, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 2, 1, 0, 1, 0, 0, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 3, 1, 0, 1, 0, 0, 0, 0, 0, 0, 10, 1000000, 10, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 1, 1, 0, 1, 2, 0, 10, 0, 0, 10, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 1, 1, 1, 1, 2, 0, 10, 0, 0, 1, 100000, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 1, 1, 1, 10, 1, 0, 10, 0, 0, 10, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 3, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 100000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `configrations_group_sec`
--

CREATE TABLE IF NOT EXISTS `configrations_group_sec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `show` int(11) NOT NULL,
  `trade` int(11) NOT NULL,
  `comm_base` double NOT NULL,
  `comm_type` int(11) NOT NULL,
  `comm_lots` int(11) NOT NULL,
  `comm_agent` double NOT NULL,
  `comm_agent_type` int(11) NOT NULL,
  `spread_diff` int(11) NOT NULL,
  `lot_min` int(11) NOT NULL,
  `lot_max` int(11) NOT NULL,
  `lot_step` int(11) NOT NULL,
  `ie_deviation` int(11) NOT NULL,
  `confirmation` int(11) NOT NULL,
  `trade_rights` int(11) NOT NULL,
  `ie_quick_mode` int(11) NOT NULL,
  `autocloseout_mode` int(11) NOT NULL,
  `comm_tax` double NOT NULL,
  `comm_agent_lots` int(11) NOT NULL,
  `freemargin_mode` int(11) NOT NULL,
  `reserved` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `configrations_session`
--

CREATE TABLE IF NOT EXISTS `configrations_session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `quote` text COLLATE utf8_unicode_ci NOT NULL,
  `trade` text COLLATE utf8_unicode_ci NOT NULL,
  `quote_overnight` int(11) NOT NULL,
  `trade_overnight` int(11) NOT NULL,
  `reserved` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=330 ;

--
-- Dumping data for table `configrations_session`
--

INSERT INTO `configrations_session` (`id`, `symbol`, `quote`, `trade`, `quote_overnight`, `trade_overnight`, `reserved`, `created_at`, `updated_at`) VALUES
(1, 'USDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'USDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'USDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'USDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'USDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'USDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'USDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'GBPUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'GBPUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'GBPUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'GBPUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'GBPUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'GBPUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'GBPUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'EURUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'EURUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'EURUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'EURUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'EURUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'EURUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'EURUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'EURGBP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'EURGBP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'EURGBP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'EURGBP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'EURGBP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'EURGBP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'EURGBP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'USDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'USDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'USDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'USDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'USDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'USDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'USDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'USDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'USDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'USDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'USDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'USDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'USDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'USDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'NZDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'NZDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'NZDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'NZDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'NZDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'NZDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'NZDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'AUDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'AUDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'AUDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'AUDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'AUDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `configrations_session` (`id`, `symbol`, `quote`, `trade`, `quote_overnight`, `trade_overnight`, `reserved`, `created_at`, `updated_at`) VALUES
(55, 'AUDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'AUDUSD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'AUDNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'AUDNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'AUDNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'AUDNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'AUDNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'AUDNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'AUDNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'AUDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'AUDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'AUDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'AUDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'AUDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'AUDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'AUDCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'AUDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'AUDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'AUDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'AUDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'AUDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'AUDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'AUDCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'CHFJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'CHFJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'CHFJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'CHFJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'CHFJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'CHFJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'CHFJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'EURCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'EURCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'EURCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'EURCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'EURCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'EURCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'EURCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'EURJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'EURJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'EURJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'EURJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'EURJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'EURJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'EURJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'GBPCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'GBPCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'GBPCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'GBPCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'GBPCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'GBPCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'GBPCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'AUDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'AUDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'AUDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `configrations_session` (`id`, `symbol`, `quote`, `trade`, `quote_overnight`, `trade_overnight`, `reserved`, `created_at`, `updated_at`) VALUES
(109, 'AUDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'AUDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'AUDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'AUDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'GBPAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'GBPAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'GBPAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'GBPAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'GBPAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'GBPAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'GBPAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'GBPCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'GBPCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'GBPCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'GBPCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'GBPCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'GBPCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'GBPCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'EURAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'EURAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'EURAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'EURAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'EURAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'EURAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'EURAUD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'EURNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'EURNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'EURNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'EURNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'EURNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'EURNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'EURNZD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'GBPJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'GBPJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'GBPJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'GBPJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'GBPJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'GBPJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'GBPJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'CADCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'CADCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'CADCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'CADCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'CADCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'CADCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'CADCHF', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'EURCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'EURCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'EURCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'EURCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'EURCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'EURCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'EURCAD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'CADJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `configrations_session` (`id`, `symbol`, `quote`, `trade`, `quote_overnight`, `trade_overnight`, `reserved`, `created_at`, `updated_at`) VALUES
(163, 'CADJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'CADJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'CADJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'CADJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'CADJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'CADJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'NZDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'NZDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'NZDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'NZDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'NZDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'NZDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'NZDJPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, '_DJI', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, '_DJI', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, '_DJI', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, '_DJI', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, '_DJI', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, '_DJI', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, '_DJI', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, '_NQ100', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, '_NQ100', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, '_NQ100', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, '_NQ100', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, '_NQ100', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, '_NQ100', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, '_NQ100', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'GOLD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'GOLD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'GOLD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'GOLD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'GOLD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'GOLD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'GOLD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, '_NQCOMP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, '_NQCOMP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, '_NQCOMP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, '_NQCOMP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, '_NQCOMP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, '_NQCOMP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, '_NQCOMP', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, '_SP500', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, '_SP500', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, '_SP500', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, '_SP500', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, '_SP500', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, '_SP500', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, '_SP500', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, '#HPQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, '#HPQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, '#HPQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, '#HPQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, '#HPQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, '#HPQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `configrations_session` (`id`, `symbol`, `quote`, `trade`, `quote_overnight`, `trade_overnight`, `reserved`, `created_at`, `updated_at`) VALUES
(217, '#HPQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, '#IBM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, '#IBM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, '#IBM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, '#IBM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, '#IBM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, '#IBM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, '#IBM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, '#MSFT', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, '#MSFT', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, '#MSFT', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, '#MSFT', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, '#MSFT', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, '#MSFT', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, '#MSFT', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, '#QQQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, '#QQQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, '#QQQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, '#QQQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, '#QQQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, '#QQQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, '#QQQ', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, '#SPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, '#SPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, '#SPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, '#SPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, '#SPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, '#SPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, '#SPY', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, '#T', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, '#T', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, '#T', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, '#T', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, '#T', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, '#T', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, '#T', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, '#XOM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, '#XOM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, '#XOM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, '#XOM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, '#XOM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, '#XOM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, '#XOM', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, '#INTC', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, '#INTC', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, '#INTC', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, '#INTC', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, '#INTC', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, '#INTC', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, '#INTC', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:0;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:900;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:15;s:8:"open_min";i:30;s:10:"close_hour";i:22;s:9:"close_min";i:0;s:4:"open";i:930;s:5:"close";i:1320;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'USDJOD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'USDJOD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'USDJOD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'USDJOD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `configrations_session` (`id`, `symbol`, `quote`, `trade`, `quote_overnight`, `trade_overnight`, `reserved`, `created_at`, `updated_at`) VALUES
(271, 'USDJOD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'USDJOD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'USDJOD', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 'GOLD24', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 'GOLD24', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'GOLD24', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'GOLD24', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 'GOLD24', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 'GOLD24', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 'GOLD24', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 'GOLD18', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 'GOLD18', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 'GOLD18', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 'GOLD18', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'GOLD18', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 'GOLD18', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 'GOLD18', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 'GOLD21', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 'GOLD21', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 'GOLD21', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 'GOLD21', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 'GOLD21', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 'GOLD21', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 'GOLD21', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 'GOLD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'GOLD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 'GOLD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 'GOLD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'GOLD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 'GOLD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'GOLD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'SILVER', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'SILVER', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'SILVER', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'SILVER', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'SILVER', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 'SILVER', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1380;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'SILVER', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'GC1215', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 'GC1215', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'GC1215', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 'GC1215', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'GC1215', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:60;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'GC1215', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:30;s:4:"open";i:60;s:5:"close";i:1410;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:1;s:8:"open_min";i:0;s:10:"close_hour";i:23;s:9:"close_min";i:30;s:4:"open";i:60;s:5:"close";i:1410;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'GC1215', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'EURUSD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 'EURUSD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'EURUSD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'EURUSD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 'EURUSD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'EURUSD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'EURUSD_', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'EURUSD.', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 'EURUSD.', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `configrations_session` (`id`, `symbol`, `quote`, `trade`, `quote_overnight`, `trade_overnight`, `reserved`, `created_at`, `updated_at`) VALUES
(325, 'EURUSD.', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 'EURUSD.', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 'EURUSD.', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 'EURUSD.', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:24;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:1440;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 'EURUSD.', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', 'a:3:{i:0;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:1;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}i:2;O:8:"stdClass":6:{s:9:"open_hour";i:0;s:8:"open_min";i:0;s:10:"close_hour";i:0;s:9:"close_min";i:0;s:4:"open";i:0;s:5:"close";i:0;}}', -1, -1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `configrations_sessions`
--

CREATE TABLE IF NOT EXISTS `configrations_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `quote_trade` tinyint(4) NOT NULL,
  `open_hour` int(11) NOT NULL,
  `open_min` int(11) NOT NULL,
  `close_hour` int(11) NOT NULL,
  `close_min` int(11) NOT NULL,
  `open` int(11) NOT NULL,
  `close` int(11) NOT NULL,
  `align` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `configrations_symbols`
--

CREATE TABLE IF NOT EXISTS `configrations_symbols` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `securities_id` int(11) NOT NULL,
  `symbol` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `description` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `source` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `currency` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `digits` int(11) NOT NULL,
  `trade` int(11) NOT NULL,
  `background_color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `count_original` int(11) NOT NULL,
  `external_unused` int(11) NOT NULL,
  `realtime` int(11) NOT NULL,
  `starting` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expiration` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sessions` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `profit_mode` int(11) NOT NULL,
  `profit_reserved` int(11) NOT NULL,
  `filter` int(11) NOT NULL,
  `filter_counter` int(11) NOT NULL,
  `filter_limit` double NOT NULL,
  `filter_smoothing` int(11) NOT NULL,
  `filter_reserved` double(8,2) NOT NULL,
  `logging` int(11) NOT NULL,
  `spread` int(11) NOT NULL,
  `spread_balance` int(11) NOT NULL,
  `exemode` int(11) NOT NULL,
  `swap_enable` int(11) NOT NULL,
  `swap_type` int(11) NOT NULL,
  `swap_long` double NOT NULL,
  `swap_short` double NOT NULL,
  `swap_rollover3days` int(11) NOT NULL,
  `contract_size` double NOT NULL,
  `tick_value` double NOT NULL,
  `tick_size` double NOT NULL,
  `stops_level` int(11) NOT NULL,
  `gtc_pendings` int(11) NOT NULL,
  `margin_mode` int(11) NOT NULL,
  `margin_initial` double NOT NULL,
  `margin_maintenance` double NOT NULL,
  `margin_hedged` double NOT NULL,
  `margin_divider` double NOT NULL,
  `point` double NOT NULL,
  `multiply` double NOT NULL,
  `bid_tickvalue` double NOT NULL,
  `ask_tickvalue` double NOT NULL,
  `long_only` int(11) NOT NULL,
  `instant_max_volume` int(11) NOT NULL,
  `margin_currency` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `freeze_level` int(11) NOT NULL,
  `margin_hedged_strong` int(11) NOT NULL,
  `value_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `quotes_delay` int(11) NOT NULL,
  `swap_openprice` int(11) NOT NULL,
  `swap_variation_margin` int(11) NOT NULL,
  `unused` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `configrations_symbols`
--

INSERT INTO `configrations_symbols` (`id`, `name`, `securities_id`, `symbol`, `description`, `source`, `currency`, `type`, `digits`, `trade`, `background_color`, `count`, `count_original`, `external_unused`, `realtime`, `starting`, `expiration`, `sessions`, `profit_mode`, `profit_reserved`, `filter`, `filter_counter`, `filter_limit`, `filter_smoothing`, `filter_reserved`, `logging`, `spread`, `spread_balance`, `exemode`, `swap_enable`, `swap_type`, `swap_long`, `swap_short`, `swap_rollover3days`, `contract_size`, `tick_value`, `tick_size`, `stops_level`, `gtc_pendings`, `margin_mode`, `margin_initial`, `margin_maintenance`, `margin_hedged`, `margin_divider`, `point`, `multiply`, `bid_tickvalue`, `ask_tickvalue`, `long_only`, `instant_max_volume`, `margin_currency`, `freeze_level`, `margin_hedged_strong`, `value_date`, `quotes_delay`, `swap_openprice`, `swap_variation_margin`, `unused`) VALUES
(1, '', 0, 'USDCHF', 'US Dollar vs Swiss Franc', '', 'USD', 0, 4, 2, '', 40, 0, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 12, 2, 0.01, 0, 0.00, 0, 4, 0, 2, 1, 0, -0.000009, -0.000003, 3, 100000, 0, 0, 8, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(2, '', 0, 'GBPUSD', 'Great Britain Pound vs US Dollar', '', 'GBP', 0, 4, 2, '', 29, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 10, 2, 0.005, 0, 0.00, 0, 0, 0, 1, 1, 0, -0.000022, -0.000007, 3, 100000, 0, 0, 6, 1, 0, 0, 0, 0, 0.5, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(3, '', 0, 'EURUSD', 'Euro vs US Dollar', '', 'EUR', 0, 4, 2, '', 22, 2, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 8, 2, 0.01, 0, 0.00, 1, 0, 0, 1, 1, 0, 0.000004, 0.000012, 3, 100000, 0, 0, 4, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'EUR', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(4, '', 0, 'EURGBP', 'Euro vs Great Britain Pound', '', 'EUR', 0, 4, 2, '', 19, 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 3, 2, 0.01, 0, 0.00, 0, 2, 0, 1, 1, 0, 0.000007, 0.000017, 3, 100000, 0, 0, 4, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(5, '', 0, 'USDJPY', 'US Dollar vs Japanese Yen', '', 'USD', 0, 2, 2, '', 42, 4, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 12, 2, 0.01, 0, 0.00, 1, 4, 0, 2, 1, 0, -0.000932, -0.000179, 3, 100000, 0, 0, 6, 1, 0, 100000, 0, 0, 1, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(6, '', 0, 'USDCAD', 'US Dollar vs Canadian Dollar', '', 'USD', 0, 4, 2, '', 39, 5, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 12, 2, 0.01, 0, 0.00, 0, 4, 0, 2, 1, 0, 0.000016, 0.000039, 3, 100000, 0, 0, 8, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(7, '', 0, 'NZDUSD', 'New Zealand Dollar vs US Dollar', '', 'NZD', 0, 4, 2, '', 37, 6, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 12, 2, 0.01, 0, 0.00, 0, 4, 0, 2, 1, 0, -0.000112, -0.000048, 3, 100000, 0, 0, 8, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(8, '', 0, 'AUDUSD', 'Australian Dollar vs US Dollar', '', 'AUD', 0, 4, 2, '', 12, 7, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 10, 2, 0.01, 0, 0.00, 0, 4, 0, 1, 1, 0, -0.000093, -0.00004, 3, 100000, 0, 0, 6, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(9, '', 0, 'AUDNZD', 'Australian Dollar vs New Zealand Dollar', '', 'AUD', 0, 4, 2, '', 11, 8, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 40, 2, 0.01, 0, 0.00, 0, 12, 0, 1, 1, 0, 0.000012, 0.000048, 3, 100000, 0, 0, 24, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(10, '', 0, 'AUDCHF', 'Australian Dollar vs Swiss Franc', '', 'AUD', 0, 4, 2, '', 9, 9, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 30, 2, 0.01, 0, 0.00, 0, 8, 0, 1, 1, 0, -0.000095, -0.000041, 3, 100000, 0, 0, 16, 1, 0, 100000, 0, 100000, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(11, '', 0, 'AUDCAD', 'Australian Dollar vs Canadian Dollar', '', 'AUD', 0, 4, 2, '', 8, 10, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 40, 2, 0.01, 0, 0.00, 0, 10, 0, 1, 1, 0, -0.000095, -0.000041, 3, 100000, 0, 0, 20, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(12, '', 0, 'CHFJPY', 'Swiss Frank vs Japanese Yen', '', 'CHF', 0, 2, 2, '', 15, 11, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 12, 2, 0.01, 0, 0.00, 0, 4, 0, 1, 1, 0, 0.000064, 0.000431, 3, 100000, 0, 0, 8, 1, 0, 100000, 0, 0, 1, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(13, '', 0, 'EURCHF', 'Euro vs Swiss Franc', '', 'EUR', 0, 4, 2, '', 18, 12, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 10, 2, 0.005, 0, 0.00, 0, 3, 0, 1, 1, 0, -0.000002, 0.000002, 3, 100000, 0, 0, 6, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(14, '', 0, 'EURJPY', 'Euro vs Japanese Yen', '', 'EUR', 0, 2, 2, '', 20, 13, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 10, 2, 0.005, 0, 0.00, 0, 3, 0, 1, 1, 0, 0.000046, 0.000535, 3, 100000, 0, 0, 6, 1, 0, 100000, 0, 0, 1, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(15, '', 0, 'GBPCHF', 'Great Britain Pound vs Swiss Franc', '', 'GBP', 0, 4, 2, '', 27, 14, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 25, 2, 0.1, 0, 0.00, 0, 7, 0, 1, 1, 0, -0.000033, -0.000013, 3, 100000, 0, 0, 14, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(16, '', 0, 'AUDJPY', 'Australian Dollar vs Japanese Yen', '', 'AUD', 0, 2, 2, '', 10, 15, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 25, 2, 0.01, 0, 0.00, 0, 6, 0, 1, 1, 0, -0.010494, -0.004526, 3, 100000, 0, 0, 12, 1, 0, 100000, 0, 0, 1, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(17, '', 0, 'GBPAUD', 'Great Britain Pound vs Swiss Franc', '', 'GBP', 0, 4, 2, '', 25, 16, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 25, 2, 0.1, 0, 0.00, 0, 7, 0, 1, 1, 0, 0.000066, 0.000154, 3, 100000, 0, 0, 14, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(18, '', 0, 'GBPCAD', 'Great Britain Pound vs Swiss Franc', '', 'GBP', 0, 4, 2, '', 26, 17, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 25, 2, 0.1, 0, 0.00, 0, 7, 0, 1, 1, 0, 0.000016, 0.00005, 3, 100000, 0, 0, 14, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(19, '', 0, 'EURAUD', 'Euro vs Australian Dollar', '', 'EUR', 0, 4, 2, '', 16, 18, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 40, 2, 0.01, 0, 0.00, 0, 10, 0, 1, 1, 0, 0.000065, 0.00015, 3, 100000, 0, 0, 20, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(20, '', 0, 'EURNZD', 'Euro vs New Zealand Dollar', '', 'EUR', 0, 4, 2, '', 21, 19, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 50, 2, 0.01, 0, 0.00, 0, 12, 0, 1, 1, 0, 0.000097, 0.000224, 3, 100000, 0, 0, 24, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(21, '', 0, 'GBPJPY', 'Great Britain Pound vs Japanese Yen', '', 'GBP', 0, 2, 2, '', 28, 20, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 24, 2, 0.005, 0, 0.00, 0, 7, 0, 1, 1, 0, -0.003555, -0.001127, 3, 100000, 0, 0, 14, 1, 0, 100000, 0, 0, 1, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(22, '', 0, 'CADCHF', 'Canadian Dollar vs Swiss Franc', '', 'CAD', 0, 4, 2, '', 13, 21, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 25, 2, 0.01, 0, 0.00, 0, 8, 0, 1, 1, 0, -0.000043, -0.000014, 3, 100000, 0, 0, 16, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(23, '', 0, 'EURCAD', 'Euro vs Canadian Dollar', '', 'EUR', 0, 4, 2, '', 17, 22, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 30, 2, 0.01, 0, 0.00, 0, 8, 0, 1, 1, 0, 0.000027, 0.000027, 3, 100000, 0, 0, 16, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(24, '', 0, 'CADJPY', 'Canadian Dollar vs Japanese Yen', '', 'CAD', 0, 2, 2, '', 14, 23, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 20, 2, 0.01, 0, 0.00, 0, 6, 0, 1, 1, 0, -0.004658, -0.004658, 3, 100000, 0, 0, 12, 1, 0, 100000, 0, 0, 1, 0.01, 100, 0, 0, 0, 0, 'CAD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(25, '', 0, 'NZDJPY', 'New Zealand Dollar vs Japanese Yen', '', 'NZD', 0, 2, 0, '', 36, 24, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 25, 2, 0.01, 0, 0.00, 0, 8, 0, 1, 1, 0, -0.012363, -0.012363, 3, 100000, 0, 0, 16, 1, 0, 100000, 0, 0, 1, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(26, '', 0, '_DJI', '', '', '_DJ', 1, 1, 0, '', 43, 25, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 20, 1, 0.1, 0, 0.00, 0, 0, 0, 2, 1, 0, 0.175, 0.475, 3, 100000, 0, 0, 5, 1, 0, 0, 0, 100000, 1, 0.1, 10, 0, 0, 0, 0, '_DJ', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(27, '', 0, '_NQ100', '', '', '_NQ', 1, 2, 0, '', 44, 26, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 20, 1, 0.1, 0, 0.00, 0, 0, 0, 1, 1, 0, 0.175, 0.475, 3, 100000, 0, 0, 5, 1, 0, 0, 0, 100000, 1, 0.01, 100, 0, 0, 0, 0, '_NQ', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(28, '', 0, 'GOLD', '', '', 'USD', 0, 2, 2, '', 31, 27, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 10000, 1, 0, 0, 0.00, 0, 100, 0, 0, 1, 2, -3.5, 1.5, 3, 100, 0, 0.1, 400, 1, 1, 100000, 0, 0, 100, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(29, '', 0, '_NQCOMP', '', '', 'USD', 1, 1, 0, '', 45, 28, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 20, 1, 0.1, 0, 0.00, 0, 0, 0, 1, 1, 0, 0.175, 0.475, 3, 100000, 0, 0, 5, 1, 0, 0, 0, 100000, 1, 0.1, 10, 0, 0, 0, 0, '_NQ', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(30, '', 0, '_SP500', '', '', '_SP', 1, 2, 0, '', 46, 29, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 100, 1, 0.1, 0, 0.00, 0, 0, 0, 1, 1, 0, 0.175, 0.475, 3, 100000, 0, 0, 5, 1, 0, 0, 0, 100000, 1, 0.01, 100, 0, 0, 0, 0, '_SP', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(31, '', 0, '#HPQ', 'CFD HEWLETT-PACKARD', '', 'USD', 2, 2, 2, '', 0, 30, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 25, 3, 0.1, 0, 0.00, 0, 2, 0, 0, 1, 2, -3, 1, 3, 100, 0, 0, 8, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(32, '', 0, '#IBM', 'CFD IBM', '', 'USD', 2, 2, 2, '', 1, 31, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 60, 3, 0.1, 0, 0.00, 0, 4, 0, 0, 1, 2, -3, 1, 3, 100, 0, 0, 10, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(33, '', 0, '#MSFT', 'CFD MICROSOFT CORP', '', 'USD', 2, 2, 2, '', 3, 32, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 14, 3, 0.1, 0, 0.00, 0, 2, 0, 0, 1, 2, -3, 1, 3, 100, 0, 0, 18, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(34, '', 0, '#QQQ', 'CFD Nasdaq-100 Index Tracking Stock', '', 'USD', 2, 2, 2, '', 4, 33, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 60, 3, 0.1, 0, 0.00, 0, 5, 0, 0, 1, 2, -3, 1, 3, 100, 0, 0, 20, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(35, '', 0, '#SPY', 'CFD Standard & Poor''s Depositary Receipts', '', 'USD', 2, 2, 2, '', 5, 34, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 60, 3, 0.1, 0, 0.00, 0, 5, 0, 0, 1, 2, -3, 1, 3, 100, 0, 0, 20, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(36, '', 0, '#T', 'CFD AT&T CORP', '', 'USD', 2, 2, 2, '', 6, 35, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 30, 3, 0.1, 0, 0.00, 0, 2, 0, 0, 1, 2, -3, 1, 3, 100, 0, 0, 20, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(37, '', 0, '#XOM', 'CFD EXXON MOBIL CORP', '', 'USD', 2, 2, 2, '', 7, 36, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 30, 3, 0.1, 0, 0.00, 0, 3, 0, 2, 1, 2, -3, 1, 3, 100, 0, 0, 20, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(38, '', 0, '#INTC', 'CFD INTEL CORP', '', 'USD', 2, 2, 2, '', 2, 37, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 25, 3, 0.1, 0, 0.00, 0, 3, 0, 0, 1, 2, -3, 1, 3, 100, 0, 0, 20, 0, 1, 0, 0, 100, 10, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(39, '', 0, 'USDJOD', 'US Dollar vs Swiss Franc', '', 'USD', 0, 4, 2, '', 41, 38, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 12, 2, 0.01, 0, 0.00, 0, 4, 0, 1, 1, 0, 0.68, -1.06, 3, 100000, 0, 0, 8, 1, 0, 100000, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, 'USD', 0, 1, '0000-00-00 00:00:00', 0, 0, 0, 0),
(40, '', 0, 'GOLD24', '', '', 'USD', 0, 3, 2, '', 34, 39, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 10000, 1, 0, 0, 0.00, 0, 100, 0, 0, 1, 2, -3.5, 1.5, 3, 100, 0, 0.001, 400, 1, 1, 100000, 0, 0, 100, 0.001, 1000, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(41, '', 0, 'GOLD18', '', '', 'USD', 0, 3, 2, '', 32, 40, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 10000, 1, 0, 0, 0.00, 0, 100, 0, 0, 1, 2, -3.5, 1.5, 3, 100, 0, 0.001, 400, 1, 1, 100000, 0, 0, 100, 0.001, 1000, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(42, '', 0, 'GOLD21', '', '', 'USD', 0, 3, 2, '', 33, 41, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 10000, 1, 0, 0, 0.00, 0, 100, 0, 0, 1, 2, -3.5, 1.5, 3, 100, 0, 0.001, 400, 1, 1, 100000, 0, 0, 100, 0.001, 1000, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(43, '', 0, 'GOLD_', '', '', 'USD', 0, 2, 2, '', 35, 42, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 10000, 1, 0, 0, 0.00, 0, 100, 0, 0, 1, 2, -3.5, 1.5, 3, 100, 0, 0.1, 400, 1, 1, 100000, 0, 0, 100, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(44, '', 0, 'SILVER', '', '', 'USD', 0, 2, 2, '', 38, 43, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, 10000, 1, 0, 0, 0.00, 0, 100, 0, 0, 1, 2, -3.5, 1.5, 3, 500, 0, 0.01, 400, 1, 1, 100000, 0, 0, 100, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(45, '', 0, 'GC1215', 'Gold December 2015  CFD (1 Lot =100 oz)', '', 'USD', 1, 2, 2, '', 30, 44, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 2, 0, 350, 1, 0.01, 0, 0.00, 1, 0, 0, 2, 0, 0, 0, 0, 3, 100, 10, 0.1, 0, 1, 0, 180000, 180000, 0, 1, 0.01, 100, 0, 0, 0, 0, 'USD', 0, 0, '0000-00-00 00:00:00', 8, 0, 0, 0),
(46, '', 0, 'EURUSD_', 'Euro vs US Dollar', 'EURUSD', 'USD', 0, 4, 2, '', 24, 45, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 20, 3, 0.1, 0, 0.00, 0, 5, 0, 0, 1, 0, 0, 0, 3, 100000, 0, 0, 10, 1, 0, 0, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(47, '', 0, 'EURUSD.', 'Euro vs US Dollar', 'EURUSD', 'USD', 0, 4, 2, '', 23, 46, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 20, 3, 0.1, 0, 0.00, 0, 5, 0, 0, 1, 0, 0, 0, 3, 100000, 0, 0, 10, 1, 0, 0, 0, 0, 1, 0.0001, 10000, 0, 0, 0, 0, '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `configrations_symbol_group`
--

CREATE TABLE IF NOT EXISTS `configrations_symbol_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` tinyint(4) NOT NULL,
  `name` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `description` char(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `configrations_symbol_group`
--

INSERT INTO `configrations_symbol_group` (`id`, `position`, `name`, `description`) VALUES
(1, 0, 'Forex', 'Foreign Exchange'),
(2, 1, 'Indexes', 'Indexes'),
(3, 2, 'CFD', 'Contract For Difference'),
(4, 3, 'Futures', 'Futures'),
(5, 4, '', ''),
(6, 5, '', ''),
(7, 6, '', ''),
(8, 7, '', ''),
(9, 8, '', ''),
(10, 9, '', ''),
(11, 10, '', ''),
(12, 11, '', ''),
(13, 12, '', ''),
(14, 13, '', ''),
(15, 14, '', ''),
(16, 15, '', ''),
(17, 16, '', ''),
(18, 17, '', ''),
(19, 18, '', ''),
(20, 19, '', ''),
(21, 20, '', ''),
(22, 21, '', ''),
(23, 22, '', ''),
(24, 23, '', ''),
(25, 24, '', ''),
(26, 25, '', ''),
(27, 26, '', ''),
(28, 27, '', ''),
(29, 28, '', ''),
(30, 29, '', ''),
(31, 30, '', ''),
(32, 31, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ibportal_agents_commission`
--

CREATE TABLE IF NOT EXISTS `ibportal_agents_commission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rebate` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `id_mt4_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `rebate_agent` double NOT NULL,
  `rebate_usd` double NOT NULL,
  `commission_agent` double NOT NULL,
  `commission_usd` double NOT NULL,
  `conversion_rate` double NOT NULL,
  `conversion_usd` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ibportal_agents_commission`
--

INSERT INTO `ibportal_agents_commission` (`id`, `id_rebate`, `ticket`, `id_mt4_user`, `id_user`, `plan_id`, `agent_id`, `rebate_agent`, `rebate_usd`, `commission_agent`, `commission_usd`, `conversion_rate`, `conversion_usd`, `created_at`, `updated_at`) VALUES
(1, 1, 6125808, 100, 1, 1, 1, 1, 4, 99, 34, 34, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 6125808, 200, 1, 1, 1, 1, 4, 99, 34, 34, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ibportal_agent_user`
--

CREATE TABLE IF NOT EXISTS `ibportal_agent_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ibportal_agent_user`
--

INSERT INTO `ibportal_agent_user` (`id`, `agent_id`, `user_id`, `plan_id`, `created_at`, `updated_at`) VALUES
(1, 314, 315, 0, '2016-02-02 04:19:52', '2016-02-02 04:19:52'),
(2, 315, 316, 0, '2016-02-02 04:26:29', '2016-02-02 04:26:29'),
(4, 0, 314, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 315, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 316, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 314, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 315, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 316, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 0, 314, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 0, 315, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 0, 316, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 316, 314, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 316, 315, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 316, 316, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 316, 241, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 316, 304, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 316, 305, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 316, 311, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 316, 313, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 316, 317, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ibportal_aliases`
--

CREATE TABLE IF NOT EXISTS `ibportal_aliases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `operand` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=108 ;

--
-- Dumping data for table `ibportal_aliases`
--

INSERT INTO `ibportal_aliases` (`id`, `alias`, `operand`, `value`, `created_at`, `updated_at`) VALUES
(61, 'USDCHF', 'Equals', 'USDCHF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'GBPUSD', 'Equals', 'GBPUSD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'EURUSD', 'Equals', 'EURUSD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'EURGBP', 'Equals', 'EURGBP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'USDJPY', 'Equals', 'USDJPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'USDCAD', 'Equals', 'USDCAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'NZDUSD', 'Equals', 'NZDUSD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'AUDUSD', 'Equals', 'AUDUSD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'AUDNZD', 'Equals', 'AUDNZD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'AUDCHF', 'Equals', 'AUDCHF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'AUDCAD', 'Equals', 'AUDCAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'CHFJPY', 'Equals', 'CHFJPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'EURCHF', 'Equals', 'EURCHF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'EURJPY', 'Equals', 'EURJPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'GBPCHF', 'Equals', 'GBPCHF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'AUDJPY', 'Equals', 'AUDJPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'GBPAUD', 'Equals', 'GBPAUD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'GBPCAD', 'Equals', 'GBPCAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'EURAUD', 'Equals', 'EURAUD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'EURNZD', 'Equals', 'EURNZD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'GBPJPY', 'Equals', 'GBPJPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'CADCHF', 'Equals', 'CADCHF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'EURCAD', 'Equals', 'EURCAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'CADJPY', 'Equals', 'CADJPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'NZDJPY', 'Equals', 'NZDJPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '_DJI', 'Equals', '_DJI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '_NQ100', 'Equals', '_NQ100', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'GOLD', 'Equals', 'GOLD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '_NQCOMP', 'Equals', '_NQCOMP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '_SP500', 'Equals', '_SP500', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '#HPQ', 'Equals', '#HPQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '#IBM', 'Equals', '#IBM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '#MSFT', 'Equals', '#MSFT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '#QQQ', 'Equals', '#QQQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '#SPY', 'Equals', '#SPY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '#T', 'Equals', '#T', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '#XOM', 'Equals', '#XOM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '#INTC', 'Equals', '#INTC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'USDJOD', 'Equals', 'USDJOD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'GOLD24', 'Equals', 'GOLD24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'GOLD18', 'Equals', 'GOLD18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'GOLD21', 'Equals', 'GOLD21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'GOLD_', 'Equals', 'GOLD_', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'SILVER', 'Equals', 'SILVER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'GC1215', 'Equals', 'GC1215', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'EURUSD_', 'Equals', 'EURUSD_', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'EURUSD.', 'Equals', 'EURUSD.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ibportal_plan`
--

CREATE TABLE IF NOT EXISTS `ibportal_plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `ibportal_plan`
--

INSERT INTO `ibportal_plan` (`id`, `name`, `type`, `created_at`, `updated_at`, `public`) VALUES
(4, 'mohammad', 'mohammad', '2016-01-30 09:51:06', '2016-01-30 09:51:06', 0),
(5, 'lk', 'lk', '2016-01-30 10:41:18', '2016-01-30 10:41:18', 0),
(6, '54', 'Commission', '2016-01-30 10:42:45', '2016-01-30 10:42:45', 0),
(7, 'oko', 'Commission', '2016-01-30 10:44:04', '2016-01-30 10:44:04', 0),
(8, 'lp', 'Rebate', '2016-01-30 10:46:22', '2016-01-30 10:46:22', 0),
(10, 'ddddddddddd', 'Commission', '2016-01-31 08:09:08', '2016-01-31 08:09:08', 0),
(11, 'ttttt', 'Rebate', '2016-01-31 09:43:19', '2016-01-31 09:43:19', 0),
(12, 'sdfsdf', 'Commission', '2016-01-31 10:25:03', '2016-01-31 10:25:03', 0),
(13, 'jhgj', 'Commission', '2016-01-31 10:25:52', '2016-01-31 10:25:52', 0),
(14, 'jhgj', 'Commission', '2016-01-31 10:27:13', '2016-01-31 10:27:13', 1),
(15, 'fghfgh', 'Commission', '2016-01-31 10:29:23', '2016-01-31 10:29:23', 1),
(16, 'ghjfgh', 'Rebate', '2016-01-31 10:31:05', '2016-01-31 10:31:05', 1),
(17, 'et', 'Commission', '2016-02-01 09:11:42', '2016-02-01 09:11:42', 1),
(18, 'et', 'Commission', '2016-02-01 09:11:52', '2016-02-01 09:11:52', 1),
(19, 'et', 'Commission', '2016-02-01 09:13:28', '2016-02-01 09:13:28', 1),
(20, 'et test edit', 'Rebate', '2016-02-01 10:02:36', '2016-02-17 05:23:20', 0),
(21, 'sdfsdf', 'Commission', '2016-02-17 07:58:06', '2016-02-17 07:58:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ibportal_plan_aliases`
--

CREATE TABLE IF NOT EXISTS `ibportal_plan_aliases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `alias_id` int(11) NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ibportal_plan_aliases`
--

INSERT INTO `ibportal_plan_aliases` (`id`, `plan_id`, `alias_id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 10, 100, '100', 5, '2016-01-30 09:49:32', '2016-01-30 09:49:32'),
(2, 10, 150, '100', 5, '2016-01-30 09:49:32', '2016-01-30 09:49:32'),
(3, 3, 50, '100', 5, '2016-01-30 09:49:32', '2016-01-30 09:49:32'),
(4, 4, 50, '50', 5, '2016-01-30 09:51:06', '2016-01-30 09:51:06'),
(5, 4, 100, '50', 5, '2016-01-30 09:51:06', '2016-01-30 09:51:06'),
(6, 4, 150, '50', 666, '2016-01-30 09:51:06', '2016-01-30 09:51:06'),
(7, 5, 1, 'Point', 45, '2016-01-30 10:41:18', '2016-01-30 10:41:18'),
(8, 10, 2, 'Point', 45, '2016-01-30 10:41:18', '2016-01-30 10:41:18'),
(9, 5, 3, 'Point', 45, '2016-01-30 10:41:18', '2016-01-30 10:41:18'),
(10, 10, 6, 'Point', 45, '2016-01-30 10:41:18', '2016-01-30 10:41:18'),
(11, 6, 3, 'Money', 8, '2016-01-30 10:42:45', '2016-01-30 10:42:45'),
(12, 7, 3, 'Money', 54, '2016-01-30 10:44:04', '2016-01-30 10:44:04'),
(13, 8, 3, 'Point', 8, '2016-01-30 10:46:22', '2016-01-30 10:46:22'),
(14, 9, 1, 'Point', 999, '2016-01-30 10:53:43', '2016-01-30 10:53:43'),
(15, 9, 5, 'Point', 999, '2016-01-30 10:53:43', '2016-01-30 10:53:43'),
(16, 9, 6, 'Point', 999, '2016-01-30 10:53:43', '2016-01-30 10:53:43'),
(17, 9, 2, 'Point', 999, '2016-01-30 10:53:43', '2016-01-30 10:53:43'),
(18, 9, 4, 'Point', 999, '2016-01-30 10:53:43', '2016-01-30 10:53:43'),
(19, 10, 12, 'Money', 0, '2016-01-31 08:09:08', '2016-01-31 08:09:08'),
(20, 11, 2, 'Money', 534, '2016-01-31 09:43:19', '2016-01-31 09:43:19'),
(21, 11, 8, 'Money', 534, '2016-01-31 09:43:19', '2016-01-31 09:43:19'),
(22, 11, 5, 'Point', 534, '2016-01-31 09:43:19', '2016-01-31 09:43:19'),
(23, 17, 4, 'Percentage', 0, '2016-02-01 09:11:42', '2016-02-01 09:11:42'),
(24, 20, 61, 'Percentage', 4, '2016-02-17 05:23:20', '2016-02-17 05:23:20'),
(25, 20, 62, 'Percentage', 4, '2016-02-17 05:23:20', '2016-02-17 05:23:20'),
(26, 20, 64, 'Percentage', 4, '2016-02-17 05:23:20', '2016-02-17 05:23:20'),
(27, 20, 66, 'Percentage', 4, '2016-02-17 05:23:20', '2016-02-17 05:23:20'),
(28, 20, 96, 'Percentage', 4, '2016-02-17 05:23:20', '2016-02-17 05:23:20'),
(29, 21, 63, 'Money', 0, '2016-02-17 07:58:06', '2016-02-17 07:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `ibportal_plan_users`
--

CREATE TABLE IF NOT EXISTS `ibportal_plan_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=96 ;

--
-- Dumping data for table `ibportal_plan_users`
--

INSERT INTO `ibportal_plan_users` (`id`, `plan_id`, `user_id`, `created_at`, `updated_at`) VALUES
(68, 14, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 15, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 16, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 17, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 18, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 20, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 14, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 15, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 16, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 17, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 18, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 19, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 20, 314, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 14, 315, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 15, 315, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 16, 315, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 17, 315, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 18, 315, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 19, 315, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 20, 315, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 14, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 15, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 16, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 17, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 18, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 19, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 20, 316, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ibportal_user_ibid`
--

CREATE TABLE IF NOT EXISTS `ibportal_user_ibid` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_ibid` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=317 ;

--
-- Dumping data for table `ibportal_user_ibid`
--

INSERT INTO `ibportal_user_ibid` (`user_id`, `user_ibid`, `created_at`, `updated_at`) VALUES
(314, '$2y$10$tzcqErafUkmxrGVuXkdnRuUa5rD6q8yMZ5pRRGuit2KlAc1DONpZm', '2016-02-02 04:17:51', '2016-02-02 04:17:51'),
(315, '$2y$10$zl1oVQr6swNQNh0Gq07av.3BVhwbxrhCVmrB2XMsnjkPUJNG6qr32', '2016-02-02 04:25:34', '2016-02-02 04:25:34'),
(316, '$2y$10$sG0mrDn0GQ37sn66oUuci.uMq81B.POQgmz4d3n6LrHcp1P7ygyEe', '2016-02-02 04:27:24', '2016-02-02 04:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_07_02_230147_migration_cartalyst_sentinel', 1),
('2015_05_23_125344_users_add_avatar', 1),
('2015_08_04_142439_create_cms_menus_translate_table', 2),
('2014_10_08_114228_migration_cartalyst_sentinel_social', 5),
('2015_11_01_112411_create_users_details_table', 7),
('2015_11_29_120328_create_tools_future_contract_table', 8),
('2015_07_24_105449_create_cms_pages_table', 9),
('2015_07_24_105629_create_cms_menus_table', 9),
('2015_07_24_111130_create_cms_pages_modules_table', 9),
('2015_07_24_111312_create_cms_modules_table', 9),
('2015_07_24_111409_create_cms_contents_table', 9),
('2015_07_24_111525_create_cms_pages_contents_table', 9),
('2015_07_24_112526_create_cms_menus_items_table', 9),
('2015_08_03_124230_create_cms_articles_table', 9),
('2015_08_04_134253_create_cms_pages_contents_pages_table', 9),
('2015_08_04_142351_create_cms_languages_table', 9),
('2015_08_23_130021_create_cms_customHtml_table', 9),
('2015_09_02_135251_create_cms_menus_languages_table', 9),
('2015_09_03_080904_create_cms_menus_items_languages_table', 9),
('2015_09_03_104033_create_cms_articles_languages_table', 9),
('2015_09_03_104033_create_cms_customHtml_languages_table', 9),
('2015_10_14_124151_create_mt4_users_users_table', 10),
('2016_01_18_084854_create_symbols_table', 11),
('2016_01_18_085039_create_holiday_table', 11),
('2016_01_18_085544_create_securities_table', 11),
('2016_01_18_084854_create_tools_symbols_table', 12),
('2016_01_18_085039_create_tools_holiday_table', 12),
('2016_01_18_085544_create_tools_securities_table', 12),
('2016_01_18_085654_create_tools_holiday_symbols_table', 13),
('2016_01_24_121449_create_configrations_groups_table', 14),
('2016_01_24_121625_create_configrations_symbols_table', 14),
('2016_01_24_123404_create_configrations_groups_securities_table', 14),
('2016_01_24_124841_create_configrations_groups_margin_table', 14),
('2016_01_24_125340_create_configrations_symbol_group_table', 14),
('2016_01_28_111852_create_ibportal_plan_table', 15),
('2016_01_28_112025_create_ibportal_aliases_table', 15),
('2016_01_28_112102_create_ibportal_plan_aliases_table', 15),
('2016_01_31_141103_create_ibportal_plan_users_table', 16),
('2016_02_01_131516_create_ibportal_user_ibid_table', 17),
('2016_02_01_140642_create_ibportal_agent_user_table', 18),
('2016_02_07_105754_create_ibportal_agents_commission_table', 19),
('2016_02_14_142918_create_configrations_session_table', 20),
('2016_02_14_143034_create_configrations_sessions_table', 20),
('2016_02_14_143133_create_configrations_group_sec_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_agents_permissions`
--

CREATE TABLE IF NOT EXISTS `mt4_agents_permissions` (
  `login` int(11) NOT NULL,
  `allowed` tinyint(1) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_agents_permissions`
--

INSERT INTO `mt4_agents_permissions` (`login`, `allowed`, `permissions`) VALUES
(1000, 0, 'accounts=true\nreports=accountant,agent_commission,commission,orders_summary,'),
(2000, 0, 'reports=');

-- --------------------------------------------------------

--
-- Table structure for table `mt4_commission`
--

CREATE TABLE IF NOT EXISTS `mt4_commission` (
  `ticket` int(11) NOT NULL,
  `commission` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt4_commission`
--

INSERT INTO `mt4_commission` (`ticket`, `commission`) VALUES
(1, 1),
(1, 1),
(0, 1),
(0, 1),
(6062928, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_config`
--

CREATE TABLE IF NOT EXISTS `mt4_config` (
  `CONFIG` int(11) NOT NULL,
  `VALUE_INT` int(11) DEFAULT NULL,
  `VALUE_STR` char(255) DEFAULT NULL,
  PRIMARY KEY (`CONFIG`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_config`
--

INSERT INTO `mt4_config` (`CONFIG`, `VALUE_INT`, `VALUE_STR`) VALUES
(1000, 670, NULL),
(0, 0, NULL),
(1, 1434018411, NULL),
(2, 0, NULL),
(3, NULL, ',*,'),
(4, NULL, '127.0.0.1:4433'),
(5, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_contest`
--

CREATE TABLE IF NOT EXISTS `mt4_contest` (
  `login` int(11) NOT NULL,
  `performance` double NOT NULL DEFAULT '0',
  `week` int(11) NOT NULL DEFAULT '0',
  `month` int(11) NOT NULL DEFAULT '0',
  `trades` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `login` (`login`,`week`,`month`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt4_contest`
--

INSERT INTO `mt4_contest` (`login`, `performance`, `week`, `month`, `trades`) VALUES
(12394601, 0, 0, 0, 0),
(12394600, 0, 0, 0, 0),
(12394599, 0, 0, 0, 0),
(12394598, 0, 0, 0, 0),
(12394597, 0, 0, 0, 0),
(12394596, 0, 0, 0, 0),
(12394595, 0, 0, 0, 0),
(12394594, 0, 0, 0, 0),
(12394593, 0, 0, 0, 0),
(12394592, 0, 0, 0, 0),
(12394591, 0, 0, 0, 0),
(12394590, 0, 0, 0, 0),
(12394589, 0, 0, 0, 0),
(5001, -1.34203, 1373144400, 0, 1),
(12394588, 0, 0, 0, 0),
(12394587, 0, 0, 0, 0),
(12394586, 0, 0, 0, 0),
(12394585, 0, 0, 0, 0),
(12394584, 0, 0, 0, 0),
(12394583, 0, 0, 0, 0),
(12394582, 0, 0, 0, 0),
(12394477, -46.0502, 1373144400, 0, 36),
(12394581, 0, 0, 0, 0),
(12394580, 0, 0, 0, 0),
(12394579, 0, 0, 0, 0),
(12394578, 0, 0, 0, 0),
(12394577, 0, 0, 0, 0),
(12394575, 0, 0, 0, 0),
(12394574, 0, 0, 0, 0),
(12394570, -0.004594, 0, 0, 14),
(12394557, 0, 0, 0, 0),
(12394556, -73, 0, 0, 1),
(12394555, -85.5, 0, 0, 2),
(12394554, 0, 0, 0, 0),
(12394553, -107.903, 0, 0, 3),
(12394549, -0.2498, 0, 0, 1),
(12394547, 0, 0, 0, 0),
(12394546, 0, 0, 0, 0),
(12394543, 0, 0, 0, 0),
(12394534, 0, 0, 0, 0),
(12394533, 0, 0, 0, 0),
(12394532, 0, 0, 0, 0),
(12394491, 0, 0, 0, 0),
(12394490, 0, 0, 0, 0),
(12394489, 0, 0, 0, 0),
(12394488, 0, 0, 0, 0),
(12394487, 0, 0, 0, 0),
(12394486, 0, 0, 0, 0),
(12394485, -149.121, 0, 0, 1),
(12394484, 0, 0, 0, 0),
(12394483, 0, 0, 0, 0),
(12394482, 0, 0, 0, 0),
(12394481, 0, 0, 0, 0),
(12394480, -0.12, 0, 0, 1),
(12394479, 0, 0, 0, 0),
(12394478, 0, 0, 0, 0),
(12394477, -46.0502, 0, 0, 36),
(12394476, 0, 0, 0, 0),
(7002, 0, 0, 0, 0),
(7001, -0.24951, 0, 0, 7),
(7000, -1.24773, 0, 1372626000, 5),
(7000, 701.154, 0, 0, 87),
(6000, -136.933, 0, 0, 25),
(5001, 21.5594, 0, 1372626000, 90),
(5001, -5.40852, 1373749200, 0, 12),
(5001, 17.5832, 0, 0, 93),
(5000, -0.465825, 0, 0, 4),
(4003, 0, 0, 0, 0),
(4002, 0, 0, 0, 0),
(4001, 0, 0, 0, 0),
(4000, 0, 0, 0, 0),
(2003, -119.393, 0, 0, 7),
(2001, -501.256, 0, 0, 4),
(2000, 8052.1, 0, 0, 1),
(1000, 328201, 0, 0, 609),
(100, -213.71, 0, 0, 1),
(1, 0, 0, 0, 0),
(5001, -1.34203, 1372572000, 0, 1),
(12394477, 100, 1372572000, 0, 36),
(5000, 12, 1372572000, 0, 121),
(5000, 12, 1373144400, 0, 121),
(12394602, 0, 0, 0, 0),
(12394603, 0, 0, 0, 0),
(12394604, 0, 0, 0, 0),
(12394605, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_daily`
--

CREATE TABLE IF NOT EXISTS `mt4_daily` (
  `LOGIN` int(11) NOT NULL,
  `TIME` datetime NOT NULL,
  `GROUP` char(16) NOT NULL,
  `BANK` char(64) NOT NULL,
  `BALANCE_PREV` double NOT NULL,
  `BALANCE` double NOT NULL,
  `DEPOSIT` double NOT NULL,
  `CREDIT` double NOT NULL,
  `PROFIT_CLOSED` double NOT NULL,
  `PROFIT` double NOT NULL,
  `EQUITY` double NOT NULL,
  `MARGIN` double NOT NULL,
  `MARGIN_FREE` double NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  PRIMARY KEY (`LOGIN`,`TIME`),
  KEY `INDEX_LOGIN` (`LOGIN`),
  KEY `INDEX_TIME` (`TIME`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mt4_group`
--

CREATE TABLE IF NOT EXISTS `mt4_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(17) NOT NULL,
  `currency` varchar(6) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `trade` tinyint(1) NOT NULL DEFAULT '1',
  `report` tinyint(1) NOT NULL DEFAULT '1',
  `company` varchar(128) NOT NULL,
  PRIMARY KEY (`gid`),
  UNIQUE KEY `group` (`group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7515 ;

--
-- Dumping data for table `mt4_group`
--

INSERT INTO `mt4_group` (`gid`, `group`, `currency`, `active`, `trade`, `report`, `company`) VALUES
(7508, 'manager', '', 1, 1, 1, 'Golden Royal Index FZE'),
(7509, 'demoforex', 'USD', 1, 1, 1, 'Golden Royal Index FZE'),
(7510, 'preliminary', 'USD', 1, 1, 1, 'Golden Royal Index FZE'),
(7514, 'testEUR', 'EUR', 1, 1, 1, 'Golden Royal Index FZE'),
(7513, 'system', 'USD', 1, 1, 1, 'Golden Royal Index FZE'),
(7511, 'test', 'USD', 1, 1, 1, 'Golden Royal Index FZE'),
(7512, 'Real', 'USD', 1, 1, 1, 'Golden Royal Index FZE');

-- --------------------------------------------------------

--
-- Table structure for table `mt4_grp_sec`
--

CREATE TABLE IF NOT EXISTS `mt4_grp_sec` (
  `group` varchar(17) NOT NULL,
  `security` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `trade` tinyint(1) NOT NULL DEFAULT '1',
  `lot_min` int(11) NOT NULL,
  `lot_max` int(11) NOT NULL,
  `lot_step` int(11) NOT NULL,
  `spread` tinyint(4) NOT NULL,
  PRIMARY KEY (`group`,`security`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_grp_sec`
--

INSERT INTO `mt4_grp_sec` (`group`, `security`, `active`, `trade`, `lot_min`, `lot_max`, `lot_step`, `spread`) VALUES
('manager', 0, 1, 1, 1, 1000000, 1, 0),
('manager', 1, 1, 1, 1, 1000000, 1, 0),
('manager', 2, 1, 1, 1, 1000000, 1, 0),
('manager', 3, 1, 1, 1, 1000000, 1, 0),
('demoforex', 2, 1, 1, 10, 1000000, 10, 0),
('demoforex', 3, 1, 1, 10, 1000000, 10, 0),
('Real', 31, 1, 1, 0, 100000, 10, 0),
('Real', 30, 1, 1, 0, 100000, 10, 0),
('Real', 29, 1, 1, 0, 100000, 10, 0),
('Real', 28, 1, 1, 0, 100000, 10, 0),
('Real', 27, 1, 1, 0, 100000, 10, 0),
('Real', 26, 1, 1, 0, 100000, 10, 0),
('Real', 25, 1, 1, 0, 100000, 10, 0),
('Real', 24, 1, 1, 0, 100000, 10, 0),
('Real', 23, 1, 1, 0, 100000, 10, 0),
('Real', 22, 1, 1, 0, 100000, 10, 0),
('Real', 21, 1, 1, 0, 100000, 10, 0),
('Real', 20, 1, 1, 0, 100000, 10, 0),
('Real', 19, 1, 1, 0, 100000, 10, 0),
('Real', 18, 1, 1, 0, 100000, 10, 0),
('Real', 17, 1, 1, 0, 100000, 10, 0),
('Real', 16, 1, 1, 0, 100000, 10, 0),
('Real', 15, 1, 1, 0, 100000, 10, 0),
('Real', 14, 1, 1, 0, 100000, 10, 0),
('Real', 13, 1, 1, 0, 100000, 10, 0),
('Real', 12, 1, 1, 0, 100000, 10, 0),
('Real', 11, 1, 1, 0, 100000, 10, 0),
('Real', 10, 1, 1, 0, 100000, 10, 0),
('Real', 9, 1, 1, 0, 100000, 10, 0),
('Real', 8, 1, 1, 0, 100000, 10, 0),
('Real', 7, 1, 1, 0, 100000, 10, 0),
('Real', 6, 1, 1, 0, 100000, 10, 0),
('Real', 5, 1, 1, 0, 100000, 10, 0),
('Real', 4, 1, 1, 0, 100000, 10, 0),
('Real', 3, 1, 1, 0, 100000, 10, 0),
('Real', 2, 1, 1, 0, 100000, 10, 0),
('Real', 1, 1, 1, 0, 100000, 10, 0),
('Real', 0, 1, 1, 1, 100000, 10, 5),
('testEUR', 31, 1, 1, 0, 100000, 10, 0),
('manager', 4, 0, 0, 0, 0, 0, 0),
('manager', 5, 0, 0, 0, 0, 0, 0),
('manager', 6, 0, 0, 0, 0, 0, 0),
('manager', 7, 1, 1, 1, 1000000, 10, 0),
('manager', 8, 0, 0, 0, 0, 0, 0),
('manager', 9, 0, 0, 0, 0, 0, 0),
('manager', 10, 0, 0, 0, 0, 0, 0),
('manager', 11, 0, 0, 0, 0, 0, 0),
('manager', 12, 0, 0, 0, 0, 0, 0),
('manager', 13, 0, 0, 0, 0, 0, 0),
('manager', 14, 0, 0, 0, 0, 0, 0),
('manager', 15, 0, 0, 0, 0, 0, 0),
('manager', 16, 0, 0, 0, 0, 0, 0),
('manager', 17, 0, 0, 0, 0, 0, 0),
('manager', 18, 0, 0, 0, 0, 0, 0),
('manager', 19, 0, 0, 0, 0, 0, 0),
('manager', 20, 0, 0, 0, 0, 0, 0),
('manager', 21, 0, 0, 0, 0, 0, 0),
('manager', 22, 0, 0, 0, 0, 0, 0),
('manager', 23, 0, 0, 0, 0, 0, 0),
('manager', 24, 0, 0, 0, 0, 0, 0),
('manager', 25, 0, 0, 0, 0, 0, 0),
('manager', 26, 0, 0, 0, 0, 0, 0),
('manager', 27, 0, 0, 0, 0, 0, 0),
('manager', 28, 0, 0, 0, 0, 0, 0),
('manager', 29, 0, 0, 0, 0, 0, 0),
('manager', 30, 0, 0, 0, 0, 0, 0),
('manager', 31, 0, 0, 0, 0, 0, 0),
('demoforex', 4, 0, 0, 0, 0, 0, 0),
('demoforex', 5, 0, 0, 0, 0, 0, 0),
('demoforex', 6, 0, 0, 0, 0, 0, 0),
('demoforex', 7, 1, 1, 1, 10000, 1, 0),
('demoforex', 8, 0, 0, 0, 0, 0, 0),
('demoforex', 9, 0, 0, 0, 0, 0, 0),
('demoforex', 10, 0, 0, 0, 0, 0, 0),
('demoforex', 11, 0, 0, 0, 0, 0, 0),
('demoforex', 12, 0, 0, 0, 0, 0, 0),
('demoforex', 13, 0, 0, 0, 0, 0, 0),
('demoforex', 14, 0, 0, 0, 0, 0, 0),
('demoforex', 15, 0, 0, 0, 0, 0, 0),
('demoforex', 16, 0, 0, 0, 0, 0, 0),
('demoforex', 17, 0, 0, 0, 0, 0, 0),
('demoforex', 18, 0, 0, 0, 0, 0, 0),
('demoforex', 19, 0, 0, 0, 0, 0, 0),
('demoforex', 20, 0, 0, 0, 0, 0, 0),
('demoforex', 21, 0, 0, 0, 0, 0, 0),
('demoforex', 22, 0, 0, 0, 0, 0, 0),
('demoforex', 23, 0, 0, 0, 0, 0, 0),
('demoforex', 24, 0, 0, 0, 0, 0, 0),
('demoforex', 25, 0, 0, 0, 0, 0, 0),
('demoforex', 26, 0, 0, 0, 0, 0, 0),
('demoforex', 27, 0, 0, 0, 0, 0, 0),
('demoforex', 28, 0, 0, 0, 0, 0, 0),
('demoforex', 29, 0, 0, 0, 0, 0, 0),
('demoforex', 30, 0, 0, 0, 0, 0, 0),
('demoforex', 31, 0, 0, 0, 0, 0, 0),
('preliminary', 0, 1, 0, 10, 1000000, 10, 0),
('preliminary', 1, 1, 0, 10, 1000000, 10, 0),
('preliminary', 2, 1, 0, 10, 1000000, 10, 0),
('preliminary', 3, 1, 0, 10, 1000000, 10, 0),
('preliminary', 4, 0, 0, 0, 0, 0, 0),
('preliminary', 5, 0, 0, 0, 0, 0, 0),
('preliminary', 6, 0, 0, 0, 0, 0, 0),
('preliminary', 7, 0, 0, 0, 0, 0, 0),
('preliminary', 8, 0, 0, 0, 0, 0, 0),
('preliminary', 9, 0, 0, 0, 0, 0, 0),
('preliminary', 10, 0, 0, 0, 0, 0, 0),
('preliminary', 11, 0, 0, 0, 0, 0, 0),
('preliminary', 12, 0, 0, 0, 0, 0, 0),
('preliminary', 13, 0, 0, 0, 0, 0, 0),
('preliminary', 14, 0, 0, 0, 0, 0, 0),
('preliminary', 15, 0, 0, 0, 0, 0, 0),
('preliminary', 16, 0, 0, 0, 0, 0, 0),
('preliminary', 17, 0, 0, 0, 0, 0, 0),
('preliminary', 18, 0, 0, 0, 0, 0, 0),
('preliminary', 19, 0, 0, 0, 0, 0, 0),
('preliminary', 20, 0, 0, 0, 0, 0, 0),
('preliminary', 21, 0, 0, 0, 0, 0, 0),
('preliminary', 22, 0, 0, 0, 0, 0, 0),
('preliminary', 23, 0, 0, 0, 0, 0, 0),
('preliminary', 24, 0, 0, 0, 0, 0, 0),
('preliminary', 25, 0, 0, 0, 0, 0, 0),
('preliminary', 26, 0, 0, 0, 0, 0, 0),
('preliminary', 27, 0, 0, 0, 0, 0, 0),
('preliminary', 28, 0, 0, 0, 0, 0, 0),
('preliminary', 29, 0, 0, 0, 0, 0, 0),
('preliminary', 30, 0, 0, 0, 0, 0, 0),
('preliminary', 31, 0, 0, 0, 0, 0, 0),
('demoforex', 1, 1, 1, 10, 1000000, 10, 0),
('demoforex', 0, 1, 1, 10, 1000000, 10, 0),
('testEUR', 30, 1, 1, 0, 100000, 10, 0),
('testEUR', 29, 1, 1, 0, 100000, 10, 0),
('testEUR', 28, 1, 1, 0, 100000, 10, 0),
('testEUR', 27, 1, 1, 0, 100000, 10, 0),
('testEUR', 26, 1, 1, 0, 100000, 10, 0),
('testEUR', 25, 1, 1, 0, 100000, 10, 0),
('testEUR', 24, 1, 1, 0, 100000, 10, 0),
('testEUR', 23, 1, 1, 0, 100000, 10, 0),
('testEUR', 22, 1, 1, 0, 100000, 10, 0),
('testEUR', 21, 1, 1, 0, 100000, 10, 0),
('testEUR', 20, 1, 1, 0, 100000, 10, 0),
('testEUR', 19, 1, 1, 0, 100000, 10, 0),
('testEUR', 18, 1, 1, 0, 100000, 10, 0),
('testEUR', 17, 1, 1, 0, 100000, 10, 0),
('testEUR', 16, 1, 1, 0, 100000, 10, 0),
('testEUR', 15, 1, 1, 0, 100000, 10, 0),
('testEUR', 14, 1, 1, 0, 100000, 10, 0),
('testEUR', 13, 1, 1, 0, 100000, 10, 0),
('testEUR', 12, 1, 1, 0, 100000, 10, 0),
('testEUR', 11, 1, 1, 0, 100000, 10, 0),
('testEUR', 10, 1, 1, 0, 100000, 10, 0),
('testEUR', 9, 1, 1, 0, 100000, 10, 0),
('testEUR', 8, 1, 1, 0, 100000, 10, 0),
('testEUR', 7, 1, 1, 0, 100000, 10, 0),
('testEUR', 6, 1, 1, 0, 100000, 10, 0),
('testEUR', 5, 1, 1, 0, 100000, 10, 0),
('testEUR', 4, 1, 1, 0, 100000, 10, 0),
('testEUR', 3, 1, 1, 0, 100000, 10, 0),
('testEUR', 2, 1, 1, 0, 100000, 10, 0),
('testEUR', 1, 1, 1, 0, 100000, 10, 0),
('testEUR', 0, 1, 1, 1, 100000, 1, 0),
('system', 31, 0, 0, 0, 0, 0, 0),
('system', 30, 0, 0, 0, 0, 0, 0),
('system', 29, 0, 0, 0, 0, 0, 0),
('system', 28, 0, 0, 0, 0, 0, 0),
('system', 27, 0, 0, 0, 0, 0, 0),
('system', 26, 127, 0, 0, 0, 0, 127),
('system', 25, 0, 0, 1103589, 125154700, 100, 127),
('system', 24, 0, 127, 0, 0, 1, 0),
('system', 23, 0, 0, 1, 2, 217899040, 1),
('system', 22, 127, 127, 20316744, 2010667294, 1, 127),
('system', 21, 0, 0, 0, 1422376641, 1427981015, 0),
('system', 20, 0, 0, 0, 0, 0, 0),
('system', 19, 0, 0, 0, 0, 0, 0),
('system', 18, 0, 0, 0, 0, 0, 0),
('system', 17, 0, 0, 0, 0, 0, 0),
('system', 16, 0, -128, 0, 1953719636, 1, 0),
('system', 15, 127, -128, 0, 100000, 100, 127),
('system', 14, 127, 127, 0, 1120, 1, 127),
('system', 13, 0, 1, 0, 0, 24, 0),
('system', 12, 127, 127, 1, 147525012, 2007567318, 1),
('system', 11, 0, 0, 0, 0, 0, 0),
('system', 10, 0, 0, 2010720095, 147524632, 1, 127),
('system', 9, 0, 0, 0, 0, 0, 0),
('system', 8, 0, 0, 0, 0, 0, 0),
('system', 7, 0, 0, 7471205, 6422620, 7536737, 127),
('system', 6, -128, 72, 0, 147524904, 164779296, 127),
('system', 5, 127, 127, 0, 46, 2, 0),
('system', 4, 0, 0, 20316160, 12, 4849736, 82),
('system', 3, 0, 0, 0, 0, 0, 0),
('system', 2, 0, 0, 0, 0, 0, 0),
('system', 1, 0, 0, 0, 0, 0, 0),
('system', 0, 0, 0, 0, 0, 0, 0),
('test', 31, 1, 1, 0, 100000, 10, 0),
('test', 30, 1, 1, 0, 100000, 10, 0),
('test', 29, 1, 1, 0, 100000, 10, 0),
('test', 28, 1, 1, 0, 100000, 10, 0),
('test', 27, 1, 1, 0, 100000, 10, 0),
('test', 26, 1, 1, 0, 100000, 10, 0),
('test', 25, 1, 1, 0, 100000, 10, 0),
('test', 24, 1, 1, 0, 100000, 10, 0),
('test', 23, 1, 1, 0, 100000, 10, 0),
('test', 22, 1, 1, 0, 100000, 10, 0),
('test', 21, 1, 1, 0, 100000, 10, 0),
('test', 20, 1, 1, 0, 100000, 10, 0),
('test', 19, 1, 1, 0, 100000, 10, 0),
('test', 18, 1, 1, 0, 100000, 10, 0),
('test', 17, 1, 1, 0, 100000, 10, 0),
('test', 16, 1, 1, 0, 100000, 10, 0),
('test', 15, 1, 1, 0, 100000, 10, 0),
('test', 14, 1, 1, 0, 100000, 10, 0),
('test', 13, 1, 1, 0, 100000, 10, 0),
('test', 12, 1, 1, 0, 100000, 10, 0),
('test', 11, 1, 1, 0, 100000, 10, 0),
('test', 10, 1, 1, 0, 100000, 10, 0),
('test', 9, 1, 1, 0, 100000, 10, 0),
('test', 8, 1, 1, 0, 100000, 10, 0),
('test', 7, 1, 1, 0, 100000, 10, 0),
('test', 6, 1, 1, 0, 100000, 10, 0),
('test', 5, 1, 1, 0, 100000, 10, 0),
('test', 4, 1, 1, 0, 100000, 10, 0),
('test', 3, 1, 1, 0, 100000, 10, 0),
('test', 2, 1, 1, 0, 100000, 10, 0),
('test', 1, 1, 1, 0, 100000, 10, 0),
('test', 0, 1, 1, 0, 100000, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_login`
--

CREATE TABLE IF NOT EXISTS `mt4_login` (
  `login` int(11) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mt4_managers_permissions`
--

CREATE TABLE IF NOT EXISTS `mt4_managers_permissions` (
  `login` int(11) NOT NULL,
  `allowed` tinyint(1) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_managers_permissions`
--

INSERT INTO `mt4_managers_permissions` (`login`, `allowed`, `permissions`) VALUES
(4, 1, 'configurations=\nmail_and_news=\npayments=\nreports=accountant,agent_commission,commission,\ntrader='),
(5, 1, 'configurations=\nmail_and_news=news,\npayments=\nreports=closed_trades,open_trades,trades_summary,\ntrader='),
(6, 1, 'configurations=\nmail_and_news=mail,\npayments=\nreports=accountant,\ntrader=');

-- --------------------------------------------------------

--
-- Table structure for table `mt4_pass`
--

CREATE TABLE IF NOT EXISTS `mt4_pass` (
  `login` int(11) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `activation` varchar(50) NOT NULL,
  `trade` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_pass`
--

INSERT INTO `mt4_pass` (`login`, `password`, `activation`, `trade`) VALUES
(1, '1d0258c2440a8d19e716292b231e3190', '', 1),
(100, 'e99a18c428cb38d5f260853678922e03', '', 1),
(515, '168109963fbbc6985d83912030a68419', '', 1),
(590, '3c16315879bea6ee4f110059cff7488f', '', 1),
(591, '8682cc4abf9f636996803e7436a0cd5d', '', 1),
(589, 'ef56af9587da0431bc0b530549e04244', '', 1),
(588, '49aa040dda7074ef2b7ea90668951bf6', '', 1),
(587, 'eb29fda8d970230f7eee20c2d4279712', '', 1),
(586, '6ed06c4203fbb79b37d41efe87c8948c', '', 1),
(585, 'ff814346e79cd5ec3510c90748a19118', '', 1),
(584, '25978049cb9dd729e6e79bfab93ddd6d', '', 1),
(583, '47a0522931d54d1364a279d27200f0a0', '', 1),
(582, '3a778e91564880512cc5693f9e0fcc2c', '', 1),
(581, 'e21074b31e7844621a0be8c20790da26', '', 1),
(580, '43068f88206eddd9a0114117bb9e827e', '', 1),
(579, 'd832095dbf871274fba6717feea00ef4', '', 1),
(578, '72671f3628b6126fa29bce217e562d63', '', 1),
(577, '34a02cd4ffe5c45ada51dd0f1404bff2', '', 1),
(576, 'fcd7bc3518b7b74b26d02b598fa8c390', '', 1),
(575, '7c2b39dc1ace4c2a364d8f4c8caedec2', '', 1),
(574, 'ba13d9951214e802a40127dbc5476386', '', 1),
(573, 'e836112b2497773dafa1a288f5848494', '', 1),
(572, '2476410568b5b561c145581c0f378f15', '', 1),
(571, '6a9760847947fe111d7fde5b66423b44', '', 1),
(570, '14417e9a85a91d7eb6d6f9c008fbf792', '', 1),
(569, 'bc74b620f5f10b73ec55bef1b9610a6c', '', 1),
(568, '9adb43adfb9a43638b29a38f3000b0d9', '', 1),
(567, 'c6d5343d596d87412c56ce4c3427ecb8', '', 1),
(566, '273cab1e3621b7e878e8ad381b68451c', '', 1),
(565, 'b89c2565214c15b43f56f20826d28c45', '', 1),
(564, 'e614a1917585040fd770448b58245e58', '', 1),
(563, '96be48a4537f59a25b939d56350319e4', '', 1),
(562, '212f77704793860e13ca52bb8c4cb3bc', '', 1),
(561, '5badb3fc9fd7280ff6b09a5bc7268353', '', 1),
(560, '87fbacd56c027254ecc4231d8580438c', '', 1),
(559, '9571b2013676f35aed27dca764381551', '', 1),
(558, 'a7ddafc6ce2d2437a5914fbec4b780c5', '', 1),
(557, 'f7b608480f3971d10e59fd36a29a9dd5', '', 1),
(556, '8456af29aff27f139ea082ca63d2b5db', '', 1),
(555, 'bb6a12be153b216d7ceac8a47b43b889', '', 1),
(554, 'b1f15b8059a7a43fd12edcfc410646dc', '', 1),
(553, 'e21e14a7498291a78e3d0afab0e193f6', '', 1),
(552, '60678dfc01f883223714f51655424ecf', '', 1),
(551, 'cfca9c22299880064f75597cf607e5c6', '', 1),
(550, 'b219362aa8d20f9e232cd677d8e3cd1c', '', 1),
(549, 'cb14d70ec25790a3a826563afa0f9fe0', '', 1),
(548, '329aaa776034b790d448856312c15630', '', 1),
(547, '1a200b6840c984bbd86bbd176f0297ed', '', 1),
(546, 'aacd7b0e64ca92fb5ed3e928a2110073', '', 1),
(545, 'a103bb2a69f6b69ccd3b3dee16aa770b', '', 1),
(544, '89f6c6f25d70dbe2d360b3489bbb7f41', '', 1),
(543, '065ed1332704da1e900028805efb35cb', '', 1),
(542, '5689187e69676f895ebff3f14df6f32a', '', 1),
(541, '446d416fa292cf4c75b07600ef441f4f', '', 1),
(540, '6f3c7d327f1a7c8cd1e9679a076a2889', '', 1),
(539, '15f01fcd93de1ef68ef5783fe13c3897', '', 1),
(538, '6705604832d738a49e08597f2f13ea4f', '', 1),
(537, '52a65cb227c4a784bcde7054922a61e1', '', 1),
(536, 'f9b8b5ed36d58048ebcfa9dbfbde8520', '', 1),
(535, 'af2003efe82e95642d7e1f105d3b8ff0', '', 1),
(534, '9c144e7328e6823b398034d4ed6800db', '', 1),
(533, 'c0737072003c80a3e8ca5dd540c6ba2d', '', 1),
(532, 'b067aac6cb0f2c5df2ddefb829b9d80d', '', 1),
(531, '3aad3cabf5973201400c30107028abca', '', 1),
(530, '870dca0ab4c74087c58a69dfde99e314', '', 1),
(529, '3fed4aaeb759fad2e8a475333712cc1a', '', 1),
(528, '7f10f5019e3dcdf08fe9d091edcaeef7', '', 1),
(527, '78c983cf74a4f7ab9293565f6b4545e6', '', 1),
(526, 'fd817360586f97b97c9d376600c63401', '', 1),
(525, '5f051e8bca007fbda50f205fa2031851', '', 1),
(524, '6a0910188bc7bff1d878eabce07cf119', '', 1),
(523, 'dd410b1501d9807be6e31fb857df1645', '', 1),
(522, 'bbd5a9005fbf73d6b59306a5083a14da', '', 1),
(521, 'a050be2ac81f30c0c63e4148f9c1c55a', '', 1),
(520, 'a71869acf2ac76c34b4be1e7f59386de', '', 1),
(519, '495a2af25c89c1ab154bc3aa8b21128a', '', 1),
(518, 'e37beae658d1f6c5935d8f8b535ed4e1', '', 1),
(517, '448a4d037680583eef83a2858981b2f3', '', 1),
(516, 'bd96f8dcc757580dd45a03f20e95839a', '', 1),
(514, '9f5d7cd81be5667184181227542668cb', '', 1),
(513, 'f506a4a0937676a198fd5c627d0c3218', '', 1),
(512, '3886e954612a70567b5752543882b27f', '', 1),
(511, 'e0ff727f6f6fea4e36e9ce19d60ce7cd', '', 1),
(2102094474, '1d460e77cd9233bd4a2f0c4b0848781a', '', 1),
(500, 'e99a18c428cb38d5f260853678922e03', '', 1),
(502, 'dc91faf101f97fd811ac2c0bfe8c9b8a', '', 1),
(503, '898ca1d9bd680f592587741b44f9e86b', '', 1),
(504, 'fd394cf6966077b1b83e9accf4659b32', '', 1),
(505, 'de29aae25ec77ea2c40b5a7c5631e741', '', 1),
(506, '2f76c7dba3ec1abc8f62b4ee092c0111', '', 1),
(507, 'f0473f127a852cd67422e421d009c98c', '', 1),
(508, '3eb5177d62d2b1abcdb7185a2da11774', '', 1),
(509, 'c1e289f37da35c26b202d24c5d2a3689', '', 1),
(510, '0b8afdedeb9fa70ed184af823ebed0bb', '', 1),
(10, 'e99a18c428cb38d5f260853678922e03', '', 1),
(592, 'b318f6a70d76aa78cb6af1359bdba275', '', 1),
(593, '24094155e7702ace92d941cc1b3dcb45', '', 1),
(594, '0977e0904621718342b2a60d08e8092e', '', 1),
(595, '12de64397e18d8000a1c6c4b66f95bac', '', 1),
(596, '197921aa8ceb89f7699e408676ec025f', '', 1),
(597, '8e18db46be3420f31e745c1c6ec2e605', '', 1),
(598, 'bff756e203992def17cc834af8aec9ff', '', 1),
(599, '920f87d1dadc09a05976bfd5504b2892', '', 1),
(2, 'e99a18c428cb38d5f260853678922e03', '', 1),
(102, 'b56f9376ed382881e9aad37ff4ed664c', '', 1),
(200, 'e99a18c428cb38d5f260853678922e03', '', 1),
(101, '5d0eb9029603bc9cfb89a4e5c10509f4', '', 1),
(2102094489, '070daeb818aa4506758cfba9e2560e59', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_prices`
--

CREATE TABLE IF NOT EXISTS `mt4_prices` (
  `SYMBOL` char(16) NOT NULL,
  `TIME` datetime NOT NULL,
  `BID` double NOT NULL,
  `ASK` double NOT NULL,
  `LOW` double NOT NULL,
  `HIGH` double NOT NULL,
  `DIRECTION` int(11) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `SPREAD` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  PRIMARY KEY (`SYMBOL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_prices`
--

INSERT INTO `mt4_prices` (`SYMBOL`, `TIME`, `BID`, `ASK`, `LOW`, `HIGH`, `DIRECTION`, `DIGITS`, `SPREAD`, `MODIFY_TIME`) VALUES
('RAKPROP', '2015-06-03 10:56:11', 0.65, 0.66, 0.65, 0.66, 0, 2, 0, '2015-06-09 16:18:49'),
('EURNZD', '2015-06-11 10:03:58', 1.6046, 1.6048, 1.6009, 1.6089, 0, 4, 0, '2015-06-11 11:04:02'),
('USDAED', '2015-06-03 13:47:37', 3.672, 3.674, 3.672, 3.672, 0, 4, 20, '2015-06-09 16:07:34'),
('ALDAR', '2015-06-03 11:48:38', 2.75, 2.76, 2.73, 2.76, 0, 2, 0, '2015-06-09 16:18:49'),
('USDEGP', '2015-06-02 15:48:09', 7.629, 7.631, 7.629, 7.629, 0, 4, 20, '2015-06-09 16:18:49'),
('GOLD', '2015-06-11 13:43:50', 1179.9, 1180.4, 1178.4, 1184.4, 1, 2, 50, '2015-06-11 14:43:51'),
('WAHA', '2015-06-03 11:49:37', 2.46, 2.4699999999999998, 2.44, 2.46, 0, 2, 0, '2015-06-09 16:18:49'),
('USDCAD', '2015-06-11 10:03:24', 1.23, 1.2301, 1.2264, 1.2309, 0, 4, 0, '2015-06-11 11:03:27'),
('GBPUSDfup', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('GBPCHF', '2015-06-11 10:03:59', 1.44286, 1.44303, 1.43878, 1.44627, 0, 5, 0, '2015-06-11 11:04:01'),
('SPT_Gold', '2015-05-31 16:22:03', 1197, 1197.5, 1190, 1197, 0, 2, 50, '2015-06-09 16:18:49'),
('CHFJPY', '2015-06-11 10:03:55', 132.22, 132.23, 131.66, 132.44, 1, 2, 0, '2015-06-11 11:04:02'),
('GBPUSDcfgi.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('GBPUSDfup.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('USDCHF', '2015-06-11 10:03:58', 0.93418, 0.93423, 0.93172, 0.93445, 0, 5, 0, '2015-06-11 11:04:01'),
('GBPAUD', '2015-06-11 10:03:57', 1.9947, 1.9949, 1.9904, 2.0054, 1, 4, 0, '2015-06-11 11:04:02'),
('GBPUSDcfgi', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('MANAZEL', '2015-06-03 10:31:55', 0.62, 0.63, 0.61, 0.62, 0, 2, 0, '2015-06-09 16:18:49'),
('GBPUSDcfgm', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('GBPUSDfui.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('USDSAR', '2015-06-03 15:52:30', 3.7493, 3.7513, 3.7493, 3.7493, 0, 4, 20, '2015-06-09 16:18:49'),
('CHF0M.', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('KSI', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 5, '2015-06-09 16:18:48'),
('CAD0M.', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:48'),
('EURNOK', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('GBPUSDsp', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('GBPUSDmr', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('EURCHF', '2015-06-11 10:03:58', 1.0513, 1.0518, 1.0507, 1.0552, 0, 4, 5, '2015-06-11 11:04:01'),
('GBPUSD', '2015-06-11 10:27:23', 1.5447, 1.5447, 1.5430000000000001, 1.5516999999999999, 0, 4, 0, '2015-06-11 11:27:25'),
('SILVER', '2015-05-28 18:09:35', 16.62, 16.67, 16.52, 16.75, 0, 2, 5, '2015-06-09 16:18:46'),
('GBPUSDcfgp.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('GBPUSDcfgp', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('AUDCHF', '2015-06-11 10:03:48', 0.7233, 0.7234, 0.7208, 0.7236, 0, 4, 0, '2015-06-11 11:03:48'),
('AUDNZD', '2015-06-11 10:03:57', 1.1039, 1.1041, 1.0948, 1.1054, 0, 4, 0, '2015-06-11 11:04:02'),
('AUDCAD', '2015-06-11 10:03:54', 0.9524, 0.9525, 0.9491, 0.9534, 0, 4, 0, '2015-06-11 11:03:55'),
('GBPUSDfu.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('EURCAD', '2015-06-11 10:03:58', 1.3844, 1.3845, 1.3841999999999999, 1.389, 0, 4, 0, '2015-06-11 11:04:02'),
('ESHRAQ', '2015-06-03 11:35:14', 0.79, 0.8, 0.79, 0.81, 0, 2, 0, '2015-06-09 16:18:49'),
('EURJPY', '2015-06-11 10:03:58', 139.01, 139.06, 138.89, 139.29, 0, 2, 5, '2015-06-11 11:04:01'),
('GBPUSDfu', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('GOLD21', '2015-06-11 13:43:50', 32.986, 33.036, 32.943, 33.113, 1, 3, 50, '2015-06-11 14:43:51'),
('GBPNZD', '2015-06-11 10:03:59', 2.202, 2.2023, 2.1946, 2.2027, 0, 4, 0, '2015-06-11 11:04:02'),
('NZDUSD', '2015-06-11 10:03:59', 0.7014, 0.7014, 0.7012, 0.7066, 0, 4, 0, '2015-06-11 11:04:02'),
('AUDUSD', '2015-06-11 10:03:57', 0.7743, 0.7743, 0.7735, 0.7758, 0, 4, 0, '2015-06-11 11:04:01'),
('GBPUSDcfg', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('GBPJPY', '2015-06-11 10:03:59', 190.785, 190.796, 190.383, 190.855, 0, 3, 0, '2015-06-11 11:04:01'),
('EURGBP', '2015-06-11 10:03:57', 0.7285, 0.729, 0.7283, 0.7311, 0, 4, 5, '2015-06-11 11:04:01'),
('AUDJPY', '2015-06-11 10:03:59', 95.65, 95.65, 94.94, 95.69, 0, 2, 0, '2015-06-11 11:04:02'),
('DANA', '2015-06-03 11:51:04', 0.42, 0.42, 0.4, 0.42, 0, 2, 0, '2015-06-09 16:18:49'),
('GBPUSDfum', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('USDJPY', '2015-06-11 10:03:59', 123.525, 123.526, 122.716, 123.576, 1, 3, 0, '2015-06-11 11:04:01'),
('GBPUSDfui', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('AUD0M.', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('DAX', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 1, 25, '2015-06-09 16:18:48'),
('USDNOK', '2015-06-11 10:03:58', 7.7758, 7.7785, 7.7725, 7.8024000000000004, 0, 4, 0, '2015-06-11 11:04:02'),
('USDSGD', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('EURDKK', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('USDZAR', '2015-06-11 10:03:54', 12.4239, 12.4251, 12.3115, 12.4367, 0, 4, 0, '2015-06-11 11:03:55'),
('JPY0M.', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('USDHKD', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('S&P0U', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 0, '2015-06-09 16:18:48'),
('OIL0J', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 5, '2015-06-09 16:18:48'),
('USDDKK', '2015-06-11 10:03:59', 6.6286000000000005, 6.6296, 6.5878, 6.6311, 1, 4, 0, '2015-06-11 11:04:02'),
('DJI0U', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 0, 0, '2015-06-09 16:18:48'),
('GBPUSDint', '2015-06-11 10:27:23', 1.5446, 1.5446, 1.5429, 1.5516, 0, 4, 0, '2015-06-11 11:27:25'),
('EURUSD', '2015-06-11 00:31:00', 1.13239, 1.13243, 1.13132, 1.13248, 0, 5, 0, '2015-06-11 01:31:02'),
('OIL010', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 5, '2015-06-09 16:18:48'),
('NSDQ0U', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 0, '2015-06-09 16:18:48'),
('OIL0L', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 5, '2015-06-09 16:18:48'),
('EURSEK', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('S&P0910', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 0, '2015-06-09 16:18:48'),
('OIL0Z', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 5, '2015-06-09 16:18:48'),
('USDSEK', '2015-06-11 09:29:58', 8.2683, 8.2968, 8.2589, 8.2802, 0, 4, 0, '2015-06-11 10:30:04'),
('DJI0910', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 0, 0, '2015-06-09 16:18:48'),
('AUDUSD..', '2015-03-25 15:30:40', 0.78882, 0.78897, 0.78868, 0.78947, 0, 5, 0, '2015-06-09 16:18:49'),
('EUR0M.', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('NSDQ0910', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 2, 0, '2015-06-09 16:18:48'),
('CADJPY', '2015-06-11 10:03:58', 100.42, 100.43, 100.02, 100.44, 1, 2, 0, '2015-06-11 11:04:02'),
('NZDJPY', '2015-06-11 10:03:53', 86.64, 86.64, 86.48, 86.75, 1, 2, 0, '2015-06-11 11:03:55'),
('GBP0M.', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 4, 0, '2015-06-09 16:18:47'),
('EURAUD', '2015-06-11 10:03:56', 1.4535, 1.4536, 1.4534, 1.4631, 0, 4, 0, '2015-06-11 11:04:02'),
('GBPCAD', '2015-06-11 10:03:58', 1.8995, 1.9005, 1.8963999999999999, 1.9037, 1, 4, 10, '2015-06-11 11:04:01'),
('GBPUSDcfgm.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('GBPUSDfum.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:26'),
('GBPUSDcfg.', '2015-06-11 10:27:23', 1.5446900000000001, 1.5446900000000001, 1.54299, 1.55169, 0, 5, 0, '2015-06-11 11:27:25'),
('GOLD24', '2015-06-11 13:43:50', 37.919, 37.969, 37.869, 38.065, 1, 3, 50, '2015-06-11 14:43:51'),
('GOLD18', '2015-06-11 13:43:50', 28.054, 28.104, 28.017, 28.162, 1, 3, 50, '2015-06-11 14:43:51'),
('FTSE', '1970-01-01 00:00:00', 0, 0, 0, 0, 2, 1, 25, '2015-06-09 16:18:48');

--
-- Triggers `mt4_prices`
--
DROP TRIGGER IF EXISTS `UPdatePrices`;
DELIMITER //
CREATE TRIGGER `UPdatePrices` BEFORE UPDATE ON `mt4_prices`
 FOR EACH ROW BEGIN
    UPDATE jordangold.ps_product set price=jordangold.ps_product.weight*NEW.ASK WHERE jordangold.ps_product.item_type=NEW.SYMBOL;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mt4_requests`
--

CREATE TABLE IF NOT EXISTS `mt4_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` int(11) NOT NULL,
  `request` text NOT NULL,
  `status` int(4) NOT NULL,
  `time_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1567 ;

--
-- Dumping data for table `mt4_requests`
--

INSERT INTO `mt4_requests` (`id`, `login`, `request`, `status`, `time_create`) VALUES
(1, 50, 'Buy 0.1 Lots of EURUSD @ 1.4298 ( 0 / 0 )', 129, '2011-06-20 13:15:50'),
(2, 50, 'Buy 0.1 Lots of EURUSD @ 1.4298 ( 0 / 0 )', 129, '2011-06-20 13:15:53'),
(3, 50, 'Buy 0.1 Lots of EURUSD @ 1.4298 ( 0 / 0 )', 129, '2011-06-20 13:15:56'),
(4, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6194 ( 0 / 0 )', 134, '2011-06-20 13:16:04'),
(5, 50, 'Buy 0.1 Lots of EURUSD @ 1.4312 ( 0 / 0 )', 6, '2011-06-20 17:53:47'),
(6, 50, 'Buy 0.1 Lots of EURUSD @ 1.4314 ( 0 / 0 )', 129, '2011-06-20 18:09:12'),
(7, 50, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 129, '2011-06-20 18:09:16'),
(8, 50, 'Buy 0.1 Lots of USDJPY @ 80.24 ( 0 / 0 )', 134, '2011-06-20 18:09:22'),
(9, 50, 'Buy 0.1 Lots of EURUSD @ 1.4317 ( 0 / 0 )', 129, '2011-06-20 18:09:28'),
(10, 50, 'Delete Order 1961590', 0, '2011-06-20 18:09:34'),
(11, 50, 'Modify Order 1961588  0.4 EURUSD @ 1.21 ( 0 / 0 )', 130, '2011-06-20 18:09:42'),
(12, 50, 'Buy 0.1 Lots of EURUSD @ 1.4310 ( 0 / 0 )', 0, '2011-06-20 18:22:35'),
(13, 50, 'Buy 0.1 Lots of EURUSD @ 1.4309 ( 0 / 0 )', 0, '2011-06-20 18:22:50'),
(14, 50, 'Modify Order 1961588  0.4 EURUSD @ 1.25 ( 1.5 / 0 )', 130, '2011-06-20 18:25:16'),
(15, 50, 'Modify Order 1961588  0.4 EURUSD @ 1.25 ( 1 / 0 )', 130, '2011-06-20 18:25:28'),
(16, 50, 'Modify Order 1961588  0.4 EURUSD @ 1.25 ( 1.50 / 0 )', 130, '2011-06-20 18:25:40'),
(17, 50, 'Modify Order 1961588  0.4 EURUSD @ 1.25 ( 2 / 0 )', 130, '2011-06-20 18:25:55'),
(18, 50, 'Delete Order 1961588', 0, '2011-06-20 18:26:01'),
(19, 50, 'Close Order 1961746 Sell 0.5 of EURUSD @ 1.4305', 0, '2011-06-20 18:26:17'),
(20, 50, 'Buy 0.1 Lots of EURUSD @ 1.4309 ( 0 / 0 )', 129, '2011-06-20 18:27:55'),
(21, 50, 'Buy 0.1 Lots of EURUSD @ 1.4306 ( 0 / 0 )', 0, '2011-06-20 18:28:48'),
(22, 50, 'Sell 0.1 Lots of EURUSD @ 1.4304 ( 0 / 0 )', 129, '2011-06-20 18:28:52'),
(23, 50, 'Sell 0.1 Lots of EURUSD @ 1.4304 ( 0 / 0 )', 129, '2011-06-20 18:28:57'),
(24, 50, 'Buy 0.1 Lots of EURUSD @ 1.4307 ( 0 / 0 )', 0, '2011-06-20 18:29:00'),
(25, 50, 'Sell 0.1 Lots of USDCHF @ 0.8459 ( 0 / 0 )', 129, '2011-06-20 18:29:09'),
(26, 50, 'Buy 0.1 Lots of EURUSD @ 1.4307 ( 0 / 0 )', 0, '2011-06-20 18:29:10'),
(27, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4310 ( 0 / 0 )', 0, '2011-06-20 18:31:13'),
(28, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4310 ( 0 / 0 )', 0, '2011-06-20 18:31:18'),
(29, 50, 'Buy 0.1 Lots of EURUSD @ 1.4311 ( 0 / 0 )', 0, '2011-06-20 18:31:26'),
(30, 50, 'Buy 0.1 Lots of EURUSD @ 1.4310 ( 0 / 0 )', 0, '2011-06-20 18:31:37'),
(31, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4310 ( 0 / 0 )', 0, '2011-06-20 18:31:38'),
(32, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4310 ( 0 / 0 )', 0, '2011-06-20 18:31:48'),
(33, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4308 ( 0 / 0 )', 0, '2011-06-20 18:31:57'),
(34, 50, 'Buy 0.1 Lots of EURUSD @ 1.4308 ( 0 / 0 )', 129, '2011-06-20 18:31:57'),
(35, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4308 ( 0 / 0 )', 129, '2011-06-20 18:32:13'),
(36, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4308 ( 0 / 0 )', 129, '2011-06-20 18:32:23'),
(37, 50, 'Close Order 1961743 Buy 0.1 of EURUSD @ 1.4306', 0, '2011-06-20 18:32:24'),
(38, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4308 ( 0 / 0 )', 129, '2011-06-20 18:32:32'),
(39, 50, 'Buy 0.1 Lots of EURUSD @ 1.4316 ( 1 / 0 )', 0, '2011-06-20 18:49:00'),
(40, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 0, '2011-06-20 19:28:14'),
(41, 12392583, 'Sell 0.1 Lots of EURUSD @ 1.4300 ( 0 / 0 )', 2, '2011-06-20 19:28:41'),
(42, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4303 ( 0 / 0 )', 136, '2011-06-20 19:28:45'),
(43, 50, 'Sell 0.1 Lots of EURUSD @ 1.4300 ( 0 / 0 )', 0, '2011-06-20 19:51:34'),
(44, 50, 'Buy 0.1 Lots of EURUSD @ 1.4303 ( 0 / 0 )', 0, '2011-06-20 19:51:38'),
(45, 50, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 136, '2011-06-20 19:52:00'),
(46, 50, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 0, '2011-06-20 19:52:03'),
(47, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 0, '2011-06-20 19:52:15'),
(48, 50, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 0, '2011-06-20 19:52:18'),
(49, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 0, '2011-06-20 19:53:36'),
(50, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 0, '2011-06-20 19:53:41'),
(51, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 0, '2011-06-20 19:53:46'),
(52, 12392583, 'Sell 1 Lots of EURUSD @ 1.4298 ( 0 / 0 )', 0, '2011-06-20 19:53:58'),
(53, 12392583, 'Close All EURUSD', 0, '2011-06-20 19:54:06'),
(54, 12392583, 'Buy 1 Lots of EURUSD @ 1.4302 ( 0 / 0 )', 0, '2011-06-20 19:55:19'),
(55, 12392583, 'Sell 1 Lots of EURUSD @ 1.4301 ( 0 / 0 )', 129, '2011-06-20 19:57:02'),
(56, 12392583, 'Buy 1 Lots of EURUSD @ 1.4304 ( 0 / 0 )', 129, '2011-06-20 19:57:06'),
(57, 12392583, 'Buy 1 Lots of EURUSD @ 1.4303 ( 0 / 0 )', 0, '2011-06-20 19:57:12'),
(58, 12392583, 'Buy 1 Lots of EURUSD @ 1.4305 ( 0 / 0 )', 0, '2011-06-20 19:57:35'),
(59, 12392583, 'Buy 1 Lots of EURUSD @ 1.4305 ( 0 / 0 )', 0, '2011-06-20 19:57:44'),
(60, 12392583, 'Buy 1 Lots of EURUSD @ 1.4305 ( 0 / 0 )', 129, '2011-06-20 20:06:15'),
(61, 12392583, 'Buy 1 Lots of EURUSD @ 1.4305 ( 0 / 0 )', 0, '2011-06-20 20:06:57'),
(62, 12392583, 'Buy 1 Lots of EURUSD @ 1.4305 ( 0 / 0 )', 0, '2011-06-20 20:07:02'),
(63, 12392583, 'Buy 1 Lots of EURUSD @ 1.4305 ( 0 / 0 )', 129, '2011-06-20 20:10:17'),
(64, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4308 ( 0 / 0 )', 129, '2011-06-20 20:11:26'),
(65, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9804 ( 0 / 0 )', 0, '2011-06-20 21:21:07'),
(66, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9804 ( 0 / 0 )', 6, '2011-06-20 21:21:12'),
(67, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9804 ( 0 / 0 )', 0, '2011-06-20 21:21:40'),
(68, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9804 ( 0 / 0 )', 129, '2011-06-20 21:21:44'),
(69, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9804 ( 0 / 0 )', 129, '2011-06-20 21:21:52'),
(70, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9802 ( 0 / 0 )', 0, '2011-06-20 21:21:57'),
(71, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9804 ( 0 / 0 )', 0, '2011-06-20 21:22:03'),
(72, 12392583, 'Buy 0.1 Lots of USDCAD @ 0.9804 ( 0 / 0 )', 129, '2011-06-20 21:22:07'),
(73, 12392583, 'Buy 0.1 Lots of NZDUSD @ 0.8104 ( 0 / 0 )', 1, '2011-06-20 21:22:12'),
(74, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4318 ( 0 / 0 )', 129, '2011-06-20 22:21:38'),
(75, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:22:39'),
(76, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:23:27'),
(77, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:23:33'),
(78, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:23:44'),
(79, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:23:58'),
(80, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:24:07'),
(81, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:26:46'),
(82, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4315 ( 0 / 0 )', 0, '2011-06-20 22:27:01'),
(83, 12392583, 'Sell 0.1 Lots of EURUSD @ 1.4312 ( 0 / 0 )', 0, '2011-06-20 22:27:06'),
(84, 12392583, 'Buy 0.1 Lots of EURUSD @ 1.4317 ( 0 / 0 )', 0, '2011-06-20 22:28:17'),
(85, 12392583, 'Sell 0.1 Lots of EURUSD @ 1.4335 ( 0 / 0 )', 0, '2011-06-20 23:11:56'),
(86, 50, 'Buy 0.1 Lots of EURUSD @ 1.4332 ( 0 / 0 )', 129, '2011-06-21 09:17:24'),
(87, 50, 'Buy 0.1 Lots of EURUSD @ 1.4332 ( 0 / 0 )', 0, '2011-06-21 09:37:52'),
(88, 50, 'Buy 0.1 Lots of EURUSD @ 1.4332 ( 0 / 0 )', 129, '2011-06-21 09:38:02'),
(89, 50, 'Buy 0.1 Lots of EURUSD @ 1.4338 ( 0 / 0 )', 0, '2011-06-21 10:12:38'),
(90, 50, 'Sell 3 Lots of EURUSD @ 1.4372 ( 0 / 0 )', 0, '2011-06-21 14:42:51'),
(91, 50, 'Close All EURUSD', 0, '2011-06-21 14:42:59'),
(92, 50, 'Sell 0.1 Lots of EURUSD @ 1.438 ( 0 / 0 )', 129, '2011-06-21 14:47:59'),
(93, 50, 'Buy 0.1 Lots of EURUSD @ 1.4383 ( 0 / 0 )', 129, '2011-06-21 14:48:02'),
(94, 50, 'Buy 0.1 Lots of EURUSD @ 1.4383 ( 0 / 0 )', 129, '2011-06-21 14:48:09'),
(95, 50, 'Buy 0.1 Lots of EURUSD @ 1.4383 ( 0 / 0 )', 129, '2011-06-21 14:48:13'),
(96, 50, 'Buy 0.1 Lots of EURUSD @ 1.4383 ( 0 / 0 )', 129, '2011-06-21 14:48:24'),
(97, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6229 ( 0 / 0 )', 0, '2011-06-21 14:48:30'),
(98, 50, 'Buy 0.1 Lots of USDCAD @ 0.9727 ( 0 / 0 )', 0, '2011-06-21 14:48:36'),
(99, 50, 'Buy 0.1 Lots of EURUSD @ 1.4405 ( 0 / 0 )', 0, '2011-06-21 15:46:55'),
(100, 50, 'Buy 0.1 Lots of EURUSD @ 1.4404 ( 0 / 0 )', 129, '2011-06-21 15:49:02'),
(101, 50, 'Buy 0.1 Lots of EURUSD @ 1.4404 ( 0 / 0 )', 129, '2011-06-21 15:49:06'),
(102, 50, 'Buy 0.1 Lots of USDCHF @ 0.8433 ( 0 / 0 )', 129, '2011-06-21 15:49:10'),
(103, 50, 'Buy 0.1 Lots of GOLD @ 1545.09 ( 0 / 0 )', 129, '2011-06-21 15:49:25'),
(104, 50, 'Sell 0.1 Lots of GOLD @ 1545.62 ( 0 / 0 )', 0, '2011-06-21 16:28:08'),
(105, 50, 'Sell 0.1 Lots of EURUSD @ 1.4181 ( 0 / 0 )', 6, '2011-06-25 07:39:09'),
(106, 50, 'Sell 0.1 Lots of EURUSD @ 1.4363 ( 0 / 0 )', 0, '2011-06-28 18:44:30'),
(107, 50, 'Buy 0.1 Lots of EURUSD @ 1.4366 ( 0 / 0 )', 0, '2011-06-28 18:44:36'),
(108, 50, 'Sell 0.1 Lots of EURUSD @ 1.4363 ( 0 / 0 )', 0, '2011-06-28 18:44:50'),
(109, 50, 'Buy 0.1 Lots of EURUSD @ 1.4366 ( 0 / 0 )', 0, '2011-06-28 18:44:55'),
(110, 50, 'Buy 0.1 Lots of EURUSD @ 1.4368 ( 0 / 0 )', 0, '2011-06-28 18:48:09'),
(111, 50, 'Sell 0.1 Lots of EURUSD @ 1.4365 ( 0 / 0 )', 0, '2011-06-28 18:48:13'),
(112, 50, 'Sell 0.1 Lots of EURUSD @ 1.4364 ( 0 / 0 )', 129, '2011-06-28 18:49:11'),
(113, 50, 'Buy 0.1 Lots of EURUSD @ 1.4369 ( 0 / 0 )', 0, '2011-06-28 18:49:16'),
(114, 50, 'Sell 0.4 Lots of USDCAD @ 0.9823 ( 0 / 0 )', 129, '2011-06-28 18:49:39'),
(115, 50, 'Buy 0.4 Lots of USDCAD @ 0.9828 ( 0 / 0 )', 129, '2011-06-28 18:49:42'),
(116, 50, 'Sell 0.4 Lots of USDCAD @ 0.9823 ( 0 / 0 )', 129, '2011-06-28 18:49:46'),
(117, 50, 'Sell 0.1 Lots of USDCAD @ 0.9823 ( 0 / 0 )', 129, '2011-06-28 18:49:53'),
(118, 50, 'Sell 0.1 Lots of USDCAD @ 0.9825 ( 0 / 0 )', 129, '2011-06-28 18:50:14'),
(119, 50, 'Buy 0.1 Lots of USDCAD @ 0.9829 ( 0 / 0 )', 0, '2011-06-28 18:50:18'),
(120, 50, 'Buy 0.1 Lots of USDCAD @ 0.9829 ( 0 / 0 )', 129, '2011-06-28 18:50:23'),
(121, 50, 'Sell 0.1 Lots of USDCAD @ 0.9824 ( 0 / 0 )', 129, '2011-06-28 18:50:26'),
(122, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0535 ( 0 / 0 )', 0, '2011-06-28 18:52:35'),
(123, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0531 ( 0 / 0 )', 0, '2011-06-28 18:52:39'),
(124, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0535 ( 0 / 0 )', 0, '2011-06-28 18:52:43'),
(125, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0533 ( 0 / 0 )', 0, '2011-06-28 18:53:01'),
(126, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0537 ( 0 / 0 )', 0, '2011-06-28 18:53:06'),
(127, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0533 ( 0 / 0 )', 0, '2011-06-28 18:53:12'),
(128, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0537 ( 0 / 0 )', 129, '2011-06-28 18:53:17'),
(129, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0532 ( 0 / 0 )', 0, '2011-06-28 18:53:22'),
(130, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0536 ( 0 / 0 )', 0, '2011-06-28 18:53:43'),
(131, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0532 ( 0 / 0 )', 129, '2011-06-28 18:53:47'),
(132, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0536 ( 0 / 0 )', 129, '2011-06-28 18:53:52'),
(133, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0539 ( 0 / 0 )', 0, '2011-06-28 18:55:41'),
(134, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0533 ( 0 / 0 )', 129, '2011-06-28 18:56:24'),
(135, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0538 ( 0 / 0 )', 0, '2011-06-28 18:56:28'),
(136, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0538 ( 0 / 0 )', 0, '2011-06-28 18:57:02'),
(137, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0538 ( 0 / 0 )', 0, '2011-06-28 18:57:06'),
(138, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0536 ( 0 / 0 )', 129, '2011-06-28 18:59:21'),
(139, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0538 ( 0 / 0 )', 129, '2011-06-28 19:02:32'),
(140, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0541 ( 0 / 0 )', 129, '2011-06-28 19:02:35'),
(141, 50, 'Buy 0.1 Lots of EURUSD @ 1.4513 ( 0 / 0 )', 6, '2011-07-04 15:21:13'),
(142, 50, 'Buy 0.1 Lots of EURUSD @ 1.4513 ( 0 / 0 )', 6, '2011-07-04 15:21:19'),
(143, 50, 'Buy 0.1 Lots of EURUSD @ 1.4514 ( 0 / 0 )', 0, '2011-07-04 15:22:11'),
(144, 50, 'Buy 0.1 Lots of EURUSD @ 1.4430 ( 0 / 0 )', 0, '2011-07-05 23:29:23'),
(145, 50, 'Sell 0.1 Lots of EURUSD @ 1.4426 ( 0 / 0 )', 129, '2011-07-05 23:31:31'),
(146, 50, 'Sell 0.1 Lots of EURUSD @ 1.4427 ( 0 / 0 )', 0, '2011-07-05 23:31:37'),
(147, 50, 'Close All AUDUSD', 0, '2011-07-05 23:31:57'),
(148, 50, 'Close All EURUSD', 0, '2011-07-05 23:32:06'),
(149, 50, 'Close All GBPUSD', 0, '2011-07-05 23:32:16'),
(150, 50, 'Buy 4 Lots of EURUSD @ 1.4430 ( 0 / 0 )', 0, '2011-07-05 23:32:36'),
(151, 50, 'Close All EURUSD', 0, '2011-07-05 23:32:52'),
(152, 50, 'Sell 4 Lots of EURUSD @ 1.4425 ( 0 / 0 )', 0, '2011-07-05 23:33:04'),
(153, 50, 'Close Order 1961917 Sell 0.1 of GOLD @ 1513.27', 0, '2011-07-05 23:33:26'),
(154, 50, 'Close Order 1961940 Buy 0.1 of USDCAD @ 0.9628', 129, '2011-07-05 23:33:46'),
(155, 50, 'Close Order 1961913 Buy 0.1 of USDCAD @ 0.9628', 129, '2011-07-05 23:33:54'),
(156, 50, 'Close Order 1961940 Buy 0.1 of USDCAD @ 0.9628', 129, '2011-07-05 23:34:03'),
(157, 50, 'Close Order 1961913 Buy 0.1 of USDCAD @ 0.9628', 129, '2011-07-05 23:34:22'),
(158, 50, 'Sell 0.1 Lots of EURUSD @ 1.4298 ( 0 / 0 )', 0, '2011-07-07 10:06:11'),
(159, 12392594, 'Buy 0.1 Lots of EURUSD @ 1.3989 ( 0 / 0 )', 0, '2011-07-12 15:12:42'),
(160, 12392594, 'Close Order 1962044 Buy 0.1 of EURUSD @ 1.3987', 129, '2011-07-12 15:12:59'),
(161, 12392594, 'Close Order 1962044 Buy 0.1 of EURUSD @ 1.3987', 0, '2011-07-12 15:13:07'),
(162, 12392596, 'Sell 0.5 Lots of EURUSD @ 1.4021 ( 1.3 / 1.5 )', 130, '2011-07-13 07:17:36'),
(163, 12392596, 'Buy 0.5 Lots of EURUSD @ 1.4025 ( 1.3 / 1.5 )', 0, '2011-07-13 07:17:40'),
(164, 12392596, 'Sell 0.8 Lots of EURUSD @ 1.4024 ( 1.41 / 1.39 )', 0, '2011-07-13 07:18:04'),
(165, 12392596, 'Sell 0.4 Lots of USDCHF @ 0.8300 ( 0 / 0 )', 0, '2011-07-13 07:18:38'),
(166, 12392596, 'Buy 0.2 Lots of USDCHF @ 0.8301 ( 0 / 0 )', 0, '2011-07-13 07:18:47'),
(167, 12392596, 'Sell 1.1 Lots of GOLD @ 1570.76 ( 0 / 0 )', 0, '2011-07-13 07:19:00'),
(168, 12392596, 'Buy 0.5 Lots of GOLD @ 1571.26 ( 0 / 0 )', 0, '2011-07-13 07:19:10'),
(169, 12392596, 'Sell 0.4 Lots of SILVER @ 36.60 ( 0 / 0 )', 0, '2011-07-13 07:19:16'),
(170, 12392596, 'Buy Limit 0.5 Lots of USDCHF @ 0.83 ( 0 / 0 )', 130, '2011-07-13 07:20:00'),
(171, 12392596, 'Buy Limit 0.5 Lots of USDCHF @ 0.81 ( 0 / 0 )', 0, '2011-07-13 07:20:09'),
(172, 12392596, 'Buy Stop 0.8 Lots of USDCHF @ 0.81 ( 0 / 0 )', 130, '2011-07-13 07:20:19'),
(173, 12392596, 'Buy Stop 0.8 Lots of USDCHF @ 0.83 ( 0 / 0 )', 130, '2011-07-13 07:20:29'),
(174, 12392596, 'Buy Stop 0.3 Lots of EURUSD @ 1.5 ( 0 / 0 )', 0, '2011-07-13 07:20:50'),
(175, 12392596, 'Sell Stop 0.3 Lots of EURUSD @ 1.3 ( 0 / 0 )', 0, '2011-07-13 07:21:13'),
(176, 12392596, 'Sell 0.1 Lots of EURUSD @ 1.4211 ( 0 / 0 )', 129, '2011-07-14 07:55:06'),
(177, 12392596, 'Buy 0.1 Lots of EURUSD @ 1.4214 ( 0 / 0 )', 129, '2011-07-14 07:55:13'),
(178, 12392596, 'Buy 0.1 Lots of EURUSD @ 1.4214 ( 0 / 0 )', 129, '2011-07-14 07:55:18'),
(179, 12392596, 'Buy 0.1 Lots of USDJPY @ 79.08 ( 0 / 0 )', 0, '2011-07-14 07:55:44'),
(180, 1001, 'Buy 1 Lots of EURUSD @ 1.4098 ( 0 / 0 )', 129, '2011-07-19 06:41:36'),
(181, 1001, 'Buy 1 Lots of EURUSD @ 1.4097 ( 0 / 0 )', 0, '2011-07-19 06:41:40'),
(182, 1001, 'Buy 1 Lots of EURUSD @ 1.4097 ( 0 / 0 )', 0, '2011-07-19 06:42:42'),
(183, 1001, 'Buy 1 Lots of EURUSD @ 1.4097 ( 0 / 0 )', 129, '2011-07-19 10:05:07'),
(184, 50, 'Close All EURUSD', 0, '2011-07-25 07:36:34'),
(185, 50, 'Buy Limit 0.1 Lots of USDJPY @ 1 ( 0 / 0 )', 0, '2011-07-25 07:37:10'),
(186, 50, 'Buy 0.1 Lots of USDJPY @ 78.11 ( 0 / 0 )', 0, '2011-07-25 10:19:11'),
(187, 12392597, 'Buy 0.1 Lots of EURUSD @ 1.4371 ( 0 / 0 )', 0, '2011-07-25 11:53:44'),
(188, 12392597, 'Buy 0.1 Lots of EURUSD @ 1.4375 ( 0 / 0 )', 129, '2011-07-25 11:56:44'),
(189, 12392597, 'Buy 0.1 Lots of EURUSD @ 1.4374 ( 0 / 0 )', 0, '2011-07-25 11:58:13'),
(190, 50, 'Modify Order 1962095  0.1 USDJPY @ 1 ( .5 / 0 )', 0, '2011-07-27 11:50:53'),
(191, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6362 ( 0 / 0 )', 129, '2011-07-27 11:58:35'),
(192, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6362 ( 0 / 0 )', 129, '2011-07-27 11:58:39'),
(193, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6361 ( 0 / 0 )', 0, '2011-07-27 11:58:42'),
(194, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6358 ( 0 / 0 )', 0, '2011-07-27 11:58:45'),
(195, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6361 ( 0 / 0 )', 0, '2011-07-27 11:58:48'),
(196, 12392598, 'Sell 1 Lots of EURUSD @ 1.4349 ( 0 / 0 )', 0, '2011-07-28 06:45:10'),
(197, 50, 'Buy 0.3 Lots of EURUSD @ 1.4365 ( 0 / 0 )', 0, '2011-07-28 06:52:44'),
(198, 50, 'Sell 0.1 Lots of USDJPY @ 76.87 ( 0 / 0 )', 132, '2011-07-30 06:54:29'),
(199, 50, 'Sell 0.1 Lots of USDJPY @ 76.87 ( 0 / 0 )', 132, '2011-07-30 06:54:33'),
(200, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6416 ( 0 / 0 )', 132, '2011-07-30 17:55:07'),
(201, 50, 'Close All GBPUSD', 0, '2011-07-30 17:55:31'),
(202, 50, 'Close All GBPUSD', 0, '2011-07-30 17:55:39'),
(203, 50, 'Sell 0.1 Lots of EURUSD @ 1.4386 ( 0 / 0 )', 132, '2011-07-31 11:09:33'),
(204, 50, 'Buy 0.2 Lots of EURUSD @ 1.4102 ( 0 / 0 )', 0, '2011-08-05 07:04:38'),
(205, 50, 'Close Order 1961911 Buy 0.1 of GBPUSD @ 1.6276', 129, '2011-08-05 07:06:43'),
(206, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.46', 129, '2011-08-05 07:07:07'),
(207, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.46', 129, '2011-08-05 07:07:12'),
(208, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6291', 129, '2011-08-05 07:07:22'),
(209, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6283', 129, '2011-08-05 07:07:37'),
(210, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6283', 129, '2011-08-05 07:07:42'),
(211, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6283', 129, '2011-08-05 07:08:22'),
(212, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6276', 129, '2011-08-05 07:08:31'),
(213, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.49', 129, '2011-08-05 07:08:49'),
(214, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.47', 129, '2011-08-05 07:09:04'),
(215, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.48', 0, '2011-08-05 07:09:25'),
(216, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.48', 4051, '2011-08-05 07:09:29'),
(217, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.48', 4051, '2011-08-05 07:09:59'),
(218, 50, 'Close Order 1962098 Buy 0.1 of USDJPY @ 78.48', 4051, '2011-08-05 07:10:04'),
(219, 50, 'Sell 0.1 Lots of EURUSD @ 1.429 ( 0 / 0 )', 132, '2011-08-06 15:03:54'),
(220, 50, 'Sell 0.1 Lots of EURUSD @ 1.429 ( 0 / 0 )', 132, '2011-08-06 15:03:59'),
(221, 50, 'Sell 0.1 Lots of EURUSD @ 1.429 ( 0 / 0 )', 132, '2011-08-06 15:04:13'),
(222, 50, 'Buy 0.1 Lots of EURUSD @ 1.4293 ( 0 / 0 )', 132, '2011-08-06 15:04:18'),
(223, 50, 'Sell 0.1 Lots of NZDUSD @ 0.8436 ( 0 / 0 )', 132, '2011-08-07 11:48:51'),
(224, 50, 'Close Order 1961940 Buy 0.1 of USDCAD @ 0.9781', 132, '2011-08-07 11:51:25'),
(225, 50, 'Close Order 1961940 Buy 0.1 of USDCAD @ 0.9781', 132, '2011-08-07 11:51:32'),
(226, 50, 'Close Order 1961940 Buy 0.1 of USDCAD @ 0.9781', 132, '2011-08-07 11:51:36'),
(227, 50, 'Close Order 1961913 Buy 0.1 of USDCAD @ 0.9844', 0, '2011-08-08 09:19:33'),
(228, 50, 'Close Order 1961940 Buy 0.1 of USDCAD @ 0.9849', 0, '2011-08-08 11:22:16'),
(229, 50, 'Close Order 1961911 Buy 0.1 of GBPUSD @ 1.6411', 0, '2011-08-08 11:23:06'),
(230, 50, 'Close Order 1961911 Buy 0.1 of GBPUSD @ 1.6411', 4051, '2011-08-08 11:23:10'),
(231, 50, 'Close Order 1961911 Buy 0.1 of GBPUSD @ 1.6412', 4051, '2011-08-08 11:24:24'),
(232, 50, 'Close Order 1961911 Buy 0.1 of GBPUSD @ 1.6412', 4051, '2011-08-08 11:24:28'),
(233, 50, 'Close Order 1961911 Buy 0.1 of GBPUSD @ 1.6412', 4051, '2011-08-08 11:24:32'),
(234, 50, 'Buy 0.1 Lots of EURUSD @ 1.4273 ( 0 / 0 )', 0, '2011-08-08 11:27:01'),
(235, 50, 'Buy 0.1 Lots of EURUSD @ 1.4273 ( 0 / 0 )', 129, '2011-08-08 11:27:11'),
(236, 50, 'Buy 0.1 Lots of EURUSD @ 1.4273 ( 0 / 0 )', 129, '2011-08-08 11:27:15'),
(237, 50, 'Sell 0.1 Lots of EURUSD @ 1.4270 ( 0 / 0 )', 129, '2011-08-08 11:27:34'),
(238, 50, 'Sell 0.1 Lots of EURUSD @ 1.4267 ( 0 / 0 )', 0, '2011-08-08 11:27:44'),
(239, 50, 'Sell 0.1 Lots of EURUSD @ 1.4267 ( 0 / 0 )', 129, '2011-08-08 11:27:48'),
(240, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6408', 129, '2011-08-08 11:28:21'),
(241, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6408', 0, '2011-08-08 11:28:45'),
(242, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6408', 4051, '2011-08-08 11:28:49'),
(243, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6408', 4051, '2011-08-08 11:28:55'),
(244, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6407', 4051, '2011-08-08 11:29:22'),
(245, 50, 'Close Order 1962110 Buy 0.1 of GBPUSD @ 1.6407', 4051, '2011-08-08 11:29:26'),
(246, 50, 'Modify Order 1962110 Buy 0.1 GBPUSD @ 1.6410 ( 1 / 5 )', 4051, '2011-08-08 11:29:48'),
(247, 50, 'Modify Order 1962110 Buy 0.1 GBPUSD @ 1.6410 ( 1 / 5 )', 4051, '2011-08-08 11:29:53'),
(248, 50, 'Modify Order 1962110 Buy 0.1 GBPUSD @ 1.6410 ( 1 / 5 )', 4051, '2011-08-08 11:29:57'),
(249, 50, 'Close Order 1962118 Buy 0.7 of GBPUSD @ 1.6403', 129, '2011-08-08 11:31:20'),
(250, 50, 'Close Order 1962118 Buy 0.7 of GBPUSD @ 1.6402', 129, '2011-08-08 11:31:29'),
(251, 50, 'Close Order 1962118 Buy 0.7 of GBPUSD @ 1.6403', 0, '2011-08-08 11:31:47'),
(252, 50, 'Close Order 1962106 Buy 0.1 of GBPUSD @ 1.6341', 0, '2011-08-08 13:12:34'),
(253, 50, 'Close Order 1962152 Sell 0.1 of EURUSD @ 1.4191', 0, '2011-08-08 13:13:53'),
(254, 50, 'Close Order 1962152 Sell 0.1 of EURUSD @ 1.4189', 4051, '2011-08-08 13:14:32'),
(255, 50, 'Close Order 1962152 Sell 0.1 of EURUSD @ 1.4189', 4051, '2011-08-08 13:14:36'),
(256, 50, 'Close Order 1962152 Sell 0.1 of EURUSD @ 1.4189', 4051, '2011-08-08 13:14:40'),
(257, 50, 'Close Order 1962150 Buy 0.1 of EURUSD @ 1.4186', 0, '2011-08-08 13:18:38'),
(258, 50, 'Close Order 1962030 Sell 0.1 of EURUSD @ 1.4184', 0, '2011-08-08 13:22:07'),
(259, 50, 'Close Order 1962072 Sell 0.1 of EURUSD @ 1.4180', 129, '2011-08-08 13:22:39'),
(260, 50, 'Close Order 1962072 Sell 0.1 of EURUSD @ 1.4180', 129, '2011-08-08 13:22:41'),
(261, 50, 'Close Order 1962072 Sell 0.1 of EURUSD @ 1.4181', 0, '2011-08-08 13:22:46'),
(262, 50, 'Close Order 1962072 Sell 0.1 of EURUSD @ 1.4181', 4051, '2011-08-08 13:22:48'),
(263, 50, 'Close Order 1962072 Sell 0.1 of EURUSD @ 1.4181', 4051, '2011-08-08 13:22:56'),
(264, 50, 'Close Order 1962072 Sell 0.1 of EURUSD @ 1.4181', 4051, '2011-08-08 13:22:58'),
(265, 12392605, 'Buy 0.1 Lots of EURUSD @ 1.4184 ( 0 / 0 )', 0, '2011-08-08 13:24:39'),
(266, 12392605, 'Sell 0.1 Lots of USDJPY @ 77.87 ( 0 / 0 )', 129, '2011-08-08 13:25:04'),
(267, 12392605, 'Buy 0.1 Lots of USDJPY @ 77.90 ( 0 / 0 )', 0, '2011-08-08 13:25:08'),
(268, 12392605, 'Sell 0.1 Lots of USDJPY @ 77.87 ( 0 / 0 )', 0, '2011-08-08 13:25:15'),
(269, 12392605, 'Sell 0.1 Lots of USDJPY @ 77.87 ( 0 / 0 )', 0, '2011-08-08 13:25:25'),
(270, 12392605, 'Buy 0.1 Lots of USDJPY @ 77.90 ( 0 / 0 )', 0, '2011-08-08 13:25:31'),
(271, 12392605, 'Modify Order 1962180 Sell 0.1 USDJPY @ 77.88 ( 0 / 0 )', 1, '2011-08-08 13:26:04'),
(272, 12392605, 'Buy 0.1 Lots of USDCAD @ 0.9877 ( 0 / 0 )', 129, '2011-08-08 13:27:27'),
(273, 12392605, 'Buy 0.1 Lots of USDCAD @ 0.9878 ( 0 / 0 )', 0, '2011-08-08 13:27:31'),
(274, 12392605, 'Buy 0.1 Lots of EURUSD @ 1.4182 ( 0 / 0 )', 129, '2011-08-08 14:03:15'),
(275, 12392605, 'Sell 0.1 Lots of EURUSD @ 1.4182 ( 0 / 0 )', 0, '2011-08-08 14:03:19'),
(276, 12392605, 'Close Order 1962174 By 1962187', 0, '2011-08-08 19:08:18'),
(277, 50, 'Close Order 1962115 Buy 0.3 of EURUSD @ 1.4269', 0, '2011-08-09 09:54:22'),
(278, 50, 'Close Order 1962126 Buy 0.2 of EURUSD @ 1.4269', 0, '2011-08-09 11:21:38'),
(279, 50, 'Close Order 1961958 Buy 0.1 of AUDUSD @ 1.0205', 129, '2011-08-09 11:23:07'),
(280, 50, 'Close Order 1961958 Buy 0.1 of AUDUSD @ 1.0205', 0, '2011-08-09 11:23:15'),
(281, 50, 'Close Order 1961960 Buy 0.1 of AUDUSD @ 1.0198', 129, '2011-08-09 11:30:48'),
(282, 50, 'Close Order 1961960 Buy 0.1 of AUDUSD @ 1.0196', 129, '2011-08-09 11:30:57'),
(283, 50, 'Close Order 1961960 Buy 0.1 of AUDUSD @ 1.0195', 129, '2011-08-09 11:31:05'),
(284, 50, 'Close Order 1961960 Buy 0.1 of AUDUSD @ 1.0196', 0, '2011-08-09 11:33:55'),
(285, 50, 'Close Order 1961962 Buy 0.1 of AUDUSD @ 1.0199', 0, '2011-08-09 11:34:22'),
(286, 50, 'Close Order 1961964 Buy 0.1 of AUDUSD @ 1.0200', 129, '2011-08-09 11:34:51'),
(287, 50, 'Close Order 1961964 Buy 0.1 of AUDUSD @ 1.0201', 0, '2011-08-09 11:34:58'),
(288, 12392606, 'Buy 0.1 Lots of EURUSD @ 1.4249 ( 0 / 0 )', 129, '2011-08-09 16:04:01'),
(289, 12392606, 'Sell 0.1 Lots of EURCHF @ 1.0399 ( 0 / 0 )', 0, '2011-08-09 16:09:11'),
(290, 50, 'Buy 0.1 Lots of EURUSD @ 1.4229 ( 0 / 0 )', 0, '2011-08-09 18:21:54'),
(291, 50, 'Buy 0.1 Lots of EURUSD @ 1.4227 ( 0 / 0 )', 129, '2011-08-09 18:22:03'),
(292, 50, 'Buy 0.1 Lots of EURUSD @ 1.4215 ( 0 / 0 )', 129, '2011-08-09 18:22:08'),
(293, 50, 'Buy 0.1 Lots of EURUSD @ 1.4218 ( 0 / 0 )', 129, '2011-08-09 18:22:11'),
(294, 50, 'Buy 0.1 Lots of EURUSD @ 1.4218 ( 0 / 0 )', 129, '2011-08-09 18:22:14'),
(295, 50, 'Buy 0.1 Lots of EURUSD @ 1.4218 ( 0 / 0 )', 129, '2011-08-09 18:22:18'),
(296, 50, 'Buy 0.1 Lots of EURUSD @ 1.4220 ( 0 / 0 )', 129, '2011-08-09 18:22:35'),
(297, 50, 'Buy 0.1 Lots of EURUSD @ 1.4220 ( 0 / 0 )', 129, '2011-08-09 18:22:38'),
(298, 50, 'Buy 0.1 Lots of EURUSD @ 1.4220 ( 0 / 0 )', 129, '2011-08-09 18:22:43'),
(299, 50, 'Buy 0.1 Lots of EURUSD @ 1.4220 ( 0 / 0 )', 129, '2011-08-09 18:22:46'),
(300, 50, 'Buy 0.1 Lots of EURUSD @ 1.4220 ( 0 / 0 )', 129, '2011-08-09 18:23:14'),
(301, 50, 'Buy 0.1 Lots of EURUSD @ 1.4220 ( 0 / 0 )', 129, '2011-08-09 18:23:20'),
(302, 50, 'Buy 0.1 Lots of EURUSD @ 1.4257 ( 0 / 0 )', 129, '2011-08-09 18:25:15'),
(303, 50, 'Buy 0.1 Lots of EURUSD @ 1.4258 ( 0 / 0 )', 129, '2011-08-09 18:25:21'),
(304, 50, 'Buy 0.1 Lots of EURUSD @ 1.4258 ( 0 / 0 )', 129, '2011-08-09 18:25:24'),
(305, 50, 'Buy 0.1 Lots of EURUSD @ 1.4259 ( 0 / 0 )', 0, '2011-08-09 18:25:27'),
(306, 50, 'Buy 0.1 Lots of EURUSD @ 1.4271 ( 0 / 0 )', 0, '2011-08-09 18:28:00'),
(307, 50, 'Buy 0.1 Lots of EURUSD @ 1.4282 ( 0 / 0 )', 0, '2011-08-09 18:28:12'),
(308, 50, 'Buy 0.1 Lots of EURUSD @ 1.4282 ( 0 / 0 )', 129, '2011-08-09 18:28:15'),
(309, 50, 'Buy 0.1 Lots of EURUSD @ 1.4282 ( 0 / 0 )', 129, '2011-08-09 18:28:21'),
(310, 50, 'Buy 0.1 Lots of EURUSD @ 1.4277 ( 0 / 0 )', 129, '2011-08-09 18:28:28'),
(311, 50, 'Buy 0.1 Lots of EURUSD @ 1.4277 ( 0 / 0 )', 129, '2011-08-09 18:28:32'),
(312, 50, 'Buy 0.1 Lots of EURUSD @ 1.4278 ( 0 / 0 )', 129, '2011-08-09 18:28:38'),
(313, 50, 'Buy 0.1 Lots of EURUSD @ 1.4278 ( 0 / 0 )', 129, '2011-08-09 18:28:44'),
(314, 50, 'Buy 0.1 Lots of EURUSD @ 1.4278 ( 0 / 0 )', 129, '2011-08-09 18:29:15'),
(315, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6250 ( 0 / 0 )', 129, '2011-08-09 18:29:41'),
(316, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6250 ( 0 / 0 )', 129, '2011-08-09 18:29:51'),
(317, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6250 ( 0 / 0 )', 0, '2011-08-09 18:29:54'),
(318, 50, 'Close Order 1962211 Buy 0.1 of EURUSD @ 1.4368', 0, '2011-08-10 10:13:40'),
(319, 50, 'Close Order 1962213 By 1962093', 0, '2011-08-10 10:13:58'),
(320, 50, 'Buy 0.1 Lots of EURUSD @ 1.4369 ( 0 / 0 )', 129, '2011-08-10 10:14:20'),
(321, 50, 'Buy 0.1 Lots of EURUSD @ 1.4369 ( 0 / 0 )', 0, '2011-08-10 10:14:23'),
(322, 50, 'Sell 0.1 Lots of EURUSD @ 1.4367 ( 0 / 0 )', 0, '2011-08-10 10:14:44'),
(323, 50, 'Sell 0.1 Lots of EURUSD @ 1.4367 ( 0 / 0 )', 0, '2011-08-10 10:14:47'),
(324, 50, 'Buy 0.1 Lots of EURUSD @ 1.4370 ( 0 / 0 )', 0, '2011-08-10 10:14:50'),
(325, 50, 'Sell 0.1 Lots of EURUSD @ 1.4367 ( 0 / 0 )', 0, '2011-08-10 10:14:55'),
(326, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6263 ( 0 / 0 )', 129, '2011-08-10 10:15:05'),
(327, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6263 ( 0 / 0 )', 129, '2011-08-10 10:15:09'),
(328, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6264 ( 0 / 0 )', 0, '2011-08-10 10:15:41'),
(329, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6266 ( 0 / 0 )', 0, '2011-08-10 10:16:13'),
(330, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6266 ( 0 / 0 )', 129, '2011-08-10 10:16:16'),
(331, 50, 'Sell 0.1 Lots of EURGBP @ 0.8834 ( 0 / 0 )', 0, '2011-08-10 10:16:24'),
(332, 50, 'Close Order 1962219 Buy 0.1 of GBPUSD @ 1.6178', 0, '2011-08-11 08:32:11'),
(333, 50, 'Close All EURUSD', 0, '2011-08-11 08:33:11'),
(334, 50, 'Sell 0.1 Lots of EURAUD @ 1.3870 ( 0 / 0 )', 129, '2011-08-11 08:37:52'),
(335, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6181 ( 0 / 0 )', 0, '2011-08-11 08:44:40'),
(336, 50, 'Sell 0.4 Lots of GBPUSD @ 1.6180 ( 0 / 0 )', 0, '2011-08-11 08:44:54'),
(337, 50, 'Sell 0.4 Lots of GBPUSD @ 1.6180 ( 0 / 0 )', 0, '2011-08-11 08:44:58'),
(338, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6183 ( 0 / 0 )', 0, '2011-08-11 08:45:03'),
(339, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6183 ( 0 / 0 )', 0, '2011-08-11 08:45:07'),
(340, 50, 'Sell 0.4 Lots of GBPUSD @ 1.6180 ( 0 / 0 )', 0, '2011-08-11 08:45:15'),
(341, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6183 ( 0 / 0 )', 0, '2011-08-11 08:45:30'),
(342, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6183 ( 0 / 0 )', 0, '2011-08-11 08:45:34'),
(343, 50, 'Close Order 1962270 Buy 0.4 of GBPUSD @ 1.6179', 129, '2011-08-11 08:49:29'),
(344, 50, 'Close Order 1962270 Buy 0.4 of GBPUSD @ 1.6179', 129, '2011-08-11 08:50:02'),
(345, 50, 'Close Order 1962270 Buy 0.4 of GBPUSD @ 1.6178', 0, '2011-08-11 08:50:57'),
(346, 50, 'Close Order 1962268 Buy 0.4 of GBPUSD @ 1.6178', 0, '2011-08-11 08:51:23'),
(347, 50, 'Close Order 1962266 Sell 0.4 of GBPUSD @ 1.6140', 129, '2011-08-11 09:45:32'),
(348, 50, 'Close Order 1962266 Sell 0.4 of GBPUSD @ 1.6137', 0, '2011-08-11 09:45:45'),
(349, 50, 'Close Order 1962264 Buy 0.4 of GBPUSD @ 1.6126', 129, '2011-08-11 09:49:29'),
(350, 50, 'Close Order 1962264 Buy 0.4 of GBPUSD @ 1.6124', 129, '2011-08-11 09:49:49'),
(351, 50, 'Close Order 1962264 Buy 0.4 of GBPUSD @ 1.6125', 129, '2011-08-11 09:49:56'),
(352, 50, 'Close Order 1962264 Buy 0.4 of GBPUSD @ 1.6127', 0, '2011-08-11 09:57:36'),
(353, 50, 'Close Order 1962262 Buy 0.4 of GBPUSD @ 1.6127', 129, '2011-08-11 10:03:06'),
(354, 50, 'Close Order 1962262 Buy 0.4 of GBPUSD @ 1.6127', 129, '2011-08-11 10:03:16'),
(355, 50, 'Close Order 1962262 Buy 0.4 of GBPUSD @ 1.6127', 0, '2011-08-11 10:03:27'),
(356, 50, 'Close Order 1962260 Sell 0.4 of GBPUSD @ 1.6130', 0, '2011-08-11 10:04:39'),
(357, 50, 'Close Order 1962256 Buy 0.4 of GBPUSD @ 1.6132', 0, '2011-08-11 10:05:07'),
(358, 50, 'Close Order 1962236 Buy 0.1 of GBPUSD @ 1.6128', 0, '2011-08-11 10:06:27'),
(359, 50, 'Close All GBPUSD', 0, '2011-08-11 10:06:52'),
(360, 50, 'Buy 0.3 Lots of GBPUSD @ 1.6165 ( 0 / 0 )', 0, '2011-08-11 10:58:00'),
(361, 50, 'Close Order 1962296 Buy 0.3 of GBPUSD @ 1.6161', 129, '2011-08-11 10:58:26'),
(362, 50, 'Close Order 1962296 Buy 0.3 of GBPUSD @ 1.6161', 129, '2011-08-11 10:58:34'),
(363, 50, 'Close Order 1962296 Buy 0.3 of GBPUSD @ 1.6156', 0, '2011-08-11 10:58:45'),
(364, 50, 'Buy 0.3 Lots of GBPUSD @ 1.6159 ( 0 / 0 )', 0, '2011-08-11 11:03:33'),
(365, 50, 'Close Order 1962302 Buy 0.3 of GBPUSD @ 1.6148', 0, '2011-08-11 11:06:33'),
(366, 50, 'Close Order 1962238 Sell 0.1 of GBPUSD @ 1.6157', 0, '2011-08-11 11:36:03'),
(367, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6155 ( 0 / 0 )', 0, '2011-08-11 11:53:54'),
(368, 50, 'Close Order 1962258 Sell 0.4 of GBPUSD @ 1.6154', 129, '2011-08-11 11:55:06'),
(369, 50, 'Close Order 1962258 Sell 0.4 of GBPUSD @ 1.6157', 0, '2011-08-11 11:55:16'),
(370, 50, 'Close Order 1962228 Sell 0.1 of EURUSD @ 1.4151', 0, '2011-08-11 11:56:41'),
(371, 50, 'Close Order 1962230 Sell 0.1 of EURUSD @ 1.4156', 129, '2011-08-11 11:57:44'),
(372, 50, 'Close Order 1962230 Sell 0.1 of EURUSD @ 1.4154', 129, '2011-08-11 11:58:02'),
(373, 50, 'Close Order 1962230 Sell 0.1 of EURUSD @ 1.4153', 0, '2011-08-11 11:58:10'),
(374, 50, 'Buy 0.1 Lots of EURUSD @ 1.4139 ( 0 / 0 )', 0, '2011-08-11 12:17:56'),
(375, 50, 'Buy 0.1 Lots of USDCHF @ 0.7427 ( 0 / 0 )', 0, '2011-08-11 12:18:08'),
(376, 50, 'Sell 0.1 Lots of USDCHF @ 0.7424 ( 0 / 0 )', 0, '2011-08-11 12:18:13'),
(377, 50, 'Sell 0.1 Lots of USDCHF @ 0.7424 ( 0 / 0 )', 0, '2011-08-11 12:18:17'),
(378, 50, 'Sell 0.2 Lots of USDCHF @ 0.7423 ( 0 / 0 )', 0, '2011-08-11 12:18:24'),
(379, 50, 'Buy 0.1 Lots of CHFJPY @ 103.22 ( 0 / 0 )', 129, '2011-08-11 12:19:08'),
(380, 50, 'Buy 0.1 Lots of CHFJPY @ 103.24 ( 0 / 0 )', 129, '2011-08-11 12:19:17'),
(381, 50, 'Buy 0.1 Lots of CHFJPY @ 103.26 ( 0 / 0 )', 129, '2011-08-11 12:19:27'),
(382, 50, 'Buy 0.1 Lots of CHFJPY @ 103.26 ( 0 / 0 )', 0, '2011-08-11 12:19:33'),
(383, 50, 'Buy 0.1 Lots of CHFJPY @ 103.24 ( 0 / 0 )', 129, '2011-08-11 12:19:49'),
(384, 50, 'Buy 0.1 Lots of CHFJPY @ 103.26 ( 0 / 0 )', 0, '2011-08-11 12:19:58'),
(385, 50, 'Buy 0.1 Lots of CHFJPY @ 103.26 ( 0 / 0 )', 129, '2011-08-11 12:20:02'),
(386, 50, 'Buy 0.1 Lots of CHFJPY @ 103.26 ( 0 / 0 )', 0, '2011-08-11 12:20:08'),
(387, 50, 'Buy 0.1 Lots of USDJPY @ 76.63 ( 0 / 0 )', 0, '2011-08-11 12:23:34'),
(388, 50, 'Buy 0.1 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:23:47'),
(389, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:23:51'),
(390, 50, 'Buy 0.4 Lots of USDCHF @ 0.7437 ( 0 / 0 )', 0, '2011-08-11 12:24:06'),
(391, 50, 'Sell 0.4 Lots of USDCHF @ 0.7434 ( 0 / 0 )', 0, '2011-08-11 12:24:12'),
(392, 50, 'Buy 0.1 Lots of EURUSD @ 1.4137 ( 0 / 0 )', 0, '2011-08-11 12:25:42'),
(393, 50, 'Buy 0.1 Lots of EURUSD @ 1.4137 ( 0 / 0 )', 129, '2011-08-11 12:25:46'),
(394, 50, 'Buy 0.1 Lots of EURUSD @ 1.4137 ( 0 / 0 )', 129, '2011-08-11 12:25:51'),
(395, 50, 'Buy 0.1 Lots of EURUSD @ 1.4137 ( 0 / 0 )', 129, '2011-08-11 12:25:55'),
(396, 50, 'Buy 0.1 Lots of EURUSD @ 1.4137 ( 0 / 0 )', 129, '2011-08-11 12:25:59'),
(397, 50, 'Buy 0.1 Lots of EURUSD @ 1.4137 ( 0 / 0 )', 129, '2011-08-11 12:26:02'),
(398, 50, 'Buy 0.1 Lots of EURUSD @ 1.4140 ( 0 / 0 )', 129, '2011-08-11 12:26:39'),
(399, 50, 'Buy 0.1 Lots of EURUSD @ 1.4138 ( 0 / 0 )', 129, '2011-08-11 12:26:46'),
(400, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:27:06'),
(401, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 0, '2011-08-11 12:27:10'),
(402, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 0, '2011-08-11 12:27:16'),
(403, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 0, '2011-08-11 12:27:21'),
(404, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:30:38'),
(405, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:30:54'),
(406, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:31:00'),
(407, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:31:11'),
(408, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:31:16'),
(409, 50, 'Buy 0.2 Lots of USDJPY @ 76.63 ( 0 / 0 )', 129, '2011-08-11 12:31:20'),
(410, 50, 'Buy 0.1 Lots of EURUSD @ 1.4111 ( 0 / 0 )', 129, '2011-08-11 12:35:01'),
(411, 50, 'Buy 0.1 Lots of EURUSD @ 1.4109 ( 0 / 0 )', 0, '2011-08-11 12:35:08'),
(412, 50, 'Buy 0.1 Lots of EURUSD @ 1.4113 ( 0 / 0 )', 0, '2011-08-11 12:35:20'),
(413, 50, 'Buy 0.1 Lots of EURUSD @ 1.4111 ( 0 / 0 )', 0, '2011-08-11 12:36:05'),
(414, 50, 'Buy 0.1 Lots of EURUSD @ 1.4111 ( 0 / 0 )', 129, '2011-08-11 12:36:14'),
(415, 50, 'Buy 0.1 Lots of EURUSD @ 1.4109 ( 0 / 0 )', 0, '2011-08-11 12:36:20'),
(416, 50, 'Buy 0.1 Lots of EURUSD @ 1.4109 ( 0 / 0 )', 129, '2011-08-11 12:36:30'),
(417, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:53:48'),
(418, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:53:54'),
(419, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:02'),
(420, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:06'),
(421, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:11'),
(422, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:17'),
(423, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:30'),
(424, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:34'),
(425, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:48'),
(426, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:52'),
(427, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:54:59'),
(428, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:55:13'),
(429, 50, 'Buy 0.1 Lots of EURUSD @ 1.4131 ( 0 / 0 )', 129, '2011-08-11 12:55:17'),
(430, 50, 'Buy 0.1 Lots of EURUSD @ 1.4167 ( 0 / 0 )', 129, '2011-08-11 12:58:52'),
(431, 50, 'Buy 0.1 Lots of EURUSD @ 1.4168 ( 0 / 0 )', 129, '2011-08-11 12:59:07'),
(432, 50, 'Buy 0.1 Lots of EURUSD @ 1.4179 ( 0 / 0 )', 129, '2011-08-11 13:02:11'),
(433, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6157 ( 0 / 0 )', 129, '2011-08-11 13:02:39'),
(434, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6146 ( 0 / 0 )', 129, '2011-08-11 13:04:05'),
(435, 50, 'Sell 0.4 Lots of GBPUSD @ 1.6145 ( 0 / 0 )', 129, '2011-08-11 13:04:13'),
(436, 50, 'Sell 0.4 Lots of GBPUSD @ 1.6147 ( 0 / 0 )', 0, '2011-08-11 13:04:19'),
(437, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6190 ( 0 / 0 )', 0, '2011-08-11 13:23:54'),
(438, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6190 ( 0 / 0 )', 129, '2011-08-11 13:24:00'),
(439, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6193 ( 0 / 0 )', 0, '2011-08-11 13:24:42'),
(440, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6193 ( 0 / 0 )', 0, '2011-08-11 13:24:48'),
(441, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6193 ( 0 / 0 )', 129, '2011-08-11 13:24:56'),
(442, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6194 ( 0 / 0 )', 129, '2011-08-11 13:25:06'),
(443, 50, 'Buy 0.2 Lots of EURUSD @ 1.4200 ( 0 / 0 )', 129, '2011-08-11 13:53:13'),
(444, 50, 'Buy 0.2 Lots of EURUSD @ 1.4199 ( 0 / 0 )', 0, '2011-08-11 13:53:19'),
(445, 50, 'Buy 0.2 Lots of EURUSD @ 1.4198 ( 0 / 0 )', 129, '2011-08-11 13:53:35'),
(446, 50, 'Buy 0.2 Lots of EURUSD @ 1.4188 ( 0 / 0 )', 0, '2011-08-11 13:54:48'),
(447, 50, 'Buy 0.3 Lots of EURUSD @ 1.4188 ( 0 / 0 )', 129, '2011-08-11 13:54:56'),
(448, 50, 'Buy 0.3 Lots of EURUSD @ 1.4188 ( 0 / 0 )', 129, '2011-08-11 13:54:59'),
(449, 50, 'Buy 0.3 Lots of EURUSD @ 1.4192 ( 0 / 0 )', 0, '2011-08-11 13:55:06'),
(450, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0231 ( 0 / 0 )', 129, '2011-08-11 13:55:18'),
(451, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0231 ( 0 / 0 )', 129, '2011-08-11 13:55:21'),
(452, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0228 ( 0 / 0 )', 0, '2011-08-11 13:55:30'),
(453, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0227 ( 0 / 0 )', 0, '2011-08-11 13:55:36'),
(454, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0227 ( 0 / 0 )', 129, '2011-08-11 13:55:40'),
(455, 50, 'Buy 0.3 Lots of AUDUSD @ 1.0227 ( 0 / 0 )', 0, '2011-08-11 13:55:50'),
(456, 50, 'Buy 0.3 Lots of AUDUSD @ 1.0226 ( 0 / 0 )', 129, '2011-08-11 13:55:53'),
(457, 50, 'Buy 0.5 Lots of AUDUSD @ 1.0226 ( 0 / 0 )', 129, '2011-08-11 13:56:01'),
(458, 50, 'Buy 0.9 Lots of AUDUSD @ 1.0227 ( 0 / 0 )', 129, '2011-08-11 13:56:12'),
(459, 50, 'Buy 0.9 Lots of AUDUSD @ 1.0226 ( 0 / 0 )', 129, '2011-08-11 13:56:15'),
(460, 50, 'Buy 0.1 Lots of EURCAD @ 1.4117 ( 0 / 0 )', 129, '2011-08-11 13:56:33'),
(461, 50, 'Buy 0.2 Lots of EURCAD @ 1.4115 ( 0 / 0 )', 129, '2011-08-11 13:56:48'),
(462, 50, 'Buy 0.1 Lots of EURCAD @ 1.4112 ( 0 / 0 )', 129, '2011-08-11 13:57:07'),
(463, 50, 'Buy 1.1 Lots of AUDUSD @ 1.0236 ( 0 / 0 )', 129, '2011-08-11 13:57:08'),
(464, 50, 'Buy 1.1 Lots of AUDUSD @ 1.0237 ( 0 / 0 )', 129, '2011-08-11 13:57:11'),
(465, 50, 'Buy 0.1 Lots of EURCAD @ 1.4114 ( 0 / 0 )', 0, '2011-08-11 13:57:17'),
(466, 50, 'Buy 0.6 Lots of EURCAD @ 1.4115 ( 0 / 0 )', 0, '2011-08-11 13:57:40'),
(467, 50, 'Buy 0.4 Lots of AUDUSD @ 1.0243 ( 0 / 0 )', 0, '2011-08-11 13:58:48'),
(468, 50, 'Buy 0.5 Lots of AUDUSD @ 1.0239 ( 0 / 0 )', 129, '2011-08-11 13:58:57'),
(469, 50, 'Buy 0.7 Lots of AUDUSD @ 1.0239 ( 0 / 0 )', 0, '2011-08-11 13:59:05'),
(470, 50, 'Buy 0.1 Lots of EURGBP @ 0.8776 ( 0 / 0 )', 129, '2011-08-11 14:00:46'),
(471, 50, 'Buy 0.1 Lots of EURGBP @ 0.8776 ( 0 / 0 )', 129, '2011-08-11 14:00:49'),
(472, 50, 'Buy 0.1 Lots of EURGBP @ 0.8776 ( 0 / 0 )', 0, '2011-08-11 14:00:52'),
(473, 50, 'Buy 0.1 Lots of EURUSD @ 1.4206 ( 0 / 0 )', 129, '2011-08-11 14:00:54'),
(474, 50, 'Buy 0.2 Lots of EURUSD @ 1.4209 ( 0 / 0 )', 129, '2011-08-11 14:01:07'),
(475, 50, 'Buy 0.2 Lots of EURUSD @ 1.4209 ( 0 / 0 )', 129, '2011-08-11 14:01:10'),
(476, 50, 'Buy 0.2 Lots of EURUSD @ 1.4208 ( 0 / 0 )', 0, '2011-08-11 14:01:16'),
(477, 50, 'Buy 0.2 Lots of USDCHF @ 0.7681 ( 0 / 0 )', 129, '2011-08-11 14:02:05'),
(478, 50, 'Buy 0.2 Lots of USDCHF @ 0.7680 ( 0 / 0 )', 129, '2011-08-11 14:02:13'),
(479, 50, 'Buy 0.2 Lots of USDCHF @ 0.7676 ( 0 / 0 )', 129, '2011-08-11 14:02:18'),
(480, 50, 'Buy 0.4 Lots of USDCHF @ 0.7679 ( 0 / 0 )', 129, '2011-08-11 14:02:27'),
(481, 50, 'Buy 0.1 Lots of EURGBP @ 0.8772 ( 0 / 0 )', 129, '2011-08-11 14:02:36'),
(482, 50, 'Buy 0.1 Lots of EURGBP @ 0.8773 ( 0 / 0 )', 0, '2011-08-11 14:02:41'),
(483, 50, 'Buy 0.1 Lots of EURGBP @ 0.8773 ( 0 / 0 )', 0, '2011-08-11 14:02:49'),
(484, 50, 'Buy 0.1 Lots of EURGBP @ 0.8773 ( 0 / 0 )', 129, '2011-08-11 14:02:53'),
(485, 50, 'Buy 0.2 Lots of EURGBP @ 0.8773 ( 0 / 0 )', 129, '2011-08-11 14:03:00'),
(486, 50, 'Buy 0.3 Lots of EURGBP @ 0.8769 ( 0 / 0 )', 129, '2011-08-11 14:03:06'),
(487, 50, 'Buy 0.3 Lots of EURGBP @ 0.8770 ( 0 / 0 )', 0, '2011-08-11 14:03:11'),
(488, 50, 'Buy 0.7 Lots of EURGBP @ 0.8770 ( 0 / 0 )', 129, '2011-08-11 14:03:21'),
(489, 50, 'Buy 0.7 Lots of EURGBP @ 0.8769 ( 0 / 0 )', 129, '2011-08-11 14:03:28'),
(490, 50, 'Buy 0.7 Lots of EURGBP @ 0.8772 ( 0 / 0 )', 0, '2011-08-11 14:03:45'),
(491, 50, 'Close Order 1962391 Buy 0.1 of EURGBP @ 0.8771', 0, '2011-08-11 14:04:10'),
(492, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0244', 129, '2011-08-11 14:04:28'),
(493, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0242', 129, '2011-08-11 14:04:36'),
(494, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0240', 129, '2011-08-11 14:04:46'),
(495, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0241', 129, '2011-08-11 14:04:53'),
(496, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0241', 129, '2011-08-11 14:05:00'),
(497, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0241', 129, '2011-08-11 14:05:07'),
(498, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0245', 129, '2011-08-11 14:05:15'),
(499, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0241', 129, '2011-08-11 14:05:22'),
(500, 50, 'Close Order 1962381 Buy 0.4 of AUDUSD @ 1.0241', 129, '2011-08-11 14:05:22'),
(501, 50, 'Buy 0.1 Lots of USDCHF @ 0.7655 ( 0 / 0 )', 0, '2011-08-11 14:30:49'),
(502, 50, 'Buy 0.2 Lots of EURUSD @ 1.4240 ( 0 / 0 )', 0, '2011-08-12 09:59:07'),
(503, 50, 'Buy 0.2 Lots of EURUSD @ 1.4240 ( 0 / 0 )', 0, '2011-08-12 09:59:11'),
(504, 50, 'Buy 0.1 Lots of EURUSD @ 1.4242 ( 0 / 0 )', 0, '2011-08-12 10:05:31'),
(505, 50, 'Buy 0.3 Lots of EURUSD @ 1.4242 ( 0 / 0 )', 0, '2011-08-12 10:05:43'),
(506, 50, 'Buy 0.2 Lots of EURCHF @ 1.1373 ( 0 / 0 )', 0, '2011-08-15 09:01:06'),
(507, 50, 'Buy 0.2 Lots of EURCHF @ 1.1373 ( 0 / 0 )', 0, '2011-08-15 09:01:10'),
(508, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 09:01:55'),
(509, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 0, '2011-08-15 09:02:06'),
(510, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 0, '2011-08-15 09:02:10'),
(511, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:20'),
(512, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:30'),
(513, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:34'),
(514, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:38'),
(515, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:41'),
(516, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:46'),
(517, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:54'),
(518, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:06:57'),
(519, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:10'),
(520, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:16'),
(521, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:19'),
(522, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:23'),
(523, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:29'),
(524, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:34'),
(525, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:40'),
(526, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:07:44'),
(527, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 0, '2011-08-15 09:20:18'),
(528, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:20:24'),
(529, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6317 ( 0 / 0 )', 129, '2011-08-15 09:20:30'),
(530, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6317 ( 0 / 0 )', 129, '2011-08-15 09:20:36'),
(531, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6317 ( 0 / 0 )', 129, '2011-08-15 09:20:40'),
(532, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6317 ( 0 / 0 )', 129, '2011-08-15 09:20:42'),
(533, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 0, '2011-08-15 09:20:51'),
(534, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 0, '2011-08-15 09:20:57'),
(535, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 09:21:04'),
(536, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6316 ( 0 / 0 )', 0, '2011-08-15 09:23:36'),
(537, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6316 ( 0 / 0 )', 0, '2011-08-15 09:23:43'),
(538, 50, 'Sell 0.3 Lots of GBPUSD @ 1.6313 ( 0 / 0 )', 0, '2011-08-15 09:23:52'),
(539, 50, 'Sell 0.3 Lots of GBPUSD @ 1.6313 ( 0 / 0 )', 0, '2011-08-15 09:24:07'),
(540, 50, 'Buy 0.3 Lots of GBPUSD @ 1.6316 ( 0 / 0 )', 0, '2011-08-15 09:24:13'),
(541, 50, 'Buy 0.4 Lots of USDJPY @ 76.90 ( 0 / 0 )', 0, '2011-08-15 09:27:21'),
(542, 50, 'Buy 0.4 Lots of USDJPY @ 76.90 ( 0 / 0 )', 0, '2011-08-15 09:27:35'),
(543, 50, 'Buy 0.4 Lots of USDJPY @ 76.90 ( 0 / 0 )', 0, '2011-08-15 09:27:45'),
(544, 50, 'Buy 0.4 Lots of USDJPY @ 76.90 ( 0 / 0 )', 0, '2011-08-15 09:27:53'),
(545, 50, 'Buy 0.4 Lots of USDJPY @ 76.90 ( 0 / 0 )', 0, '2011-08-15 09:27:58'),
(546, 50, 'Buy 0.4 Lots of USDJPY @ 76.90 ( 0 / 0 )', 0, '2011-08-15 09:28:25'),
(547, 50, 'Buy 0.4 Lots of USDJPY @ 76.90 ( 0 / 0 )', 0, '2011-08-15 09:28:33'),
(548, 50, 'Buy 0.4 Lots of USDJPY @ 76.86 ( 0 / 0 )', 0, '2011-08-15 09:48:54'),
(549, 50, 'Buy 0.4 Lots of USDJPY @ 76.86 ( 0 / 0 )', 0, '2011-08-15 09:49:17'),
(550, 50, 'Buy 0.4 Lots of USDJPY @ 76.86 ( 0 / 0 )', 0, '2011-08-15 09:49:24'),
(551, 50, 'Buy 0.4 Lots of USDJPY @ 76.86 ( 0 / 0 )', 0, '2011-08-15 09:49:27'),
(552, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6316 ( 0 / 0 )', 129, '2011-08-15 09:51:09'),
(553, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6312 ( 0 / 0 )', 0, '2011-08-15 09:51:14'),
(554, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6312 ( 0 / 0 )', 129, '2011-08-15 09:51:17'),
(555, 50, 'Close Order 1962335 Buy 0.1 of USDJPY @ 76.83', 0, '2011-08-15 10:02:08'),
(556, 50, 'Close Order 1962452 Buy 0.4 of USDJPY @ 76.83', 0, '2011-08-15 10:02:28'),
(557, 50, 'Close Order 1962442 Buy 0.4 of USDJPY @ 76.81', 0, '2011-08-15 10:02:48'),
(558, 50, 'Close Order 1962442 Buy 0.4 of USDJPY @ 76.81', 4051, '2011-08-15 10:02:55'),
(559, 50, 'Buy 0.1 Lots of USDJPY @ 76.87 ( 0 / 0 )', 0, '2011-08-15 10:42:58'),
(560, 50, 'Buy 0.3 Lots of USDJPY @ 76.86 ( 0 / 0 )', 0, '2011-08-15 10:43:08'),
(561, 50, 'Buy 0.2 Lots of USDJPY @ 76.86 ( 0 / 0 )', 0, '2011-08-15 10:43:19'),
(562, 50, 'Buy 0.1 Lots of USDJPY @ 76.86 ( 0 / 0 )', 0, '2011-08-15 10:43:27'),
(563, 50, 'Buy 0.1 Lots of EURUSD @ 1.4294 ( 0 / 0 )', 0, '2011-08-15 11:21:24'),
(564, 50, 'Buy 0.1 Lots of EURUSD @ 1.4294 ( 0 / 0 )', 0, '2011-08-15 11:21:28'),
(565, 50, 'Buy 0.1 Lots of EURUSD @ 1.4296 ( 0 / 0 )', 0, '2011-08-15 11:24:49'),
(566, 50, 'Buy 0.1 Lots of EURUSD @ 1.4296 ( 0 / 0 )', 0, '2011-08-15 11:24:55'),
(567, 50, 'Buy 0.1 Lots of EURUSD @ 1.4296 ( 0 / 0 )', 0, '2011-08-15 11:25:06'),
(568, 50, 'Buy 0.1 Lots of EURUSD @ 1.4296 ( 0 / 0 )', 0, '2011-08-15 11:25:21'),
(569, 50, 'Buy 0.1 Lots of EURUSD @ 1.4296 ( 0 / 0 )', 0, '2011-08-15 11:25:32'),
(570, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6305 ( 0 / 0 )', 0, '2011-08-15 11:27:16'),
(571, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6305 ( 0 / 0 )', 0, '2011-08-15 11:27:28'),
(572, 50, 'Close All EURUSD', 0, '2011-08-15 11:28:07'),
(573, 50, 'Close All GBPUSD', 0, '2011-08-15 11:29:33'),
(574, 50, 'Close All GBPUSD', 0, '2011-08-15 11:29:33'),
(575, 50, 'Close All EURGBP', 0, '2011-08-15 11:29:52'),
(576, 50, 'Close All EURGBP', 0, '2011-08-15 11:29:52'),
(577, 50, 'Buy 0.1 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:36:20'),
(578, 50, 'Buy 0.4 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:36:32'),
(579, 50, 'Close All USDCHF', 0, '2011-08-15 11:37:52'),
(580, 50, 'Close All USDCHF', 0, '2011-08-15 11:38:07'),
(581, 50, 'Close All USDCHF', 0, '2011-08-15 11:38:07'),
(582, 50, 'Close All USDCHF', 0, '2011-08-15 11:38:39'),
(583, 50, 'Close All USDCHF', 0, '2011-08-15 11:38:39'),
(584, 50, 'Buy 0.4 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:43:10'),
(585, 50, 'Buy 0.4 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:43:43'),
(586, 50, 'Buy 0.4 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:43:52'),
(587, 50, 'Buy 0.4 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:43:59'),
(588, 50, 'Buy 0.4 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:44:04'),
(589, 50, 'Buy 0.3 Lots of USDJPY @ 76.81 ( 0 / 0 )', 129, '2011-08-15 11:45:25'),
(590, 50, 'Buy 0.3 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:45:29'),
(591, 50, 'Buy 0.3 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:45:36'),
(592, 50, 'Buy 0.1 Lots of USDJPY @ 76.82 ( 0 / 0 )', 0, '2011-08-15 11:46:31'),
(593, 50, 'Buy 0.5 Lots of USDJPY @ 76.83 ( 0 / 0 )', 0, '2011-08-15 11:46:38'),
(594, 50, 'Buy 0.9 Lots of USDJPY @ 76.83 ( 0 / 0 )', 0, '2011-08-15 11:46:45'),
(595, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6325 ( 0 / 0 )', 129, '2011-08-15 12:11:45'),
(596, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 0, '2011-08-15 12:13:52'),
(597, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:13:56'),
(598, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 0, '2011-08-15 12:14:02'),
(599, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 0, '2011-08-15 12:14:08'),
(600, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:15:25'),
(601, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:15:30'),
(602, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:15:35'),
(603, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:15:39'),
(604, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:15:44'),
(605, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:15:59'),
(606, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:16:05'),
(607, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6323 ( 0 / 0 )', 129, '2011-08-15 12:16:09'),
(608, 50, 'Buy 0.2 Lots of USDJPY @ 76.78 ( 0 / 0 )', 0, '2011-08-15 12:17:52'),
(609, 50, 'Buy 0.2 Lots of USDJPY @ 76.78 ( 0 / 0 )', 129, '2011-08-15 12:17:59');
INSERT INTO `mt4_requests` (`id`, `login`, `request`, `status`, `time_create`) VALUES
(610, 50, 'Buy 0.2 Lots of USDJPY @ 76.80 ( 0 / 0 )', 0, '2011-08-15 12:18:05'),
(611, 50, 'Buy 0.2 Lots of USDJPY @ 76.80 ( 0 / 0 )', 0, '2011-08-15 12:18:08'),
(612, 50, 'Buy 0.2 Lots of USDJPY @ 76.80 ( 0 / 0 )', 0, '2011-08-15 12:18:14'),
(613, 50, 'Buy 0.1 Lots of USDCHF @ 0.7916 ( 0 / 0 )', 0, '2011-08-15 12:18:20'),
(614, 50, 'Buy 0.2 Lots of USDJPY @ 76.80 ( 0 / 0 )', 0, '2011-08-15 12:18:21'),
(615, 50, 'Buy 0.2 Lots of USDJPY @ 76.80 ( 0 / 0 )', 129, '2011-08-15 12:18:31'),
(616, 50, 'Buy 0.2 Lots of USDJPY @ 76.80 ( 0 / 0 )', 129, '2011-08-15 12:18:39'),
(617, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 12:20:11'),
(618, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 12:20:44'),
(619, 50, 'Buy 0.2 Lots of GBPUSD @ 1.6320 ( 0 / 0 )', 129, '2011-08-15 12:21:28'),
(620, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6328 ( 0 / 0 )', 129, '2011-08-15 12:24:13'),
(621, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6329 ( 0 / 0 )', 0, '2011-08-15 12:24:16'),
(622, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6329 ( 0 / 0 )', 0, '2011-08-15 12:24:40'),
(623, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6329 ( 0 / 0 )', 129, '2011-08-15 12:24:48'),
(624, 50, 'Buy 0.2 Lots of USDCAD @ 0.9864 ( 0 / 0 )', 0, '2011-08-15 12:25:16'),
(625, 50, 'Buy 0.2 Lots of USDCAD @ 0.9864 ( 0 / 0 )', 0, '2011-08-15 12:25:24'),
(626, 50, 'Buy 0.2 Lots of USDCAD @ 0.9862 ( 0 / 0 )', 0, '2011-08-15 12:25:32'),
(627, 50, 'Buy 0.2 Lots of USDCAD @ 0.9862 ( 0 / 0 )', 129, '2011-08-15 12:25:41'),
(628, 50, 'Buy 0.2 Lots of USDCAD @ 0.9863 ( 0 / 0 )', 129, '2011-08-15 12:25:45'),
(629, 50, 'Buy 0.2 Lots of USDCAD @ 0.9862 ( 0 / 0 )', 0, '2011-08-15 12:25:47'),
(630, 50, 'Buy 0.2 Lots of USDCAD @ 0.9862 ( 0 / 0 )', 129, '2011-08-15 12:25:55'),
(631, 50, 'Buy 0.2 Lots of USDCAD @ 0.9863 ( 0 / 0 )', 0, '2011-08-15 12:26:00'),
(632, 50, 'Close Order 1962531 Buy 0.1 of EURUSD @ 1.4334', 129, '2011-08-15 12:26:29'),
(633, 50, 'Close Order 1962531 Buy 0.1 of EURUSD @ 1.4334', 129, '2011-08-15 12:26:36'),
(634, 50, 'Buy 0.1 Lots of USDCHF @ 0.7872 ( 0 / 0 )', 0, '2011-08-15 12:34:26'),
(635, 50, 'Buy 0.1 Lots of USDCHF @ 0.7872 ( 0 / 0 )', 129, '2011-08-15 12:34:28'),
(636, 50, 'Buy 0.1 Lots of USDCHF @ 0.7871 ( 0 / 0 )', 129, '2011-08-15 12:34:34'),
(637, 50, 'Buy 0.1 Lots of USDCHF @ 0.7873 ( 0 / 0 )', 0, '2011-08-15 12:34:38'),
(638, 50, 'Buy 0.1 Lots of USDCHF @ 0.7873 ( 0 / 0 )', 0, '2011-08-15 12:34:40'),
(639, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6335 ( 0 / 0 )', 0, '2011-08-15 12:42:39'),
(640, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6335 ( 0 / 0 )', 0, '2011-08-15 12:42:45'),
(641, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6335 ( 0 / 0 )', 129, '2011-08-15 12:42:49'),
(642, 50, 'Buy 0.1 Lots of USDCHF @ 0.7885 ( 0 / 0 )', 0, '2011-08-15 12:48:35'),
(643, 50, 'Buy 0.1 Lots of USDCHF @ 0.7885 ( 0 / 0 )', 0, '2011-08-15 12:48:37'),
(644, 50, 'Buy 0.1 Lots of USDCHF @ 0.7883 ( 0 / 0 )', 0, '2011-08-15 12:49:07'),
(645, 50, 'Buy 0.1 Lots of USDCHF @ 0.7883 ( 0 / 0 )', 0, '2011-08-15 12:49:09'),
(646, 50, 'Buy 0.1 Lots of USDCHF @ 0.7878 ( 0 / 0 )', 129, '2011-08-15 12:49:53'),
(647, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6344 ( 0 / 0 )', 0, '2011-08-15 12:50:21'),
(648, 50, 'Buy 0.4 Lots of AUDUSD @ 1.0416 ( 0 / 0 )', 0, '2011-08-15 12:52:21'),
(649, 50, 'Buy 0.4 Lots of AUDUSD @ 1.0418 ( 0 / 0 )', 129, '2011-08-15 12:53:28'),
(650, 50, 'Buy 0.4 Lots of EURGBP @ 0.8787 ( 0 / 0 )', 129, '2011-08-15 12:53:56'),
(651, 50, 'Buy 0.5 Lots of EURCHF @ 1.1319 ( 0 / 0 )', 0, '2011-08-15 12:55:41'),
(652, 50, 'Buy 0.4 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 12:57:24'),
(653, 50, 'Buy 0.4 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 12:57:36'),
(654, 50, 'Buy 0.4 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 12:57:43'),
(655, 50, 'Sell 0.2 Lots of EURGBP @ 0.8784 ( 0 / 0 )', 0, '2011-08-15 12:58:53'),
(656, 50, 'Sell 0.1 Lots of EURJPY @ 110.27 ( 0 / 0 )', 0, '2011-08-15 13:00:42'),
(657, 50, 'Buy 0.1 Lots of EURJPY @ 110.30 ( 0 / 0 )', 129, '2011-08-15 13:00:50'),
(658, 50, 'Buy 0.2 Lots of GBPUSD @ 1.6369 ( 0 / 0 )', 129, '2011-08-15 13:02:17'),
(659, 50, 'Sell 0.2 Lots of GBPUSD @ 1.6362 ( 0 / 0 )', 129, '2011-08-15 13:02:24'),
(660, 50, 'Sell 0.2 Lots of GBPUSD @ 1.6362 ( 0 / 0 )', 129, '2011-08-15 13:02:27'),
(661, 50, 'Buy 0.2 Lots of GBPUSD @ 1.6369 ( 0 / 0 )', 0, '2011-08-15 13:06:56'),
(662, 50, 'Buy 0.2 Lots of GBPUSD @ 1.6369 ( 0 / 0 )', 129, '2011-08-15 13:07:00'),
(663, 50, 'Sell 0.1 Lots of EURUSD @ 1.4382 ( 0 / 0 )', 129, '2011-08-15 13:08:22'),
(664, 50, 'Buy 0.1 Lots of EURUSD @ 1.4391 ( 0 / 0 )', 129, '2011-08-15 13:08:51'),
(665, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6365 ( 0 / 0 )', 0, '2011-08-15 13:09:22'),
(666, 50, 'Sell 0.2 Lots of EURUSD @ 1.4387 ( 0 / 0 )', 0, '2011-08-15 13:09:36'),
(667, 50, 'Sell 0.2 Lots of EURUSD @ 1.4387 ( 0 / 0 )', 129, '2011-08-15 13:09:49'),
(668, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6368 ( 0 / 0 )', 129, '2011-08-15 13:09:50'),
(669, 50, 'Sell 0.4 Lots of GBPUSD @ 1.6367 ( 0 / 0 )', 129, '2011-08-15 13:10:35'),
(670, 50, 'Sell 0.4 Lots of GBPUSD @ 1.6366 ( 0 / 0 )', 129, '2011-08-15 13:10:57'),
(671, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6369 ( 0 / 0 )', 0, '2011-08-15 13:11:15'),
(672, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6368 ( 0 / 0 )', 129, '2011-08-15 13:11:39'),
(673, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6369 ( 0 / 0 )', 0, '2011-08-15 13:11:57'),
(674, 50, 'Sell 0.5 Lots of GBPUSD @ 1.6368 ( 0 / 0 )', 0, '2011-08-15 13:12:50'),
(675, 50, 'Sell 0.5 Lots of GBPUSD @ 1.6368 ( 0 / 0 )', 0, '2011-08-15 13:12:52'),
(676, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6371 ( 0 / 0 )', 129, '2011-08-15 13:13:02'),
(677, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6369 ( 0 / 0 )', 0, '2011-08-15 13:13:17'),
(678, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6366 ( 0 / 0 )', 0, '2011-08-15 13:13:43'),
(679, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6366 ( 0 / 0 )', 0, '2011-08-15 13:13:45'),
(680, 50, 'Sell 0.3 Lots of USDJPY @ 76.60 ( 0 / 0 )', 0, '2011-08-15 13:15:21'),
(681, 50, 'Sell 0.3 Lots of USDJPY @ 76.60 ( 0 / 0 )', 0, '2011-08-15 13:15:37'),
(682, 50, 'Sell 0.3 Lots of USDJPY @ 76.60 ( 0 / 0 )', 129, '2011-08-15 13:15:38'),
(683, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:17:13'),
(684, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:17:14'),
(685, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:17:17'),
(686, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 129, '2011-08-15 13:17:19'),
(687, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:08'),
(688, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:09'),
(689, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:11'),
(690, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:12'),
(691, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:14'),
(692, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:16'),
(693, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:17'),
(694, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:19'),
(695, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:38'),
(696, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 129, '2011-08-15 13:18:40'),
(697, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:41'),
(698, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:43'),
(699, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:45'),
(700, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:46'),
(701, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:48'),
(702, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:49'),
(703, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 129, '2011-08-15 13:18:51'),
(704, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 129, '2011-08-15 13:18:52'),
(705, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 129, '2011-08-15 13:18:54'),
(706, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:55'),
(707, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:57'),
(708, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:18:58'),
(709, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:19:00'),
(710, 50, 'Buy 0.3 Lots of USDJPY @ 76.66 ( 0 / 0 )', 0, '2011-08-15 13:19:02'),
(711, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0438 ( 0 / 0 )', 129, '2011-08-15 13:20:36'),
(712, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:20:48'),
(713, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0433 ( 0 / 0 )', 129, '2011-08-15 13:21:00'),
(714, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 129, '2011-08-15 13:21:22'),
(715, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 129, '2011-08-15 13:21:24'),
(716, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 129, '2011-08-15 13:21:25'),
(717, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:27'),
(718, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:28'),
(719, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:30'),
(720, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:31'),
(721, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:33'),
(722, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:35'),
(723, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:36'),
(724, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:38'),
(725, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:39'),
(726, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:41'),
(727, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:42'),
(728, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:44'),
(729, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:46'),
(730, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:47'),
(731, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:49'),
(732, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:50'),
(733, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:52'),
(734, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:53'),
(735, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:55'),
(736, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:56'),
(737, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:21:58'),
(738, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:22:00'),
(739, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 129, '2011-08-15 13:22:01'),
(740, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:22:03'),
(741, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:22:07'),
(742, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:22:09'),
(743, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:22:11'),
(744, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:22:13'),
(745, 50, 'Buy 0.1 Lots of AUDUSD @ 1.0437 ( 0 / 0 )', 0, '2011-08-15 13:22:14'),
(746, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6347 ( 0 / 0 )', 129, '2011-08-15 13:23:35'),
(747, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6347 ( 0 / 0 )', 0, '2011-08-15 13:23:44'),
(748, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6347 ( 0 / 0 )', 0, '2011-08-15 13:23:46'),
(749, 50, 'Buy Limit 0.4 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:25:53'),
(750, 50, 'Buy Limit 0.4 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:26:01'),
(751, 50, 'Buy Limit 0.4 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:26:11'),
(752, 50, 'Buy Limit 0.4 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:26:22'),
(753, 50, 'Buy Limit 0.5 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:26:34'),
(754, 50, 'Sell Limit 0.5 Lots of GBPUSD @ 1 ( 0 / 0 )', 130, '2011-08-15 13:26:43'),
(755, 50, 'Sell Limit 0.5 Lots of GBPUSD @ 1 ( 0 / 0 )', 130, '2011-08-15 13:26:48'),
(756, 50, 'Buy Limit 0.5 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:26:58'),
(757, 50, 'Buy Limit 0.5 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:27:03'),
(758, 50, 'Buy Limit 0.5 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:27:11'),
(759, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:27'),
(760, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:29'),
(761, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:30'),
(762, 50, 'Buy 0.5 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:31'),
(763, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:27:44'),
(764, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:46'),
(765, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:47'),
(766, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:48'),
(767, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:50'),
(768, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:51'),
(769, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 0, '2011-08-15 13:27:52'),
(770, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:27:54'),
(771, 50, 'Buy Limit 0.6 Lots of GBPUSD @ 1 ( 0 / 0 )', 0, '2011-08-15 13:28:06'),
(772, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:14'),
(773, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:16'),
(774, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:17'),
(775, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:18'),
(776, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:19'),
(777, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:21'),
(778, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:22'),
(779, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:23'),
(780, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:25'),
(781, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:26'),
(782, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:28'),
(783, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:29'),
(784, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:30'),
(785, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:32'),
(786, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:33'),
(787, 50, 'Buy 0.6 Lots of GBPUSD @ 1.6352 ( 0 / 0 )', 129, '2011-08-15 13:28:34'),
(788, 50, 'Close All USDJPY', 0, '2011-08-15 13:28:54'),
(789, 50, 'Close All EURGBP', 0, '2011-08-15 13:29:48'),
(790, 50, 'Close All EURGBP', 0, '2011-08-15 13:29:48'),
(791, 50, 'Buy 0.4 Lots of GBPUSD @ 1.6378 ( 0 / 0 )', 129, '2011-08-15 14:06:54'),
(792, 50, 'Sell 0.4 Lots of EURUSD @ 1.4445 ( 0 / 0 )', 0, '2011-08-15 14:07:15'),
(793, 50, 'Sell 0.4 Lots of EURUSD @ 1.4445 ( 0 / 0 )', 0, '2011-08-15 14:07:16'),
(794, 50, 'Buy 0.1 Lots of EURUSD @ 1.4440 ( 0 / 0 )', 0, '2011-08-15 14:10:09'),
(795, 50, 'Buy 0.1 Lots of EURUSD @ 1.4440 ( 0 / 0 )', 129, '2011-08-15 14:10:16'),
(796, 50, 'Buy 0.1 Lots of EURUSD @ 1.4440 ( 0 / 0 )', 129, '2011-08-15 14:10:18'),
(797, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6373 ( 0 / 0 )', 129, '2011-08-15 14:11:40'),
(798, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6374 ( 0 / 0 )', 0, '2011-08-15 14:11:45'),
(799, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6374 ( 0 / 0 )', 129, '2011-08-15 14:11:46'),
(800, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6375 ( 0 / 0 )', 0, '2011-08-15 14:11:59'),
(801, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6375 ( 0 / 0 )', 129, '2011-08-15 14:12:01'),
(802, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6375 ( 0 / 0 )', 129, '2011-08-15 14:12:02'),
(803, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6375 ( 0 / 0 )', 129, '2011-08-15 14:12:03'),
(804, 50, 'Sell 0.1 Lots of EURUSD @ 1.4444 ( 0 / 0 )', 0, '2011-08-15 14:13:09'),
(805, 50, 'Sell 0.1 Lots of EURUSD @ 1.4447 ( 0 / 0 )', 129, '2011-08-15 14:14:04'),
(806, 50, 'Sell 0.1 Lots of EURUSD @ 1.4447 ( 0 / 0 )', 129, '2011-08-15 14:14:05'),
(807, 50, 'Buy 0.1 Lots of EURUSD @ 1.4453 ( 0 / 0 )', 129, '2011-08-15 14:15:52'),
(808, 50, 'Buy 0.1 Lots of EURUSD @ 1.4453 ( 0 / 0 )', 129, '2011-08-15 14:15:54'),
(809, 50, 'Buy 0.1 Lots of EURUSD @ 1.4453 ( 0 / 0 )', 129, '2011-08-15 14:15:55'),
(810, 50, 'Buy 0.1 Lots of EURUSD @ 1.4453 ( 0 / 0 )', 129, '2011-08-15 14:15:56'),
(811, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 0, '2011-08-15 14:16:26'),
(812, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 0, '2011-08-15 14:16:27'),
(813, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 0, '2011-08-15 14:16:28'),
(814, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 0, '2011-08-15 14:16:30'),
(815, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 0, '2011-08-15 14:16:32'),
(816, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 0, '2011-08-15 14:16:33'),
(817, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 129, '2011-08-15 14:16:34'),
(818, 50, 'Sell 0.1 Lots of GBPUSD @ 1.6383 ( 0 / 0 )', 129, '2011-08-15 14:16:36'),
(819, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 0, '2011-08-15 14:16:48'),
(820, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 0, '2011-08-15 14:16:49'),
(821, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 0, '2011-08-15 14:16:50'),
(822, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 0, '2011-08-15 14:16:52'),
(823, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 0, '2011-08-15 14:16:53'),
(824, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:16:54'),
(825, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:16:56'),
(826, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:16:57'),
(827, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:16:58'),
(828, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:16:59'),
(829, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:17:00'),
(830, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:17:02'),
(831, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:17:03'),
(832, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:17:04'),
(833, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:17:05'),
(834, 50, 'Buy 0.1 Lots of GBPUSD @ 1.6387 ( 0 / 0 )', 129, '2011-08-15 14:17:07'),
(835, 50, 'Buy 0.1 Lots of EURUSD @ 1.4458 ( 0 / 0 )', 129, '2011-08-15 14:21:10'),
(836, 50, 'Buy 0.1 Lots of EURUSD @ 1.4456 ( 0 / 0 )', 0, '2011-08-15 14:21:15'),
(837, 50, 'Sell 0.1 Lots of EURUSD @ 1.4453 ( 0 / 0 )', 129, '2011-08-15 14:21:22'),
(838, 50, 'Sell 0.1 Lots of EURUSD @ 1.4451 ( 0 / 0 )', 129, '2011-08-15 14:21:28'),
(839, 50, 'Sell 0.1 Lots of EURUSD @ 1.4450 ( 0 / 0 )', 0, '2011-08-15 14:21:32'),
(840, 50, 'Buy 0.1 Lots of EURUSD @ 1.4451 ( 0 / 0 )', 0, '2011-08-15 14:21:41'),
(841, 50, 'Buy 0.1 Lots of EURUSD @ 1.4451 ( 0 / 0 )', 129, '2011-08-15 14:21:45'),
(842, 50, 'Buy 0.1 Lots of EURUSD @ 1.4459 ( 0 / 0 )', 0, '2011-08-15 14:24:47'),
(843, 50, 'Sell 0.1 Lots of EURUSD @ 1.4456 ( 0 / 0 )', 0, '2011-08-15 14:24:55'),
(844, 50, 'Buy 0.1 Lots of EURUSD @ 1.4459 ( 0 / 0 )', 0, '2011-08-15 14:25:01'),
(845, 50, 'Buy 0.1 Lots of EURUSD @ 1.4459 ( 0 / 0 )', 129, '2011-08-15 14:25:08'),
(846, 50, 'Buy 0.1 Lots of EURUSD @ 1.4458 ( 0 / 0 )', 129, '2011-08-15 14:25:14'),
(847, 50, 'Buy 0.3 Lots of USDCHF @ 0.7835 ( 0 / 0 )', 129, '2011-08-15 14:27:36'),
(848, 50, 'Buy 0.3 Lots of USDCHF @ 0.7833 ( 0 / 0 )', 129, '2011-08-15 14:27:43'),
(849, 50, 'Buy 0.3 Lots of USDCHF @ 0.7832 ( 0 / 0 )', 0, '2011-08-15 14:27:48'),
(850, 50, 'Buy 0.3 Lots of USDCHF @ 0.7831 ( 0 / 0 )', 129, '2011-08-15 14:28:00'),
(851, 50, 'Buy 0.3 Lots of USDCHF @ 0.7833 ( 0 / 0 )', 0, '2011-08-15 14:28:06'),
(852, 50, 'Buy 0.3 Lots of USDCHF @ 0.7833 ( 0 / 0 )', 0, '2011-08-15 14:28:17'),
(853, 50, 'Sell 0.3 Lots of USDCHF @ 0.7830 ( 0 / 0 )', 0, '2011-08-15 14:28:27'),
(854, 50, 'Close All EURUSD', 0, '2011-08-15 14:28:44'),
(855, 50, 'Close All USDCHF', 0, '2011-08-15 14:29:44'),
(856, 50, 'Close All GBPUSD', 0, '2011-08-15 14:30:00'),
(857, 50, 'Sell 0.7 Lots of USDCHF @ 0.7820 ( 0 / 0 )', 0, '2011-08-15 15:01:24'),
(858, 50, 'Sell 0.7 Lots of USDCHF @ 0.7820 ( 0 / 0 )', 0, '2011-08-15 15:01:35'),
(859, 50, 'Sell 0.7 Lots of USDCHF @ 0.7820 ( 0 / 0 )', 129, '2011-08-15 15:01:37'),
(860, 50, 'Sell 0.1 Lots of EURUSD @ 1.4452 ( 0 / 0 )', 129, '2011-08-15 15:02:38'),
(861, 50, 'Sell 0.1 Lots of EURUSD @ 1.4451 ( 0 / 0 )', 0, '2011-08-15 15:02:45'),
(862, 50, 'Sell 0.1 Lots of EURUSD @ 1.4451 ( 0 / 0 )', 0, '2011-08-15 15:02:57'),
(863, 50, 'Sell 0.1 Lots of EURUSD @ 1.4451 ( 0 / 0 )', 0, '2011-08-15 15:03:03'),
(864, 12392608, 'Buy 0.1 Lots of EURUSD @ 1.4410 ( 0 / 0 )', 0, '2011-08-17 05:00:03'),
(865, 12392608, 'Modify Order 1962988 Buy 0.1 EURUSD @ 1.4411 ( 50 / 0 )', 130, '2011-08-17 05:03:13'),
(866, 12392608, 'Modify Order 1962988 Buy 0.1 EURUSD @ 1.4416 ( 1.4360 / 0.0000 )', 0, '2011-08-17 05:04:28'),
(867, 12392608, 'Buy 0.1 Lots of EURUSD @ 1.4380 ( 0 / 0 )', 0, '2011-08-17 07:46:15'),
(868, 12392608, 'Close Order 1962993 Buy 0.1 of EURUSD @ 1.4433', 0, '2011-08-17 09:58:40'),
(869, 12392610, 'Sell 1 Lots of USDCHF @ 0.7901 ( 0 / 0 )', 0, '2011-08-22 18:51:20'),
(870, 12392610, 'Close Order 1963004 Sell 1 of USDCHF @ 0.7908', 0, '2011-08-22 19:12:29'),
(871, 12392615, 'Sell 0.1 Lots of EURUSD @ 1.4363 ( 0 / 0 )', 129, '2011-08-22 20:06:21'),
(872, 12392615, 'Buy 0.1 Lots of EURUSD @ 1.4366 ( 0 / 0 )', 129, '2011-08-22 20:06:31'),
(873, 12392615, 'Sell 0.1 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-22 20:06:46'),
(874, 12392605, 'Sell 0.1 Lots of EURUSD @ 1.4364 ( 0 / 0 )', 0, '2011-08-22 20:06:53'),
(875, 12392615, 'Sell 0.1 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-22 20:07:20'),
(876, 12392605, 'Buy 0.1 Lots of NZDUSD @ 0.8245 ( 0 / 0 )', 0, '2011-08-22 20:07:34'),
(877, 12392615, 'Buy 0.1 Lots of NZDUSD @ 0.8246 ( 0 / 0 )', 129, '2011-08-22 20:07:47'),
(878, 12392615, 'Sell 0.2 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-22 20:08:00'),
(879, 12392615, 'Sell 0.2 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-22 20:08:27'),
(880, 12392615, 'Buy 0.2 Lots of NZDUSD @ 0.8246 ( 0 / 0 )', 129, '2011-08-22 20:08:57'),
(881, 12392615, 'Sell 0.2 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-22 20:09:42'),
(882, 12392615, 'Buy 0.2 Lots of NZDUSD @ 0.8246 ( 0 / 0 )', 129, '2011-08-22 20:09:50'),
(883, 12392615, 'Sell 0.2 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-22 20:10:04'),
(884, 12392615, 'Sell 0.2 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-22 20:10:32'),
(885, 12392610, 'Buy 1 Lots of GBPUSD @ 1.6468 ( 0 / 0 )', 129, '2011-08-22 20:42:32'),
(886, 12392610, 'Buy 0.1 Lots of EURUSD @ 1.4364 ( 0 / 0 )', 0, '2011-08-22 20:42:42'),
(887, 12392605, 'Buy 0.1 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-23 16:17:30'),
(888, 12392605, 'Buy 0.1 Lots of NZDUSD @ 0.8241 ( 0 / 0 )', 129, '2011-08-23 16:17:37'),
(889, 12392605, 'Buy 0.1 Lots of EURUSD @ 1.4430 ( 0 / 0 )', 0, '2011-08-23 16:17:44'),
(890, 12392605, 'Close Order 1963010 Buy 0.1 of NZDUSD @ 0.8334', 0, '2011-08-23 16:18:23'),
(891, 12392605, 'Close Order 1962178 Sell 0.1 of USDJPY @ 76.62', 0, '2011-08-23 16:18:34'),
(892, 12392605, 'Close Order 1962180 Sell 0.1 of USDJPY @ 76.61', 0, '2011-08-23 16:18:43'),
(893, 12392605, 'Buy 1 Lots of GBPJPY @ 126.55 ( 0 / 0 )', 0, '2011-08-23 16:19:07'),
(894, 12392615, 'Buy 1 Lots of USDJPY @ 77.15 ( 0 / 0 )', 129, '2011-08-25 00:16:02'),
(895, 12392615, 'Buy 1 Lots of USDJPY @ 77.15 ( 0 / 0 )', 0, '2011-08-25 00:16:06'),
(896, 12392615, 'Close Order 1963025 Buy 1 of USDJPY @ 77.10', 0, '2011-08-25 00:17:10'),
(897, 12392615, 'Buy 0.6 Lots of EURUSD @ 1.4376 ( 1.4200 / 1.4400 )', 0, '2011-08-25 15:41:25'),
(898, 12392615, 'Sell Limit 0.6 Lots of EURUSD @ 1.4400 ( 1.4200 / 1.4400 )', 130, '2011-08-25 15:41:52'),
(899, 12392615, 'Sell Limit 0.6 Lots of EURUSD @ 1.4400 ( 1.4500 / 1.4300 )', 0, '2011-08-25 15:42:07'),
(900, 12392615, 'Close Order 1963029 Buy 0.5 of EURUSD @ 1.4375', 0, '2011-08-25 15:42:59'),
(901, 12392615, 'Buy 0.1 Lots of EURUSD @ 1.4412 ( 0 / 0 )', 0, '2011-08-26 03:21:13'),
(902, 12392615, 'Close All EURUSD', 0, '2011-08-26 03:21:57'),
(903, 12392625, 'Sell 0.1 Lots of EURUSD @ 1.4056 ( 0 / 0 )', 129, '2011-09-07 10:13:28'),
(904, 12392625, 'Sell 0.1 Lots of EURUSD @ 1.4057 ( 20 / 50 )', 130, '2011-09-07 10:13:45'),
(905, 12392625, 'Sell 0.1 Lots of EURUSD @ 1.4059 ( 200 / 500 )', 130, '2011-09-07 10:13:51'),
(906, 12392625, 'Buy 0.4 Lots of EURUSD @ 1.4058 ( 200 / 500 )', 130, '2011-09-07 10:14:21'),
(907, 12392625, 'Sell 0.1 Lots of EURUSD @ 1.4044 ( 200 / 500 )', 130, '2011-09-07 10:15:29'),
(908, 12392625, 'Sell 0.1 Lots of EURUSD @ 1.4041 ( 0 / 500 )', 130, '2011-09-07 10:15:35'),
(909, 12392625, 'Sell 1 Lots of EURUSD @ 1.4041 ( 0 / 500 )', 130, '2011-09-07 10:15:45'),
(910, 50, 'Close All USDCHF', 0, '2011-09-12 12:05:12'),
(911, 50, 'Close All EURUSD', 0, '2011-09-12 12:05:20'),
(912, 12392628, 'Buy 0.1 Lots of EURUSD @ 1.3412 ( 0 / 0 )', 0, '2011-09-22 13:05:50'),
(913, 12392628, 'Buy 0.1 Lots of EURUSD @ 1.3414 ( 0 / 0 )', 0, '2011-09-22 13:06:02'),
(914, 12392628, 'Close Order 1963088 Buy 0.1 of EURUSD @ 1.3472', 0, '2011-09-22 19:53:11'),
(915, 12392628, 'Close Order 1963090 Buy 0.1 of EURUSD @ 1.3474', 0, '2011-09-22 19:53:23'),
(916, 12392630, 'Sell 0.1 Lots of EURUSD @ 1.353 ( 0 / 0 )', 129, '2011-09-27 08:12:59'),
(917, 12392630, 'Buy 0.1 Lots of EURUSD @ 1.3535 ( 0 / 0 )', 129, '2011-09-27 08:13:06'),
(918, 12392630, 'Sell 0.1 Lots of EURUSD @ 1.3529 ( 0 / 0 )', 0, '2011-09-27 08:13:28'),
(919, 12392630, 'Close Order 1963097 Sell 0.1 of EURUSD @ 1.3502', 0, '2011-09-27 08:35:00'),
(920, 12392630, 'Sell 0.1 Lots of EURUSD @ 1.3496 ( 0 / 0 )', 129, '2011-09-27 09:05:58'),
(921, 12392630, 'Sell 0.1 Lots of EURUSD @ 1.3501 ( 0 / 0 )', 0, '2011-09-27 09:07:36'),
(922, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3499 ( 1.3510 / 1.3490 )', 130, '2011-09-27 09:09:39'),
(923, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3498 ( 1.3498 / 1.3512 )', 130, '2011-09-27 09:10:12'),
(924, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3498 ( 1.3498 / 1.3512 )', 130, '2011-09-27 09:10:16'),
(925, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3505 ( 1.3498 / 1.3512 )', 130, '2011-09-27 09:10:22'),
(926, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3512 ( 1.3488 / 1.3512 )', 130, '2011-09-27 09:11:01'),
(927, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3516 ( 20 / 20 )', 130, '2011-09-27 09:11:41'),
(928, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3516 ( 20 / 20 )', 130, '2011-09-27 09:11:46'),
(929, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3515 ( 20 / 20 )', 130, '2011-09-27 09:11:51'),
(930, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3520 ( 1.3480 / 0.0000 )', 130, '2011-09-27 09:13:03'),
(931, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3519 ( 1.3480 / 0.0000 )', 130, '2011-09-27 09:13:09'),
(932, 12392630, 'Modify Order 1963101 Sell 0.1 EURUSD @ 1.3518 ( 1.3530 / 1.3488 )', 0, '2011-09-27 09:14:07'),
(933, 12392630, 'Buy 0.1 Lots of EURUSD @ 1.3558 ( 0 / 0 )', 129, '2011-09-30 05:56:29'),
(934, 12392630, 'Buy 0.1 Lots of EURUSD @ 1.3559 ( 0 / 0 )', 0, '2011-09-30 05:56:37'),
(935, 12392632, 'Buy 0.1 Lots of EURUSD @ 1.3395 ( 0 / 0 )', 132, '2011-10-01 16:04:23'),
(936, 12392639, 'Buy 0.1 Lots of EURUSD @ 1.3318 ( 0 / 0 )', 129, '2011-10-03 12:57:41'),
(937, 12392639, 'Buy 0.1 Lots of EURUSD @ 1.3316 ( 0 / 0 )', 129, '2011-10-03 13:03:25'),
(938, 12392639, 'Buy 0.1 Lots of EURUSD @ 1.3313 ( 0 / 0 )', 129, '2011-10-03 13:03:37'),
(939, 12392639, 'Buy 0.1 Lots of EURJPY @ 102.22 ( 0 / 0 )', 0, '2011-10-03 13:03:45'),
(940, 12392639, 'Buy 0.1 Lots of EURCAD @ 1.3983 ( 0 / 0 )', 0, '2011-10-03 13:03:51'),
(941, 12392639, 'Sell 0.1 Lots of EURUSD @ 1.3307 ( 0 / 0 )', 0, '2011-10-03 13:05:40'),
(942, 12392639, 'Close Order 1963129 Sell 0.1 of EURUSD @ 1.3309', 0, '2011-10-03 13:05:51'),
(943, 12392639, 'Close Order 1963125 Buy 0.1 of EURJPY @ 102.16', 0, '2011-10-03 13:05:57'),
(944, 12392639, 'Close Order 1963127 Buy 0.1 of EURCAD @ 1.3980', 129, '2011-10-03 13:06:03'),
(945, 12392625, 'Buy 0.1 Lots of EURUSD @ 1.3172 ( 30 / 30 )', 130, '2011-10-04 08:25:23'),
(946, 12392625, 'Buy 0.1 Lots of EURUSD @ 1.3172 ( 300 / 30 )', 130, '2011-10-04 08:25:28'),
(947, 12392625, 'Buy 0.2 Lots of EURUSD @ 1.3174 ( 0 / 0 )', 0, '2011-10-04 08:25:40'),
(948, 12392625, 'Close Order 1963137 Buy 0.2 of EURUSD @ 1.3168', 129, '2011-10-04 08:26:48'),
(949, 12392625, 'Close Order 1963137 Buy 0.2 of EURUSD @ 1.3168', 0, '2011-10-04 08:27:02'),
(950, 12392640, 'Buy 0.1 Lots of EURUSD @ 1.3618 ( 0 / 0 )', 129, '2011-10-10 12:52:55'),
(951, 12392640, 'Sell 0.1 Lots of EURUSD @ 1.3615 ( 0 / 0 )', 0, '2011-10-10 12:53:05'),
(952, 12392645, 'Sell 0.1 Lots of EURUSD @ 1.4161 ( 0 / 0 )', 132, '2011-10-29 10:55:29'),
(953, 12392647, 'Sell 0.1 Lots of GBPUSD @ 1.6054 ( 0 / 0 )', 0, '2011-10-31 14:34:04'),
(954, 12392650, 'Buy 0.1 Lots of USDJPY @ 77.24 ( 0 / 0 )', 0, '2011-11-11 14:48:16'),
(955, 12392651, 'Buy Limit 0.1 Lots of EURUSD @ 1.3424 ( 0 / 0 )', 0, '2011-11-17 02:54:29'),
(956, 12392651, 'Buy Limit 0.1 Lots of EURUSD @ 1.3424 ( 0 / 0 )', 0, '2011-11-17 02:55:30'),
(957, 12392651, 'Buy Limit 0.1 Lots of GBPUSD @ 1.5701 ( 0 / 0 )', 0, '2011-11-17 02:56:27'),
(958, 12392651, 'Modify Order 1963164  0.1 GBPUSD @ 1.5702 ( 0 / 0 )', 0, '2011-11-17 02:59:19'),
(959, 12392651, 'Buy Limit 0.1 Lots of USDJPY @ 77.01 ( 0 / 0 )', 130, '2011-11-17 03:03:10'),
(960, 12392651, 'Buy Limit 0.1 Lots of USDJPY @ 77 ( 0 / 0 )', 130, '2011-11-17 03:03:22'),
(961, 12392651, 'Buy Limit 0.1 Lots of USDJPY @ 76.98 ( 0 / 0 )', 130, '2011-11-17 03:03:35'),
(962, 12392651, 'Buy Limit 0.1 Lots of USDJPY @ 76.97 ( 0 / 0 )', 0, '2011-11-17 03:03:43'),
(963, 12392651, 'Buy 0.1 Lots of GBPUSD @ 1.5715 ( 0 / 0 )', 0, '2011-11-17 03:13:07'),
(964, 12392652, 'Buy 100 Lots of EURUSD @ 1.3461 ( 0 / 0 )', 134, '2011-11-17 09:41:32'),
(965, 12392652, 'Buy 10 Lots of EURUSD @ 1.3460 ( 0 / 0 )', 0, '2011-11-17 09:41:38'),
(966, 12392647, 'Sell 0.1 Lots of NZDUSD @ 0.7588 ( 0 / 0 )', 0, '2011-11-17 21:36:21'),
(967, 12392647, 'Sell 0.1 Lots of EURGBP @ 0.8544 ( 0 / 0 )', 0, '2011-11-17 21:36:26'),
(968, 12392651, 'Close Order 1963167 Buy 0.1 of USDJPY @ 77.04', 0, '2011-11-24 03:29:38'),
(969, 12392651, 'Modify Order 1963162 Buy 0.1 EURUSD @ 1.3384 ( 0 / 1.3509 )', 0, '2011-11-24 03:30:34'),
(970, 12392651, 'Buy Limit 0.1 Lots of GBPUSD @ 1.5505 ( 0 / 0 )', 0, '2011-11-24 03:32:02'),
(971, 12392651, 'Buy Limit 0.3 Lots of EURUSD @ 1.3333 ( 0 / 0 )', 0, '2011-11-24 03:32:41'),
(972, 12392651, 'Buy Limit 0.1 Lots of GOLD @ 1680 ( 0 / 0 )', 0, '2011-11-24 03:34:08'),
(973, 12392654, 'Buy 0.1 Lots of EURUSD @ 1.3230 ( 0 / 0 )', 0, '2011-11-25 18:26:56'),
(974, 50, 'Sell 0.1 Lots of EURUSD @ 1.3419 ( 0 / 0 )', 0, '2011-12-07 09:48:46'),
(975, 50, 'Sell 0.1 Lots of EURUSD @ 1.3416 ( 0 / 0 )', 0, '2011-12-07 09:57:50'),
(976, 12392657, 'Buy Stop 0.1 Lots of EURUSD @ 1.3399 ( 0 / 0 )', 132, '2011-12-10 17:54:38'),
(977, 12392657, 'Sell Limit 0.1 Lots of EURUSD @ 1.3399 ( 0 / 0 )', 132, '2011-12-10 17:55:23'),
(978, 12392657, 'Buy Limit 0.1 Lots of USDCAD @ 1.3399 ( 0 / 0 )', 130, '2011-12-10 20:37:45'),
(979, 12392661, 'Sell 0.1 Lots of EURUSD @ 1.3071 ( 0 / 0 )', 0, '2011-12-28 08:18:49'),
(980, 12392661, 'Close Order 1963211 Sell 0.1 of EURUSD @ 1.3075', 0, '2011-12-28 08:19:57'),
(981, 50, 'Buy 0.1 Lots of EURUSD @ 1.2900 ( 0 / 0 )', 2, '2011-12-29 13:43:15'),
(982, 50, 'Buy 0.1 Lots of EURUSD @ 1.2899 ( 0 / 0 )', 2, '2011-12-29 13:43:47'),
(983, 50, 'Buy 0.1 Lots of EURUSD @ 1.2905 ( 0 / 0 )', 2, '2011-12-29 13:44:36'),
(984, 50, 'Buy 0.1 Lots of EURUSD @ 1.2901 ( 0 / 0 )', 2, '2011-12-29 13:44:54'),
(985, 50, 'Buy 0.1 Lots of EURUSD @ 1.2899 ( 0 / 0 )', 0, '2011-12-29 13:52:05'),
(986, 50, 'Buy 0.1 Lots of EURUSD @ 1.2900 ( 0 / 0 )', 0, '2011-12-29 13:52:13'),
(987, 50, 'Sell 0.1 Lots of EURUSD @ 1.2895 ( 0 / 0 )', 0, '2011-12-29 13:52:23'),
(988, 50, 'Close All EURUSD', 0, '2011-12-29 13:52:40'),
(989, 50, 'Sell 0.1 Lots of USDJPY @ 77.74 ( 0 / 0 )', 0, '2011-12-29 13:55:32'),
(990, 50, 'Buy 0.1 Lots of USDJPY @ 77.77 ( 0 / 0 )', 0, '2011-12-29 13:55:37'),
(991, 50, 'Close All USDJPY', 0, '2011-12-29 13:55:48'),
(992, 50, 'Sell 0.1 Lots of GBPUSD @ 1.5424 ( 0 / 0 )', 0, '2011-12-29 13:56:06'),
(993, 50, 'Close All GBPUSD', 0, '2011-12-29 13:56:16'),
(994, 50, 'Buy 0.1 Lots of GBPUSD @ 1.5427 ( 0 / 0 )', 0, '2011-12-29 13:56:23'),
(995, 50, 'Sell 0.1 Lots of EURUSD @ 1.2897 ( 0 / 0 )', 0, '2011-12-29 13:57:30'),
(996, 50, 'Sell 0.1 Lots of EURUSD @ 1.2896 ( 0 / 0 )', 0, '2011-12-29 13:58:09'),
(997, 50, 'Sell 13 Lots of GBPUSD @ 1.5425 ( 0 / 0 )', 0, '2011-12-29 13:58:29'),
(998, 50, 'Sell 16 Lots of GBPUSD @ 1.5425 ( 0 / 0 )', 138, '2011-12-29 13:58:43'),
(999, 50, 'Sell 16 Lots of GBPUSD @ 1.5424 ( 0 / 0 )', 0, '2011-12-29 13:58:46'),
(1000, 50, 'Sell 16 Lots of USDJPY @ 77.74 ( 0 / 0 )', 0, '2011-12-29 13:59:13'),
(1001, 50, 'Close All GBPUSD', 0, '2011-12-29 13:59:28'),
(1002, 50, 'Close All USDJPY', 0, '2011-12-29 14:00:03'),
(1003, 50, 'Buy 16 Lots of USDJPY @ 77.77 ( 0 / 0 )', 138, '2011-12-29 15:12:31'),
(1004, 50, 'Sell 16 Lots of USDJPY @ 1.5424 ( 0 / 0 )', 0, '2011-12-29 15:12:35'),
(1005, 50, 'Buy 16 Lots of USDJPY @ 77.78 ( 0 / 0 )', 134, '2011-12-29 15:12:35'),
(1006, 50, 'Buy 0.1 Lots of EURUSD @ 1.2921 ( 0 / 0 )', 138, '2011-12-29 15:53:09'),
(1007, 50, 'Buy 0.1 Lots of USDJPY @ 77.72 ( 0 / 0 )', 138, '2011-12-29 15:53:31'),
(1008, 50, 'Buy 0.1 Lots of USDJPY @ 1.2928 ( 0 / 0 )', 138, '2011-12-29 15:53:43'),
(1009, 50, 'Buy 0.1 Lots of USDJPY @ 77.79 ( 0 / 0 )', 138, '2011-12-29 15:53:43'),
(1010, 50, 'Buy 0.1 Lots of USDJPY @ 1.2928 ( 0 / 0 )', 138, '2011-12-29 15:53:49'),
(1011, 50, 'Buy 0.1 Lots of USDJPY @ 77.71 ( 0 / 0 )', 138, '2011-12-29 15:53:49'),
(1012, 50, 'Buy 0.1 Lots of USDJPY @ 77.79 ( 0 / 0 )', 0, '2011-12-29 15:53:49'),
(1013, 50, 'Buy 0.1 Lots of USDJPY @ 1.2928 ( 0 / 0 )', 138, '2011-12-29 15:54:03'),
(1014, 50, 'Buy 0.1 Lots of USDJPY @ 77.82 ( 0 / 0 )', 0, '2011-12-29 15:54:03'),
(1015, 50, 'Buy 0.1 Lots of USDJPY @ 77.71 ( 0 / 0 )', 3, '2011-12-29 15:54:03'),
(1016, 50, 'Buy 0.1 Lots of EURUSD @ 1.2925 ( 0 / 0 )', 138, '2011-12-29 15:55:35'),
(1017, 50, 'Buy 0.1 Lots of EURUSD @ 1.2932 ( 0 / 0 )', 138, '2011-12-29 15:55:49'),
(1018, 50, 'Buy 0.1 Lots of EURUSD @ 1.2936 ( 0 / 0 )', 138, '2011-12-29 15:56:04'),
(1019, 50, 'Buy 0.1 Lots of EURUSD @ 1.2932 ( 0 / 0 )', 138, '2011-12-29 15:56:04'),
(1020, 50, 'Buy 0.1 Lots of EURUSD @ 1.2932 ( 0 / 0 )', 138, '2011-12-29 15:56:12'),
(1021, 50, 'Buy 0.1 Lots of EURUSD @ 1.2939 ( 0 / 0 )', 0, '2011-12-29 15:56:12'),
(1022, 50, 'Buy 0.1 Lots of EURUSD @ 1.2936 ( 0 / 0 )', 0, '2011-12-29 15:56:12'),
(1023, 50, 'Buy 0.1 Lots of EURUSD @ 1.2932 ( 0 / 0 )', 0, '2011-12-29 15:56:29'),
(1024, 50, 'Buy 0.1 Lots of EURUSD @ 1.2936 ( 0 / 0 )', 0, '2011-12-29 15:56:29'),
(1025, 50, 'Buy 0.1 Lots of EURUSD @ 1.2939 ( 0 / 0 )', 0, '2011-12-29 15:56:29'),
(1026, 50, 'Buy 0.1 Lots of EURUSD @ 1.2935 ( 0 / 0 )', 0, '2011-12-29 15:56:29'),
(1027, 50, 'Buy 0.1 Lots of EURUSD @ 1.2939 ( 0 / 0 )', 0, '2011-12-29 15:56:30'),
(1028, 50, 'Sell 0.1 Lots of EURUSD @ 1.2913 ( 0 / 0 )', 138, '2011-12-29 16:22:25'),
(1029, 50, 'Sell 0.1 Lots of EURUSD @ 1.2917 ( 0 / 0 )', 138, '2011-12-29 16:22:35'),
(1030, 50, 'Sell 0.1 Lots of EURUSD @ 1.2918 ( 0 / 0 )', 138, '2011-12-29 16:22:46'),
(1031, 50, 'Sell 0.1 Lots of EURUSD @ 1.2908 ( 0 / 0 )', 138, '2011-12-29 16:22:59'),
(1032, 50, 'Sell 0.1 Lots of EURUSD @ 1.2910 ( 0 / 0 )', 0, '2011-12-29 16:23:08'),
(1033, 50, 'Buy 0.1 Lots of EURUSD @ 1.2940 ( 0 / 0 )', 0, '2011-12-30 10:59:06'),
(1034, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1 ( 0 / 0 )', 0, '2011-12-30 10:59:15'),
(1035, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1 ( 1 / 1 )', 130, '2011-12-30 11:04:48'),
(1036, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1.1 ( 1 / 1 )', 130, '2011-12-30 11:04:57'),
(1037, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1.1 ( 1 / 1.2 )', 0, '2011-12-30 11:05:03'),
(1038, 50, 'Delete Order 1963399', 0, '2011-12-30 11:05:30'),
(1039, 12392647, 'Buy 0.1 Lots of EURUSD @ 1.2947 ( 0 / 0 )', 132, '2011-12-30 23:52:16'),
(1040, 12392647, 'Buy 0.1 Lots of USDCAD @ 1.0199 ( 0 / 0 )', 138, '2012-01-02 11:22:01'),
(1041, 12392647, 'Buy 0.1 Lots of USDCAD @ 1.0199 ( 0 / 0 )', 138, '2012-01-02 11:22:09'),
(1042, 12392647, 'Sell 0.1 Lots of AUDUSD @ 1.0216 ( 0 / 0 )', 0, '2012-01-02 11:22:18'),
(1043, 50, 'Buy 0.1 Lots of EURUSD @ 1.3060 ( 0 / 0 )', 2, '2012-01-03 20:54:54'),
(1044, 50, 'Buy 0.1 Lots of EURUSD @ 1.3060 ( 0 / 0 )', 2, '2012-01-03 20:54:57'),
(1045, 50, 'Buy 0.1 Lots of EURUSD @ 1.3060 ( 0 / 0 )', 2, '2012-01-03 20:55:00'),
(1046, 50, 'Sell 0.1 Lots of EURUSD @ 1.3058 ( 0 / 0 )', 2, '2012-01-03 20:55:09'),
(1047, 50, 'Buy 0.1 Lots of EURUSD @ 1.3058 ( 0 / 0 )', 0, '2012-01-03 20:57:29'),
(1048, 50, 'Close All EURUSD', 0, '2012-01-03 20:57:44'),
(1049, 50, 'Sell 0.1 Lots of EURUSD @ 1.3053 ( 0 / 0 )', 0, '2012-01-03 20:57:55'),
(1050, 50, 'Sell 0.1 Lots of EURUSD @ 1.3053 ( 0 / 0 )', 0, '2012-01-03 20:57:59'),
(1051, 50, 'Buy 0.1 Lots of EURUSD @ 1.3056 ( 0 / 0 )', 0, '2012-01-03 20:58:03'),
(1052, 50, 'Buy 0.1 Lots of EURUSD @ 1.3056 ( 0 / 0 )', 0, '2012-01-03 20:58:07'),
(1053, 50, 'Buy 0.1 Lots of EURUSD @ 1.3056 ( 0 / 0 )', 0, '2012-01-03 20:58:10'),
(1054, 50, 'Buy 0.1 Lots of EURUSD @ 1.3057 ( 0 / 0 )', 138, '2012-01-03 20:58:14'),
(1055, 50, 'Buy 0.1 Lots of EURUSD @ 1.3058 ( 0 / 0 )', 0, '2012-01-03 20:58:17'),
(1056, 50, 'Buy 0.1 Lots of EURUSD @ 1.2954 ( 0 / 0 )', 138, '2012-01-04 14:31:59'),
(1057, 50, 'Buy 0.1 Lots of EURUSD @ 1.2955 ( 0 / 0 )', 138, '2012-01-04 14:32:03'),
(1058, 50, 'Buy 0.1 Lots of EURUSD @ 1.2956 ( 0 / 0 )', 0, '2012-01-04 14:32:06'),
(1059, 12392675, 'Buy 0.1 Lots of EURUSD @ 1.2954 ( 0 / 0 )', 0, '2012-01-04 15:04:48'),
(1060, 12392675, 'Buy 0.1 Lots of EURUSD @ 1.2953 ( 0 / 0 )', 138, '2012-01-04 15:04:54'),
(1061, 12392675, 'Buy 0.1 Lots of EURUSD @ 1.2954 ( 0 / 0 )', 0, '2012-01-04 15:04:58'),
(1062, 12392675, 'Sell 0.1 Lots of EURUSD @ 1.2948 ( 0 / 0 )', 0, '2012-01-04 15:05:06'),
(1063, 12392675, 'Buy 0.1 Lots of AUDUSD @ 1.0336 ( 0 / 0 )', 0, '2012-01-04 15:05:10'),
(1064, 12392675, 'Sell 0.1 Lots of EURAUD @ 1.2522 ( 0 / 0 )', 0, '2012-01-04 15:05:19'),
(1065, 12392675, 'Buy 0.1 Lots of SILVER @ 29.48 ( 0 / 0 )', 0, '2012-01-04 15:05:26'),
(1066, 12392675, 'Sell 0.1 Lots of GOLD @ 1610.82 ( 0 / 0 )', 0, '2012-01-04 15:05:32'),
(1067, 12392676, 'Buy 0.1 Lots of EURUSD @ 1.2953 ( 0 / 0 )', 0, '2012-01-04 15:09:30'),
(1068, 12392676, 'Buy 0.1 Lots of EURUSD @ 1.2912 ( 0 / 0 )', 0, '2012-01-04 16:00:20'),
(1069, 12392676, 'Buy 0.1 Lots of USDJPY @ 76.75 ( 0 / 0 )', 0, '2012-01-04 16:00:27'),
(1070, 12392677, 'Buy 0.1 Lots of EURUSD @ 1.2919 ( 0 / 0 )', 0, '2012-01-04 16:07:29'),
(1071, 12392677, 'Buy 1 Lots of EURUSD @ 1.2930 ( 0 / 0 )', 0, '2012-01-04 16:18:35'),
(1072, 12392677, 'Buy 0.1 Lots of GOLD @ 1608.55 ( 0 / 0 )', 0, '2012-01-04 16:19:21'),
(1073, 12392677, 'Buy 0.1 Lots of EURUSD @ 1.2940 ( 0 / 0 )', 0, '2012-01-04 17:33:42'),
(1074, 12392677, 'Buy 0.1 Lots of AUDUSD @ 1.0362 ( 0 / 0 )', 0, '2012-01-04 17:33:48'),
(1075, 50, 'Buy 0.1 Lots of EURUSD @ 1.2796 ( 0 / 0 )', 0, '2012-01-05 16:17:54'),
(1076, 50, 'Sell 0.1 Lots of AUDUSD @ 1.0272 ( 0 / 0 )', 0, '2012-01-05 18:34:25'),
(1077, 50, 'Buy 0.1 Lots of USDCHF @ 0.9544 ( 0 / 0 )', 0, '2012-01-06 14:24:23'),
(1078, 50, 'Buy 0.1 Lots of USDCHF @ 0.9546 ( 0 / 0 )', 0, '2012-01-06 14:24:51'),
(1079, 50, 'Buy 0.1 Lots of NZDUSD @ 0.7831 ( 0 / 0 )', 0, '2012-01-06 14:25:14'),
(1080, 50, 'Buy 0.1 Lots of EURCHF @ 1.2174 ( 0 / 0 )', 0, '2012-01-06 14:25:24'),
(1081, 50, 'Sell 0.1 Lots of GBPAUD @ 1.5049 ( 0 / 0 )', 0, '2012-01-06 14:25:32'),
(1082, 50, 'Buy 0.1 Lots of EURCAD @ 1.3023 ( 0 / 0 )', 138, '2012-01-06 14:25:37'),
(1083, 50, 'Buy 0.1 Lots of EURCAD @ 1.3024 ( 0 / 0 )', 0, '2012-01-06 14:25:40'),
(1084, 50, 'Buy 0.1 Lots of GBPCHF @ 1.4744 ( 0 / 0 )', 0, '2012-01-06 14:25:47'),
(1085, 50, 'Sell 0.1 Lots of SILVER @ 29.24 ( 0 / 0 )', 0, '2012-01-06 14:25:55'),
(1086, 50, 'Buy 0.1 Lots of CHFJPY @ 80.84 ( 0 / 0 )', 0, '2012-01-06 14:26:05'),
(1087, 50, 'Sell 0.1 Lots of CHFJPY @ 80.74 ( 0 / 0 )', 138, '2012-01-06 14:27:13'),
(1088, 50, 'Sell 0.1 Lots of CHFJPY @ 80.73 ( 0 / 0 )', 0, '2012-01-06 14:27:17'),
(1089, 50, 'Buy 0.1 Lots of CHFJPY @ 80.58 ( 0 / 0 )', 0, '2012-01-06 15:28:43'),
(1090, 50, 'Buy 0.1 Lots of CHFJPY @ 80.70 ( 0 / 0 )', 0, '2012-01-06 17:47:25'),
(1091, 50, 'Sell 0.1 Lots of GBPUSD @ 1.5346 ( 0 / 0 )', 0, '2012-01-12 10:56:38'),
(1092, 50, 'Close Order 1963456 Sell 0.1 of CHFJPY @ 81.05', 0, '2012-01-12 10:56:50'),
(1093, 50, 'Close Order 1963454 Sell 0.1 of SILVER @ 30.55', 0, '2012-01-12 11:00:34'),
(1094, 50, 'Sell 0.1 Lots of EURUSD @ 1.2759 ( 0 / 0 )', 0, '2012-01-12 11:24:41'),
(1095, 50, 'Sell 0.4 Lots of EURUSD @ 1.2761 ( 0 / 0 )', 0, '2012-01-12 11:29:07'),
(1096, 50, 'Buy 0.5 Lots of GBPUSD @ 1.5342 ( 0 / 0 )', 0, '2012-01-12 11:29:25'),
(1097, 50, 'Modify Order 1963382 Buy 0.1 USDJPY @ 76.89 ( 77.78 / 0.00 )', 130, '2012-01-12 11:34:34'),
(1098, 50, 'Modify Order 1963382 Buy 0.1 USDJPY @ 76.89 ( 77.78 / 77.99 )', 130, '2012-01-12 11:34:43'),
(1099, 50, 'Modify Order 1963382 Buy 0.1 USDJPY @ 76.90 ( 77.99 / 77.88 )', 130, '2012-01-12 11:34:52'),
(1100, 50, 'Close Order 1963382 Buy 0.1 of USDJPY @ 76.87', 0, '2012-01-12 11:35:00'),
(1101, 50, 'Close Order 1963382 Buy 0.1 of USDJPY @ 76.87', 2, '2012-01-12 11:35:08'),
(1102, 50, 'Close Order 1963382 Buy 0.1 of USDJPY @ 76.86', 2, '2012-01-12 11:35:24'),
(1103, 50, 'Close All GBPUSD', 0, '2012-01-12 11:35:41'),
(1104, 50, 'Delete Order 1963398', 65, '2012-01-12 11:35:53'),
(1105, 50, 'Delete Order 1963398', 0, '2012-01-12 11:36:42'),
(1106, 50, 'Buy 0.1 Lots of EURUSD @ 1.2755 ( 0 / 0 )', 0, '2012-01-12 11:54:10'),
(1107, 50, 'Close Order 1963447 Buy 0.1 of USDCHF @ 0.9488', 0, '2012-01-12 11:55:22'),
(1108, 50, 'Close Order 1963447 Buy 0.1 of USDCHF @ 0.9487', 2, '2012-01-12 11:56:47'),
(1109, 50, 'Close Order 1963447 Buy 0.1 of USDCHF @ 0.9488', 2, '2012-01-12 11:56:57'),
(1110, 50, 'Close Order 1963448 Buy 0.1 of USDCHF @ 0.9495', 0, '2012-01-12 12:37:34'),
(1111, 50, 'Close Order 1963448 Buy 0.1 of USDCHF @ 0.9495', 2, '2012-01-12 12:37:58'),
(1112, 50, 'Sell 0.1 Lots of EURUSD @ 1.2678 ( 0 / 0 )', 132, '2012-01-14 11:12:22'),
(1113, 50, 'Sell 0.1 Lots of EURUSD @ 1.2678 ( 0 / 0 )', 132, '2012-01-14 17:43:04'),
(1114, 50, 'Close Order 1963449 Buy 0.1 of NZDUSD @ 0.7939', 132, '2012-01-14 18:12:11'),
(1115, 12392647, 'Close Order 1963152 Sell 0.1 of GBPUSD @ 1.5318', 0, '2012-01-16 12:17:47'),
(1116, 12392647, 'Modify Order 1963174 Sell 0.1 NZDUSD @ 0.7930 ( 0.7690 / 0.0000 )', 130, '2012-01-16 12:18:15'),
(1117, 12392647, 'Modify Order 1963174 Sell 0.1 NZDUSD @ 0.7930 ( 0.7602 / 0.0000 )', 130, '2012-01-16 12:18:32'),
(1118, 12392647, 'Close Order 1963174 Sell 0.1 of NZDUSD @ 0.7934', 0, '2012-01-16 12:19:24'),
(1119, 12392647, 'Buy 0.1 Lots of EURUSD @ 1.2674 ( 0 / 0 )', 0, '2012-01-16 12:19:34'),
(1120, 12392647, 'Modify Order 1963469 Buy 0.1 EURUSD @ 1.2674 ( 1.2650 / 0.0000 )', 0, '2012-01-16 12:19:59'),
(1121, 12392647, 'Modify Order 1963469 Buy 0.1 EURUSD @ 1.2674 ( 1.2250 / 0.0000 )', 0, '2012-01-16 12:20:09'),
(1122, 12392647, 'Modify Order 1963469 Buy 0.1 EURUSD @ 1.2675 ( 1.2250 / 1.2766 )', 0, '2012-01-16 12:20:20'),
(1123, 12392647, 'Buy 0.1 Lots of EURUSD @ 1.2681 ( 0 / 0 )', 0, '2012-01-16 12:26:41'),
(1124, 12392647, 'Sell 0.1 Lots of EURUSD @ 1.2679 ( 0 / 0 )', 0, '2012-01-16 12:26:51'),
(1125, 12392647, 'Sell 0.1 Lots of EURUSD @ 1.2678 ( 0 / 0 )', 0, '2012-01-16 12:27:20'),
(1126, 12392647, 'Close All EURUSD', 0, '2012-01-16 12:27:45'),
(1127, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1 ( 0 / 0 )', 0, '2012-01-17 17:52:25'),
(1128, 50, 'Sell 0.1 Lots of EURUSD @ 1.2930 ( 0 / 0 )', 0, '2012-01-23 09:27:17'),
(1129, 12392682, 'Buy 0.1 Lots of EURUSD @ 1.2984 ( 0 / 0 )', 0, '2012-01-25 16:21:33'),
(1130, 12392647, 'Sell 0.1 Lots of USDJPY @ 76.97 ( 0 / 0 )', 0, '2012-01-27 12:03:30'),
(1131, 12392647, 'Sell 0.1 Lots of EURUSD @ 1.3151 ( 0 / 0 )', 0, '2012-01-27 12:48:04'),
(1132, 12392647, 'Buy 0.1 Lots of EURUSD @ 1.3157 ( 0 / 0 )', 0, '2012-01-27 12:49:10'),
(1133, 12392647, 'Sell 0.1 Lots of EURUSD @ 1.3154 ( 0 / 0 )', 0, '2012-01-27 12:49:25'),
(1134, 12392647, 'Buy 0.1 Lots of EURUSD @ 1.3156 ( 0 / 0 )', 0, '2012-01-27 12:50:36'),
(1135, 12392647, 'Sell 0.1 Lots of EURUSD @ 1.3142 ( 0 / 0 )', 0, '2012-01-27 13:22:59'),
(1136, 12392647, 'Sell 0.1 Lots of USDCHF @ 0.9195 ( 0 / 0 )', 0, '2012-01-27 13:31:01'),
(1137, 12392647, 'Close All EURUSD', 0, '2012-01-27 13:32:29'),
(1138, 12392647, 'Buy 0.1 Lots of EURUSD @ 1.3144 ( 0 / 0 )', 0, '2012-01-27 13:33:15'),
(1139, 12392647, 'Close Order 1963485 Buy 0.1 of EURUSD @ 1.3135', 0, '2012-01-27 13:33:39'),
(1140, 12392647, 'Close Order 1963484 Sell 0.1 of USDCHF @ 0.9199', 0, '2012-01-27 13:33:52'),
(1141, 12392647, 'Sell 0.1 Lots of AUDUSD @ 1.0633 ( 0 / 0 )', 0, '2012-01-27 13:36:42'),
(1142, 12392647, 'Close Order 1963478 Sell 0.1 of USDJPY @ 76.67', 0, '2012-01-27 17:38:09'),
(1143, 12392647, 'Close Order 1963486 Sell 0.1 of AUDUSD @ 1.0642', 0, '2012-01-27 17:38:28'),
(1144, 12392647, 'Close Order 1963176 Sell 0.1 of EURGBP @ 0.8396', 0, '2012-01-27 17:39:12'),
(1145, 50, 'Buy 0.1 Lots of USDCAD @ 1.0054 ( 0 / 0 )', 0, '2012-01-30 10:53:14'),
(1146, 50, 'Close Order 1963489 Buy 0.1 of USDCAD @ 1.0046', 0, '2012-01-30 10:54:46'),
(1147, 50, 'Buy 0.1 Lots of EURUSD @  ( 0 / 0 )', 129, '2012-01-30 12:30:59'),
(1148, 50, 'Buy 0.1 Lots of EURUSD @  ( 0 / 0 )', 129, '2012-01-30 12:31:07'),
(1149, 50, 'Buy 0.1 Lots of EURUSD @  ( 0 / 0 )', 129, '2012-01-30 12:31:18'),
(1150, 50, 'Sell 0.1 Lots of EURUSD @  ( 0 / 0 )', 129, '2012-01-30 12:31:26'),
(1151, 50, 'Buy 0.1 Lots of EURUSD @  ( 0 / 0 )', 129, '2012-01-30 12:31:39'),
(1152, 50, 'Buy 0.1 Lots of EURUSD @  ( 0 / 0 )', 129, '2012-01-30 12:31:49'),
(1153, 50, 'Close Order 1963383 Buy 0.1 of USDJPY @ 76.24', 0, '2012-01-30 17:49:00'),
(1154, 50, 'Delete Order 1962805', 0, '2012-01-30 18:51:37'),
(1155, 50, 'Delete Order 1962795', 0, '2012-01-30 18:51:48'),
(1156, 50, 'Delete Order 1962801', 0, '2012-01-30 18:52:02'),
(1157, 50, 'Delete Order 1962801', 2, '2012-01-30 18:52:11'),
(1158, 50, 'Delete Order 1962829', 0, '2012-01-30 18:52:22'),
(1159, 50, 'Close Order 1963453 Buy 0.1 of GBPCHF @ 1.4405', 0, '2012-01-31 00:20:16'),
(1160, 12392647, 'Sell 0.1 Lots of GBPUSD @ 1.5733 ( 0 / 0 )', 0, '2012-01-31 06:56:04'),
(1161, 12392647, 'Close Order 1963508 Sell 0.1 of GBPUSD @ 1.5736', 0, '2012-01-31 06:56:28'),
(1162, 12392684, 'Buy 0.1 Lots of USDJPY @ 76.29 ( 0 / 0 )', 0, '2012-02-03 12:37:55'),
(1163, 12392684, 'Buy 0.1 Lots of EURUSD @ 1.3168 ( 0 / 0 )', 0, '2012-02-03 12:39:48'),
(1164, 12392684, 'Sell 0.1 Lots of EURUSD @ 1.3157 ( 0 / 0 )', 0, '2012-02-03 12:53:34'),
(1165, 12392684, 'Sell 0.1 Lots of EURUSD @ 1.3158 ( 0 / 0 )', 0, '2012-02-03 12:53:57'),
(1166, 12392684, 'Sell 1 Lots of EURUSD @ 1.3159 ( 0 / 0 )', 0, '2012-02-03 12:54:11'),
(1167, 12392684, 'Sell 1 Lots of EURUSD @ 1.3155 ( 0 / 0 )', 0, '2012-02-03 12:55:58'),
(1168, 12392684, 'Sell 1 Lots of EURUSD @ 1.3153 ( 0 / 0 )', 0, '2012-02-03 12:56:48'),
(1169, 12392682, 'Sell 0.1 Lots of EURUSD @ 1.3180 ( 0 / 0 )', 132, '2012-02-12 08:54:17'),
(1170, 12392682, 'Buy 0.1 Lots of EURUSD @ 1.3183 ( 0 / 0 )', 132, '2012-02-12 08:54:24'),
(1171, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1 ( 0 / 0 )', 0, '2012-02-13 13:22:00'),
(1172, 50, 'Close Order 1963449 Buy 0.1 of NZDUSD @ 0.8269', 0, '2012-02-16 13:22:51'),
(1173, 50, 'Buy 0.3 Lots of EURUSD @ 1.3238 ( 0 / 0 )', 0, '2012-02-21 15:12:50'),
(1174, 50, 'Sell 0.1 Lots of USDJPY @ 81.06 ( 0 / 0 )', 132, '2012-02-26 13:27:19'),
(1175, 50, 'Close All EURUSD', 132, '2012-02-26 13:27:34'),
(1176, 50, 'Delete Order 1963521', 132, '2012-02-26 13:30:37'),
(1177, 12392647, 'Close Order 1963400 Sell 0.1 of AUDUSD @ 1.0607', 0, '2012-03-19 23:46:07'),
(1178, 12392647, 'Buy Limit 0.1 Lots of EURUSD @ 1.3120 ( 0 / 0 )', 0, '2012-03-19 23:51:26'),
(1179, 50, 'Close Order 1963506 Sell 0.1 of EURUSD @ 1.3237', 0, '2012-03-20 15:46:16'),
(1180, 1000, 'Sell 0.1 Lots of SILVER @ 30.36 ( 0 / 0 )', 0, '2012-05-03 11:04:03'),
(1181, 50, 'Buy 0.1 Lots of EURUSD @ 1.2537 ( 0 / 0 )', 0, '2012-06-13 10:54:07'),
(1182, 50, 'Buy 0.1 Lots of EURUSD @ 1.2537 ( 0 / 0 )', 0, '2012-06-13 10:54:18'),
(1183, 12392724, 'Sell 0.1 Lots of EURUSD @ 1.2540 ( 0 / 0 )', 0, '2012-06-13 14:28:05'),
(1184, 12392724, 'Buy 0.1 Lots of EURUSD @ 1.2543 ( 0 / 0 )', 0, '2012-06-13 14:28:32'),
(1185, 12392724, 'Sell 0.1 Lots of EURUSD @ 1.2540 ( 0 / 0 )', 0, '2012-06-13 14:28:42'),
(1186, 12392724, 'Buy 0.1 Lots of EURUSD @ 1.2544 ( 0 / 0 )', 0, '2012-06-13 14:28:57'),
(1187, 12392724, 'Buy 0.1 Lots of EURUSD @ 1.2545 ( 0 / 0 )', 0, '2012-06-13 14:29:16'),
(1188, 12392724, 'Sell 0.1 Lots of EURUSD @ 1.2547 ( 0 / 0 )', 0, '2012-06-13 14:30:37'),
(1189, 12392724, 'Sell 0.1 Lots of EURUSD @ 1.2546 ( 0 / 0 )', 0, '2012-06-13 14:33:28'),
(1190, 1000, 'Buy 0.1 Lots of EURUSD @ 1.2621 ( 0 / 0 )', 0, '2012-06-15 07:07:58'),
(1191, 1000, 'Close Order 1963555 Sell 0.1 of SILVER @ 28.78', 0, '2012-06-15 07:08:22'),
(1192, 1000, 'Buy 0.1 Lots of GOLD @ 1625.60 ( 0 / 0 )', 0, '2012-06-15 07:09:21'),
(1193, 1000, 'Close Order 1963794 Buy 0.1 of EURUSD @ 1.2617', 0, '2012-06-15 07:09:57'),
(1194, 1000, 'Close Order 1963795 Buy 0.1 of GOLD @ 1625.38', 0, '2012-06-15 07:10:02'),
(1195, 12392725, 'Buy 0.1 Lots of EURUSD @ 1.2659 ( 0 / 0 )', 132, '2012-06-17 15:54:25'),
(1196, 12392725, 'Sell 0.1 Lots of EURUSD @ 1.2656 ( 0 / 0 )', 132, '2012-06-17 15:54:29'),
(1197, 12392725, 'Sell 0.1 Lots of EURUSD @ 1.2712 ( 0 / 0 )', 0, '2012-06-18 00:54:18'),
(1198, 12392725, 'Buy 0.1 Lots of EURUSD @ 1.2688 ( 0 / 0 )', 0, '2012-06-18 02:53:04'),
(1199, 12392725, 'Close All EURUSD', 0, '2012-06-18 02:53:11'),
(1200, 50, 'Buy 0.1 Lots of EURUSD @ 1.2711 ( 0 / 0 )', 0, '2012-06-20 12:30:26'),
(1201, 12392728, 'Sell 0.1 Lots of EURUSD @ 1.2573 ( 0 / 0 )', 0, '2012-06-21 16:22:56'),
(1202, 12392728, 'Sell 0.1 Lots of EURUSD @ 1.2564 ( 0 / 0 )', 0, '2012-06-21 17:38:41'),
(1203, 12392728, 'Buy 0.1 Lots of EURUSD @ 1.2567 ( 0 / 0 )', 0, '2012-06-21 17:39:10'),
(1204, 12392728, 'Close All EURUSD', 0, '2012-06-21 17:39:25'),
(1205, 12392730, 'Sell 0.1 Lots of EURUSD @ 1.2482 ( 0 / 0 )', 0, '2012-06-25 11:04:28'),
(1206, 12392730, 'Buy 0.1 Lots of EURUSD @ 1.2485 ( 0 / 0 )', 0, '2012-06-25 11:04:40'),
(1207, 12392730, 'Sell 0.1 Lots of GBPUSD @ 1.5539 ( 0 / 0 )', 0, '2012-06-25 11:21:59'),
(1208, 12392730, 'Sell 0.1 Lots of GBPUSD @ 1.5541 ( 0 / 0 )', 0, '2012-06-25 11:22:30');
INSERT INTO `mt4_requests` (`id`, `login`, `request`, `status`, `time_create`) VALUES
(1209, 12392731, 'Sell 0.1 Lots of EURUSD @ 1.2499 ( 0 / 0 )', 0, '2012-06-26 05:25:52'),
(1210, 12392730, 'Sell 0.1 Lots of EURUSD @ 1.2491 ( 0 / 0 )', 0, '2012-06-26 08:57:50'),
(1211, 12392730, 'Close All EURUSD', 0, '2012-06-26 08:57:59'),
(1212, 12392730, 'Buy 0.1 Lots of EURUSD @ 1.2516 ( 0 / 0 )', 0, '2012-06-26 10:03:02'),
(1213, 12392731, 'Close Order 1963845 Sell 0.1 of EURUSD @ 1.2477', 0, '2012-06-26 12:08:44'),
(1214, 12392730, 'Sell 0.1 Lots of AUDUSD @ 1.0037 ( 0 / 0 )', 0, '2012-06-26 13:02:52'),
(1215, 12392730, 'Buy 0.1 Lots of AUDUSD @ 1.0041 ( 0 / 0 )', 0, '2012-06-26 13:03:06'),
(1216, 12392730, 'Buy 0.1 Lots of AUDUSD @ 1.0041 ( 0 / 0 )', 0, '2012-06-26 13:03:16'),
(1217, 12392730, 'Buy 0.1 Lots of AUDUSD @ 1.0040 ( 0 / 0 )', 0, '2012-06-26 13:03:33'),
(1218, 12392730, 'Buy 0.1 Lots of AUDUSD @ 1.0036 ( 0 / 0 )', 0, '2012-06-26 13:07:19'),
(1219, 12392730, 'Buy 0.1 Lots of GBPUSD @ 1.5596 ( 0 / 0 )', 0, '2012-06-26 13:07:41'),
(1220, 12392730, 'Sell 0.1 Lots of GBPUSD @ 1.5593 ( 0 / 0 )', 0, '2012-06-26 13:07:54'),
(1221, 12392730, 'Close All GBPUSD', 0, '2012-06-26 13:08:01'),
(1222, 12392730, 'Close All EURUSD', 0, '2012-06-26 13:08:06'),
(1223, 12392730, 'Close All AUDUSD', 0, '2012-06-26 13:08:11'),
(1224, 12392730, 'Close Order 1963854 Sell 0.1 of GBPUSD @ 1.5598', 0, '2012-06-26 13:08:26'),
(1225, 12392730, 'Close Order 1963852 Buy 0.1 of AUDUSD @ 1.0032', 0, '2012-06-26 13:08:33'),
(1226, 12392730, 'Close Order 1963851 Buy 0.1 of AUDUSD @ 1.0033', 0, '2012-06-26 13:08:38'),
(1227, 12392730, 'Close Order 1963850 Buy 0.1 of AUDUSD @ 1.0035', 0, '2012-06-26 13:08:46'),
(1228, 12392730, 'Close Order 1963842 Sell 0.1 of GBPUSD @ 1.5597', 0, '2012-06-26 13:08:51'),
(1229, 12392730, 'Buy 0.1 Lots of GBPUSD @ 1.5595 ( 0 / 0 )', 0, '2012-06-26 13:09:11'),
(1230, 12392730, 'Sell 0.1 Lots of GBPUSD @ 1.5593 ( 0 / 0 )', 0, '2012-06-26 13:09:19'),
(1231, 12392730, 'Modify Order 1963855 Buy 0.1 GBPUSD @ 1.5593 ( 0.0000 / 0.001 )', 130, '2012-06-26 13:10:11'),
(1232, 12392730, 'Buy 0.1 Lots of GBPUSD @ 1.5619 ( 0 / 0 )', 0, '2012-06-26 14:03:05'),
(1233, 12392730, 'Modify Order 1963857 Buy 0.1 GBPUSD @ 1.5613 ( 0.0001 / 0.0000 )', 0, '2012-06-26 14:04:05'),
(1234, 12392730, 'Buy 0.1 Lots of GBPUSD @ 1.5615 ( 0 / 0 )', 0, '2012-06-26 14:04:41'),
(1235, 12392730, 'Sell 0.1 Lots of GBPUSD @ 1.5612 ( 0 / 0 )', 0, '2012-06-26 14:05:12'),
(1236, 12392730, 'Sell 0.1 Lots of GBPUSD @ 1.5613 ( 1 / 0 )', 130, '2012-06-26 14:06:01'),
(1237, 12392730, 'Buy 0.1 Lots of GBPUSD @ 1.5618 ( 1 / 0 )', 0, '2012-06-26 14:06:07'),
(1238, 1000, 'Buy 0.1 Lots of EURUSD @ 1.2474 ( 0 / 0 )', 0, '2012-06-27 17:27:24'),
(1239, 50, 'Buy 0.1 Lots of EURUSD @ 1.2635 ( 0 / 0 )', 0, '2012-07-02 07:48:31'),
(1240, 12392733, 'Sell 0.8 Lots of GBPUSD @ 1.5492 ( 0 / 0 )', 0, '2012-07-12 06:34:50'),
(1241, 12392733, 'Buy 1.6 Lots of EURUSD @ 1.2240 ( 0 / 0 )', 0, '2012-07-12 06:35:13'),
(1242, 12392733, 'Close Order 1963869 Sell 0.8 of GBPUSD @ 1.5493', 0, '2012-07-12 06:35:48'),
(1243, 12392733, 'Close Order 1963870 Buy 1.6 of EURUSD @ 1.2236', 0, '2012-07-12 06:36:02'),
(1244, 12392733, 'Sell 0.5 Lots of AUDUSD @ 1.0169 ( 0 / 0 )', 0, '2012-07-12 06:37:16'),
(1245, 12392733, 'Buy 1 Lots of NZDUSD @ 0.7922 ( 0 / 0 )', 0, '2012-07-12 06:37:25'),
(1246, 12392733, 'Buy 0.9 Lots of AUDUSD @ 1.0173 ( 0 / 0 )', 0, '2012-07-12 06:37:42'),
(1247, 12392733, 'Sell 1 Lots of EURCHF @ 1.2008 ( 0 / 0 )', 0, '2012-07-12 06:37:50'),
(1248, 12392733, 'Buy 1.3 Lots of AUDUSD @ 1.0174 ( 0 / 0 )', 0, '2012-07-12 06:38:11'),
(1249, 12392733, 'Buy 4.9 Lots of GOLD @ 1569.77 ( 0 / 0 )', 134, '2012-07-12 06:39:02'),
(1250, 12392733, 'Buy 3.9 Lots of GOLD @ 1569.80 ( 0 / 0 )', 134, '2012-07-12 06:39:14'),
(1251, 12392733, 'Buy 1.9 Lots of GOLD @ 1569.86 ( 0 / 0 )', 0, '2012-07-12 06:39:24'),
(1252, 12392733, 'Modify Order 1963876 Buy 1.9 GOLD @ 1569.40 ( 1560.11 / 0.00 )', 0, '2012-07-12 06:41:26'),
(1253, 12392733, 'Modify Order 1963876 Buy 1.9 GOLD @ 1569.67 ( 1560.11 / 1570.00 )', 0, '2012-07-12 06:41:45'),
(1254, 12392733, 'Modify Order 1963875 Buy 1.3 AUDUSD @ 1.0173 ( 1.016 / 1.018 )', 130, '2012-07-12 06:42:17'),
(1255, 12392733, 'Modify Order 1963875 Buy 1.3 AUDUSD @ 1.0173 ( 1.0160 / 1.0177 )', 130, '2012-07-12 06:42:39'),
(1256, 12392733, 'Modify Order 1963875 Buy 1.3 AUDUSD @ 1.0174 ( 1.0177 / 1.0160 )', 130, '2012-07-12 06:42:54'),
(1257, 12392733, 'Modify Order 1963875 Buy 1.3 AUDUSD @ 1.0172 ( 1.0165 / 1.0170 )', 130, '2012-07-12 06:43:16'),
(1258, 12392733, 'Close Order 1963876 Buy 1.9 of GOLD @ 1569.74', 0, '2012-07-12 06:43:27'),
(1259, 12392733, 'Close Order 1963872 Buy 1 of NZDUSD @ 0.7910', 0, '2012-07-12 06:44:10'),
(1260, 12392733, 'Close Order 1963871 Sell 0.5 of AUDUSD @ 1.0170', 0, '2012-07-12 06:44:30'),
(1261, 12392733, 'Close Order 1963874 Sell 1 of EURCHF @ 1.2010', 0, '2012-07-12 06:44:59'),
(1262, 12392733, 'Close Order 1963873 Buy 0.9 of AUDUSD @ 1.0165', 0, '2012-07-12 06:45:06'),
(1263, 12392733, 'Close Order 1963875 Buy 1.3 of AUDUSD @ 1.0164', 0, '2012-07-12 06:45:11'),
(1264, 12392733, 'Sell 0.9 Lots of AUDUSD @ 1.0163 ( 0 / 0 )', 0, '2012-07-12 06:53:25'),
(1265, 12392733, 'Close Order 1963877 Sell 0.9 of AUDUSD @ 1.0168', 0, '2012-07-12 06:54:18'),
(1266, 12392738, 'Sell 0.1 Lots of USDJPY @ 79.06 ( 0 / 0 )', 0, '2012-07-18 03:11:49'),
(1267, 12392738, 'Sell 0.1 Lots of EURJPY @ 97.20 ( 0 / 0 )', 0, '2012-07-18 03:12:57'),
(1268, 12392738, 'Sell 0.1 Lots of EURJPY @ 97.20 ( 0 / 0 )', 0, '2012-07-18 03:13:01'),
(1269, 12392738, 'Sell 0.1 Lots of EURJPY @ 97.20 ( 0 / 0 )', 0, '2012-07-18 03:13:06'),
(1270, 12392739, 'Buy 1.2 Lots of EURUSD @ 1.2287 ( 0 / 0 )', 0, '2012-07-18 08:56:54'),
(1271, 12392739, 'Buy 1 Lots of EURUSD @ 1.2274 ( 0 / 0 )', 0, '2012-07-18 09:05:32'),
(1272, 12392739, 'Sell 1 Lots of EURUSD @ 1.2272 ( 0 / 0 )', 0, '2012-07-18 09:05:40'),
(1273, 12392739, 'Buy 1 Lots of EURUSD @ 1.2260 ( 0 / 0 )', 0, '2012-07-18 09:28:57'),
(1274, 12392740, 'Sell 0.1 Lots of EURUSD @ 1.2111 ( 0 / 0 )', 0, '2012-07-23 03:16:46'),
(1275, 12392740, 'Buy 0.1 Lots of USDCHF @ 0.9918 ( 0 / 0 )', 0, '2012-07-23 03:17:14'),
(1276, 1000, 'Buy 0.1 Lots of EURUSD @ 1.2057 ( 0 / 0 )', 0, '2012-07-24 17:37:29'),
(1277, 1000, 'Buy 0.1 Lots of EURUSD @ 1.2057 ( 0 / 0 )', 0, '2012-07-24 17:37:41'),
(1278, 12392743, 'Buy 0.1 Lots of EURUSD @ 1.2305 ( 0 / 0 )', 132, '2012-07-29 14:50:34'),
(1279, 12392743, 'Sell 0.1 Lots of EURUSD @ 1.2302 ( 0 / 0 )', 132, '2012-07-29 15:33:08'),
(1280, 12392740, 'Sell 0.1 Lots of EURUSD @ 1.2400 ( 0 / 0 )', 0, '2012-08-07 01:56:54'),
(1281, 12392740, 'Sell 0.1 Lots of USDCAD @ 1.0007 ( 0 / 0 )', 0, '2012-08-07 06:12:19'),
(1282, 12392740, 'Buy 0.1 Lots of USDCAD @ 1.0012 ( 0 / 0 )', 0, '2012-08-07 06:12:28'),
(1283, 12392740, 'Close All USDCAD', 0, '2012-08-07 06:12:37'),
(1284, 12392740, 'Close Order 1963894 Buy 0.1 of USDCHF @ 0.9704', 0, '2012-08-07 06:13:12'),
(1285, 12392740, 'Close Order 1963902 Sell 0.1 of EURUSD @ 1.2380', 0, '2012-08-07 06:13:21'),
(1286, 12392740, 'Close Order 1963893 Sell 0.1 of EURUSD @ 1.2380', 0, '2012-08-07 06:13:27'),
(1287, 12392740, 'Sell 0.1 Lots of EURUSD @ 1.2376 ( 0 / 0 )', 0, '2012-08-07 06:13:32'),
(1288, 12392740, 'Buy 0.7 Lots of USDJPY @ 78.29 ( 0 / 0 )', 0, '2012-08-07 06:17:25'),
(1289, 12392740, 'Close Order 1963906 Buy 0.7 of USDJPY @ 78.26', 0, '2012-08-07 06:17:42'),
(1290, 12392740, 'Buy 0.1 Lots of EURUSD @ 1.2389 ( 0 / 0 )', 0, '2012-08-07 06:51:22'),
(1291, 12392740, 'Sell 100 Lots of USDCAD @ 0.9996 ( 0 / 0 )', 134, '2012-08-07 07:19:00'),
(1292, 12392740, 'Sell 0.1 Lots of GBPUSD @ 1.5608 ( 0 / 0 )', 0, '2012-08-07 08:08:32'),
(1293, 12392740, 'Close All EURUSD', 0, '2012-08-07 08:09:16'),
(1294, 12392740, 'Buy Stop 0.1 Lots of AUDUSD @ 1.0560 ( 0 / 0 )', 130, '2012-08-07 08:26:21'),
(1295, 12392740, 'Buy Stop 0.1 Lots of AUDUSD @ 1.0562 ( 0 / 0 )', 130, '2012-08-07 08:26:29'),
(1296, 12392740, 'Buy Stop 0.1 Lots of AUDUSD @ 1.0602 ( 0 / 0 )', 130, '2012-08-07 08:26:45'),
(1297, 12392740, 'Buy Stop 0.1 Lots of AUDUSD @ 1.0602 ( 0 / 0 )', 130, '2012-08-07 08:27:10'),
(1298, 12392740, 'Buy Stop 0.1 Lots of AUDUSD @ 1.0602 ( 0 / 0 )', 130, '2012-08-07 08:27:36'),
(1299, 12392740, 'Sell Limit 0.1 Lots of AUDUSD @ 1.0602 ( 0 / 0 )', 0, '2012-08-07 08:27:48'),
(1300, 12392740, 'Sell Stop 0.1 Lots of AUDUSD @ 1.0580 ( 0 / 0 )', 130, '2012-08-07 08:35:49'),
(1301, 12392740, 'Sell Stop 0.1 Lots of AUDUSD @ 1.0579 ( 0 / 0 )', 130, '2012-08-07 08:36:00'),
(1302, 12392740, 'Sell Stop 0.1 Lots of AUDUSD @ 1.0578 ( 0 / 0 )', 130, '2012-08-07 08:36:06'),
(1303, 12392740, 'Sell Stop 0.1 Lots of AUDUSD @ 1.0577 ( 0 / 0 )', 130, '2012-08-07 08:36:13'),
(1304, 12392740, 'Sell Stop 0.1 Lots of AUDUSD @ 1.0576 ( 0 / 0 )', 0, '2012-08-07 08:36:21'),
(1305, 12392740, 'Modify Order 1963911  0.1 AUDUSD @ 1.0600 ( 0.0000 / 0.0000 )', 0, '2012-08-07 08:39:30'),
(1306, 12392740, 'Modify Order 1963911  0.1 AUDUSD @ 1.0590 ( 0.0000 / 0.0000 )', 130, '2012-08-07 08:39:42'),
(1307, 12392740, 'Modify Order 1963911  0.1 AUDUSD @ 1.0598 ( 0.0000 / 0.0000 )', 0, '2012-08-07 08:39:55'),
(1308, 12392740, 'Modify Order 1963911  0.1 AUDUSD @ 1.0596 ( 0.0000 / 0.0000 )', 130, '2012-08-07 08:40:05'),
(1309, 12392740, 'Delete Order 1963911', 0, '2012-08-07 08:59:55'),
(1310, 12392740, 'Close Order 1963912 Sell 0.1 of AUDUSD @ 1.0583', 0, '2012-08-07 09:00:10'),
(1311, 12392740, 'Buy 0.1 Lots of AUDUSD @ 1.0580 ( 0 / 0 )', 0, '2012-08-07 09:45:11'),
(1312, 12392740, 'Buy 1 Lots of AUDUSD @ 1.0578 ( 0 / 0 )', 0, '2012-08-07 09:45:19'),
(1313, 12392740, 'Sell 0.1 Lots of EURCHF @ 1.2013 ( 0 / 0 )', 0, '2012-08-07 09:45:27'),
(1314, 12392740, 'Buy Limit 0.1 Lots of EURUSD @ 1.2500 ( 0 / 0 )', 130, '2012-08-07 09:47:14'),
(1315, 12392740, 'Sell Limit 0.1 Lots of EURUSD @ 1.2500 ( 0 / 0 )', 0, '2012-08-07 09:47:25'),
(1316, 12392751, 'Sell 0.1 Lots of GOLD @ 1612.95 ( 0 / 0 )', 0, '2012-08-09 12:56:03'),
(1317, 12392751, 'Sell 0.1 Lots of GOLD @ 1613.07 ( 1615.5 / 1610.5 )', 0, '2012-08-09 13:09:31'),
(1318, 12392751, 'Modify Order 1963928 Sell 0.1 GOLD @ 1612.95 ( 1617.50 / 1608.50 )', 0, '2012-08-09 13:11:15'),
(1319, 12392751, 'Modify Order 1963927 Sell 0.1 GOLD @ 1613.11 ( 1617.5 / 1608.5 )', 0, '2012-08-09 13:12:01'),
(1320, 12392738, 'Sell Limit 0.1 Lots of EURUSD @ 1 ( 0 / 0 )', 130, '2012-08-09 13:45:15'),
(1321, 12392748, 'Close Order 1963920 Buy 0.1 of EURUSD @ 1.2305', 0, '2012-08-09 14:28:46'),
(1322, 12392748, 'Buy 0.1 Lots of EURUSD @ 1.2305 ( 0 / 0 )', 0, '2012-08-09 14:32:53'),
(1323, 12392748, 'Sell 0.5 Lots of EURUSD @ 1.2305 ( 0 / 0 )', 0, '2012-08-09 14:38:12'),
(1324, 12392748, 'Buy 1 Lots of EURUSD @ 1.2309 ( 0 / 0 )', 0, '2012-08-09 14:38:27'),
(1325, 12392748, 'Sell 1 Lots of EURUSD @ 1.2291 ( 0 / 0 )', 0, '2012-08-10 05:29:14'),
(1326, 12392748, 'Buy 0.1 Lots of EURUSD @ 1.2293 ( 0 / 0 )', 0, '2012-08-10 05:29:18'),
(1327, 12392748, 'Sell 0.1 Lots of EURUSD @ 1.2293 ( 0 / 0 )', 133, '2012-08-11 09:31:38'),
(1328, 12392748, 'Buy 0.1 Lots of USDCAD @ 0.9915 ( 0 / 0 )', 132, '2012-08-11 09:31:48'),
(1329, 12392752, 'Sell 0.1 Lots of EURUSD @ 1.2352 ( 0 / 0 )', 0, '2012-08-13 13:49:06'),
(1330, 12392752, 'Buy 0.1 Lots of GBPUSD @ 1.5702 ( 0 / 0 )', 0, '2012-08-13 13:49:34'),
(1331, 12392752, 'Sell 0.1 Lots of GBPUSD @ 1.5701 ( 0 / 0 )', 0, '2012-08-13 13:49:41'),
(1332, 50, 'Sell 0.1 Lots of EURUSD @ 1.2324 ( 0 / 0 )', 0, '2012-08-14 15:33:43'),
(1333, 12392742, 'Buy 0.1 Lots of EURUSD @ 1.2471 ( 0 / 0 )', 0, '2012-08-22 09:16:14'),
(1334, 12392748, 'Buy 0.1 Lots of EURUSD @ 1.2547 ( 0 / 0 )', 0, '2012-08-23 03:53:56'),
(1335, 12392748, 'Buy 0.1 Lots of USDJPY @ 78.56 ( 0 / 0 )', 0, '2012-08-23 03:54:21'),
(1336, 12392748, 'Buy 1 Lots of USDJPY @ 78.55 ( 0 / 0 )', 0, '2012-08-23 03:54:35'),
(1337, 12392740, 'Close Order 1963916 Sell 0.1 of EURUSD @ 1.2539', 0, '2012-08-23 05:55:32'),
(1338, 50, 'Buy 0.1 Lots of EURUSD @ 1.2568 ( 0 / 0 )', 0, '2012-08-28 15:36:57'),
(1339, 50, 'Buy 0.1 Lots of EURUSD @ 1.2568 ( 0 / 0 )', 0, '2012-08-28 15:37:47'),
(1340, 50, 'Close Order 1963952 Buy 0.1 of EURUSD @ 1.2564', 0, '2012-08-28 15:39:37'),
(1341, 50, 'Sell 0.1 Lots of EURUSD @ 1.2565 ( 0 / 0 )', 0, '2012-08-28 15:40:18'),
(1342, 12392762, 'Sell 0.1 Lots of EURUSD @ 1.2547 ( 0 / 0 )', 0, '2012-08-30 13:56:56'),
(1343, 12392762, 'Close Order 1963960 Sell 0.1 of EURUSD @ 1.2500', 0, '2012-08-30 14:59:38'),
(1344, 12392762, 'Buy 0.5 Lots of EURUSD @ 1.2503 ( 0 / 0 )', 0, '2012-08-30 16:47:17'),
(1345, 12392762, 'Buy 0.1 Lots of EURJPY @ 98.58 ( 0 / 0 )', 0, '2012-09-02 22:11:22'),
(1346, 12392647, 'Sell 0.1 Lots of AUDUSD @ 1.0219 ( 0 / 0 )', 0, '2012-09-06 12:56:59'),
(1347, 12392647, 'Buy 0.1 Lots of AUDJPY @ 80.61 ( 0 / 0 )', 0, '2012-09-06 12:57:46'),
(1348, 12392647, 'Sell 0.1 Lots of AUDJPY @ 80.55 ( 0 / 0 )', 0, '2012-09-06 12:59:02'),
(1349, 12392647, 'Sell 0.1 Lots of AUDJPY @ 80.64 ( 0 / 0 )', 0, '2012-09-06 13:10:01'),
(1350, 12392647, 'Buy 0.1 Lots of USDCAD @ 0.9862 ( 0 / 0 )', 0, '2012-09-06 13:10:22'),
(1351, 12392647, 'Sell 0.1 Lots of EURCAD @ 1.2416 ( 0 / 0 )', 0, '2012-09-06 13:10:44'),
(1352, 12392765, 'Sell 0.1 Lots of USDCHF @ 0.9578 ( 0 / 0 )', 0, '2012-09-06 13:24:07'),
(1353, 12392765, 'Buy 0.1 Lots of USDCHF @ 0.9581 ( 0 / 0 )', 0, '2012-09-06 13:24:32'),
(1354, 12392765, 'Sell 0.1 Lots of AUDJPY @ 80.75 ( 0 / 0 )', 0, '2012-09-06 13:32:53'),
(1355, 12392765, 'Buy 0.1 Lots of AUDJPY @ 80.86 ( 0 / 0 )', 0, '2012-09-06 13:34:50'),
(1356, 12392765, 'Sell 0.1 Lots of EURAUD @ 1.2287 ( 0 / 0 )', 0, '2012-09-06 13:35:06'),
(1357, 50, 'Buy 0.1 Lots of EURUSD @ 1.27780 ( 0 / 0 )', 0, '2012-09-11 11:59:24'),
(1358, 50, 'Buy 0.1 Lots of EURUSD @ 1.28304 ( 0 / 0 )', 0, '2012-09-11 14:04:18'),
(1359, 12392647, 'Close All EURUSD', 0, '2012-09-11 19:43:09'),
(1360, 12392647, 'Buy 0.1 Lots of EURUSD @ 1.28581 ( 0 / 0 )', 0, '2012-09-11 19:43:24'),
(1361, 12392765, 'Close All USDCHF', 0, '2012-09-12 04:29:06'),
(1362, 12392765, 'Close All AUDJPY', 0, '2012-09-12 04:29:13'),
(1363, 12392765, 'Close Order 1963976 Sell 0.1 of EURAUD @ 1.2292', 0, '2012-09-12 04:31:01'),
(1364, 12392765, 'Sell 0.1 Lots of EURUSD @ 1.28764 ( 0 / 0 )', 0, '2012-09-12 04:36:50'),
(1365, 12392765, 'Buy 0.1 Lots of AUDUSD @ 1.04862 ( 0 / 0 )', 0, '2012-09-12 04:37:53'),
(1366, 12392765, 'Sell 0.1 Lots of NZDUSD @ 0.82059 ( 0 / 0 )', 0, '2012-09-12 04:38:03'),
(1367, 12392765, 'Sell 0.1 Lots of GBPUSD @ 1.60796 ( 0 / 0 )', 0, '2012-09-12 04:38:16'),
(1368, 12392765, 'Modify Order 1963983 Sell 0.1 GBPUSD @ 1.60772 ( 1.61002 / 1.60001 )', 0, '2012-09-12 04:41:43'),
(1369, 12392765, 'Buy 0.1 Lots of EURJPY @ 100.26 ( 7 / 10 )', 130, '2012-09-12 04:42:54'),
(1370, 12392765, 'Buy Limit 0.1 Lots of EURJPY @ 100.30 ( 7 / 10 )', 130, '2012-09-12 04:44:15'),
(1371, 12392765, 'Close Order 1963980 Sell 0.1 of EURUSD @ 1.28798', 0, '2012-09-12 04:44:35'),
(1372, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28781 ( 7 / 10 )', 130, '2012-09-12 04:45:21'),
(1373, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28725 ( 7 / 10 )', 130, '2012-09-12 04:45:30'),
(1374, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28725 ( 7 / 10 )', 130, '2012-09-12 04:45:41'),
(1375, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28705 ( 7 / 10 )', 130, '2012-09-12 04:45:46'),
(1376, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28672 ( 7 / 10 )', 130, '2012-09-12 04:46:01'),
(1377, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28124 ( 7 / 10 )', 130, '2012-09-12 04:46:12'),
(1378, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.27124 ( 7 / 10 )', 130, '2012-09-12 04:46:27'),
(1379, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28713 ( 0 / 0 )', 0, '2012-09-12 04:47:26'),
(1380, 12392765, 'Close Order 1963984 Buy 0.1 of EURUSD @ 1.28701', 0, '2012-09-12 04:47:57'),
(1381, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28613 ( 0 / 0 )', 0, '2012-09-12 04:48:07'),
(1382, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28601 ( 0 / 0 )', 0, '2012-09-12 04:48:50'),
(1383, 12392765, 'Sell Limit 0.1 Lots of EURUSD @ 1.28859 ( 0 / 0 )', 0, '2012-09-12 04:50:11'),
(1384, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28859 ( 1 / 0 )', 130, '2012-09-12 04:52:32'),
(1385, 12392765, 'Buy Limit 0.1 Lots of EURUSD @ 1.28859 ( 7 / 10 )', 130, '2012-09-12 04:53:06'),
(1386, 12392765, 'Sell 1 Lots of EURUSD @ 1.28721 ( 0 / 0 )', 0, '2012-09-12 04:58:39'),
(1387, 12392765, 'Close Order 1963983 Sell 0.1 of GBPUSD @ 1.60788', 0, '2012-09-12 05:16:56'),
(1388, 50, 'Close Order 1963978 Buy 0.1 of EURUSD @ 1.28743', 0, '2012-09-12 07:02:19'),
(1389, 50, 'Close Order 1963977 Buy 0.1 of EURUSD @ 1.28732', 0, '2012-09-12 07:02:46'),
(1390, 50, 'Sell 0.1 Lots of EURUSD @ 1.28725 ( 0 / 0 )', 0, '2012-09-12 07:03:07'),
(1391, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1.28726 ( 0 / 0 )', 0, '2012-09-12 07:03:51'),
(1392, 50, 'Close All EURUSD', 0, '2012-09-12 07:04:12'),
(1393, 50, 'Sell 0.1 Lots of USDJPY @ 77.830 ( 0 / 0 )', 0, '2012-09-12 07:04:46'),
(1394, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1 ( 1 / 5 )', 0, '2012-09-12 10:57:06'),
(1395, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1 ( 0 / 0 )', 0, '2012-09-12 11:09:48'),
(1396, 50, 'Buy Limit 0.1 Lots of EURUSD @ 1 ( 0 / 0 )', 0, '2012-09-12 11:09:57'),
(1397, 50, 'Buy 1 Lots of EURUSD @ 1.31258 ( 0 / 0 )', 0, '2012-09-17 06:47:38'),
(1398, 50, 'Buy 1 Lots of EURUSD @ 1.31017 ( 0 / 0 )', 0, '2012-09-17 08:30:33'),
(1399, 50, 'Buy 1 Lots of EURUSD @ 1.31006 ( 0 / 0 )', 0, '2012-09-17 08:30:50'),
(1400, 50, 'Buy 0.1 Lots of USDJPY @ 78.395 ( 0 / 0 )', 0, '2012-09-17 09:05:51'),
(1401, 50, 'Sell 0.1 Lots of USDCAD @ 0.97154 ( 0 / 0 )', 0, '2012-09-17 09:07:54'),
(1402, 12392647, 'Buy 0.1 Lots of GBPUSD @ 1.62277 ( 0 / 0 )', 0, '2012-09-17 09:41:12'),
(1403, 50, 'Buy 0.1 Lots of EURUSD @ 1.31342 ( 0 / 0 )', 0, '2012-09-17 14:59:37'),
(1404, 12392647, 'Buy Limit 0.1 Lots of GBPJPY @ 127.67 ( 0 / 0 )', 0, '2012-09-17 18:50:12'),
(1405, 12392647, 'Sell 1 Lots of EURAUD @ 1.2480 ( 0 / 0 )', 0, '2012-09-18 22:25:39'),
(1406, 12392647, 'Buy 1 Lots of EURUSD @ 1.30471 ( 0 / 0 )', 0, '2012-09-18 22:25:57'),
(1407, 12392647, 'Buy 0.1 Lots of GBPUSD @ 1.62563 ( 0 / 0 )', 0, '2012-09-21 18:15:25'),
(1408, 12392647, 'Close All AUDJPY', 0, '2012-09-21 18:15:41'),
(1409, 12392647, 'Close Order 1964013 Sell 1 of EURAUD @ 1.2421', 132, '2012-09-22 15:03:25'),
(1410, 50, 'Buy 0.1 Lots of EURUSD @ 1.28608 ( 0 / 0 )', 0, '2012-09-28 14:21:28'),
(1411, 50, 'Sell 0.1 Lots of EURUSD @ 1.28606 ( 0 / 0 )', 0, '2012-09-28 14:21:35'),
(1412, 12392770, 'Sell 0.1 Lots of EURUSD @ 1.28555 ( 0 / 0 )', 133, '2012-09-30 15:29:22'),
(1413, 12392777, 'Sell 0.1 Lots of GOLD @ 1777.98 ( 0 / 0 )', 0, '2012-10-02 03:46:05'),
(1414, 12392778, 'Sell 0.1 Lots of EURUSD @ 1.29062 ( 0 / 0 )', 0, '2012-10-02 06:07:02'),
(1415, 12392780, 'Sell 0.1 Lots of EURUSD @ 1.28961 ( 0 / 0 )', 129, '2012-10-02 08:59:44'),
(1416, 12392781, 'Sell 0.1 Lots of GBPUSD @ 1.61457 ( 0 / 0 )', 0, '2012-10-02 12:07:34'),
(1417, 50, 'Buy 0.1 Lots of EURUSD @ 1.2920 ( 0 / 0 )', 0, '2012-10-02 19:18:07'),
(1418, 50, 'Buy 0.1 Lots of EURUSD @ 1.2921 ( 0 / 0 )', 0, '2012-10-02 19:18:28'),
(1419, 50, 'Buy 0.1 Lots of EURUSD@ @ 1.2923 ( 0 / 0 )', 0, '2012-10-02 19:19:40'),
(1420, 50, 'Sell 0.1 Lots of EURUSD @ 1.2923 ( 0 / 0 )', 0, '2012-10-02 19:19:58'),
(1421, 50, 'Buy 0.1 Lots of EURUSD @ 1.2921 ( 0 / 0 )', 0, '2012-10-02 19:22:57'),
(1422, 50, 'Buy 0.1 Lots of EURUSD @ 1.2923 ( 0 / 0 )', 0, '2012-10-02 19:29:31'),
(1423, 50, 'Buy 0.1 Lots of EURUSD @ 1.2923 ( 0 / 0 )', 0, '2012-10-02 19:29:47'),
(1424, 50, 'Buy 0.1 Lots of EURUSD @ 1.29198 ( 0 / 0 )', 0, '2012-10-02 19:30:06'),
(1425, 50, 'Buy 0.1 Lots of EURUSD @ 1.29205 ( 0 / 0 )', 0, '2012-10-02 19:30:26'),
(1426, 50, 'Buy 0.1 Lots of EURUSD @ 1.2921 ( 0 / 0 )', 0, '2012-10-02 19:30:42'),
(1427, 50, 'Buy 0.1 Lots of EURUSD @ 1.2920 ( 0 / 0 )', 0, '2012-10-02 19:33:46'),
(1428, 50, 'Buy 0.1 Lots of EURUSD@ @ 1.2920 ( 0 / 0 )', 0, '2012-10-02 19:33:59'),
(1429, 50, 'Buy 0.1 Lots of EURUSD @ 1.2920 ( 0 / 0 )', 0, '2012-10-02 19:34:11'),
(1430, 50, 'Buy 0.1 Lots of EURUSD @ 1.2919 ( 0 / 0 )', 0, '2012-10-02 19:34:35'),
(1431, 50, 'Buy 0.1 Lots of EURUSD @ 1.2919 ( 0 / 0 )', 0, '2012-10-02 19:34:55'),
(1432, 50, 'Buy 0.1 Lots of EURUSD @ 1.2921 ( 0 / 0 )', 0, '2012-10-02 19:37:36'),
(1433, 50, 'Buy 0.1 Lots of EURUSD@ @ 1.2921 ( 0 / 0 )', 0, '2012-10-02 19:37:49'),
(1434, 50, 'Sell 0.1 Lots of EURUSD+ @ 1.2895 ( 0 / 0 )', 0, '2012-10-03 07:36:28'),
(1435, 50, 'Close All EURUSD', 0, '2012-10-03 07:36:58'),
(1436, 50, 'Close Order 1964063 Sell 0.1 of EURUSD+ @ 1.2897', 0, '2012-10-03 07:37:16'),
(1437, 50, 'Close Order 1964061 Buy 0.1 of EURUSD@ @ 1.2896', 0, '2012-10-03 07:37:22'),
(1438, 50, 'Close Order 1964056 Buy 0.1 of EURUSD@ @ 1.2896', 0, '2012-10-03 07:37:31'),
(1439, 50, 'Close Order 1964047 Buy 0.1 of EURUSD@ @ 1.2896', 0, '2012-10-03 07:37:43'),
(1440, 50, 'Buy 0.1 Lots of EURUSD+ @ 1.2898 ( 0 / 0 )', 0, '2012-10-03 07:38:13'),
(1441, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29270 ( 0 / 0 )', 0, '2012-10-03 10:11:14'),
(1442, 1003, 'Close Order 1964066 Buy 0.1 of EURUSD @ 1.29251', 0, '2012-10-03 10:11:40'),
(1443, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29218 ( 0 / 0 )', 0, '2012-10-03 10:21:43'),
(1444, 1003, 'Close Order 1964069 Buy 0.1 of EURUSD @ 1.29206', 0, '2012-10-03 10:22:15'),
(1445, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29242 ( 0 / 0 )', 0, '2012-10-03 10:22:38'),
(1446, 1003, 'Close All EURUSD', 0, '2012-10-03 10:22:45'),
(1447, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29239 ( 0 / 0 )', 0, '2012-10-03 10:23:06'),
(1448, 1003, 'Close Order 1964073 By 1964072', 0, '2012-10-03 10:23:20'),
(1449, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29238 ( 0 / 0 )', 0, '2012-10-03 10:25:37'),
(1450, 1003, 'Close All EURUSD', 0, '2012-10-03 10:25:43'),
(1451, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29238 ( 0 / 0 )', 0, '2012-10-03 10:26:07'),
(1452, 1003, 'Close All EURUSD', 0, '2012-10-03 10:26:12'),
(1453, 50, 'Sell 0.1 Lots of EURUSD @ 1.29033 ( 0 / 0 )', 0, '2012-10-03 12:06:11'),
(1454, 50, 'Sell 0.1 Lots of EURUSD @ 1.29022 ( 0 / 0 )', 0, '2012-10-03 12:07:48'),
(1455, 50, 'Sell 0.1 Lots of EURUSD @ 1.29019 ( 0 / 0 )', 0, '2012-10-03 12:08:29'),
(1456, 50, 'Sell 0.1 Lots of EURUSD @ 1.29052 ( 0 / 0 )', 0, '2012-10-03 12:09:15'),
(1457, 50, 'Sell 0.1 Lots of EURUSD @ 1.29028 ( 0 / 0 )', 0, '2012-10-03 12:10:57'),
(1458, 50, 'Sell 0.1 Lots of EURUSD @ 1.29023 ( 0 / 0 )', 0, '2012-10-03 12:11:20'),
(1459, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29018 ( 0 / 0 )', 0, '2012-10-03 12:12:49'),
(1460, 50, 'Sell 0.1 Lots of EURUSD @ 1.29104 ( 0 / 0 )', 0, '2012-10-03 12:19:19'),
(1461, 50, 'Sell 0.1 Lots of EURUSD @ 1.29045 ( 0 / 0 )', 0, '2012-10-03 12:21:08'),
(1462, 50, 'Buy 0.1 Lots of EURUSD @ 1.29078 ( 0 / 0 )', 0, '2012-10-03 12:21:21'),
(1463, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29124 ( 0 / 0 )', 0, '2012-10-03 12:29:44'),
(1464, 1003, 'Sell 0.1 Lots of EURUSD @ 1.29117 ( 0 / 0 )', 0, '2012-10-03 12:29:58'),
(1465, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29136 ( 0 / 0 )', 0, '2012-10-03 12:30:07'),
(1466, 1003, 'Sell 0.1 Lots of EURUSD @ 1.29122 ( 0 / 0 )', 0, '2012-10-03 12:30:15'),
(1467, 1003, 'Buy 0.1 Lots of EURUSD @ 1.29126 ( 0 / 0 )', 0, '2012-10-03 12:30:32'),
(1468, 50, 'Buy 0.1 Lots of EURUSD @ 1.29473 ( 0 / 0 )', 0, '2012-10-04 08:03:53'),
(1469, 50, 'Buy 0.1 Lots of EURUSD @ 1.29560 ( 0 / 0 )', 0, '2012-10-04 08:13:53'),
(1470, 50, 'Buy 0.1 Lots of EURUSD @ 1.29537 ( 0 / 0 )', 0, '2012-10-04 08:14:10'),
(1471, 50, 'Buy 0.1 Lots of EURUSD @ 1.29523 ( 0 / 0 )', 0, '2012-10-04 08:16:52'),
(1472, 50, 'Buy 0.1 Lots of EURUSD @ 1.29521 ( 0 / 0 )', 2, '2012-10-04 08:17:51'),
(1473, 50, 'Buy 0.1 Lots of EURUSD @ 1.29521 ( 0 / 0 )', 0, '2012-10-04 08:17:57'),
(1474, 50, 'Sell 0.1 Lots of EURUSD @ 1.29504 ( 0 / 0 )', 0, '2012-10-04 08:18:10'),
(1475, 50, 'Buy 0.1 Lots of USDIX @ 79.77 ( 0 / 0 )', 0, '2012-10-04 08:38:51'),
(1476, 50, 'Buy 0.1 Lots of ECDEC12 @ 1.2950 ( 0 / 0 )', 0, '2012-10-04 08:38:58'),
(1477, 50, 'Buy 0.1 Lots of EURUSD: @ 1.29421 ( 0 / 0 )', 0, '2012-10-04 08:39:09'),
(1478, 12392785, 'ÐšÑƒÐ¿Ð¸Ñ‚ÑŒ 0.1 Lots of GOLD @ 1788.28 ( 0 / 0 )', 0, '2012-10-04 10:34:24'),
(1479, 50, 'Buy 0.1 Lots of EURUSD: @ 1.2944 ( 0 / 0 )', 0, '2012-10-04 11:14:52'),
(1480, 50, 'Buy 0.1 Lots of EURUSD @ 1.30415 ( 0 / 0 )', 133, '2012-10-07 08:59:43'),
(1481, 100, 'Buy 0.1 Lots of EURUSD @ 1.3527 ( 0 / 0 )', 0, '2014-07-19 11:54:47'),
(1482, 100, 'Buy 0.1 Lots of EURUSD @ 1.3527 ( 0 / 0 )', 65, '2014-07-19 12:22:11'),
(1483, 100, 'Buy 0.1 Lots of EURUSD @ 1.3527 ( 0 / 0 )', 133, '2014-07-19 12:22:52'),
(1484, 100, 'Buy 0.1 Lots of EURUSD @ 1.3528 ( 0 / 0 )', 0, '2014-07-19 12:23:20'),
(1485, 100, 'Buy 0.1 Lots of GBPNZD @ 1.9365 ( 0 / 0 )', 0, '2015-02-08 12:34:14'),
(1486, 100, 'Buy 0.1 Lots of USDZAR @ 11.5344 ( 0 / 0 )', 0, '2015-03-18 00:11:58'),
(1487, 100, 'Buy 0.1 Lots of USDZAR @ 11.5344 ( 0 / 0 )', 133, '2015-03-18 00:48:27'),
(1488, 100, 'Buy 0.1 Lots of CHFJPY @ 124.21 ( 0 / 0 )', 129, '2015-03-18 00:48:31'),
(1489, 100, 'Buy 0.1 Lots of CHFJPY @ 124.21 ( 0 / 0 )', 129, '2015-03-18 00:48:33'),
(1490, 100, 'Buy 0.1 Lots of GBPCHF @ 1.48410 ( 0 / 0 )', 0, '2015-03-18 00:48:35'),
(1491, 100, 'Buy 0.1 Lots of USDCAD @ 1.2794 ( 0 / 0 )', 0, '2015-03-18 00:49:04'),
(1492, 100, 'Sell 0.1 Lots of USDCAD @ 1.2781 ( 0 / 0 )', 0, '2015-03-18 00:49:10'),
(1493, 100, 'Buy 0.1 Lots of EURCAD @ 1.3552 ( 0 / 0 )', 0, '2015-03-18 00:50:48'),
(1494, 100, 'Buy 0.1 Lots of NZDUSD @ 0.0000 ( 0 / 0 )', 129, '2015-03-18 00:50:52'),
(1495, 100, 'Buy 0.1 Lots of USDCAD @ 1.2789 ( 0 / 0 )', 0, '2015-03-18 00:50:56'),
(1496, 100, 'Close All USDCAD', 0, '2015-03-18 00:51:01'),
(1497, 100, 'Buy 0.1 Lots of USDZAR @ 11.5344 ( 0 / 0 )', 133, '2015-03-18 00:51:49'),
(1498, 100, 'Buy 0.1 Lots of USDZAR @ 11.5344 ( 0 / 0 )', 133, '2015-03-18 00:52:02'),
(1499, 100, 'Sell 0.1 Lots of USDZAR @ 11.5314 ( 0 / 0 )', 133, '2015-03-18 00:52:15'),
(1500, 100, 'Sell 0.1 Lots of EURAUD @ 1.3890 ( 0 / 0 )', 0, '2015-03-18 00:52:19'),
(1501, 100, 'Sell 0.1 Lots of EURCAD @ 1.3542 ( 0 / 0 )', 0, '2015-03-18 00:52:21'),
(1502, 100, 'Buy 0.1 Lots of EURCAD @ 1.3555 ( 0 / 0 )', 0, '2015-03-18 00:52:23'),
(1503, 100, 'Sell 0.1 Lots of USDCHF @ 1.00575 ( 0 / 0 )', 0, '2015-03-18 00:52:26'),
(1504, 100, 'Buy 0.1 Lots of USDCHF @ 1.00612 ( 0 / 0 )', 0, '2015-03-18 00:52:28'),
(1505, 100, 'Buy Limit 0.1 Lots of USDZAR @ 222 ( 0 / 0 )', 133, '2015-03-18 00:53:15'),
(1506, 100, 'Buy Limit 0.1 Lots of GBPCHF @ 222 ( 0 / 0 )', 130, '2015-03-18 00:53:19'),
(1507, 100, 'Buy Limit 0.1 Lots of GBPJPY @ 222 ( 0 / 0 )', 130, '2015-03-18 00:53:26'),
(1508, 100, 'Buy Limit 0.1 Lots of GBPCHF @ 2 ( 0 / 0 )', 130, '2015-03-18 00:53:30'),
(1509, 100, 'Buy Limit 0.1 Lots of GBPCHF @ 1 ( 0 / 0 )', 0, '2015-03-18 00:53:33'),
(1510, 100, 'Buy Limit 0.1 Lots of GBPCHF @ 1 ( 0 / 0 )', 0, '2015-03-18 00:53:35'),
(1511, 100, 'Buy Limit 0.1 Lots of GBPCHF @ 1 ( 0 / 0 )', 0, '2015-03-18 00:53:37'),
(1512, 100, 'Buy Limit 0.1 Lots of EURAUD @ 1 ( 0 / 0 )', 0, '2015-03-18 00:53:39'),
(1513, 100, 'Buy Limit 0.1 Lots of USDCHF @ 1 ( 0 / 0 )', 0, '2015-03-18 00:53:43'),
(1514, 100, 'Buy 0.1 Lots of USDZAR @ 11.5344 ( 0 / 0 )', 133, '2015-03-18 00:54:10'),
(1515, 100, 'Buy 0.1 Lots of AUDUSD @ 0.7623 ( 0 / 0 )', 0, '2015-03-18 00:54:21'),
(1516, 100, 'Buy 0.1 Lots of USDCHF @ 1.00615 ( 0 / 0 )', 0, '2015-03-18 00:54:32'),
(1517, 100, 'Buy 0.1 Lots of EURGBP @ 0.7187 ( 0 / 0 )', 0, '2015-03-18 00:54:14'),
(1518, 100, 'Buy 0.1 Lots of EURCHF @ 1.0659 ( 0 / 0 )', 0, '2015-03-18 00:57:05'),
(1519, 100, 'Buy 0.1 Lots of EURGBP @ 0.7187 ( 0 / 0 )', 129, '2015-03-18 00:57:10'),
(1520, 100, 'Buy 0.1 Lots of AUDUSD @ 0.7623 ( 0 / 0 )', 129, '2015-03-18 00:57:15'),
(1521, 100, 'Buy 0.1 Lots of NZDUSD @ 0.7311 ( 0 / 0 )', 129, '2015-03-18 00:57:20'),
(1522, 100, 'Buy 0.1 Lots of USDCHF @ 1.00615 ( 0 / 0 )', 0, '2015-03-18 00:57:25'),
(1523, 100, 'Sell 0.1 Lots of NZDUSD @ 0.7303 ( 0 / 0 )', 129, '2015-03-18 00:57:28'),
(1524, 100, 'Buy 0.1 Lots of NZDUSD @ 0.7316 ( 0 / 0 )', 129, '2015-03-18 00:57:30'),
(1525, 100, 'Buy 0.1 Lots of USDCAD @ 1.2798 ( 0 / 0 )', 0, '2015-03-18 00:57:33'),
(1526, 100, 'Buy 0.1 Lots of EURJPY @ 128.62 ( 0 / 0 )', 0, '2015-03-18 00:57:35'),
(1527, 100, 'Buy 0.1 Lots of NZDUSD @ 0.7311 ( 0 / 0 )', 129, '2015-03-18 00:57:42'),
(1528, 100, 'Buy 0.1 Lots of GBPUSD @ 1.47476 ( 0 / 0 )', 0, '2015-03-18 00:57:56'),
(1529, 100, 'Sell 0.1 Lots of USDCAD @ 1.2785 ( 0 / 0 )', 0, '2015-03-18 00:58:09'),
(1530, 100, 'Buy 0.1 Lots of USDCAD @ 1.2798 ( 0 / 0 )', 0, '2015-03-18 00:58:11'),
(1531, 100, 'Sell 0.1 Lots of EURJPY @ 128.47 ( 0 / 0 )', 0, '2015-03-18 00:58:15'),
(1532, 100, 'Sell 0.1 Lots of USDCAD @ 1.2783 ( 0 / 0 )', 0, '2015-03-18 00:58:25'),
(1533, 100, 'Buy 0.1 Lots of USDCAD @ 1.2796 ( 0 / 0 )', 0, '2015-03-18 00:58:28'),
(1534, 100, 'Sell 0.1 Lots of CHFJPY @ 120.59 ( 0 / 0 )', 0, '2015-03-18 00:58:38'),
(1535, 100, 'Sell 0.1 Lots of EURAUD @ 1.3898 ( 0 / 0 )', 129, '2015-03-18 00:58:45'),
(1536, 500, 'Buy 0.1 Lots of USDZAR @ 11.5344 ( 0 / 0 )', 133, '2015-03-18 01:01:17'),
(1537, 500, 'Sell 0.1 Lots of AUDUSD @ 0.7622 ( 0 / 0 )', 134, '2015-03-18 01:01:21'),
(1538, 500, 'Sell 0.1 Lots of USDCHF @ 1.00580 ( 0 / 0 )', 134, '2015-03-18 01:01:25'),
(1539, 100, 'Buy 0.1 Lots of AUDUSD.. @ 0.78897 ( 0 / 0 )', 133, '2015-04-02 13:13:13'),
(1540, 100, 'Buy 0.1 Lots of EURDKK @ 7.4438 ( 0 / 0 )', 133, '2015-04-02 13:13:22'),
(1541, 100, 'Buy 0.1 Lots of GBPUSD @ 1.49067 ( 0 / 0 )', 129, '2015-04-02 13:13:26'),
(1542, 100, 'Buy 0.1 Lots of GBPUSD @ 1.49067 ( 0 / 0 )', 129, '2015-04-02 13:13:28'),
(1543, 100, 'Buy 0.1 Lots of GBPUSD @ 1.49067 ( 0 / 0 )', 129, '2015-04-02 13:13:31'),
(1544, 100, 'Buy 0.1 Lots of GBPUSD @ 1.49067 ( 0 / 0 )', 129, '2015-04-02 13:13:47'),
(1545, 100, 'Buy 0.1 Lots of GBPUSD @ 1.49067 ( 0 / 0 )', 129, '2015-04-02 13:13:57'),
(1546, 100, 'Buy 0.1 Lots of AUDUSD.. @ 0.78897 ( 0 / 0 )', 133, '2015-04-02 13:17:48'),
(1547, 100, 'Buy 0.1 Lots of USDNOK @ 7.6098 ( 0 / 0 )', 133, '2015-04-02 13:17:53'),
(1548, 100, 'Buy 0.1 Lots of USDSEK @ 8.1419 ( 0 / 0 )', 133, '2015-04-02 13:17:55'),
(1549, 100, 'Buy 0.1 Lots of GBPUSD @ 1.48021 ( 0 / 0 )', 134, '2015-04-02 13:18:01'),
(1550, 100, 'Buy 0.1 Lots of USDCAD @ 1.2612 ( 0 / 0 )', 134, '2015-04-02 13:18:08'),
(1551, 100, 'Buy 0.1 Lots of USDCAD @ 1.2610 ( 0 / 0 )', 0, '2015-04-02 13:18:31'),
(1552, 100, 'Buy 0.1 Lots of USDCAD @ 1.2607 ( 0 / 0 )', 0, '2015-04-02 13:19:05'),
(1553, 100, 'Buy 0.1 Lots of USDCAD @ 1.2607 ( 0 / 0 )', 0, '2015-04-02 13:19:07'),
(1554, 100, 'Buy 0.1 Lots of USDCAD @ 1.2608 ( 0 / 0 )', 0, '2015-04-02 13:19:14'),
(1555, 100, 'Buy 0.1 Lots of USDCAD @ 1.2608 ( 0 / 0 )', 0, '2015-04-02 13:19:18'),
(1556, 100, 'Buy 0.1 Lots of USDCAD @ 1.2608 ( 0 / 0 )', 0, '2015-04-02 13:19:20'),
(1557, 100, 'Buy 0.1 Lots of USDCAD @ 1.2609 ( 0 / 0 )', 0, '2015-04-02 13:20:06'),
(1558, 100, 'Buy 0.1 Lots of USDCAD @ 1.2610 ( 0 / 0 )', 0, '2015-04-02 13:20:20'),
(1559, 100, 'Buy 0.1 Lots of USDCAD @ 1.2616 ( 0 / 0 )', 0, '2015-04-02 13:22:05'),
(1560, 100, 'Buy 0.1 Lots of USDCAD @ 1.2616 ( 0 / 0 )', 133, '2015-04-02 13:22:07'),
(1561, 100, 'Sell 0.1 Lots of USDCAD @ 1.2614 ( 0 / 0 )', 133, '2015-04-02 13:22:09'),
(1562, 100, 'Buy 0.1 Lots of USDCAD @ 1.2616 ( 0 / 0 )', 133, '2015-04-02 13:22:10'),
(1563, 100, 'Sell 0.1 Lots of AUDUSD @ 0.7566 ( 0 / 0 )', 0, '2015-04-02 13:22:13'),
(1564, 100, 'Sell 0.1 Lots of AUDUSD @ 0.7566 ( 0 / 0 )', 0, '2015-04-02 13:22:15'),
(1565, 100, 'Buy 0.1 Lots of AUDUSD @ 0.7568 ( 0 / 0 )', 0, '2015-04-02 13:22:17'),
(1566, 100, 'Buy 0.1 Lots of AUDUSD @ 0.7568 ( 0 / 0 )', 0, '2015-04-02 13:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `mt4_securities`
--

CREATE TABLE IF NOT EXISTS `mt4_securities` (
  `security` int(11) NOT NULL,
  `symbol` varchar(13) NOT NULL,
  `trade` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `chart` tinyint(1) NOT NULL,
  UNIQUE KEY `symbol` (`symbol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_securities`
--

INSERT INTO `mt4_securities` (`security`, `symbol`, `trade`, `active`, `chart`) VALUES
(3, 'FTSE', 2, 0, 0),
(3, 'DAX', 2, 0, 0),
(3, 'KSI', 2, 0, 0),
(1, 'DJI0910', 2, 0, 0),
(1, 'S&P0910', 2, 0, 0),
(1, 'NSDQ0910', 2, 0, 0),
(2, 'OIL010', 2, 0, 0),
(2, 'OIL0L', 0, 0, 0),
(2, 'OIL0J', 1, 0, 0),
(1, 'DJI0U', 0, 0, 0),
(1, 'S&P0U', 0, 0, 0),
(1, 'NSDQ0U', 0, 0, 0),
(2, 'OIL0Z', 0, 0, 0),
(3, 'CAD0M.', 2, 0, 0),
(3, 'CHF0M.', 2, 0, 0),
(3, 'JPY0M.', 2, 0, 0),
(3, 'AUD0M.', 2, 0, 0),
(3, 'GBP0M.', 2, 0, 0),
(3, 'EUR0M.', 2, 0, 0),
(0, 'AUDUSD..', 2, 0, 0),
(0, 'GBPUSDfum.', 2, 0, 0),
(0, 'GBPUSDfui.', 2, 0, 0),
(0, 'GBPUSDfup.', 2, 0, 0),
(0, 'USDSAR', 1, 0, 0),
(0, 'USDEGP', 1, 0, 0),
(0, 'USDAED', 1, 0, 0),
(2, 'MANAZEL', 2, 0, 0),
(2, 'DANA', 2, 0, 0),
(2, 'RAKPROP', 2, 0, 0),
(2, 'ESHRAQ', 2, 0, 0),
(2, 'ALDAR', 2, 0, 0),
(2, 'WAHA', 2, 0, 0),
(7, 'GOLD18', 2, 0, 0),
(7, 'GOLD21', 2, 0, 0),
(7, 'GOLD24', 2, 0, 0),
(0, 'GBPUSDfu.', 2, 0, 0),
(0, 'GBPUSDfum', 2, 0, 0),
(0, 'GBPUSDfui', 2, 0, 0),
(0, 'GBPUSDfup', 2, 0, 0),
(0, 'GBPUSDfu', 2, 0, 0),
(0, 'GBPUSDcfgm.', 2, 0, 0),
(0, 'GBPUSDcfgi.', 2, 0, 0),
(0, 'GBPUSDcfgp.', 2, 0, 0),
(0, 'GBPUSDcfg.', 2, 0, 0),
(0, 'GBPUSDcfgm', 2, 0, 0),
(0, 'GBPUSDcfgi', 2, 0, 0),
(0, 'GBPUSDcfgp', 2, 0, 0),
(0, 'GBPUSDcfg', 2, 0, 0),
(0, 'GBPUSDmr', 2, 0, 0),
(0, 'GBPUSDint', 2, 0, 0),
(0, 'GBPUSDsp', 2, 0, 0),
(0, 'GBPUSD', 2, 0, 0),
(0, 'USDZAR', 2, 0, 0),
(0, 'USDSEK', 2, 0, 0),
(0, 'USDNOK', 2, 0, 0),
(0, 'USDSGD', 2, 0, 0),
(0, 'USDHKD', 2, 0, 0),
(0, 'USDDKK', 2, 0, 0),
(0, 'EURSEK', 2, 0, 0),
(0, 'EURNOK', 2, 0, 0),
(0, 'EURDKK', 2, 0, 0),
(0, 'AUDCHF', 2, 0, 0),
(0, 'GBPNZD', 2, 0, 0),
(0, 'GOLD', 2, 0, 0),
(0, 'SILVER', 2, 0, 0),
(0, 'EURNZD', 2, 0, 0),
(0, 'AUDNZD', 2, 0, 0),
(0, 'AUDJPY', 2, 0, 0),
(0, 'AUDCAD', 2, 0, 0),
(0, 'CHFJPY', 2, 0, 0),
(0, 'CADJPY', 2, 0, 0),
(0, 'EURAUD', 2, 0, 0),
(0, 'EURCAD', 2, 0, 0),
(0, 'GBPAUD', 2, 0, 0),
(0, 'NZDJPY', 2, 0, 0),
(0, 'NZDUSD', 2, 0, 0),
(0, 'EURCHF', 2, 0, 0),
(0, 'EURGBP', 2, 0, 0),
(0, 'EURJPY', 2, 0, 0),
(0, 'GBPCAD', 2, 0, 0),
(0, 'GBPCHF', 2, 0, 0),
(0, 'GBPJPY', 2, 0, 0),
(0, 'USDCAD', 2, 0, 0),
(0, 'AUDUSD', 2, 0, 0),
(0, 'EURUSD', 2, 0, 0),
(0, 'USDCHF', 2, 0, 0),
(0, 'USDJPY', 2, 0, 0),
(0, 'SPT_Gold', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_signals`
--

CREATE TABLE IF NOT EXISTS `mt4_signals` (
  `id_signal` int(11) NOT NULL AUTO_INCREMENT,
  `login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_signal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mt4_signals`
--

INSERT INTO `mt4_signals` (`id_signal`, `login`, `username`, `email`, `password`) VALUES
(1, 1, '$result->Login', '$m_user->Email', '$result->Password'),
(4, 100, 'fadsa', 'dasdas', 'dasdas');

-- --------------------------------------------------------

--
-- Table structure for table `mt4_sub_accounts`
--

CREATE TABLE IF NOT EXISTS `mt4_sub_accounts` (
  `master` int(11) NOT NULL,
  `sub` text NOT NULL,
  PRIMARY KEY (`master`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_sub_accounts`
--

INSERT INTO `mt4_sub_accounts` (`master`, `sub`) VALUES
(100, '["101"]');

-- --------------------------------------------------------

--
-- Table structure for table `mt4_trades`
--

CREATE TABLE IF NOT EXISTS `mt4_trades` (
  `TICKET` int(11) NOT NULL,
  `LOGIN` int(11) NOT NULL,
  `SYMBOL` char(16) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `CMD` int(11) NOT NULL,
  `VOLUME` int(11) NOT NULL,
  `OPEN_TIME` datetime NOT NULL,
  `OPEN_PRICE` double NOT NULL,
  `SL` double NOT NULL,
  `TP` double NOT NULL,
  `CLOSE_TIME` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `CONV_RATE1` double NOT NULL,
  `CONV_RATE2` double NOT NULL,
  `COMMISSION` double NOT NULL,
  `COMMISSION_AGENT` double NOT NULL,
  `SWAPS` double NOT NULL,
  `CLOSE_PRICE` double NOT NULL,
  `PROFIT` double NOT NULL,
  `TAXES` double NOT NULL,
  `COMMENT` char(32) NOT NULL,
  `INTERNAL_ID` int(11) NOT NULL,
  `MARGIN_RATE` double NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  `REASON` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TICKET`),
  KEY `INDEX_LOGIN` (`LOGIN`),
  KEY `INDEX_CMD` (`CMD`),
  KEY `INDEX_OPENTIME` (`OPEN_TIME`),
  KEY `INDEX_CLOSETIME` (`CLOSE_TIME`),
  KEY `INDEX_STAMP` (`TIMESTAMP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_trades`
--

INSERT INTO `mt4_trades` (`TICKET`, `LOGIN`, `SYMBOL`, `DIGITS`, `CMD`, `VOLUME`, `OPEN_TIME`, `OPEN_PRICE`, `SL`, `TP`, `CLOSE_TIME`, `EXPIRATION`, `CONV_RATE1`, `CONV_RATE2`, `COMMISSION`, `COMMISSION_AGENT`, `SWAPS`, `CLOSE_PRICE`, `PROFIT`, `TAXES`, `COMMENT`, `INTERNAL_ID`, `MARGIN_RATE`, `TIMESTAMP`, `MODIFY_TIME`, `REASON`) VALUES
(6125864, 100, 'GBPUSD', 4, 1, 0, '2015-06-10 15:39:47', 1.5514, 0, 0, '2015-06-10 15:40:07', '1970-01-01 00:00:00', 1.3697691938908294, 1.3697691938908294, -0.07, 0, 0, 1.5514, 2.13, 0, 'close hedge by #6125865', 0, 0.8830606883458065, 1433950808, '2015-06-10 16:40:07', 2),
(6125868, 100, 'GBPUSD', 4, 0, 100, '2015-06-10 15:40:43', 1.5512, 0, 0, '2015-06-10 15:41:10', '1970-01-01 00:00:00', 1.3695815928233923, 1.3693940431359122, -0.07, 0, 0.01, 1.5512, 2.68, 0, 'partial close', 0, 0.8829398364795423, 1433950871, '2015-06-10 16:41:10', 2),
(6125870, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 15:41:51', 1.5512, 0, 0, '2015-06-10 15:42:03', '1970-01-01 00:00:00', 1.3695815928233923, 1.3697691938908294, -0.07, 0, 0, 1.5512, 2.2, 0, 'to #6125871', 0, 0.8829359385829759, 1433950924, '2015-06-10 16:42:04', 2),
(6125869, 100, 'GBPUSD', 4, 0, 100, '2015-06-10 15:41:46', 1.5512, 0, 0, '2015-06-10 15:42:14', '1970-01-01 00:00:00', 1.3695815928233923, 1.3697691938908294, -0.07, 0, 0, 1.5512, 0.2, 0, 'to #6125872', 0, 0.8829359385829761, 1433950935, '2015-06-10 16:42:14', 2),
(6125861, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 15:39:18', 1.5515, 0, 0, '2015-06-10 15:39:29', '1970-01-01 00:00:00', 1.3697691938908294, 1.3697691938908294, -0.07, 0, 0, 1.5515, 1.1, 0, '', 0, 0.8828969615101069, 1433950770, '2015-06-10 16:39:29', 2),
(6125862, 100, 'GBPUSD', 4, 0, 0, '2015-06-10 15:39:24', 1.5515, 0, 0, '2015-06-10 15:39:30', '1970-01-01 00:00:00', 1.3697691938908294, 1.3697691938908294, -0.07, 0, 0, 1.5515, 0.02, 0, 'close hedge by #6125861', 0, 0.8828969615101069, 1433950770, '2015-06-10 16:39:29', 2),
(6125863, 100, 'GBPUSD', 4, 0, 100, '2015-06-10 15:39:40', 1.5515, 0, 0, '2015-06-10 15:39:58', '1970-01-01 00:00:00', 1.3697691938908294, 1.3697691938908294, -0.07, 0, 0, 1.5512, 0.73, 0, 'to #6125865', 0, 0.8829671227191856, 1433950799, '2015-06-10 16:39:58', 2),
(6125865, 100, 'GBPUSD', 4, 0, 100, '2015-06-10 15:39:40', 1.5515, 0, 0, '2015-06-10 15:40:07', '1970-01-01 00:00:00', 1.3697691938908294, 1.3697691938908294, -0.07, 0, 0, 1.5514, 0.28, 0, 'from #6125863', 0, 0.8831074785956824, 1433950808, '2015-06-10 16:40:07', 2),
(6125866, 100, 'GBPUSD', 4, 0, 100, '2015-06-10 15:40:43', 1.5512, 0, 0, '2015-06-10 15:40:55', '1970-01-01 00:00:00', 1.3695815928233923, 1.3695815928233923, -0.07, 0, 0, 1.5512, 2.43, 0, 'partial close', 0, 0.8829437344105246, 1433950856, '2015-06-10 16:40:56', 2),
(6125867, 100, 'GBPUSD', 4, 1, 0, '2015-06-10 15:40:47', 1.5512, 0, 0, '2015-06-10 15:40:55', '1970-01-01 00:00:00', 1.3695815928233923, 0, -0.07, 0, 0, 1.5512, -2.35, 0, 'close hedge by #6125866', 0, 0.8828852690592858, 1433950856, '2015-06-10 16:40:56', 2),
(6125871, 100, 'GBPUSD', 4, 1, 0, '2015-06-10 15:41:51', 1.5512, 0, 0, '2015-06-10 15:42:22', '1970-01-01 00:00:00', 1.3697691938908294, 1.3697691938908294, -0.07, 0, 0, 1.5512, 0.61, 0, 'close hedge by #6125872', 0, 0.8830333963230489, 1433950943, '2015-06-10 16:42:22', 2),
(6125872, 100, 'GBPUSD', 4, 0, 100, '2015-06-10 15:41:46', 1.5512, 0, 0, '2015-06-10 15:42:22', '1970-01-01 00:00:00', 1.3697691938908294, 1.3697691938908294, -0.07, 0, 0, 1.5512, 1.07, 0, 'from #6125869', 0, 0.8830879820556522, 1433950943, '2015-06-10 16:42:22', 2),
(6125874, 100, 'GBPUSD', 4, 0, 0, '2015-06-10 16:07:27', 1.5538, 0, 0, '2015-06-10 16:07:31', '1970-01-01 00:00:00', 1.3716480351141898, 1.3716480351141898, -0.07, 0, 0, 1.5538, 1.69, 0, 'close hedge by #6125873', 0, 0.8828540907044293, 1433952452, '2015-06-10 17:07:33', 2),
(6125873, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:07:22', 1.5538, 0, 0, '2015-06-10 16:07:31', '1970-01-01 00:00:00', 1.3716480351141898, 1.3716480351141898, -0.07, 0, 0, 1.5538, 1.05, 0, '', 0, 0.8828735769181532, 1433952452, '2015-06-10 17:07:33', 2),
(6125875, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:07:41', 1.5537, 0, 0, '2015-06-10 16:07:51', '1970-01-01 00:00:00', 1.3714599190838648, 1.3716480351141898, -0.07, 0, 0, 1.5539, 0.27, 0, 'partial close', 0, 0.8827839474566995, 1433952472, '2015-06-10 17:07:51', 2),
(6125876, 100, 'GBPUSD', 4, 0, 0, '2015-06-10 16:07:47', 1.5539, 0, 0, '2015-06-10 16:07:51', '1970-01-01 00:00:00', 1.3714599190838648, 0, -0.07, 0, 0, 1.5539, 0.69, 0, 'close hedge by #6125875', 0, 0.882616428139577, 1433952472, '2015-06-10 17:07:51', 2),
(6125877, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:07:41', 1.5537, 0, 0, '2015-06-10 16:08:02', '1970-01-01 00:00:00', 1.3716480351141898, 1.3716480351141898, -0.07, 0, 0, 1.5536, 2.1, 0, 'partial close', 0, 0.882780050936409, 1433952483, '2015-06-10 17:08:02', 2),
(6125878, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:08:23', 1.5529, 0, 0, '2015-06-10 16:08:40', '1970-01-01 00:00:00', 1.3720244220347122, 1.3722126929674099, -0.07, 0, 0, 1.553, 0.82, 0, '', 0, 0.8835717504439948, 1433952521, '2015-06-10 17:08:40', 2),
(6125879, 100, 'GBPUSD', 4, 0, 100, '2015-06-10 16:08:29', 1.553, 0, 0, '2015-06-10 16:08:36', '1970-01-01 00:00:00', 1.3720244220347122, 1.3720244220347122, -0.07, 0, 0, 1.5531, 2.52, 0, 'to #6125880', 0, 0.8835249109848653, 1433952517, '2015-06-10 17:08:36', 2),
(6125880, 100, 'GBPUSD', 4, 0, 0, '2015-06-10 16:08:29', 1.553, 0, 0, '2015-06-10 16:08:40', '1970-01-01 00:00:00', 1.3720244220347122, 1.3722126929674099, -0.07, 0, 0, 1.553, 0.65, 0, 'close hedge by #6125878', 0, 0.8835053960092063, 1433952521, '2015-06-10 17:08:40', 2),
(6125883, 100, 'GBPUSD', 4, 0, 0, '2015-06-10 16:09:01', 1.5525, 0, 0, '2015-06-10 16:09:23', '1970-01-01 00:00:00', 1.3727778159104949, 1.3725893898840162, -0.07, 0, 0, 1.5525, 2.8, 0, 'close hedge by #6125884', 0, 0.8842514811212309, 1433952564, '2015-06-10 17:09:24', 2),
(6125881, 100, 'GBPUSD', 4, 1, 50, '2015-06-10 16:08:55', 1.5525, 0, 0, '2015-06-10 16:09:13', '1970-01-01 00:00:00', 1.3727778159104949, 1.3725893898840162, -0.07, 0, 0, 1.5525, 1.11, 0, 'to #6125884', 0, 0.8842084786751019, 1433952554, '2015-06-10 17:09:13', 2),
(6125882, 100, 'GBPUSD', 4, 0, 50, '2015-06-10 16:09:01', 1.5525, 0, 0, '2015-06-10 16:09:07', '1970-01-01 00:00:00', 1.3724010155767514, 1.3727778159104949, -0.07, 0, 0, 1.5523, 0.29, 0, 'to #6125883', 0, 0.8840951286358413, 1433952548, '2015-06-10 17:09:07', 2),
(6125884, 100, 'GBPUSD', 4, 1, 50, '2015-06-10 16:08:55', 1.5525, 0, 0, '2015-06-10 16:09:23', '1970-01-01 00:00:00', 1.3725893898840162, 1.3725893898840162, -0.07, 0, 0, 1.5525, -2.44, 0, 'from #6125881', 0, 0.8842632097870251, 1433952564, '2015-06-10 17:09:24', 2),
(6125887, 100, 'GBPUSD', 4, 1, 100, '2015-06-11 10:26:51', 1.5446, 0, 0, '2015-06-10 16:08:02', '1970-01-01 00:00:00', 1.3722126929674099, 0, -0.07, 0, 0, 1.5447, 1.93, 0, '', 0, 0.8830723854434347, 1434024597, '2015-06-11 13:09:57', 2),
(6125885, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:14', '1970-01-01 00:00:00', 1.373532037634778, 1.3733434045182997, -0.07, 0, 0, 1.5521, 1.82, 0, 'to #6125886', 0, 0.8850419067342838, 1433952615, '2015-06-10 17:10:14', 2),
(6125886, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.35, 0, 0, 1.5519, 7.5, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125888, 100, 'GOLD', 2, 0, 1, '2015-06-11 11:52:50', 1180.4, 0, 0, '2015-06-10 16:08:02', '1970-01-01 00:00:00', 0, 0, -0.07, 0, 0, 1180.3, 0.91, 0, 'From Web', 0, 0.8830723854434347, 1434023570, '2015-06-11 14:43:07', 0),
(6125891, 100, 'GOLD', 2, 0, 1, '2015-06-11 12:08:16', 1180.2, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, 0, -0.07, 0, 0, 1180.3, 2.5, 0, 'From Web', 0, 0.8830723854434347, 1434024496, '2015-06-11 14:43:07', 0),
(6125889, 100, 'GOLD', 2, 0, 1, '2015-06-11 11:53:06', 1180.4, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, 0, -0.07, 0, 0, 1180.3, 1.23, 0, 'From Web', 0, 0.8830723854434347, 1434023586, '2015-06-11 14:43:07', 0),
(6125890, 100, 'GOLD', 2, 0, 1, '2015-06-11 11:53:31', 1180.3, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, 0, -0.07, 0, 0, 1180.3, 2.06, 0, 'From Web', 0, 0.8830723854434347, 1434023611, '2015-06-11 14:43:07', 0),
(6125827, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, -0.87, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125826, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, -5.72, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125825, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, -5.8, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125824, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, -0.02, 1.5519, 2.1, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125823, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 1.4, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125822, 100, 'GBPUSD', 4, 6, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, 0, 0, 0, 1.5519, 350, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125821, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.35, 0, 0, 1.5519, 4.3, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125820, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.35, 0, 0, 1.5519, 8.6, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125819, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.35, 0, 0, 1.5519, 1.45, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125818, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, -0.84, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125817, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 0.65, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125816, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 1.7, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125815, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, -3.47, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125814, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 1.58, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125813, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 1.5, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125812, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 3.98, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125811, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 2.67, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125810, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 2.5, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125809, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 4.11, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6125808, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:08', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 0.11, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2),
(6456456, 100, 'GOLD', 2, 6, 1, '2015-06-11 12:08:16', 1180.2, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, 0, -0.07, 0, 0, 1180.3, 100, 0, 'From Web', 0, 0.8830723854434347, 1434024496, '2015-06-11 14:43:07', 0),
(6155511, 100, 'GBPUSD', 4, 1, 100, '2015-06-10 16:10:07', 1.552, 0, 0, '2015-06-10 16:10:23', '1970-01-01 00:00:00', 1.3733434045182997, 1.3733434045182997, -0.07, 0, 0, 1.5519, 0.63, 0, 'from #6125885', 0, 0.8849988273765538, 1433952624, '2015-06-10 17:10:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_transfer`
--

CREATE TABLE IF NOT EXISTS `mt4_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `amount` double NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `mt4_transfer`
--

INSERT INTO `mt4_transfer` (`id`, `from`, `to`, `amount`, `create_date`, `status`) VALUES
(1, 1000, 1001, 100, '2011-08-18', 2),
(2, 1000, 1002, 100, '2011-08-19', 2),
(3, 1000, 1001, 250, '2011-08-25', 2),
(4, 1000, 1001, 250, '2011-08-25', 2),
(5, 1000, 1001, 10, '2011-11-08', 2),
(6, 1000, 1001, 10000, '2011-11-25', 2),
(7, 1000, 1002, 10000, '2011-11-25', 2),
(8, 1000, 1001, 1000, '2012-02-04', 2),
(9, 1000, 1001, 1, '2012-03-18', 2),
(10, 1000, 1002, 5, '2012-03-20', 2),
(11, 1000, 1002, 500, '2012-03-20', 2),
(12, 1000, 1003, 50, '2012-03-20', 2),
(13, 1000, 1001, 1, '2012-03-26', 2),
(14, 1000, 1001, 1, '2012-04-25', 2),
(15, 1000, 1002, 1, '2012-04-25', 2),
(16, 1000, 1001, 1000, '2012-08-07', 0),
(17, 1000, 1001, 10, '2012-08-09', 0),
(18, 1000, 1002, 500, '2012-08-15', 0),
(19, 1000, 1002, 500, '2012-08-15', 127),
(20, 1000, 1001, 100, '2012-09-19', 0),
(21, 1000, 1001, 100, '2012-09-19', 0),
(22, 1000, 1001, 12, '2012-09-22', 0),
(23, 1000, 1001, 1, '2012-10-02', 0),
(24, 1000, 1001, 30, '2012-10-02', 0),
(25, 1000, 1002, 500, '2012-10-03', 0),
(26, 100, 101, 34324, '2014-12-20', 127),
(27, 100, 101, 1.35, '2014-12-20', 0),
(28, 100, 101, 2, '2015-01-12', 3),
(29, 100, 101, 1, '2015-01-12', 0),
(30, 100, 101, 100, '2015-01-12', 0),
(31, 100, 101, 100, '2015-01-12', 0),
(32, 100, 101, 100, '2015-01-12', 0),
(33, 100, 101, 100, '2015-01-12', 0),
(34, 100, 101, 1, '2015-01-13', 0),
(35, 100, 101, 1, '2015-01-13', 0),
(36, 100, 101, 1, '2015-01-13', 0),
(37, 100, 101, 1, '2015-01-13', 0),
(38, 100, 101, 1, '2015-01-13', 0),
(39, 100, 101, 1, '2015-01-13', 0),
(40, 100, 101, 1, '2015-01-13', 0),
(41, 100, 101, 1, '2015-01-13', 0),
(42, 100, 101, 1, '2015-01-13', 0),
(43, 100, 101, 1, '2015-01-13', 0),
(44, 100, 101, 1, '2015-01-13', 0),
(45, 100, 101, 1, '2015-01-13', 0),
(46, 100, 101, 1, '2015-01-13', 0),
(47, 100, 101, 1, '2015-01-13', 127),
(48, 100, 101, 1, '2015-01-13', 127),
(49, 100, 101, 1, '2015-01-13', 0),
(50, 100, 101, 1, '2015-01-13', 127);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_users`
--

CREATE TABLE IF NOT EXISTS `mt4_users` (
  `LOGIN` int(11) NOT NULL,
  `GROUP` char(16) NOT NULL,
  `ENABLE` int(11) NOT NULL,
  `ENABLE_CHANGE_PASS` int(11) NOT NULL,
  `ENABLE_READONLY` int(11) NOT NULL,
  `PASSWORD_PHONE` char(32) NOT NULL,
  `NAME` char(128) NOT NULL,
  `COUNTRY` char(32) NOT NULL,
  `CITY` char(32) NOT NULL,
  `STATE` char(32) NOT NULL,
  `ZIPCODE` char(16) NOT NULL,
  `ADDRESS` char(128) NOT NULL,
  `PHONE` char(32) NOT NULL,
  `EMAIL` char(48) NOT NULL,
  `COMMENT` char(64) NOT NULL,
  `ID` char(32) NOT NULL,
  `STATUS` char(16) NOT NULL,
  `REGDATE` datetime NOT NULL,
  `LASTDATE` datetime NOT NULL,
  `LEVERAGE` int(11) NOT NULL,
  `AGENT_ACCOUNT` int(11) NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `BALANCE` double NOT NULL,
  `PREVMONTHBALANCE` double NOT NULL,
  `PREVBALANCE` double NOT NULL,
  `CREDIT` double NOT NULL,
  `INTERESTRATE` double NOT NULL,
  `TAXES` double NOT NULL,
  `SEND_REPORTS` int(11) NOT NULL,
  `USER_COLOR` int(11) NOT NULL,
  `EQUITY` float NOT NULL DEFAULT '0',
  `MARGIN` float NOT NULL DEFAULT '0',
  `MARGIN_LEVEL` float NOT NULL DEFAULT '0',
  `MARGIN_FREE` float NOT NULL DEFAULT '0',
  `MODIFY_TIME` datetime NOT NULL,
  `API_DATA` blob,
  `MQID` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`LOGIN`),
  KEY `INDEX_STAMP` (`TIMESTAMP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt4_users`
--

INSERT INTO `mt4_users` (`LOGIN`, `GROUP`, `ENABLE`, `ENABLE_CHANGE_PASS`, `ENABLE_READONLY`, `PASSWORD_PHONE`, `NAME`, `COUNTRY`, `CITY`, `STATE`, `ZIPCODE`, `ADDRESS`, `PHONE`, `EMAIL`, `COMMENT`, `ID`, `STATUS`, `REGDATE`, `LASTDATE`, `LEVERAGE`, `AGENT_ACCOUNT`, `TIMESTAMP`, `BALANCE`, `PREVMONTHBALANCE`, `PREVBALANCE`, `CREDIT`, `INTERESTRATE`, `TAXES`, `SEND_REPORTS`, `USER_COLOR`, `EQUITY`, `MARGIN`, `MARGIN_LEVEL`, `MARGIN_FREE`, `MODIFY_TIME`, `API_DATA`, `MQID`) VALUES
(1, 'manager', 1, 1, 0, '', 'First Admin', '', '', '', '', '', '', '', 'automaticaly generated on startup', '', '', '2015-01-27 16:37:02', '2015-06-11 10:34:08', 0, 0, 1429627119, 921.6, 921.6, 921.6, 0, 0, 0, 0, -16777216, 921.6, 0, 0, 921.6, '2015-06-11 11:34:10', 0x00000000000000000000000000000000, 0),
(100, 'Real', 1, 1, 0, '', 'Test', 'United States', 'asdsaa', '', '', '', '', '', '', '', '', '2015-01-27 16:37:21', '2015-04-28 15:43:02', 100, 0, 1429627119, 2854, 2854, 2854, 100, 0, 0, 1, -16777216, 2954, 0, 0, 2954, '2015-06-09 16:07:25', 0x00000000000000000000000000000000, 2303789568),
(510, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(509, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(507, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(506, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:10', 0x00000000000000000000000000000000, 0),
(504, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:10', 0x00000000000000000000000000000000, 0),
(502, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1429029016, 1463.66, 1463.66, 1463.66, 1000, 0, 0, 0, 0, 2463.66, 0, 0, 2463.66, '2015-06-11 11:34:10', 0x00000000000000000000000000000000, 0),
(503, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1429029371, 1458.5, 1458.5, 1458.5, 1000, 0, 0, 0, 0, 2458.5, 0, 0, 2458.5, '2015-06-09 16:07:26', 0x00000000000000000000000000000000, 0),
(500, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:02', '2015-04-07 18:21:02', 100, 0, 1432153938, -3774.81, -3774.81, -3774.81, 1000, 0, 0, 0, 0, -2774.81, 0, 0, -2774.81, '2015-06-11 11:34:10', 0x00000000000000000000000000000000, 0),
(508, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(505, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:10', 0x00000000000000000000000000000000, 0),
(2, 'manager', 1, 1, 0, '', 'Manager2', 'United States', '', '', '', '', '', '', '', '', 'RE', '2015-04-01 12:19:51', '2015-04-01 12:20:25', 100, 0, 1427890825, 0, 0, 0, 0, 0, 0, 1, -16777216, 0, 0, 0, 0, '2015-04-13 16:25:32', 0x00000000000000000000000000000000, 0),
(10, 'Real', 1, 1, 0, '', 'Master', 'United States', '', '', '', '', '', '', '', '', '', '2015-04-01 11:44:29', '2015-06-11 09:58:11', 100, 0, 1434016665, 2005368.14, 2005368.14, 2005368.14, 0, 0, 0, 1, -16777216, 2005370, 0, 0, 2005370, '2015-06-11 11:34:10', 0x00000000000000000000000000000000, 2303789568),
(592, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:12', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(511, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(512, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(513, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:03', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(514, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:03', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(515, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(516, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(517, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(518, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(519, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(520, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(521, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(522, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(523, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(524, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(525, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(526, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:04', '2015-04-07 18:21:04', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(527, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(528, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(529, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(530, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(531, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:11', 0x00000000000000000000000000000000, 0),
(532, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(533, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(534, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(535, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(536, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(537, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:05', '2015-04-07 18:21:05', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(538, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(539, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(540, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(541, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(542, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(543, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(544, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(545, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(546, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(547, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(548, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(549, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:06', '2015-04-07 18:21:06', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(550, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(551, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(552, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(553, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(554, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(555, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:12', 0x00000000000000000000000000000000, 0),
(556, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(557, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:07', '2015-04-07 18:21:07', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(558, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:08', '2015-04-07 18:21:08', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(559, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:08', '2015-04-07 18:21:08', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(560, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:08', '2015-04-07 18:21:08', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(561, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:08', '2015-04-07 18:21:08', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(562, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:08', '2015-04-07 18:21:08', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(563, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:08', '2015-04-07 18:21:08', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(564, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:08', '2015-04-07 18:21:08', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(565, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:09', '2015-04-07 18:21:09', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(566, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:09', '2015-04-07 18:21:09', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(567, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:09', '2015-04-07 18:21:09', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(568, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:09', '2015-04-07 18:21:09', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(569, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:09', '2015-04-07 18:21:09', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(570, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:09', '2015-04-07 18:21:09', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(571, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:09', '2015-04-07 18:21:09', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(572, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(573, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(574, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(575, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(576, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(577, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(578, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(579, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:10', '2015-04-07 18:21:10', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:13', 0x00000000000000000000000000000000, 0),
(580, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:11', '2015-04-07 18:21:11', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(581, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:11', '2015-04-07 18:21:11', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(582, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:11', '2015-04-07 18:21:11', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(583, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:11', '2015-04-07 18:21:11', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(584, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:11', '2015-04-07 18:21:11', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(585, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:11', '2015-04-07 18:21:11', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(586, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:12', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(587, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:12', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(588, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:12', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(589, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:12', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(590, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:12', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(591, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:12', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(2102094474, 'manager', 0, 0, 0, '', 'Lost & found (for lost commissions)', '', '', '', '', '', '', '', 'must be always disabled, but do not delete!', '', '', '2015-01-27 16:37:02', '2015-01-27 16:37:02', 0, 0, 1428430295, 17314.11, 17314.11, 17314.11, 0, 0, 0, 0, 0, 17314.1, 0, 0, 17314.1, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(598, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:13', '2015-04-07 18:21:13', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(599, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:13', '2015-04-07 18:21:13', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(200, 'testEUR', 1, 1, 0, '', 'TestEUR', 'United States', '', '', '', '', '', '', '', '', '', '2015-01-31 16:51:27', '2015-05-31 15:23:54', 100, 0, 1433952623, 126451.53, 91531.96, 126880.94, 0, 0, 0, 1, -16777216, 126336, 918.395, 13756.1, 125417, '2015-06-11 14:43:37', 0x00000000000000000000000000000000, 2303789568),
(2102094489, 'demoforex', 1, 1, 0, '', 'Tawfeeq Salha', '', '', '', '', '', '', 'galya@appits.net', '', '', '', '2015-05-31 16:00:39', '2015-05-31 16:00:39', 100, 0, 1433088039, 0, 0, 0, 0, 0, 0, 0, -16777216, 0, 0, 0, 0, '2015-06-01 01:23:04', 0x00000000000000000000000000000000, 0),
(593, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:12', '2015-04-07 18:21:13', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(594, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:13', '2015-04-07 18:21:13', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(595, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:13', '2015-04-07 18:21:13', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(596, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:13', '2015-04-07 18:21:13', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0),
(597, 'test', 1, 0, 0, '2341', 'TEsT Account', '', '', '', '', '', '', '', '', '', '', '2015-04-07 18:21:13', '2015-04-07 18:21:13', 100, 0, 1430826550, -4133.17, -4133.17, -4133.17, 1000, 0, 0, 0, 0, -3133.17, 0, 0, -3133.17, '2015-06-11 11:34:14', 0x00000000000000000000000000000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mt4_users_users`
--

CREATE TABLE IF NOT EXISTS `mt4_users_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `mt4_users_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mt4_users_users`
--

INSERT INTO `mt4_users_users` (`id`, `users_id`, `mt4_users_id`, `created_at`, `updated_at`) VALUES
(1, 314, 100, '2016-01-11 07:35:37', '2016-01-11 07:35:37'),
(2, 314, 200, '2016-01-11 07:35:37', '2016-01-11 07:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=268 ;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(34, 51, 'vhsDTrOw8fCgRahMXIoaAG3W8agv5nDa', '2015-11-08 10:12:09', '2015-11-08 10:12:09'),
(40, 68, 'Dw2l6Fb42G2OWHvDKOywqpqWVZ4ePu3m', '2015-11-11 10:13:32', '2015-11-11 10:13:32'),
(42, 75, 'ysvG2iJK1lIapBBv7ZUdeRneiPrN4qUo', '2015-11-11 10:56:16', '2015-11-11 10:56:16'),
(44, 76, 'ExCqU8Z7lfMch3w3k3EMxJBUjzbwcSps', '2015-11-11 11:22:31', '2015-11-11 11:22:31'),
(45, 77, 'ZgIEs8wSY2O79RyULGZuHC66vB0vDRqk', '2015-11-11 11:25:49', '2015-11-11 11:25:49'),
(46, 78, 'urivlKEA2bsrjgbgU3mSFJHwXyK3uyW4', '2015-11-11 11:26:43', '2015-11-11 11:26:43'),
(47, 79, '1fCLxpdGkvTxxjvPMUiReqbikINLKTPS', '2015-11-11 11:27:53', '2015-11-11 11:27:53'),
(48, 80, 'jgOBBo9vadR6pOO3quTSqT3I712zR3yy', '2015-11-11 11:28:35', '2015-11-11 11:28:35'),
(49, 81, 'egscmFq76ZcEyo7MMZJgoT4kWkHOt8Gx', '2015-11-11 11:29:34', '2015-11-11 11:29:34'),
(50, 82, 'okZSjTj6wDSJ2VLD2IKytGQ4bZK1UC5F', '2015-11-11 11:30:17', '2015-11-11 11:30:17'),
(51, 83, 'mog1LVc5BQTabJck3WPoAeB8k9tej6ys', '2015-11-11 11:30:45', '2015-11-11 11:30:45'),
(52, 84, '4PXH77800En6O8Xj4fB7k4ODVbx7jZTc', '2015-11-11 11:31:55', '2015-11-11 11:31:55'),
(53, 85, 'OPaHehzddB7ZueyjxL2D6YEsormgqfGH', '2015-11-11 11:35:14', '2015-11-11 11:35:14'),
(54, 86, 'X4n3iWHM8P5r0kHaXfRBUGYoVWlzEBEh', '2015-11-11 11:36:58', '2015-11-11 11:36:58'),
(55, 87, 'Xv3Imq0YBl4lnBAAMThd1C7pDfb2YmTI', '2015-11-11 11:43:11', '2015-11-11 11:43:11'),
(56, 88, 'rRTYrXxKcirAmJ9UzjMghLk5wnzx1vbd', '2015-11-11 11:43:41', '2015-11-11 11:43:41'),
(57, 89, 'wlvT2dCJbKSAc5ZPT6yoI8vF0yCzBsHK', '2015-11-11 11:44:03', '2015-11-11 11:44:03'),
(58, 90, 'jjsi7bViD6EE8UGPI97nTJzk955WpoOe', '2015-11-11 11:45:59', '2015-11-11 11:45:59'),
(59, 91, 'xtkmyOME8jniTfeSij1Pn4sDiZfvnF18', '2015-11-11 11:46:15', '2015-11-11 11:46:15'),
(60, 92, 'WGVwUl5fP57n0ayQppJDsyzoD1hyYxJN', '2015-11-11 11:46:45', '2015-11-11 11:46:45'),
(61, 93, '5eUMiHsHbOGvvqL2ofPj8OPgKFqLk6yW', '2015-11-11 12:04:26', '2015-11-11 12:04:26'),
(62, 94, '4mmPEQZa90Yu1YNNpCZdndkTtybuEe57', '2015-11-11 12:06:56', '2015-11-11 12:06:56'),
(63, 95, '1n6fLLIbQE4mIFAwghxZdA0l18hKpJj6', '2015-11-11 12:07:44', '2015-11-11 12:07:44'),
(69, 162, 'b97TZNz83qOGNFKclpxePM30PF9OmGeq', '2015-11-12 12:31:28', '2015-11-12 12:31:28'),
(70, 163, 'ljBlvwBONhIG1nafmFLICmfzTyHdXWy1', '2015-11-12 12:34:36', '2015-11-12 12:34:36'),
(88, 232, 'niRpenuLhP8TIdmbCd81q7dGs7kRW0sI', '2015-11-17 13:29:01', '2015-11-17 13:29:01'),
(90, 234, 'DREx3GjZTzqv42AI8zthJYDtJ6Z3uTdl', '2015-11-18 06:55:41', '2015-11-18 06:55:41'),
(102, 164, 'TPnJDKurt8HAKqNyseuAgZZe8ZsXQPHz', '2015-11-24 06:27:35', '2015-11-24 06:27:35'),
(103, 164, 'eNNFBzdl39Oeno2PSDvehi7ee1wtdcL3', '2015-11-24 06:27:35', '2015-11-24 06:27:35'),
(104, 164, 'Er9Ds73fhtVVQYtT9g63NEvL88LTjBR9', '2015-11-24 11:26:20', '2015-11-24 11:26:20'),
(105, 164, 'WwG0lHon5YwX0ZDwOXCi3rtBF0QbwErl', '2015-11-24 11:26:20', '2015-11-24 11:26:20'),
(106, 164, 'KupAz7BWNjbOLEqsQi7di2IfJj2dUGPF', '2015-11-25 06:35:00', '2015-11-25 06:35:00'),
(107, 164, 'NfWoXn9OGmnKPOjYOx2ugHS7XTKNspZ6', '2015-11-25 06:35:00', '2015-11-25 06:35:00'),
(108, 164, '126bYJ5I22BWU4z0Ke3SUh0yy7p2A3IP', '2015-11-25 12:26:27', '2015-11-25 12:26:27'),
(109, 164, '2mQfHCwhUjhLMVEZeQkKy8KuosPbWMMX', '2015-11-25 12:26:27', '2015-11-25 12:26:27'),
(110, 164, 'LNHgff7eHPu1KhoGuPTuvN7PTds0GLog', '2015-11-26 06:20:33', '2015-11-26 06:20:33'),
(111, 164, 'T80dlUvqPBcbZkTSicoNi4WFHahlklM7', '2015-11-26 06:20:33', '2015-11-26 06:20:33'),
(112, 164, 'YRKc74OQggpFnmatxScYosnmvukxuRIo', '2015-11-26 11:52:17', '2015-11-26 11:52:17'),
(113, 164, '6j7Ho4fLYBOZK9P9cep4nqxAYmijDuCx', '2015-11-26 11:52:17', '2015-11-26 11:52:17'),
(114, 164, 'tZDyiPlovRRDNjw0gZ2TNYcKYtBDpgal', '2015-11-26 14:11:15', '2015-11-26 14:11:15'),
(115, 164, 'EEBnkt9g38THa63BgXEnf9UtuNXJyCy3', '2015-11-26 14:11:15', '2015-11-26 14:11:15'),
(116, 164, 'kteW9kaqLqNjwFTrpOWHxNGh18rqUdv7', '2015-11-29 06:04:40', '2015-11-29 06:04:40'),
(117, 164, 'cIIYrNZDVGXxc8lxTLAqgddtacmGQVYo', '2015-11-29 06:04:40', '2015-11-29 06:04:40'),
(118, 164, 'JP2diKuLX1VD5wPLBQT55w6vas97hWEp', '2015-11-29 10:54:03', '2015-11-29 10:54:03'),
(119, 164, 'gXHykQnLPgX0HZWxQCeEfVMumfqKVsif', '2015-11-29 10:54:03', '2015-11-29 10:54:03'),
(120, 164, 'gItcq2I0MkK6ls5MZ5O0isZ9hM4J1yuQ', '2015-12-01 06:23:34', '2015-12-01 06:23:34'),
(121, 164, 'NCK1nGwtqF9TCHjOjM4TqESdwdPFEpnL', '2015-12-01 06:23:34', '2015-12-01 06:23:34'),
(122, 164, 'mxuHGjhBsBjwkqGNJdxBaq4d5FFX68Ya', '2015-12-02 09:38:12', '2015-12-02 09:38:12'),
(123, 164, '6Lz1ANMxGWm7NEzmN4qSLEyceVe46pIZ', '2015-12-02 09:38:12', '2015-12-02 09:38:12'),
(124, 164, 'V8hjjStDxIMUynwCfA4G6haymRI6gORd', '2015-12-03 06:17:16', '2015-12-03 06:17:16'),
(125, 164, '4uoqBbqCdyY2ewDpKhmLc0qrBH7ioUoR', '2015-12-03 06:17:16', '2015-12-03 06:17:16'),
(126, 164, 'FLy4plIfQ2emtbxGpMuxhXRu88yKF1oZ', '2015-12-03 10:37:15', '2015-12-03 10:37:15'),
(127, 164, '1VSfag6LNHsx5lBDjDV4ultcvNoRlHni', '2015-12-03 10:37:15', '2015-12-03 10:37:15'),
(128, 164, 'V0i9YjpLlwLr6212hPfNrWPiHrtfjdgd', '2015-12-06 05:43:33', '2015-12-06 05:43:33'),
(129, 164, 'jl2aPwOouksNmQ1nbNE45X13MqUMWD9l', '2015-12-06 05:43:33', '2015-12-06 05:43:33'),
(130, 164, '85BDw8ctzEv7d2bbNXL5jc0ivZ1zABig', '2015-12-06 08:04:02', '2015-12-06 08:04:02'),
(131, 164, 'UW8K7xi2MKARwO82ZZ0bZkrvzVNz8pyf', '2015-12-06 08:04:02', '2015-12-06 08:04:02'),
(132, 164, '7xcuHAhNNT9PgdPq2j2GpDkSZu45l6pD', '2015-12-07 06:35:36', '2015-12-07 06:35:36'),
(133, 164, '80mNvQHYFkdsNe906J0vDLrRrZV7PXr1', '2015-12-07 06:35:36', '2015-12-07 06:35:36'),
(134, 164, '52UTuDs1ReiMBQa1ZgBQEYbhfAAxNwlq', '2015-12-08 06:01:30', '2015-12-08 06:01:30'),
(135, 164, 'ZXyxZSZtku4iKqms6ZdSwIQD3EqomJCJ', '2015-12-08 06:01:30', '2015-12-08 06:01:30'),
(136, 164, '9oqhoPKJhoPdKEiDl2WAVFWpaqBbtlGJ', '2015-12-09 05:54:31', '2015-12-09 05:54:31'),
(137, 164, '674XskVafcZw9yv6FzFHP3ch9QgZr9LQ', '2015-12-09 05:54:31', '2015-12-09 05:54:31'),
(138, 164, '4fPBotcXrPSUqsbj7v5jYUagjYP1jy1y', '2015-12-09 08:54:32', '2015-12-09 08:54:32'),
(139, 164, 'g1HR5YIW8eWwjJJkPJ4Ehpe4BNQLbr9V', '2015-12-09 08:54:32', '2015-12-09 08:54:32'),
(140, 164, 'A8b0z9v2B7LW5I4V2honBAUWvAusxGp8', '2015-12-09 12:54:52', '2015-12-09 12:54:52'),
(141, 164, 'RDE7ATcovbzlun1LZMNYqPDN7kdmQGOc', '2015-12-09 12:54:52', '2015-12-09 12:54:52'),
(142, 164, 'PDNYXIBwL2VwKjC9Pi2fSDPSQEZgCXmR', '2015-12-13 05:39:31', '2015-12-13 05:39:31'),
(143, 164, 'CZnfyi0nc3hHaO1zvsxwPpC99mk6ynMh', '2015-12-13 05:39:31', '2015-12-13 05:39:31'),
(152, 241, 'TArEKrXLtRt4eCIZc7uReKhLe0udxoMr', '2015-12-16 06:16:47', '2015-12-16 06:16:47'),
(153, 241, 'yQTfIoJHN4LbmqBPdJRtP9bhdtSpClTw', '2015-12-16 06:16:47', '2015-12-16 06:16:47'),
(154, 241, 'lOuz6g7clZZA67BhdwlECCgxJkSmC58o', '2015-12-16 09:44:52', '2015-12-16 09:44:52'),
(155, 241, 'PXBr7kBgrplZVJFPrlWElkjuVYHT8rix', '2015-12-16 09:44:52', '2015-12-16 09:44:52'),
(156, 241, '0bXp8Z6gUWvjeotjNY11qNO7z8WmamZR', '2015-12-16 12:08:12', '2015-12-16 12:08:12'),
(157, 241, 'fbBmWcMd51FiOwQHWT6OUn1betcPjrHC', '2015-12-16 12:08:12', '2015-12-16 12:08:12'),
(158, 241, 'mFuQ1hYTEq79Ga3sNRMM1z2xTHzemhEi', '2015-12-17 08:21:41', '2015-12-17 08:21:41'),
(159, 241, 'r3JTBpMQ1JHGdiqJgNZB5QPTWIVhkWaL', '2015-12-17 08:21:41', '2015-12-17 08:21:41'),
(160, 241, 'mFWFPlTzs77DtplsP1aGWqv2MWuzPxGV', '2015-12-20 05:38:00', '2015-12-20 05:38:00'),
(161, 241, 'FtBrbZfwyx3kfp9XKJnL3Cl5YNXPebGR', '2015-12-20 05:38:00', '2015-12-20 05:38:00'),
(162, 241, '7buhTvWqiCtlqphszrZRDwlMCY3UVIWv', '2015-12-21 05:57:24', '2015-12-21 05:57:24'),
(163, 241, 'JL8gOTT7fycUc684CZN96ibRZsbQZt3E', '2015-12-21 05:57:24', '2015-12-21 05:57:24'),
(164, 241, 'M8echsB8MRN37TakBNxEmxnQxpucnoeR', '2015-12-22 08:10:54', '2015-12-22 08:10:54'),
(165, 241, '8ZohbqnJOcVVbJPsliUIec9Fi9f8f5TM', '2015-12-22 08:10:54', '2015-12-22 08:10:54'),
(166, 241, 'Tp1P9O42FOe9FQj0uRmmkRnWHJ9vgdD6', '2015-12-22 11:11:06', '2015-12-22 11:11:06'),
(167, 241, 'jPizBoHQy0qjvXrcsYd3HoI7GKVaWpod', '2015-12-22 11:11:06', '2015-12-22 11:11:06'),
(168, 241, '6rw6i0jWJvO07Pc3czRlJIirDexxRpH4', '2015-12-23 07:33:59', '2015-12-23 07:33:59'),
(169, 241, 'bk2kHn8WhIMVUkFIuYJwB432R0SuyZKC', '2015-12-23 07:33:59', '2015-12-23 07:33:59'),
(231, 315, '1bN6tU9rtfNTvcAEdvYPNSgPtRrbIynl', '2016-02-02 04:19:52', '2016-02-02 04:19:52'),
(232, 316, 'mBU9o7AoA6CD2O8JaE3Ht3tHec9Sm6wj', '2016-02-02 04:26:29', '2016-02-02 04:26:29'),
(242, 314, 'vAmwUWPOieFBgvXbWKE7ENSaiWHj70nf', '2016-02-07 05:04:38', '2016-02-07 05:04:38'),
(243, 314, 'aDGOIoyLtkB3pjLDyG0jvcLnYPAIP9DO', '2016-02-07 05:04:38', '2016-02-07 05:04:38'),
(244, 314, 'K2NAfjJgykqcJ6qNKTCFGBDaX5pEeNqc', '2016-02-08 03:44:20', '2016-02-08 03:44:20'),
(245, 314, 'jy0nVDmOfFmgyd6ilsbmmt1oL7ylZV2l', '2016-02-08 03:44:20', '2016-02-08 03:44:20'),
(246, 314, 'OFV8eWfmvpFzxPVTQhgxqruGDDBezSzi', '2016-02-09 05:04:15', '2016-02-09 05:04:15'),
(247, 314, '43yLh320nmhMIrgrRagVcanBwsLAiYCt', '2016-02-09 05:04:15', '2016-02-09 05:04:15'),
(248, 314, 'fTcjP2PKP9OFbI28dpFcNJYkUFoMLV25', '2016-02-10 03:35:21', '2016-02-10 03:35:21'),
(249, 314, 'B2rkZYCbeQA4bjRHH5DrPcstthAWrY61', '2016-02-10 03:35:21', '2016-02-10 03:35:21'),
(250, 314, '5eMegciHbj5zgCZuuZK2ujvCSosqIotA', '2016-02-11 03:46:48', '2016-02-11 03:46:48'),
(251, 314, 'vACn6qyLhGguFOzqw1yPrRK6Wy3Ae7Bw', '2016-02-11 03:46:48', '2016-02-11 03:46:48'),
(252, 314, 'RuGsYyPGcoct86yN3StmO74B024duDBu', '2016-02-11 05:49:14', '2016-02-11 05:49:14'),
(253, 314, 'RsB6VOboEP7rbYmL2QrXOuaYYnoZ0QnQ', '2016-02-11 05:49:14', '2016-02-11 05:49:14'),
(254, 314, '8xOMtpoX7AhBtldJFWHbOP2CSLQMJktV', '2016-02-14 12:03:19', '2016-02-14 12:03:19'),
(255, 314, 'q5AQOdoshgSTBJqVhBp0DdaOnbFq1lCA', '2016-02-14 12:03:20', '2016-02-14 12:03:20'),
(256, 314, 'pMSKMTnN7IQa8Z4KVif1Q4vkskiPnBWQ', '2016-02-15 05:57:13', '2016-02-15 05:57:13'),
(257, 314, '61LpPLN3Wc878hD0VkrD293eWehnnuE5', '2016-02-15 05:57:13', '2016-02-15 05:57:13'),
(258, 314, 'Ro2iWAqovept8K45xcNUpka88anWHYt2', '2016-02-15 08:44:43', '2016-02-15 08:44:43'),
(259, 314, 'BfT7g797Ce6V9e3hTNkvYEUjZFQnOfZ8', '2016-02-15 08:44:43', '2016-02-15 08:44:43'),
(260, 314, '1xb0SlA4vpLfzoQw34QbQWJMaSkpUwoP', '2016-02-16 04:00:59', '2016-02-16 04:00:59'),
(261, 314, 'BYNoyU7ufr9mGjKztidpVvjrZNrofA6T', '2016-02-16 04:00:59', '2016-02-16 04:00:59'),
(262, 314, '2WZwzTy5fe5hVKyRLpNpVJFAvaYhDt9o', '2016-02-16 10:04:13', '2016-02-16 10:04:13'),
(263, 314, 'fWK5jezb5ACy8uTb8LHEDhhNkky2JNCC', '2016-02-16 10:04:13', '2016-02-16 10:04:13'),
(264, 314, '3ScXggsQjQn1PDchJ464OCMoGKtuuOwW', '2016-02-17 04:18:11', '2016-02-17 04:18:11'),
(265, 314, 'bURCahY88sbCdRCjeBvOxW32IIeTpGEi', '2016-02-17 04:18:12', '2016-02-17 04:18:12'),
(266, 314, 'Ewh5GvVHVHmfu6N9lhLwOgWSwGdp5TOJ', '2016-02-17 07:57:05', '2016-02-17 07:57:05'),
(267, 314, '3g4fxy040yGlmOuHYiP1ieIJFxbjZEuG', '2016-02-17 07:57:05', '2016-02-17 07:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'client', 'client', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin', 'admin', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'block', 'block', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 2, '2015-11-02 12:00:22', '2015-11-02 12:00:22'),
(6, 1, '2015-11-02 12:03:09', '2015-11-02 12:03:09'),
(7, 1, '2015-11-02 12:03:48', '2015-11-02 12:03:48'),
(8, 1, '2015-11-03 10:08:06', '2015-11-03 10:08:06'),
(9, 1, '2015-11-03 10:08:30', '2015-11-03 10:08:30'),
(10, 1, '2015-11-03 10:09:48', '2015-11-03 10:09:48'),
(14, 1, '2015-11-03 10:12:45', '2015-11-03 10:12:45'),
(16, 1, '2015-11-03 10:18:44', '2015-11-03 10:18:44'),
(17, 1, '2015-11-03 10:20:17', '2015-11-03 10:20:17'),
(18, 1, '2015-11-03 10:21:35', '2015-11-03 10:21:35'),
(19, 1, '2015-11-03 10:25:37', '2015-11-03 10:25:37'),
(20, 1, '2015-11-03 10:25:59', '2015-11-03 10:25:59'),
(21, 1, '2015-11-03 10:26:20', '2015-11-03 10:26:20'),
(22, 1, '2015-11-03 10:28:52', '2015-11-03 10:28:52'),
(23, 1, '2015-11-03 10:31:43', '2015-11-03 10:31:43'),
(24, 1, '2015-11-03 10:32:10', '2015-11-03 10:32:10'),
(25, 1, '2015-11-03 10:40:41', '2015-11-03 10:40:41'),
(26, 1, '2015-11-03 10:42:22', '2015-11-03 10:42:22'),
(27, 1, '2015-11-03 10:42:58', '2015-11-03 10:42:58'),
(28, 1, '2015-11-03 10:44:36', '2015-11-03 10:44:36'),
(29, 1, '2015-11-03 10:46:55', '2015-11-03 10:46:55'),
(30, 1, '2015-11-03 10:48:57', '2015-11-03 10:48:57'),
(31, 1, '2015-11-03 10:49:15', '2015-11-03 10:49:15'),
(32, 1, '2015-11-03 10:50:40', '2015-11-03 10:50:40'),
(33, 1, '2015-11-03 10:51:41', '2015-11-03 10:51:41'),
(34, 1, '2015-11-03 10:52:42', '2015-11-03 10:52:42'),
(35, 1, '2015-11-03 10:53:25', '2015-11-03 10:53:25'),
(36, 1, '2015-11-03 10:54:11', '2015-11-03 10:54:11'),
(37, 1, '2015-11-03 10:55:03', '2015-11-03 10:55:03'),
(38, 1, '2015-11-03 10:55:23', '2015-11-03 10:55:23'),
(39, 1, '2015-11-03 10:56:09', '2015-11-03 10:56:09'),
(40, 1, '2015-11-03 10:56:37', '2015-11-03 10:56:37'),
(41, 1, '2015-11-03 10:58:12', '2015-11-03 10:58:12'),
(42, 1, '2015-11-03 10:58:58', '2015-11-03 10:58:58'),
(43, 1, '2015-11-03 13:42:37', '2015-11-03 13:42:37'),
(44, 1, '2015-11-04 06:29:41', '2015-11-04 06:29:41'),
(45, 1, '2015-11-04 06:31:05', '2015-11-04 06:31:05'),
(46, 1, '2015-11-04 06:31:21', '2015-11-04 06:31:21'),
(47, 1, '2015-11-04 06:31:40', '2015-11-04 06:31:40'),
(51, 1, '2015-11-08 10:12:09', '2015-11-08 10:12:09'),
(52, 1, '2015-11-08 12:24:00', '2015-11-08 12:24:00'),
(53, 1, '2015-11-08 12:25:53', '2015-11-08 12:25:53'),
(54, 1, '2015-11-08 13:21:53', '2015-11-08 13:21:53'),
(55, 1, '2015-11-08 13:39:25', '2015-11-08 13:39:25'),
(56, 1, '2015-11-09 12:44:47', '2015-11-09 12:44:47'),
(57, 1, '2015-11-11 05:22:41', '2015-11-11 05:22:41'),
(60, 1, '2015-11-11 06:07:39', '2015-11-11 06:07:39'),
(62, 1, '2015-11-11 06:08:23', '2015-11-11 06:08:23'),
(64, 1, '2015-11-11 06:09:12', '2015-11-11 06:09:12'),
(67, 1, '2015-11-11 06:09:52', '2015-11-11 06:09:52'),
(68, 1, '2015-11-11 10:13:32', '2015-11-11 10:13:32'),
(70, 1, '2015-11-11 10:18:48', '2015-11-11 10:18:48'),
(71, 1, '2015-11-11 10:26:48', '2015-11-11 10:26:48'),
(72, 1, '2015-11-11 10:45:07', '2015-11-11 10:45:07'),
(73, 1, '2015-11-11 10:49:30', '2015-11-11 10:49:30'),
(74, 1, '2015-11-11 10:52:18', '2015-11-11 10:52:18'),
(75, 1, '2015-11-11 10:56:16', '2015-11-11 10:56:16'),
(76, 1, '2015-11-11 11:22:31', '2015-11-11 11:22:31'),
(77, 1, '2015-11-11 11:25:49', '2015-11-11 11:25:49'),
(78, 1, '2015-11-11 11:26:43', '2015-11-11 11:26:43'),
(79, 1, '2015-11-11 11:27:53', '2015-11-11 11:27:53'),
(80, 1, '2015-11-11 11:28:35', '2015-11-11 11:28:35'),
(81, 1, '2015-11-11 11:29:34', '2015-11-11 11:29:34'),
(82, 1, '2015-11-11 11:30:17', '2015-11-11 11:30:17'),
(83, 1, '2015-11-11 11:30:45', '2015-11-11 11:30:45'),
(84, 1, '2015-11-11 11:31:55', '2015-11-11 11:31:55'),
(85, 1, '2015-11-11 11:35:13', '2015-11-11 11:35:13'),
(86, 1, '2015-11-11 11:36:58', '2015-11-11 11:36:58'),
(87, 1, '2015-11-11 11:43:11', '2015-11-11 11:43:11'),
(88, 1, '2015-11-11 11:43:41', '2015-11-11 11:43:41'),
(89, 1, '2015-11-11 11:44:03', '2015-11-11 11:44:03'),
(90, 1, '2015-11-11 11:45:59', '2015-11-11 11:45:59'),
(91, 1, '2015-11-11 11:46:15', '2015-11-11 11:46:15'),
(92, 1, '2015-11-11 11:46:45', '2015-11-11 11:46:45'),
(93, 1, '2015-11-11 12:04:26', '2015-11-11 12:04:26'),
(94, 1, '2015-11-11 12:06:56', '2015-11-11 12:06:56'),
(95, 1, '2015-11-11 12:07:44', '2015-11-11 12:07:44'),
(100, 1, '2015-11-12 10:09:12', '2015-11-12 10:09:12'),
(101, 1, '2015-11-12 10:10:07', '2015-11-12 10:10:07'),
(102, 1, '2015-11-12 10:11:40', '2015-11-12 10:11:40'),
(103, 1, '2015-11-12 10:11:52', '2015-11-12 10:11:52'),
(104, 1, '2015-11-12 10:12:06', '2015-11-12 10:12:06'),
(105, 1, '2015-11-12 10:16:14', '2015-11-12 10:16:14'),
(106, 1, '2015-11-12 10:17:11', '2015-11-12 10:17:11'),
(107, 1, '2015-11-12 10:18:08', '2015-11-12 10:18:08'),
(108, 1, '2015-11-12 10:18:36', '2015-11-12 10:18:36'),
(109, 1, '2015-11-12 10:18:56', '2015-11-12 10:18:56'),
(110, 1, '2015-11-12 10:20:22', '2015-11-12 10:20:22'),
(111, 1, '2015-11-12 10:21:42', '2015-11-12 10:21:42'),
(112, 1, '2015-11-12 10:22:25', '2015-11-12 10:22:25'),
(113, 1, '2015-11-12 10:23:06', '2015-11-12 10:23:06'),
(114, 1, '2015-11-12 10:24:26', '2015-11-12 10:24:26'),
(115, 1, '2015-11-12 10:27:24', '2015-11-12 10:27:24'),
(116, 1, '2015-11-12 10:28:10', '2015-11-12 10:28:10'),
(117, 1, '2015-11-12 10:28:37', '2015-11-12 10:28:37'),
(118, 1, '2015-11-12 10:30:58', '2015-11-12 10:30:58'),
(119, 1, '2015-11-12 10:33:49', '2015-11-12 10:33:49'),
(120, 1, '2015-11-12 10:39:02', '2015-11-12 10:39:02'),
(121, 1, '2015-11-12 10:40:20', '2015-11-12 10:40:20'),
(122, 1, '2015-11-12 10:42:23', '2015-11-12 10:42:23'),
(123, 1, '2015-11-12 10:43:14', '2015-11-12 10:43:14'),
(124, 1, '2015-11-12 10:44:00', '2015-11-12 10:44:00'),
(125, 1, '2015-11-12 10:44:19', '2015-11-12 10:44:19'),
(126, 1, '2015-11-12 10:45:05', '2015-11-12 10:45:05'),
(127, 1, '2015-11-12 10:45:29', '2015-11-12 10:45:29'),
(128, 1, '2015-11-12 10:47:14', '2015-11-12 10:47:14'),
(129, 1, '2015-11-12 10:49:00', '2015-11-12 10:49:00'),
(130, 1, '2015-11-12 10:52:17', '2015-11-12 10:52:17'),
(131, 1, '2015-11-12 10:54:25', '2015-11-12 10:54:25'),
(132, 1, '2015-11-12 10:59:12', '2015-11-12 10:59:12'),
(133, 1, '2015-11-12 11:05:08', '2015-11-12 11:05:08'),
(134, 1, '2015-11-12 11:06:09', '2015-11-12 11:06:09'),
(135, 1, '2015-11-12 11:08:32', '2015-11-12 11:08:32'),
(136, 1, '2015-11-12 11:09:37', '2015-11-12 11:09:37'),
(137, 1, '2015-11-12 11:12:12', '2015-11-12 11:12:12'),
(138, 1, '2015-11-12 11:13:54', '2015-11-12 11:13:54'),
(139, 1, '2015-11-12 11:15:20', '2015-11-12 11:15:20'),
(140, 1, '2015-11-12 11:17:20', '2015-11-12 11:17:20'),
(141, 1, '2015-11-12 11:18:20', '2015-11-12 11:18:20'),
(142, 1, '2015-11-12 11:18:36', '2015-11-12 11:18:36'),
(143, 1, '2015-11-12 11:18:53', '2015-11-12 11:18:53'),
(145, 1, '2015-11-12 11:19:32', '2015-11-12 11:19:32'),
(146, 1, '2015-11-12 11:21:31', '2015-11-12 11:21:31'),
(147, 1, '2015-11-12 11:23:36', '2015-11-12 11:23:36'),
(148, 1, '2015-11-12 11:24:03', '2015-11-12 11:24:03'),
(149, 1, '2015-11-12 11:24:39', '2015-11-12 11:24:39'),
(150, 1, '2015-11-12 11:26:19', '2015-11-12 11:26:19'),
(151, 1, '2015-11-12 11:27:03', '2015-11-12 11:27:03'),
(152, 1, '2015-11-12 11:27:25', '2015-11-12 11:27:25'),
(153, 1, '2015-11-12 11:28:25', '2015-11-12 11:28:25'),
(154, 1, '2015-11-12 11:41:18', '2015-11-12 11:41:18'),
(155, 1, '2015-11-12 11:41:59', '2015-11-12 11:41:59'),
(156, 1, '2015-11-12 11:43:28', '2015-11-12 11:43:28'),
(157, 1, '2015-11-12 11:44:09', '2015-11-12 11:44:09'),
(158, 1, '2015-11-12 11:47:30', '2015-11-12 11:47:30'),
(159, 1, '2015-11-12 11:48:16', '2015-11-12 11:48:16'),
(160, 1, '2015-11-12 11:49:01', '2015-11-12 11:49:01'),
(161, 1, '2015-11-12 11:49:55', '2015-11-12 11:49:55'),
(162, 1, '2015-11-12 12:31:28', '2015-11-12 12:31:28'),
(163, 1, '2015-11-12 12:34:36', '2015-11-12 12:34:36'),
(164, 1, '2015-11-18 10:26:00', '2015-11-18 10:26:00'),
(164, 2, '2015-11-12 12:35:45', '2015-11-12 12:35:45'),
(186, 2, '2015-11-16 12:14:30', '2015-11-16 12:14:30'),
(187, 2, '2015-11-16 12:45:08', '2015-11-16 12:45:08'),
(188, 2, '2015-11-16 12:46:40', '2015-11-16 12:46:40'),
(189, 2, '2015-11-16 12:46:59', '2015-11-16 12:46:59'),
(190, 2, '2015-11-16 12:50:09', '2015-11-16 12:50:09'),
(191, 2, '2015-11-16 12:50:44', '2015-11-16 12:50:44'),
(192, 2, '2015-11-16 12:51:20', '2015-11-16 12:51:20'),
(193, 2, '2015-11-16 12:52:39', '2015-11-16 12:52:39'),
(195, 2, '2015-11-16 12:53:42', '2015-11-16 12:53:42'),
(196, 2, '2015-11-16 12:55:51', '2015-11-16 12:55:51'),
(197, 2, '2015-11-16 12:58:01', '2015-11-16 12:58:01'),
(198, 2, '2015-11-16 12:58:45', '2015-11-16 12:58:45'),
(199, 2, '2015-11-16 12:59:11', '2015-11-16 12:59:11'),
(200, 2, '2015-11-16 12:59:38', '2015-11-16 12:59:38'),
(201, 2, '2015-11-16 13:01:27', '2015-11-16 13:01:27'),
(203, 2, '2015-11-16 13:22:26', '2015-11-16 13:22:26'),
(204, 2, '2015-11-16 13:23:27', '2015-11-16 13:23:27'),
(210, 2, '2015-11-16 13:27:37', '2015-11-16 13:27:37'),
(211, 2, '2015-11-16 13:28:18', '2015-11-16 13:28:18'),
(214, 2, '2015-11-16 13:33:05', '2015-11-16 13:33:05'),
(232, 1, '2015-11-17 13:29:01', '2015-11-17 13:29:01'),
(234, 1, '2015-11-18 06:55:41', '2015-11-18 06:55:41'),
(235, 2, '2015-12-06 09:52:51', '2015-12-06 09:52:51'),
(236, 2, '2015-12-07 08:30:27', '2015-12-07 08:30:27'),
(237, 2, '2015-12-07 08:31:36', '2015-12-07 08:31:36'),
(238, 2, '2015-12-07 08:31:54', '2015-12-07 08:31:54'),
(239, 2, '2015-12-07 08:32:10', '2015-12-07 08:32:10'),
(240, 2, '2015-12-07 08:32:53', '2015-12-07 08:32:53'),
(241, 0, '2015-12-20 08:33:44', '2015-12-20 08:33:44'),
(241, 1, '2015-12-13 09:54:12', '2015-12-13 09:54:12'),
(241, 2, '2015-12-13 06:24:04', '2015-12-13 06:24:04'),
(241, 3, '2015-12-20 09:07:06', '2015-12-20 09:07:06'),
(301, 1, '2015-12-20 08:47:03', '2015-12-20 08:47:03'),
(302, 2, '2015-12-20 08:52:18', '2015-12-20 08:52:18'),
(303, 2, '2015-12-20 09:22:40', '2015-12-20 09:22:40'),
(304, 1, '2015-12-20 09:24:29', '2015-12-20 09:24:29'),
(305, 1, '2015-12-20 09:25:20', '2015-12-20 09:25:20'),
(310, 2, '2015-12-20 09:32:24', '2015-12-20 09:32:24'),
(311, 1, '2015-12-20 09:33:22', '2015-12-20 09:33:22'),
(311, 3, '2015-12-20 09:42:11', '2015-12-20 09:42:11'),
(312, 2, '2015-12-20 09:33:58', '2015-12-20 09:33:58'),
(313, 1, '2015-12-20 09:41:38', '2015-12-20 09:41:38'),
(313, 3, '2015-12-20 09:42:07', '2015-12-20 09:42:07'),
(314, 1, '2015-12-23 11:45:34', '2015-12-23 11:45:34'),
(314, 2, '2015-12-23 11:45:34', '2015-12-23 11:45:34'),
(315, 1, '2016-02-02 04:19:52', '2016-02-02 04:19:52'),
(316, 1, '2016-02-02 04:26:28', '2016-02-02 04:26:28'),
(317, 1, '2016-02-02 04:29:53', '2016-02-02 04:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `uid` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `oauth1_token_identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth1_token_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth2_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth2_refresh_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth2_expires` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_provider_user_id_unique` (`provider`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `user_id`, `uid`, `provider`, `oauth1_token_identifier`, `oauth1_token_secret`, `oauth2_access_token`, `oauth2_refresh_token`, `oauth2_expires`, `created_at`, `updated_at`) VALUES
(1, 241, '959011610827398', 'facebook', NULL, NULL, 'CAAXabnURCO4BANiUBrWZCqIZAQwUs7qe8UpZCZB2OGfikZAAKCsAArjGBINeiEyrVsvcVx7rYFfUjkxtO4dx2az5xDdBcQVrS0tvVrStUX7OhlYZCrhGDbepF4htyYZC8o36MCvTu3znx5mE3XZALfcjYxCZBISgVml8KOF14Gqz6YWeZCKdrrsgPfDAfCq4ZBfZBTwZD', NULL, '2016-02-20 08:10:52', '2015-11-08 10:12:07', '2015-12-23 07:33:59'),
(2, 164, '103058489419887700645', 'google', NULL, NULL, 'ya29.NgJ_7D6DK17SrqspNqObFPhbIlcDK8fS_4kh7OtiWnxwDyKfT4bc9A5b8nqbJlRfQJH6nA', NULL, '2015-11-24 07:27:57', '2015-11-11 10:13:30', '2015-11-24 06:27:59'),
(3, 314, '946337135452354', 'facebook', NULL, NULL, 'CAAXabnURCO4BAOl3NzvIsKiZAlRLHByNkXPkCow2yNeVe2h3yjLKAykxo6UTCOOyZCYpoeuWJAL19N7hDXxiZBQ42fu9IQfEFMbAhCOD5dDSABlYgOPwsT4GCEnsg8nXMtZBhZCjGVHH6U2ZBCQmdDZAADeGsGZAPHB0e2p1R7ckuYZByeQdzchauUD7pV1Rl4IceWnhpm4hq4wZDZD', NULL, '2016-04-17 04:18:09', '2015-12-23 11:45:33', '2016-02-17 07:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2016-02-04 11:20:09', '2016-02-04 11:20:09'),
(2, NULL, 'ip', '::1', '2016-02-04 11:20:09', '2016-02-04 11:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `tools_future_contract`
--

CREATE TABLE IF NOT EXISTS `tools_future_contract` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol` char(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exchange` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` tinyint(4) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=152 ;

--
-- Dumping data for table `tools_future_contract`
--

INSERT INTO `tools_future_contract` (`id`, `name`, `symbol`, `exchange`, `month`, `year`, `start_date`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 'galya', 'ERUfgd', 'New York', 0, 2005, '2015-11-02', '2015-09-08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'cdscsaasaaasa', 'sdsasaa', 'asdfsd', 0, 2003, '2015-09-07', '2015-09-29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'fgsdf', 'fdsgdf', 'dfsgdf', 0, 2013, '2014-12-10', '2015-08-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'fgsdf', 'fdsgdf', 'dfsgdf', 0, 2013, '2014-12-10', '2015-08-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'fgsdf', 'fdsgdf', 'dfsgdf', 0, 2013, '2014-12-10', '2015-08-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'fgsdf', 'fdsgdf', 'dfsgdf', 0, 2013, '2014-12-10', '2015-08-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'fgsdf', 'fdsgdf', 'dfsgdf', 0, 2013, '2014-12-10', '2015-08-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'jb', 'tff', '', 3, 0, '2015-12-28', '2015-12-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'qwq', 'wqwq', '', 1, 2000, '2015-12-09', '2015-12-16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'gdbvb', 'cbvx', 'xvcbcx', 4, 0, '2015-12-22', '2015-12-31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'qwrew', 'ewrew', 'werwer', 5, 2000, '2015-12-22', '2015-12-29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'rwerewr', 'fdgdf', 'dfgfd', 10, 3000, '2015-12-21', '2015-12-26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'ewrrwe', 'rewrwe', 'werew', 4, 1000, '2015-12-21', '2016-01-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'qqq', 'wqwqw', 'wqqw', 2, 3013, '2015-12-28', '2015-12-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'ewrer', 'sdfdf', 'dfd', 6, 2031, '2015-12-28', '2015-12-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'qwq', 'wqwq', 'werwer', 3, 2013, '2015-12-21', '2015-12-31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'qqq', 'wqwqw', 'dfsgdf', 4, 2000, '2015-12-20', '2015-12-17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'cdscsaasaaasa', 'cbvx', 'xvcbcx', 2, 2013, '2015-12-20', '2015-12-31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'ewrrwe', 'ERUfgd', 'ewwq', 10, 2013, '2015-12-08', '2015-12-24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'zzzxc', 'cxz', 'cxzcx', 5, 2013, '2015-12-10', '2015-12-18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'fgsdf', 'fdgdf', 'ffdsd', 8, 2013, '2015-12-12', '2015-12-19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'fgsdf', 'fdgdf', 'ffdsd', 8, 2013, '2015-12-12', '2015-12-19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'zzzxc', 'xcx', 'xcxcx', 12, 2013, '2015-12-21', '2015-12-26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'fdfdx', 'sads', 'asdfsd', 6, 2013, '2015-12-10', '2015-12-12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'asdas', 'zxczx', 'xzc', 6, 2013, '2015-12-14', '2015-12-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'czxcxzc', 'casdsa', 'asdasda', 5, 2013, '2015-12-23', '2015-12-24', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tools_holiday`
--

CREATE TABLE IF NOT EXISTS `tools_holiday` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tools_holiday`
--

INSERT INTO `tools_holiday` (`id`, `name`, `start_date`, `end_date`) VALUES
(2, 'fghfgh', '2016-01-12', '2016-01-28'),
(3, 'dfgdfg', '2016-01-20', '2016-01-26'),
(4, 'dfgdfg', '2016-01-20', '2016-01-26'),
(5, 'sdfsdf', '2016-01-20', '2016-01-15'),
(6, 'sdfsdf', '2016-01-27', '2016-01-28'),
(7, 'sdfsdf', '2016-01-18', '2016-01-19'),
(8, 'sdfsdf', '2016-01-18', '2016-01-19'),
(9, 'sdfsdf', '2016-01-18', '2016-01-19'),
(10, 'gfhfg', '2016-01-05', '2016-01-20'),
(11, 'رلاؤرلا', '2016-01-13', '2016-01-15'),
(14, 'jjjjjjjjjjjj', '2016-01-29', '2016-01-30'),
(15, 'ffffff', '2016-01-12', '2016-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `tools_holiday_symbols`
--

CREATE TABLE IF NOT EXISTS `tools_holiday_symbols` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `holiday_id` int(11) NOT NULL,
  `securities_id` int(11) NOT NULL,
  `symbols_id` int(11) NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=95 ;

--
-- Dumping data for table `tools_holiday_symbols`
--

INSERT INTO `tools_holiday_symbols` (`id`, `holiday_id`, `securities_id`, `symbols_id`, `start_hour`, `end_hour`, `date`) VALUES
(1, 0, 0, 0, '00:00:00', '00:00:00', '0000-00-00'),
(2, 11, 0, 3, '00:00:00', '00:00:00', '2016-01-13'),
(3, 11, 0, 6, '15:00:00', '22:00:00', '2016-01-13'),
(4, 11, 0, 2, '00:00:35', '00:03:45', '2016-01-13'),
(5, 11, 1, 5, '00:00:35', '00:03:45', '2016-01-13'),
(6, 11, 0, 6, '00:00:35', '00:03:45', '2016-01-13'),
(7, 11, 0, 2, '00:00:35', '00:03:45', '2016-01-13'),
(8, 11, 1, 5, '00:00:35', '00:03:45', '2016-01-13'),
(9, 11, 1, 6, '00:00:35', '00:03:45', '2016-01-13'),
(10, 11, 2, 2, '00:00:35', '00:03:45', '2016-01-13'),
(11, 11, 1, 5, '00:00:35', '00:03:45', '2016-01-13'),
(12, 11, 1, 6, '00:00:35', '00:03:45', '2016-01-14'),
(13, 11, 2, 1, '00:00:35', '00:03:45', '2016-01-13'),
(14, 11, 2, 2, '00:00:35', '00:03:45', '2016-01-13'),
(15, 11, 2, 4, '02:00:35', '05:03:45', '2016-01-13'),
(16, 11, 1, 5, '00:00:35', '00:03:45', '2016-01-13'),
(17, 11, 1, 6, '04:00:35', '14:13:45', '2016-01-13'),
(18, 0, 2, 2, '00:04:53', '00:03:45', '0000-00-00'),
(19, 0, 1, 3, '00:04:53', '00:03:45', '0000-00-00'),
(20, 0, 1, 5, '00:04:53', '00:03:45', '0000-00-00'),
(21, 0, 1, 6, '00:04:53', '00:03:45', '0000-00-00'),
(22, 0, 2, 2, '00:04:53', '00:03:45', '0000-00-00'),
(23, 0, 1, 3, '00:04:53', '00:03:45', '0000-00-00'),
(24, 0, 1, 5, '00:04:53', '00:03:45', '0000-00-00'),
(25, 0, 1, 6, '00:04:53', '00:03:45', '0000-00-00'),
(26, 0, 2, 2, '00:04:53', '00:03:45', '0000-00-00'),
(27, 0, 1, 3, '00:04:53', '00:03:45', '0000-00-00'),
(28, 0, 1, 5, '00:04:53', '00:03:45', '0000-00-00'),
(29, 0, 1, 6, '00:04:53', '00:03:45', '0000-00-00'),
(30, 0, 2, 2, '00:07:56', '00:00:00', '0000-00-00'),
(31, 0, 2, 4, '00:07:56', '00:00:00', '0000-00-00'),
(32, 0, 1, 3, '00:07:56', '00:00:00', '0000-00-00'),
(33, 0, 1, 5, '00:07:56', '00:00:00', '0000-00-00'),
(34, 0, 2, 2, '00:07:56', '00:00:00', '0000-00-00'),
(35, 0, 2, 4, '00:07:56', '00:00:00', '0000-00-00'),
(36, 0, 1, 3, '00:07:56', '00:00:00', '0000-00-00'),
(37, 0, 1, 5, '00:07:56', '00:00:00', '0000-00-00'),
(38, 0, 2, 2, '00:07:56', '00:00:00', '0000-00-00'),
(39, 0, 2, 4, '00:07:56', '00:00:00', '0000-00-00'),
(40, 0, 1, 3, '00:07:56', '00:00:00', '0000-00-00'),
(41, 0, 1, 5, '00:07:56', '00:00:00', '0000-00-00'),
(42, 0, 2, 1, '00:00:00', '00:00:00', '0000-00-00'),
(43, 0, 2, 2, '00:00:00', '00:00:00', '0000-00-00'),
(44, 0, 2, 4, '00:00:00', '00:00:00', '0000-00-00'),
(45, 0, 2, 1, '00:00:05', '00:03:45', '0000-00-00'),
(46, 0, 2, 2, '00:00:05', '00:03:45', '0000-00-00'),
(47, 0, 2, 4, '00:00:05', '00:03:45', '0000-00-00'),
(48, 0, 1, 3, '00:00:05', '00:03:45', '0000-00-00'),
(49, 0, 2, 1, '00:00:05', '00:03:45', '0000-00-00'),
(50, 0, 2, 2, '00:00:05', '00:03:45', '0000-00-00'),
(51, 0, 2, 4, '00:00:05', '00:03:45', '0000-00-00'),
(52, 0, 1, 3, '00:00:05', '00:03:45', '0000-00-00'),
(53, 0, 1, 3, '00:00:00', '00:00:00', '0000-00-00'),
(54, 0, 1, 3, '00:00:00', '00:00:00', '0000-00-00'),
(55, 0, 2, 1, '00:02:43', '00:02:34', '0000-00-00'),
(56, 0, 2, 4, '00:02:43', '00:02:34', '0000-00-00'),
(57, 0, 1, 6, '00:02:43', '00:02:34', '0000-00-00'),
(58, 0, 2, 1, '00:00:00', '00:00:00', '0000-00-00'),
(59, 0, 2, 2, '00:00:00', '00:00:00', '0000-00-00'),
(60, 0, 2, 4, '00:00:00', '00:00:00', '0000-00-00'),
(61, 0, 2, 1, '00:02:34', '00:02:34', '0000-00-00'),
(62, 0, 2, 2, '00:02:34', '00:02:34', '0000-00-00'),
(63, 0, 2, 4, '00:02:34', '00:02:34', '0000-00-00'),
(64, 0, 1, 3, '00:02:34', '00:02:34', '0000-00-00'),
(65, 0, 1, 6, '00:02:34', '00:02:34', '0000-00-00'),
(66, 0, 2, 1, '02:04:08', '06:05:30', '2016-03-01'),
(67, 0, 2, 2, '02:04:08', '06:05:30', '2016-03-01'),
(68, 0, 2, 4, '02:04:08', '06:05:30', '2016-03-01'),
(69, 0, 1, 6, '02:04:08', '06:05:30', '2016-03-01'),
(70, 0, 2, 1, '02:04:08', '06:05:30', '2016-03-01'),
(71, 0, 2, 2, '02:04:08', '06:05:30', '2016-03-01'),
(72, 0, 2, 4, '02:04:08', '06:05:30', '2016-03-01'),
(73, 0, 1, 6, '02:04:08', '06:05:30', '2016-03-01'),
(74, 0, 2, 1, '02:04:08', '06:05:30', '2016-03-01'),
(75, 0, 2, 2, '02:04:08', '06:05:30', '2016-03-01'),
(76, 0, 2, 4, '02:04:08', '06:05:30', '2016-03-01'),
(77, 0, 1, 6, '02:04:08', '06:05:30', '2016-03-01'),
(78, 0, 2, 1, '02:04:08', '06:05:30', '2016-03-01'),
(79, 0, 2, 2, '02:04:08', '06:05:30', '2016-03-01'),
(80, 0, 2, 4, '02:04:08', '06:05:30', '2016-03-01'),
(81, 0, 1, 6, '02:04:08', '06:05:30', '2016-03-01'),
(82, 11, 1, 3, '00:00:00', '00:00:00', '2016-01-13'),
(83, 11, 1, 5, '00:00:00', '00:00:00', '2016-01-13'),
(84, 11, 1, 6, '00:00:00', '00:00:00', '2016-01-13'),
(85, 0, 1, 5, '02:04:08', '06:05:30', '2016-03-01'),
(86, 0, 1, 6, '02:04:08', '06:05:30', '2016-03-01'),
(87, 15, 1, 3, '02:04:08', '06:05:30', '2016-01-12'),
(88, 15, 1, 6, '02:04:08', '06:05:30', '2016-01-12'),
(89, 15, 1, 3, '14:21:45', '14:22:00', '2016-01-12'),
(90, 15, 1, 5, '14:21:45', '14:22:00', '2016-01-12'),
(91, 15, 1, 6, '14:21:45', '14:22:00', '2016-01-12'),
(92, 15, 1, 3, '12:22:00', '14:22:00', '2016-01-12'),
(93, 15, 1, 5, '12:22:00', '14:22:00', '2016-01-12'),
(94, 15, 1, 6, '12:22:00', '14:22:00', '2016-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `tools_securities`
--

CREATE TABLE IF NOT EXISTS `tools_securities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tools_securities`
--

INSERT INTO `tools_securities` (`id`, `name`) VALUES
(1, 'security1'),
(2, 'security2');

-- --------------------------------------------------------

--
-- Table structure for table `tools_symbols`
--

CREATE TABLE IF NOT EXISTS `tools_symbols` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `securities_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tools_symbols`
--

INSERT INTO `tools_symbols` (`id`, `name`, `securities_id`) VALUES
(1, 'symbol1security2', 2),
(2, 'symbol2security2', 2),
(3, 'symbol3security1', 1),
(4, 'symbol4security2', 2),
(5, 'symbol5security1', 1),
(6, 'symbol6security1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=318 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `avatar`, `created_at`, `updated_at`) VALUES
(241, 'mag_galya09@hotmail.com', '$2y$10$i3cR1ZLUTu5A20C8AAE5cO9A68YreUtN.W0frM1bnR2UA6g9/YMSa', NULL, '2015-12-23 07:33:59', 'Mag', 'Galya', NULL, '2015-12-13 06:24:03', '2015-12-23 07:33:59'),
(242, 'maggalya09@gmail.com', 'fdsgghjgjrh', NULL, '2015-12-01 22:00:00', 'dsa', 'ad', NULL, '2015-12-13 06:24:03', '2015-12-13 06:24:03'),
(301, 'galya@mqplanejjjkt2.com', '$2y$10$0vWHwowD5ybFSFGlz/r0PO09f8.7/FmgFW.bNh5ho17xj2/.x6Lru', NULL, NULL, 'qq', 'xcc', NULL, '2015-12-20 08:47:03', '2015-12-20 08:47:03'),
(302, 'galya@mqaaaplanet2.com', '$2y$10$abCqLwQh74E1Ps6LBCWPyO33RuFBuL4Qt9tuP43H996W1RNUCQpTG', NULL, NULL, 'qq', 'dsfdsfsdf', NULL, '2015-12-20 08:52:18', '2015-12-20 08:52:18'),
(303, 'galya@mqpaaaaalanet.com', '$2y$10$vF0mq5wRPhYBcMakuEtm2.qo2P59qs0SVUzlHhN2GjBr2MVvzJeMq', NULL, NULL, 'Moayad', 'aa', NULL, '2015-12-20 09:22:40', '2015-12-20 09:22:40'),
(304, 'galya@mqpsasalanet2.com', '$2y$10$/vMHQ3kzojI9RpOw3hH.fO/um3PE6kJ7u1VHMc4J.4zax/zI53wqO', NULL, NULL, 'aa', 'galya', NULL, '2015-12-20 09:24:29', '2015-12-20 09:24:29'),
(305, 'galya@mqplaaaaanet2.com', '$2y$10$8Lf7CX8XlEDMatxBcurD.e5Qyyw7EoU0yb.LyecOfnWHk8LHbopha', NULL, NULL, 'admin', 'qq', NULL, '2015-12-20 09:25:20', '2015-12-20 09:25:20'),
(306, 'galya@mqplanetsaasasasas2.com', '$2y$10$Y44iY7fszrmyZv.5kvk3SOBmNv3ptxNDtAijUdC8C3OOElB/HZarS', NULL, NULL, 'client', 'galya', NULL, '2015-12-20 09:29:52', '2015-12-20 09:29:52'),
(307, 'galya@mqplaasasaanet2.com', '$2y$10$Gf4XTLAMJi5kXkkIebEmhuwgnXpLiAX7EmitkN4eh3SZQXmdr2tpy', NULL, NULL, 'client', 'asasasa', NULL, '2015-12-20 09:30:39', '2015-12-20 09:30:39'),
(308, 'galya@mqplaasaasasaanet2.com', '$2y$10$Z.Xh8hFXApQOp0OelDl6LOSEAwIiXdRuZ0lsL027XKcpyqjcaqV5W', NULL, NULL, 'client', 'asasasa', NULL, '2015-12-20 09:31:28', '2015-12-20 09:31:28'),
(309, 'galya@mqpladsafdsasaasasaanet2.com', '$2y$10$vVqIYwoypckCUD44UzDJ2.QwYROZ6z0Yz2iCYLHLrBwhOU1tGRsr6', NULL, NULL, 'client', 'asasasa', NULL, '2015-12-20 09:32:02', '2015-12-20 09:32:02'),
(310, 'galya@mqpladsadassafdsasaasasaanet2.com', '$2y$10$i6i.sB31oiCyapnKTLsDJuLaedPuTO5Qm.H3/Cwv7HQk0tt6Yq.Wa', NULL, NULL, 'client', 'asasasa', NULL, '2015-12-20 09:32:24', '2015-12-20 09:32:24'),
(311, 'galya@mqpladasasaanet2.com', '$2y$10$bRAczZEOAg5KKHP0NVgzfuPoqqnCurFl8RO0fZjPgCq5eh0LvKDZm', NULL, NULL, 'client', 'asasasa', NULL, '2015-12-20 09:33:22', '2015-12-20 09:33:22'),
(312, 'galya@mqasasasplanet.com', '$2y$10$FUqXVhwOweuOjH0cx09/kuvqxfR1Du0exOvecYOqpxmMijnNJuw5a', NULL, NULL, 'admin', 'sasasas', NULL, '2015-12-20 09:33:58', '2015-12-20 09:33:58'),
(313, 'galya@mqplanet2.com', '$2y$10$ZclUip/HLrg7KyplTEe.SuqPpRU787wvINjCllRmBw6xp2nRQg1Zu', NULL, NULL, 'client1', 'dsa', NULL, '2015-12-20 09:41:38', '2015-12-20 09:41:38'),
(314, '946337135452354@facebook', '$2y$10$f/XB9ysaSxMUnBYm9H6nV./F7pESMX1GLeqtz7cE0huu1uQefEvIC', NULL, '2016-02-17 07:57:05', 'Taylor', 'Successor', NULL, '2015-12-23 11:45:34', '2016-02-17 07:57:05'),
(315, 'taylorsuccessor@gmail.com', '$2y$10$1CJWitnUXBB0MQaqO2hPP.COmPPegUiJ6GfKcjxVVx43AS/gT0LVW', NULL, '2016-02-02 04:19:52', 'taylor', 'successor', NULL, '2016-02-02 04:19:52', '2016-02-02 04:19:52'),
(316, 'taylorsuccessor1@gmail.com', '$2y$10$uRc8k6FWfu0bgVYDAsem1OFhYrZsw.gXcnYFxfnBD13tBdHzCNxdu', NULL, '2016-02-02 04:26:29', 'taylor', 'successor', NULL, '2016-02-02 04:26:28', '2016-02-02 04:26:29'),
(317, 'gdsfgsd@fdg.fghfg', '$2y$10$exsittgDaXDOH8iei.im7.Z2LxdKwoF3wVyIn8q7zxiIuhmAQVKwK', NULL, '2016-02-02 04:29:53', 'gsdfg', 'sdfgsdf', NULL, '2016-02-02 04:29:52', '2016-02-02 04:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=199 ;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `users_id`, `nickname`, `address`, `birthday`, `phone`, `country`, `city`, `zip_code`, `gender`) VALUES
(183, 240, 'sdfgvs', 'fsdgf', '1997-12-07', 'fdsf', 'af', 'fdsgf', 'fdgsdf', 0),
(184, 241, 'srgtr', 'gsdf', '2015-12-02', ' fsdgdf', 'af', 'dsfg', ' sdfgdf', 0),
(185, 241, NULL, NULL, '0000-00-00', ' ', ' ', ' ', ' ', 0),
(186, 301, 'aszc', 'Amman-jordan', '1997-12-15', '0786486103', 'af', 'sdaf', '321', 0),
(187, 302, 'aszc', 'asax', '1997-12-20', '0786486103', 'af', 'sdaf', 'asd', 0),
(188, 303, 'aszc', 'Amman-jordan', '1997-12-20', 'sasasa', 'af', 'Amman', 'asa', 0),
(189, 304, 'aszc', 'aa', '1997-12-20', 'asdsa', 'af', 'Amman', 'asa', 0),
(190, 305, 'ww', 'asax', '1997-12-20', '00962790733627', 'af', 'sdaf', 'aa', 0),
(191, 310, 'saasasa', 'asasa', '1997-12-20', 'xcfass', 'af', 'cvxzv', 'xzvcxcv', 0),
(192, 311, 'saasasa', 'asasa', '1997-12-20', 'xcfass', 'af', 'cvxzv', 'xzvcxcv', 0),
(193, 312, 'sasas', 'caasdas', '1997-12-20', 'sadfsd', 'af', 'dsfads', 'dsfadsfds', 0),
(194, 313, 'dd', 'asax', '1997-12-20', 'asdsa', 'af', 'sdaf', 'asd', 0),
(195, 314, NULL, NULL, '0000-00-00', ' ', ' ', ' ', ' ', 0),
(196, 315, 'taylorsuccessor', 'amman jordan', '1998-02-02', '345465', 'af', 'fghfd', 'fdhg', 0),
(197, 316, 'taylorsuccessor', 'amman jordan', '1998-02-02', '345345345', 'af', 'amman', '11821', 0),
(198, 317, 'dfsgdsf', 'gsdfgsdfg', '1998-02-02', 'sdfsdf', 'af', 'gsdfg', 'dfgsg', 0);

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
  ADD CONSTRAINT `cms_customhtml_languages_cms_customhtml_id_foreign` FOREIGN KEY (`cms_customHtml_id`) REFERENCES `cms_customhtml` (`id`) ON DELETE CASCADE,
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
