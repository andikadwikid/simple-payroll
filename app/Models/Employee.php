<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'employees';

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function divisions()
    {

        return $this->belongsTo(Division::class, 'division_id');
    }

    public function schedules()
    {
        return $this->hasOne(Schedule::class, 'employee_id');
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employee_id');
    }
}
