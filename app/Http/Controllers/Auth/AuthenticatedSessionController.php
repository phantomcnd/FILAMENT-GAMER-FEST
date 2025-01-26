<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Redirigir según el rol del usuario
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

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
