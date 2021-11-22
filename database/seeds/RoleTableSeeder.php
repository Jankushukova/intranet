<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Админ';
        $admin->save();

        $teacher = new Role();
        $teacher->name = 'Учитель';
        $teacher->save();

        $student = new Role();
        $student->name = 'Студент';
        $student->save();
    }
}
