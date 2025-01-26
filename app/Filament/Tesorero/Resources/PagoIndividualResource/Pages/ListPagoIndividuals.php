<?php

namespace App\Filament\Tesorero\Resources\PagoIndividualResource\Pages;

use App\Filament\Tesorero\Resources\PagoIndividualResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPagoIndividuals extends ListRecords
{
    protected static string $resource = PagoIndividualResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
