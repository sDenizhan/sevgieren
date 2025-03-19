@extends('themes.main.layouts.frontend.main')

@section('content')
    <section class="hero-page service-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-container-hero">
                                <div class="hero-contain">
                                    @if(($title = getPageData('title')) != '')
                                        <h3>{!! $title !!}</h3>
                                    @endif
                                    @if( ($subtitle = getPageData('subtitle')) != '')
                                        <p>{!! $subtitle !!}</p>
                                    @endif
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="63" height="156" viewBox="0 0 63 156" fill="none">
                                    <path d="M21.7061 1.59229C28.8686 10.2016 37.8435 17.5723 43.1936 27.4203C66.7439 70.7693 45.6158 120.367 6.03702 145.833" stroke="#FF8267" stroke-width="3" stroke-dasharray="8"></path>
                                    <path d="M5.62623 130.618C1.8614 155.25 -5.29347 149.535 17.3496 150.883" stroke="#FF8267" stroke-width="3"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @if( ( $image = getPageData('image')) != '')
                                <img src="{{ getStoragedImage($image) }}" alt="{{ getPageData('title') }}" class="image-service-filter-top">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="section-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="icon-and-select">
                                        <div class="icon-select">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30">
                                                <g id="idea-svgrepo-com" transform="translate(-3.518)">
                                                    <path id="Path_17" data-name="Path 17" d="M63.42,51.743c-4.5,0-8.156,3.333-8.156,7.43a6.934,6.934,0,0,0,1.744,4.58c.225.261.462.511.712.776l.014.015a7.2,7.2,0,0,1,1.855,2.635,4.208,4.208,0,0,1,.073.994v.568a.99.99,0,0,0,1.032.94H66.1a.99.99,0,0,0,1.032-.94v-.574a3.659,3.659,0,0,1,.071-.92,8.071,8.071,0,0,1,1.958-2.759l.034-.036c.226-.242.439-.47.633-.694a6.934,6.934,0,0,0,1.746-4.583C71.574,55.076,67.916,51.743,63.42,51.743Zm4.786,10.85c-.17.2-.37.412-.583.639l-.042.045a9.38,9.38,0,0,0-2.368,3.469,3.88,3.88,0,0,0-.142,1.054H61.725a4.09,4.09,0,0,0-.143-1.113,8.837,8.837,0,0,0-2.284-3.37l-.014-.015c-.235-.248-.456-.482-.653-.71a5.174,5.174,0,0,1-1.3-3.418,6.117,6.117,0,0,1,12.181,0A5.174,5.174,0,0,1,68.206,62.593Z" transform="translate(-45.901 -44.955)" fill="#ff8267"/>
                                                    <path id="Path_18" data-name="Path 18" d="M92.5,196.91H88.06a.946.946,0,0,0,0,1.881H92.5a.946.946,0,0,0,0-1.881Z" transform="translate(-72.781 -170.936)" fill="#ff8267"/>
                                                    <path id="Path_19" data-name="Path 19" d="M100.1,214.018H97.878a.946.946,0,0,0,0,1.881H100.1a.946.946,0,0,0,0-1.881Z" transform="translate(-81.49 -185.899)" fill="#ff8267"/>
                                                    <path id="Path_20" data-name="Path 20" d="M188.4,103.491h-2.922a.946.946,0,0,0,0,1.881H188.4a.946.946,0,0,0,0-1.881Z" transform="translate(-157.726 -89.894)" fill="#ff8267"/>
                                                    <path id="Path_21" data-name="Path 21" d="M8.135,104.432a.9.9,0,0,0-.847-.941H4.365a.946.946,0,0,0,0,1.881H7.288A.9.9,0,0,0,8.135,104.432Z" transform="translate(0 -89.894)" fill="#ff8267"/>
                                                    <path id="Path_22" data-name="Path 22" d="M107.857,5.126a.9.9,0,0,0,.847-.94V.94a.852.852,0,1,0-1.694,0V4.186A.9.9,0,0,0,107.857,5.126Z" transform="translate(-90.339)" fill="#ff8267"/>
                                                    <path id="Path_23" data-name="Path 23" d="M163.335,158.647a.789.789,0,0,0-1.2,0,1.015,1.015,0,0,0,0,1.33l2.067,2.295a.789.789,0,0,0,1.2,0,1.015,1.015,0,0,0,0-1.33Z" transform="translate(-137.556 -137.475)" fill="#ff8267"/>
                                                    <path id="Path_24" data-name="Path 24" d="M36.146,34.21a.789.789,0,0,0,1.2,0,1.015,1.015,0,0,0,0-1.33l-2.066-2.294a.789.789,0,0,0-1.2,0,1.015,1.015,0,0,0,0,1.33Z" transform="translate(-26.89 -26.509)" fill="#ff8267"/>
                                                    <path id="Path_25" data-name="Path 25" d="M36.146,158.648l-2.067,2.295a1.015,1.015,0,0,0,0,1.33.789.789,0,0,0,1.2,0l2.067-2.295a1.015,1.015,0,0,0,0-1.33A.789.789,0,0,0,36.146,158.648Z" transform="translate(-26.89 -137.476)" fill="#ff8267"/>
                                                    <path id="Path_26" data-name="Path 26" d="M162.741,34.485a.8.8,0,0,0,.6-.276l2.066-2.294a1.015,1.015,0,0,0,0-1.33.789.789,0,0,0-1.2,0l-2.066,2.294a1.015,1.015,0,0,0,0,1.33A.8.8,0,0,0,162.741,34.485Z" transform="translate(-137.56 -26.51)" fill="#ff8267"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <select class="selectpicker border rounded" data-live-search="true" data-width="100%">
                                            <option data-tokens="">
                                                Hizmet Seçiniz
                                            </option>
                                            <option data-tokens="marangoz">Marangoz</option>
                                            <option data-tokens="lastik araba">Lastik Tamircisi </option>
                                            <option data-tokens="motor araç araba lastik teknik">Motor Tamircisi </option>
                                            <option data-tokens="Elektrikçi">Elektrikçi </option>
                                            <option data-tokens="marangoz">Marangoz </option>
                                            <option data-tokens="lastik araba">Lastik Tamircisi </option>
                                            <option data-tokens="motor araç araba lastik teknik">Motor Tamircisi </option>
                                            <option data-tokens="Elektrikçi">Elektrikçi </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="icon-and-select">
                                        <div class="icon-select">
                                            <svg id="Group_7" data-name="Group 7" xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28">
                                                <g id="Group_4" data-name="Group 4" transform="translate(0 0)">
                                                    <g id="Group_2" data-name="Group 2">
                                                        <path id="Path_14" data-name="Path 14" d="M129.1,244.292a11.713,11.713,0,0,1,0-16.431,11.427,11.427,0,0,1,16.271,0,11.713,11.713,0,0,1,0,16.431l-1.395-1.408a9.7,9.7,0,0,0,0-13.614,9.468,9.468,0,0,0-13.482,0,9.7,9.7,0,0,0,0,13.614Z" transform="translate(-125.737 -224.458)" fill="#ff8267"/>
                                                    </g>
                                                    <g id="Group_3" data-name="Group 3" transform="translate(4.512 19.687)">
                                                        <path id="Path_15" data-name="Path 15" d="M158.652,341.121l-6.991-6.914,1.415-1.4,5.572,5.51,5.537-5.508,1.42,1.4Z" transform="translate(-151.661 -332.808)" fill="#ff8267"/>
                                                    </g>
                                                </g>
                                                <g id="Group_5" data-name="Group 5" transform="translate(7.331 7.469)">
                                                    <path id="Path_16" data-name="Path 16" d="M171.445,265.567a4.124,4.124,0,1,0,4.17,4.123A4.147,4.147,0,0,0,171.445,265.567Zm0,5.773a1.649,1.649,0,1,1,1.668-1.649A1.659,1.659,0,0,1,171.445,271.34Z" transform="translate(-167.276 -265.567)" fill="#ff8267"/>
                                                </g>
                                            </svg>

                                        </div>
                                        <select class="selectpicker border rounded" data-live-search="true" data-width="100%">
                                            <option data-tokens="">
                                                İl Seçiniz
                                            </option>
                                            <option data-tokens="marangoz">İstanbul </option>
                                            <option data-tokens="lastik araba">Ankara</option>
                                            <option data-tokens="motor araç araba lastik teknik">İzmir</option>
                                            <option data-tokens="Elektrikçi">Afyon</option>
                                            <option data-tokens="marangoz">Kastamonu</option>
                                            <option data-tokens="lastik araba">Muğla</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="icon-and-select">
                                        <div class="icon-select">
                                            <svg id="Group_7" data-name="Group 7" xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28">
                                                <g id="Group_4" data-name="Group 4" transform="translate(0 0)">
                                                    <g id="Group_2" data-name="Group 2">
                                                        <path id="Path_14" data-name="Path 14" d="M129.1,244.292a11.713,11.713,0,0,1,0-16.431,11.427,11.427,0,0,1,16.271,0,11.713,11.713,0,0,1,0,16.431l-1.395-1.408a9.7,9.7,0,0,0,0-13.614,9.468,9.468,0,0,0-13.482,0,9.7,9.7,0,0,0,0,13.614Z" transform="translate(-125.737 -224.458)" fill="#ff8267"/>
                                                    </g>
                                                    <g id="Group_3" data-name="Group 3" transform="translate(4.512 19.687)">
                                                        <path id="Path_15" data-name="Path 15" d="M158.652,341.121l-6.991-6.914,1.415-1.4,5.572,5.51,5.537-5.508,1.42,1.4Z" transform="translate(-151.661 -332.808)" fill="#ff8267"/>
                                                    </g>
                                                </g>
                                                <g id="Group_5" data-name="Group 5" transform="translate(7.331 7.469)">
                                                    <path id="Path_16" data-name="Path 16" d="M171.445,265.567a4.124,4.124,0,1,0,4.17,4.123A4.147,4.147,0,0,0,171.445,265.567Zm0,5.773a1.649,1.649,0,1,1,1.668-1.649A1.659,1.659,0,0,1,171.445,271.34Z" transform="translate(-167.276 -265.567)" fill="#ff8267"/>
                                                </g>
                                            </svg>

                                        </div>
                                        <select class="selectpicker border rounded" data-live-search="true" data-width="100%">
                                            <option data-tokens="">
                                                İlçe Seçiniz
                                            </option>
                                            <option data-tokens="marangoz">İstanbul </option>
                                            <option data-tokens="lastik araba">Ankara</option>
                                            <option data-tokens="motor araç araba lastik teknik">İzmir</option>
                                            <option data-tokens="Elektrikçi">Afyon</option>
                                            <option data-tokens="marangoz">Kastamonu</option>
                                            <option data-tokens="lastik araba">Muğla</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="search-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                                            <g id="Group_20" data-name="Group 20" transform="translate(-1494 -505)">
                                                <g id="loupe" transform="translate(1494 505)">
                                                    <g id="Group_6" data-name="Group 6">
                                                        <path id="Path_16" data-name="Path 16" d="M27.658,26.011,19.7,18.049a11.1,11.1,0,1,0-1.65,1.65l7.962,7.963a1.166,1.166,0,1,0,1.65-1.65ZM11.083,19.836a8.75,8.75,0,1,1,8.75-8.75A8.759,8.759,0,0,1,11.083,19.836Z" transform="translate(0 -0.003)" fill="#fff"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>
    @if(isset($services))
        <section class="services-list">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-3">
                            <div class="service-container wow animate__animated animate__fadeInDown">
                                <div class="service-img">
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}">
                                        <img src="{{ getStoragedImage($service->image) }}" alt="{{ $service->name }}">
                                    </a>
                                </div>
                                <div class="service-text">
                                    <h3 class="">{{ $service->name }}</h3>
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}">
                                        <span>Detaylı Bilgi</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="9" viewBox="0 0 43 9">
                                            <rect id="Rectangle_16" data-name="Rectangle 16" width="34" height="1" transform="translate(0 4)" fill="#fff"/>
                                            <path id="Polygon_1" data-name="Polygon 1" d="M4.5,0,9,9H0Z" transform="translate(43) rotate(90)" fill="#fff"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
