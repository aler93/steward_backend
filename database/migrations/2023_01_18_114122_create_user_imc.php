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
        Schema::create('user_imc', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->float("massa_corporal");
            $table->float("altura");
            $table->text("observacoes");
            $table->timestamp("data_hora");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_health');
    }
};
