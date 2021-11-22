<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_times', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('schedule_id')->unsigned();
            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules');

            $table->bigInteger('week_day_id')->unsigned();
            $table->foreign('week_day_id')
                ->references('id')
                ->on('week_days');

            $table->bigInteger('start_time_id')->unsigned();
            $table->foreign('start_time_id')
                ->references('id')
                ->on('times');

            $table->bigInteger('end_time_id')->unsigned();
            $table->foreign('end_time_id')
                ->references('id')
                ->on('times');
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
        Schema::dropIfExists('lesson_times');
    }
}
