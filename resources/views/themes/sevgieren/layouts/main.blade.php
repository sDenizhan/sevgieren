<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ getSEO('title') }}</title>
    <meta name="description" content="{{ getSEO('description')  }}">
    {{ getSEO('metatags') }}

    @livewireStyles()

    <!--Essential css files-->
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/sevgieren/assets/css/style.css') }}">

    <!--favicon-->
    <link rel="icon" href="{{ asset('themes/sevgieren/assets/images/favicon.png') }}') }}" type="image/png">

    @stack('header')

</head>
<body>

<div class="preloader">
    <h1 class="display-1">{{ Config::get('app.name') }}</h1>
    <div class="preload-progress">
        <span></span>
    </div>
</div>

<header class="ur_header_section primary-bg-color header-sticky">
    <div class="topbar py-2 bottom-border d-none d-lg-block">
        <div class="container-large">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="topbar-info d-flex align-items-center gap-48 flex-wrap">
                        @if (setting('phone_number'))
                            <span class="text-white item-single">
                                <a href="tel:{{ setting('phone_number') }}" class="text-white">
                                    <i class="fas fa-phone-alt"></i> {{ setting('phone_number') }}
                                </a>
                            </span>
                        @endif

                        @if(setting('mail_address'))
                            <span class="text-white item-single">
                                <a href="mailto:{{ setting('mail_address') }}" class="text-white">
                                    <i class="fas fa-envelope"></i> {{ setting('mail_address') }}
                                </a>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4">
                    <div class="d-flex align-items-center justify-content-end gap-48 topbar-info flex-wrap">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-wrapper">
        <div class="container-large">
            <div class="row align-items-center">
                <div class="col-xl-2 col-6">
                    <a href="{{ url('/') }}" class="logo-white">
                        <img src="{{ getStoragedImage(setting('site_logo'))  }}" alt="{{ setting('site_name') }}" class="img-fluid">
                    </a>
                </div>
                <div class="col-xxl-7 col-xl-8 d-none d-xl-block">
                    @php($menu = getMenu('header-menu'))
                    @if(!empty($menu))
                        <nav id="main-navigation" class="ur-navmenu">
                            <ul id="menu">
                                @foreach($menu->items as $item)
                                    <li @class([
                                                'has-submenu' => !empty($item['children'])
                                                ])>
                                        <a href="{{ !empty($item['children']) ? 'javascript:void(0)' : $item['data']['url'] }}">{{ $item['label'] }}</a>
                                        @if($item['children'])
                                            <ul class="submenu-wrapper">
                                                @foreach($item['children'] as $sub)
                                                    <li><a href="{{ $sub['data']['url'] }}">{{ $sub['label'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    @endif
                </div>
                <div class="col-xxl-3 col-xl-2 col-6">
                    <div class="ur-header-right d-flex align-items-center justify-content-end">
                        <div class="header-toggle">
                            <button type="button" class="ur3-header-toggle offcanvus-toggle d-none d-xl-inline-block">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <button type="button" class="ur3-header-toggle mobile-menu-toggle d-xl-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="offcanvus-box position-fixed bg-white">
    <a href="javascript:void(0)" class="offcanvus-close"><i class="fa-solid fa-xmark"></i></a>
    <div class="content-top mb-100">
        <a href="{{ url('/') }}" class="offcanvus-logo">
            <img src="{{ getStoragedImage(setting('site_logo'))  }}" alt="logo">
        </a>
        <p class="mb-0 mt-32 fw-light">{{ setting('address') }}<br />{{ setting('mail_address') }}<br />{{ setting('phone_number') }}</p>
    </div>
</div>

<div class="mobile-menu">
    <a href="javascript:void(0)" class="close"><i class="fas fa-xmark"></i></a>
    <a href="{{ url('/') }}" class="logo">
        <img src="{{ getStoragedImage(setting('site_logo')) }}" alt="logo" class="img-fluid">
    </a>
    @php($menu = getMenu('header-menu'))
    @if(!empty($menu))
        <ul class="mobile-nav-menu">
            @foreach($menu->items as $item)
                <li @class([
                            'has-submenu' => !empty($item['children'])
                            ])>
                    <a href="{{ !empty($item['children']) ? 'javascript:void(0)' : $item['data']['url'] }}">{{ $item['label'] }}</a>
                    @if($item['children'])
                        <i class="fas fa-angle-down"></i>
                        <ul class="submenu-wrapper">
                            @foreach($item['children'] as $sub)
                                <li><a href="{{ $sub['data']['url'] }}">{{ $sub['label'] }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>


@yield('pre-content')
@yield('content')

<!--footer section start-->
<footer class="footer-style-3 primary-bg-color pt-120 pb-3 pb-xl-0">
    <div class="container-large">
        <div class="row">
            <div class="col-xl-8">
                <div class="row g-4">
                    <div class="col-xxl-4 col-xl-5 col-lg-3 col-md-6">
                        <div class="ur3-footer-widget">
                            <a href="{{ url('/') }}" class="footer-logo">
                                <img src="{{ getStoragedImage(setting('site_logo')) }}" alt="logo" class="img-fluid">
                            </a>
                            <span class="text-white fw-medium fs-sm d-block mt-40">Quick Contact</span>
                            <a href="#"><h3 class="text-white fw-normal mt-1">{{ setting('phone_number') ?? '' }}</h3></a>
                            <div class="ur3-footer-social mt-32">
                                @if(setting('facebook'))
                                    <a href="{{ setting('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                                @endif

                                @if(setting('twitter'))
                                    <a href="{{ setting('twitter') }}"><i class="fab fa-twitter"></i></a>
                                @endif

                                @if(setting('instagram'))
                                    <a href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                                @endif

                                @if(setting('youtube'))
                                    <a href="{{ setting('youtube') }}"><i class="fab fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @php($menu = getMenu('footer-menu'))
                    @if(!empty($menu))
                        <div class="col-xxl-3 col-xl-2 col-lg-3 ps-lg-5 ps-xl-0 col-md-6">
                            <div class="ur3-footer-widget">
                                <h4 class="text-white widget-title mb-40 fw-normal">Quick Links</h4>
                                <ul class="ur3-footer-links">
                                @foreach($menu->items as $item)
                                    <li>
                                        <a href="{{ $item['data']['url'] }}">{{ $item['label'] }}</a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @php($menu = getMenu('footer-menu-2'))
                    @if(!empty($menu))
                        <div class="col-xxl-3 col-xl-2 col-lg-3 ps-lg-5 ps-xl-0 col-md-6">
                            <div class="ur3-footer-widget">
                                <h4 class="text-white widget-title mb-40 fw-normal">Quick Links</h4>
                                <ul class="ur3-footer-links">
                                    @foreach($menu->items as $item)
                                        <li>
                                            <a href="{{ $item['data']['url'] }}">{{ $item['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="col-xxl-2 offset-xxl-1 col-xl-2 col-lg-3 col-md-6">
                        <div class="ur3-footer-widget">
                            <h4 class="text-white widget-title mb-40 fw-normal">Social Networks</h4>
                            <ul class="ur3-footer-links">
                                @if(setting('facebook'))
                                    <li><a href="{{ setting('facebook') }}">Facebook</a></li>
                                @endif

                                @if(setting('twitter'))
                                    <li><a href="{{ setting('twitter') }}">Twitter</a></li>
                                @endif

                                @if(setting('instagram'))
                                    <li><a href="{{ setting('instagram') }}">Instagram</a></li>
                                @endif

                                @if(setting('youtube'))
                                    <li><a href="{{ setting('youtube') }}">Youtube</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="ur3-footer-copyright">
                    <div class="row align-items-center g-3">
                        <div class="col-md-6">
                            <p class="mb-0 text-white">{{ setting('copyright_text') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer section end-->


<!--scroll top button start-->
<button type="button" class="scroll-top-btn"><i class="fa-solid fa-hand-pointer"></i></button>
<!--scroll top button end-->

@stack('pre-jquery')

<!--Esential Js Files-->
<script src="{{ asset('themes/sevgieren/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/slick.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/nice-select.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/fancybox.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/countdown.min.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/wow.js') }}"></script>
<script src="{{ asset('themes/sevgieren/assets/js/script.js') }}"></script>

@livewireScripts()

@stack('footer')

</body>
</html>
