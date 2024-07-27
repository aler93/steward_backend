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
        Schema::create('user_carros', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")->nullable()->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("carro", 250);
            $table->text("descricao")->nullable();
            $table->boolean("principal")->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_carros');
    }
};
