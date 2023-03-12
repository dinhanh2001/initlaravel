<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblanswers', function (Blueprint $table) {
            $table->increments('answer_id');
            $table->text('answer_content');
            $table->integer('answer_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
            $table->integer('answer_user_id')->unsigned();
            $table->foreign('answer_user_id')->references('user_id')->on('tblusers')->onDelete('cascade');
            $table->integer('answer_question_id')->unsigned();
            $table->foreign('answer_question_id')->references('question_id')->on('tblquestions')->onDelete('cascade');
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
        Schema::dropIfExists('tblanswers');
    }
}
