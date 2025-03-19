<?php

namespace App\PageTemplates;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

final class Post
{
    public static function getName(){
        return 'post';
    }

    public static function title(){
        return 'Blog Sayfası';
    }

    public static function schema()
    {
        return [
            Tabs::make('main')
                ->label('Blog Sayfası Ayarları')
                ->schema([
                    Tab::make('settings')
                        ->label('Ayarlar')
                        ->schema([
                            TextInput::make('title')
                                ->label('Sayfa Başlığı')
                                ->required(),
                            Select::make('pagination')
                                ->label('Bir Sayfada Kaç Adet Firma Gösterilsin')
                                ->options([
                                    10 => 10,
                                    25 => 25,
                                    50 => 50,
                                    100 => 100
                                ])
                            ->required()
                        ])
                ])
        ];
    }
}
