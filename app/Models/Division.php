<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'divisions';

    public function employees()
    {
        //divisi memiliki banyak karyawan
        return $this->hasMany(Employee::class);
    }
}
