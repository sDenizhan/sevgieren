<div class="page-section parallax-section text-color-light" data-bg="{{ asset('themes/main/assets/images/1920x1000_bg1.jpg') }}">
    <div class="container wide2">
        <div class="content-element4">
            <div class="section-pre-title">Yorumlar</div>
            <h2 class="section-title">Katılımcılarımız Ne Diyor?</h2>
        </div>
        <div class="carousel-type-2">
            @if(!empty($comments))
                <div class="owl-carousel testimonial-holder" data-max-items="3"  data-autoplay="true">
                    @foreach($comments as $comment)
                        <a href="{{ $comment['link'] }}">
                            <div class="testimonial bg1">
                                <blockquote>
                                    <p>“{{ $comment['comment'] }}” </p>
                                    <div class="author-box">
                                        <span class="author-icon"><i class="svg"></i></span>
                                        <div class="author-info">
                                            <div class="author">{{ $comment['name_surname'] }}</div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </a>
                    @endforeach
                </div>
                <a href="{{ getTemplateSlug('courses') }}" class="btn btn-style-2">Eğitimlerimiz</a>
            @endif
        </div>
    </div>
</div>
