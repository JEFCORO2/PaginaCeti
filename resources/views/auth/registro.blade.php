@extends('layouts.app')

@section('titulo')
    Registrate en Ceti
@endsection

@section('contenido')
    <div class=" md:flex md:justify-center md:gap-10 md:item-center">
        <div class=" md:w-6/12 p-5">
            <img width="300"  src="{{asset('img/logo.png')}}" alt="Login">
        </div>

        <div class=" md:w-4/12 bg-white p-6 rounded-lg shadow-xl ">
            <form action="{{route('register')}}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">
                        Nombre
                    </label>

                    <input type="text" id="name" name="name" placeholder="Tu nombre" value="{{old('name')}}"
                    class="border p-3 w-full rounded-lg @error('name')
                        border-red-500
                    @enderror">

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Username
                    </label>

                    <input type="text" id="username" name="username" placeholder="Tu Username" value="{{old('username')}}"
                    class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                    @enderror">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">
                        Email
                    </label>

                    <input type="email" id="email" name="email" placeholder="Tu Correo" value="{{old('email')}}"
                    class="border p-3 w-full rounded-lg @error('email')
                        border-red-500
                    @enderror">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                        Contraseña
                    </label>

                    <input type="password" id="password" name="password" placeholder="Tu Contraseña" value="{{old('password')}}"
                    class="border p-3 w-full rounded-lg @error('password')
                        border-red-500
                    @enderror">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold">
                        Repetir Contraseña
                    </label>

                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite Tu Contraseña" value="{{old('password')}}"
                    class="border p-3 w-full rounded-lg ">
                </div>

                <input type="submit" value="Crear Cuenta"
                class="bg-green-400 hover:bg-green-700 transtion-colors cursor-pointer uppercase
                font-bold w-full p-3 text-slate-300 rounded-lg">
            </form>
        </div>
    </div>
@endsection