<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogueoController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }
}