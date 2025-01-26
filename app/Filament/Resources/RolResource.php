<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RolResource\Pages;
use App\Models\Rol;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RolResource extends Resource
{
    protected static ?string $navigationGroup = 'Roles';
    protected static ?int $navigationSort = 3;

    protected static ?string $model = Rol::class;
    protected static ?string $pluralLabel = 'Gestión de Roles';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre del Rol')
                    ->required()
                    ->unique(
                        table: 'roles',
                        column: 'nombre',
                        ignoreRecord: true
                    )
                    ->maxLength(255),

                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->nullable()
                    ->maxLength(500),

                Forms\Components\Toggle::make('activo')
                    ->label('¿Activo?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->limit(50),

                Tables\Columns\TextColumn::make('activo')
                    ->label('Estado')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Activo' : 'Inactivo') // Muestra texto según el valor del estado
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('activo')
                    ->label('Solo Activos')
                    ->query(fn (Builder $query) => $query->where('activo', true)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRols::route('/'),
            'create' => Pages\CreateRol::route('/create'),
            'view' => Pages\ViewRol::route('/{record}'),
            'edit' => Pages\EditRol::route('/{record}/edit'),
        ];
    }
}
