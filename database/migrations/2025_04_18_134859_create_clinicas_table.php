<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('clinicas', function (Blueprint $table) {
        $table->increments('id');
        $table->string('razao_social');
        $table->string('nome_fantasia');
        $table->string('cnpj');
        $table->string('regional');
        $table->date('data_inauguracao');
        $table->boolean('ativa')->default(true);
        $table->json('especialidades')->nullable();
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
        Schema::dropIfExists('clinicas');
    }
}
