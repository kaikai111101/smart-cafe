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
        Schema::create('sale_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_id');
            $table->integer('menu_id');
            $table->integer('quantity');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('sales');
    }
};
