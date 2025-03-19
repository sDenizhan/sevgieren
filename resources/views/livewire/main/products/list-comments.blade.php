<div class="content-element6">
    <h5 class="content-element2">{{ $title }} Hakkındaki Yorumlar</h5>

    @if( $comments->isNotEmpty() )
        <ol class="comments-list">
            @foreach($comments as $comment)
                <li class="comment">
                    <article>
                        <div class="gravatar">
                            <a href="#"><img src="{{ getUserAvatar('', $comment->email) }}" alt=""></a>
                        </div>
                        <div class="comment-body">
                            <header class="comment-meta">
                                <h6 class="comment-author">{{ $comment->name_surname }}</h6>
                                <div class="comment-info flex-row justify-content-between">
                                    <time datetime="{{ $comment->created_at->format('Y-m-d H:i') }}" class="comment-date">{{$comment->created_at->format('d F Y H:i')}}</time>
                                </div>
                            </header>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </article>
                </li>
            @endforeach
        </ol>
    @endif
</div>

<div class="col-lg-12">
    {{ $comments->links() }}
</div>
