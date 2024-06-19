<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\CleaningSchedule;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\ReservationService;
use App\Models\Review;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    { 
    CleaningSchedule::factory()->count(20)->create();
    Payment::factory()->count(10)->create();
    Service::factory()->count(8)->create();
    Review::factory()->count(20)->create();
    Hotel::factory()->count(5)->create();
    Reservation::factory()->count(10)->create();
    ReservationService::factory()->count(10)->create();
    Room::factory()->count(10)->create();
    Employee::factory()->count(10)->create();
    }
};
