<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblquestions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->text('question_content');
            $table->integer('question_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
            $table->integer('question_user_id')->unsigned();
            $table->foreign('question_user_id')->references('user_id')->on('tblusers')->onDelete('cascade');
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
        Schema::dropIfExists('tblquestions');
    }
}
