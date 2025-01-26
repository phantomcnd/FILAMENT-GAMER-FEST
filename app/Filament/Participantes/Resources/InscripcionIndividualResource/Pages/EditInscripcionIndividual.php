<?php

namespace App\Filament\Participantes\Resources\InscripcionIndividualResource\Pages;

use App\Filament\Participantes\Resources\InscripcionIndividualResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscripcionIndividual extends EditRecord
{
    protected static string $resource = InscripcionIndividualResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
