<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white">

<nav class="flex justify-between items-center px-6 py-4 bg-gray-800 fixed top-0 left-0 right-0 z-50 shadow-md">
    <a href="{{ url('/') }}" class="text-2xl font-bold text-white hover:text-pink-500 transition">
        Gamer Fest 2025
    </a>
    <div class="flex items-center space-x-6">
        <!-- Enlaces de navegación -->
        <a href="#inicio" class="text-white hover:text-pink-500 transition">Inicio</a>
        <a href="#juegos" class="text-white hover:text-pink-500 transition">Juegos</a>
        <a href="#horarios" class="text-white hover:text-pink-500 transition">Horarios</a>
        <a href="#reglamentos" class="text-white hover:text-pink-500 transition">Reglamentos</a>
        <a href="#patrocinadores" class="text-white hover:text-pink-500 transition">Patrocinadores</a>
        <a href="#redes-sociales" class="text-white hover:text-pink-500 transition">Redes Sociales</a>

        <!-- Botón de Iniciar Sesión -->
        <a href="{{ route('login') }}" class="btn-login">
            Iniciar Sesión
        </a>
    </div>
</nav>


    <!-- Contenido principal -->
    <section id="inicio" class="flex flex-col md:flex-row items-center justify-center py-12 px-6">
        <!-- Lado izquierdo -->
        <div class="md:w-1/2 text-center md:text-left mb-6 md:mb-0">
            <h1 class="text-4xl font-extrabold mb-4">¡ESPE-L PRESENTAAA!</h1>
            <p class="text-lg mb-6">Vive la experiencia definitiva en GamerFest! Compite, descubre y disfruta con la comunidad gamer más épica.</p>
            <p class="text-md text-gray-400 mb-6">¡Regístrate ahora y asegura tu lugar en la acción!</p>
            <a href="{{ route('register') }}" class="neon-btn">
                Regístrate Ahora
            </a>
        </div>

        <!-- Lado derecho -->
        <div class="md:w-1/2 flex justify-center">
            <img src="{{ asset('img/transparente.png') }}" alt="Logo" class="w-64 h-64 md:w-96 md:h-96 object-contain">
        </div>
    </section>

<!-- Sección de juegos -->
<section id="juegos" class="py-12 bg-gray-800">
    <h2 class="text-3xl font-bold text-center mb-8">Nuestros Juegos</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-6">
        <!-- Card 1 -->
        <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
            <img src="{{ asset('img/juego1.png') }}" alt="Juego 1" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
            <h3 class="text-xl font-bold mb-2 text-center">Clash Royale</h3>
            <p class="text-gray-400 text-sm mb-4 text-center">Construye tu mazo y derrota a tus oponentes con tropas épicas.</p>
            <p class="text-pink-500 font-bold text-lg text-center">$9.99</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
            <img src="{{ asset('img/juego2.png') }}" alt="Juego 2" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
            <h3 class="text-xl font-bold mb-2 text-center">Free Fire</h3>
            <p class="text-gray-400 text-sm mb-4 text-center">Salta al campo de batalla y demuestra que eres el último en pie.</p>
            <p class="text-pink-500 font-bold text-lg text-center">$14.99</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
            <img src="{{ asset('img/juego3.png') }}" alt="Juego 3" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
            <h3 class="text-xl font-bold mb-2 text-center">Rocket League</h3>
            <p class="text-gray-400 text-sm mb-4 text-center">¡Acelera, salta y anota goles espectaculares!</p>
            <p class="text-pink-500 font-bold text-lg text-center">$19.99</p>
        </div>

            <!-- Card 4 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego4.png') }}" alt="Juego 4" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">League of Legends (LoL)</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Elige tu campeón y domina la Grieta del Invocador.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$12.99</p>
    </div>

    <!-- Card 5 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego5.png') }}" alt="Juego 5" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">Dota 2</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Domina a los héroes y lidera a tu equipo hacia la victoria.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$29.99</p>
    </div>

    <!-- Card 6 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego6.png') }}" alt="Juego 6" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">Fortnite</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Construye, lucha y gana en un battle royale lleno de creatividad y acción.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$15.99</p>
    </div>

    <!-- Card 7 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego7.png') }}" alt="Juego 7" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">Budokai Tenkaichi 3</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Revive las batallas más épicas del universo Dragon Ball.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$8.99</p>
    </div>

    <!-- Card 8 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego8.png') }}" alt="Juego 8" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">Valorant</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Combates tácticos con agentes únicos. Estrategia, precisión y acción explosiva.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$10.99</p>
    </div>

    <!-- Card 9 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego9.png') }}" alt="Juego 9" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">FC24</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Vive la pasión del fútbol con tus equipos favoritos y jugadas inolvidables.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$22.99</p>
    </div>

    <!-- Card 10 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego10.png') }}" alt="Juego 10" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">Mortal Kombat</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Realiza brutales combos y termina con fatalities legendarios. </p>
        <p class="text-pink-500 font-bold text-lg text-center">$18.99</p>
    </div>

    <!-- Card 11 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego11.png') }}" alt="Juego 11" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">The King of Fighters 2002</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">Forma tu equipo y desata combos devastadores.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$25.99</p>
    </div>

    <!-- Card 12 -->
    <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-96 mx-auto">
        <img src="{{ asset('img/juego12.png') }}" alt="Juego 12" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">Mario Kart 8</h3>
        <p class="text-gray-400 text-sm mb-4 text-center">¡Diversión a toda velocidad! Corre en pistas alocadas y lanza ítems para ganar.</p>
        <p class="text-pink-500 font-bold text-lg text-center">$20.99</p>
    </div>

            @foreach ($juegos as $juego)
                <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-72 h-[28rem] mx-auto flex flex-col justify-between">
                    <!-- Imagen -->
                    <img src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->nombre }}" class="w-56 h-56 mx-auto object-cover rounded-md mb-4">

                    <!-- Contenido -->
                    <div>
                        <!-- Título -->
                        <h3 class="text-xl font-bold mb-2 text-center text-white">{{ $juego->nombre }}</h3>

                        <!-- Categoría -->
                        <p class="text-gray-400 text-sm mb-4 text-center">{{ $juego->categoria }}</p>
                    </div>

                    <!-- Precio -->
                    <p class="text-pink-500 font-bold text-lg text-center">${{ number_format($juego->precio, 2) }}</p>
                </div>
            @endforeach


</section>

<!-- Sección de Horarios -->
<section id="horarios" class="py-12 bg-gray-900">
    <h2 class="text-3xl font-bold text-center mb-8 text-white">Horarios del Gamer Fest</h2>
    <p class="text-lg text-gray-400 text-center mb-8">
        Consulta los horarios de las actividades y no te pierdas ningún evento importante.
    </p>
    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-[70%] text-sm text-left text-gray-400 border border-gray-700">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">Horario</th>
                    <th scope="col" class="px-6 py-3 text-center">Actividad</th>
                    <th scope="col" class="px-6 py-3 text-center">Lugar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fila 1 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">10:00 AM</td>
                    <td class="px-6 py-4 text-center">Ceremonia de Apertura</td>
                    <td class="px-6 py-4 text-center">Auditorio Principal</td>
                </tr>
                <!-- Fila 2 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">11:00 AM</td>
                    <td class="px-6 py-4 text-center">Exhibición de Cosplay</td>
                    <td class="px-6 py-4 text-center">Escenario Principal</td>
                </tr>
                <!-- Fila 3 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">12:00 PM</td>
                    <td class="px-6 py-4 text-center">Torneo de League of Legends</td>
                    <td class="px-6 py-4 text-center">Zona Gamer</td>
                </tr>
                <!-- Fila 4 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">1:30 PM</td>
                    <td class="px-6 py-4 text-center">Panel de Creadores de Contenido</td>
                    <td class="px-6 py-4 text-center">Sala de Conferencias</td>
                </tr>
                <!-- Fila 5 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">3:00 PM</td>
                    <td class="px-6 py-4 text-center">Panel de Desarrolladores</td>
                    <td class="px-6 py-4 text-center">Sala de Conferencias</td>
                </tr>
                <!-- Fila 6 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">4:30 PM</td>
                    <td class="px-6 py-4 text-center">Competencia de Rocket League</td>
                    <td class="px-6 py-4 text-center">Zona Competitiva</td>
                </tr>
                <!-- Fila 7 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">6:00 PM</td>
                    <td class="px-6 py-4 text-center">Final de Fortnite</td>
                    <td class="px-6 py-4 text-center">Escenario Principal</td>
                </tr>
                <!-- Fila 8 -->
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4 text-center">7:30 PM</td>
                    <td class="px-6 py-4 text-center">Entrega de Premios</td>
                    <td class="px-6 py-4 text-center">Auditorio Principal</td>
                </tr>
                <!-- Fila 9 -->
                <tr>
                    <td class="px-6 py-4 text-center">8:00 PM</td>
                    <td class="px-6 py-4 text-center">Cierre del Evento</td>
                    <td class="px-6 py-4 text-center">Escenario Principal</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>


<!-- Sección de Reglamentos -->
<section id="reglamentos" class="py-12 bg-gray-800">
    <h2 class="text-3xl font-bold text-center mb-8 text-white">Reglamentos del Evento</h2>
    <p class="text-lg text-gray-400 text-center mb-8">
        Descarga el reglamento completo para conocer todas las reglas del evento.
    </p>
    <div class="text-center">
        <a href="{{ asset('pdf/REGLAMENTO GAMER FEST.pdf') }}" download
           class="neon-btn">
            Descargar Reglamento
        </a>
    </div>
</section>

<!-- Sección de patrocinadores -->
<section id="patrocinadores" class="py-12 bg-gray-900">
    <h2 class="text-3xl font-bold text-center mb-8">Nuestros Patrocinadores</h2>
    <p class="text-lg text-gray-400 text-center mb-8">
        Gracias a nuestros patrocinadores por hacer posible esta increíble experiencia.
    </p>
    <div class="flex flex-wrap justify-center gap-6">
        <!-- Card del primer patrocinador -->
        <div class="text-center">
            <img src="{{ asset('img/patro1.png') }}" alt="Patrocinador 1" class="w-24 h-24 rounded-full mb-4">
            <p class="text-gray-400">Intel</p>
        </div>

        <!-- Card del segundo patrocinador -->
        <div class="text-center">
            <img src="{{ asset('img/patro2.png') }}" alt="Patrocinador 2" class="w-24 h-24 rounded-full mb-4">
            <p class="text-gray-400">Asus</p>
        </div>

        <!-- Card del tercer patrocinador -->
        <div class="text-center">
            <img src="{{ asset('img/patro3.png') }}" alt="Patrocinador 3" class="w-24 h-24 rounded-full mb-4">
            <p class="text-gray-400">Microsoft</p>
        </div>
    </div>
</section>

<!-- Barra de redes sociales -->
<footer id="redes-sociales" class="py-12 bg-gray-800">
    <div class="text-center">
        <h3 class="text-2xl font-bold text-white mb-6">Encuéntranos en nuestras redes sociales</h3>
        <div class="flex justify-center gap-6">
            <!-- Facebook -->
            <a href="https://facebook.com" target="_blank" class="flex items-center gap-2 text-gray-400 hover:text-white transition">
                <img src="{{ asset('img/face.png') }}" alt="Facebook" class="w-8 h-8">
                <span class="text-lg font-medium">Facebook</span>
            </a>

            <!-- Instagram -->
            <a href="https://instagram.com" target="_blank" class="flex items-center gap-2 text-gray-400 hover:text-white transition">
                <img src="{{ asset('img/insta.png') }}" alt="Instagram" class="w-8 h-8">
                <span class="text-lg font-medium">Instagram</span>
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com" target="_blank" class="flex items-center gap-2 text-gray-400 hover:text-white transition">
                <img src="{{ asset('img/tw.png') }}" alt="Twitter" class="w-8 h-8">
                <span class="text-lg font-medium">Twitter</span>
            </a>
        </div>
    </div>
</footer>
</body>
</html>
