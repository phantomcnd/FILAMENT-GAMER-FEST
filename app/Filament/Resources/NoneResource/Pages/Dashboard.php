<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard Administrador'; // Cambiar título
    protected static string $view = 'filament.pages.dashboard'; // Usar la vista personalizada
}
