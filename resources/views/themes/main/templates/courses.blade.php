@extends('themes.main.layouts.main')

@section('pre-content')
    <div class="breadcrumbs-wrap">
        <div class="container">
            <h1 class="page-title">{{ getPageData('title') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li>Eğitimler</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div id="content" class="page-content-wrap">
        <div class="container">
            <livewire:main.courses.filters />
            <livewire:main.courses.list-courses />
        </div>
    </div>
@endsection
