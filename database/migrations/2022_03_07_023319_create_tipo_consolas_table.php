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
            $table->unsignedBigInteger('id_tipo_consola')->nullable()->after('id');

            $table->foreign('id_tipo_consola')->references('id')->on('tipo_consolas')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
        });
    }

    public function down(){
        Schema::table('videojuegos', function(Blueprint $table){
            $table->dropForeign('videojuegos_id_tipo_consola_foreign');
            $table->dropColumn('id_tipo_consola');
        });
        Schema::dropIfExists('tipo_consolas');
    }
};
