<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoConsola;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_consola_id', 'nombre_videojuego', 'clasificacion', 'precio_adquisicion', 'precio_venta'
    ];

    public function tipoconsolas(){
        // Pertenece a un Tipo de Consola
        return $this->belongsTo(TipoConsola::class);
    }
}
