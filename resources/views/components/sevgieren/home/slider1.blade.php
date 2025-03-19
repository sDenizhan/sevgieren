<section class="pb-120 bg-white">
    <div class="container pb-5 pb-sm-0">
        <div class="row">
            <div class="col-xl-7">
                <div class="section-title">
                    <h2 class="h1 fw-normal mb-50">{{ $data['title'] }}</h2>
                </div>
            </div>
        </div>
        @php
            $products = \App\Models\Product::with(['category'])->where(['category_id' => $data['category_id']])->orderBy('id', 'desc')->limit($data['count'])->get();
        @endphp

        @if ($products->isNotEmpty())
        <div class="feature-product-slider slider-spacing">
            @foreach($products as $product)
                <div class="ur-product-card position-relative">
                    <div class="feature-image d-flex align-items-cneter justify-content-center light-bg position-relative">
                        <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                            <img src="{{ getStoragedImage($product->featured_image) }}" alt="rings" class="img-fluid">
                        </a>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('products.details', ['slug' => $product->slug]) }}" class="secondary-text-color text-uppercase">{{ $product->category->name }}</a>
                        <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                            <h5 class="my-2 fw-medium product-title">{{ $product->title }}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
