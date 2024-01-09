@extends('web.layouts.master')
@section('title', $page->title)

@section('top_meta_tags')
@if(isset($page->description))
<meta name="description" content="{!! str_limit(strip_tags($page->description), 160, ' ...') !!}">
@else
<meta name="description" content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}">
@endif

<meta name="keywords" content="{!! strip_tags($setting->keywords) !!}">
@endsection

@section('social_meta_tags')
    @if(isset($setting))
    <meta property="og:type" content="website">
    <meta property='og:site_name' content="{{ $setting->title }}"/>
    <meta property='og:title' content="{{ $page->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($page->description), 160, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('page.single', $page->slug) }}"/>
    <meta property='og:image' content="{{ asset('uploads/page/'.$page->image_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('page.single', $page->slug) }}" />
    <meta name="twitter:title" content="{{ $page->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($page->description), 160, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('uploads/page/'.$page->image_path) }}" />
    @endif
@endsection

@section('content')

 	<!-- Breadcroumb Area -->
 	<div class="breadcroumb-area">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-12">
 					<div class="breadcroumb-title text-center">
 						<h1>{{ $page->title }}</h1>
                        <h5><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ $page->title }}</h5>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>


    @if(isset($page))
 	<!-- Blog Area  -->
 	<div id="blog-page" class="blog-section section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-8">
 					<div class="single-blog-wrap">
                        <img src="{{ asset('uploads/page/'.$page->image_path) }}" alt="{{ $page->title }}">
 						<div class="blog-meta">
 						</div>
 						<h3>{{ $page->title }}</h3>

                        <div>{!! $page->description !!}</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
    @endif

@endsection