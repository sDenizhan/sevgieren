<section class="ur-cta-section position-relative z-1 ptb-120 overflow-hidden bg-white">
    <span class="bg-shape position-absolute z--1 light-bg"></span>
    <div class="container">
        <div class="row justify-content-center align-items-center g-5">
            <div class="col-xl-5 col-lg-5">
                <div class="feature-image-wrapper">
                    <div class="cta-image position-relative">
                        <img src="{{ getStoragedImage($data['image_1']) }}" alt="rings" class="img-fluid feature-image wow fadeInUp" data-wow-duration="0.5s">
                        <img src="{{ getStoragedImage($data['image_2']) }}" alt="shape" class="position-absolute shape-image d-none d-xl-block wow fadeInUp" data-wow-delay="0.3s">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1 col-lg-7 ps-xl-5">
                <div class="ps-2 ur-cta-content">
                    <h2 class="display-3 mb-32 fw-normal wow fadeInUp" data-wow-duration="0.5s">{{ $data['title'] }}</h2>
                    <h6 class="mb-50 fw-light text-color wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
                        {{ $data['sub_title'] }}
                    </h6>
                    @if(!empty($data['link']) && !empty($data['link_text']))
                        <a href="{{ $data['link'] }}" class="template-btn primary-btn wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s"><span>{{ $data['link_text'] }}</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
