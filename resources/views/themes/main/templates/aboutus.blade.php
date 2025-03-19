@extends('themes.main.layouts.main')

@section('header-css', 'style-2')

@section('pre-content')
    <div class="media-holder about-us" data-bg="{{ getStoragedImage(getPageData('image')) }}">
        <div class="container wide3">
            <div class="media-inner left-side">
                <h1 class="call-title">{{ getPageData('title') }}</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if(!empty(getPageData('bio_title')))
        <div class="page-section half-bg-col var2">
            <div class="img-col-left"><div class="col-bg" data-bg="{{ getStoragedImage(getPageData('bio_image')) }}"></div></div>
            <div class="container wide2">
                <div class="row align-content-center">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <h3 class="title">{{ getPageData('bio_title') }}</h3>
                        <p class="content-element3 text-size-medium fw-medium">
                            {!! getPageData('bio_content') !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty(getPageData('mission_title')))
        <div class="page-section half-bg-col var2">
            <div class="img-col-right video-holder">
                <div class="col-bg" data-bg="{{ getStoragedImage(getPageData('mission_image')) }}"></div>
            </div>
            <div class="container wide2">
                <div class="row align-content-center">
                    <div class="col-lg-6">
                        <h3 class="title">{{ getPageData('mission_title') }}</h3>
                        {!! getPageData('mission_content') !!}
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>
    @endif

    @if( !empty(getPageData('gallery_images')) )
        <div class="page-section">
            <div class="container">
                <div class="content-element5">
                    <h3 class="align-center">Resim Galerisi</h3>
                </div>
                <div class="portfolio-holder flex-row item-col-3">
                    @foreach(getPageData('gallery_images') as $image)
                        <div class="project">
                            <div class="project-image">
                                <img src="{{ getStoragedImage($image) }}" alt="">
                                <a href="{{ getStoragedImage($image) }}" class="project-link" data-fancybox="group"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
