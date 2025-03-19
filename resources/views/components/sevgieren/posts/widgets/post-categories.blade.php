<div class="sidebar-widget categories-widget">
    <h4 class="widget-title position-relative fw-normal mb-5">Categories</h4>

    @if(isset($categories))
        <ul class="sidebar-check-fields">
            @foreach($categories as $category)
                <li><a href="{{ route('post.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    @endif
</div>

<div class="sidebar-widget latest-post-widget mt-60">
    <h4 class="widget-title position-relative fw-normal mb-5">Latest Posts</h4>
    @if(isset($latests))
        <ul class="latest-posts">
        @foreach($latests as $post)
            <li class="d-flex align-items-center gap-3">
                <div class="feature-image pe-1">
                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                        <img src="{{ getStoragedImage($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                    </a>
                </div>
                <div>
                    <span class="fs-sm fw-light text-color date">{{ $post->created_at->format('Y-m-d') }}</span>
                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                        <h6 class="mb-0 mt-3 fw-regular">{{ $post->title }}</h6>
                    </a>
                </div>
            </li>
        @endforeach
        </ul>
    @endif
</div>
