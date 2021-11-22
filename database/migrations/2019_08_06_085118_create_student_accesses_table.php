<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->timestamps();

            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_accesses');
    }
}
