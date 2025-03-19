<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index(?string $slug = ''){
        abort_if(empty($slug), 404);
        $category = PostCategory::where(['slug' => $slug])->firstOrFail();
        $GLOBALS['_seo'] = $category->seo;
        return view('posts.category', compact('category'));
    }

    public function details(?string $slug = ''){
        abort_if(empty($slug), 404);
        $post = Post::where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $GLOBALS['_seo'] = $post->seo;
        $others = Post::where(['status' => 1])->inRandomOrder()->limit(4)->get();
        return view('posts.single-post', compact('post'))
                ->with('next', $post->next)
                ->with('previous', $post->previous)
                ->with('others', $others);
    }
}
