@if( $comments->isNotEmpty() )
    <ul class="prduct-reviews">
        @foreach($comments as $comment)
            <li class="d-flex align-items-center gap-4 flex-wrap flex-sm-nowrap product-details-2-reviews">
                <img src="{{ getUserAvatar('', $comment->email) }}" alt="user" class="user-thumb">
                <div>
                    <span class="date fs-sm fw-light text-color">{{ $comment->created_at->format('Y-m-d H:i') }}</span>
                    <h6 class="mt-1 mb-2">{{ $comment->name_surname }}</h6>
                    <p class="fs-sm text-color mt-3 mb-0">
                        {{ $comment->comment }}
                    </p>
                </div>
            </li>
        @endforeach
    </ul>
@endif
