<?php

namespace App\Filament\Participantes\Resources;

use App\Filament\Participantes\Resources\InscripcionIndividualResource\Pages;
use App\Filament\Participantes\Resources\InscripcionIndividualResource\RelationManagers;
use App\Models\InscripcionIndividual;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InscripcionIndividualResource extends Resource
{
    protected static ?string $model = InscripcionIndividual::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inscripciones';

    protected static ?string $label = 'Inscripción Individual';

    protected static ?string $pluralLabel = 'Inscripciones Individuales';

    /**
     * Formulario para crear y editar inscripciones individuales.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('post_id')
                    ->relationship('post', 'nombre') // Relación con la tabla posts, mostrando el nombre del juego
                    ->required()
                    ->label('Juego'),
                TextInput::make('monto')
                    ->numeric()
                    ->required()
                    ->label('Monto'),
                TextInput::make('numero_comprobante')
                    ->required()
                    ->unique('inscripciones', 'numero_comprobante')
                    ->label('Número de Comprobante'),
                FileUpload::make('comprobante_pago')
                    ->required()
                    ->image()
                    ->label('Comprobante de Pago'),

                    Select::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                    ])
                    ->disabled() // Deshabilitado para evitar modificaciones
                    ->default('pendiente')
                    ->label('Estado'),
                DateTimePicker::make('fecha_inscripcion')
                    ->required()
                    ->default(now())
                    ->label('Fecha de Inscripción'),
            ]);
    }

    /**
     * Tabla que muestra las inscripciones individuales.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('post.nombre')
                    ->label('Juego')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('monto')
                    ->label('Monto')
                    ->sortable(),
                TextColumn::make('numero_comprobante')
                    ->label('Número de Comprobante')
                    ->searchable(),
                BadgeColumn::make('estado')
                    ->label('Estado')
                    ->colors([
                        'warning' => 'pendiente',
                        'success' => 'aprobado',
                    ]),
                TextColumn::make('fecha_inscripcion')
                    ->label('Fecha de Inscripción')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                    ]),
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

    /**
     * Relaciones para el recurso.
     */
    public static function getRelations(): array
    {
        return [
            // Agregar aquí si hay RelationManagers necesarios
        ];
    }

    /**
     * Páginas para el recurso.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInscripcionIndividuals::route('/'),
            'create' => Pages\CreateInscripcionIndividual::route('/create'),
            'edit' => Pages\EditInscripcionIndividual::route('/{record}/edit'),
        ];
    }
}
