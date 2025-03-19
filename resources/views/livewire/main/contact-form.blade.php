<form id="contact-form" class="contact-form style-2" wire:submit.prevent="submit">
    <div class="contact-item">
        <input type="text" name="cf-name" placeholder="Adınız Soyadınız" required="" wire:model="name_surname">
    </div>
    <div class="contact-item">
        <input type="email" name="cf-email" placeholder="Email Adresiniz" required="" wire:model="mail_address">
    </div>
    <div class="contact-item">
        <input type="text" name="cf-subject" placeholder="Konu" required wire:model="subject">
    </div>
    <div class="contact-item">
        <textarea rows="4" name="cf-message" placeholder="Mesajınız" required wire:model="message"></textarea>
    </div>
    <div class="contact-item">
        <button type="submit" class="btn btn-style-3" data-type="submit">Gönder</button>
    </div>

    @if(session()->has('formSubmitted') )
        @php($result = session()->get('formSubmitted'))
        @php($status = $result['status'])
        <div class="alert alert-{{ $status }}">
            <button type="button" class="close" data-dismiss="alert"></button>
            {{ $result['message'] }}
        </div>
    @endif
</form>
