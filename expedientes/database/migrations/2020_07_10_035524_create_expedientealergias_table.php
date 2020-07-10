<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientealergiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientealergias', function (Blueprint $table) {
            $table->unsignedBigInteger('idExpediente');
            $table->unsignedBigInteger('idAlergia');
            $table->foreign('idExpediente')->references('id')->on('expedientes');
            $table->foreign('idAlergia')->references('id')->on('alergias');
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
        Schema::dropIfExists('expedientealergias');
    }
}
