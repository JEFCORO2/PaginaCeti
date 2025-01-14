@extends('layouts.app')

@section('titulo')
    Perfil : {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{$user->imagen ? asset('img/perfiles') . '/' . $user->imagen : asset('img/usuario.jpg')}}" alt="usuario">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-900 text-2xl">{{$user->username}}</p>

                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route('perfil.editar')}}" class="text-gray-600 hover:text-gray-800 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>   
                            </a>
                        @endif
                    @endauth
                </div>

                <p class=" text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class=" font-normal">Seguidores</span>
                </p>

                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class=" font-normal">Siguiendo</span>
                </p>

                <p class=" text-gray-900 text-sm mb-3 font-bold">
                    {{$posts->count()}}
                    <span class="font-normal">Publicaciones</span>
                </p>

                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->estaSiguiendo(auth()->user()))
                            <form action="{{route('usuario.seguir', $user)}}" method="POST">
                                @csrf
                                <input type="submit" 
                                    class=" bg-green-400 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Seguir"
                                >
                            </form>
                        @else
                            <form action="">
                                @csrf
                                <input type="submit" 
                                    class=" bg-red-400 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Dejar de Seguir"
                                >
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class=" text-4xl text-center font-black my-10">Mis Publicaciones</h2>
        <div>
            @if ($posts->count())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($posts as $post)
                        <div>
                            <a href="">
                                <img src="{{asset('img/images') . '/' . $post->imagen}}" alt="">
                            </a>
                        </div> 
                    @endforeach
                </div>
            @else
                <p class=" text-center">No tienes publicaciones</p>
            @endif
        </div>

        <div class="my-10">
            {{$posts->links('pagination::tailwind')}}
        </div>
    </section>
@endsection