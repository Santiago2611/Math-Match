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
        Schema::enableForeignKeyConstraints();

        Schema::create('student_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_estudiante")->references("id")->on("users"); //por alguna razón, solo funciona con foreignId
            $table->string("juego");
            $table->integer("nivel_actual");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_game');
    }
};
