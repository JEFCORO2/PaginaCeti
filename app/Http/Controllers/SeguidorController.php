<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SeguidorController extends Controller
{
    public function store(User $user, Request $request){
        $user->seguidores()->attach(auth()->user()->id);
        return back();
    }
}
