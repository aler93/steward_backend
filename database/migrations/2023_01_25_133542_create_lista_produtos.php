<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_lista")->references("id")->on("listas_user")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("id_produto")->nullable()->references("id")->on("produtos")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("produto", 150);
            $table->text("observacoes")->nullable();
            $table->boolean("status")
                  ->default(false)
                  ->comment("Status indica se o produto já foi obtido");
            $table->unsignedInteger("ordem")->nullable();
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
