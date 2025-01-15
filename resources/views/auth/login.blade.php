<x-guest-layout>
    <!-- Contenedor del formulario con efecto neón azul claro -->
    <div class="neon-form mx-auto max-w-md">
        <div class="text-center">
            <!-- Título del formulario -->
            <h1 class="text-4xl font-extrabold text-white mb-4 neon-text">Inicia Sesión</h1>
            <p class="text-gray-300 text-sm my-6">Introduce tus credenciales para acceder a tu cuenta.</p>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo Electrónico -->
            <div class="mb-6">
                <x-input-label for="email" :value="__('Correo Electrónico')" class="block text-lg font-semibold text-white mb-2" />
                <x-text-input 
                    id="email" 
                    class="block mt-1 w-full bg-gray-800 text-white text-base placeholder-gray-500 rounded-lg p-4 border-2 border-gray-600 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none neon-box" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="example@correo.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mb-6">
                <x-input-label for="password" :value="__('Contraseña')" class="block text-lg font-semibold text-white mb-2" />
                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full bg-gray-800 text-white text-base placeholder-gray-500 rounded-lg p-4 border-2 border-gray-600 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none neon-box" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="********"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recordarme -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded bg-gray-800 border-gray-300 text-pink-500 shadow-sm focus:ring-2 focus:ring-pink-500 dark:focus:ring-offset-gray-800" 
                        name="remember" 
                    />
                    <span class="ml-2 text-sm text-gray-400">Recuérdame</span>
                </label>
            </div>

            <!-- Enlaces de acción y botón de inicio de sesión -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a 
                        class="underline text-sm text-gray-400 hover:text-white transition"
                        href="{{ route('password.request') }}"
                    >
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <button 
                    type="submit" 
                    class="bg-pink-500 text-white text-lg font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-pink-600 neon-btn transition"
                >
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>