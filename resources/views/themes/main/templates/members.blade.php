@extends('themes.main.layouts.main')

@section('pre-content')
    <div class="breadcrumbs-wrap">
        <div class="container">
            <h1 class="page-title">{{ getPageData('title') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li>{{ getPageData('title') }}</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
  <div id="content" class="page-content-wrap">
    <div class="container">

      @if (!is_null($members))
        <div class="isotope three-collumn clearfix team-holder" data-isotope-options='{"itemSelector" : ".item","layoutMode" : "fitRows","transitionDuration":"0.7s","fitRows" : {"columnWidth":".item"}}'>
          @foreach ($members as $member)
            <div class="item category_4">
              <div class="team-item">
                <a href="{{ route('member.index', ['slug' => $member->slug]) }}" class="member-photo">
                  <img src="{{ getStoragedImage($member->image) }}" alt="{{ $member->name_surname }}">
                </a>
                <div class="team-desc">
                  <div class="member-info">
                    <h5 class="member-name"><a href="{{ route('member.index', ['slug' => $member->slug]) }}">{{ $member->name_surname }}</a></h5>
                    <h6 class="member-position">{{ $member->info }}</h6>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
@endsection

@push('pre-jquery')
  <script src="{{ asset('themes/main/assets/plugins/isotope.pkgd.min.js') }}"></script>
@endpush