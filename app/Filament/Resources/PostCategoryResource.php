<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostCategoryResource\Pages;
use App\Filament\Resources\PostCategoryResource\RelationManagers;
use App\Models\PostCategory;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostCategoryResource extends Resource
{
    protected static ?string $model = PostCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 5;
    protected static ?string $label = "Yazı Kategorisi";
    protected static ?string $pluralLabel = 'Yazı Kategorileri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('add-category')
                    ->columnSpan(2)
                    ->schema([
                        Tab::make('category')
                            ->label('Kategori Ekle')
                            ->schema([
                                Forms\Components\Card::make([
                                    Forms\Components\TextInput::make('name')
                                        ->label('Kategori Adı')
                                        ->required()
                                        ->reactive()
                                        ->afterStateUpdated(function (\Closure $set, $state){
                                            $set('slug', Str::slug($state));
                                        }),
                                    Forms\Components\TextInput::make('slug')
                                        ->label('URL')
                                        ->disabled()
                                ])
                            ]),
                        Tab::make('seo')
                            ->label('SEO Ayarları')
                            ->schema([
                                TextInput::make('seo.title')
                                    ->label('Seo Başlığı'),
                                Textarea::make('seo.description')
                                    ->label('SEO Açıklaması'),
                                Textarea::make('seo.metatags')
                                    ->label('Meta Etiketleri')
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Kategori Adı')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Tarih')->sortable(),
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
            'index' => Pages\ListPostCategories::route('/'),
            'create' => Pages\CreatePostCategory::route('/create'),
            'edit' => Pages\EditPostCategory::route('/{record}/edit'),
        ];
    }
}
