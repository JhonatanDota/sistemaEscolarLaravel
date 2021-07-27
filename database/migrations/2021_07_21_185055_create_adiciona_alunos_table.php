<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdicionaAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->char('sexo');
            $table->date('nascimento');
            $table->string('cidade',50)->nullable();
            $table->string('bairro',50)->nullable();
            $table->string('rua',100)->nullable();
            $table->integer('numero')->nullable();
            $table->string('complemento',100)->nullable();
            $table->unsignedBigInteger('id_turma')->nullable();
            $table->foreign('id_turma')->references('id')->on('turmas');
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
        Schema::dropIfExists('alunos');
    }
}
