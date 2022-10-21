<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('remetente_id')->unsigned()->nullable();
            $table->foreign('remetente_id')->references('id')->on('envolvidos');
            $table->bigInteger('destinatario_id')->unsigned()->nullable();
            $table->foreign('destinatario_id')->references('id')->on('envolvidos');
            $table->bigInteger('transportadora_id')->unsigned()->nullable();
            $table->foreign('transportadora_id')->references('id')->on('envolvidos');
            $table->bigInteger('veiculo_id')->unsigned()->nullable();
            $table->foreign('veiculo_id')->references('id')->on('veiculos');
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
        Schema::dropIfExists('transportes');
    }
}
