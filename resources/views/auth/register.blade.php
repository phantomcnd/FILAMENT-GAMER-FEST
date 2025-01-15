<x-guest-layout>
    <!-- Contenedor del formulario con efecto neón azul claro -->
    <div class="neon-form mx-auto max-w-md">
        <div class="text-center">
            <!-- Título del formulario -->
            <h1 class="text-4xl font-extrabold text-white mb-4 neon-text">Regístrate</h1>
            <p class="text-gray-300 text-sm my-6">Completa los campos para crear una cuenta.</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre y Apellido -->
            <div class="mb-6">
                <x-input-label for="name" :value="__('Nombre y Apellido')" class="block text-lg font-semibold text-white mb-2" />
                <x-text-input 
                    id="name" 
                    class="block mt-1 w-full bg-gray-800 text-white text-base placeholder-gray-500 rounded-lg p-4 border-2 border-gray-600 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none neon-box" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Ingresa tu nombre completo" 
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

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
                    autocomplete="username"
                    placeholder="example@correo.com" 
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Universidad -->
            <div class="mb-6">
                <x-input-label for="universidad" :value="__('Universidad')" class="block text-lg font-semibold text-white mb-2" />
                <select 
                    id="universidad" 
                    name="universidad" 
                    class="block mt-1 w-full bg-gray-800 text-white text-base placeholder-gray-500 rounded-lg p-4 border-2 border-gray-600 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none neon-box"
                    required
                >
                    <option value="">Selecciona tu universidad</option>
                    <option value="Universidad Central del Ecuador">Universidad Central del Ecuador</option>
                    <option value="Escuela Politécnica Nacional">Escuela Politécnica Nacional</option>
                    <option value="Universidad de Guayaquil">Universidad de Guayaquil</option>
                </select>
                @error('universidad')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Número de Teléfono -->
            <div class="mb-6">
                <x-input-label for="telefono" :value="__('Número de Teléfono')" class="block text-lg font-semibold text-white mb-2" />
                <input 
                    id="telefono" 
                    type="text" 
                    name="telefono" 
                    value="{{ old('telefono') }}" 
                    class="block mt-1 w-full bg-gray-800 text-white text-base placeholder-gray-500 rounded-lg p-4 border-2 border-gray-600 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none neon-box"
                    placeholder="0999999999" 
                    required 
                />
                @error('telefono')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
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
                    autocomplete="new-password"
                    placeholder="********" 
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="block text-lg font-semibold text-white mb-2" />
                <x-text-input 
                    id="password_confirmation" 
                    class="block mt-1 w-full bg-gray-800 text-white text-base placeholder-gray-500 rounded-lg p-4 border-2 border-gray-600 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none neon-box" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="********" 
                />
            </div>

            <!-- Botón de Registro -->
            <div class="mt-6">
                <button 
                    type="submit" 
                    class="w-full bg-pink-500 text-white text-lg font-bold py-3 rounded-lg shadow-lg hover:bg-pink-600 neon-btn transition"
                >
                    Crear Cuenta
                </button>
            </div>

            <!-- Link de Login -->
            <div class="flex items-center justify-center mt-6">
                <a 
                    class="underline text-sm text-gray-400 hover:text-white transition"
                    href="{{ route('login') }}"
                >
                    ¿Ya tienes una cuenta? Inicia sesión
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
