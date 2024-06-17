<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Room::class);
    }
    
}
