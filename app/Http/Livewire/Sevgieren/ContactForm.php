<?php

namespace App\Http\Livewire\Sevgieren;

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
                session()->flash('formSubmitted', ['status' => 'success', 'message' => 'Your message has been successfully saved. We will contact you as soon as possible.']);
            } else {
                session()->flash('formSubmitted', ['status' => 'error', 'message' => 'Your message could not be saved. Please try again..!']);
            }

        } catch (TooManyRequestsException $th) {
            session()->flash('formSubmitted', ['status' => 'error', 'message' => 'You Have Submitted Too Many Forms! Please Wait '. $th->secondsUntilAvailable .' Seconds!']);
        }
    }

    public function render()
    {
        return view('livewire.sevgieren.contact-form');
    }
}
