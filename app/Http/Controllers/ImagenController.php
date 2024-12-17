<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
 
        $imagen = $request->file('file');
 
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
 
        $imagenServidor = $manager->read($imagen);

        $imagenServidor->resize(1000, 1000);

        $imagenesRuta = public_path('img/images') . '/' . $nombreImagen;

        $imagenServidor->save($imagenesRuta);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
