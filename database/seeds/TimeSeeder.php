<?php

use Illuminate\Database\Seeder;
use App\Time;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = [
            '9:00', '9:30',
            '10:00', '10:30',
            '11:00', '11:30',
            '12:00', '12:30',
            '13:00', '13:30',
            '14:00', '14:30',
            '15:00', '15:30',
            '15:00', '15:30',
            '16:00', '16:30',
            '17:00', '74:30',
            '18:00', '18:30',
            '19:00', '19:30',
            '20:00', '20:30',
            '21:00', '21:30'
        ];
        foreach ($times as $key => $value) {
            $time = new Time();
            $time->value = $value;
            $time->save();
        }
    }
}
