<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'employee_id' => 1,
            'start_time'=> '09:00:00',
            'start_date' => '2023-03-18',
        ]);

        Schedule::create([
            'employee_id' => 2,
            'start_time'=> '09:00:00',
            'start_date' => '2023-03-18',
        ]);
    }
}
