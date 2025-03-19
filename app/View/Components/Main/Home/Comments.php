<?php

namespace App\View\Components\Main\Home;

use App\Enums\Status;
use App\Models\CourseComment;
use App\Models\SeanceComment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Comments extends Component
{
    public ?array $params = [];

    public function __construct(?array $params = []) {
        $this->params = $params;
    }

    public function render(): View {
        $count = $this->params['count'] ?? 10;

        $courseComments = CourseComment::with('course')->where(['status' => Status::Active->value])->latest()->take($count)->get();
        $seanceComments = SeanceComment::with('seance')->where(['status' => Status::Active->value])->latest()->take($count)->get();

        $comments = [];

        foreach ($courseComments as $comment) {
            $comments[] = [
                'name_surname' => $comment->name_surname,
                'email' => $comment->email,
                'comment'=> Str::of($comment->comment)->limit(250),
                'link' => route('courses.details', ['slug' => $comment->course->slug])
            ];
        }

        foreach ($seanceComments as $comment) {
            $comments[] = [
                'name_surname' => $comment->name_surname,
                'email' => $comment->email,
                'comment'=> Str::of($comment->comment)->limit(250),
                'link' => route('seances.details', ['slug' => $comment->seance->slug])
            ];
        }

        return view('components.main.home.comments', [
            'comments' => collect($comments)->shuffle()
        ]);
    }
}
