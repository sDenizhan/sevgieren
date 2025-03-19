<?php

namespace App\Filament\Resources\ProductCommentsResource\Pages;

use App\Filament\Resources\ProductCommentsResource;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductComments;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Pages\Actions;
use Filament\Resources\Form;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\HtmlString;

class ViewProductComment extends ViewRecord
{
    protected static string $resource = ProductCommentsResource::class;


    public function mutateFormDataBeforeFill(array $data): array
    {
        ProductComments::find($data['id'])->update(['is_new' => 1]);
        $data['is_new'] = 1;
        return $data;
    }

    public function form(Form $form): Form
    {
        $record = Product::find($this->record->product_id);

        return $form->schema([
            Card::make([
                Grid::make(3)->schema([
                    Placeholder::make('Adı Soyadı')->content($this->record->name_surname),
                    Placeholder::make('Email Adresi')->content($this->record->email),
                    Placeholder::make('Gönderilme Tarihi')->content($this->record->created_at->format('d F Y H:i')),
                    Placeholder::make('İlgili Ürün')->content(function () use ($record){
                        return new HtmlString('<a href="'. route('products.details', ['slug' => $record->slug]).'" target="_blank">'. $record->title .'</a>');
                    }),
                    Placeholder::make('Yorum')->content($this->record->comment)->columnSpan(3),
                ])
            ])
        ]);
    }
}
