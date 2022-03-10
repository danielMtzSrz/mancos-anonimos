<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoConsola extends Model
{
    use HasFactory;

    public function videojuegos(){
		// El modelo de Tipo Consola tiene muchos videojuegos
        return $this->hasMany(Videojuego::class);
    }
}
