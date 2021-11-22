<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->bigInteger('teacher_id')->unsigned();
            $table->foreign('teacher_id', 'fk_group_teachers_users')
                ->references('id')
                ->on('users');

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id', 'fk_group_teachers_groups')
                ->references('id')
                ->on('groups');

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
        Schema::dropIfExists('group_teachers');
    }
}
