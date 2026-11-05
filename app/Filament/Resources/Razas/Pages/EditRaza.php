<?php

namespace App\Filament\Resources\Razas\Pages;

use App\Filament\Resources\Razas\RazaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRaza extends EditRecord
{
    protected static string $resource = RazaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
