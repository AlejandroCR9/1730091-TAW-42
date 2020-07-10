<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitamedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citamedicamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMedicamento');
            $table->unsignedBigInteger('idCita');
            $table->string('dosis',50);
            $table->string('frecuencia',50);
            $table->string('viaAdministracion',50);
            $table->string('duracion',50);
            $table->foreign('idMedicamento')->references('id')->on('medicamentos');
            $table->foreign('idCita')->references('id')->on('citas');
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
        Schema::dropIfExists('citamedicamentos');
    }
}
