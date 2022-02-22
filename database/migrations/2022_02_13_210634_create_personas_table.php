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
            $table->integer('user_id')->index();
            $table->integer('lap')->index();
            $table->string('idusuario',250);//codigo unico de identificacion asignado por el sistema 
            $table->string('nombre',120);
            $table->string('apellido',120);
            $table->string('nac',1)->nullable(); //nacionalidad
            $table->string('cedula',12)->nullable();
            $table->string('pasaporte',120)->nullable();
            $table->date('fnacimiento')->nullable();//fecha de nacimiento
            $table->string('nrotelefono',14)->nullable();
            $table->string('email')->nullable();
            $table->string('direccion',250)->nullable();
            $table->string('destinovuela',250)->nullable();
            $table->date('fvuelo')->nullable();//fecha de vuelo
            $table->string('numerodevuelo')->nullable();
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
