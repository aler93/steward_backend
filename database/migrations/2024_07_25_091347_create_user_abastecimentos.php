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
        Schema::create('user_abastecimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_carro")->nullable()->references("id")->on("user_carros")->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedDouble("km");
            $table->unsignedDouble("litros");
            $table->unsignedDouble("total_pago")->nullable();
            $table->unsignedDouble("preco_litro")->nullable();
            $table->text("descricao")->nullable();
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
        Schema::dropIfExists('user_abastecimentos');
    }
};
