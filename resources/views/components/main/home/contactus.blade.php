<div class="page-section parallax-section text-color-light" data-bg="{{ asset('themes/main/assets/images/1920x1000_bg2.jpg') }}">
    <div class="container wide2">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="content-element5">
                    <div class="section-pre-title">{{ $data['subtitle'] }}</div>
                    <h2 class="section-title">{{ $data['title'] }}</h2>
                </div>
                <p class="content-element3">
                    {{ $data['description'] }}
                </p>
                <livewire:main.contact-form />
            </div>
            <div class="col-lg-4 col-md-12 offset-lg-1">
                <div class="our-info style-2 vr-type var2">
                    <div class="info-item">
                        <i class="licon-map-marker"></i>
                        <div class="wrapper">
                            <span class="info-cat">Adresimiz</span>
                        </div>
                        <h5 class="info-title">{{ setting('address') }}</h5>
                    </div>

                    <div class="info-item">
                        <i class="licon-telephone"></i>
                        <div class="wrapper">
                            <span class="info-cat">Telefon Numarası</span>
                        </div>
                        <h5 class="info-title" content="telephone=no">{{ setting('phone_number') }}</h5>
                    </div>

                    <div class="info-item">
                        <i class="licon-at-sign"></i>
                        <div class="wrapper">
                            <span class="info-cat">Email Adresimiz</span>
                        </div>
                        <h5 class="info-title">{{ setting('mail_address') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
