<?php

namespace App\PageTemplates;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapEditor;
use Livewire\TemporaryUploadedFile;

final class Shop
{
    public static function getName(){
        return 'shop';
    }

    public static function getPath(){
        return 'App\\PageTemplates\\Shop';
    }

    public static function title() {
        return 'Shop Sayfası';
    }

    public static function schema()
    {
        return [
            Card::make()
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->default('Ürünler')
                        ->required(),
                    TextInput::make('pagination')
                        ->label('Sayfa Başına Ürün Sayısı')
                        ->default(10)
                        ->required()
                ])
        ];
    }
}
