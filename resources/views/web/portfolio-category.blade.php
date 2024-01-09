@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('portfolios');
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

@section('content')

 	@if(isset($header))
    <!-- Breadcroumb Area -->
    <div class="breadcroumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcroumb-title text-center">
                        <h1>{{ $portfolio_category->title }}</h1>
                        <h5><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ $header->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


 	@php
        $section_portfolio = \App\Models\Section::section('portfolio');
    @endphp
    @if(count($portfolios) > 0 && isset($section_portfolio))
 	<!-- Portfolio Area-->
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
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="single-project-item bg-cover" style="background-image: url({{ asset('uploads/portfolio/'.$portfolio->image_path) }});">
                        <div class="project-inner">
                            <a href="{{ route('portfolio.single', $portfolio->slug) }}" class="project-icon">
                                <i class="las la-plus"></i>
                            </a>
                            <a href="{{ route('portfolio.single', $portfolio->slug) }}" class="hover-info">
                                <h4>{{ $portfolio->title }}</h4>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

        </div>
    </div>
 	@endif


    @php
        $section_whyus = \App\Models\Section::section('why-us');
    @endphp
    @if(count($chooses) > 0 && isset($section_whyus))
    <!-- Choose Area -->
    <div class="choose-us-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  text-center text-center">
                    <div class="section-title">
                        <h6>{{ $section_whyus->title }}</h6>
                        <h2>{!! $section_whyus->description !!}</h2>
                    </div>
                </div>
            </div>
            <div class="choose-us-wrapper wow fadeInUp" data-wow-delay=".3s">
                <div class="row no-gutters justify-content-center">

                    @foreach($chooses as $choose)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="choose-us-inner">
                            <div class="choose-us-icon">
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
        $section_clients = \App\Models\Section::section('clients');
    @endphp
    @if(count($clients) > 0 && isset($section_clients))
 	<!-- clients Area-->
 	<div class="clients-area gray-bg section-padding">
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
