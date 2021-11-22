<?php

use Illuminate\Database\Seeder;
use App\MaterialType;
class MaterialTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecture = new MaterialType();
        $lecture->name = 'Лекция';
        $lecture->save();

        $practice = new MaterialType();
        $practice->name = 'Практика';
        $practice->save();

        $theory = new MaterialType();
        $theory->name = 'Теория';
        $theory->save();
    }
}
