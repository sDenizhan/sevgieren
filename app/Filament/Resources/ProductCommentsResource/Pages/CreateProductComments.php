<?php

namespace App\Filament\Resources\ProductCommentsResource\Pages;

use App\Filament\Resources\ProductCommentsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductComments extends CreateRecord
{
    protected static string $resource = ProductCommentsResource::class;
}
