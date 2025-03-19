@extends('themes.main.layouts.main') @section('pre-content')
    <div class="breadcrumbs-wrap">
        <div class="container"><h1 class="page-title">Kurs Takvimi</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                <li><a href="{{ url(getTemplateSlug('courses')) }}">Kurslar</a></li>
                <li>Takvim</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="content" class="page-content-wrap">
        <div class="container wide">
            <div class="content-element6">
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <div class="mad-custom-select">
                            <select data-default-text="All Classes">
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <livewire:main.courses.calendar />
        </div>
    </div>
@endsection
