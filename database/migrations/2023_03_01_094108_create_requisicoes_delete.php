<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicoes_delete', function (Blueprint $table) {
            $table->id();
            $table->string("tabela", 100);
            $table->string("coluna", 100);
            $table->string("coluna_valor", 200);
            $table->timestamp("concluido")->nullable();
            $table->timestamp("aprovado")->nullable();
            $table->boolean("sucesso")->default(false);
            $table->timestamps();
            $table->foreignId("id_user")->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->text("observacao")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicoes_delete');
    }
};
