<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    // Grupo de navegación
    protected static ?string $navigationGroup = 'Usuarios';
    protected static ?int $navigationSort = 1; // Orden bajo para que aparezca primero

    protected static ?string $model = User::class;
    protected static ?string $pluralLabel = 'Gestion de Usuarios'; // Plural

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Correo Electronico')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('universidad')
                ->label('Universidad')
                ->options(\App\Models\University::query()->pluck('name', 'name')) // Carga dinámica desde la tabla universities
                ->searchable() // Permite buscar universidades
                ->required() // Hace obligatorio el campo
                ->placeholder('Selecciona una universidad'),
                Forms\Components\TextInput::make('telefono')
                    ->label('Telefono')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                    Forms\Components\TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->required(fn (?User $record) => $record === null) // Solo en creación
                    ->maxLength(255)
                    ->hidden(fn (?User $record) => $record !== null), // Oculto en edición
                    Forms\Components\Select::make('rol_id')
                    ->label('Roles')
                    ->options(\App\Models\Rol::query()->pluck('nombre', 'id')) // Carga dinámica desde la tabla roles
                    ->searchable() // Permite buscar roles en el select
                    ->required() // Hace obligatorio el campo
                    ->placeholder('Selecciona un rol'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID') // Muestra "ID" como encabezado de columna en la tabla
                    ->sortable() // Permite ordenar la tabla por ID
                    ->searchable(), // Permite buscar en la tabla usando el campo ID
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Correo Electronico')
                    ->searchable(),
                Tables\Columns\TextColumn::make('universidad')
                    ->label('Universidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->label('ID')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('rol_id')
                    ->label('Roles'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
