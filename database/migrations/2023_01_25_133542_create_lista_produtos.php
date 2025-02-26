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
        Schema::create('user_list_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("list_id")->references("id")->on("user_lists")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("product_id")->nullable()->references("id")->on("products")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("product", 150);
            $table->text("observation")->nullable();
            $table->boolean("status")->default(false);
            $table->unsignedInteger("order")->nullable();
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
        Schema::dropIfExists('user_list_products');
    }
};
