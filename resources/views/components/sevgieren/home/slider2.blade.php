<section class="primary-bg-color position-relative z-1 overflow-hidden deal-section">
    <span class="dark-overlay d-none d-xxl-block"></span>
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-xl-3">
                <div>
                    <h2 class="display-3 mb-5 text-white">{{ $data['title'] }}</h2>
                    @php
                        $categoryIds = collect($data['products'])->pluck('category_id')->toArray();
                        $categories = \App\Models\ProductCategory::with(['products'])->whereIn('id', $categoryIds)->get();
                    @endphp
                    <ul class="nav nav-tabs ur-tab-control border-0">
                        @if ($categories)
                            @foreach($categories as $category)
                                <li><a href="#{{ $category->slug }}" @class(['active' => $loop->first]) data-bs-toggle="tab">{{ $category->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="tab-content">
                    @if ($categories)
                        @foreach($categories as $category)
                        <div @class(['tab-pane fade', 'show active' => $loop->first]) id="{{ $category->slug }}">
                            <div class="row align-items-center g-4">
                                <div class="col-xl-7 col-lg-7 col-md-6">
                                    <div class="banner-image ps-xl-5 mt-5 mt-xl-0">
                                        <img src="{{ getStoragedImage($data['products'][$loop->index]['image'][0]) }}" alt="chain" class="img-fluid">
                                    </div>
                                </div>
                                @php( $product = $category->products->find($data['products'][$loop->index]['product_id']) )
                                <div class="col-xl-4 col-lg-5 col-md-6 ps-md-4">
                                    <div class="ur-product-card position-relative bg-white">
                                        <div class="feature-image d-flex align-items-cneter justify-content-center">
                                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                                                <img src="{{ getStoragedImage($product->featured_image) }}" alt="rings" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="text-center pb-40">
                                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}" class="secondary-text-color text-uppercase">{{ $category->name }}</a>
                                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}"><h5 class="my-2 fw-medium product-title">{{ $product->title }}</h5></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
