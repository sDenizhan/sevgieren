<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slider;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\HtmlString;
use Livewire\TemporaryUploadedFile;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Sliderlar';

    protected static ?string $navigationGroup = 'Site Yönetimi';

    protected static ?string $label = 'Slider';

    protected static ?string $pluralLabel = 'Slider';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->required(),
                    FileUpload::make('image')
                        ->label('Resim')
                        ->columnSpan(2)
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                            return $file->getClientOriginalName();
                        }),
                    Builder::make('data')
                        ->label('Slider Bilgileri')
                        ->createItemButtonLabel('Yeni Ekle')
                        ->schema([
                            Builder\Block::make('small_text')
                                ->label('Küçük Yazı')
                                ->schema([
                                    TextInput::make('title')
                                        ->label('Yazı')
                                        ->required(),
                                    TextInput::make('text-color')
                                        ->label('Yazı Rengi')
                                        ->default('#')
                                        ->helperText(new HtmlString('Renk Kodları Hex Formatında (Örn: #cecece) Olmalıdır. <a href="https://htmlcolorcodes.com" target="_blank">Renk Kodları için tıklayın</a>')),
                                    Select::make('position')
                                        ->label('Yazı Konumu')
                                        ->options([
                                            'left' => 'Sol',
                                            'center' => 'Orta',
                                            'right' => 'Sağ'
                                        ])
                                        ->required()
                                ]),
                            Builder\Block::make('text')
                                ->label('Yazı')
                                ->schema([
                                    TextInput::make('title')
                                        ->label('Yazı')
                                        ->required(),
                                    TextInput::make('text-color')
                                        ->label('Yazı Rengi')
                                        ->default('#')
                                        ->helperText(new HtmlString('Renk Kodları Hex Formatında (Örn: #cecece) Olmalıdır. <a href="https://htmlcolorcodes.com" target="_blank">Renk Kodları için tıklayın</a>')),
                                    Select::make('position')
                                        ->label('Yazı Konumu')
                                        ->options([
                                            'left' => 'Sol',
                                            'center' => 'Orta',
                                            'right' => 'Sağ'
                                        ])
                                        ->required()
                                ]),
                            Builder\Block::make('button')
                                ->label('Düğme')
                                ->schema([
                                    TextInput::make('text')
                                        ->label('Buton Yazısı')
                                        ->required(),
                                    TextInput::make('link')
                                        ->label('Buton Linki')
                                        ->required()
                                ]),
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort')
                    ->label('Sıra')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Başlık')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('is_active')
                    ->label('Durum')
                    ->sortable()
                    ->searchable()
                    ->enum([1 => 'Aktif', 2 => 'Pasif']),
                TextColumn::make('created_at')
                    ->label('Tarih')
                    ->sortable()
            ])
            ->reorderable('sort')
            ->defaultSort('sort')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected function getTableReorderColumn(): string
    {
        return 'sort';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
