<?php

namespace App\Filament\Colaboradores\Resources\ColaboradoresResource\Pages;

use App\Filament\Colaboradores\Resources\ColaboradoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColaboradores extends EditRecord
{
    protected static string $resource = ColaboradoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
