<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'email', 'phone','image','description', 'rating'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
