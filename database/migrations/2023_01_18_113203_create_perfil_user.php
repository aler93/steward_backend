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
            $table->foreignId("id_user")->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("nome", 80);
            $table->string("nome_social", 80)->nullable();
            $table->string("cpf", 11)->nullable();
            $table->boolean("cpf_responsavel")->default(false);
            $table->string("telefone", 11)->nullable();
            $table->float("altura")->nullable();
            $table->string("sexo", 1)->nullable()->default("N");
            $table->string("genero", 30)->nullable();
            $table->text("avatar_url")->nullable();
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
