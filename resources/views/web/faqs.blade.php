@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('faqs');
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
                        <h1>{{ $header->title }}</h1>
                        <h5><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ $header->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


 	@php
        $section_faqs = \App\Models\Section::section('faqs');
    @endphp
    @if(isset($section_faqs))
 	<!-- Frequently Asked Question -->
 	<div class="faq-section section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-8">
 					<div class="section-title">
 						<h6>{{ $section_faqs->title }}</h6>
 						<h2>{!! $section_faqs->description !!}</h2>
 					</div>

 					<div class="styled-faq">
                        <h6 class="cate_title">{{ $current_category->title }}</h6>
 						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

 							@foreach($faqs as $key => $faq)
 							<div class="panel panel-default">
 								<div class="panel-heading @if($key== 0) active @endif" role="tab" id="heading-{{ $key }}">
 									<h6 class="panel-title">
 										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $key }}" aria-expanded="false" aria-controls="collapse-{{ $key }}">
 											{{ $faq->title }}
 											<i class="angle-up"><span class="fa fa-angle-up"></span></i>
 											<i class="angle-down"><span class="fa fa-angle-down"></span></i>
 										</a>
 									</h6>
 								</div>
 								<div id="collapse-{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{{ $key }}">
 									<div class="panel-body">
 										{!! $faq->description !!}
 									</div>
 								</div>
 							</div>
 							@endforeach

 						</div>
 					</div>

 				</div>
                <div class="col-lg-4">

                    @if(count($faq_categories) > 0)
                    <div class="blog-category">
                        <h5>{{ __('common.categories') }}</h5>

                        @foreach($faq_categories as $faq_category)
                        <a class="@if(isset($current_category)) @if($current_category->id == $faq_category->id) active @endif @endif" href="{{ route('faqs.category', $faq_category->slug) }}">{{ $faq_category->title }} ({{ $faq_category->faqs->where('status', 1)->count() }})</a>
                        @endforeach
                    </div>
                    @endif

                </div>
 			</div>
 		</div>
 	</div>
 	@endif


 	@php
        $section_process = \App\Models\Section::section('process');
    @endphp
    @if(count($processes) > 0 && isset($section_process))
 	<!--Process Section -->
 	<div class="process-area gray-bg section-padding">
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
