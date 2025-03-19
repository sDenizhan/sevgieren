@extends('themes.main.layouts.main')

@section('pre-content')
    <div class="breadcrumbs-wrap">
        <div class="container">
            <h1 class="page-title">{{ getPageData('title') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li>Seanslar</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div id="content" class="page-content-wrap">
        <div class="container">
            <livewire:main.seances.filters />
            <livewire:main.seances.list-seances />
        </div>
    </div>
@endsection
