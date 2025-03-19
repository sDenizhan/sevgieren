<?php

namespace App\PageTemplates;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapEditor;
use Livewire\TemporaryUploadedFile;

final class StaticPage
{
    public static function getName(){
        return 'staticpage';
    }

    public static function getPath(){
        return 'App\\PageTemplates\\StaticPage';
    }

    public static function title() {
        return 'Sabit Sayfa';
    }

    public static function schema()
    {
        return [
            Card::make()
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->columnSpan(3)
                        ->required(),
                    TextInput::make('subtitle')
                        ->label('Alt Metin')
                        ->columnSpan(3)
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
                ])
        ];
    }
}
