<?php

namespace App\Filament\Resources\Usuarios;

use App\Filament\Resources\Usuarios\Pages;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Facades\Hash;

class UsuarioResource extends Resource
{
    // Modelo Eloquent que gestiona este recurso
    protected static ?string $model = Usuario::class;

    // Ícono representativo en el menú lateral
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-users';

    // Agrupador visual en la barra de navegación para clasificar módulos relacionados
    protected static \UnitEnum|string|null $navigationGroup = 'Configuración del Sistema';

    // Etiquetas en singular y plural utilizadas en botones, títulos y encabezados
    protected static ?string $modelLabel = 'Usuario';
    protected static ?string $pluralModelLabel = 'Usuarios';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // Contenedor visual tipo tarjeta distribuido en dos columnas
                Section::make('Información del Usuario')
                    ->schema([
                        // Selector vinculado mediante relación foránea con la tabla de roles
                        Forms\Components\Select::make('idRol')
                            ->label('Rol asignado')
                            ->relationship('rol', 'nombreRol')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(128),

                        Forms\Components\TextInput::make('apellidoPaterno')
                            ->label('Apellido Paterno')
                            ->required()
                            ->maxLength(128),

                        Forms\Components\TextInput::make('apellidoMaterno')
                            ->label('Apellido Materno')
                            ->maxLength(120),

                        // Validación de correo único que ignora el ID actual al editar para no bloquear el guardado
                        Forms\Components\TextInput::make('correo')
                            ->label('Correo Electrónico')
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->required(),

                        // Gestión de contraseña:
                        // 1. Encripta el texto con Hash::make antes de almacenar en la base de datos.
                        // 2. Solo se envía al modelo si el campo contiene texto, permitiendo dejarlo vacío al editar sin borrar la contraseña previa.
                        // 3. Obligatorio al crear un nuevo usuario, opcional durante la edición.
                        Forms\Components\TextInput::make('contraseña')
                            ->label('Contraseña')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create'),

                        // Interruptor booleano para el estatus de la cuenta, activo por defecto
                        Forms\Components\Toggle::make('activo')
                            ->label('Usuario Activo')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idUsuario')
                    ->label('ID')
                    ->sortable(),

                // Concatena el nombre completo en una sola columna con soporte para búsqueda textual
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre Completo')
                    ->formatStateUsing(fn ($record) => "{$record?->nombre} {$record?->apellidoPaterno} {$record?->apellidoMaterno}")
                    ->searchable(),

                Tables\Columns\TextColumn::make('correo')
                    ->label('Correo')
                    ->searchable(),

                // Consulta el nombre del rol a través de la relación Eloquent y lo estiliza como insignia (badge)
                Tables\Columns\TextColumn::make('rol.nombreRol')
                    ->label('Rol')
                    ->badge(),

                // Renderiza un ícono gráfico para representar el estado activo/inactivo
                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->label('Activo'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y')
                    ->label('Registro'),
            ])
            ->actions([
                // Acciones operativas por cada fila del listado
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsuarios::route('/'),
            'create' => Pages\CreateUsuario::route('/create'),
            'edit' => Pages\EditUsuario::route('/{record}/edit'),
        ];
    }
}