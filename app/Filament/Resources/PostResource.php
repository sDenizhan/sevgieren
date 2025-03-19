<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\PostCategory;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationLabel = 'Yazılar';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $label = 'Yazı';
    protected static ?string $pluralLabel = 'Yazılar';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $recordRouteKeyName = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('main')
                    ->columnSpan(2)
                    ->schema([
                        Tab::make('content')
                            ->label('Yazı Detayları')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Başlık')
                                            ->columnSpan(2)
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(function (\Closure $set, $state){
                                                $set('slug', Str::slug($state));
                                            }),
                                        TextInput::make('slug')
                                            ->label('URL')
                                            ->columnSpan(2)
                                            ->disabled()
                                    ]),
                                Grid::make(9)
                                    ->schema([
                                        TiptapEditor::make('content')
                                            ->columnSpan(6)
                                            ->label('Yazı')
                                            ->extraInputAttributes([
                                                'style' => 'height: 600px'
                                            ]),
                                            Grid::make(3)->schema([
                                                Select::make('status')
                                                    ->label('Yazı Durumu')
                                                    ->options([
                                                        0 => 'Pasif',
                                                        1 => 'Aktif'
                                                    ])
                                                    ->default(1)
                                                    ->columnSpan(3)
                                                    ->required(),
                                                Select::make('category_id')
                                                    ->label('Kategori Seçin')
                                                    ->searchable()
                                                    ->required()
                                                    ->columnSpan(3)
                                                    ->options(PostCategory::pluck('name', 'id')->toArray()),
                                                FileUpload::make('image')
                                                    ->label('Öne Çıkan Resim')
                                                    ->columnSpan(3)
                                                    ->enableDownload()
                                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) : string {
                                                        return Str::of($file->getClientOriginalName())
                                                            ->replace($file->getClientOriginalExtension(), '')
                                                            ->slug()
                                                            ->append('.'. $file->getClientOriginalExtension());
                                                    }),
                                            ])->columnSpan(3)
                                ])
                        ]),
                        Tabs\Tab::make('seo')
                            ->label('SEO Ayarları')
                            ->schema([
                                TextInput::make('seo.title')
                                    ->columnSpan(2)
                                    ->label('Seo Başlığı'),
                                Textarea::make('seo.description')
                                    ->columnSpan(2)
                                    ->label('SEO Açıklaması'),
                                Textarea::make('seo.metatags')
                                    ->columnSpan(2)
                                    ->label('Meta Etiketleri')

                            ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Başlık')->searchable()->sortable(),
                TextColumn::make('created_at')->label('Oluşturulma Tarihi')->sortable()->date('d F Y H:i:s')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
