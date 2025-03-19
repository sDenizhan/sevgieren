<?php

namespace App\Filament\Resources\ProductCommentsResource\Pages;

use App\Filament\Resources\ProductCommentsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductComments extends EditRecord
{
    protected static string $resource = ProductCommentsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
