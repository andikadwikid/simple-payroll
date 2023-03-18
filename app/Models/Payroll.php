<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'payrolls';

    public function employee(){
        // payroll memiliki relasi one to many dengan employee
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
