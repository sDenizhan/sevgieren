<div class="blog-review-form mt-5">
    <h3 class="mb-3 fw-normal">Add a Review</h3>
    <p class="mb-4">Your email address will not be published. Required fields are marked*</p>

    <form class="#" wire:submit.prevent="submit">
        <div class="row align-items-center g-4">
            <div class="col-sm-6">
                <div class="input-field">
                    <input type="text" placeholder="Your Name*" class="theme-input fw-light" wire:model="name_surname">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-field">
                    <input type="text" placeholder="Your Email Address*" class="theme-input fw-light" wire:model="email">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="input-field">
                    <textarea placeholder="Your Reviews*" class="theme-input fw-light" rows="6" wire:model="message"></textarea>
                </div>
            </div>
        </div>
        <input type="hidden" name="postId" id="postId" wire:model="post_id" value="{{ $post_id }}">
        <button type="submit" class="template-btn primary-btn mt-4"><span>Submit Now</span></button>

        @if(session()->has('postComment'))
            @php($status = session()->get('postComment'))
            <div class="alert alert-{{ $status['status'] }} mt-4">
                <p>{{ $status['message'] }}</p>
            </div>
        @endif
    </form>
</div>
