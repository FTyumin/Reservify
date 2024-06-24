<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
    {
    use HasFactory;

    protected $fillable = ['name', 'price', 'description' , 'hotel_id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_service');
    }
}
