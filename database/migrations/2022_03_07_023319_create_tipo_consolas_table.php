<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(){
        Schema::create('tipo_consolas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_consola');
            $table->timestamps();
        });

        Schema::table('videojuegos', function(Blueprint $table){
            $table->foreignId('tipo_consola_id')->nullable()->after('id');

            $table->foreign('tipo_consola_id')->references('id')->on('tipo_consolas');
        });
    }

    public function down(){
        Schema::dropIfExists('tipo_consolas');
    }
};
