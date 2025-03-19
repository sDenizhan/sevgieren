@extends('themes.main.layouts.main') @section('pre-content')
    <div class="breadcrumbs-wrap">
        <div class="container"><h1 class="page-title">{{ getPageData('title') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li>Sık Sorulan Sorular</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    @php($questions = getPageData('questions'))
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-12 col-md-12">
                    <div class="accordion style-2">
                        @if(!empty($questions))
                            @foreach($questions as $item)
                                <div class="accordion-item">
                                    <h5 class="a-title">{{ $item['question'] }}</h5>
                                    <div class="a-content">
                                        <p>{{ $item['reply'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
