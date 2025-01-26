<?php

namespace App\Filament\Tesorero\Resources;

use App\Filament\Tesorero\Resources\PagoIndividualResource\Pages;
use App\Models\PagoIndividual;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;



class PagoIndividualResource extends Resource
{
    protected static ?string $model = PagoIndividual::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Administracion de Pagos';

    protected static ?string $label = 'Pago Individual';

    protected static ?string $pluralLabel = 'Pagos Individuales';

    /**
     * Define el formulario para crear y editar registros.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label('Usuario'),
                Select::make('post_id')
                    ->relationship('post', 'nombre')
                    ->required()
                    ->label('Juego'),
                TextInput::make('monto')
                    ->required()
                    ->numeric()
                    ->label('Monto'),
                TextInput::make('numero_comprobante')
                    ->required()
                    ->unique('pagos_individuales', 'numero_comprobante')
                    ->label('Número de Comprobante'),
                FileUpload::make('comprobante_pago')
                    ->required()
                    ->image()
                    ->directory('comprobantes')
                    ->visibility('public')
                    ->label('Comprobante de Pago'),
                Select::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                        'rechazado' => 'Rechazado',
                    ])
                    ->default('pendiente')
                    ->label('Estado'),
            ]);
    }

    /**
     * Define las columnas de la tabla de listado.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Usuario')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('post.nombre')
                    ->label('Juego')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('monto')
                    ->label('Monto')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('numero_comprobante')
                    ->label('Número de Comprobante')
                    ->searchable(),
                    BadgeColumn::make('estado')
                    ->label('Estado')
                    ->colors([
                        'warning' => 'pendiente',
                        'success' => 'aprobado',
                        'danger' => 'rechazado',
                    ])
                    ->enum([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                        'rechazado' => 'Rechazado',
                    ])
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                        'rechazado' => 'Rechazado',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    /**
     * Define las páginas del recurso.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPagoIndividuals::route('/'),
            'create' => Pages\CreatePagoIndividual::route('/create'),
            'edit' => Pages\EditPagoIndividual::route('/{record}/edit'),
        ];
    }
}
