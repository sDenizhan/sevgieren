<div class="shop-sidebar pe-xl-5 mt-5 mt-xl-0">
    <form wire:submit.prevent="submit">
        <div class="sidebar-widget search-widget">
            <input type="text" placeholder="Search Here..." class="theme-input fw-light" wire:model.defer="search">
        </div>
        <div class="sidebar-widget categories-widget mt-60">
            <h4 class="widget-title position-relative fw-normal mb-5">Categories</h4>
            <ul class="sidebar-check-fields">
                @if(!is_null($categories))
                    @foreach($categories as $category)
                        <li>
                            <label for="{{ \Str::slug($category->name) }}">
                                <input type="checkbox" id="{{ \Str::slug($category->name) }}" name="category" wire:model.defer="categoryId" value="{{ $category->id }}">
                                <span>{{ $category->name }}</span>
                            </label>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="filter" style="margin-top: 20px">
            <button type="submit" class="btn btn-big btn-style-3">ARA</button>
            <button type="reset" class="btn btn-big btn-style-2" wire:click="resetFilter">SIFIRLA</button>
        </div>
    </form>
    @if(!is_null($randomProducts))
        <div class="sidebar-widget products-widget mt-60">
            <h4 class="widget-title position-relative mb-5">Latest products</h4>
            <ul class="sidebar-products">
                @foreach($randomProducts as $product)
                    <li class="d-flex align-items-center gap-4">
                        <div class="flex-shrink-0 thumbnail light-bg p-2">
                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}">
                                <img src="{{ getStoragedImage($product->featured_image) }}" alt="{{ $product->title }}" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('products.details', ['slug' => $product->slug]) }}"><h6 class="mb-3">{{ $product->title }}</h6></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
