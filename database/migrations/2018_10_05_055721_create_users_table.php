<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblusers', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_name');
            $table->string('user_email',100)->unique();
            $table->string('user_password');
            $table->integer('user_gender');
            $table->string('user_photo_address')->nullable();
            $table->string('user_job');
            $table->string('user_date_of_birth');
            $table->integer('user_status'); // Trạng thái hoạt động, ẩn hay không hoạt động
            $table->integer('user_permission_id')->unsigned();
            $table->foreign('user_permission_id')->references('permission_id')->on('tblpermissions')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('tblusers');
    }
}
