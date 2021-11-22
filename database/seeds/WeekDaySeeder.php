<?php

use Illuminate\Database\Seeder;
use App\WeekDay;

class WeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weekdays = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
        foreach ($weekdays as $key => $value) {
            $weekDay = new WeekDay();
            $weekDay->value = $value;
            $weekDay->save();
        }
    }
}
