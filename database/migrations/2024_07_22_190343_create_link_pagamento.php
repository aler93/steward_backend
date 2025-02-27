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
        Schema::create('payment_link', function (Blueprint $table) {
            $table->id();
            $table->string("link", 250);
            $table->string("tag", 30)->nullable();
            $table->foreignId("user_id")->nullable()->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->double("value");
            $table->unsignedTinyInteger("status")->default(1);
            $table->timestamp("dt_valid");
            $table->timestamp("dt_payment")->nullable();
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
        Schema::dropIfExists('payment_link');
    }
};
