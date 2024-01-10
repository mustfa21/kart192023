@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('home');
@endphp
@if(isset($header))

    @section('title', $header->meta_title)

    @section('top_meta_tags')
    @if(isset($header->description))
    <meta name="description" content="{!! str_limit(strip_tags($header->description), 160, ' ...') !!}">
    @else
    <meta name="description" content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}">
    @endif

    @if(isset($header->keywords))
    <meta name="keywords" content="{!! strip_tags($header->keywords) !!}">
    @else
    <meta name="keywords" content="{!! strip_tags($setting->keywords) !!}">
    @endif
    @endsection

@endif

@section('social_meta_tags')
    @if(isset($setting))
    <meta property="og:type" content="website">
    <meta property='og:site_name' content="{{ $setting->title }}"/>
    <meta property='og:title' content="{{ $setting->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('home') }}"/>
    <meta property='og:image' content="{{ asset('/uploads/setting/'.$setting->logo_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('home') }}" />
    <meta name="twitter:title" content="{{ $setting->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
    @endif
@endsection

@section('content')

    @if(count($sliders) > 0)
 	<!-- Hero Area -->
 	<div id="home-2" class="homepage-slides owl-carousel">

        @foreach($sliders as $slider)
        <div class="single-slide-item" style="background-image: url({{ asset('uploads/slider/'.$slider->image_path) }});">
            <div class="overlay"></div>
            <div class="hero-area-content">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-lg-12 wow fadeInUp animated" data-wow-delay=".2s">
                            <div class="section-title slid-rtl">
                                <h6 class="slid-rtl">{{ $slider->title }}</h6>
                                <h1 class="slid-rtl">{!! strip_tags($slider->description, '<br>') !!}</h1>
                            </div>

                            {{--  @if(isset($slider->link))
                            <a   href="{{ $slider->link }}" target="_blank" class="main-btn slid-rtl">{{ __('common.read_more') }}</a>
                            @endif  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @endif


    @php
        $section_whyus = \App\Models\Section::section('why-us');
    @endphp
    @if(count($chooses) > 0 && isset($section_whyus))
 	<!-- Intro -->
 	<div class="intro-area">
 		<div class="container">
 			<div class="intro-wrapper wow fadeInUp" data-wow-delay=".3s">
 				<div class="row no-gutters justify-content-center">

                    @foreach($chooses as $choose)
 					<div class="col-lg-3 col-md-6 col-12">
 						<div class="intro-inner">
 							<div class="intro-icon">
 								<img src="{{ asset('uploads/choose/'.$choose->icon) }}" alt="Icon">
 							</div>
 							<h5>{{ $choose->title }}</h5>
 							<p>{!! strip_tags($choose->description) !!}</p>
 						</div>
 					</div>
                    @endforeach

 				</div>
 			</div>
 		</div>
 	</div>
    @endif


    @php
        $section_services = \App\Models\Section::section('services');
    @endphp
    @if(count($services) > 0 && isset($section_services))
 	<!-- Services Area -->
 	<div id="service-3" class="services-area section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-12  text-center text-center">
 					<div class="section-title">
                        <h6>{{ $section_services->title }}</h6>
 						<h2>{!! $section_services->description !!}</h2>
 					</div>
 				</div>
 			</div>

 			<div class="row justify-content-center">

                @foreach($services as $key => $service)
 				<div class="col-lg-4 col-md-6 col-sm-12">
 					<div class="single-service wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
 						<a href="{{ route('service.single', $service->slug) }}" class="service-bg">
 							<img src="{{ asset('uploads/service/'.$service->image_path) }}" alt="{{ $service->title }}">
 						</a>
 						<div class="service-content">
 							<h3>{{ $service->title }}</h3>
 							<a href="{{ route('service.single', $service->slug) }}" class="read-more">{{ __('common.read_more') }}</a>
 						</div>
 					</div>
 				</div>
                @endforeach

 			</div>
 		</div>
 	</div>
    @endif


    @php
        $section_process = \App\Models\Section::section('process');
    @endphp
    @if(count($processes) > 0 && isset($section_process))
    <!--Process Section -->
    <div class="process-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  text-center text-center">
                    <div class="section-title">
                        <h6>{{ $section_process->title }}</h6>
                        <h2>{!! $section_process->description !!}</h2>
                    </div>
                </div>
            </div>
            <div class="row process-item-wrap justify-content-center">

                @foreach($processes as $key => $process)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-process-item wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
                        <div class="process-num">
                            <p>{{ $key + 1 }}</p>
                        </div>
                        <div class="process-icon">
                            <img src="{{ asset('uploads/process/'.$process->icon) }}" alt="Icon">
                        </div>
                        <div class="process-content">
                            <h5>{{ $process->title }}</h5>
                            <p>{!! $process->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    @endif


    @php
        $section_portfolio = \App\Models\Section::section('portfolio');
    @endphp
    @if(count($portfolios) > 0 && isset($section_portfolio))
 	<!-- Portfolio Section -->
 	<div class="project-area section-padding pad-bot-0">
 		<div class="container-fluid">
 			<div class="col-lg-12  text-center text-center">
 				<div class="section-title">
                    <h6>{{ $section_portfolio->title }}</h6>
 					<h2>{!! $section_portfolio->description !!}</h2>
 				</div>
 			</div>
 		</div>
 		<div class="project-slider owl-carousel">

            @foreach($portfolios as $portfolio)
			<div>
				<div class="single-project-item bg-cover" style="background-image: url({{ asset('uploads/portfolio/'.$portfolio->image_path) }});">
					<div class="project-inner">
						<a href="{{ route('portfolio.single', $portfolio->slug) }}" class="project-icon">
							<i class="las la-plus"></i>
						</a>
						<a href="{{ route('portfolio.single', $portfolio->slug) }}" class="hover-info">
							<h4>{{ $portfolio->title }}
                                <span>
                                    @foreach($portfolio->categories as $key => $category)
                                        @if($key != 0),@endif {{ $category->title }}
                                    @endforeach
                                </span>
                            </h4>
						</a>
					</div>
				</div>
			</div>
            @endforeach

 		</div>
 	</div>
    @endif


    @if(count($counters) > 0)
 	<!-- Achievement Section -->
 	<div id="style-2" class="achievement-area section-padding">
 		<div class="container">
 			<div class="row justify-content-center">

                @foreach($counters as $counter)
 				<div class="col-lg-3 col-md-6 col-sm-6">
 					<div class="single-counter-box">
 						<p class="counter-number"><span>{{ $counter->value }}</span></p>
 						<h6>{{ $counter->title }}</h6>
 					</div>
 				</div>
                @endforeach

 			</div>
 		</div>
 	</div>
    @endif


    @php
        $section_pricing = \App\Models\Section::section('pricing');
    @endphp
    @if(count($pricings) > 0 && isset($section_pricing))
 	<!--Pricing Section -->
 	<div class="pricing-section gray-bg section-padding">
 		<div class="container">
 			<div class="row justify-content-center">
 				<div class="col-lg-12">
 					<div class="section-title text-center">
                        <h6>{{ $section_pricing->title }}</h6>
 						<h2>{!! $section_pricing->description !!}</h2>
 					</div>
 				</div>
 			</div>
 			<div class="row justify-content-center">

                @foreach($pricings as $key => $pricing)
 				<div class="col-lg-4 col-md-6">
 					<div class="single-price-item wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
 						<h5>{{ $pricing->title }}</h5>
 						<div class="price-box">
 							<p><b>{{ __('common.currency') }}{{ $pricing->price }}</b>/ {{ $pricing->quantity }}</p>
 						</div>
 						<div class="price-list">
 							<ul>
 								@php
                                    $features = json_decode($pricing->description, true);
                                @endphp

                                @if(isset($features))
                                @foreach($features as $key => $feature)
                                <li>{{ $feature }}</li>
                                @endforeach
                                @endif
 							</ul>
 						</div>

                        @php
                            $section_contact = \App\Models\Section::section('contact');
                        @endphp
                        @if(isset($section_contact))
                        <a href="{{ route('contact') }}" class="main-btn small-btn">{{ __('common.get_start') }}</a>
                        @endif
 					</div>
 				</div>
                @endforeach

 			</div>
 		</div>
 	</div>
    @endif


    @php
        $section_testimonials = \App\Models\Section::section('testimonials');
    @endphp
    @if(count($testimonials) > 0 && isset($section_testimonials))
    <!-- Testimonial Area -->
    <div class="testimonial-area section-padding">
        <div class="capricorn-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center ">
                        <div class="section-title">
                            <h6>{{ $section_testimonials->title }}</h6>
                            <h2>{!! $section_testimonials->description !!}</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="team-carousel owl-carousel">

                            @foreach($testimonials as $testimonial)
                            <div class="single-team-item">
                                <div class="testimonial-icon"><i class="las la-quote-left"></i></div>
                                <p>{!! $testimonial->description !!}</p>
                                <img src="{{ asset('uploads/testimonial/'.$testimonial->image_path) }}" alt="{{ $testimonial->title }}">
                                <div class="author-desc">
                                    <h5>{{ $testimonial->title }}</h5>
                                    <span>{{ $testimonial->designation }}@if(isset($testimonial->organization)), {{ $testimonial->organization }}@endif</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


       @php
        $section_certificate = \App\Models\Section::section('certificate');
    @endphp
    @if(count($certificates) > 0 && isset($section_certificate))
 	<!-- Portfolio Section -->
 	<div class="project-area section-padding pad-bot-0">
 		<div class="container-fluid">
 			<div class="col-lg-12  text-center text-center">
 				<div class="section-title">
                    <h6>{{ $section_certificate->title }}</h6>
 					<h2>{!! $section_certificate->description !!}</h2>
 				</div>
 			</div>
 		</div>
         <div id="home-2"  class="homepage-slides col-md-12 d-flex justify-content-center owl-carousel">

            @foreach($certificates as $certificate)


                  <div class="">
                            <div class="">
                                <div class="slider-card1">
                                    <div class="d-flex justify-content-center align-items-center ">
                                        <img src="{{ asset('uploads/certificate/'.$certificate->image_path) }}" alt="" >
                                    </div>

                                </div>



                            </div>
                        </div>
            @endforeach

        </div>
 		</div>
 	</div>
    @endif


    @php
        $section_clients = \App\Models\Section::section('clients');
    @endphp
    @if(count($clients) > 0 && isset($section_clients))
 	<!-- clients Area-->
 	<div class="clients-area section-padding">
 		<div class="container">
 			<div class="row">
 				<div id="clients-slider" class="clients-slider owl-carousel">

                    @foreach($clients as $client)
 					<div class="item-clients-img">
                      <a href="{{ $client->link }}" target="_blank">
 						<img src="{{ asset('uploads/client/'.$client->image_path) }}" class="img-fluid" alt="{{ $client->title }}">
                      </a>
 					</div>
 					@endforeach

 				</div>
 			</div>
 		</div>
 	</div>
    @endif

@endsection
