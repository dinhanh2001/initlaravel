<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShouldNotFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblshould_not_foods', function (Blueprint $table) {
            $table->increments('should_not_food_id');
            $table->integer('should_not_food_food_id')->unsigned();
            $table->foreign('should_not_food_food_id')->references('food_id')->on('tblfoods')->onDelete('cascade');
            $table->integer('should_not_food_disease_id')->unsigned();
            $table->foreign('should_not_food_disease_id')->references('disease_id')->on('tbldiseases')->onDelete('cascade');
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
        Schema::dropIfExists('tblshould_not_foods');
    }
}
