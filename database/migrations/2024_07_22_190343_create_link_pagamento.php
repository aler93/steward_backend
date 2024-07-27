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
        Schema::create('link_pagamento', function (Blueprint $table) {
            $table->id();
            $table->string("link", 250);
            $table->foreignId("id_user")->nullable()->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->double("valor");
            $table->unsignedTinyInteger("status")->default(1);
            $table->timestamp("dt_validade");
            $table->timestamp("dt_pagamento")->nullable();
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
        Schema::dropIfExists('link_pagamento');
    }
};
