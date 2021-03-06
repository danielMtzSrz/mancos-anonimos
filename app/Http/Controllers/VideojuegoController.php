<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Videojuego, TipoConsola};
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Events\ProjectSaved;

class VideojuegoController extends Controller{

    public function index(){
        $videojuegos = Videojuego::get();
        return view('videojuegos.index', compact('videojuegos'));
    }

    public function create(){
        $tipo_consola = TipoConsola::get();
        return view('videojuegos.create', compact('tipo_consola'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre_videojuego' => ['required', 'unique:videojuegos'],
            'clasificacion' => ['required'],
            'precio_adquisicion' => ['required'],
            'precio_venta' => ['required'],
        ]);

        $guardarVideojuego = new Videojuego([
            'tipo_consola_id' => $request->input('tipo_consola_id'),
            'nombre_videojuego' => $request->input('nombre_videojuego'),
            'clasificacion' => $request->input('clasificacion'),
            'precio_adquisicion' => $request->input('precio_adquisicion'),
            'precio_venta' => $request->input('precio_venta')
        ]);

        $guardarVideojuego->image = $request->file('imagen')->store('images', 'public');
        $guardarVideojuego->save();

        // Disparar un evento ProjectCreated
        ProjectSaved::dispatch($guardarVideojuego);

        return redirect()->route('videojuegos.index')->with('status', 'Registro almacenado con éxito');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $tipo_consola = TipoConsola::get();
        $videojuego = Videojuego::find($id);
        return view('videojuegos.update', compact('videojuego'), compact('tipo_consola'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre_videojuego' => ['required'],
            'clasificacion' => ['required'],
            'precio_adquisicion' => ['required'],
            'precio_venta' => ['required']
        ]);

        $videojuego = Videojuego::find($id);

        if($request->hasFile('imagen')){
            Storage::disk('public')->delete($videojuego->image);
            // Fill -> Va a rellenar todos los campos sin guardarlos en la BD
            $videojuego->fill(array_filter([
                'tipo_consola_id' => $request->input('tipo_consola_id'),
                'nombre_videojuego' => $request->input('nombre_videojuego'),
                'clasificacion' => $request->input('clasificacion'),
                'consola' => $request->input('consola'),
                'precio_adquisicion' => $request->input('precio_adquisicion'),
                'precio_venta' => $request->input('precio_venta')
            ]));
            $videojuego->image = $request->file('imagen')->store('images', 'public');
            $videojuego->save();

            ProjectSaved::dispatch($videojuego);
        }else{
            $videojuego->update(array_filter([
                'nombre_videojuego' => $request->input('nombre_videojuego'),
                'clasificacion' => $request->input('clasificacion'),
                'consola' => $request->input('consola'),
                'precio_adquisicion' => $request->input('precio_adquisicion'),
                'precio_venta' => $request->input('precio_venta')
            ]));
        }
        return redirect()->route('videojuegos.index')->with('status', 'Registro modificado con éxito');
    }

    public function destroy($id){
        $videojuego = Videojuego::find($id);
        Storage::disk('public')->delete($videojuego->image);
        $videojuego->delete();
        return back()->with('status', 'Eliminado con éxito');
    }
}
