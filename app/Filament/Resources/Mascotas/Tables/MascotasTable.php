<?php

namespace App\Filament\Resources\Mascotas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MascotasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                /*TextColumn::make('idRaza')
                    ->numeric()
                    ->sortable(),*/
                TextColumn::make('raza.nombreRaza') // Cambia 'nombreRaza' por el campo real en tu tabla razas
                    ->label('Raza')
                    ->searchable()
                    ->sortable(),
                /*TextColumn::make('idEstadoMascota')
                    ->numeric()
                    ->sortable(),*/
                TextColumn::make('estadoMascota.nombreEstado') // Cambia según la relación y columna de tu estado
                    ->label('Estado')
                    ->searchable()
                    ->sortable(),
                /*TextColumn::make('idUsuario')
                    ->numeric()
                    ->sortable(),*/
                TextColumn::make('usuario.nombre') // Muestra el nombre del usuario asignado
                    ->label('Usuario')
                    ->searchable(),
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('edadEstimadaMeses')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sexo')
                    ->searchable(),
                TextColumn::make('tamanio')
                    ->searchable(),
                TextColumn::make('fechaIngreso')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
