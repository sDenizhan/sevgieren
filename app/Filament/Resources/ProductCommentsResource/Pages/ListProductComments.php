<?php

namespace App\Filament\Resources\ProductCommentsResource\Pages;

use App\Filament\Resources\ProductCommentsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductComments extends ListRecords
{
    protected static string $resource = ProductCommentsResource::class;
}
