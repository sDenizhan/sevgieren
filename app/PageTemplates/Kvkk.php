<?php

namespace App\PageTemplates;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapEditor;
use Livewire\TemporaryUploadedFile;

final class Kvkk
{
    public static function getName(){
        return 'kvkk';
    }

    public static function getPath(){
        return 'App\\PageTemplates\\Kvkk';
    }

    public static function title() {
        return 'KvKK Sayfası';
    }

    public static function schema() {
        return [
            Card::make()
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->default('KvKK')
                        ->required(),
                    FileUpload::make('image')
                        ->label('Resim')
                        ->columnSpan(2)
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return \Str::of($file->getClientOriginalName())
                                    ->replace($file->getClientOriginalExtension(), '')
                                    ->slug()
                                    ->append('.'.$file->getClientOriginalExtension());
                        })
                        ->required(),
                    TiptapEditor::make('content')
                        ->label('Sayfa İçeriği')
                        ->columnSpan(2)
                        ->extraInputAttributes([
                            'style' => 'height : 300px'
                        ]),
                ])
        ];
    }
}
