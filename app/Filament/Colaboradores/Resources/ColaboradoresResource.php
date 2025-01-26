<?php

namespace App\Filament\Colaboradores\Resources;

use App\Filament\Colaboradores\Resources\ColaboradoresResource\Pages;
use App\Filament\Colaboradores\Resources\ColaboradoresResource\RelationManagers;
use App\Models\Colaboradores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColaboradoresResource extends Resource
{
    protected static ?string $model = Colaboradores::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListColaboradores::route('/'),
            'create' => Pages\CreateColaboradores::route('/create'),
            'edit' => Pages\EditColaboradores::route('/{record}/edit'),
        ];
    }
}
