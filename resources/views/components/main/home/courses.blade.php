<div class="page-section-bg half-bg-col text-color-light">
    <div class="img-col-left"><div class="col-bg" data-bg="{{ getStoragedImage($data['background_left']) ?? asset('themes/main/assets/images/960x884_bg2.jpg') }}"></div></div>
    <div class="img-col-right"><div class="col-bg" data-bg="{{ getStoragedImage($data['background_right']) ?? asset('themes/main/assets/images/960x884_bg1.jpg') }}"></div></div>

    <div class="container wide2">
        <div class="row align-content-center">
            <div class="col-lg-5">
                <div class="content-element4">
                    <div class="section-pre-title">{{ $data['small_text'] ?? '' }}</div>
                    <h2 class="section-title">{{ $data['title'] ?? '' }}</h2>
                </div>
                @if(!empty($courses))
                    <div class="carousel-type-2">
                        <div class="owl-carousel flex-row entry-box style-2" data-max-items="2" data-item-margin="30">
                            @foreach($courses as $course)
                                <div class="entry">
                                    <div class="thumbnail-attachment">
                                        <a href="{{ route('courses.details', ['slug' => $course->slug]) }}">
                                            <img src="{{ getStoragedImage($course->featured_image) }}" alt="{{ $course->title }}">
                                        </a>
                                    </div>
                                    <div class="entry-body">
                                        <h6 class="entry-title">
                                            <a href="{{ route('courses.details', ['slug' => $course->slug]) }}">{{ $course->title }}</a>
                                        </h6>
                                        <div class="our-info vr-type">
                                            <div class="info-item">
                                                <i class="licon-clock3"></i>
                                                <div class="wrapper">
                                                    <span>{{ $course->start_date->translatedFormat('d F Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <i class="licon-map-marker"></i>
                                                <div class="wrapper">
                                                    <span>{{ $course->end_date->translatedFormat('d F Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="entry-price">
                                            <a href="{{ route('courses.details', ['slug' => $course->slug]) }}">Başvur</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ getTemplateSlug('courses') }}" class="btn btn-style-2">Tüm Eğitimlerimiz</a>
                    </div>
                @endif
            </div>
            <div class="col-lg-6 offset-lg-1"></div>
        </div>
    </div>
</div>
