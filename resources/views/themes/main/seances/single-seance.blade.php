@extends('themes.main.layouts.main')
@section('pre-content')
    <div class="breadcrumbs-wrap no-title">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li><a href="{{ url(getTemplateSlug('seances')) }}">Seanslar</a></li>
                <li>{{ $seance->title }}</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="entry-box single-post">
                <div class="entry">
                    <div class="entry-body align-center">
                        <h1 class="entry-title">{{ $seance->title }}</h1>
                        <div class="flex-row justify-content-center">
                            <div class="our-info">
                            </div>
                        </div>
                    </div>

                    <div class="thumbnail-attachment video-holder">
                        <img src="{{ getStoragedImage($seance->featured_image) }}" alt="{{ $seance->title }}">
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="post-nav" style="margin-bottom: 20px !important;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="switcher">
                                            <a href="javascript:void(0)" class="post-button active">Seans Durumu</a>
                                            <a href="javascript:void(0)" class="post-button">{{ \App\Enums\Status::lang($seance->status) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                            </div>

                            {!! $seance->description !!}

                            @if($members->isNotEmpty())
                                <h4 class="section-title">Uygulayıcılar</h4>
                                <div class="portfolio-holder">
                                    <div class="flex-row item-col-3">
                                        @foreach ($members as $member) 
                                            <div class="project">
                                                <div class="project-image" style="">
                                                    <img src="{{ getStoragedImage($member['image']) }}" alt="">
                                                </div>
                                                <div class="project-description">
                                                    <h5 class="project-title"><a href="#">{{ $member['name_surname'] }}</a></h5>
                                                    <a href="{{ $member['link'] }}" class="btn btn-big" target="_blank">Satın Al</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="content-element10" style="margin-top: 50px">
                                <h4>Yorum Yapın</h4>
                                <p>Mail Adresiniz gösterilmeyecektir. <span class="required"></span> işaretli alanlar zorunludur.</p>
                                <livewire:main.seances.forms.comment :seance_id="$seance->id" />

                                <h4 style="margin-top: 30px">Yorumlar</h4>
                                <livewire:main.seances.list-comments :seance_id="$seance->id" />
                            </div>

                        </div>
                        {{-- 
                        <aside id="sidebar" class="col-lg-4 col-md-12">
                            <div class="widget">
                                <div class="widget-bg" style="background: #ffdf008f">
                                    <h6 class="widget-title">Basvuru Yap</h6>
                                    <livewire:main.seances.forms.application :seance_id="$seance->id" />
                                </div>
                            </div>
                        </aside>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
