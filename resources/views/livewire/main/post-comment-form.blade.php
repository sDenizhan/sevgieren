<div class="content-element">
    <h4>Yorum Ekle</h4>
    <p>Email Adresiniz Yayınlanmayacak. Yıldız, <span class="required"></span> ile işaretli alanlar zorunludur.</p>
    <form class="contact-form style-2" wire:submit.prevent="submit">
        <div class="contact-item">
            <label class="required">Adınız Soyadınız</label>
            <input type="text" name="name_surname" id="name_surname" wire:model="name_surname" />
        </div>
        <div class="contact-item">
            <label class="required">Email Adresiniz</label>
            <input type="email" name="email" id="email" wire:model="email" />
        </div>
        <div class="contact-item">
            <label class="required">Mesajınız</label>
            <textarea rows="4" name="message" id="message" wire:model="message" ></textarea>
        </div>
        <div class="contact-item">
            <input type="hidden" name="postId" id="postId" wire:model="post_id" value="{{ $post_id }}">
            <button type="submit" class="btn btn-style-3">Yorum Ekle</button>
        </div>

        @if(session()->has('postComment'))
            @php($status = session()->get('postComment'))
            <div class="alert alert-{{ $status['status'] }}">
                <p>{{ $status['message'] }}</p>
            </div>
        @endif
    </form>
</div>
