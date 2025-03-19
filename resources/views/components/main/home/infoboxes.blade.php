<div class="info-boxes style-2 flex-row no-gutters item-col-4">
    @if(!empty($data))
        @foreach($data['texts'] as $info)
            <div class="info-box" data-bg="{{ getStoragedImage($info['image']) }}">
                <h3 class="box-title">
                    <a href="#">{{ $info['title'] }}</a>
                </h3>
                <p>{{ $info['description'] }}</p>
                @if($info['is_active'])
                    <a href="{{ $info['button_link'] }}" class="btn btn-style-2">{{ $info['button_text'] }}</a>
                @endif
            </div>
        @endforeach
    @endif
</div>
