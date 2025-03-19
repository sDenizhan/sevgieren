<?php
namespace App\Traits;
use Closure;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;

trait WithSEO {

    private ?array $_seo = [];
    private ?array $_metas = [];
    private ?array $_ogs = [];

    public static function getSchemaForSEO(){
        return [
            TextInput::make('seo.title')
                ->label('SEO Title')
                ->required(),
            Textarea::make('seo.description')
                ->label('Açıklama')
                ->required(),
            Fieldset::make('og')
                ->label('Sosyal Medya')
                ->schema([
                    Toggle::make('seo.og.is_active')
                        ->label('Aktif Edilsin mi?')
                        ->offIcon('heroicon-o-eye-off')
                        ->onIcon('heroicon-o-eye')
                        ->inline()
                        ->reactive()
                        ->columnSpanFull(),
                    TextInput::make('seo.og.title')
                        ->label('OG Başlık')
                        ->required()
                        ->columnSpanFull()
                        ->visible(fn($get) => $get('seo.og.is_active')),
                    Textarea::make('seo.og.description')
                        ->label('OG Açıklama')
                        ->required()
                        ->columnSpanFull()
                        ->visible(fn($get) => $get('seo.og.is_active')),
                    FileUpload::make('seo.og.image_url')
                        ->label('Resim Yükle')
                        ->required()
                        ->directory('uploads/images')
                        ->columnSpanFull()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                            return Str::of($file->getClientOriginalName())
                                ->replace($file->getClientOriginalExtension(), '')
                                ->slug()
                                ->append('.'. $file->getClientOriginalExtension());
                        })
                        ->visible(fn($get) => $get('seo.og.is_active')),
                    Select::make('seo.og.type')
                        ->label('OG Türü')
                        ->options([
                            'article' => 'Makale',
                            'book' => 'Kitap',
                            'profile' => 'Profil',
                            'website' => 'Website',
                            'video' => 'Video',
                            'music' => 'Müzik'
                        ])
                        ->required()
                        ->reactive()
                        ->visible(fn($get) => $get('seo.og.is_active')),
                    Fieldset::make('article')
                        ->label('Makale Detayları')
                        ->schema([
                            TextInput::make('seo.og.article.author')
                                ->label('Yazar'),
                        ])
                        ->visible(fn($get) => $get('seo.og.type') == 'article')
                ]),
            Fieldset::make('metas')
                ->label('Meta Etiketler')
                ->schema([
                    Repeater::make('seo.metas')
                        ->label('Meta Taglar')
                        ->createItemButtonLabel('Yeni Ekle')
                        ->columns(2)
                        ->columnSpanFull()
                        ->schema([
                            Select::make('tag')
                                ->label('Meta Etiket')
                                ->options([
                                    'robots' => 'Robots',
                                    'google-verification' => 'Google Doğrulama',
                                    'yandex-verification' => 'Yandex Doğrulama'
                                ])
                                ->required(),
                            TextInput::make('value')
                                ->label('Değer')
                                ->required()
                        ])
                ])
        ];
    }

    public function getSEODetails(){
        return $this->seo;
    }
}
