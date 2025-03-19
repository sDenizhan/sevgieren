@extends('themes.main.layouts.main')

@section('header-css', 'fixed-header')

@section('pre-content')
    @if(($sliders = getSliders()) != null)
        <div class="rev-slider-wrapper">
            <div id="rev-slider" class="rev-slider tp-simpleresponsive" data-version="5.0">
                <ul>
                    @foreach($sliders as $slider)
                        <li data-transition="fade">
                            <img src="{{ getStoragedImage($slider->image) }}" class="rev-slidebg" alt="{{ $slider->title }}">
                            @if(!empty($slider->data))
                                @foreach($slider->data as $data)
                                    @if($data['type'] == 'small_text')
                                        @php
                                            $position = $data['data']['position'];
                                            $pos = '';
                                            for ( $i = 0 ; $i <= 3; $i++) {
                                                $pos .= "'$position',";
                                            }
                                            $pos = rtrim($pos, ',');
                                        @endphp
                                        <div class="tp-caption tp-resizeme" data-x="[{{ $pos }}]" data-hoffset="30"
                                             data-y="['middle','middle','middle','middle']" data-voffset="-110" data-whitespace="nowrap"
                                             data-frames='[{"delay":150,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                             data-responsive_offset="on" data-elementdelay="0.05">
                                            <div class="section-pre-title"
                                            @isset($data['data']['text-color'])
                                                style="color : {{ $data['data']['text-color'] }}"
                                            @endisset
                                            >{{ $data['data']['title'] }}</div>
                                        </div>
                                    @endif
                                    @if($data['type'] == 'text')
                                        @php
                                            $position = $data['data']['position'];
                                            $pos = '';
                                            for ( $i = 0 ; $i <= 3; $i++) {
                                                $pos .= "'$position',";
                                            }
                                            $pos = rtrim($pos, ',');
                                        @endphp
                                        <div class="tp-caption tp-resizeme scaption-dark-large"
                                             data-x="[{{ $pos }}]" data-hoffset="30"
                                             data-y="['middle','middle','middle','middle']" data-voffset="0"
                                             data-whitespace="nowrap"
                                             data-frames='[{"delay":450,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                             data-responsive_offset="on"
                                             data-elementdelay="0.05"
                                             @isset($data['data']['text-color'])
                                                style="color : {{ $data['data']['text-color'] }}"
                                            @endisset
                                             >{!! $data['data']['title'] !!}
                                        </div>
                                    @endif
                                    @if($data['type'] == 'button')
                                        <div class="tp-caption tp-resizeme"
                                             data-x="['left','left','left','left']" data-hoffset="30"
                                             data-y="['middle','middle','middle','middle']" data-voffset="130"
                                             data-whitespace="nowrap"
                                             data-frames='[{"delay":750,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                             data-responsive_offset="on"
                                             data-elementdelay="0.05" >
                                            <a href="{{ $data['data']['link'] }}" class="btn btn-big btn-style-3">{{ $data['data']['text'] }}</a>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection

@section('content')
    @php($components = getPageData('components'))
    @if(!empty($components))
        @foreach($components as $component)
            @php($file = join('.', [$GLOBALS['theme'], $component['type']]))
            @php($data = $component['data'])
            <x-dynamic-component :component="$file" :data="$data" />
        @endforeach
    @endif
@endsection
