<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso de Programación Web</title>
    <!-- Archivos para ejecutar tailwind localmente -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fin de archivos para ejecutar tailwind localmente  -->
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">-->
</head>
<body>
    <header class="shadow-md">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @yield('titulo_apartado')
                </h2>
            </x-slot>
        </x-app-layout>
    </header>
    <main class="py-10">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>
    <footer class="py-4 text-center">
        @auth
            <a class="text-sm text-gray-700 underline" href="{{ url('dashboard') }}">Dashboard</a>
        @else
            <a class="text-sm text-gray-700 underline" href="{{ url('login') }}">Login</a>
            <a class="text-sm text-gray-700 underline" href="{{ url('register') }}">Registro</a>
        @endauth
    </footer>
</body>
</html>