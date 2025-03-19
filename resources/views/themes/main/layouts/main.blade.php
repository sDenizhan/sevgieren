<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ getSEO('title') }}</title>
    <meta name="description" content="{{ getSEO('description')  }}">
    {{ getSEO('metatags') }}
    <meta name="author" content="Süleyman DENİZHAN">

    @livewireStyles()

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CPrata" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/font/demo-files/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/plugins/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/plugins/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/css/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/assets/css/responsive.css') }}">
    @stack('header')
    </head>
<body>
<!-- <div class="loader"></div> -->

<div id="wrapper" class="wrapper-container">
    <nav id="mobile-advanced" class="mobile-advanced"></nav>
    <header id="header" class="header sticky-header @yield('header-css')">
        <div class="top-header">
            <div class="flex-row align-items-center justify-content-between"><!-- logo -->
                <div class="logo-wrap">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ getStoragedImage(setting('site_logo'))  }}" alt="{{ setting('site_name') }}" style="max-height: 200px !important;">
                    </a>
                </div>
                <div class="menu-holder">
                    <div class="menu-wrap">
                        <div class="nav-item">
                            @php($menu = getMenu('header-menu'))
                            @if(!empty($menu))
                                <nav id="main-navigation" class="main-navigation">
                                    <ul id="menu" class="clearfix">
                                        @foreach($menu->items as $item)
                                            <li>
                                                <a href="{{ $item['data']['url'] }}">{{ $item['label'] }}</a>
                                                @if($item['children'])
                                                    <div class="sub-menu-wrap">
                                                        <ul>
                                                            @foreach($item['children'] as $sub)
                                                                <li><a href="{{ $sub['data']['url'] }}">{{ $sub['label'] }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('pre-content')

    <div id="content">
        @yield('content')
    </div>

    <footer id="footer" class="footer" data-bg="{{ asset('themes/main/assets/images/1920x390_bg1.jpg') }}">
        <div class="logo" style="left: 20%; top: 10%">
            <img src="{{ getStoragedImage(setting('site_logo'))  }}" alt="" style="max-height: 175px">
        </div>
        <div class="container wide-style"><!-- main footer -->
            <div class="main-footer">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="widget">
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4 col-md-12">
                        <div class="widget"><h6 class="widget-title">Sosyal Ağlarımız</h6>
                            <ul class="social-icons">
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
            </div>
            @php($menu = getMenu('footer-menu'))
            @if(!empty($menu))
                <ul class="menu-list">
                    @foreach($menu->items as $item)
                        <li><a href="{{ $item['data']['url'] }}">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            @endif
            <div class="copyright"><p>{{ setting('copyright_text') }}</p></div>
        </div>
    </footer>
</div>
@livewireScripts()

<script src="{{ asset('themes/main/assets/js/libs/jquery.modernizr.js') }}"></script>
<script src="{{ asset('themes/main/assets/js/libs/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('themes/main/assets/js/libs/jquery-ui.min.js') }}"></script>
<!--
<script src="{{ asset('themes/main/assets/js/libs/retina.min.js') }}"></script>
-->
<script
    src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyBN4XjYeIQbUspEkxCV2dhVPSoScBkIoic"></script>
<script src="{{ asset('themes/main/assets/plugins/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('themes/main/assets/plugins/jquery.localScroll.min.js') }}"></script>
<script src="{{ asset('themes/main/assets/plugins/instafeed.min.js') }}"></script>
<script src="{{ asset('themes/main/assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('themes/main/assets/plugins/mad.customselect.js') }}"></script>
<script src="{{ asset('themes/main/assets/plugins/revolution/js/jquery.themepunch.tools.min.js?ver=5.0') }}"></script>
<script
    src="{{ asset('themes/main/assets/plugins/revolution/js/jquery.themepunch.revolution.min.js?ver=5.0') }}"></script>
<script src="{{ asset('themes/main/assets/plugins/jquery.queryloader2.min.js') }}"></script>
<script src="{{ asset('themes/main/assets/plugins/owl.carousel.min.js') }}"></script>

@stack('pre-jquery')
<script src="{{ asset('themes/main/assets/js/plugins.js') }}"></script>
<script src="{{ asset('themes/main/assets/js/script.js') }}"></script>

@stack('footer')
</body>
</html>
