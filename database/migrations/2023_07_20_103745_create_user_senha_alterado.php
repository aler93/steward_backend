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
        Schema::create('user_senha_alterado', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_senha_recuperacao")
                  ->references("id")
                  ->on("user_senha_recuperacao")
                  ->onDelete("restrict")
                  ->onUpdate("cascade");
            $table->timestamp("created_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_senha_alterado');
    }
};
