<?php

namespace App\Http\Livewire\Main;

use App\Models\PostComment;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Livewire\Component;

class PostCommentForm extends Component
{
    use WithRateLimiting;

    public ?string $name_surname = '';
    public ?string $email = '';
    public ?string $message = '';
    public ?int $post_id = 0;

    public function submit(){
        try {

            $this->rateLimit(2, 60);

            $this->validate([
                'name_surname' => 'required',
                'email' => 'required|email',
                'message' => 'required',
                'post_id' => 'int'
            ]);

            if ( $this->post_id <= 0 ) {
                session()->flash('postComment', ['status' => 'error', 'message' => 'Teknik Bir Arıza Oluştu! Lütfen Tekrar Deneyiniz!']);
            }

            $save = PostComment::create([
                'post_id' => $this->post_id,
                'name_surname' => $this->name_surname,
                'email' => $this->email,
                'message' => $this->message
            ]);

            if ( $save ) {
                session()->flash('postComment', ['status' => 'success', 'message' => 'Yorumunuz Başarıyla Kayıt Edildi! Yönetici Onayından Sonra Sitemizde Görülecektir. Teşekkür Ederiz.']);
            } else {
                session()->flash('postComment', ['status' => 'error', 'message' => 'Yorumunuz Kayıt Edilemedi! Lütfen Daha Sonra Tekrar Deneyiniz!']);
            }

        } catch (TooManyRequestsException $tooManyRequestsException) {
            session()->flash('postComment', ['status' => 'error', 'message' => 'Çok Fazla Deneme Yaptınız! '. $tooManyRequestsException->secondsUntilAvailable  .' Saniye Sonra Tekrar Deneyiniz..!']);
        }
    }

    public function render()
    {
        return view('livewire.main.post-comment-form');
    }
}
