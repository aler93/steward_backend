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
        Schema::create('produto_variacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId("produto_id")->nullable()->references("id")->on("produtos")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("nome", 150);
            $table->float("peso")->nullable();
            $table->string("peso_unidade", 15)->nullable();
            $table->string("sabor", 50)->nullable();
            $table->unsignedInteger("unidades")->nullable();
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
        Schema::dropIfExists('produto_variacao');
    }
};
