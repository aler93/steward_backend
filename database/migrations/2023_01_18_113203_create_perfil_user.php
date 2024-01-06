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
        Schema::create('perfil_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("nome", 80);
            $table->string("cpf", 11)->nullable();
            $table->boolean("cpf_responsavel")->default(false);
            $table->string("telefone", 14)->nullable();
            $table->float("altura")->nullable();
            $table->text("avatar_url")->nullable();
            $table->boolean("avatar_local")->default(false);
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
        Schema::dropIfExists('perfil_user');
    }
};
