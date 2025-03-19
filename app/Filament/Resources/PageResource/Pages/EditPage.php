<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ( $data['template'] === 'App\PageTemplates\Contact' ) {

            if ( !empty($data['data']['contact']['location']) ) {
                $location = $data['data']['contact']['location'];
                //get link from iframe embed code
                preg_match('/src="([^"]+)"/', $location, $match);
                $data['data']['contact']['location'] = $match[1] ?? '';
            }
        }

        return $data;
    }
}
