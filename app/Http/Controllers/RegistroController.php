<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index(){
        return view('auth.registro');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users|max:30',
            'email' => 'required|unique:users|max:60',
            'password' => 'required|confirmed|min:6'
        ]);
    }
}
