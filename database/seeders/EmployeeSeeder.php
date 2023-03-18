<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Employee 1',
            'email' => 'employee1@gmail.com',
            'date_of_birth' => '1990-01-01',
            'division_id' => 1,
            'phone' => '08123456789',
            'address' => 'Jl. Employee 1',
        ]);

        Employee::create([
            'name' => 'Employee 2',
            'email' => 'employee2@gmail.com',
            'date_of_birth' => '1990-01-01',
            'division_id' => 1,
            'phone' => '08123456789',
            'address' => 'Jl. Employee 2',
        ]);

        Employee::create([
            'name' => 'Employee 3',
            'email' => 'employee3@gmail.com',
            'date_of_birth' => '1990-01-01',
            'division_id' => 1,
            'phone' => '08123456789',
            'address' => 'Jl. Employee 3',
        ]);

        Employee::create([
            'name' => 'Employee 4',
            'email' => 'employee4@gmail.com',
            'date_of_birth' => '1990-01-01',
            'division_id' => 1,
            'phone' => '08123456789',
            'address' => 'Jl. Employee 4',
        ]);
    }
}
