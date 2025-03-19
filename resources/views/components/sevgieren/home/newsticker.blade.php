@if (!empty($data))
    <div class="ur-ticker-area overflow-hidden">
        <div class="ur-ticker-wrapper primary-bg-color">
            <div class="ur-ticker">
                @foreach($data['newsticker'] as $key => $value)
                    <span class="text-white text-uppercase">{{ $value['message'] }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endif
