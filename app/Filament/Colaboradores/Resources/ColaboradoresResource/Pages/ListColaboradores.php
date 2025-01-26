<?php

namespace App\Filament\Colaboradores\Resources\ColaboradoresResource\Pages;

use App\Filament\Colaboradores\Resources\ColaboradoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColaboradores extends ListRecords
{
    protected static string $resource = ColaboradoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
