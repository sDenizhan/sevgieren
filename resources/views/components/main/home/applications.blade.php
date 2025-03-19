<div class="page-section-bg half-bg-col with-phone-img">
    <div class="img-col-left">
        <div class="col-bg phone" data-bg="{{ asset('themes/main/assets/images/445x468_phone.jpg') }}"></div>
    </div>
    <div class="container">
        <div class="row align-content-center">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <h2>{{ $data['title'] }}</h2>
                <p class="content-element4">{{ $data['description'] }}</p>
                <div class="store-btns">
                    @if( ($playstore = $data['googleplay_url'] ) != '')
                        <a href="{{ $playstore }}"><img src="{{ asset('themes/main/assets/images/google_btn.png') }}" alt=""></a>
                    @endif

                    @if( ($appsotre = $data['appstore_url'] ) != '')
                        <a href="{{ $appsotre }}"><img src="{{ asset('themes/main/assets/images/app_btn.png') }}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
