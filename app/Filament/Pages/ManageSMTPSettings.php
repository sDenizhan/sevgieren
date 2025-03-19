<?php

namespace App\Filament\Pages;

use App\Settings\SMTPSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Livewire\TemporaryUploadedFile;

class ManageSMTPSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SMTPSettings::class;

    protected static ?string $navigationGroup = 'Ayarlar';

    protected static ?string $navigationLabel = 'Mail Ayarları';

    protected static ?int $navigationSort = 2;

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('settings')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    Tabs\Tab::make('smtp')
                        ->label('SMTP Ayarları')
                        ->schema([
                            TextInput::make('smtp_host')
                                ->label('SMTP Host')
                                ->columnSpanFull(),
                            TextInput::make('smtp_username')
                                ->label('SMTP Kullanıcı Adı')
                                ->columnSpanFull(),
                            TextInput::make('smtp_password')
                                ->label('SMTP Şifresi')
                                ->columnSpanFull(),
                            TextInput::make('smtp_port')
                                ->label('SMTP Port')
                                ->columnSpanFull()
                        ]),
                ]),
        ];

    }
}
