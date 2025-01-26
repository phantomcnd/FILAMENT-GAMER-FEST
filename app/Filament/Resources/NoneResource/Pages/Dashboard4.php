<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard4 extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard Colaborador'; // Cambiar título
    protected static string $view = 'filament.pages.dashboard4'; // Usar la vista personalizada
}
