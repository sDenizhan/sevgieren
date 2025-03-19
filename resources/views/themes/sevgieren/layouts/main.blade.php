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
                    <div class="col-xxl-3 col-xl-2 col-lg-3 ps-lg-5 ps-xl-0 col-md-6">
                        <div class="ur3-footer-widget">
                            <h4 class="text-white widget-title mb-40 fw-normal">Useful Links</h4>
                            <ul class="ur3-footer-links">
                                <li><a href="#">Collections</a></li>
                                <li><a href="#">Deals</a></li>
                                <li><a href="#">Necklaces</a></li>
                                <li><a href="#">Bestsellers</a></li>
                                <li><a href="#">Combos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-3 ps-xl-5 ps-xxl-0 col-lg-3 col-md-6">
                        <div class="ur3-footer-widget">
                            <h4 class="text-white widget-title mb-40 fw-normal">Useful Links</h4>
                            <ul class="ur3-footer-links">
                                <li><a href="#">Collections</a></li>
                                <li><a href="#">Deals</a></li>
                                <li><a href="#">Necklaces</a></li>
                                <li><a href="#">Bestsellers</a></li>
                                <li><a href="#">Combos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xxl-2 offset-xxl-1 col-xl-2 col-lg-3 col-md-6">
                        <div class="ur3-footer-widget">
                            <h4 class="text-white widget-title mb-40 fw-normal">Useful Links</h4>
                            <ul class="ur3-footer-links">
                                <li><a href="#">Collections</a></li>
                                <li><a href="#">Deals</a></li>
                                <li><a href="#">Necklaces</a></li>
                                <li><a href="#">Bestsellers</a></li>
                                <li><a href="#">Combos</a></li>
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


<!--product modal start-->
<div class="modal fade" id="product_quickview">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            <div class="row">
                <div class="col-xl-6">
                    <div class="feature-image bg-light">
                        <img src="{{ asset('themes/sevgieren/assets/images/products/product-lg-1.png') }}"
                             alt="not found" class="img-fluid">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single-product-info">
                        <a href="shop-list.html"
                           class="category-btn text-uppercase fs-sm secondary-text-color d-inline-block mb-3">Neaklace</a>
                        <h3 class="mb-4">Tony Gold Neaklace</h3>
                        <div class="item-reivew d-flex align-items-center gap-3">
                            <ul class="rating-star d-flex align-items-center gap-1 fs-sm">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <span class="primary-text-color fw-light">(1 Customer review)</span>
                        </div>
                        <div class="pricing mt-4">
                            <span class="primary-text-color">$260.00</span>
                            <span class="pricing-devider primary-text-color">-</span>
                            <span class="primary-text-color">$360.00</span>
                        </div>
                        <div class="short-description mt-40">
                            <p class="mb-0 fw-light">Eget taciti odio cum habitant egestas conubia turpis phasellus,
                                ante parturient
                                donec duis primis nam faucibus augue malesuada venenatis</p>
                        </div>
                        <ul class="single-product-features mt-40">
                            <li>
                                    <span class="me-2">
                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.5 6H14.2812L11.125 9.15625C10.9375 9.34375 10.9375 9.6875 11.125 9.875C11.3125 10.0625 11.6562 10.0625 11.8438 9.875L15.8438 5.875C15.9375 5.78125 16 5.65625 16 5.5C16 5.375 15.9375 5.25 15.8438 5.15625L11.8438 1.15625C11.6562 0.96875 11.3125 0.96875 11.125 1.15625C10.9375 1.34375 10.9375 1.6875 11.125 1.875L14.2812 5H0.5C0.21875 5 0 5.25 0 5.5C0 5.78125 0.21875 6 0.5 6ZM15.5 12H1.6875L4.84375 8.875C5.03125 8.6875 5.03125 8.34375 4.84375 8.15625C4.65625 7.96875 4.3125 7.96875 4.125 8.15625L0.125 12.1562C0.03125 12.25 0 12.375 0 12.5C0 12.6562 0.03125 12.7812 0.125 12.875L4.125 16.875C4.3125 17.0625 4.65625 17.0625 4.84375 16.875C5.03125 16.6875 5.03125 16.3438 4.84375 16.1562L1.6875 13H15.5C15.75 13 16 12.7812 16 12.5C16 12.25 15.75 12 15.5 12Z"
                                                fill="#121111"/>
                                        </svg>
                                    </span>
                                Free returns
                            </li>
                            <li>
                                    <span class="me-2">
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 13C0.875 13 0 12.125 0 11V2C0 0.90625 0.875 0 2 0H11C12.0938 0 13 0.90625 13 2V3H15.0312C15.4688 3 15.875 3.21875 16.1562 3.53125L18.625 6.40625C18.8438 6.6875 19 7.03125 19 7.375V12H19.5C19.75 12 20 12.25 20 12.5C20 12.7812 19.75 13 19.5 13H18C18 14.6562 16.6562 16 15 16C13.3125 16 12 14.6562 12 13H7.96875C7.96875 14.6562 6.65625 16 4.96875 16C3.3125 16 1.96875 14.6562 1.96875 13H2ZM1 2V11C1 11.5625 1.4375 12 2 12H2.15625C2.5625 10.8438 3.6875 10 5 10C6.28125 10 7.40625 10.8438 7.8125 12H12V2C12 1.46875 11.5312 1 11 1H2C1.4375 1 1 1.46875 1 2ZM17.8125 7L15.4062 4.1875C15.3125 4.0625 15.1562 4 15.0312 4H13V7H17.8125ZM13 8V10.7812C13.5 10.3125 14.2188 10 15 10C16.2812 10 17.4062 10.8438 17.8125 12H18V8H13ZM5 11C3.875 11 3 11.9062 3 13C3 14.125 3.875 15 5 15C6.09375 15 7 14.125 7 13C7 11.9062 6.09375 11 5 11ZM15 15C16.0938 15 17 14.125 17 13C17 11.9062 16.0938 11 15 11C13.875 11 13 11.9062 13 13C13 14.125 13.875 15 15 15Z"
                                                fill="#121111"/>
                                        </svg>
                                    </span>
                                Free shipping via DHL, fully insured
                            </li>
                            <li>
                                    <span class="me-2">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.34375 10.375C7.15625 10.5625 6.8125 10.5625 6.625 10.375L4.625 8.375C4.4375 8.1875 4.4375 7.84375 4.625 7.65625C4.8125 7.46875 5.15625 7.46875 5.34375 7.65625L7 9.3125L10.625 5.65625C10.8125 5.46875 11.1562 5.46875 11.3438 5.65625C11.5312 5.84375 11.5312 6.1875 11.3438 6.375L7.34375 10.375ZM16 8C16 12.4375 12.4062 16 8 16C3.5625 16 0 12.4375 0 8C0 3.59375 3.5625 0 8 0C12.4062 0 16 3.59375 16 8ZM8 1C4.125 1 1 4.15625 1 8C1 11.875 4.125 15 8 15C11.8438 15 15 11.875 15 8C15 4.15625 11.8438 1 8 1Z"
                                                fill="#121111"/>
                                        </svg>
                                    </span>
                                All taxes and customer duties included
                            </li>
                        </ul>
                        <div class="d-flex align-items-center mt-40 gap-3 flex-wrap">
                            <div class="quantity-box">
                                <button type="button" class="drecrement"><i class="fa-solid fa-minus"></i></button>
                                <input type="text" value="1">
                                <button type="button" class="drecrement"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <button type="button" class="add_to_cart_btn">Add to Cart<span class="ms-2"><i
                                        class="fa-solid fa-basket-shopping"></i></span></button>
                            <button type="button" class="wish_btn">
                                    <span class="me-2">
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                Add to Wishlist
                            </button>
                        </div>
                        <ul class="product-meta mt-32">
                            <li>SKU:17</li>
                            <li>Categories: Light Bulb, Table</li>
                            <li>Tags: Iluminate, Textured</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product modal end-->

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
