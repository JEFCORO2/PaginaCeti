@extends('layouts.app')

@section('titulo')
    Inicia Sesion en Ceti
@endsection

@section('contenido')
    <div class=" md:flex md:justify-center md:gap-10 md:items-center">
        <div class=" md:w-6/12 p-5">
            <img width="300"  src="{{asset('img/logo.png')}}" alt="Login">
        </div>

        <div class=" md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('login')}}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-900 font-bold">
                        Email
                    </label>

                    <input type="text" id="email" name="email" placeholder="Tu email" value="{{old('email')}}"
                    class="border p-3 w-full rounded-lg @error('email')
                        border-red-500
                    @enderror">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-900 font-bold">
                        Contraseña
                    </label>

                    <input type="password" id="password" name="password" placeholder="Tu Contraseña"
                    class="border p-3 w-full rounded-lg @error('password')
                        border-red-500
                    @enderror">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember">
                    <label class=" text-gray-500 text-sm">Guardar Sesion</label>
                </div>

                <input type="submit" value="Iniciar Sesion"
                class=" bg-green-400 hover:bg-green-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection