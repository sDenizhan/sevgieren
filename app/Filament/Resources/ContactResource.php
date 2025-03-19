<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-alt-2';

    protected static ?string $navigationGroup = 'Site Yönetimi';

    protected static ?string $navigationLabel = 'Mesajlar';

    protected static ?string $label = 'Mesaj';

    protected static ?string $pluralLabel = 'Mesajlar';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_surname')->label('Ad Soyad')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('subject')->label('Konu')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Durumu')->enum([ 0 => 'Yeni', 1 => 'Okunmuş']),
                Tables\Columns\TextColumn::make('created_at')->formatStateUsing(fn($state) => $state->format('d F Y H:i'))->label('Tarih')->sortable()->searchable()
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Durum')
                    ->options([
                        0 => 'Yeni Mesajlar',
                        1 => 'Okunmuş Mesajlar'
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['status'] = 1;
                        return $data;
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewMessage::route('/{record}'),
        ];
    }
}
