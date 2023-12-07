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
        Schema::table("sales", function (Blueprint $table) {
            $table->index(['id']);
        });
        Schema::table("menus", function (Blueprint $table) {
            $table->index(['id']);
        });
        Schema::table("sale_menu", function (Blueprint $table) {
            $table->index(['sale_id', "menu_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table("sales", function (Blueprint $table) {
            $table->integer('total_price')->change();
        });
    }
};
