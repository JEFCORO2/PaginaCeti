@extends('layouts.app')

@section('titulo')
    Crea tu nueva publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css">
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data"  id="dropzone" class="dropzone border-dashed border-2 w-full h-96
                rounded flex flex-col justify-center items-center">
                @csrf

            </form>
        </div>

        <div class="md:w-1/2 bg-slate-400 p-9 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('publi.store')}}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-900 font-bold">
                        Titulo
                    </label>

                    <input type="text" id="titulo" name="titulo" placeholder="Titulo de tu publicacion" value="{{old('titulo')}}"
                    class="border p-3 w-full rounded-lg @error('titulo')
                        border-red-500
                    @enderror">

                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-900 font-bold">
                        Descripcion
                    </label>

                    <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de tu publicacion" value="{{old('descripcion')}}"
                    class="border p-3 w-full rounded-lg @error('descripcion')
                        border-red-500
                    @enderror">

                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input 
                        type="hidden"
                        name="imagen"
                        value="{{old('imagen')}}"
                    >

                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear publicacion"
                    class=" bg-green-400 hover:bg-green-800 
                    transition-colors cursor-pointer uppercase font-bold w-full p-3 
                    text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection