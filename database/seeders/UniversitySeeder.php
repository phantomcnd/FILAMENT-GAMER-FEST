<?php
namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $universities = [
            ['name' => 'Universidad Central del Ecuador'],
            ['name' => 'Escuela Politécnica Nacional'],
            ['name' => 'Universidad de Cuenca'],
            ['name' => 'Universidad Técnica de Ambato'],
            ['name' => 'Universidad Técnica del Norte'],
            ['name' => 'Universidad Técnica Particular de Loja'],
            ['name' => 'Pontificia Universidad Católica del Ecuador'],
            ['name' => 'Universidad San Francisco de Quito'],
            ['name' => 'Universidad Politécnica Salesiana'],
            ['name' => 'Universidad de las Fuerzas Armadas ESPE'],
            ['name' => 'Universidad Estatal de Guayaquil'],
            ['name' => 'Universidad Casa Grande'],
            ['name' => 'Universidad del Azuay'],
            ['name' => 'Universidad de Loja'],
            ['name' => 'Universidad Técnica Estatal de Quevedo'],
            ['name' => 'Universidad Laica Eloy Alfaro de Manabí'],
            ['name' => 'Universidad de Especialidades Espíritu Santo'],
            ['name' => 'Universidad Internacional SEK'],
            ['name' => 'Universidad Tecnológica Equinoccial'],
            ['name' => 'Universidad Estatal de Milagro'],
            ['name' => 'Universidad Técnica Luis Vargas Torres de Esmeraldas'],
            ['name' => 'Universidad Católica de Santiago de Guayaquil'],
            ['name' => 'Universidad de Otavalo'],
            ['name' => 'Universidad Regional Autónoma de los Andes (UNIANDES)'],
            ['name' => 'Universidad Internacional del Ecuador'],
            ['name' => 'Universidad Estatal Amazónica'],
            ['name' => 'Universidad Nacional de Loja'],
            ['name' => 'Universidad Estatal Península de Santa Elena'],
            ['name' => 'Universidad Técnica de Machala'],
            ['name' => 'Universidad Técnica de Manabí'],
            ['name' => 'Universidad Agraria del Ecuador'],
        ];

        University::insert($universities);
    }
}
