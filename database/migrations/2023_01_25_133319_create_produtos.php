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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();
            $table->foreignId("categoria_id")->references("id")->on("categorias_produtos")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("nome", 100)->unique();
            $table->text("descricao")->nullable();
            $table->text("informacao_nutricional")->nullable();
            $table->text("image_link")->nullable();
            $table->boolean("image_local")->default(false);
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
        Schema::dropIfExists('produtos');
    }
};
