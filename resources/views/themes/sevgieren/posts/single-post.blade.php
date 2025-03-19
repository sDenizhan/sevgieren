@extends('themes.sevgieren.layouts.main')
@section('pre-content')
    <div class="breadcrumb-section pt-40 pb-40" data-background="{{ asset('themes/sevgieren/assets/images/shapes/breadcrumb-bg.jpg') }}">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0">
                <a href="{{ url('/') }}">Home</a> / <span>Blog / </span> <span class="primary-text-color">{{ $post->title }}</span></p>
        </div>
    </div>
@endsection
@section('content')
    <section class="blog-single-section ptb-120 bg-white">
        <div class="container">
            <div class="row g-5 g-xl-4">
                <div class="col-xl-8">
                    <div class="blog-single-content">
                        <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                            <img src="{{ getStoragedImage($post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-5">
                        </a>

                        <p class="fs-sm fw-light text-color mb-3">{{ $post->created_at->format('Y-m-d') }}</p>
                        <h3 class="mb-40 fw-normal">{{ $post->title }}</h3>

                        <p class="fw-light text-color">
                            {!! $post->content !!}
                        </p>

                        <div class="spacer mt-60 mb-60"></div>

                        <div class="blog-comments">
                            <h3 class="mb-2 fw-normal">Comments</h3>
                            @if(count($post->comments))
                                <ul class="blog-comment-list">
                                    @foreach($post->comments as $comment)
                                        <li class="d-flex align-items-center gap-4 flex-wrap flex-md-nowrap">
                                            <div class="client-thumb">
                                                <img src="{{ getUserAvatar('', $comment->email) }}" alt="{{ $post->title }}" class="img-fluid">
                                            </div>
                                            <div class="position-relative">
                                                <span class="fw-light fs-sm text-color">{{ $comment->created_at->format('Y-m-d H:i') }}</span>
                                                <h4 class="mb-3 mt-1">{{ $comment->name_surname }}</h4>
                                                <p class="fw-light text-color mb-0">
                                                    {{ $comment->message }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="alert alert-info">
                                    <p>No comments have been added yet! Add a Comment Now!</p>
                                </div>
                            @endif
                        </div>

                        <livewire:sevgieren.post-comment-form :post_id="$post->id" />

                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="blog-sidebar">
                        <x-sevgieren.posts.widgets.post-categories />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
