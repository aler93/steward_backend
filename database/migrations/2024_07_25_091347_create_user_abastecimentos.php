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
        Schema::create('user_refueling', function (Blueprint $table) {
            $table->id();
            $table->foreignId("vehicle_id")->nullable()->references("id")->on("user_cars")->cascadeOnUpdate()->restrictOnDelete();
            $table->double("km");
            $table->double("liters");
            $table->double("value_paid")->nullable();
            $table->double("price_liter")->nullable();
            $table->text("observation")->nullable();
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
        Schema::dropIfExists('user_abastecimentos');
    }
};
