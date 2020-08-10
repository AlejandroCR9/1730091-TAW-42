<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientescompartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientescompartidos', function (Blueprint $table) {
            $table->unsignedBigInteger('idExpediente');
            $table->unsignedBigInteger('idMedico');
            $table->foreign('idExpediente')->references('id')->on('expedientes')->onDelete('cascade');
            $table->foreign('idMedico')->references('id')->on('users')->onDelete('cascade');;
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
        Schema::dropIfExists('expedientescompartidos');
    }
}
