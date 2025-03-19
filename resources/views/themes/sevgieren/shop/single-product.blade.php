@extends('themes.sevgieren.layouts.main')
@section('pre-content')
    <div class="breadcrumb-section pt-40 pb-40" data-background="{{ asset('themes/sevgieren/assets/images/shapes/breadcrumb-bg.jpg') }}">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0">
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ url(getTemplateSlug('shop')) }}"> Products </a> /
                <span class="primary-text-color">{{ $product->title }}</span>
            </p>
        </div>
    </div>
@endsection

@section('content')
    <section class="ptb-120 bg-white overflow-hidden">
        <div class="container pb-5 pb-sm-0">
            <div class="product-single">
                <div class="product2-slider-system">
                    <div class="row">
                        @if(!empty($product->gallery))
                            @php
                                $list = $product->gallery;
                                array_push($list, $product->featured_image);
                            @endphp
                            <div class="col-xl-9">
                                <div class="rtl-slider slider-spacing">
                                    @foreach($list as $image)
                                        <div class="rtl-slider-slide">
                                            <img src="{{ getStoragedImage($image) }}" alt="{{ $product->title }}" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="rtl-slider-nav">
                                    @foreach($list as $image)
                                        <div class="rtl-slider-slide">
                                            <img src="{{ getStoragedImage($image) }}" alt="{{ $product->title }}" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="col-xl-12">
                                <div class="rtl-slider slider-spacing">
                                    <div class="rtl-slider-slide">
                                        <img src="{{ getStoragedImage($product->featured_image) }}" alt="{{ $product->title }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="product-2-info-left">
                    <div class="row gx-5">
                        <div class="col-xxl-12 col-lg-12">
                            <div class="single-product-info">

                                <a href="#" class="category-btn text-uppercase fs-sm secondary-text-color d-inline-block mb-3">{{ $product->category->name }}</a>

                                <h3 class="mb-4">{{ $product->title }}</h3>

                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="light-bg contact-form-box mt-40">
                <h4 class="mb-40">Add Comment</h4>

                <livewire:sevgieren.products.forms.comment :product_id="$product->id" />
            </div>

            <div class="single-product-tab pt-120">
                <ul class="nav nav-tabs">
                    <li><a href="#tab-1" data-bs-toggle="tab" class="active">Reviews(2)</a></li>
                </ul>
                <div class="tab-content mt-32">
                    <div class="tab-pane fade show active" id="tab-1">
                        <livewire:sevgieren.products.list-comments :product_id="$product->id" :title="$product->title" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ptb-120 bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="section-title">
                        <h2 class="fw-normal mb-50 text-font-family">Our limited edition</h2>
                    </div>
                </div>
            </div>
            <div class="feature-product-slider slider-spacing">
                <div class="ur-product-card position-relative">
                    <span class="position-absolute ur-badge coupon-badge">-50%</span>
                    <div class="feature-image d-flex align-items-cneter justify-content-center light-bg position-relative">
                        <a href="product-details.html"><img src="assets/images/products/product-1.png" alt="rings" class="img-fluid"></a>
                        <div class="product-overlay position-absolute">
                            <div class="product-btns d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"><i class="fa-regular fa-heart"></i></a>
                                <a href="javascript:void(0)"><i class="fa-solid fa-basket-shopping"></i></a>
                                <a href="#product_quickview" data-bs-toggle="modal"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="shop-list.html" class="secondary-text-color text-uppercase">Necklaces</a>
                        <a href="product-details.html"><h5 class="my-2 fw-medium product-title">Hitmor 24k Neaklaces</h5></a>
                        <span class="primary-text-color fs-sm fw-medium">$250.00</span>
                    </div>
                </div>
                <div class="ur-product-card position-relative">
                    <div class="feature-image d-flex align-items-cneter justify-content-center light-bg position-relative">
                        <a href="product-details.html"><img src="assets/images/products/product-2.png" alt="rings" class="img-fluid"></a>
                        <div class="product-overlay position-absolute">
                            <div class="product-btns d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"><i class="fa-regular fa-heart"></i></a>
                                <a href="javascript:void(0)"><i class="fa-solid fa-basket-shopping"></i></a>
                                <a href="#product_quickview" data-bs-toggle="modal"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="shop-list.html" class="secondary-text-color text-uppercase">Gold</a>
                        <a href="product-details.html"><h5 class="my-2 fw-medium product-title">Amazing Gold Plated</h5></a>
                        <span class="primary-text-color fs-sm fw-medium">$180.00</span>
                    </div>
                </div>
                <div class="ur-product-card position-relative">
                    <div class="feature-image d-flex align-items-cneter justify-content-center light-bg position-relative">
                        <a href="product-details.html"><img src="assets/images/products/product-3.png" alt="rings" class="img-fluid"></a>
                        <div class="product-overlay position-absolute">
                            <div class="product-btns d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"><i class="fa-regular fa-heart"></i></a>
                                <a href="javascript:void(0)"><i class="fa-solid fa-basket-shopping"></i></a>
                                <a href="#product_quickview" data-bs-toggle="modal"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="shop-list.html" class="secondary-text-color text-uppercase">Rings</a>
                        <a href="product-details.html"><h5 class="my-2 fw-medium product-title">Deko Diamond Ring</h5></a>
                        <span class="primary-text-color fs-sm fw-medium">$220.00</span>
                    </div>
                </div>
                <div class="ur-product-card position-relative">
                    <div class="feature-image d-flex align-items-cneter justify-content-center light-bg position-relative">
                        <a href="product-details.html"><img src="assets/images/products/product-4.png" alt="rings" class="img-fluid"></a>
                        <div class="product-overlay position-absolute">
                            <div class="product-btns d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"><i class="fa-regular fa-heart"></i></a>
                                <a href="javascript:void(0)"><i class="fa-solid fa-basket-shopping"></i></a>
                                <a href="#product_quickview" data-bs-toggle="modal"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="shop-list.html" class="secondary-text-color text-uppercase">Earrings</a>
                        <a href="product-details.html"><h5 class="my-2 fw-medium product-title">Green Diamond Earring</h5></a>
                        <span class="primary-text-color fs-sm fw-medium">$210.00</span>
                    </div>
                </div>
                <div class="ur-product-card position-relative">
                    <span class="position-absolute ur-badge sale-badge">SALE</span>
                    <div class="feature-image d-flex align-items-cneter justify-content-center light-bg position-relative">
                        <a href="product-details.html"><img src="assets/images/products/product-6.png" alt="rings" class="img-fluid"></a>
                        <div class="product-overlay position-absolute">
                            <div class="product-btns d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"><i class="fa-regular fa-heart"></i></a>
                                <a href="javascript:void(0)"><i class="fa-solid fa-basket-shopping"></i></a>
                                <a href="#product_quickview" data-bs-toggle="modal"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="shop-list.html" class="secondary-text-color text-uppercase">Diamond</a>
                        <a href="product-details.html"><h5 class="my-2 fw-medium product-title">Blue Cool Earring</h5></a>
                        <span class="primary-text-color fs-sm fw-medium">$150.00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
