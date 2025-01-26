<?php

namespace App\Filament\Tesorero\Resources;

use App\Filament\Tesorero\Resources\TransactionResource\Pages;
use App\Filament\Tesorero\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Gestión Financiera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('user.name') // Campo de usuario
                    ->label('Usuario')
                    ->disabled(),

                \Filament\Forms\Components\TextInput::make('game') // Campo del juego
                    ->label('Juego')
                    ->required(),

                \Filament\Forms\Components\TextInput::make('amount') // Campo del monto
                    ->label('Monto')
                    ->numeric()
                    ->required(),

                \Filament\Forms\Components\Select::make('status') // Estado del pago
                    ->label('Estado del Pago')
                    ->options([
                        'pending' => 'Pendiente',
                        'verified' => 'Verificado',
                    ])
                    ->required(),

                \Filament\Forms\Components\FileUpload::make('receipt_path') // Comprobante de pago
                    ->label('Comprobante de Pago')
                    ->image(),

                \Filament\Forms\Components\TextInput::make('transaction_number') // Número del comprobante
                    ->label('Número de Comprobante'),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            \Filament\Tables\Columns\TextColumn::make('user.name') // Columna de usuario
                ->label('Usuario')
                ->sortable()
                ->searchable(),

            \Filament\Tables\Columns\TextColumn::make('game') // Columna de juego
                ->label('Juego')
                ->sortable()
                ->searchable(),

            \Filament\Tables\Columns\TextColumn::make('amount') // Columna de monto
                ->label('Monto')
                ->sortable(),

            \Filament\Tables\Columns\TextColumn::make('status') // Columna de estado
                ->label('Estado del Pago')
                ->sortable()
                ->formatStateUsing(function ($state) {
                    return $state === 'pending' ? 'Pendiente' : 'Verificado';
                }),

            \Filament\Tables\Columns\TextColumn::make('transaction_number') // Columna de comprobante
                ->label('Núm. de Comprobante'),
        ])
        ->filters([
            \Filament\Tables\Filters\SelectFilter::make('status')
                ->label('Estado del Pago')
                ->options([
                    'pending' => 'Pendiente',
                    'verified' => 'Verificado',
                ]),
        ])
        ->actions([
            \Filament\Tables\Actions\EditAction::make(),
            \Filament\Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            \Filament\Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}