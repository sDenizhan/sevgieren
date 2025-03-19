@extends('themes.main.layouts.main')

@section('pre-content')
    <x-main.breadcrumb :data="$GLOBALS['pageData']" />
@endsection
@section('content')
    <div class="page-section">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-8 col-md-12">
                    <p>{{ getPageData('subtitle') }}</p>
                    <livewire:main.contact-form />
                </main>
                <aside id="sidebar" class="col-lg-4 col-md-12">
                    <div class="map-section">
                        <div class="our-info vr-type">
                            <div class="info-item">
                                <i class="licon-map-marker"></i>
                                <span class="post">Adres</span>
                                <h6>{{ setting('address') }}</h6>
                            </div>
                            <div class="info-item">
                                <i class="licon-telephone"></i>
                                <span class="post">Telefon Numarası</span>
                                <h6 content="telephone=no">{{ setting('phone_number') }}</h6>
                            </div>
                            <div class="info-item">
                                <i class="licon-at-sign"></i>
                                <span class="post">Email Addresi</span>
                                <h6>{{ setting('mail_address') }}</h6>
                            </div>
                            <div class="info-item">
                                <i class="licon-clock3"></i>
                                <span class="post">Sosyal Ağlar</span>

                                <ul class="social-icons var2">
                                    @if( ( $facebook = setting('facebook') ) != '' )
                                        <li><a href="{{ $facebook }}" target="_blank"><i class="icon-facebook"></i></a></li>
                                    @endif

                                    @if( ( $twitter = setting('twitter') ) != '' )
                                        <li><a href="{{ $twitter }}" target="_new"><i class="icon-twitter"></i></a></li>
                                    @endif

                                    @if( ( $instagram = setting('instagram') ) != '' )
                                        <li><a href="{{ $instagram }}" target="_new"><i class="icon-instagram-5"></i></a></li>
                                    @endif

                                    @if( ( $youtube = setting('youtube') ) != '' )
                                        <li><a href="{{ $youtube }}" target="_new"><i class="icon-youtube-play"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div> <!-- Page section -->
@endsection
