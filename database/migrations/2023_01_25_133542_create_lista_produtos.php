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
        Schema::create('lista_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lista_id")->references("id")->on("listas_user")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("produto_id")->nullable()->references("id")->on("produtos")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("produto_variacao_id")->nullable()->references("id")->on("produto_variacao")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("produto", 150);
            $table->text("observacoes")->nullable();
            $table->boolean("status")->default(false);
            $table->unsignedInteger("ordem")->nullable();
            $table->boolean("preciso")->default(true);
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
        Schema::dropIfExists('lista_produtos');
    }
};
