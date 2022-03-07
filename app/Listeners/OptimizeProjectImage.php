<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeProjectImage implements ShouldQueue{

    public function __construct(){
        //
    }

    public function handle(ProjectSaved $event){
        $image = Image::make(Storage::get('public/'.$event->videojuego->image));
        $image->widen(600)->limitColors(255)->encode();
        Storage::put('public/'.$event->videojuego->image, (string) $image);
    }
}
