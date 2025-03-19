<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Faker\Provider\Text;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Livewire\TemporaryUploadedFile;

class ManageGeneralSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationGroup = 'Ayarlar';

    protected static ?string $navigationLabel = 'Genel Ayarlar';

    protected static ?int $navigationSort = 1;

    protected function getTitle(): string {
        return 'Genel Ayarlar';
    }

    protected function getFormSchema(): array
    {
        return [

            Tabs::make('settings')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    Tabs\Tab::make('general')
                        ->label('Genel Ayarlar')
                        ->schema([
                            TextInput::make('site_name')
                                ->label('Site Adı')
                                ->required(),
                            TextInput::make('mail_address')
                                ->label('Site Mail Adresi')
                                ->required(),
                            TextInput::make('phone_number')
                                ->label('Telefon Numaranız')
                                ->required(),
                            TextInput::make('address')
                                ->label('Adresiniz'),
                            TextInput::make('copyright_text')
                                ->label('Copyright Yazısı')
                                ->required(),
                            FileUpload::make('site_logo')
                                ->label('Site Logosu')
                                ->required()
                                ->columnSpanFull()
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file){
                                    return \Str::of($file->getClientOriginalName())
                                        ->replace($file->getClientOriginalExtension(), '')
                                        ->slug()
                                        ->append('.', $file->getClientOriginalExtension());
                                })
                        ]),
                    Tabs\Tab::make('network')
                        ->label('Sosyal Ağlar')
                        ->schema([
                            TextInput::make('facebook')
                                ->label('Facebook Adresiniz'),
                            TextInput::make('twitter')
                                ->label('Twitter Adresiniz'),
                            TextInput::make('instagram')
                                ->label('Instagram Adresiniz'),
                            TextInput::make('youtube')
                                ->label('Youtube Adresiniz'),
                        ]),
                ]),
        ];
    }
}
