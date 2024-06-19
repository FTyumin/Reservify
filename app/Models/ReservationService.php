<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    use HasFactory;

    protected $table = 'reservation_service';

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
