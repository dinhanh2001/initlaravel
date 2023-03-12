<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmenus', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->integer('menu_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
            $table->integer('menu_user_id')->unsigned();
            $table->foreign('menu_user_id')->references('user_id')->on('tblusers')->onDelete('cascade');
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
        Schema::dropIfExists('tblmenus');
    }
}
