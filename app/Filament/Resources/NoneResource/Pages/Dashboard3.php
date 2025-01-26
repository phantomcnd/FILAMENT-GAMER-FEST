<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard3 extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard Tesorero'; // Cambiar título
    protected static string $view = 'filament.pages.dashboard3'; // Usar la vista personalizada
}
