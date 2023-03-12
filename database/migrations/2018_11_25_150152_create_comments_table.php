<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcomments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->text('comment_content');
            $table->integer('comment_customer_id')->unsigned();
            $table->foreign('comment_customer_id')->references('customer_id')->on('tblcustomers')->onDelete('cascade');
            $table->integer('comment_recipes_id')->unsigned();
            $table->foreign('comment_recipes_id')->references('recipes_id')->on('tblrecipes')->onDelete('cascade');
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
        Schema::dropIfExists('tblcomments');
    }
}
