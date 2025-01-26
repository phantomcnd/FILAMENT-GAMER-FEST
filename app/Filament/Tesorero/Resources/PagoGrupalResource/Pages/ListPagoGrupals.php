<?php

namespace App\Filament\Tesorero\Resources\PagoGrupalResource\Pages;

use App\Filament\Tesorero\Resources\PagoGrupalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPagoGrupals extends ListRecords
{
    protected static string $resource = PagoGrupalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
