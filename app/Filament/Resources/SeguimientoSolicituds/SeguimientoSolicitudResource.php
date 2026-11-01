<?php

namespace App\Filament\Resources\SeguimientoSolicituds;

use App\Filament\Resources\SeguimientoSolicituds\Pages;
use App\Models\SeguimientoSolicitud;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SeguimientoSolicitudResource extends Resource
{
    // Modelo Eloquent enlazado para consultar y registrar la bitácora
    protected static ?string $model = SeguimientoSolicitud::class;

    // Icono y categoría de agrupación dentro del menú lateral del panel
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static \UnitEnum|string|null $navigationGroup = 'Gestión de Adopciones';

    // Etiquetas legibles para la interfaz administrativa
    protected static ?string $modelLabel = 'Historial de Solicitud';
    protected static ?string $pluralModelLabel = 'Bitácora de Seguimientos';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // Selector de la solicitud asociada mediante su ID/Folio
                Forms\Components\Select::make('idSolicitud')
                    ->label('Folio Solicitud')
                    ->relationship('solicitud', 'idSolicitud')
                    ->searchable()
                    ->preload()
                    ->required(),

                // Selector del estado asignado durante este cambio en el trámite
                Forms\Components\Select::make('idEstadoSolicitud')
                    ->label('Estado de la Solicitud')
                    ->relationship('estado', 'nombreEstado')
                    ->required(),

                // Selector del empleado o usuario del sistema que gestiona el cambio
                Forms\Components\Select::make('idUsuario')
                    ->label('Operador Responsable')
                    ->relationship('usuario', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),

                // Registro del momento exacto del movimiento, con la fecha y hora actual por defecto
                Forms\Components\DateTimePicker::make('fechaCambio')
                    ->label('Fecha de Cambio')
                    ->default(now())
                    ->required(),

                // Justificación u observaciones descriptivas del cambio de estado
                Forms\Components\Textarea::make('notas')
                    ->label('Notas')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idSeguimientoSolicitud')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('idSolicitud')
                    ->label('Folio Solicitud')
                    ->sortable()
                    ->searchable(),

                // Etiqueta visual (badge) para distinguir el estado registrado en este punto del historial
                Tables\Columns\TextColumn::make('estado.nombreEstado')
                    ->label('Estado')
                    ->badge(),

                // Muestra el nombre completo del empleado responsable del movimiento
                Tables\Columns\TextColumn::make('usuario.nombre')
                    ->label('Operador')
                    ->formatStateUsing(fn ($record) => "{$record?->usuario?->nombre} {$record?->usuario?->apellidoPaterno}")
                    ->searchable(),

                Tables\Columns\TextColumn::make('fechaCambio')
                    ->dateTime('d/m/Y H:i:s')
                    ->label('Fecha de Cambio'),

                // Limita los caracteres visibles en la vista general para conservar la fila compacta
                Tables\Columns\TextColumn::make('notas')
                    ->limit(40)
                    ->label('Notas'),
            ])
            // Presenta los registros de la bitácora en orden cronológico descendente (el más reciente primero)
            ->defaultSort('fechaCambio', 'desc');
    }

    // Define únicamente la vista de listado para auditoría y consulta de eventos
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeguimientoSolicituds::route('/'),
        ];
    }
}