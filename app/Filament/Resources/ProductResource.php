<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Ürün Yönetimi';

    protected static ?string $navigationLabel = 'Ürünler';

    protected static ?string $label = 'Ürün';

    protected static ?string $pluralLabel = 'Ürünler';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function (\Closure $set, $state){
                            return $set('slug', \Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->label('URL')
                        ->disabled()
                        ->required()
                ]),
                Tabs::make('main')
                    ->columnSpanFull()
                    ->schema([
                        Tabs\Tab::make('data')
                            ->label('Ürün Detayları')
                            ->columns(2)
                            ->schema([
                                TextInput::make('count')
                                    ->label('Stok Adeti')
                                    ->required(),
                                TextInput::make('price')
                                    ->label('Ürün Ücreti')
                                    ->required(),
                                Select::make('category_id')
                                    ->label('Ürün Kategorisi')
                                    ->options(ProductCategory::pluck('name', 'id')->toArray()),
                                TextInput::make('url')
                                    ->label('Ürün Satış Linki')
                                    ->required(),
                                FileUpload::make('featured_image')
                                    ->label('Ürün Resmi')
                                    ->directory('uploads/products')
                                    ->columnSpanFull()
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) : string {
                                        return \Str::of($file->getClientOriginalName())
                                            ->replace($file->getClientOriginalExtension(), '')
                                            ->slug()
                                            ->append('-featured.'. $file->getClientOriginalExtension());
                                    }),
                                TiptapEditor::make('description')
                                    ->label('Ürün Açıklaması')
                                    ->extraInputAttributes([
                                        'style' => 'min-height: 300px'
                                    ])
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Tabs\Tab::make('images')
                            ->label('Ürün Resimleri')
                            ->schema([
                                FileUpload::make('gallery')
                                    ->multiple()
                                    ->label('Ürün Resimleri')
                                    ->directory('uploads/products')
                                    ->helperText('Birden Fazla Resim Yükleyebilirsiniz')
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) : string {
                                        return \Str::of($file->getClientOriginalName())
                                                ->replace($file->getClientOriginalExtension(), '')
                                                ->slug()
                                                ->append('.'. $file->getClientOriginalExtension());
                                    })
                            ]),
                        Tabs\Tab::make('datas')
                            ->label('Ürün Bilgileri')
                            ->schema([
                                Forms\Components\Repeater::make('data')
                                    ->label('Ürün Bilgisi')
                                    ->createItemButtonLabel('Yeni Ekle')
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->schema([
                                        TextInput::make('key')
                                            ->label('Başlık')
                                            ->required(),
                                        TextInput::make('value')
                                            ->label('Değer')
                                            ->required()
                                    ])
                            ]),
                        Tabs\Tab::make('seo')
                            ->label('SEO Ayarları')
                            ->schema([
                                TextInput::make('seo.title')
                                    ->label('Seo Başlığı'),
                                Textarea::make('seo.description')
                                    ->label('SEO Açıklaması'),
                                Textarea::make('seo.metatags')
                                    ->label('Meta Etiketleri')
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Ürün Adı')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Ürün Kategorisi')->searchable()->sortable(),
                TextColumn::make('created_at')->label('Tarih')->searchable()->sortable(),
            ])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
