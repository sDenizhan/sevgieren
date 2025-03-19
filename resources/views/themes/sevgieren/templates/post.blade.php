@extends('themes.sevgieren.layouts.main')

@section('pre-content')
    <div class="breadcrumb-section pt-40 pb-40" data-background="{{ asset('themes/sevgieren/assets/images/shapes/breadcrumb-bg.jpg') }}">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0">
                <a href="{{ url('/') }}">Home</a> / <span class="primary-text-color">Blog</span></p>
        </div>
    </div>
@endsection


@section('content')
    <div class="bg-white ptb-120">
        <div class="container">
            <div class="row g-5 g-md-4">
                @if($posts->isNotEmpty())
                    @foreach($posts as $post)
                        <div class="col-xl-4 col-md-6">
                            <article class="ur-blog-card position-relative">
                                <span class="date py-2 px-4 fs-sm text-white primary-bg-color position-absolute z-1 start-0 top-0">
                                    {{ $post->created_at->format('d M') }}
                                </span>
                                <div class="feature-image overflow-hidden">
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                                        <img src="{{ getStoragedImage($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="card-content mt-32">
                                    <span class="fs-sm fw-light">{{ $post->category->name }}</span>
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                                        <h4 class="fw-normal my-3">{{ $post->title }}</h4>
                                    </a>
                                    <p class="mb-4 fw-light">
                                        {!! str($post->content)->stripTags('<p><br />')->limit(100) !!}
                                    </p>
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}" class="explore-btn">Read More</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <p>Henüz bir blog yazısı eklenmemiş!</p>
                        </div>
                    </div>
                @endif
            </div>
            @if ($posts->isNotEmpty())
                <div class="mt-5 text-center">
                    {{ $posts->links('posts.pagination') }}
                </div>
            @endif
        </div>
    </div>
@endsection
