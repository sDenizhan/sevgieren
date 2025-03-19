@extends('themes.main.layouts.main')
@section('pre-content')
    <div class="breadcrumbs-wrap no-title">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li><a href="{{ url(getTemplateSlug('courses')) }}">Eğitimler</a></li>
                <li>{{ $course->title }}</li>
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
                        <h1 class="entry-title">{{ $course->title }}</h1>
                        <div class="flex-row justify-content-center">
                            <div class="our-info">
                                <div class="info-item">
                                    <i class="licon-clock3"></i>
                                    <div class="wrapper">
                                        <span>{{ $course->start_date->translatedFormat('d F Y') }} - {{ $course->end_date->translatedFormat('d F Y') }}</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="licon-signal"></i>
                                    <div class="wrapper">
                                       {{ \App\Enums\CourseLevels::lang($course->level) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="thumbnail-attachment video-holder">
                        <img src="{{ getStoragedImage($course->featured_image) }}" alt="{{ $course->title }}">
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="post-nav" style="margin-bottom: 20px !important;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="switcher">
                                            <a href="javascript:void(0)" class="post-button active">Eğitim Durumu</a>
                                            <a href="javascript:void(0)" class="post-button">{{ \App\Enums\Status::lang($course->status) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                            </div>

                            {!! $course->description !!}

                            <div class="content-element10">
                                <h4>Yorum Yapın</h4>
                                <p>Mail Adresiniz gösterilmeyecektir. <span class="required"></span> işaretli alanlar zorunludur.</p>
                                <livewire:main.courses.forms.comment :course_id="$course->id" />

                                <h4 style="margin-top: 30px">Yorumlar</h4>
                                <livewire:main.courses.comments :course_id="$course->id" />
                            </div>

                        </div>
                        <aside id="sidebar" class="col-lg-4 col-md-12">
                            <div class="widget">
                                <div class="widget-bg">
                                    <div class="team-holder">
                                        <div class="team-item">
                                            <div class="team-desc" style="padding: unset !important;">
                                                <div class="member-info">
                                                    <h6 class="member-name">Eğitim Tarihleri</h6>
                                                    <h6 class="member-position">
                                                        <p style="font-size: 18px; margin-top: 10px">
                                                            <span style="font-weight: 500">Başlangıç Tarihi:</span></p>
                                                        <p style="font-size: 20px">{{ $course->start_date->translatedFormat('d F Y') }}</p>
                                                        <p style="font-size: 18px">
                                                            <span style="font-weight: 500">Bitiş Tarihi:</span>
                                                        </p>
                                                        <p style="font-size: 20px">{{ $course->end_date->translatedFormat('d F Y') }}</p>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-bg" style="background: #ffdf008f">
                                    <h6 class="widget-title">Basvuru Yap</h6>
                                    <livewire:main.courses.forms.application :course_id="$course->id" />
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
