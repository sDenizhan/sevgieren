<?php

namespace App\View\Components\Sevgieren\Posts\Widgets;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCategories extends Component
{
    public $categories;
    public $latests;

    public function __construct() {
        $this->categories = PostCategory::all();
        $this->latests = Post::where(['status' => 1])->latest()->take(5)->get();
    }

    public function render(): View {
        return view('components.sevgieren.posts.widgets.post-categories');
    }
}
