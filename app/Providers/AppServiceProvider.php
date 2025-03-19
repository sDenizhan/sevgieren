<?php

namespace App\Providers;

use App\Models\Page;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Navigation\UserMenuItem;
use FilamentNavigation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        setlocale(LC_ALL, "en_US.UTF-8");
        Carbon::setLocale(config('app.locale')); // sv

        //theme setting
        $themeName = Config::get('view.theme', 'sevgieren');
        Config::push('view.paths', resource_path(Arr::join(['views', 'themes', $themeName], DIRECTORY_SEPARATOR)));

        //
        Model::unguard();

        //Filament
        Filament::serving(function(){
            Filament::registerNavigationGroups([
                'Site Yönetimi',
                'Ürün Yönetimi',
                'Blog',
                'Ayarlar',
            ]);

            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Önbellek Temizle')
                    ->url(route('clear.cache'))
                    ->icon('heroicon-s-cog')
            ]);
        });

        FilamentNavigation::addItemType('Pages', [
            Select::make('url')
                ->label('Sayfa Seçiniz')
                ->searchable()
                ->options(function (){
                    return Page::pluck('name', 'slug')->mapWithKeys(fn($name, $slug) => [route('page', ['slug' => $slug]) => $name]);
                })
        ]);
    }
}
