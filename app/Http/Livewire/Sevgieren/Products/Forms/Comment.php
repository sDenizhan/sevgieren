<?php

namespace App\Http\Livewire\Sevgieren\Products\Forms;

use App\Models\Product;
use App\Models\ProductComments;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Livewire\Component;

class Comment extends Component
{
    use WithRateLimiting;

    public ?string $name_surname = '';
    public ?string $email = '';
    public ?string $comment = '';
    public ?string $product_id = '0';

    public function submit(){
        try {
            $this->rateLimit(2, 30);
            $product = Product::find($this->product_id);

            if (!$product){
                session()->flash('productCommentSubmitted', ['status' => 'error', 'message' => 'Teknik Bir Arızadan Dolayı Yorumunuz Eklenemedi..!']);
            } else {
                $this->validate([
                    'name_surname' => 'required',
                    'email' => 'required|email',
                    'comment' => 'required',
                    'product_id' => 'required'
                ]);

                $create = ProductComments::create([
                    'product_id' => $this->product_id,
                    'name_surname' => $this->name_surname,
                    'email' => $this->email,
                    'comment' => $this->comment
                ]);

                if ( $create ) {
                    session()->flash('productCommentSubmitted', ['status' => 'success', 'message' => 'Yorumunuz Başarıyla Kayıt Edildi..! Yönetici Onayından Sonra Yayınlanacaktır.']);
                } else {
                    session()->flash('productCommentSubmitted', ['status' => 'error', 'message' => 'Teknik Bir Arızadan Dolayı Yorumunuz Kayıt Edilemedi..!']);
                }
            }

        } catch (TooManyRequestsException $tooManyRequestsException) {
            session()->flash('productCommentSubmitted', ['status' => 'error', 'message' => 'Çok Fazla Deneme Yaptınız! Lütfen Sonraki Deneme İçin '. $tooManyRequestsException->secondsUntilAvailable .' Bekleyiniz..!']);
        }
    }

    public function render()
    {
        return view('livewire.sevgieren.products.forms.comment');
    }
}
