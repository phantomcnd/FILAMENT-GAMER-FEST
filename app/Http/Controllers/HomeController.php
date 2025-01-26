<?php

namespace App\Http\Controllers;

use App\Models\Post; // Importa el modelo Post para obtener los datos de los juegos

class HomeController extends Controller
{
    public function index()
    {
        // Obtén todos los juegos dinámicos desde la base de datos
        $juegos = Post::all();

        // Retorna la vista welcome.blade.php con los juegos dinámicos
        return view('welcome', compact('juegos'));
    }

    
}
