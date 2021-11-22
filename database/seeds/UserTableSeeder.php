<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->fill([
            'password' => '11223344',
            'first_name' => 'Admin',
            'last_name' => 'Adminov',
            'phone_number' => '8-777-777-77-77',
            'email' => 'admin@mail.kz',
            'role_id' => 1
        ]);
        $admin->password = bcrypt($admin->password);
        $admin->save();
    }
}
