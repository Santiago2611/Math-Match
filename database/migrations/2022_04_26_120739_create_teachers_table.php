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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_docente','40');
            $table->string('apellidos_docente','40');
            $table->string('email_docente','40');
            $table->string('clave_docente','40');
            $table->string('especialidades_docente','40');
            $table->string('telefono_docente','40');
            $table->string('sexo_docente','40');
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
        Schema::dropIfExists('teachers');
    }
};
