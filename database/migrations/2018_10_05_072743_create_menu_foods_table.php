<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmenu_foods', function (Blueprint $table) {
            $table->increments('menu_food_id');
            $table->integer('menu_food_menu_id')->unsigned();
            $table->foreign('menu_food_menu_id')->references('menu_id')->on('tblmenus')->onDelete('cascade');
            $table->integer('menu_food_food_id')->unsigned();
            $table->foreign('menu_food_food_id')->references('food_id')->on('tblfoods')->onDelete('cascade');
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
        Schema::dropIfExists('tblmenu_foods');
    }
}
