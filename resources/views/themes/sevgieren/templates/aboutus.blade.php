@extends('themes.sevgieren.layouts.main')

@section('pre-content')
    <div class="breadcrumb-section pt-40 pb-40" data-background="{{ asset('themes/sevgieren/assets/images/shapes/breadcrumb-bg.jpg') }}">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0">
                <a href="{{ url('/') }}">Home</a> / <span class="primary-text-color">{{ getPageData('title') }}</span></p>
        </div>
    </div>
@endsection

@section('content')
    @if(getPageData('is_bio_active') !== false )
        <section class="company-history bg-white ptb-120 overflow-hidden">
            <div class="container">
                <div class="row g-5 g-lg-4 align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        @if ( ($image = getPageData('bio_image')) != '')
                            <div class="image-wrapper">
                                <img src="{{ getStoragedImage(getPageData('bio_image')) }}" alt="" class="img-fluid">
                            </div>
                        @endif
                    </div>
                    <div class="ps-xl-5 col-xl-5 col-lg-6">
                        <div class="history-content">
                            <h2 class="display-3 fw-normal mb-5">{{ getPageData('bio_title') }}</h2>
                            <p class="mb-4 primary-text-color">{!! getPageData('bio_content') !!} </p>
                            @if ( ($contactUrl = getTemplateSlug('Contact')) != '')
                                <a href="{{ $contactUrl }}" class="template-btn primary-btn text-uppercase"><span>Contact Us</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (getPageData('is_video_active') !== false)
        <div class="video-box position-relative z-1 overflow-hidden" data-background="{{ getStoragedImage(getPageData('video_bg')) }}">
            <a href="{{ getPageData('video_url') }}" data-fancybox class="template-video-btn"><i class="fas fa-play"></i></a>
        </div>
    @endif

    @if(getPageData('is_mission_active') !== false)
        <section class="ptb-120 bg-white overflow-hidden">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-xl-4 col-lg-6">
                        <div class="theme-card">
                            <div class="overflow-hidden">
                                @if ( ($image = getPageData('mission_image')) != '')
                                    <img src="{{ getStoragedImage(getPageData('mission_image')) }}" alt="" class="img-fluid">
                                @endif
                            </div>
                            <div class="mt-40">
                                <h3 class="mb-30">{{ getPageData('mission_title') }}</h3>
                                <p class="fw-light"> {!! getPageData('mission_content') !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 d-none d-xl-block">
                        <div class="feature-image about-mission-box">
                            @if ( ($image = getPageData('goals_image')) != '')
                                <img src="{{ getStoragedImage(getPageData('goals_image')) }}" alt="" class="img-fluid">
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div>
                            <h3 class="mb-32">{{ getPageData('goal_title') }}</h3>
                            <p class="fw-light mb-40">{!! getPageData('goals_description') !!}</p>

                            @if ( !empty($goals = getPageData('goals')) )
                                <div class="accordion ur2-accordion" id="ur2_accordion">
                                    @foreach($goals as $goal)
                                        <div class="accordion-item">
                                            <div class="accordion-header">
                                                <a href="#acc_{{ $loop->index }}" data-bs-toggle="collapse" @class(['collapsed' => $loop->first])>{{ $goal['goals_title'] }}</a>
                                            </div>
                                            <div @class(['accordion-collapse','collapse', 'show' => $loop->first]) id="acc_{{ $loop->index }}" data-bs-parent="#ur2_accordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p class="mb-0 fw-light mb-0">{{ $goal['goals_content'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (getPageData('is_newsticker_active') !== false)
        <div class="ur-ticker-area overflow-hidden">
            <div class="ur-ticker-wrapper primary-bg-color">
                <div class="ur-ticker">
                    @if (!empty($newsticker = getPageData('newsticker')))
                        @foreach($newsticker as $ticker)
                            <span class="text-white text-uppercase">{{ $ticker['newsticker_title'] }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if (getPageData('is_blog_active') !== false)
        <section class="ur2-blog-section ptb-120 bg-white">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center">
                            <span class="text-uppercase secondary-text-color fs-sm">Weekly Updates</span>
                            <h2 class="mt-4 mb-60">Latest Blog Posts</h2>
                        </div>
                    </div>
                </div>
                @php( $posts = getPosts(getPageData('blog_count')))
                @if ( $posts->isNotEmpty() )
                <div class="row justify-content-center g-4">
                    @foreach($posts as $post)
                        <div class="col-xl-3 col-md-6">
                            <article class="ur2-blog-card mb-4 position-relative">
                                <div class="feature-image overflow-hidden">
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                                        <img src="{{ getStoragedImage($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="blog-content mt-32">
                                    <span class="fw-light">{{ $post->created_at->format('d M') }}</span>
                                    <span class="secondary-text-color fw-light">{{ $post->category->name }}</span>
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}">
                                        <h4 class="mb-32 mt-4 h5">{{ $post->title }}</h4>
                                    </a>
                                    <a href="{{ route('post.details', ['slug' => $post->slug]) }}" class="explore-btn fs-sm">Read More</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
    @endif

@endsection
