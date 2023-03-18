<?php

namespace Database\Seeders;

use App\Models\Payroll;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count_absent = 8;
        $count_late = 2;
        $deduction_late = $count_late * 10000;
        $total_days = 10;
        $salary = 1000000;
        $total_salary = ($salary/$total_days)* $count_absent;
        $total_salary-= $count_late;

        Payroll::create([
            'employee_id' => 1,
            'date' => '2021-03-18',
            'salary' => $salary,
            'count_absent' => $count_absent,
            'count_late' => $count_late,
            'total_days' => $total_days,
            'total_salary' => $total_salary,
        ]);
    }
}
