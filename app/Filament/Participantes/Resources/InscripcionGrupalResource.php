<?php

namespace App\Filament\Participantes\Resources;

use App\Filament\Participantes\Resources\InscripcionGrupalResource\Pages;
use App\Models\InscripcionGrupal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Carbon;

class InscripcionGrupalResource extends Resource
{
    protected static ?string $model = InscripcionGrupal::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Inscripciones';

    protected static ?string $label = 'Juegos Grupales';

    protected static ?string $pluralLabel = 'Juegos Grupales';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre_equipo')
                    ->required()
                    ->label('Nombre del Equipo'),

                Select::make('post_id')
                    ->relationship('post', 'nombre') // Relación con la tabla posts
                    ->required()
                    ->label('Juego'),

                Select::make('lider_id')
                    ->relationship('lider', 'name') // Relación con el líder del grupo
                    ->required()
                    ->label('Líder del Grupo'),

                TextInput::make('integrantes')
                    ->required()
                    ->placeholder('Escribe los integrantes separados por comas')
                    ->label('Integrantes'),

                TextInput::make('monto')
                    ->numeric()
                    ->required()
                    ->label('Monto'),

                TextInput::make('numero_comprobante')
                    ->required()
                    ->unique('inscripciones_grupales', 'numero_comprobante')
                    ->label('Número de Comprobante'),

                FileUpload::make('comprobante_pago')
                    ->required()
                    ->label('Comprobante de Pago')
                    ->directory('comprobantes')
                    ->maxSize(1024), // 1 MB máximo

                TextInput::make('estado')
                    ->default('pendiente')
                    ->disabled()
                    ->label('Estado'),

                TextInput::make('fecha_inscripcion')
                    ->disabled()
                    ->default(Carbon::now()->toDateTimeString())
                    ->label('Fecha de Inscripción'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre_equipo')
                    ->label('Equipo')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('post.nombre')
                    ->label('Juego')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('lider.name')
                    ->label('Líder del Grupo')
                    ->sortable(),

                TextColumn::make('integrantes')
                    ->label('Integrantes')
                    ->wrap(),

                TextColumn::make('monto')
                    ->label('Monto')
                    ->sortable(),

                BadgeColumn::make('estado')
                    ->label('Estado')
                    ->colors([
                        'success' => 'aprobado',
                        'warning' => 'pendiente',
                    ]),

                TextColumn::make('fecha_inscripcion')
                    ->label('Fecha de Inscripción')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('estado')
                    ->label('Estado de Inscripción')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                    ]),
            ])
            ->defaultSort('nombre_equipo') // Ordenar por defecto por nombre del equipo
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInscripcionGrupals::route('/'),
            'create' => Pages\CreateInscripcionGrupal::route('/create'),
            'edit' => Pages\EditInscripcionGrupal::route('/{record}/edit'),
        ];
    }
}
