<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('course');
            $table->bigInteger('mobileno');
            $table->string('email')->unique();
            $table->year('passoutyear');
            $table->date('dateofissue');
            $table->string('refno');
            $table->Integer('rl');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('formdetails');
    }
}
