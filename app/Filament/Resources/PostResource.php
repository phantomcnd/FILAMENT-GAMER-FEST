<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;

class PostResource extends Resource
{
    // Grupo de navegación
    protected static ?string $navigationGroup = 'Juegos';
    protected static ?int $navigationSort = 2; // Orden bajo para que aparezca primero

    protected static ?string $model = Post::class;
    protected static ?string $pluralLabel = 'Gestion de Juegos'; // Plural

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                    ->label('Nombre del juego')
                    ->required()
                    ->maxLength(255),

                TextInput::make('categoria')
                    ->label('Descripcion del juego')
                    ->required()
                    ->maxLength(100),

                TextInput::make('precio')
                    ->label('Precio del juego')
                    ->required()
                    ->numeric() // Valida que sea un número
                    ->minValue(0), // Evita valores negativos

                FileUpload::make('imagen')
                    ->label('Imagen del juego')
                    ->image() // Valida que sea un archivo de imagen
                    ->directory('uploads/juegos') // Carpeta de almacenamiento
                    ->visibility('public') // Asegura que los archivos sean accesibles públicamente
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nombre')
                    ->label('Nombre del juego')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('categoria')
                    ->label('Descripcion')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('precio')
                    ->label('Precio')
                    ->sortable()
                    ->money('USD', true), // Muestra el precio en formato moneda

                ImageColumn::make('imagen')
                    ->label('Imagen del juego')
                    ->disk('public') // Indica que se usará el disco público
                    ->circular(), // Muestra la imagen en formato circular       
            ])
            ->filters([
                // Puedes añadir filtros si los necesitas
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Aquí puedes añadir relaciones si las necesitas
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
