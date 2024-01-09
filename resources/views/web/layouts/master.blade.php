<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="">
 <head>

 	<!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @if(isset($setting))
    <!-- App Title -->
    <title>@yield('title') | {{ $setting->title }}</title>

    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}" type="image/x-icon">


    @yield('top_meta_tags')
    @endif


    @if(empty($setting))
    <!-- App Title -->
    <title>@yield('title')</title>
    @endif


    <!-- Social Meta Tags -->
    <link rel="canonical" href="{{ route('home') }}">

    @yield('social_meta_tags')


 	<!-- Stylesheets -->
 	<!-- Bootstrap CSS -->
 	<link href="{{ asset('web/css/bootstrap.min.css') }}" rel="stylesheet">
 	<!-- Font Awesome CSS-->
 	<link href="{{ asset('web/css/all.min.css') }}" rel="stylesheet">
 	<!-- Line Awesome CSS -->
 	<link href="{{ asset('web/css/line-awesome.min.css') }}" rel="stylesheet">
 	<!-- Animate CSS-->
 	<link href="{{ asset('web/css/animate.css') }}" rel="stylesheet">
 	<!-- Bar Filler CSS -->
 	<link href="{{ asset('web/css/barfiller.css') }}" rel="stylesheet">
 	<!-- Magnific Popup Video -->
 	<link href="{{ asset('web/css/magnific-popup.css') }}" rel="stylesheet">
 	<!-- Flaticon CSS -->
 	<link href="{{ asset('web/css/flaticon.css') }}" rel="stylesheet">
 	<!-- Owl Carousel CSS -->
 	<link href="{{ asset('web/css/owl.carousel.min.css') }}" rel="stylesheet">
    @if($livechat->status == 0)
 	<!-- Floating Wpp CSS -->
 	<link href="{{ asset('web/css/floating-wpp.min.css') }}" rel="stylesheet">
    @endif
 	<!-- Style CSS -->
@if (app()->getLocale() ==="ar")
<link href="{{ asset('web/css/style_rtl.css') }}" rel="stylesheet">
<link href="{{ asset('web/css/responsive_rtl.css') }}" rel="stylesheet">


      @elseif (app()->getLocale() ==="en")
      <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('web/css/responsive.css') }}" rel="stylesheet">


@else




@endif

 	<!-- Responsive CSS -->

 	<!-- jquery -->
 	<script src="{{ asset('web/js/jquery-1.12.4.min.js') }}"></script>

 	<!-- Custom Style -->
    @if(isset($setting->custom_css))
    <style type="text/css">
        {!! strip_tags($setting->custom_css) !!}
    </style>
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@300;400&family=El+Messiri&family=Noto+Naskh+Arabic&display=swap" rel="stylesheet">
 <style>
    *{
font-family: 'Cairo', sans-serif;

    }
 </style>
</head>

 <body>

 	<!-- Pre-Loader -->
 	<div id="loader">
 		<div class="loading">
 			<div></div>
 		</div>
 	</div>

 	<!-- Header Area -->

 	<div id="style-2" class="header-area absolute-header">
 		<div class="sticky-area">
 			<div class="navigation">
 				<div class="auto-container">
 					<div class="row">
 						<div class="col-lg-2">
                            @if(isset($setting))
 							<div class="logo">
 								<a href="{{ route('home') }}"><img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="Logo"></a>
 							</div>
                            @endif
 						</div>
 					  <div class="col-lg-10">
                                <div class="main-menu">
 								<nav class="navbar navbar-expand-lg">
 									<button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
 										<span class="navbar-toggler-icon"></span>
 										<span class="navbar-toggler-icon"></span>
 										<span class="navbar-toggler-icon"></span>
 									</button>

 									<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
 										<ul class="navbar-nav m-auto">
                                            @php
                                            $header_home = \App\Models\Header::header('home');
                                            @endphp
                                            @if(isset($header_home))
 											<li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
 												<a class="nav-link" href="{{ route('home') }}">{{ $header_home->title }}</a>
 											</li>
                                            @endif

                                            @php
                                            $header_about = \App\Models\Header::header('about');
                                            @endphp
                                            @if(isset($header_about))
                                            <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('about') }}">{{ $header_about->title }}</a>
                                            </li>
                                            @endif

                                            @php
                                            $header_services = \App\Models\Header::header('services');
                                            @endphp
                                            @if(isset($header_services))
                                            <li class="nav-item {{ Request::is('service*') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('services') }}">{{ $header_services->title }}
                                                    <span class="sub-nav-toggler">
                                                    </span>
                                                </a>

                                                <ul class="sub-menu">
                                                    @foreach($service_subnavs as $service_subnav)
                                                    <li class="{{ Request::is('service/'.$service_subnav->slug) ? 'active' : '' }}"><a href="{{ route('service.single', $service_subnav->slug) }}">{{ $service_subnav->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif

                                            @php
                                            $header_portfolios = \App\Models\Header::header('portfolios');
                                            @endphp
                                            @if(isset($header_portfolios))
                                            <li class="nav-item {{ Request::is('portfolio*') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('portfolios') }}">{{ $header_portfolios->title }}
                                                    <span class="sub-nav-toggler">
                                                    </span>
                                                </a>

                                                <ul class="sub-menu">
                                                    @foreach($portfolio_subnavs as $portfolio_subnav)
                                                    <li class="{{ Request::is('portfolios/'.$portfolio_subnav->slug) ? 'active' : '' }}"><a href="{{ route('portfolio.category', $portfolio_subnav->slug) }}">{{ $portfolio_subnav->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif
{{--
                                            @php
                                            $header_pricing = \App\Models\Header::header('pricing');
                                            @endphp
                                            @if(isset($header_pricing))
                                            <li class="nav-item {{ Request::is('pricing*') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('pricing') }}">{{ $header_pricing->title }}</a>
                                            </li>
                                            @endif
                                            --}}

                                            @php
                                            $header_blog = \App\Models\Header::header('blog');
                                            @endphp
                                            @if(isset($header_blog))
                                            <li class="nav-item {{ Request::is('blog*') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('blogs') }}">{{ $header_blog->title }}
                                                    <span class="sub-nav-toggler">
                                                    </span>
                                                </a>

                                                <ul class="sub-menu">
                                                    @foreach($article_subnavs as $article_subnav)
                                                    <li class="{{ Request::is('blogs/'.$article_subnav->slug) ? 'active' : '' }}"><a href="{{ route('blog.category', $article_subnav->slug) }}">{{ $article_subnav->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif

                                            @php
                                            $header_faqs = \App\Models\Header::header('faqs');
                                            @endphp
                                            @if(isset($header_faqs))
                                            <li class="nav-item {{ Request::is('faqs*') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('faqs') }}">{{ $header_faqs->title }}</a>
                                            </li>
                                            @endif

                                            @php
                                            $header_contact = \App\Models\Header::header('contact');
                                            @endphp
                                            @if(isset($header_contact))
                                            <li class=" nav-item {{ Request::path() == 'contact' ? 'active' : '' }}"
                                            >
                                                <a class="nav-link" href="{{ route('contact') }}" style="
                                                margin-right: 30px;
                                            ">{{ $header_contact->title }}</a>
                                            </li>
                                            @endif

 										</ul>
                                         <ul>
                                             <div class="dropdown">
  <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-language" style="font-size: 24px;color: #c0a26a;"></i>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
   <a class="dropdown-item"  href="{{ route('lang',[1]) }}">Engish</a>
<a class="dropdown-item"  href="{{ route('lang',[2]) }}">عربي</a>
  </div>
</div>


                                        </ul>
 									</div>
 								</nav>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>


    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->


 	<!-- Footer Area -->

 	<footer class="footer-area">
 		<div class="container">
 			<div class="footer-up">
 				<div class="row">
 					<div class="col-lg-3 col-md-6 col-sm-12">
                        @if(isset($setting))
 						<div class="logo">
 						</div>
                        @endif

 						<div class="social-area">
 							@if(isset($social->facebook))
                            <a href="{{ $social->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(isset($social->twitter))
                            <a href="{{ $social->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(isset($social->instagram))
                            <a href="{{ $social->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if(isset($social->linkedin))
                            <a href="{{ $social->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if(isset($social->pinterest))
                            <a href="{{ $social->pinterest }}" target="_blank"><i class="fab fa-pinterest"></i></a>
                            @endif
                            @if(isset($social->youtube))
                            <a href="{{ $social->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if(isset($social->skype))
                            <a href="skype:{{ $social->skype }}?chat" target="_blank"><i class="fab fa-skype"></i></a>
                            @endif
                            @if(isset($social->whatsapp))
                            <a href="https://wa.me/{{ str_replace(' ', '', $social->whatsapp) }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            @endif
 						</div>
 					</div>

                    @if(count($pages) > 0)
 					<div class="col-lg-3 col-md-6 com-sm-12">
 						<h6>{{ __('common.footer_links') }}</h6>

 						<div class="row">
 							<div class="col-lg-12">
 								<ul>
 									<li>
                                        @foreach($pages as $key => $page)
 										<a href="{{ route('page.single', $page->slug) }}">{{ $page->title }}</a>
                                        @endforeach
 									</li>
 								</ul>
 							</div>
 						</div>
 					</div>
                    @endif

                    @if(isset($setting))
 					<div class="col-lg-3 col-md-6 col-sm-12">
 						<h6>{{ __('common.our_contacts') }}</h6>
 						<div class="contact-info">
                            @if(isset($setting->office_hours))
 							<p><i class="las la-clock"></i> {!! strip_tags($setting->office_hours) !!}</p>
                            @endif
                            @if(isset($setting->contact_address))
 							<p><i class="las la-map-marker"></i> {{ $setting->contact_address }}</p>
                            @endif
                            @if(isset($setting->phone_one))
 							<p><i class="las la-phone"></i> {{ $setting->phone_one }}@if(isset($setting->phone_two)), @endif {{ $setting->phone_two }}</p>
                            @endif
                            @if(isset($setting->email_one))
 							<p><i class="las la-envelope"></i> {{ $setting->email_one }}@if(isset($setting->email_two)), @endif {{ $setting->email_two }}</p>
                            @endif
 						</div>
 					</div>
                    @endif

 					<div class="col-lg-3 col-md-6">
 						<div class="subscribe-form">
 							<h6>{{ __('common.subscribe_us') }}</h6>
 							<form method="post" action="{{ route('subscribe') }}">
                                @csrf
 								<input type="email" name="email" value="" placeholder="{{ __('contact.email_address') }}" required>
 								<button type="submit" class="main-btn">{{ __('common.subscribe') }}</button>
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</footer>

 	<div class="footer-bottom">
 		<div class="container">
 			<div class="row justify-content-center align-items-center">
                @if(isset($setting))
 				<div class="col-lg-12 col-md-12 col-sm-12">
 					<p class="copyright-line">&copy; {!! strip_tags($setting->footer_text, '<p><a><b><i><u><strong>') !!}</p>
 				</div>
                @endif
 			</div>
 		</div>
 	</div>

 	<!-- Scroll Top Area -->
 	<a href="#top" class="go-top"><i class="las la-angle-up"></i></a>


 	<!-- Popper JS -->
 	<script src="{{ asset('web/js/popper.min.js') }}"></script>
 	<!-- Bootstrap JS -->
 	<script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <!-- Font Awesome JS-->
    <script src="{{ asset('web/js/all.min.js') }}"></script>
 	<!-- Wow JS -->
 	<script src="{{ asset('web/js/wow.min.js') }}"></script>
 	<!-- Way Points JS -->
 	<script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script>
 	<!-- Counter Up JS -->
 	<script src="{{ asset('web/js/jquery.counterup.min.js') }}"></script>
 	<!-- Owl Carousel JS -->
 	<script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
 	<!-- Isotope JS -->
 	<script src="{{ asset('web/js/isotope-3.0.6-min.js') }}"></script>
 	<!-- Magnific Popup JS -->
 	<script src="{{ asset('web/js/magnific-popup.min.js') }}"></script>
 	<!-- Sticky JS -->
 	<script src="{{ asset('web/js/jquery.sticky.js') }}"></script>
 	<!-- Progress Bar JS -->
 	<script src="{{ asset('web/js/jquery.barfiller.js') }}"></script>
    @if($livechat->status == 0)
 	<!-- Floating Wpp JS -->
 	<script src="{{ asset('web/js/floating-wpp.min.js') }}"></script>
    @endif
 	<!-- Main JS -->
 	<script src="{{ asset('web/js/main.js') }}"></script>


 	@if($livechat->status == 0)
    <!--Div where the WhatsApp will be rendered-->
    <div id="whatspp_live"></div>

    <script type="text/javascript">
        (function($) {
        "use strict";
          $('#whatspp_live').floatingWhatsApp({
            phone: '{{ $livechat->whatsapp_no }}', //WhatsApp Business phone number International format
            headerTitle: '{{ $livechat->whatsapp_title }}', //Popup Title
            popupMessage: '{{ $livechat->whatsapp_greeting }}', //Popup Message
            showPopup: true, //Enables popup display
            buttonImage: '<img src="{{ asset('web/img/social/whatsapp.png') }}">', //Button Image
            headerColor: '{{ $livechat->whatsapp_color }}', //headerColor: 'crimson', //Custom header color
            backgroundColor: 'transparent', //backgroundColor: 'crimson', //Custom background button color
            position: "right"
          });
        })(jQuery);
    </script>
    @endif


    @if($livechat->status == 1)
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script type="text/javascript">
        (function($) {
        "use strict";

            window.fbAsyncInit = function() {
              FB.init({
                xfbml            : true,
                version          : 'v8.0'
              });
            };

            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

        })(jQuery);
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
        attribution=setup_tool
        page_id="{{ $livechat->facebook_id }}"
        theme_color="{{ $livechat->facebook_color }}"
        logged_in_greeting="{{ $livechat->facebook_greeting_in }}"
        logged_out_greeting="{{ $livechat->facebook_greeting_out }}">
    </div>
    @endif

 </body>
</html>
