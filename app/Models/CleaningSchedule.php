<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'cleaning_date', 'employee_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}