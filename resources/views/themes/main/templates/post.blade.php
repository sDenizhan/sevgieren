@extends('themes.main.layouts.main')

@section('pre-content')
    <div class="breadcrumbs-wrap">
        <div class="container">
            <h1 class="page-title">{{ getPageData('title') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-8 col-md-12">
                    @if($posts->isNotEmpty())
                        <div class="content-element5">
                            <div class="entry-box list-type half-col">
                                @foreach($posts as $post)
                                    <div class="entry">
                                        <div class="thumbnail-attachment">
                                            <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                                                <img src="{{ getStoragedImage($post->image) }}" alt="{{ $post->title }}">
                                            </a>
                                            <div class="entry-label">{{ $post->category->name }}</div>
                                        </div>
                                        <div class="entry-body">
                                            <h5 class="entry-title">
                                                <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>
                                            <div class="entry-meta">
                                                <time class="entry-date" datetime="2018-12-21">{{ $post->created_at->format('d F Y') }}</time>
                                            </div>
                                            {!! str($post->content)->stripTags('<p><br />')->limit(500) !!}
                                            <div class="flex-row justify-content-between">
                                                <a href="{{ route('post.details', ['slug' => $post->slug]) }}" class="btn btn-small btn-style-4">Devamını Oku</a>
                                                <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{ $posts->links('posts.pagination') }}
                    @else
                        <div class="alert alert-danger">
                            <p>Henüz bir blog yazısı eklenmemiş!</p>
                        </div>
                    @endif
                </main>
                <aside id="sidebar" class="col-lg-4 col-md-12">
                    <x-main.posts.widgets.post-categories />
                </aside>
            </div>
        </div>
    </div>
@endsection
