<main id="main" class="col-lg-9 col-md-12">
    <div class="product-sort-section flex-row justify-content-between align-items-center">
        @if(!is_null($products))
            <span>Toplam Ürün {{ $products->count() }} Adet</span>
        @endif
        <div class="sorting">
            <select wire:model.lazy="order" id="sortingFilter">
                <option value="asc">Fiyat (Artan)</option>
                <option value="desc">Fiyat (Azalan)</option>
            </select>
        </div>
    </div>
    <div class="content-element6">
        <div class="products-holder flex-row item-col-3">
            @if(!is_null($products))
                @foreach($products as $product)
                    <div class="product">
                        <figure class="product-image">
                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                                <img src="{{ getStoragedImage($product->featured_image) }}" alt="">
                            </a>
                        </figure>
                        <div class="product-description">
                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}" class="product-cat">{{ $product->category->name }}</a>
                            <h6 class="product-name">
                                <a href="{{ route('products.details', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
                            </h6>
                            <div class="pricing-area">
                                <div class="product-price">
                                    {{ $product->price }} TL
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $products->links() }}
            @endif
        </div>
    </div>
</main>
<livewire:main.products.filters.sidebar />

@push('header')
    <style>
        .sorting {
            display: block;
            background: #fbfbfb;
            padding: 10px;
            border: 2px solid #f1f1f1;
            border-radius: 3px;
        }

        .sorting > select {
            padding: 10px;
            border: 1px solid #fbfbfb;
            background: #fbfbfb;
        }

    </style>
@endpush
