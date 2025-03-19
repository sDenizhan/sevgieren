<aside id="sidebar" class="col-lg-3 col-md-12">

    <div class="widget">
        <h6 class="widget-title">FILITRELE</h6>
        <form wire:submit.prevent="submit">
            <div class="filter">
                <h6>Arama</h6>
                <input type="text" wire:model.defer="search" placeholder="Ürünlerde Ara">
            </div>

            <div class="filter" style="margin-top: 20px">
                <h6>Kategori</h6>
                <div class="categories">
                    @if(!is_null($categories))
                        @foreach($categories as $category)
                            <div class="inline">
                                <input type="radio" id="{{ \Str::slug($category->name) }}" name="category" wire:model.defer="categoryId" value="{{ $category->id }}">
                                <label for="{{ \Str::slug($category->name) }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="filter" style="margin-top: 20px">
                <h6>Fiyat</h6>
                <input type="number" placeholder="Min. Fiyat" value="0" wire:model.defer="minPrice" />
                <input type="number" placeholder="Max. Fiyat" value="9999" wire:model.defer="maxPrice" style="margin-top: 5px" />
            </div>

            <div class="filter" style="margin-top: 20px">
                <button type="submit" class="btn btn-big btn-style-3">ARA</button>
                <button type="reset" class="btn btn-big btn-style-2" wire:click="resetFilter">SIFIRLA</button>
            </div>
        </form>
    </div>

    
    <!-- Widget -->
    @if(!is_null($randomProducts))
        <div class="widget">
            <h6 class="widget-title">Ürünler</h6>
            <div class="product-holder">
                @foreach($randomProducts as $product)
                    <div class="product">
                        <figure class="product-image">
                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                                <img src="{{ getStoragedImage($product->featured_image) }}" alt="{{ $product->title }}">
                            </a>
                        </figure>
                        <div class="product-description">
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
            </div>
        </div>
    @endif

</aside>
