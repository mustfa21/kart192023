@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('services');
@endphp
@if(isset($header))

    @section('title', $service->title)

    @section('top_meta_tags')
    @if(isset($service->description))
    <meta name="description" content="{!! str_limit(strip_tags($service->description), 160, ' ...') !!}">
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
    <meta property='og:title' content="{{ $service->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($service->description), 160, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('service.single', $service->slug) }}"/>
    <meta property='og:image' content="{{ asset('uploads/service/'.$service->image_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('service.single', $service->slug) }}" />
    <meta name="twitter:title" content="{{ $service->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($service->description), 160, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('uploads/service/'.$service->image_path) }}" />
    @endif
@endsection

@section('content')

    @if(isset($header))
    <!-- Breadcroumb Area -->
    <div class="breadcroumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcroumb-title text-center">
                        <h1>{{ $service->title }}</h1>
                        <h5><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ $header->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    @if(isset($service))
    <!-- Single Service -->
    <div id="blog-page" class="blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-blog-wrap">
                        <img src="{{ asset('uploads/service/'.$service->image_path) }}" alt="{{ $service->title }}">
                        <div class="blog-meta"></div>
                        <h3>{{ $service->title }}</h3>

                        <div>{!! $service->description !!}</div>
                    </div>
                </div>

                <div class="col-lg-4">

                    @if(count($service_lists) > 0)
                    <div class="blog-category">
                        <h5>{{ __('common.service_list') }}</h5>

                        @foreach($service_lists as $service_list)
                        <a class="@if($service_list->id == $service->id) active @endif" href="{{ route('service.single', $service_list->slug) }}">{{ $service_list->title }}</a>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endif

@endsection