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
        Schema::create('link_pagamento_comunicacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_link_pagamento")->references("id")->on("link_pagamento")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("id_canal_comunicacao")->references("id")->on("canais_comunicacao")->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp("dt_envio")->nullable();
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
        Schema::dropIfExists('link_pagamento_comunicacao');
    }
};
