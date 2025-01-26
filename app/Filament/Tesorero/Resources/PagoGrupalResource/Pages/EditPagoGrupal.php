<?php

namespace App\Filament\Tesorero\Resources\PagoGrupalResource\Pages;

use App\Filament\Tesorero\Resources\PagoGrupalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPagoGrupal extends EditRecord
{
    protected static string $resource = PagoGrupalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
