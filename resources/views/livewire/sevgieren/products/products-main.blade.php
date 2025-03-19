<section class="shop-section bg-white ptb-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 order-2 order-xl-1">
                <livewire:sevgieren.products.filters.sidebar />
            </div>
            <div class="col-xl-8 order-1 order-xl-2">
                <div class="shop-grid">
                    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                        @if(!is_null($products))
                            <p class="mb-0 fw-light">Showing {{ $products->count() }} results</p>
                        @endif
                        <div class="d-flex align-items-center gap-4">
                            <div class="select-wrapper">
                                <select class="nice_select" wire:model.lazy="order">
                                    <option value="asc">Fiyat (Artan)</option>
                                    <option value="desc">Fiyat (Azalan)</option>
                                </select>
                            </div>
                            <div class="layout-grid d-flex align-items-center">
                                <a href="shop.html" class="active">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="10.7139" width="9" height="3" fill="#121111"/>
                                        <rect x="10.7139" y="7" width="9" height="3" fill="#121111"/>
                                        <rect x="10.7139" y="14" width="9" height="3" fill="#121111"/>
                                        <rect width="9" height="3" fill="#121111"/>
                                        <rect y="7" width="9" height="3" fill="#121111"/>
                                        <rect y="14" width="9" height="3" fill="#121111"/>
                                    </svg>
                                </a>
                                <a href="shop-list.html">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="5.71387" width="14.2857" height="3" fill="#121111"/>
                                        <rect x="5.71387" y="7" width="14.2857" height="3" fill="#121111"/>
                                        <rect x="5.71387" y="14" width="14.2857" height="3" fill="#121111"/>
                                        <rect width="3.80952" height="3" fill="#121111"/>
                                        <rect y="7" width="3.80952" height="3" fill="#121111"/>
                                        <rect y="14" width="3.80952" height="3" fill="#121111"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="products-grid mt-40">
                        <div class="row g-4">
                            @if(!is_null($products))
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="ur-product-card position-relative card-sm-small">
                                            <div class="feature-image d-flex align-items-cneter justify-content-center light-bg position-relative">
                                                <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                                                    <img src="{{ getStoragedImage($product->featured_image) }}" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="mt-4">
                                                <a href="{{ route('products.details', ['slug' => $product->slug]) }}" class="secondary-text-color text-uppercase">{{ $product->category->name }}</a>
                                                <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                                                    <h5 class="my-2 fw-medium product-title">{{ $product->title }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @if(!is_null($products))
                        {{ $products->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
