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
        Schema::create('link_payment_communication', function (Blueprint $table) {
            $table->id();
            $table->foreignId("payment_link_id")->references("id")->on("payment_link")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("communication_channels_id")->references("id")->on("communication_channels")->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp("dt_sent")->nullable();
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
        Schema::dropIfExists('link_payment_communication');
    }
};
