<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PaginaCeti - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.css')
</head>

<body class=" bg-gray-200">

    <header class=" p-5 border-b bg-gray-300 shadow">
        <div class=" container mx-auto flex justify-between items-center">
            <a href="{{route('inicio')}}" class="text-4xl font-black">
                Ceti
            </a>

            @auth
                <nav class="flex gap-2 items-center">
                    <a href=""
                        class="flex items-center gap-2 bg-white border p-2 text-gray-700 text-sm font-bold cursor-pointer uppercase">
                        Crear
                    </a>

                    <a href="{{route('perfil.index', auth()->user()->username)}}" class="font-bold text-gray-900 text-sm">
                        Hola :
                        <span class="font-normal">
                            {{auth()->user()->username}}
                        </span>
                    </a>
                    
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-black text-sm">
                            Cerrar Sesion
                        </button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center">
                    <a class=" font-bold uppercase text-gray-900 text-sm" href="{{route('login')}}">Login</a>
                    <a class=" font-bold uppercase text-gray-900 text-sm" href="{{route('register')}}">Crear Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>

    <main class=" mx-5 mt-10">
        <h2 class=" font-black text-center text-4xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class=" mt-10 text-center p-5 text-gray-900 font-bold uppercase">
        Ceti - Todos los derechos derervados
        {{now()->year}}
    </footer>
</body>

</html>