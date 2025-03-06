<x-guest-layout>
    <!-- Hero Section with Animated Background -->
    <div class="relative min-h-screen overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#3674B5] to-[#00C4D4]">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100%25\' height=\'100%25\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cdefs%3E%3Cpattern id=\'grid\' width=\'50\' height=\'50\' patternUnits=\'userSpaceOnUse\'%3E%3Cpath d=\'M 50 0 L 0 0 0 50\' fill=\'none\' stroke=\'rgba(255,255,255,0.1)\' stroke-width=\'1\'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width=\'100%25\' height=\'100%25\' fill=\'url(%23grid)\'/%3E%3C/svg%3E');">
            </div>
        </div>

        <!-- Navigation with Glassmorphism -->
        <nav class="relative z-10 bg-white/10 backdrop-blur-md border-b border-white/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex-shrink-0">
                        <x-application-logo class="w-40 h-10" />
                    </div>
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="#features" class="text-white hover:text-[#A1E3F9] transition-colors duration-200">
                            Características
                        </a>
                        <a href="#testimonials" class="text-white hover:text-[#A1E3F9] transition-colors duration-200">
                            Testimonios
                        </a>
                        <a href="#pricing" class="text-white hover:text-[#A1E3F9] transition-colors duration-200">
                            Precios
                        </a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="bg-white/20 text-white px-4 py-2 rounded-lg hover:bg-white/30 transition-colors duration-200">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-[#A1E3F9] transition-colors duration-200">
                                Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="bg-white text-[#3674B5] px-4 py-2 rounded-lg hover:bg-[#A1E3F9] transition-colors duration-200">
                                Registrarse
                            </a>
                        @endauth
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button type="button" class="text-white hover:text-[#A1E3F9]">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Content with Animation -->
        <div class="relative z-10 pt-24 pb-20 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="text-center">
                    <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 tracking-tight animate-fade-in">
                        Revoluciona tus <span class="text-[#A1E3F9]">Encuestas</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-white/90 mb-12 max-w-3xl mx-auto animate-fade-in-up">
                        Crea encuestas profesionales en minutos, obtén respuestas en tiempo real y toma decisiones basadas en datos.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up">
                        @auth
                            <a href="{{ route('surveys.create') }}" class="bg-white text-[#3674B5] px-8 py-4 rounded-lg font-semibold hover:bg-[#A1E3F9] transform hover:scale-105 transition-all duration-200">
                                Crear Encuesta
                            </a>
                            <a href="{{ route('surveys.index') }}" class="bg-[#00C4D4] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#3674B5] transform hover:scale-105 transition-all duration-200">
                                Ver Encuestas
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-white text-[#3674B5] px-8 py-4 rounded-lg font-semibold hover:bg-[#A1E3F9] transform hover:scale-105 transition-all duration-200">
                                Comenzar Gratis
                            </a>
                            <a href="#features" class="bg-[#00C4D4] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#3674B5] transform hover:scale-105 transition-all duration-200">
                                Explorar Funciones
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-200">
                        <div class="text-4xl font-bold text-white mb-2">100%</div>
                        <div class="text-[#A1E3F9]">Personalizable</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-200">
                        <div class="text-4xl font-bold text-white mb-2">24/7</div>
                        <div class="text-[#A1E3F9]">Disponibilidad</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-200">
                        <div class="text-4xl font-bold text-white mb-2">0€</div>
                        <div class="text-[#A1E3F9]">Costo Inicial</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 w-full">
            <svg class="w-full h-24 fill-white" viewBox="0 0 1440 74" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,53.3C1248,53,1344,43,1392,37.3L1440,32L1440,74L1392,74C1344,74,1248,74,1152,74C1056,74,960,74,864,74C768,74,672,74,576,74C480,74,384,74,288,74C192,74,96,74,48,74L0,74Z"></path>
            </svg>
        </div>
    </div>

    <!-- Features Section with Cards -->
    <div id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Características Principales</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Todo lo que necesitas para crear encuestas profesionales y obtener resultados valiosos.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Cards con efectos de hover -->
                <div class="group bg-gradient-to-br from-[#3674B5]/5 via-white to-[#00C4D4]/5 rounded-2xl p-8 text-center transform hover:scale-105 transition-all duration-200 hover:shadow-xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#3674B5] to-[#00C4D4] rounded-xl mx-auto mb-6 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-200">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Personalización Total</h3>
                    <p class="text-gray-600">
                        Diseña encuestas únicas con diferentes tipos de preguntas, temas personalizados y lógica condicional.
                    </p>
                </div>

                <div class="group bg-gradient-to-br from-[#3674B5]/5 via-white to-[#00C4D4]/5 rounded-2xl p-8 text-center transform hover:scale-105 transition-all duration-200 hover:shadow-xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#3674B5] to-[#00C4D4] rounded-xl mx-auto mb-6 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-200">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Análisis en Tiempo Real</h3>
                    <p class="text-gray-600">
                        Visualiza resultados instantáneos con gráficos interactivos y análisis detallados de las respuestas.
                    </p>
                </div>

                <div class="group bg-gradient-to-br from-[#3674B5]/5 via-white to-[#00C4D4]/5 rounded-2xl p-8 text-center transform hover:scale-105 transition-all duration-200 hover:shadow-xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#3674B5] to-[#00C4D4] rounded-xl mx-auto mb-6 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-200">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Distribución Sencilla</h3>
                    <p class="text-gray-600">
                        Comparte tus encuestas fácilmente a través de enlaces directos, correo electrónico o redes sociales.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div id="testimonials" class="py-24 bg-gradient-to-br from-[#3674B5]/5 via-white to-[#00C4D4]/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Lo que dicen nuestros usuarios</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Descubre por qué miles de usuarios confían en nosotros para sus encuestas.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial Cards -->
                <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-[#3674B5] rounded-full flex items-center justify-center text-white font-bold text-xl">
                            M
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">María García</h4>
                            <p class="text-gray-600">Investigadora</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Una herramienta increíblemente intuitiva que me ha ayudado a recopilar datos de manera eficiente para mis investigaciones."</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-[#00C4D4] rounded-full flex items-center justify-center text-white font-bold text-xl">
                            J
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">Juan Pérez</h4>
                            <p class="text-gray-600">Profesor</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"La mejor plataforma para crear evaluaciones y encuestas para mis estudiantes. Los resultados en tiempo real son fantásticos."</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-[#A1E3F9] rounded-full flex items-center justify-center text-white font-bold text-xl">
                            A
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">Ana Martínez</h4>
                            <p class="text-gray-600">Empresaria</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Gracias a esta herramienta, hemos mejorado significativamente la satisfacción de nuestros clientes."</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div id="pricing" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Planes Simples y Transparentes</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Elige el plan que mejor se adapte a tus necesidades
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Free Plan -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center transform hover:scale-105 transition-all duration-200 hover:shadow-xl">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Gratis</h3>
                    <div class="text-4xl font-bold text-[#3674B5] mb-6">€0<span class="text-lg text-gray-600">/mes</span></div>
                    <ul class="space-y-4 mb-8">
                        <li class="text-gray-600">10 encuestas activas</li>
                        <li class="text-gray-600">100 respuestas/mes</li>
                        <li class="text-gray-600">Análisis básico</li>
                        <li class="text-gray-600">Soporte por email</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-[#3674B5] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#00C4D4] transition-colors duration-200">
                        Comenzar Gratis
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="bg-gradient-to-br from-[#3674B5] to-[#00C4D4] rounded-2xl p-8 text-center transform hover:scale-105 transition-all duration-200 hover:shadow-xl relative">
                    <div class="absolute top-0 right-0 bg-white text-[#3674B5] px-4 py-1 rounded-bl-lg rounded-tr-lg font-semibold">
                        Popular
                    </div>
                    <h3 class="text-2xl font-semibold text-white mb-4">Pro</h3>
                    <div class="text-4xl font-bold text-white mb-6">€19<span class="text-lg text-white/80">/mes</span></div>
                    <ul class="space-y-4 mb-8 text-white">
                        <li>Encuestas ilimitadas</li>
                        <li>1000 respuestas/mes</li>
                        <li>Análisis avanzado</li>
                        <li>Soporte prioritario</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-white text-[#3674B5] px-6 py-3 rounded-lg font-semibold hover:bg-[#A1E3F9] transition-colors duration-200">
                        Comenzar Prueba Gratuita
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center transform hover:scale-105 transition-all duration-200 hover:shadow-xl">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Empresas</h3>
                    <div class="text-4xl font-bold text-[#3674B5] mb-6">€49<span class="text-lg text-gray-600">/mes</span></div>
                    <ul class="space-y-4 mb-8">
                        <li class="text-gray-600">Todo lo de Pro</li>
                        <li class="text-gray-600">Respuestas ilimitadas</li>
                        <li class="text-gray-600">API access</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-[#3674B5] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#00C4D4] transition-colors duration-200">
                        Comenzar Prueba Gratuita
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative bg-gradient-to-br from-[#3674B5] to-[#00C4D4] py-24">
        <div class="absolute inset-0 overflow-hidden">
            <svg class="absolute right-0 top-0 transform translate-x-1/2 -translate-y-1/2 opacity-20" width="404" height="404" fill="none" viewBox="0 0 404 404">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-white" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
            </svg>
            <svg class="absolute bottom-0 left-0 transform -translate-x-1/2 translate-y-1/2 opacity-20" width="404" height="404" fill="none" viewBox="0 0 404 404">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa28" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-white" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa28)" />
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Comienza a Crear tus Encuestas Hoy
                </h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Únete a miles de usuarios que ya están obteniendo insights valiosos con nuestras encuestas.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}"
                       class="bg-white text-[#3674B5] px-8 py-4 rounded-lg font-semibold hover:bg-[#A1E3F9] transform hover:scale-105 transition-all duration-200">
                        Crear Cuenta Gratis
                    </a>
                    <a href="{{ route('login') }}"
                       class="bg-[#00C4D4] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#3674B5] transform hover:scale-105 transition-all duration-200">
                        Iniciar Sesión
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <x-application-logo class="w-32 h-8" />
                    <p class="text-gray-400 text-sm">
                        Transformando la manera en que recopilamos y analizamos datos a través de encuestas inteligentes.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Producto</h4>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Características</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors">Precios</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Guías</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Compañía</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Acerca de</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Empleos</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacidad</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Términos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Cookies</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Survey Tool. Todos los derechos reservados.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Estilos personalizados para animaciones -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }
    </style>
</x-guest-layout>
