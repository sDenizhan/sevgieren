@extends('themes.main.layouts.main')
@section('pre-content')
    <div class="breadcrumbs-wrap no-title">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li><a href="{{ url(getTemplateSlug('post')) }}">Blog</a></li>
                <li>{{ $post->title }}</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-8 col-md-12">
                    <div class="content-element3">
                        <div class="entry-box single-entry">
                            <div class="entry-body content-element4">
                                <h1 class="entry-title">
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                </h1>
                                <div class="entry-meta">
                                    <time class="entry-date" datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('d F Y') }}</time>
                                </div>
                            </div><!-- Entry -->
                            <div class="entry">
                                <div class="thumbnail-attachment">
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                                        <img src="{{ getStoragedImage($post->image) }}" alt="{{ $post->title }}">
                                    </a>
                                    <div class="entry-label">{{ $post->category->name }}</div>
                                </div>
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="post-nav">
                        <div class="row">
                            @if(isset($previous))
                                <div class="col-6">
                                    <a href="{{ route('post.details', ['slug' => $previous->slug]) }}" class="link-text">Önceki Yazı</a>
                                    <h6><a href="{{ route('post.details', ['slug' => $previous->slug]) }}">{{$previous->title}}</a></h6>
                                </div>
                            @else
                                <div class="col-6"></div>
                            @endif

                            @if(isset($next))
                                <div class="col-6">
                                    <div class="align-right">
                                        <a href="{{ route('post.details', ['slug' => $next->slug]) }}" class="link-text">Sonraki Yazı</a>
                                        <h6><a href="{{ route('post.details', ['slug' => $next->slug]) }}">{{ $next->title }}</a></h6>
                                    </div>
                                </div>
                            @else
                                <div class="col-6"></div>
                            @endif
                        </div>
                    </div>
                    <div class="content-element">
                        <livewire:main.post-comment-form :post_id="$post->id" />
                        <h4>Yorumlar</h4>
                        @if(count($post->comments))
                            <ol class="comments-list">
                                @foreach($post->comments as $comment)
                                    <li class="comment">
                                        <article>
                                            <div class="gravatar">
                                                <a href="#">
                                                    <img src="{{ getUserAvatar('', $comment->email) }}" alt="{{ $post->title }}">
                                                </a>
                                            </div>
                                            <div class="comment-body">
                                                <header class="comment-meta">
                                                    <h6 class="comment-author"><a href="#">{{ $comment->name_surname }}</a></h6>
                                                    <div class="comment-info">
                                                        <time datetime="{{ $comment->created_at->format('Y-m-d H:i') }}" class="comment-date">
                                                            {{ $comment->created_at->format('Y-m-d H:i') }}
                                                        </time>
                                                    </div>
                                                </header>
                                                <p>{{ $comment->message }}</p>
                                            </div>
                                        </article>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="alert alert-info">
                                <p>Henüz yorum eklenmemiş! Hemen Yorum Ekleyin!</p>
                            </div>
                        @endif
                    </div>
                </main>
                <aside id="sidebar" class="col-lg-4 col-md-12">
                    <x-main.posts.widgets.post-categories />
                </aside>
            </div>
        </div>
    </div>
@endsection
