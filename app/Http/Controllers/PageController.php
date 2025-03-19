<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Page;
use App\Models\Member;
use App\PageTemplates\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Post as Blog;
use App\PageTemplates\Members;
use App\PageTemplates\Homepage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class PageController extends Controller
{
    public function __invoke(?string $slug = '')
    {
        if (empty($slug)){
            $homeTemplate = Homepage::getPath();
            $page = Page::where(['status' => 1, 'template' => $homeTemplate ])->firstOrFail();
        }else{
            $page = Page::where(['slug' => $slug, 'status' => 1])->firstOrFail();
        }

        //template dosyası
        //Stringable value
        $template = Str::of($page->template)->replace(['App\PageTemplates\\'], [''])->kebab();

        //template path and control
        $templateViewFile = Arr::join(['templates', $template], '.');
        abort_if(!View::exists($templateViewFile), 404);

        //page data
        $GLOBALS['template'] = $template;
        $GLOBALS['theme'] = Config::get('view.theme', 'main');
        $GLOBALS['pageData'] = collect($page->data)
                                ->filter(fn($value, $key) => $key == $template)
                                ->mapWithKeys(fn($value, $key) => $value);
        $GLOBALS['_seo'] = $page->seo;

        //view file
        $view = view($templateViewFile, compact('page'));

        if ( $template->value() == Str::of(Post::getName())->kebab()  ) {
            $posts = Blog::with(['category'])->where(['status' => Status::Active->value])->paginate($GLOBALS['pageData']['pagination']);
            $view->with(['posts' => $posts]);
        }

        return $view;
    }
}
