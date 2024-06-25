<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'room_id', 'user_id', 'check_in', 'check_out', 'is_active'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'reservation_services');
        
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
