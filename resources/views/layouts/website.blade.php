<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','admin')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('website')}}/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('website')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('website')}}/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/dripicons.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/meanmenu.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/default.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('website')}}/css/responsive.css">
    @stack('css')
</head>

<body>
    <!-- header -->
    <header class="header-area header-three">
        <div class="header-top second-header d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 d-none d-lg-block ">
                        <div class="header-social">
                            <span>
                                Follow us:-
                                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" title="LinkedIn"><i class="fab fa-instagram"></i></a>
                                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" title="Twitter"><i class="fab fa-youtube"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 d-none d-lg-block text-right">
                        <div class="header-cta">
                            <ul>
                                <li>
                                    <div class="call-box">
                                        <div class="icon">
                                            <img src="{{asset('website')}}/img/icon/phone-call.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <span>Call Now !</span>
                                            <strong><a href="tel:+88-02-41070712">+88-02-41070712</a></strong>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="call-box">
                                        <div class="icon">
                                            <img src="{{asset('website')}}/img/icon/mailing.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <span>Email Now</span>
                                            <strong><a
                                                    href="mailto:brightminds252@gmail.com">brightminds252@gmail.com</a></strong>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="header-sticky" class="menu-area">
            <div class="container">
                <div class="second-menu">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{asset('website')}}/img/logo/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9  col-sm-9">

                            <div class="main-menu text-right text-xl-right">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="has-sub">
                                            <a href="{{url('/')}}">Home</a>

                                        </li>
                                        <li class="has-sub">
                                            <a href="#">About</a>
                                            <ul>
                                                <li><a href="{{url('/clubs')}}">Clubs</a></li>
                                                <li><a href="{{url('/videos')}}">Video Gallery</a></li>
                                                <li><a href="{{url('/gallery/photos')}}">Gallery & Photos</a></li>
                                                <li class="has-sub"><a href="{{url('/faculties')}}">Faculties</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-sub">
                                            <a href="{{url('/news')}}">
                                                News & Events
                                            </a>
                                        </li>
                                        <li class="has-sub">
                                            <a href="{{url('/teachers')}}">
                                                Teachers
                                            </a>
                                        </li>
                                        <li class="has-sub">
                                            <a href="{{url('index.html')}}">
                                                Apply Now
                                            </a>
                                        </li>
                                        <li class="has-sub">
                                            <a href="{{url('/contact')}}">
                                                Contact Now
                                            </a>
                                        </li>
                                        <li class="has-sub">
                                            <a href="{{url('/login')}}">
                                                Log In
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('contents')
    <!-- main-area-end -->

    <!-- footer -->
    <footer class="footer-bg footer-p pt-90"
        style="background-color: #125875; background-image: url({{asset('website')}}/img/bg/footer-bg.png);">
        <div class="footer-top pb-70">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>About Us</h2>
                            </div>
                            <div class="f-contact">
                                <p>At the present time the College receives no financial aid from the government of
                                    Bangladesh. It is supported entirely by tuition fees collected from the students.
                                </p>
                            </div>
                            <div class="footer-social mt-10">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>Our Links</h2>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('teachers')}}"> Teacher</a></li>
                                    <li><a href="{{url('/news')}}">News & Events</a></li>
                                    <li><a href="{{url('/faculties')}}">Department</a></li>
                                    <li><a href="{{url('/contact')}}"> Contact</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>Contact Us</h2>
                            </div>
                            <div class="f-contact">
                                <ul>
                                    <li>
                                        <i class="icon fal fa-phone"></i>
                                        <span>
                                            <a href="tel:+88-02-41070712">+88-02-41070712</a><br><a
                                                href="tel:+88-02-41070712">+88-02-41070712</a>
                                        </span>
                                    </li>
                                    <li><i class="icon fal fa-envelope"></i>
                                        <span>
                                            <a href="mailto:brightminds252@gmail.com">brightminds252@gmail.com</a>
                                            <br>
                                            <a href="mailto:help@brightminds.com">help@brightminds.com</a>
                                        </span>
                                    </li>
                                    <li>
                                        <i class="icon fal fa-map-marker-check"></i>
                                        <span>G.P.O.Box No.5 Toyenbee Circular Rd.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="copy-text">
                            <a href="{{url('/')}}"><img src="{{asset('website')}}/img/logo/f_logo.png" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">

                    </div>
                    <div class="col-lg-4 text-right text-xl-right">
                        Copyright &copy; Bright Minds 2023 . All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->

    <!-- JS here -->
    <script src="{{asset('website')}}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{asset('website')}}/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('website')}}/js/popper.min.js"></script>
    <script src="{{asset('website')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('website')}}/js/slick.min.js"></script>
    <script src="{{asset('website')}}/js/ajax-form.js"></script>
    <script src="{{asset('website')}}/js/paroller.js"></script>
    <script src="{{asset('website')}}/js/wow.min.js"></script>
    <script src="{{asset('website')}}/js/js_isotope.pkgd.min.js"></script>
    <script src="{{asset('website')}}/js/imagesloaded.min.js"></script>
    <script src="{{asset('website')}}/js/parallax.min.js"></script>
    <script src="{{asset('website')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('website')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('website')}}/js/jquery.scrollUp.min.js"></script>
    <script src="{{asset('website')}}/js/jquery.meanmenu.min.js"></script>
    <script src="{{asset('website')}}/js/parallax-scroll.js"></script>
    <script src="{{asset('website')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('website')}}/js/element-in-view.js"></script>
    <script src="{{asset('website')}}/js/main.js"></script>
</body>
</html>
