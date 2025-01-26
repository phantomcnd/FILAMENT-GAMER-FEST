<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard2 extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard Participante'; // Cambiar título
    protected static string $view = 'filament.pages.dashboard2'; // Usar la vista personalizada
}
