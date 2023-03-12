<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcustomers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_name');
            $table->string('customer_email',100)->unique();
            $table->string('customer_password');
            $table->string('customer_uid')->nullable();
            $table->string('customer_token')->nullable();
            $table->string('customer_token_app')->nullable();
            $table->integer('customer_gender')->default(1);
            $table->string('customer_photo_address')->nullable();
            $table->string('customer_job')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_date_of_birth')->nullable();
            $table->enum('customer_status',[0, 1])->default(1); // Trạng thái hoạt động, ẩn hay không hoạt động

            $table->float('customer_height')->nullable();
            $table->string('customer_target')->nullable();
            $table->string('customer_active')->nullable();
            $table->string('customer_present')->nullable();
            $table->float('customer_weight')->nullable();
            $table->integer('customer_disease_id')->unsigned()->nullable();
            $table->foreign('customer_disease_id')->references('disease_id')->on('tbldiseases')->onDelete('cascade');
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
        Schema::dropIfExists('tblcustomers');
    }
}
