<?php

namespace App\PageTemplates;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapEditor;
use Livewire\TemporaryUploadedFile;

final class Faq
{
    public static function getName(){
        return 'faq';
    }

    public static function getPath(){
        return 'App\\PageTemplates\\Faq';
    }

    public static function title() {
        return 'Sık Sorulan Sorular';
    }

    public static function schema() {
        return [
            Card::make()
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->default('Sık Sorulan Sorular')
                        ->required(),
                    Repeater::make('questions')
                        ->label('Sorular ve Cevapları')
                        ->createItemButtonLabel('Yeni Ekle')
                        ->schema([
                            TextInput::make('question')
                                ->label('Soru'),
                            Textarea::make('reply')
                                ->label('Cevap')
                        ])
                ])
        ];
    }
}
