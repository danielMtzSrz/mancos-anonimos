<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_videojuego', 'clasificacion', 'consola', 'precio_adquisicion', 'precio_venta'
    ];
}
