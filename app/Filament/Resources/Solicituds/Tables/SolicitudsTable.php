<?php

namespace App\Filament\Resources\Solicituds\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SolicitudsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('idMascota')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('idAdoptante')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('idEstadoSolicitud')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('idUsuario')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fechaSolicitud')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('motivoRechazo')
                    ->searchable(),
                TextColumn::make('fechaResolucion')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
