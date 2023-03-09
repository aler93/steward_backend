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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")
                  ->references("id")
                  ->on("users")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->foreignId("id_produto")
                  ->nullable()
                  ->references("id")
                  ->on("produtos")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->string("produto", 100)->nullable();
            $table->unsignedFloat("quantidade")->default(1);
            $table->string("medida_quantidade", 10);
            $table->date("validade")->nullable();
            $table->timestamps();
            $table->timestamp("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario');
    }
};
