<?php

namespace App\Filament\Resources\Solicituds;

use App\Filament\Resources\Solicituds\Pages;
use App\Models\Solicitud;
use App\Models\Mascota;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;

class SolicitudResource extends Resource
{
    // Modelo Eloquent enlazado a este recurso
    protected static ?string $model = Solicitud::class;

    // Icono y categoría de agrupación dentro del menú lateral del panel
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';
    protected static \UnitEnum|string|null $navigationGroup = 'Gestión de Adopciones';

    // Nombres legibles en la interfaz para títulos, botones y modales
    protected static ?string $modelLabel = 'Solicitud de Adopción';
    protected static ?string $pluralModelLabel = 'Solicitudes de Adopción';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Datos de la Solicitud')
                    ->schema([

                        // Selector de mascota: Filtra solo aquellas con estado 'Disponible' (o conserva la actual si se edita)
                        // y concatena en el texto visible su nombre, raza, especie, tamaño y edad
                        Forms\Components\Select::make('idMascota')
                            ->label('Mascota a Adoptar')
                            ->relationship('mascota', 'nombre', modifyQueryUsing: fn (Builder $query, ?Solicitud $record) => 
                                $query->whereHas('estadoMascota', fn ($q) => $q->where('nombreEstado', 'Disponible'))
                                    ->when($record, fn ($q) => $q->orWhere('idMascota', $record->idMascota))
                            )
                            // Muestra: Nombre - Raza (Especie) | Tamaño | X meses
                            ->getOptionLabelFromRecordUsing(fn ($record) => 
                                "{$record->nombre} — {$record->raza?->nombreRaza} ({$record->raza?->especie?->nombreEspecie}) | {$record->tamanio} | {$record->edadEstimadaMeses} meses"
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        // Selector de adoptante: Relaciona la solicitud y muestra nombre completo con teléfono
                        Forms\Components\Select::make('idAdoptante')
                            ->label('Adoptante Solicitante')
                            ->relationship('adoptante', 'nombre')
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record?->nombre} {$record?->apellidoPaterno} ({$record?->telefono})")
                            ->searchable()
                            ->preload()
                            ->required(),

                        // Estado de la solicitud: 'live()' permite redibujar el formulario al instante para mostrar u ocultar otros campos
                        Forms\Components\Select::make('idEstadoSolicitud')
                            ->label('Estado de la Solicitud')
                            ->relationship('estado', 'nombreEstado')
                            ->default(1)
                            ->required()
                            ->live(),

                        // Guarda de forma transparente el ID del usuario/empleado logueado que crea el registro
                        Forms\Components\Hidden::make('idUsuario')
                            ->default(fn () => auth()->id()),

                        Forms\Components\DateTimePicker::make('fechaSolicitud')
                            ->label('Fecha de Solicitud')
                            ->default(now())
                            ->required(),

                        // Campo condicional reactivo: Solo se vuelve visible y requerido si el estado es 'Rechazada' (ID = 3)
                        Forms\Components\Textarea::make('motivoRechazo')
                            ->label('Motivo del Rechazo')
                            ->placeholder('Detalla la razón por la que no procede la solicitud...')
                            ->rows(3)
                            ->visible(fn ($get) => (int)$get('idEstadoSolicitud') === 3)
                            ->required(fn ($get) => (int)$get('idEstadoSolicitud') === 3),

                        // Campo condicional reactivo: Se muestra si la solicitud ya tiene resolución (Aprobada, Rechazada o Cancelada: 2, 3 o 4)
                        Forms\Components\DateTimePicker::make('fechaResolucion')
                            ->label('Fecha de Resolución')
                            ->visible(fn ($get) => in_array((int)$get('idEstadoSolicitud'), [2, 3, 4]))
                            ->default(now()),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idSolicitud')
                    ->label('Folio')
                    ->sortable(),

                Tables\Columns\TextColumn::make('mascota.nombre')
                    ->label('Mascota')
                    ->sortable()
                    ->searchable(),

                // Muestra nombre y apellido del adoptante, permitiendo buscar por cualquiera de los dos en la tabla
                Tables\Columns\TextColumn::make('adoptante.nombre')
                    ->label('Adoptante')
                    ->formatStateUsing(fn ($record) => "{$record?->adoptante?->nombre} {$record?->adoptante?->apellidoPaterno}")
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('adoptante', function ($q) use ($search) {
                            $q->where('nombre', 'like', "%{$search}%")
                                ->orWhere('apellidoPaterno', 'like', "%{$search}%");
                        });
                    }),

                // Despliega el estado en forma de insignia (badge) asignando colores según su valor
                Tables\Columns\TextColumn::make('estado.nombreEstado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Aprobada' => 'success',
                        'En revisión' => 'warning',
                        'Rechazada' => 'danger',
                        'Cancelada' => 'gray',
                        default => 'info',
                    }),

                Tables\Columns\TextColumn::make('fechaSolicitud')
                    ->dateTime('d/m/Y H:i')
                    ->label('Fecha Solicitud'),

                Tables\Columns\TextColumn::make('usuario.nombre')
                    ->label('Atendido por'),
            ])
            ->filters([
                // Filtro superior desplegable para listar solicitudes por su estado
                Tables\Filters\SelectFilter::make('idEstadoSolicitud')
                    ->label('Filtrar por Estado')
                    ->relationship('estado', 'nombreEstado'),
            ])
            ->actions([
                // Botones de acción individual por cada registro
                EditAction::make(),
                ViewAction::make(),
            ])
            ->bulkActions([
                // Acciones por lote aplicables a múltiples filas seleccionadas con checkbox
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Define las rutas y páginas asociadas al recurso dentro del panel
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSolicituds::route('/'),
            'create' => Pages\CreateSolicitud::route('/create'),
            'view' => Pages\ViewSolicitud::route('/{record}'),
            'edit' => Pages\EditSolicitud::route('/{record}/edit'),
        ];
    }
}