<?php

use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Storage;
use App\Models\Settings;

function getStoragedImage(?string $image = ''){
    return !empty($image) ? Storage::disk('public')->url($image) : $image;
}

function getSliders(?int $count = 10){
    return \App\Models\Slider::where(['is_active' => 1])->orderBy('sort', 'asc')->limit($count)->get();
}


function getPosts (?int $count = 10){
    return \App\Models\Post::with(['category'])->where(['status' => 1])->orderBy('created_at', 'desc')->limit($count)->get();
}

function getTemplateSlug(?string $name = ''){
    if ( !empty($name) ) {
        $template = \Illuminate\Support\Str::of(ucfirst($name))->prepend('App\\PageTemplates\\');
        $page = \App\Models\Page::where(['template' => $template ])->first();
    }
    return $page->slug ?? '#';
}

function getMenu(?string $menu = ''){
    return Cache::remember('menu_'.$menu, 300, function () use ($menu) {
        return FilamentNavigation::get($menu) ?? [];
    });
}

function setting(?string $name = ''): string {
    return app(GeneralSettings::class)->{$name} ?? '';
}

function getSEO(?string $key = ''){
    if ( empty($GLOBALS['_seo']) ) return '';
    $seo = (object) $GLOBALS['_seo'];
    if ( $key == 'title') {
        return $seo->{$key} ?? config("seo.{$key}", env('APP_NAME'));
    }
    else
    {
        return $seo->{$key} ?? config("seo.{$key}", "");
    }
}

function getPageData(?string $key = ''){
    return empty($key) ? '' : $GLOBALS['pageData'][$key] ?? '';
}


function isGmail(string $email = ''){
    $domain = explode('@', $email);
    $domain = end($domain);
    return $domain == 'gmail.com';
}

function getUserDefaultAvatar(){
    return 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y';
}

function getGravatar(string $email = '', int $size = 80):string {
    if ( isGmail($email) ) {
        return 'https://www.gravatar.com/avatar/' . md5($email) . '.jpg?s='. $size;
    }else{
        return getUserDefaultAvatar();
    }
}

function getUserAvatar(?string $picture = '', ?string $email = ''){
    $avatar = '';
    if (!empty($picture) ){
        $avatar = Storage::url($picture);
    } else {
        $avatar = getGravatar($email);
    }
    return $avatar;
}
