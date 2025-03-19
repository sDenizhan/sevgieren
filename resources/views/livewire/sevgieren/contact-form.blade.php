<form action="#" class="ct-form" wire:submit.prevent="submit">
    <div class="row g-4">
        <div class="col-sm-6">
            <div class="input-field">
                <input type="text" placeholder="Your Name*" class="theme-input bg-white" wire:model="name_surname">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-field">
                <input type="email" placeholder="Email Address*" class="theme-input bg-white" wire:model="mail_address">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="input-field">
                <input type="text" placeholder="Subject*" class="theme-input bg-white" wire:model="subject">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="input-field">
                <textarea class="theme-input bg-white" placeholder="Type Message here" rows="7" wire:model="message"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="template-btn primary-btn w-100 text-uppercase fw-normal mt-32"><span>Send Message</span></button>

    @if(session()->has('formSubmitted') )
        @php($result = session()->get('formSubmitted'))
        @php($status = $result['status'])
        <div class="alert alert-{{ $status }} mb-4">
            <button type="button" class="close" data-dismiss="alert"></button>
            {{ $result['message'] }}
        </div>
    @endif
</form>
