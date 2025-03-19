<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function mutateFormData(array $data): array
    {
        if ( $data['template'] === 'App\PageTemplates\Contact' )
        {
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
