<?php

namespace App\Filament\Resources;

use App\Enums\Status;
use App\Filament\Resources\ProductCommentsResource\Pages;
use App\Models\Product;
use App\Models\ProductComments;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ProductCommentsResource extends Resource
{
    protected static ?string $model = ProductComments::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Ürün Yönetimi';

    protected static ?string $navigationLabel = 'Yorumlar';

    protected static ?string $label = 'Yorum';

    protected static ?string $pluralLabel = 'Yorumlar';

    protected static ?int $navigationSort = 2;

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
                        ->options(Status::toArray()),
                    Select::make('is_new')
                        ->label('Yeni/Eski')
                        ->options([
                            0 => 'Yeni',
                            1 => 'Eski'
                        ]),
                    Textarea::make('comment')
                        ->label('Yorum')
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
                Tables\Columns\TextColumn::make('status')->label('Durum')->enum(Status::toArray())->sortable()->searchable(),
                Tables\Columns\TextColumn::make('is_new')->label('Yeni / Eski')->enum([
                    0 => 'Yeni',
                    1 => 'Eski'
                ])->sortable()->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->label('Ürün Arayın')
                    ->searchable()
                    ->options(Product::pluck('title', 'id')->toArray()),
                Tables\Filters\SelectFilter::make('status')
                    ->searchable()
                    ->label('Durum')
            ->options(Status::toArray()),
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
            Tables\Actions\BulkAction::make('passive')
                ->label('Pasifleştir')
                ->icon('heroicon-o-thumb-down')
                ->color('danger')
                ->action(fn(Collection $records) => $records->each(fn(Model $record) => $record->update(['status' => Status::Passive->value]))),
            Tables\Actions\BulkAction::make('active')
                ->label('Aktifleştir')
                ->icon('heroicon-o-thumb-up')
                ->color('success')
                ->action(fn(Collection $records) => $records->each(fn(Model $record) => $record->update(['status' => Status::Active->value]))),
            Tables\Actions\BulkAction::make('read')
                ->label('Okundu Yap')
                ->icon('heroicon-o-eye')
                ->color('success')
                ->action(fn(Collection $records) => $records->each(fn(Model $record) => $record->update(['is_new' => 1]))),
                Tables\Actions\BulkAction::make('unread')
                    ->label('Okunmamış Yap')
                    ->icon('heroicon-o-eye-off')
                    ->color('danger')
                    ->action(fn(Collection $records) => $records->each(fn(Model $record) => $record->update(['is_new' => 0]))),
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
            'index' => Pages\ListProductComments::route('/'),
            'view' => Pages\ViewProductComment::route('/{record}/view'),
            'edit' => Pages\EditProductComments::route('/{record}/edit'),
        ];
    }
}
