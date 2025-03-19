@extends('themes.main.layouts.main')
@section('pre-content')
    <div class="breadcrumbs-wrap no-title">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li><a href="{{ url(getTemplateSlug('shop')) }}">Ürünler</a></li>
                <li>{{ $product->title }}</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="content" class="page-content-wrap">
        <div class="container wide3">
            <div class="content-element4">
                <div class="product single">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="image-preview-container">
                                <div class="image-preview">
                                    <a href="{{ getStoragedImage($product->featured_image) }}" data-zoom-image="{{ getStoragedImage($product->featured_image) }}" data-fancybox="group">
                                        <img id="zoom-image" src="{{ getStoragedImage($product->featured_image) }}" alt="{{ $product->title }}">
                                    </a>
                                </div>
                                @if(!empty($product->gallery))
                                    @php
                                        $list = $product->gallery;
                                        array_push($list, $product->featured_image);
                                    @endphp
                                    <div class="carousel-type-2">
                                        <div class="owl-carousel type-small product-thumbs" id="thumbnails" data-max-items="{{ count($product->gallery) }}">
                                            @foreach($list as $image)
                                                <a @class(['active' => $loop->first]) href="#" data-image="{{ getStoragedImage($image)  }}" data-zoom-image="{{ getStoragedImage($image) }}">
                                                    <img src="{{ getStoragedImage($image) }}" alt="{{ $product->title }}">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="product-description">
                                <h1 class="product-name">{{ $product->title }}</h1>
                                <div class="product-price">{{ $product->price }} TL </div>
                                <div class="product-actions">
                                    <a href="{{ $product->url }}" target="_blank" class="btn btn-style-3 btn-big">SATIN AL</a>
                                </div>
                                <p class="product-excerpt">
                                    {!! $product->description !!}
                                </p>

                                @if(!empty($product->data))
                                    <ul class="product-meta">
                                    @foreach($product->data as $data)
                                        <li><span>{{ $data['key'] }}:</span> {{ $data['value'] }}</li>
                                    @endforeach
                                    </ul>
                                @endif

                            </div>
                        </div>
                    </div><!--/ .row -->

                    <div class="col-lg-12">
                        <div class="tabs tabs-section">
                            <!--tabs navigation-->
                            <ul class="tabs-nav clearfix">
                                <li>
                                    <a href="#tab-1">Yorumlar</a>
                                </li>
                            </ul>
                            <!--tabs content-->
                            <div class="tabs-content">
                                <div id="tab-1">
                                    <livewire:main.products.forms.comment :product_id="$product->id" />
                                    <livewire:main.products.list-comments :product_id="$product->id" :title="$product->title" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/ .product-single -->
            </div>
        </div>
    </div>
@endsection

@push('pre-jquery')
    <script src="{{ asset('themes/main/assets/plugins/elevatezoom.min.js') }}"></script>
@endpush
