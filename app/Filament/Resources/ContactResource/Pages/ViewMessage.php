<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Form;
use Filament\Resources\Pages\ViewRecord;

class ViewMessage extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    public function mutateFormDataBeforeFill(array $data): array
    {
        Contact::find($data['id'])->update(['status' => 1]);
        $data['status'] = 1;
        return $data;
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Card::make([
                Grid::make(4)->schema([
                    Placeholder::make('Adı Soyadı')->content($this->record->name_surname),
                    Placeholder::make('Email Adresi')->content($this->record->mail_address),
                    Placeholder::make('Konu')->content($this->record->subject),
                    Placeholder::make('Gönderilme Tarihi')->content($this->record->created_at->format('d F Y H:i')),
                    Placeholder::make('Mesaj')->content($this->record->message)->columnSpan(3),
                ])
            ])
        ]);
    }
}
