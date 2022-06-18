<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Livros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('autor');                                  
            $table->integer('registro');
            $table->string('status');                        
            $table->string('genero');  
            $table->date('dataRetirada')->nullable();
            $table->date('dataDevolucao')->nullable();  
            $table->string('atrasado');  
            $table->integer('users_id')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
