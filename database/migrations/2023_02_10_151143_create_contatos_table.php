<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('informacao', 200);
            $table->timestamps();
            // Instanciar chave estrangeira - Pessoa
            $table->foreignId('pessoa_id')->constrained('pessoas');
            // Instanciar chave estrangeira - Tipo de contato
            $table->foreignId('tipo_contato_id')->constrained('tipo_contatos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
