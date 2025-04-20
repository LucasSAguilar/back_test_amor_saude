<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;  // Adicione o Carbon aqui

class CreateClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criação da tabela clinicas
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

        // Criação da tabela users
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        // Inserção de dados de teste na tabela clinicas
        DB::table('clinicas')->insert([
            [
                'razao_social' => 'Clínica Exemplo 1',
                'nome_fantasia' => 'Exemplo 1',
                'cnpj' => '12.345.678/0001-90',
                'regional' => 'São Paulo',
                'data_inauguracao' => '2021-05-15',
                'ativa' => true,
                'especialidades' => json_encode(['Pediatria', 'Dermatologia']),
                'created_at' => Carbon::now(),  // Substituído para Carbon
                'updated_at' => Carbon::now(),  // Substituído para Carbon
            ],
            [
                'razao_social' => 'Clínica Exemplo 2',
                'nome_fantasia' => 'Exemplo 2',
                'cnpj' => '98.765.432/0001-21',
                'regional' => 'Rio de Janeiro',
                'data_inauguracao' => '2019-08-20',
                'ativa' => true,
                'especialidades' => json_encode(['Ortopedia', 'Cardiologia']),
                'created_at' => Carbon::now(),  // Substituído para Carbon
                'updated_at' => Carbon::now(),  // Substituído para Carbon
            ],
        ]);

        // Inserção de dados de teste na tabela users
        DB::table('users')->insert([
            [
                'email' => 'admin@example.com',
                'password' => bcrypt('senha123'),
                'created_at' => Carbon::now(),  // Substituído para Carbon
                'updated_at' => Carbon::now(),  // Substituído para Carbon
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinicas');
        Schema::dropIfExists('users');
    }
}
