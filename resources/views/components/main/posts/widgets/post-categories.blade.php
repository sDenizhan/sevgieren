<div class="widget">
    <h6 class="widget-title">Kategoriler</h6>

    @if(isset($categories))
        <ul class="custom-list style-2">
            @foreach($categories as $category)
                <li><a href="{{ route('post.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    @endif
</div>

<div class="widget">
    <h6 class="widget-title">Son Yazılar</h6>
    <div class="entry-box entry-small style-2">
        @if(isset($latests))
            @foreach($latests as $post)
                <div class="entry">
                    <div class="thumbnail-attachment">
                        <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                            <img src="{{ getStoragedImage($post->image) }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="entry-body">
                        <h6 class="entry-title">
                            <a href="{{ route('post.details', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                        </h6>
                        <div class="entry-meta">
                            <time class="entry-date" datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('d F Y') }}</time>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
