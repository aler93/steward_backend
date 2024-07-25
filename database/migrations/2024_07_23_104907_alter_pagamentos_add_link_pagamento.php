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
        Schema::table("pagamentos", function( Blueprint $table ) {
            $table->foreignId("id_link_pagamento")->nullable()->references("id")->on("link_pagamento");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("pagamentos", function( Blueprint $table ) {
            $table->dropColumn("id_link_pagamento");
        });
    }
};
