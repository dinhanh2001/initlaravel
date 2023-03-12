<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblfoods', function (Blueprint $table) {
            $table->increments('food_id');
            $table->string('food_name');
            $table->float('food_energy'); // Năng lượng
            $table->float('food_protein'); // Protein
            $table->float('food_lipid'); // Chất béo
            $table->float('food_glucid'); // Tinh bột
            $table->string('food_price')->nullable(); // Giá thành
            $table->integer('food_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
            $table->integer('food_food_category_id')->unsigned(); // Thể loại thực phẩm
            $table->foreign('food_food_category_id')->references('food_category_id')->on('tblfood_categories')->onDelete('cascade');
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
        Schema::dropIfExists('tblfoods');
    }
}
