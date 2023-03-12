<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldiseases', function (Blueprint $table) {
            $table->increments('disease_id');
            $table->string('disease_name');
            $table->integer('disease_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
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
        Schema::dropIfExists('tbldiseases');
    }
}
