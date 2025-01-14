<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke(){
        return view('inicio');
    }

}
