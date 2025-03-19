@extends('themes.sevgieren.layouts.main')

@section('pre-content')
    <div class="breadcrumb-section pt-40 pb-40" data-background="{{ asset('themes/sevgieren/assets/images/shapes/breadcrumb-bg.jpg') }}">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0">
                <a href="{{ url('/') }}">Home</a> / <span class="primary-text-color">Contact Us</span></p>
        </div>
    </div>
@endsection

@section('content')
    <section class="contact-section bg-white ptb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="text-center">
                        <h2 class="mb-4 mt-2">{{ getPageData('title') }}</h2>
                        <p class="text-color fw-light">
                            {{ getPageData('subtitle') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="light-bg contact-form-box mt-60">
                <livewire:sevgieren.contact-form />
            </div>
        </div>
    </section>

    @if ( ($location = getPageData('location')) != '')
        <div class="location-map overflow-hidden">
            <iframe src="{{ $location }}" style="border:0;"  loading="lazy"></iframe>
        </div>
    @endif

    <section class="location-box-area bg-white ptb-120 overflow-hidden">
        <div class="container">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-xl-4 col-lg-6">
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="location-box light-bg text-center position-relative z-1">
                        <h3 class="mb-40">Address</h3>
                        <p class="text-color mb-0 fw-light">
                            @if ( ($address = setting('address')) != '' )
                                {{ $address }}
                                <br />
                            @endif

                            @if ( ($phone_number = setting('phone_number')) != '' )
                                <a href="tel:{{ $phone_number }}" class="text-color">{{ $phone_number }}</a>
                                <br />
                            @endif

                            @if ( ($mail_address = setting('mail_address')) != '' )
                                <a href="mailto:{{ $mail_address }}" class="text-color">{{ $mail_address }}</a>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                </div>
            </div>
        </div>
    </section>
@endsection
