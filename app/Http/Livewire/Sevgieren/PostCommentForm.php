<?php

namespace App\Http\Livewire\Sevgieren;

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
                session()->flash('postComment', ['status' => 'error', 'message' => 'A Technical Error Occurred! Please Try Again!']);
            }

            $save = PostComment::create([
                'post_id' => $this->post_id,
                'name_surname' => $this->name_surname,
                'email' => $this->email,
                'message' => $this->message
            ]);

            if ( $save ) {
                session()->flash('postComment', ['status' => 'success', 'message' => 'Your comment has been successfully saved! It will be visible on our site after admin approval. Thank you.']);
            } else {
                session()->flash('postComment', ['status' => 'error', 'message' => 'Your Comment Could Not Be Saved! Please Try Again Later!']);
            }

        } catch (TooManyRequestsException $tooManyRequestsException) {
            session()->flash('postComment', ['status' => 'error', 'message' => 'You\'ve Tried Too Many Times! Try Again in '. $tooManyRequestsException->secondsUntilAvailable  .' Seconds..! ']);
        }
    }

    public function render()
    {
        return view('livewire.sevgieren.post-comment-form');
    }
}
