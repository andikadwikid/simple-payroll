<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-18',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 2,
            'date' => '2021-03-18',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 3,
            'date' => '2021-03-18',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 4,
            'date' => '2021-03-18',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-19',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 2,
            'date' => '2021-03-19',
            'checkin_time' => '10:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => true,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-20',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 2,
            'date' => '2021-03-20',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-21',
            'checkin_time' => '10:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => true,
        ]);

        Attendance::create([
            'employee_id' => 2,
            'date' => '2021-03-21',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-23',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-24',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-25',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-26',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-27',
            'checkin_time' => '08:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => false,
        ]);

        Attendance::create([
            'employee_id' => 1,
            'date' => '2021-03-28',
            'checkin_time' => '11:00:00',
            'checkout_time' => '17:00:00',
            'absent' => true,
            'late' => true,
        ]);


    }
}
