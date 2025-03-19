<div class="page-section-bg">
    <div class="container wide2">
        <div class="content-element4">
            <div class="section-pre-title">{{ $data['sub_title'] }}</div>
            <h2 class="section-title">{{ $data['title'] }}</h2>
        </div>
        @if(!empty($products))
            <div class="carousel-type-2">
                <div class="owl-carousel products-holder" data-item-margin="30" data-max-items="5">
                    @foreach($products as $product)
                        <div class="product">
                            <figure class="product-image">
                                <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                                    <img src="{{ getStoragedImage($product->featured_image) }}" alt="{{ $product->title }}">
                                </a>
                            </figure>
                            <div class="product-description">
                                <a href="#" class="product-cat">{{ $product->category->name }}</a>
                                <h6 class="product-name"><a href="{{ route('products.details', ['slug' => $product->slug]) }}">{{ $product->title }}</a></h6>
                                <div class="pricing-area">
                                    <div class="product-price">
                                        {{ $product->price }} TL
                                    </div>
                                </div>
                                <a href="{{ route('products.details', ['slug' => $product->slug]) }}" class="btn btn-small btn-style-3">Ürünü İncele</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
