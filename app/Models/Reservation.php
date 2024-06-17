<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function guest()
    {
        return $this->belongsTo(Guest::class,'guest_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'reservation_service');
    }
    
}
