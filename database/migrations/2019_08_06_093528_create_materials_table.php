<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title",255);
            $table->text("content");
            $table->integer("material_order");
            $table->softDeletes();
            $table->timestamps();

            $table->bigInteger('lesson_id')->unsigned();
            $table->foreign('lesson_id')
                ->references('id')
                ->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
