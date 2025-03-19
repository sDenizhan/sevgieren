
<form action="#" class="ct-form" wire:submit.prevent="submit">
    <div class="row g-4">
        <div class="col-sm-6">
            <div class="input-field">
                <input type="text" placeholder="Your Name*" class="theme-input bg-white" wire:model="name_surname">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-field">
                <input type="email" placeholder="Email Address*" class="theme-input bg-white" wire:model="email">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="input-field">
                <textarea class="theme-input bg-white" placeholder="Type Message here" rows="7" wire:model="comment"></textarea>
            </div>
        </div>
    </div>
    <input type="hidden" name="product_id" wire:model="product_id" value="{{$product_id}}">
    <button type="submit" class="template-btn primary-btn w-100 text-uppercase fw-normal mt-32"><span>Send Review</span></button>

    @if( session()->has('productCommentSubmitted'))
        @php($status = session()->get('productCommentSubmitted'))
        <div class="alert alert-{{ $status['status'] }} mb-4">
            <p>{{ $status['message'] }}</p>
        </div>
    @endif
</form>
