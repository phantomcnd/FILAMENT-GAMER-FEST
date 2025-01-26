<?php

namespace App\Filament\Participantes\Resources\InscripcionIndividualResource\Pages;

use App\Filament\Participantes\Resources\InscripcionIndividualResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInscripcionIndividuals extends ListRecords
{
    protected static string $resource = InscripcionIndividualResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
