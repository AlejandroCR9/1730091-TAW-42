<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientepadecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientepadecimientos', function (Blueprint $table) {
            $table->unsignedBigInteger('idExpediente');
            $table->unsignedBigInteger('idPadecimiento');
            $table->foreign('idExpediente')->references('id')->on('expedientes');
            $table->foreign('idPadecimiento')->references('id')->on('padecimientos');
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
        Schema::dropIfExists('expedientepadecimientos');
    }
}
