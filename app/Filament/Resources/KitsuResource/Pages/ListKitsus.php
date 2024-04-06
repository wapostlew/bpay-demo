<?php

namespace App\Filament\Resources\KitsuResource\Pages;

use App\Filament\Resources\KitsuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKitsus extends ListRecords
{
    protected static string $resource = KitsuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
