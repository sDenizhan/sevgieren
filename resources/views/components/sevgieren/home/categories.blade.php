<section class="ptb-120 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center mb-60">
                    <h2 class="h1 fw-normal mb-4 wow fadeInUp" data-wow-duration="0.5s">{{ $data['title'] }}</h2>
                    <p class="mb-0 fw-light wow wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s">
                        {{ $data['description'] }}
                    </p>
                </div>
            </div>
        </div>
        @if (!empty($data['categories']))
            @php
                $allCategoryIds = collect($data['categories'])->pluck('category_id')->toArray();
                $cats = \App\Models\ProductCategory::whereIn('id', $allCategoryIds)->get();
            @endphp
            <div class="ur-category-slider slider-spacing">
                @foreach($data['categories'] as $category)
                    @php
                        $url = route('products.category.details', ['slug' => $cats->where('id', $category['category_id'])->first()->slug]);
                    @endphp
                    <div class="position-relative pp-overlay-card overflow-hidden">
                        <img src="{{ getStoragedImage($category['image']) }}" alt="earrings" class="img-fluid">
                        <span class="category-title position-absolute">{{ $category['title'] }}</span>
                        <a href="{{ $url }}" class="pp-overlay position-absolute">
                            <span>{{ $category['title'] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
