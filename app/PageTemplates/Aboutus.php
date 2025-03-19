<?php

namespace App\PageTemplates;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use FilamentTiptapEditor\TiptapEditor;
use Livewire\TemporaryUploadedFile;

final class Aboutus
{
    public static function getName(){
        return 'aboutus';
    }

    public static function getPath(){
        return 'App\\PageTemplates\\Aboutus';
    }

    public static function title() {
        return 'Hakkımızda Sayfası';
    }

    public static function schema()
    {
        return [
            Card::make()
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->default('Title'),
                    Fieldset::make('bio')
                        ->label('Biyografi')
                        ->schema([
                            Toggle::make('is_bio_active')->label('Biyografi Aktif mi?')->inline(),
                            FileUpload::make('bio_image')
                                ->label('Biyografi Resmi (804x750) ')
                                ->columnSpan(2)
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return \Str::of($file->getClientOriginalName())
                                        ->replace($file->getClientOriginalExtension(), '')
                                        ->slug()
                                        ->append('.'.$file->getClientOriginalExtension());
                                }),
                            TextInput::make('bio_title')
                                ->label('Biyografi Başlığı'),
                            TiptapEditor::make('bio_content')
                                ->label('Biyografi')
                                ->columnSpan(2)
                                ->extraInputAttributes([
                                    'style' => 'height : 300px'
                                ])
                        ]),
                    Fieldset::make('video_box')
                        ->label('Video')
                        ->schema([
                            Toggle::make('is_video_active')->label('Video Aktif mi?')->inline(),
                            FileUpload::make('video_bg')
                                ->label('Video Arkaplanı (2880 x 825) ')
                                ->columnSpanFull()
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return \Str::of($file->getClientOriginalName())
                                        ->replace($file->getClientOriginalExtension(), '')
                                        ->slug()
                                        ->append('.'.$file->getClientOriginalExtension());
                                }),
                            TextInput::make('video_url')
                                ->label('Video URL')
                                ->columnSpanFull()
                        ]),
                    Fieldset::make('mission')
                        ->label('Misyon & Vizyon')
                        ->schema([
                            Toggle::make('is_mission_active')->label('Misyon aktif mi?')->inline(),
                            FileUpload::make('mission_image')
                                ->label('Misyon Resmi (563x368) ')
                                ->columnSpan(2)
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return \Str::of($file->getClientOriginalName())
                                        ->replace($file->getClientOriginalExtension(), '')
                                        ->slug()
                                        ->append('.'.$file->getClientOriginalExtension());
                                }),
                            TextInput::make('mission_title')
                                ->label('Misyon&Vizyon Başlığı'),
                            TiptapEditor::make('mission_content')
                                ->label('Misyon&Vizyon İçeriği')
                                ->columnSpan(2)
                                ->extraInputAttributes([
                                    'style' => 'height : 300px'
                                ]),
                            TextInput::make('goal_title')
                                ->columnSpanFull()
                                ->label('Hedefler Başlığı'),
                            FileUpload::make('goals_image')
                                ->label('Hedef Resmi (563x368) ')
                                ->columnSpan(2)
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return \Str::of($file->getClientOriginalName())
                                        ->replace($file->getClientOriginalExtension(), '')
                                        ->slug()
                                        ->append('.'.$file->getClientOriginalExtension());
                                }),
                            TiptapEditor::make('goals_description')
                                ->label('Hedefler İçeriği')
                                ->columnSpan(2)
                                ->extraInputAttributes([
                                    'style' => 'height : 300px'
                                ]),
                            Repeater::make('goals')
                                ->label('Hedefler')
                                ->createItemButtonLabel('Hedef Ekle')
                                ->columnSpanFull()
                                ->schema([
                                    TextInput::make('goals_title')
                                        ->label('Hedef')
                                        ->columnSpanFull(),
                                    TextInput::make('goals_content')
                                        ->label('Hedef Açıklaması')
                                        ->columnSpanFull()
                                ])
                        ]),
                    Fieldset::make('newsticker')
                        ->label('Haber Bülteni')
                        ->schema([
                            Toggle::make('is_newsticker_active')->label('Haber Bülteni Aktif mi?')->inline(),
                            Repeater::make('newsticker')
                                ->label('Haber Bülteni')
                                ->createItemButtonLabel('Haber Ekle')
                                ->columnSpanFull()
                                ->schema([
                                    TextInput::make('newsticker_title')
                                        ->label('Haber Bülteni Başlığı')
                                        ->columnSpanFull()
                                ])
                        ]),
                    Fieldset::make('blog')
                        ->label('Son Blog Yazıları')
                        ->schema([
                            Toggle::make('is_blog_active')->label('Son Blog Aktif mi?')->inline(),
                            TextInput::make('blog_count')
                                ->label('Gösterilecek Blog Sayısı')
                                ->columnSpanFull()
                        ])
                ])
        ];
    }
}
