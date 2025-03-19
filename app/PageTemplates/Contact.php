<?php

namespace App\PageTemplates;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

final class Contact
{
    public static function getName(){
        return 'contact';
    }

    public static function getPath(){
        return 'App\\PageTemplates\\Contact';
    }

    public static function title() {
        return 'İletişim Sayfası';
    }

    public static function schema()
    {
        return [
            Card::make()
                ->schema([
                    TextInput::make('title')
                        ->label('Form Başlığı')
                        ->default('İletişim')
                        ->required(),
                    TextInput::make('subtitle')
                        ->label('Form Açıklaması'),
                    TextInput::make('location')
                        ->label('Google Map Embed URL')
                ])
        ];
    }
}
