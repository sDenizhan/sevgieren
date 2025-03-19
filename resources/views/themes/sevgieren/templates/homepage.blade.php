@extends('themes.sevgieren.layouts.main')

@section('header-css', 'fixed-header')

@section('pre-content')
    @if(($sliders = getSliders()) != null)
        <section class="ur-hero-section position-relative z-1 overflow-hidden" data-background="{{ asset('themes/sevgieren/assets/images/bg/hero-bg.jpg') }}">
            <span class="circle-white position-absolute z--1 rounded-circle"></span>
            <img src="{{ asset('themes/sevgieren/assets/images/shapes/circle-1.png') }}" alt="circle" class="position-absolute end-0 bottom-0 z--1 circle-color">
            <div class="container">
                <div class="ur-hero-slider slider-spacing">

                    @foreach($sliders as $slider)
                        <div class="ur-hero-single-slide">
                            <div class="row align-items-center">
                                <div class="col-xxl-5 col-xl-6">
                                    <div class="hero-left-content">
                                        @if(!empty($slider->data) && is_array($slider->data))
                                            @php( $smallText = collect($slider->data)->firstWhere('type', 'small_text') )
                                            @if($smallText)
                                                <h6 class="hero-subtitle fw-normal mb-40">{{ $smallText['data']['title'] }}</h6>
                                            @endif
                                        @endif

                                        <h1 class="hero-title mb-50">{{ $slider->title }}</h1>

                                        @if(!empty($slider->data) && is_array($slider->data))
                                            @php($button = collect($slider->data)->firstWhere('type', 'button'))
                                            @if($button)
                                                <a href="{{ $button['data']['link'] }}" class="template-btn primary-btn"><span>{{ $button['data']['text'] }}</span></a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xxl-7 col-xl-6">
                                    <div class="hero-right mt-5 mt-xl-0">
                                        <img src="{{ getStoragedImage($slider->image) }}" alt="{{ $slider->title }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@section('content')
    @php($components = getPageData('components'))
    @if(!empty($components))
        @foreach($components as $component)
            @php($file = join('.', [$GLOBALS['theme'], $component['type']]))
            @php($data = $component['data'])
            <x-dynamic-component :component="$file" :data="$data" />
        @endforeach
    @endif
@endsection
