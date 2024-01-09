@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <a href="{{ route($route.'.index') }}" class="btn btn-info">{{ __('dashboard.btn_back') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">{{ __('dashboard.add') }} {{ $title }}</h4>
                </div>
                <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">{{ __('dashboard.title') }} <span>*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.title') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">{{ __('dashboard.category') }} <span>*</span></label>
                        <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="{{ __('dashboard.select') }}" name="categories[]" id="category" required>
                            @foreach( $categories as $category )
                            <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.category') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('dashboard.description') }} <span>*</span></label>
                        <textarea class="form-control textMediaEditor" name="description" id="description" rows="8" required>{{ old('description') }}</textarea>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.description') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('dashboard.thumbnail') }} <span>*</span> <span>{{ __('dashboard.image_size', ['height' => 'Any', 'width' => 800]) }}</span></label>
                        <input type="file" class="form-control" name="image" id="image" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.thumbnail') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_id">{{ __('dashboard.youtube_video_id') }}</label>
                        <input type="text" class="form-control" name="video_id" id="video_id" value="{{ old('video_id') }}">

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.youtube_video_id') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="client">{{ __('dashboard.client') }} <span>*</span></label>
                        <input type="text" class="form-control" name="client" id="client" value="{{ old('client') }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.client') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">{{ __('dashboard.address') }} <span>*</span></label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.address') }}
                        </div>
                    </div>
                    <!-- Form End -->
                    
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.btn_save') }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection