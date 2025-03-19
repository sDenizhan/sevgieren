@extends('themes.sevgieren.layouts.main')

@section('pre-content')
    <div class="breadcrumb-section pt-40 pb-40" data-background="{{ asset('themes/sevgieren/assets/images/shapes/breadcrumb-bg.jpg') }}">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0">
                <a href="{{ url('/') }}">Home</a> / <span class="primary-text-color"> {{ getPageData('title') }}</span></p>
        </div>
    </div>
@endsection

@section('content')
    <livewire:sevgieren.products.products-main />
@endsection
