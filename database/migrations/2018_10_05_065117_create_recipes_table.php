<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblrecipes', function (Blueprint $table) {
            $table->increments('recipes_id');
            $table->string('recipes_image')->default("");
            $table->string('recipes_title');
            $table->text('recipes_short_title');
            $table->text('recipes_content');
            $table->integer('recipes_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
            $table->integer('recipes_food_id')->unsigned();
            $table->foreign('recipes_food_id')->references('food_id')->on('tblfoods')->onDelete('cascade');
            $table->integer('recipes_user_id')->unsigned();
            $table->foreign('recipes_user_id')->references('user_id')->on('tblusers')->onDelete('cascade');
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
        Schema::dropIfExists('tblrecipes');
    }
}
