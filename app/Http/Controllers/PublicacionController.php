<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function crear(){
        return view('publicaciones.crear');
    }

    public function store(Request $request){

        $request->validate([
            'titulo' => 'required|max:200',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('perfil.index', auth()->user()->username);
    }
}
