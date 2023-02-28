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
        Schema::create('abastecimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_carro")
                  ->references("id")
                  ->on("carros")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->unsignedDouble("km");
            $table->unsignedDouble("litros");
            $table->unsignedDouble("custo_gasolina")->nullable();
            $table->text("observacoes")->nullable();
            $table->dateTime("data");
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
        Schema::dropIfExists('abastecimentos');
    }
};
