<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'schedules';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
