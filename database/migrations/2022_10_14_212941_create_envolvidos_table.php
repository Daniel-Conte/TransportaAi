<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvolvidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envolvidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("cnpj", 14);
            $table->string("razao_social", 100);
            $table->bigInteger('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('cidades');
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
        Schema::dropIfExists('envolvidos');
    }
}
