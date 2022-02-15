<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('idusuario',50);//codigo unico de identificacion asignado por el sistema 
            $table->string('nombre',120);
            $table->string('apellido',120);
            $table->string('nac',1); //nacionalidad
            $table->string('cedula',12);
            $table->string('pasaporte')->nullable();
            $table->dateTime('fnacimiento')->nullable();//fecha de nacimiento
            $table->string('nrotelefono',14);
            $table->string('email')->unique();
            $table->string('direccion',250);
            $table->string('destinovuela',250);
            $table->dateTime('fvuelo')->nullable();//fecha de vuelo
            $table->string('numerodevuelo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
