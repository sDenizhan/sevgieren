@extends('themes.main.layouts.main')

@section('pre-content')
<div class="breadcrumbs-wrap no-title">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="{{ url('/') }}">Anasayfa</a></li>
            <li><a href="{{ url(getTemplateSlug('members')) }}">Mezunlarımız</a></li>
            <li>{{ $member->name_surname }} </li>
        </ul>
    </div>
</div>
@endsection

@section('content')
  <div id="content">

    <div class="page-section no-bts">
      
      <div class="container">
        
        <div class="row">
          <main id="main" class="col-lg-12 col-md-12" style="margin-bottom: 50px">
            
            <!-- team element -->
            <div class="team-item team-single">

              <div class="member-info">
                <h1 class="member-name"><a href="{{ route('member.index', ['slug' => $member->slug]) }}">{{ $member->name_surname }}</a></h1>
                <h6 class="member-position">{{ $member->info }}</h6>
              </div>

              <a href="#" class="member-photo">
                <img src="{{ getStoragedImage($member->image) }}" alt="{{ $member->name_surname }}" style="max-width: 450px">
              </a>

              <div class="team-desc">
                <div class="our-info vr-type">
                    @php
                        $data = $member->data;
                    @endphp

                    @foreach ($data as $item)
                        @if ( $item['type'] == 'address' && $item['value'] != '' )
                            <div class="info-item">
                                <i class="licon-map-marker"></i>
                                <div class="wrapper">
                                    {{ $item['value'] }}
                                </div>
                            </div>
                        @endif

                        @if ( $item['type'] == 'phone' && $item['value'] != '' )
                            <div class="info-item">
                                <i class="licon-telephone"></i>
                                <div class="wrapper">
                                    <span content="telephone=no">{{ $item['value'] }}</span>
                                </div>
                            </div>
                        @endif

                        @if ( $item['type'] == 'fax' && $item['value'] != '' )
                            <div class="info-item">
                                <i class="licon-printer"></i>
                                <div class="wrapper">
                                    <span content="telephone=no">{{ $item['value'] }}</span>
                                </div>
                            </div>
                        @endif

                        @if ( $item['type'] == 'email' && $item['value'] != '' )
                            <div class="info-item">
                                <i class="licon-at-sign"></i>
                                <div class="wrapper">
                                    <a href="mailto:">{{ $item['value'] }}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <ul class="social-icons var2">
                    @foreach ($data as $item )
                        @if ( $item['type'] == 'facebook' && $item['value'] != '' )
                            <li class="fb"><a href="{{ $item['value'] }}"><i class="icon-facebook"></i></a></li>
                        @endif

                        @if ( $item['type'] == 'twitter' && $item['value'] != '' )
                            <li class="tw"><a href="{{ $item['value'] }}"><i class="icon-twitter"></i></a></li>
                        @endif

                        @if ( $item['type'] == 'linkedin' && $item['value'] != '' )
                            <li class="in"><a href="{{ $item['value'] }}"><i class="icon-linkedin"></i></a></li>
                        @endif

                        @if ( $item['type'] == 'instagram' && $item['value'] != '' )
                            <li class="ins"><a href="{{ $item['value'] }}"><i class="icon-instagram-5"></i></a></li>
                        @endif
                    @endforeach
                </ul>
              </div>

            </div>

            <div class="tabs style-2 tabs-section">
              <!--tabs navigation-->                  
              <ul class="tabs-nav clearfix">
                <li>
                  <a href="#tab-1">Hakkında</a>
                </li>
                <li>
                  <a href="#tab-2">Eğitim</a>
                </li>
              </ul>
              <!--tabs content-->                 
              <div class="tabs-content">
                <div id="tab-1">
                    {!! $member->description !!}
                </div>
                <div id="tab-2">
                    {!! $member->education !!}
                </div>
              </div>
            </div>

            @if ($seances->isNotEmpty())
            <div class="content-element" style="margin-top: 50px !important">
              <h3 class="title">Uygulayıcının Seansları</h3>
              <div class="table-type-1">
                <table class="">
                  <thead>
                    <tr>
                      <th>Seans Adı</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  @foreach ($seances as $seance )
                    <tr>
                      <td>
                        <a href="{{ route('seances.details', ['slug' => $seance->slug]) }}" class="member-photo">
                          {{ $seance->title }}
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('seances.details', ['slug' => $seance->slug]) }}" class="btn btn-success">
                          İncele
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
            @endif

          </main>
        </div>
      </div>
    </div>
  </div>
@endsection


