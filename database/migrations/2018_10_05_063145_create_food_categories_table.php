<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblfood_categories', function (Blueprint $table) {
            $table->increments('food_category_id');
            $table->string('food_category_name');
            $table->integer('food_category_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
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
        Schema::dropIfExists('tblfood_categories');
    }
}
