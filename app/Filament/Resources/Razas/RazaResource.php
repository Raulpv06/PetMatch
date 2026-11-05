<?php

namespace App\Filament\Resources\Razas;

use App\Filament\Resources\Razas\Pages\CreateRaza;
use App\Filament\Resources\Razas\Pages\EditRaza;
use App\Filament\Resources\Razas\Pages\ListRazas;
use App\Filament\Resources\Razas\Schemas\RazaForm;
use App\Filament\Resources\Razas\Tables\RazasTable;
use App\Models\Raza;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RazaResource extends Resource
{
    protected static ?string $model = Raza::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return RazaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RazasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRazas::route('/'),
            'create' => CreateRaza::route('/create'),
            'edit' => EditRaza::route('/{record}/edit'),
        ];
    }
}
