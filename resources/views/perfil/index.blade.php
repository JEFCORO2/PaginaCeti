@extends('layouts.app')

@section('titulo')
    Editar perfil : {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class=" md:w-1/2 bg-slate-300 shadow p-6">
            <form action="{{route('perfil.store')}}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Username
                    </label>

                    <input type="text" id="username" name="username" placeholder="Tu Username" value="{{auth()->user()->username}}"
                    class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                    @enderror">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class=" mb-5">
                    <label for="imagen" class=" mb-2 block uppercase text-slate-800 font-bold">
                        Imagen perfil
                    </label>

                    <input type="file" id="imagen" name="imagen" class=" border p-3 w-full rounded-lg" accept=".jpg, .jpeg, .png">
                </div>

                <input type="submit" value="Guardar Cambios"
                class="bg-green-400 hover:bg-green-700 transtion-colors cursor-pointer uppercase
                font-bold w-full p-3 text-slate-300 rounded-lg">
            </form>
        </div>
    </div>
@endsection