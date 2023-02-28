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
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId("id_user")
                  ->references("id")
                  ->on("users")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->string("marca", 30);
            $table->string("modelo", 60);
            $table->unsignedInteger("ano")->nullable();
            $table->foreignId("id_transmissao")
                  ->nullable()
                  ->references("id")
                  ->on("lookups")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->text("observacoes")->nullable();
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
        Schema::dropIfExists('carros');
    }
};
