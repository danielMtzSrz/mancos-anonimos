<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(){
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->string('image')->after('precio_venta')->nullable();
        });
    }

    public function down(){
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
