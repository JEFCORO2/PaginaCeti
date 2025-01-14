<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function index(User $user){
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function editar(){
        return view('perfil.index');
    }

    public function store(Request $request){

        $usuario = User::find(auth()->user()->id);

        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20'],
        ]);

        $imagenAnterior = public_path('img/perfiles') . '/' . $usuario->imagen;

        if ($request->imagen) {
            if($usuario->imagen && File::exists($imagenAnterior)){
                unlink($imagenAnterior);
            }

            $manager = new ImageManager(new Driver());

            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = $manager->read($imagen);

            $imagenServidor->resize(1000,1000);

            $imagenesRuta = public_path('img/perfiles') . '/' . $nombreImagen;

            $imagenServidor->save($imagenesRuta);
        }

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->save();

        return redirect()->route('perfil.index', $usuario->username);
    }
}
