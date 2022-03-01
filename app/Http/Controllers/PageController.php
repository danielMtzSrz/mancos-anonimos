<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego;

class PageController extends Controller
{
    public function home(){
        $videojuegos = Videojuego::all();
        return view('videojuegos.index', compact('videojuegos'));
    }
}
