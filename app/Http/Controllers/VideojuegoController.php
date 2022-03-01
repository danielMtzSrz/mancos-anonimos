<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego;

class VideojuegoController extends Controller{

    public function index(){
        $videojuegos = Videojuego::all();
        return view('videojuegos.index', compact('videojuegos'));
    }

    public function create(){
        return view('videojuegos.create');
    }

    public function store(Request $request){

        $request->validate([
            'nombre_videojuego' => ['required', 'unique:videojuegos'],
            'clasificacion' => ['required'],
            'consola' => ['required'],
            'precio_adquisicion' => ['required']
        ]);

        $guardarInformacionExtra = Videojuego::create([
            'nombre_videojuego' => $request->input('nombre_videojuego'),
            'clasificacion' => $request->input('clasificacion'),
            'consola' => $request->input('consola'),
            'precio_adquisicion' => $request->input('precio_adquisicion')
        ]);

        return redirect()->route('videojuegos.index')->with('status', 'Registro almacenado con éxito');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $videojuego = Videojuego::find($id);
        return view('videojuegos.update', compact('videojuego'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre_videojuego' => ['required', 'unique:videojuegos'],
            'clasificacion' => ['required'],
            'consola' => ['required'],
            'precio_adquisicion' => ['required']
        ]);

        $videojuego = Videojuego::find($id);
        $videojuego->update([
            'nombre_videojuego' => $request->input('nombre_videojuego'),
            'clasificacion' => $request->input('clasificacion'),
            'consola' => $request->input('consola'),
            'precio_adquisicion' => $request->input('precio_adquisicion')
        ]);
        return back()->with('status', 'Registro modificado con éxito');
    }

    public function destroy($id){
        $videojuego = Videojuego::find($id);
        $videojuego->delete();
        return back()->with('status', 'Eliminado con éxito');
    }
}
