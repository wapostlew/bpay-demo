<?php

namespace App\Filament\Resources\KitsuResource\Pages;

use App\Filament\Resources\KitsuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKitsu extends EditRecord
{
    protected static string $resource = KitsuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
