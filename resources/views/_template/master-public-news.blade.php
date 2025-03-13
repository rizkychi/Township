<!doctype html>
<html lang="en">

<head>
    @if (app()->environment('production'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-N6HZCZNGMN"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ env('APP_GTAG') }}');
        </script>
    @endif
    
    <!-- Basic Page Needs =====================================-->
    <meta charset="utf-8">

    <!-- Mobile Specific Metas ================================-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Title- -->
    <title>@yield('page_title') | TKSCI Jogmatis</title>

    <!-- CSS
   ==================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/font-awesome.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/animate.css') }}">

    <!-- IcoFonts -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/icofonts.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/owlcarousel.min.css') }}">

    <!-- slick -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/slick.css') }}">

    <!-- Cropper -->
    <link rel="stylesheet" href="{{ asset('/src/css/cropper.min.css') }}">

    <!-- navigation -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/navigation.css') }}">

    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/magnific-popup.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/style.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/colors/color-13.css') }}">

    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/responsive.css') }}">

    <!-- Viewer -->
    <link rel="stylesheet" href="{{ asset('/src/css/news/viewer.css') }}">

    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('/src/css/custom.css') }}">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .header-middle.v2 {
            background-image: linear-gradient(to right, #99dcf6 50%, #7a89b3 50%);
            /* background-color: '#99dcf6'; */
        }
        #featured-slider-5 .item::before {
            background: rgba(0, 0, 0, 0.1);
        }
        
        .banner-ad {
            position: relative;
            overflow: hidden;
        }
        .banner-ad::after {
            content: 'Iklan';
            position: absolute;
            bottom: 8px;
            right: 8px;
            padding: 0px 6px;
            font-size: 12px;
            color: rgba(0, 0, 0, 0.3);
            pointer-events: none;
            user-select: none;
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>

    @stack('styles')
</head>

<body class="body-color">
	@include('sweetalert::alert')
    <!-- top bar start -->
    <section class="top-bar v4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 align-self-center">
                    <div class="ts-breaking-news clearfix">
                        <h2 class="breaking-title float-left">
                            <i class="fa fa-bolt"></i> Breaking News :
                        </h2>
                        <div class="breaking-news-content float-left" id="breaking_slider1">
							@for ($i = 0; $i < 2; $i++)
								<div class="breaking-post-content mx-1">
									<p>
										<a href="#">Selamat datang di website terbaru dari Toyota Kijang Super Community Indonesia Jogja Mataram Istimewa </a>
									</p>
								</div>
							@endfor
                        </div>
                    </div>
                </div>
                <!-- end col-->

                <div class="col-md-4 align-self-center">
                    <div class="text-right xs-left">
                        <div class="ts-date-item">
                            <i class="fa fa-calendar"></i>
							@php 
								$today = Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
								echo $today;
							@endphp
                        </div>
                    </div>

                </div>
                <!--end col -->


            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- end top bar-->

    <section class="header-middle v2 p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-logo m-0">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('/src/img/header_jogmatis.png') }}" alt="header" class="w-100">
                        </a>
                    </div>
                </div>
                <!-- col end -->
            </div>
            <!-- row  end -->
        </div>
        <!-- container end -->
    </section>

    <!-- header nav start-->
    <header class="header-standerd">
        <div class="container">
            <div class="row">

                <!-- logo end-->
                <div class="col-lg-12">
                    <!--nav top end-->
                    <nav class="navigation ts-main-menu navigation-landscape">
                        <div class="nav-header">
                            <a class="nav-brand mobile-logo visible-xs" href="{{ route('home') }}">
                                <!-- <img src="images/footer_logo.png" alt=""> -->
                            </a>
                            <div class="nav-toggle"></div>
                        </div>
                        <!--nav brand end-->

                        <div class="nav-menus-wrapper clearfix">
                            <!--nav right menu start-->
                            <ul class="right-menu align-to-right">
                                <li>
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-user-circle-o"></i>
                                    </a>
                                </li>
                                <li class="header-search">
                                    <div class="nav-search">
                                        <div class="nav-search-button">
                                            <i class="icon icon-search"></i>
                                        </div>
                                        <form action="{{ route('search') }}">
                                            <span class="nav-search-close-button" tabindex="0">✕</span>
                                            <div class="nav-search-inner">
                                                <input type="search" name="q" placeholder="Ketik dan tekan ENTER">
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            <!--nav right menu end-->

                            <!-- nav menu start-->
                            <ul class="nav-menu">
                                <li class="{{ \Route::is('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                @php 
                                    $tpc = ['Pengumuman', 'Event', 'Berita', 'Artikel'];
                                @endphp
                                @foreach ($tpc as $tp)
                                    @php
                                        $is_active = request()->topic == $tp ? 'active' : '';
                                    @endphp
                                    <li class="{{ $is_active }}">
                                        <a href="{{ route('topic', ['topic' => $tp]) }}">{{ $tp }}</a>
                                    </li>
                                @endforeach
                                <li class="{{ request()->topic == 'Arsip' }}">
                                    <a href="{{ route('topic', ['topic' => 'Arsip']) }}">History</a>
                                </li>
                                <li class="{{ \Route::is('register') ? 'active' : '' }} d-none">
                                    <a href="{{ route('register') }}">Pendaftaran Anggota</a>
                                </li>
                                <li class="{{ \Route::is('catalog') ? 'active' : '' }}">
                                    <a href="{{ route('catalog') }}">Katalog</a>
                                </li>
                                <li class="{{ \Route::is('member') ? 'active' : '' }}">
                                    <a href="{{ route('member') }}">Member</a>
                                </li>
                            </ul>
                            <!--nav menu end-->
                        </div>
                    </nav>
                    <!-- nav end-->
                </div>
            </div>
        </div>
    </header>
    <!-- header nav end-->

    @yield('content')

    <!-- footer social list start-->
    <section class="section-bg">
        <div class="container">
            <div class="row">
                <div class="col-4 align-self-center">
                    <div class="footer-logo">
                        <a href="#">
                            <img src="{{ asset('/src/img/logo_tksci.png') }}" alt="" width="100">
                        </a>
                    </div>
                    <!-- footer logo end-->
                </div>
                <!-- col end-->

                <div class="col-8 align-self-center">
                    <ul class="footer-social d-flex justify-content-end">
                        <li class="ts-facebook m-0">
                            <a href="https://www.facebook.com/groups/tksci.jogja">
                                <i class="fa fa-facebook"></i>
                                <span>Facebook</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <!-- col end-->

            </div>
        </div>
    </section>
    <!-- footer social list end-->

    <!-- footer start -->
    <footer class="ts-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text text-center">
                        <p>&copy; 2023, TKSCI Jogmatis. All rights reserved</p>
                    </div>
                </div><!-- col end -->
            </div><!-- row end -->
            <div id="back-to-top" class="back-to-top">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-up"></i>
                </button>
            </div><!-- Back to top end -->
        </div><!-- Container end-->
    </footer>
    <!-- footer end -->


    <!-- javaScript Files
 =============================================================================-->

    <!-- initialize jQuery Library -->
	<script src="{{ asset('/src/js/news/jquery.min.js') }}"></script>
    <!-- navigation JS -->
    <script src="{{ asset('/src/js/news/navigation.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('/src/js/news/popper.min.js') }}"></script>

    <!-- magnific popup JS -->
    <script src="{{ asset('/src/js/news/jquery.magnific-popup.min.js') }}"></script>

    <!-- Cropper JS -->
    <script src="{{ asset('/src/js/cropper.min.js') }}"></script>  

    <!-- Bootstrap jQuery -->
    <script src="{{ asset('/src/js/news/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('/src/js/news/owl-carousel.2.3.0.min.js') }}"></script>
    <!-- slick -->
    <script src="{{ asset('/src/js/news/slick.min.js') }}"></script>

    <!-- smooth scroling -->
    <script src="{{ asset('/src/js/news/smoothscroll.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/src/js/news/main.js') }}"></script>

    <!-- Viewer JS -->
    <script src="{{ asset('/src/js/news/viewer.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
