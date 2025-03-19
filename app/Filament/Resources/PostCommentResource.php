<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostCommentResource\Pages;
use App\Filament\Resources\PostCommentResource\RelationManagers;
use App\Models\Post;
use App\Models\PostComment;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use FilamentTiptapEditor\TiptapEditor;

class PostCommentResource extends Resource
{
    protected static ?string $model = PostComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationLabel = 'Yorumlar';

    protected static ?int $navigationSort = 3;

    protected static ?string $label = 'Yorum';

    protected static ?string $pluralLabel = 'Yorumlar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('name_surname')
                        ->label('Ad Soyad'),
                    TextInput::make('email')
                        ->label('Email Adresi'),
                    Select::make('status')
                        ->label('Durum')
                        ->options([
                            0 => 'Pasif',
                            1 => 'Aktif'
                        ]),
                    Select::make('is_new')
                        ->label('Yeni/Eski')
                        ->options([
                            0 => 'Yeni',
                            1 => 'Eski'
                        ]),
                    Textarea::make('message')
                        ->label('Mesaj')
                        ->columnSpanFull()
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_surname')->label('Adı Soyadı')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email Adresi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Durum')->enum([
                    0 => 'Pasif',
                    1 => 'Aktif'
                ])->sortable()->searchable(),
                Tables\Columns\TextColumn::make('is_new')->label('Yeni / Eski')->enum([
                    0 => 'Yeni',
                    1 => 'Eski'
                ])->sortable()->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('post_id')
                    ->label('Yazı Arayın')
                    ->searchable()
                    ->options(Post::pluck('title', 'id')->toArray()),
                Tables\Filters\SelectFilter::make('status')
                    ->searchable()
                    ->label('Durum')
                    ->options([
                        0 => 'Pasif',
                        1 => 'Aktif'
                    ]),
                Tables\Filters\SelectFilter::make('is_new')
                    ->searchable()
                    ->label('Yeni/Eski')
                    ->options([
                        0 => 'Yeni',
                        1 => 'Eski'
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPostComments::route('/'),
            'view' => Pages\ViewComment::route('/{record}'),
            'edit' => Pages\EditPostComment::route('/{record}/edit'),
        ];
    }
}
