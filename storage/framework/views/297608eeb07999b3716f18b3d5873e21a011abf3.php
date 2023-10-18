<?php
    $logo=\App\Models\Utility::get_file('uploads/logo/');
     $company_logo = \App\Models\Utility::GetLogo();

     $setting = App\Models\Utility::colorset();
     if ($setting['color']) {
         $color = $setting['color'];
     }
     else{
         $color = 'theme-3';
     }
?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Viraz | Homepage</title>
    <!-- Stylesheets -->
    <link href="<?php echo e(asset('public/new/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/new/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/new/css/responsive.css')); ?>" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo e(asset('public/new/images/favicon.png')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('public/new/images/favicon.png')); ?>" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body class="<?php echo e($color); ?>">

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header">

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">

                    <div class="pull-left logo-box">
                        <div class="logo"><a href="<?php echo e(url('/')); ?>">
                                <img style="width: 105px;" src="<?php echo e($logo.(isset($logo_light) && !empty($logo_light)?$logo_light:'logo-light.png')); ?>" alt="" title="">
                            </a>
                        </div>
                    </div>

                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon icons-menu-button"></span></div>
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse scroll-nav clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="current dropdown"><a href="#home-banner">Home</a>
                                        <ul>
                                            <li><a href="<?php echo e(url('/')); ?>">Home Page 01</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>">Home Page 02</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>">Home Page 03</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#featured">Features</a></li>
                                    <li><a href="#how-works">How it works</a></li>
                                    <li><a href="#pricing">Pricing</a></li>
                                    <li class="dropdown"><a href="#blog">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Our Blog</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#contact">Contact us</a></li>
                                </ul>
                            </div>

                        </nav>

                        <div class="outer-box">
                            <a href="<?php echo e(url('/login')); ?>" class="theme-btn btn-style-one"><span class="txt">Sign in</span></a>
                        </div>
                         <div class="outer-box">
                            <a href="<?php echo e(url('/register')); ?>" class="theme-btn btn-style-one"><span class="txt">Sign up</span></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon icons-multiply"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="<?php echo e(url('/')); ?>"><img style="width: 105px;" src="<?php echo e($logo.(isset($logo_light) && !empty($logo_light)?$logo_light:'logo-light.png')); ?>" alt="" title=""></a></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!--End Main Header -->

    <!--Banner Section-->
    <section class="banner-section" id="home-banner">
        <div class="patern-layer-one" style="background-image: url(<?php echo e(asset('public/new/images/background/banner-bg.png')); ?>)"></div>
        <div class="bg-layer" style="background-image: url(<?php echo e(asset('public/new/images/background/2.jpg')); ?>)"></div>
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h1>Get connect to other. <br> Just ask Topapp</h1>
                        <div class="text">Access to opportunities for career advancement and <br> professional growth
                            relies heavily on connections.
                        </div>
                        <div class="newsletter-form">
                            <form method="post" action="https://html.themexriver.com/topapp/contact.html">
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="Enter mail address"
                                           required="">
                                    <button type="submit" class="theme-btn btn-style-two"><span class="txt">Take free trial</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="address">*We will give a trial download link to your mail address</div>
                        <!--Video Box-->
                        <div class="video-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <figure class="video-image">
                                <img src="<?php echo e(asset('public/new/images/resource/video.jpg')); ?>" alt="">
                            </figure>
                            <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                               class="lightbox-image overlay-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
                        </div>
                    </div>
                </div>

                <!-- Carousel Column -->
                <div class="carousel-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <div class="slider-outer">

                            <!-- Custom Pager -->
                            <div class="pager-box">
                                <div class="inner-box">
                                    <div class="banner-pager clearfix" id="banner-pager">
                                        <a class="pager one wow zoomIn" data-wow-delay="100ms"
                                           data-wow-duration="1500ms" data-slide-index="0" href="#">
                                            <div class="image img-circle">1</div>
                                        </a>
                                        <a class="pager two wow zoomIn" data-wow-delay="200ms"
                                           data-wow-duration="1500ms" data-slide-index="1" href="#">
                                            <div class="image img-circle">2</div>
                                        </a>
                                        <a class="pager three wow zoomIn" data-wow-delay="300ms"
                                           data-wow-duration="1500ms" data-slide-index="2" href="#">
                                            <div class="image img-circle">3</div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Column / Slides -->
                            <div class="slides-box" style="background-image: url(<?php echo e(asset('public/new/images/resource/mobile.png')); ?>)">
                                <div class="inner-box">

                                    <div class="banner-slider">

                                        <div class="slide-item">
                                            <div class="image">
                                                <img src="<?php echo e(asset('public/new/images/resource/search.png')); ?>" alt=""/>
                                            </div>
                                        </div>

                                        <div class="slide-item">
                                            <div class="image">
                                                <img src="<?php echo e(asset('public/new/images/resource/screenshot01.png')); ?>" alt=""/>
                                            </div>
                                        </div>

                                        <div class="slide-item">
                                            <div class="image">
                                                <img src="<?php echo e(asset('public/new/images/resource/slider-05.png')); ?>" alt=""/>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="mobile-small-image">
                                    <img src="<?php echo e(asset('public/new/images/resource/play.png')); ?>" alt=""/>
                                </div>

                                <div class="heart-image-icon">
                                    <img src="<?php echo e(asset('public/new/images/icons/heart.png')); ?>" alt=""/>
                                </div>

                                <div class="plus-small-image">
                                    <img src="<?php echo e(asset('public/new/images/icons/plus.png')); ?>" alt=""/>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Banner Section-->

    <!-- Featured Section -->
    <section class="featured-section" id="featured">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-5 col-md-12 col-sm-12">
                    <div class="iner-column">
                        <div class="sec-title">
                            <div class="title"><span>Fe</span>atures</div>
                            <h2>Learn the features of new Beautiful <span>lifest</span>y<span>le</span> app!</h2>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum
                                has been the industry's stan dard dummy text ever since the 1500s.</p>
                            <p>The passage is attributed to an unknown typesetter in the 15th century who is thought to
                                have scrambled parts.</p>
                        </div>
                        <ul class="list-style-one">
                            <li>Identfy the most trending sessions & exibitors.</li>
                            <li>24 hours customer supports facilites.</li>
                            <li>Take action to improve your event value.</li>
                        </ul>
                        <a href="contact.html" class="theme-btn btn-style-three"><span class="txt">Contact Us</span></a>
                    </div>
                </div>

                <!-- Blocks Column -->
                <div class="blocks-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Cloud Icon -->
                        <div class="cloud-icon">
                            <img src="<?php echo e(asset('public/new/images/icons/cloud-icon.png')); ?>" alt=""/>
                        </div>
                        <div class="row clearfix">

                            <!-- Featured Block -->
                            <div class="featured-block titlt col-lg-6 col-md-6 col-sm-12" data-tilt data-tilt-max="8">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-writing"></span>
                                    </div>
                                    <h3>Easy to edit</h3>
                                    <div class="text">Save time and edit like a pro! Yes! you will be able to edit your
                                        application on the easy way.
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Block -->
                            <div class="featured-block titlt style-two col-lg-6 col-md-6 col-sm-12" data-tilt
                                 data-tilt-max="6">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-protection-shield-with-a-check-mark"></span>
                                    </div>
                                    <h3>Full protection</h3>
                                    <div class="text">The app needs to be running in the background, as it tracks BLE
                                        regions.
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Block -->
                            <div class="featured-block titlt style-three col-lg-6 col-md-6 col-sm-12" data-tilt
                                 data-tilt-max="10">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-dashboard"></span>
                                    </div>
                                    <h3>Hi speedy app</h3>
                                    <div class="text">Speedy App provides instant information on thousands of hire and
                                        buy products.
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Block -->
                            <div class="featured-block style-four col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-writing"></span>
                                    </div>
                                    <h3>Easy to edit</h3>
                                    <div class="text">Save time and edit like a pro! Yes! you will be able to edit your
                                        application on the easy way.
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Side Image -->
                        <div class="side-image">
                            <img src="<?php echo e(asset('public/new/images/resource/girl-icon.png')); ?>" alt=""/>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Featured Section -->

    <!-- Steps Section -->
    <section class="steps-section">
        <div class="patern-layer-one" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-2.png')); ?>)"></div>
        <div class="patern-layer-two" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-3.png')); ?>)"></div>
        <div class="patern-layer-three" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-4.png')); ?>)"></div>
        <div class="auto-container">

            <!-- Carousel Wrapper -->
            <div id="steps-thumb" class="carousel slide carousel-thumbnails" data-ride="carousel">
                <div class="row clearfix">

                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                        <!-- Slides -->
                        <div class="carousel-inner" role="listbox"
                             style="background-image: url(<?php echo e(asset('public/new/images/resource/mobile.png')); ?>)">
                            <div class="slides">

                                <div class="carousel-item active">
                                    <div class="content">
                                        <div class="image">
                                            <a href="<?php echo e(asset('public/new/images/resource/mokeup-1.jpg')); ?>" data-fancybox="steps" data-caption=""
                                               class="image-link lightbox-image"><img src="<?php echo e(asset('public/new/images/resource/mokeup-1.jpg')); ?>"
                                                                                      alt=""/></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="content">
                                        <div class="image">
                                            <a href="<?php echo e(asset('public/new/images/resource/mokeup-2.jpg')); ?>" data-fancybox="steps" data-caption=""
                                               class="image-link lightbox-image"><img src="<?php echo e(asset('public/new/images/resource/mokeup-2.jpg')); ?>"
                                                                                      alt=""/></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="content">
                                        <div class="image">
                                            <a href="<?php echo e(asset('public/new/images/resource/mokeup-3.jpg')); ?>" data-fancybox="steps" data-caption=""
                                               class="image-link lightbox-image"><img src="<?php echo e(asset('public/new/images/resource/mokeup-3.jpg')); ?>"
                                                                                      alt=""/></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="blocks-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <!-- Sec Title -->
                            <div class="sec-title style-two">
                                <div class="title"><span>St</span>eps</div>
                                <h2>We have some <span> eas</span>y <span>ste</span>p<span>s</span>! </h2>
                            </div>

                            <!-- Controls-->
                            <ul class="carousel-indicators">

                                <li data-target="#steps-thumb" data-slide-to="0" class="tab-btn active wow"
                                    data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <span class="number">1</span>
                                    <span class="icon"><i class="flaticon-logout"></i></span>
                                    <strong>Download as a free trial!</strong>
                                    Lorem Ipsum is simply dummy text of the printing setting industry. Lorem Ipsum has
                                    been industry's dard dummy text ever since the 1500s.
                                </li>

                                <li data-target="#steps-thumb" data-slide-to="1" class="tab-btn wow"
                                    data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <span class="number">2</span>
                                    <span class="icon"><i class="flaticon-credit-card"></i></span>
                                    <strong>Login your account</strong>
                                    Lorem Ipsum is simply dummy text of the printing setting industry. Lorem Ipsum has
                                    been industry's dard dummy text ever since the 1500s.
                                </li>

                                <li data-target="#steps-thumb" data-slide-to="2" class="tab-btn wow"
                                    data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <span class="number">3</span>
                                    <span class="icon"><i class="flaticon-gift"></i></span>
                                    <strong>Enjoy the app!</strong>
                                    Lorem Ipsum is simply dummy text of the printing setting industry. Lorem Ipsum has
                                    been industry's dard dummy text ever since the 1500s.
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Steps Section -->

    <!-- Apps Section -->
    <section class="apps-section" id="how-works">
        <div class="auto-container">

            <div class="ct-dot-animated">
                <div class="ct-dot-container">
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- App Block -->
            <div class="app-block">
                <div class="inner-box">
                    <div class="row clearfix">

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image titlt" data-tilt data-tilt-max="8">
                                    <a href="<?php echo e(asset('public/new/images/resource/app-1.png')); ?>" class="app-1 lightbox-image"><img
                                            src="<?php echo e(asset('public/new/images/resource/dash-board.png')); ?>" alt=""/></a>
                                </div>
                            </div>
                        </div>

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="icon-box">
                                    <span class="icon flaticon-settings"></span>
                                </div>
                                <h3>Easy to Manage Your All Data by This App!</h3>
                                <div class="text">Lorem Ipsum is simply dummy text of the printing and type setting
                                    industry. Lorem Ipsum has been the industry.
                                </div>
                                <a href="#" class="theme-btn btn-style-two"><span class="txt">Contact team</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End App Block -->

            <!-- App Block -->
            <div class="app-block style-two">
                <div class="inner-box">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="icon-box">
                                    <span class="icon flaticon-dashboard"></span>
                                </div>
                                <h3>Bug free responsive app with high performence speed!</h3>
                                <div class="text">Lorem Ipsum is simply dummy text of the printing and type setting
                                    industry. Lorem Ipsum has been the industry.
                                </div>
                                <a href="#" class="theme-btn btn-style-four"><span class="txt">Read more</span></a>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image titlt" data-tilt data-tilt-max="8">
                                    <a href="<?php echo e(asset('public/new/images/resource/app-2.png')); ?>" class="app-2 lightbox-image"><img
                                            src="<?php echo e(asset('public/new/images/resource/app-2.png')); ?>" alt=""/></a>
                                </div>
                                <div class="small-image titlt wow slideInRight" data-wow-delay="300ms"
                                     data-wow-duration="1500ms" data-tilt data-tilt-max="15">
                                    <a href="<?php echo e(asset('public/new/images/resource/app-3.png')); ?>" class="app-2 lightbox-image"><img
                                            src="<?php echo e(asset('public/new/images/resource/app-3.png')); ?>" alt=""/></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End App Block -->

        </div>
    </section>
    <!-- End Apps Section -->

    <!-- Counter Section -->
    <section class="counter-section">
        <div class="patern-layer-one" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-5.png')); ?>)"></div>
        <div class="patern-layer-two" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-6.png')); ?>)"></div>
        <div class="patern-layer-three" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-7.png')); ?>)"></div>
        <div class="patern-layer-four" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-8.png')); ?>)"></div>
        <!-- Flower Image -->
        <div class="flower-image">
            <!-- Image One -->
            <div class="image paroller" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
                 data-paroller-type="foreground" data-paroller-direction="horizontal"
                 style="background-image:url(<?php echo e(asset('public/new/images/resource/flower.png')); ?>)"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title style-three">
                            <div class="title"><span>Fu</span>nfacts</div>
                            <h2>We have a g<span>reat funfact</span> which <br> we want to show you!</h2>
                        </div>
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and type setting industry.
                            Lorem Ipsum has been the industry's stan dard dummy text ever since the 1500s.
                        </div>
                        <div class="download">Download a trial version to make life easy!</div>
                        <div class="google-btns">
                            <a href="#"><img src="<?php echo e(asset('public/new/images/icons/google.png')); ?>" alt=""/></a>
                            <a href="#"><img src="<?php echo e(asset('public/new/images/icons/app.png')); ?>" alt=""/></a>
                        </div>
                    </div>
                </div>

                <!-- Counter Column -->
                <div class="counter-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <!-- Fact Counter -->
                        <div class="fact-counter">
                            <div class="row clearfix">

                                <!--Column-->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon-box">
                                                <span class="icon flaticon-user"></span>
                                            </div>
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="2500" data-stop="1200">0</span>+
                                            </div>
                                            <h5 class="counter-title">Satisfied Clients</h5>
                                        </div>
                                    </div>
                                </div>

                                <!--Column-->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon-box">
                                                <span class="icon flaticon-cube"></span>
                                            </div>
                                            <div class="count-outer count-box alternate">
                                                <span class="count-text" data-speed="3000" data-stop="850">0</span>+
                                            </div>
                                            <h5 class="counter-title">Agents Team</h5>
                                        </div>
                                    </div>
                                </div>

                                <!--Column-->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon-box">
                                                <span class="icon flaticon-followers"></span>
                                            </div>
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="3000" data-stop="154">0</span>+
                                            </div>
                                            <h5 class="counter-title">Success Mission</h5>
                                        </div>
                                    </div>
                                </div>

                                <!--Column-->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon-box">
                                                <span class="icon flaticon-heart"></span>
                                            </div>
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="2500" data-stop="1360">0</span>+
                                            </div>
                                            <h5 class="counter-title">Awards</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Counter Section -->

    <!-- Testimonials Section -->
    <section class="testimonials-thumbs-carousel">
        <div class="auto-container">

            <!-- Carousel Wrapper -->
            <div id="carousel-thumb" class="carousel slide carousel-thumbnails" data-ride="carousel">
                <div class="row clearfix">

                    <div class="pagers-column col-lg-6 col-md-12 col-sm-12">
                        <div class="pattern-layer" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-9.png')); ?>)"></div>
                        <!-- Controls-->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                                <div class="image img-circle"><img src="<?php echo e(asset('public/new/images/resource/author-thumb-1.jpg')); ?>" alt="">
                                </div>
                            </li>
                            <li data-target="#carousel-thumb" data-slide-to="1">
                                <div class="image img-circle"><img src="<?php echo e(asset('public/new/images/resource/author-thumb-2.jpg')); ?>" alt="">
                                </div>
                            </li>
                            <li data-target="#carousel-thumb" data-slide-to="2">
                                <div class="image img-circle"><img src="<?php echo e(asset('public/new/images/resource/author-thumb-3.jpg')); ?>" alt="">
                                </div>
                            </li>
                            <li data-target="#carousel-thumb" data-slide-to="3">
                                <div class="image img-circle"><img src="<?php echo e(asset('public/new/images/resource/author-thumb-4.jpg')); ?>" alt="">
                                </div>
                            </li>
                            <li data-target="#carousel-thumb" data-slide-to="4">
                                <div class="image img-circle"><img src="<?php echo e(asset('public/new/images/resource/author-thumb-5.jpg')); ?>" alt="">
                                </div>
                            </li>
                            <li data-target="#carousel-thumb" data-slide-to="5">
                                <div class="image img-circle"><img src="<?php echo e(asset('public/new/images/resource/author-thumb-6.jpg')); ?>" alt="">
                                </div>
                            </li>
                            <li data-target="#carousel-thumb" data-slide-to="6">
                                <div class="image img-circle"><img src="<?php echo e(asset('public/new/images/resource/author-thumb-7.jpg')); ?>" alt="">
                                </div>
                            </li>
                        </ol>
                    </div>

                    <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                        <div class="sec-title style-four">
                            <div class="title"><span>Te</span>stimonials</div>
                            <h2>Clients choice us because our app<span>lication is the best!</span></h2>
                        </div>
                        <!-- Slides -->
                        <div class="carousel-inner" role="listbox">

                            <div class="carousel-item active">
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <span class="social-icon fa fa-facebook-square"></span>
                                            <img src="<?php echo e(asset('public/new/images/resource/author-thumb-1.jpg')); ?>" alt=""/>
                                        </div>
                                        <div class="quote-icon icons-right-quote-sign"></div>
                                        <div class="slide-text">“ Lorem Ipsum is simply dummy text of the printing and
                                            type <br> setting industry. Lorem Ipsum has been the industry's stan <br>
                                            dard dummy text ever since. ”
                                        </div>
                                        <div class="slide-info">
                                            <h4 class="author-title">Kathleen Smith</h4>
                                            <div class="designation">Senior Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <span class="social-icon fa fa-facebook-square"></span>
                                            <img src="<?php echo e(asset('public/new/images/resource/author-thumb-2.jpg')); ?>" alt=""/>
                                        </div>
                                        <div class="quote-icon icons-right-quote-sign"></div>
                                        <div class="slide-text">“ Lorem Ipsum is simply dummy text of the printing and
                                            type <br> setting industry. Lorem Ipsum has been the industry's stan <br>
                                            dard dummy text ever since. ”
                                        </div>
                                        <div class="slide-info">
                                            <h4 class="author-title">Kathleen Smith</h4>
                                            <div class="designation">Senior Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <span class="social-icon fa fa-facebook-square"></span>
                                            <img src="<?php echo e(asset('public/new/images/resource/author-thumb-3.jpg')); ?>" alt=""/>
                                        </div>
                                        <div class="quote-icon icons-right-quote-sign"></div>
                                        <div class="slide-text">“ Lorem Ipsum is simply dummy text of the printing and
                                            type <br> setting industry. Lorem Ipsum has been the industry's stan <br>
                                            dard dummy text ever since. ”
                                        </div>
                                        <div class="slide-info">
                                            <h4 class="author-title">Kathleen Smith</h4>
                                            <div class="designation">Senior Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <span class="social-icon fa fa-facebook-square"></span>
                                            <img src="<?php echo e(asset('public/new/images/resource/author-thumb-4.jpg')); ?>" alt=""/>
                                        </div>
                                        <div class="quote-icon icons-right-quote-sign"></div>
                                        <div class="slide-text">“ Lorem Ipsum is simply dummy text of the printing and
                                            type <br> setting industry. Lorem Ipsum has been the industry's stan <br>
                                            dard dummy text ever since. ”
                                        </div>
                                        <div class="slide-info">
                                            <h4 class="author-title">Kathleen Smith</h4>
                                            <div class="designation">Senior Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <span class="social-icon fa fa-facebook-square"></span>
                                            <img src="<?php echo e(asset('public/new/images/resource/author-thumb-5.jpg')); ?>" alt=""/>
                                        </div>
                                        <div class="quote-icon icons-right-quote-sign"></div>
                                        <div class="slide-text">“ Lorem Ipsum is simply dummy text of the printing and
                                            type <br> setting industry. Lorem Ipsum has been the industry's stan <br>
                                            dard dummy text ever since. ”
                                        </div>
                                        <div class="slide-info">
                                            <h4 class="author-title">Kathleen Smith</h4>
                                            <div class="designation">Senior Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <span class="social-icon fa fa-facebook-square"></span>
                                            <img src="<?php echo e(asset('public/new/images/resource/author-thumb-6.jpg')); ?>" alt=""/>
                                        </div>
                                        <div class="quote-icon icons-right-quote-sign"></div>
                                        <div class="slide-text">“ Lorem Ipsum is simply dummy text of the printing and
                                            type <br> setting industry. Lorem Ipsum has been the industry's stan <br>
                                            dard dummy text ever since. ”
                                        </div>
                                        <div class="slide-info">
                                            <h4 class="author-title">Kathleen Smith</h4>
                                            <div class="designation">Senior Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <span class="social-icon fa fa-facebook-square"></span>
                                            <img src="<?php echo e(asset('public/new/images/resource/author-thumb-7.jpg')); ?>" alt=""/>
                                        </div>
                                        <div class="quote-icon icons-right-quote-sign"></div>
                                        <div class="slide-text">“ Lorem Ipsum is simply dummy text of the printing and
                                            type <br> setting industry. Lorem Ipsum has been the industry's stan <br>
                                            dard dummy text ever since. ”
                                        </div>
                                        <div class="slide-info">
                                            <h4 class="author-title">Kathleen Smith</h4>
                                            <div class="designation">Senior Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Slides -->

                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- Screenshots Section -->
    <section class="screenshots-section">
        <div class="auto-container">
            <div class="sec-title centered style-two">
                <div class="title"><span>Ap</span>p Screenshots</div>
                <h2>App screenshots will be <span>im</span>p<span>ortant</span> <br> to know properly the app! lifestyle
                    app!</h2>
            </div>

            <div class="row appScreenshotCarousel-container swiper-container">
                <div class="screen-mobile-image"></div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-01.jpg')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-02.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-03.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-04.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-05.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-02.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-01.jpg')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-02.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-03.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-04.png')); ?>)"></div>
                    <div class="swiper-slide" style="background-image:url(<?php echo e(asset('public/new/images/resource/slider-05.png')); ?>)"></div>
                </div>
                <!-- Add Arrows -->
            </div>
            <!-- Navigations -->
            <div class="banner-navigation">
                <div class="swiper-button-prev"><span class="icons-left-arrow-1"></span></div>
                <div class="swiper-button-next"><span class="icons-right-arrow-1"></span></div>
            </div>
        </div>
    </section>
    <!-- End Screenshots Section -->

    <!-- Integration Section -->
    <section class="integration-section">
        <div class="patern-layer-one" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-5.png')); ?>)"></div>
        <div class="patern-layer-two" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-6.png')); ?>)"></div>
        <div class="patern-layer-three" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-10.png')); ?>)"></div>
        <div class="patern-layer-four" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-11.png')); ?>)"></div>
        <div class="auto-container">
            <div class="sec-title centered">
                <div class="title"><span>In</span>tegrations</div>
                <h2>We use some plugins to do premium <br> quality <span>inte</span>g<span>rations</span></h2>
            </div>
        </div>

        <!-- Outer Container -->
        <div class="outer-container">

            <div class="bubbles-wrapper">
                <div class="animations m-0">
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-1.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">HTML-5</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xxl">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-2.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Envato</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-lg">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-3.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Elementor</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xl">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-4.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Fingerprint</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-5.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Amplify</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-lg">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-6.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Firebase Integration</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-7.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Google-Plus</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xl">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-8.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Jio Tv</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-lg">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-9.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Paypal</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xxl">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-10.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Stripe</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-11.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Goola Map</span>
                    </div>
                    <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xl">
                        <img src="<?php echo e(asset('public/new/images/resource/Integrations-12.jpg')); ?>" alt="" class="img-responsive">
                        <span class="badge badge-contrast shadow-box">Microsoft</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="btn-box text-center">
            <a href="#" class="theme-btn btn-style-five"><span class="txt">All Integretions</span></a>
        </div>

    </section>
    <!-- End Integration Section -->

    <!-- Pricing Section -->
    <section class="pricing-section" id="pricing">
        <div class="auto-container">
            <div class="sec-title centered style-three">
                <div class="title"><span>pr</span>icing</div>
                <h2>We have offered the <span>best </span>p<span>ricing</span> <br> to make life easier!</h2>
            </div>

            <div class="pricing-tabs tabs-box">

                <!-- Title Column -->
                <div class="title-column">

                    <!-- Tab Btns -->
                    <ul class="tab-buttons clearfix">
                        <li data-tab="#prod-monthly" class="tab-btn monthly active-btn">Monthly</li>
                        <li class="boll"><span class="round"></span></li>
                        <li data-tab="#prod-yearly" class="tab-btn yearly">Yearly</li>
                    </ul>

                </div>

                <!--Tabs Container-->
                <div class="tabs-content">

                    <div class="patern-layer-three paroller" data-paroller-factor="0.30" data-paroller-factor-lg="0.60"
                         data-paroller-type="foreground" data-paroller-direction="horizontal"
                         style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-19.png')); ?>)"></div>
                    <div class="patern-layer-four paroller" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
                         data-paroller-type="foreground" data-paroller-direction="horizontal"
                         style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-20.png')); ?>)"></div>

                    <!--Tab-->
                    <div class="tab active-tab" id="prod-monthly">
                        <div class="content">
                            <div class="row clearfix">

                                <!-- Price Block -->
                                <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="patern-layer-two"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-18.png')); ?>)"></div>
                                        <div class="patern-layer-one"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-17.png')); ?>)"></div>
                                        <div class="upper-box">
                                            <div class="icon-box">
                                                <span class="icon flaticon-paper-plane"></span>
                                            </div>
                                            <div class="title">Premeum</div>
                                            <h3>$39.99</h3>
                                        </div>
                                        <div class="middle-box">
                                            <div class="price-title">unLimited access</div>
                                            <ul class="price-list">
                                                <li><i class="fa fa-remove"></i>100 MB Disk Space</li>
                                                <li><i class="fa fa-check"></i>2 Subdo mains dolor</li>
                                                <li><i class="fa fa-remove"></i>5 Email Accounts</li>
                                                <li><i class="fa fa-remove"></i>No License</li>
                                                <li><i class="fa fa-check"></i>Phone & Mail Support</li>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <a href="#" class="theme-btn plan-btn">choose plan</a>
                                            <a href="#" class="trial">Get a free trial now!</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Block -->
                                <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="patern-layer-two"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-18.png')); ?>)"></div>
                                        <div class="patern-layer-one"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-17.png')); ?>)"></div>
                                        <div class="upper-box">
                                            <div class="icon-box">
                                                <span class="icon flaticon-plane"></span>
                                            </div>
                                            <div class="title">Standrad</div>
                                            <h3>$59.99</h3>
                                        </div>
                                        <div class="middle-box">
                                            <div class="price-title">Limited access</div>
                                            <ul class="price-list">
                                                <li><i class="fa fa-remove"></i>100 MB Disk Space</li>
                                                <li><i class="fa fa-check"></i>2 Subdo mains dolor</li>
                                                <li><i class="fa fa-remove"></i>5 Email Accounts</li>
                                                <li><i class="fa fa-remove"></i>No License</li>
                                                <li><i class="fa fa-check"></i>Phone & Mail Support</li>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <a href="#" class="theme-btn plan-btn">choose plan</a>
                                            <a href="#" class="trial">Get a free trial now!</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Block -->
                                <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="patern-layer-two"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-18.png')); ?>)"></div>
                                        <div class="patern-layer-one"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-17.png')); ?>)"></div>
                                        <div class="upper-box">
                                            <div class="icon-box">
                                                <span class="icon icons-rocket-ship"></span>
                                            </div>
                                            <div class="title">Premeum</div>
                                            <h3>$89.99</h3>
                                        </div>
                                        <div class="middle-box">
                                            <div class="price-title">unLimited access</div>
                                            <ul class="price-list">
                                                <li><i class="fa fa-remove"></i>100 MB Disk Space</li>
                                                <li><i class="fa fa-check"></i>2 Subdo mains dolor</li>
                                                <li><i class="fa fa-remove"></i>5 Email Accounts</li>
                                                <li><i class="fa fa-remove"></i>No License</li>
                                                <li><i class="fa fa-check"></i>Phone & Mail Support</li>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <a href="#" class="theme-btn plan-btn">choose plan</a>
                                            <a href="#" class="trial">Get a free trial now!</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Guarantee -->
                            <div class="guarantee"><span class="circle"></span>30 days money back guarantee!</div>

                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab" id="prod-yearly">
                        <div class="content">
                            <div class="row clearfix">

                                <!-- Price Block -->
                                <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="patern-layer-two"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-18.png')); ?>)"></div>
                                        <div class="patern-layer-one"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-17.png')); ?>)"></div>
                                        <div class="upper-box">
                                            <div class="icon-box">
                                                <span class="icon flaticon-paper-plane"></span>
                                            </div>
                                            <div class="title">Premeum</div>
                                            <h3>$99.99</h3>
                                        </div>
                                        <div class="middle-box">
                                            <div class="price-title">unLimited access</div>
                                            <ul class="price-list">
                                                <li><i class="fa fa-remove"></i>100 MB Disk Space</li>
                                                <li><i class="fa fa-check"></i>2 Subdo mains dolor</li>
                                                <li><i class="fa fa-remove"></i>5 Email Accounts</li>
                                                <li><i class="fa fa-remove"></i>No License</li>
                                                <li><i class="fa fa-check"></i>Phone & Mail Support</li>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <a href="#" class="theme-btn plan-btn">choose plan</a>
                                            <a href="#" class="trial">Get a free trial now!</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Block -->
                                <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="patern-layer-two"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-18.png')); ?>)"></div>
                                        <div class="patern-layer-one"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-17.png')); ?>)"></div>
                                        <div class="upper-box">
                                            <div class="icon-box">
                                                <span class="icon flaticon-plane"></span>
                                            </div>
                                            <div class="title">Standrad</div>
                                            <h3>$149.99</h3>
                                        </div>
                                        <div class="middle-box">
                                            <div class="price-title">Limited access</div>
                                            <ul class="price-list">
                                                <li><i class="fa fa-remove"></i>100 MB Disk Space</li>
                                                <li><i class="fa fa-check"></i>2 Subdo mains dolor</li>
                                                <li><i class="fa fa-remove"></i>5 Email Accounts</li>
                                                <li><i class="fa fa-remove"></i>No License</li>
                                                <li><i class="fa fa-check"></i>Phone & Mail Support</li>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <a href="#" class="theme-btn plan-btn">choose plan</a>
                                            <a href="#" class="trial">Get a free trial now!</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Block -->
                                <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="patern-layer-two"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-18.png')); ?>)"></div>
                                        <div class="patern-layer-one"
                                             style="background-image: url(<?php echo e(asset('public/new/images/icons/pattern-17.png')); ?>)"></div>
                                        <div class="upper-box">
                                            <div class="icon-box">
                                                <span class="icon icons-rocket-ship"></span>
                                            </div>
                                            <div class="title">Premeum</div>
                                            <h3>$199.99</h3>
                                        </div>
                                        <div class="middle-box">
                                            <div class="price-title">unLimited access</div>
                                            <ul class="price-list">
                                                <li><i class="fa fa-remove"></i>100 MB Disk Space</li>
                                                <li><i class="fa fa-check"></i>2 Subdo mains dolor</li>
                                                <li><i class="fa fa-remove"></i>5 Email Accounts</li>
                                                <li><i class="fa fa-remove"></i>No License</li>
                                                <li><i class="fa fa-check"></i>Phone & Mail Support</li>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <a href="#" class="theme-btn plan-btn">choose plan</a>
                                            <a href="#" class="trial">Get a free trial now!</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Pricing Section -->

    <!-- Faq Section -->
    <section class="faq-section">
        <div class="auto-container">
            <div class="sec-title centered style-four">
                <div class="title"><span>FA</span>Q</div>
                <h2>Learn about new features from <br> <span>fre</span>q<span>uentl</span>y asked question</h2>
            </div>
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Faq Column -->
                    <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                        <h3>What should I include in App?</h3>
                        <div class="text">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed <a href="#">eiusmod
                                tempor incididunt</a> ut labore.
                        </div>
                    </div>

                    <!-- Faq Column -->
                    <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                        <h3>Can users choose to install the app?</h3>
                        <div class="text">We’re a company built on open source. It all began with Ionic Framework - the
                            world's most popular open source for building cross-platform mobile and Progressive Web
                            Apps.
                        </div>
                    </div>

                    <!-- Faq Column -->
                    <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                        <h3>How does the Moodle app work?</h3>
                        <div class="text">The apps you build with Ionic leverage the power and stability of the open web
                            - the most time-tested universal runtime in the world. The web has been around over two
                            decades.
                        </div>
                    </div>

                    <!-- Faq Column -->
                    <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                        <h3>How do I disable installed apps?</h3>
                        <div class="text">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiusmod tempor
                            incididunt ut labore.
                        </div>
                    </div>

                    <!-- Faq Column -->
                    <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                        <h3>Does disabling apps free up space?</h3>
                        <div class="text">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed <a href="#">eiusmod
                                tempor incididunt</a> ut labore.
                        </div>
                    </div>

                    <!-- Faq Column -->
                    <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                        <h3>Why are mobile apps important?</h3>
                        <div class="text">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do <a href="#">eiusmod
                                tempor incididunt</a> ut labore.
                        </div>
                    </div>

                </div>
                <!-- Question -->
                <div class="question">Still have a question? <a href="#">Contact us:</a>
                    <strong>topapp@info.com</strong></div>

            </div>
        </div>
    </section>
    <!-- End Faq Section -->

    <!-- Blog Section -->
    <section class="blog-section" id="blog">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title style-two">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="title"><span>Bl</span>og</div>
                        <h2>We want to <span>share our</span> succes <br> by our latest blog.</h2>
                    </div>
                    <div class="pull-right">
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and type <br> setting
                            industry. Lorem Ipsum has been the industry's stan <br> dard dummy text ever since the
                            1500s.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="blog-single.html"><img src="<?php echo e(asset('public/new/images/resource/news-1.png')); ?>" alt=""/></a>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><span class="icon icons-calendar-2"></span>September 12, 2020</li>
                                <li><span class="icon icons-user-4"></span>Admin</li>
                            </ul>
                            <h3><a href="blog-single.html">Organisationaly teams are just like families.</a></h3>
                            <div class="text">Lorem Ipsum is simply dummy text the printing and setting industry. Lorm
                                Ipsum has been the industry's stanard dummy text ever.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="blog-single.html"><img src="<?php echo e(asset('public/new/images/resource/news-2.png')); ?>" alt=""/></a>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><span class="icon icons-calendar-2"></span>September 12, 2020</li>
                                <li><span class="icon icons-user-4"></span>Admin</li>
                            </ul>
                            <h3><a href="blog-single.html">Revitalising your people in a retail downturn...</a></h3>
                            <div class="text">Lorem Ipsum is simply dummy text the printing and setting industry. Lorm
                                Ipsum has been the industry's stanard dummy text ever.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="blog-single.html"><img src="<?php echo e(asset('public/new/images/resource/news-3.png')); ?>" alt=""/></a>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><span class="icon icons-calendar-2"></span>September 12, 2020</li>
                                <li><span class="icon icons-user-4"></span>Admin</li>
                            </ul>
                            <h3><a href="blog-single.html">Regional Managers time management.</a></h3>
                            <div class="text">Lorem Ipsum is simply dummy text the printing and setting industry. Lorm
                                Ipsum has been the industry's stanard dummy text ever.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Blog Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">

            <!-- Ct Dot Animated -->
            <div class="ct-dot-animated">
                <div class="ct-dot-container">
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="sec-title centered">
                <div class="title"><span>Te</span>am member</div>
                <h2>Really we have <span>an ex</span>p<span>ert</span> team <br> to develop many apps!</h2>
            </div>

            <div class="team-carousel owl-carousel owl-theme">

                <!-- Team Block -->
                <div class="team-block">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/resource/team-1.png')); ?>" alt=""/></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>Romeo Poro</h3>
                            <div class="designation">Android Developer</div>
                            <div class="social-boxed">
                                <div class="social-inner">
                                    <span class="share-now fa fa-share-alt"></span>
                                    <a href="#"><span class="fa fa-facebook"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-dribbble"></span></a>
                                    <a href="#"><span class="fa fa-behance"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block style-two">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/resource/team-2.png')); ?>" alt=""/></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>David Roger</h3>
                            <div class="designation">iOS Developer</div>
                            <div class="social-boxed">
                                <div class="social-inner">
                                    <span class="share-now fa fa-share-alt"></span>
                                    <a href="#"><span class="fa fa-facebook"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-dribbble"></span></a>
                                    <a href="#"><span class="fa fa-behance"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block style-three">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/resource/team-3.png')); ?>" alt=""/></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>Jasmin Duke</h3>
                            <div class="designation">App Designer</div>
                            <div class="social-boxed">
                                <div class="social-inner">
                                    <span class="share-now fa fa-share-alt"></span>
                                    <a href="#"><span class="fa fa-facebook"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-dribbble"></span></a>
                                    <a href="#"><span class="fa fa-behance"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/resource/team-1.png')); ?>" alt=""/></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>Romeo Poro</h3>
                            <div class="designation">Android Developer</div>
                            <div class="social-boxed">
                                <div class="social-inner">
                                    <span class="share-now fa fa-share-alt"></span>
                                    <a href="#"><span class="fa fa-facebook"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-dribbble"></span></a>
                                    <a href="#"><span class="fa fa-behance"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block style-two">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/resource/team-2.png')); ?>" alt=""/></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>David Roger</h3>
                            <div class="designation">iOS Developer</div>
                            <div class="social-boxed">
                                <div class="social-inner">
                                    <span class="share-now fa fa-share-alt"></span>
                                    <a href="#"><span class="fa fa-facebook"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-dribbble"></span></a>
                                    <a href="#"><span class="fa fa-behance"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block style-three">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/resource/team-3.png')); ?>" alt=""/></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>Jasmin Duke</h3>
                            <div class="designation">App Designer</div>
                            <div class="social-boxed">
                                <div class="social-inner">
                                    <span class="share-now fa fa-share-alt"></span>
                                    <a href="#"><span class="fa fa-facebook"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-dribbble"></span></a>
                                    <a href="#"><span class="fa fa-behance"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Team Section -->

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="patern-layer-one"
                             style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-12.png')); ?>)"></div>
                        <div class="patern-layer-two"
                             style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-13.png')); ?>)"></div>
                        <div class="patern-layer-three paroller" data-paroller-factor="-0.10"
                             data-paroller-factor-lg="0.08" data-paroller-type="foreground"
                             data-paroller-direction="horizontal"
                             style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-14.png')); ?>)"></div>
                        <ul class="info-list">
                            <li>
                                <span class="icon flaticon-address"></span>
                                <strong>Our head office address:</strong>
                                3556 Hartford Way Vlg, Mount Pleasant, SC, <br> 29466, Australia.
                            </li>
                            <li>
                                <span class="icon flaticon-telephone"></span>
                                <strong>Call for help:</strong>
                                <a href="tel:734-697-2907">(734) 697-2907</a><br>
                                <a href="tel:843-971-1906">(843) 971-1906</a>
                            </li>
                            <li>
                                <span class="icon flaticon-invite"></span>
                                <strong>Mail us:</strong>
                                <a class="mailto:noreply@envato.com" href="#">noreply@envato.com</a><br>
                                <a class="mailto:noreply@envato.com" href="#">noreply@topapp.com</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title style-three">
                            <div class="title"><span>Co</span>ntact</div>
                            <h2>Contact with our support <br> during <span>emer</span>g<span>enc</span>y!</h2>
                        </div>

                        <!-- Default Form -->
                        <div class="default-form">
                            <form method="post" action="https://html.themexriver.com/topapp/sendemail.php"
                                  id="contact-form">
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Full Name *" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="lastname" placeholder="Last Name *" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Your mail *" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="phone" placeholder="Phone number *" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Message..."></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn submit-btn" type="submit" name="submit-form"><span
                                                class="txt"> <i
                                                    class="fa fa-arrow-circle-right"></i> &nbsp; Send now</span>
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="patern-layer-one" style="background-image: url(<?php echo e(asset('public/new/images/background/pattern-15.png')); ?>)"></div>
        <div class="auto-container">
            <div class="sec-title centered style-four">
                <div class="title"><span>Su</span>bscription</div>
                <h2>Always know what’s happening in the <br> world of applications. Recieve all <br> latest p<span>ost in</span>
                    y<span>our inbox.</span></h2>
            </div>

            <div class="subscribe-form">
                <form method="post" action="https://html.themexriver.com/topapp/contact.html">
                    <div class="form-group">
                        <input type="email" name="email" value="" placeholder="your mail address..." required="">
                        <button type="submit" class="theme-btn btn-style-two">Subscrib now</button>
                    </div>
                </form>
            </div>
            <div class="email">* Your mail address will be fully secure . We don’t share!</div>
        </div>
    </section>
    <!-- End Subscribe Section -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget logo-widget">
                            <div class="logo">
                                <a href="<?php echo e(url('/')); ?>"><img style="width: 105px;" src="<?php echo e($logo.(isset($logo_light) && !empty($logo_light)?$logo_light:'logo-light.png')); ?>" alt=""/></a>
                            </div>
                            <div class="text">Lorem Ipsum is simply dummy text <br> of the printing and type.</div>
                            <div class="paypall">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/icons/paypall.png')); ?>" alt=""/></a>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget links-widget">
                            <div class="row clearfix">
                                <div class="column col-lg-6 col-md-6 col-xs-12">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                        <li><a href="#">News</a></li>
                                    </ul>
                                </div>
                                <div class="column col-lg-6 col-md-6 col-xs-12">
                                    <ul>
                                        <li><a href="#">Team</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Portfolio</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget email-widget">
                            <div class="text">Send us a newsletter to get update</div>
                            <!-- Newsletter Form -->
                            <div class="newsletter-form-two">
                                <form method="post" action="https://html.themexriver.com/topapp/contact.html">
                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="Your mail address"
                                               required="">
                                        <button type="submit" class="theme-btn submit-btn"><span
                                                class="icon flaticon-paper-plane"></span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="btns">
                                <a href="#"><img src="<?php echo e(asset('public/new/images/icons/app-1.png')); ?>" alt=""/></a>
                                <a href="#"><img src="<?php echo e(asset('public/new/images/icons/google-1.png')); ?>')}}" alt=""/></a>
                            </div>
                            <ul class="social-icon-one">
                                <li class="facebook"><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li class="dribbble"><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                <li class="behance"><a href="#"><span class="fa fa-behance"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="footer-bottom">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="copyright">&copy; 2023 Viraz</div>
                    </div>
                    <div class="pull-right">
                        <ul class="footer-nav">
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- End Main Footer -->

</div>

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

<script src="<?php echo e(asset('public/new/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/pagenav.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/jquery.scrollTo.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/jquery.fancybox.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/appear.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/jquery.paroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/parallax.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/validate.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/bxslider.js')); ?>"></script>

<script src="<?php echo e(asset('public/new/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/tilt.jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/owl.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/wow.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('public/new/js/script.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/layouts/landing.blade.php ENDPATH**/ ?>