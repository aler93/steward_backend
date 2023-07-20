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
        Schema::create('envio_mensagens', function (Blueprint $table) {
            $table->id();
            $table->string("canal", 20);
            $table->string("destino", 150);
            $table->text("mensagem");
            $table->text("falha")->nullable();
            $table->timestamp("enviado")->nullable();
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
        Schema::dropIfExists('envio_mensagens');
    }
};
