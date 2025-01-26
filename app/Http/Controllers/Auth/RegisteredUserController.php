<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\University;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Cargar todas las universidades desde la base de datos
        $universities = University::all();

        // Pasar las universidades a la vista
        return view('auth.register', compact('universities'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'universidad' => ['required', 'string'], // Asegura que sea obligatorio
            'telefono' => ['required', 'string', 'max:15'], // Validación para teléfono
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Siempre asignar el rol de participante por defecto
        $defaultRole = User::ROLE_PARTICIPANTE;
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'universidad' => $request->universidad, // Guarda el nombre de la universidad seleccionada
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            'rol_id' => $defaultRole, // Asignar el rol por defecto
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirigir al dashboard según el rol del usuario
        return $this->redirectToDashboard($user);
    }

    /**
     * Redirige al dashboard basado en el rol del usuario.
     */
        protected function redirectToDashboard(User $user): RedirectResponse
        {
            switch ($user->rol_id) {
                case 1: // Administrador
                    return redirect('/admin/dashboard');
                case 2: // Participante
                    return redirect('/participantes/dashboard2');
                case 3: // Tesorero
                    return redirect('/tesorero/dashboard3');
                case 4: // Colaborador
                    return redirect('/colaboradores/dashboard4');
                default:
                    abort(403, 'No tienes acceso a esta página.');
            }
        }
}
