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
        Schema::create('user_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")
                  ->references("id")
                  ->on("users")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->foreignId("id_menu")
                  ->references("id")
                  ->on("menu_items")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_menu');
    }
};
