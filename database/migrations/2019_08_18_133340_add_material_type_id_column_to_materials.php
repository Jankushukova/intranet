<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaterialTypeIdColumnToMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materials', function (Blueprint $table) {

            $table->bigInteger('material_type_id')->unsigned();
            $table->foreign('material_type_id', 'fk_materials_material_types')
                ->references('id')
                ->on('material_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign('fk_materials_material_types');
            $table->dropColumn('material_type_id');
        });
    }
}
