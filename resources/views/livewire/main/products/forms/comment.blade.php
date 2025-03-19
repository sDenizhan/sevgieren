<div class="content-element6">
    <h5 class="title">İnceleme Ekle</h5>
    <p class="text-size-small">Mail adresiniz saklı tutulacaktır. <span class="required"></span> ile işaretli alanlar zorunludur.</p>
    <form class="contact-form style-2" wire:submit.prevent="submit">
        <div class="contact-item">
            <label for="name_surname" class="required">Adınız Soyadınız:</label>
            <input type="text" id="name_surname" wire:model="name_surname" required>
        </div>
        <div class="contact-item">
            <label for="email" class="required">Email Adresiniz:</label>
            <input type="email" id="email" wire:model="email" required />
        </div>
        <div class="contact-item">
            <label for="comment" class="required">Yorumunuz</label>
            <textarea rows="4" wire:model="comment" id="comment" required></textarea>
        </div>
        <div class="contact-item">
            <input type="hidden" name="product_id" wire:model="product_id" value="{{$product_id}}">
            <button type="submit" class="btn btn-style-3" data-type="submit">Kaydet</button>
        </div>

        @if( session()->has('productCommentSubmitted'))
            @php($status = session()->get('productCommentSubmitted'))
            <div class="alert alert-{{ $status['status'] }}">
                <p>{{ $status['message'] }}</p>
            </div>
        @endif
    </form>
</div>
