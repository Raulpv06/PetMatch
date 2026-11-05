<?php

namespace App\Filament\Resources\Razas\Pages;

use App\Filament\Resources\Razas\RazaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRazas extends ListRecords
{
    protected static string $resource = RazaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
