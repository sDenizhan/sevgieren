<?php

namespace App\Http\Livewire\Main;

use App\Models\Contact;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Livewire\Component;

class ContactForm extends Component
{
    use WithRateLimiting;

    public ?string $name_surname = '';
    public ?string $subject = '';
    public ?string $mail_address = '';
    public ?string $message = '';

    public function submit(){
        try {
            $this->validate([
                'name_surname' => 'required',
                'mail_address' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ]);

            $save = Contact::create([
                'name_surname' => $this->name_surname,
                'mail_address' => $this->mail_address,
                'subject' => $this->subject,
                'message' => $this->message
            ]);

            if ( $save ){
                session()->flash('formSubmitted', ['status' => 'success', 'message' => 'Mesajınız Başarıyla Kayıt Edilmiştir. En Kısa Zamanda Sizinle İletişime Geçilecektir.']);
            } else {
                session()->flash('formSubmitted', ['status' => 'error', 'message' => 'Mesajınız Kayıt Edilemedi. Lütfen Tekrar Deneyiniz..!']);
            }

        } catch (TooManyRequestsException $th) {
            session()->flash('formSubmitted', ['status' => 'error', 'message' => 'Çok Fazla Form Göndermesi Yaptınız! Lütfen '. $th->secondsUntilAvailable .' Saniye Bekleyiniz!']);
        }
    }

    public function render()
    {
        return view('livewire.main.contact-form');
    }
}
