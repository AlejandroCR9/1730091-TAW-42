<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientecomentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientecomentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idExpediente');
            $table->unsignedBigInteger('idMedico');
            $table->string('comentario', 200);
            $table->foreign('idExpediente')->references('id')->on('expedientes');
            $table->foreign('idMedico')->references('id')->on('users');
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
        Schema::dropIfExists('expedientecomentarios');
    }
}
