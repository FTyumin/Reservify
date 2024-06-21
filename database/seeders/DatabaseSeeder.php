<?php

namespace Database\Seeders;


use App\Models\Room;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use App\Models\CleaningSchedule;
use App\Models\ReservationService;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    { 
    // CleaningSchedule::factory()->count(20)->create();
    // Payment::factory()->count(10)->create();
    // Service::factory()->count(8)->create();
    // Review::factory()->count(20)->create();
    // Hotel::factory()->count(5)->create();
    // Reservation::factory()->count(10)->create();
    // ReservationService::factory()->count(10)->create();
    // Room::factory()->count(10)->create();
    // Employee::factory()->count(10)->create();


    $this->call([
        RoleSeeder::class,
        HotelSeeder::class,
        EmployeeSeeder::class,
        AdminSeeder::class,
    ]);
    



    // Hotel::create([
    //     'id'=> 2,
    //     'name' => 'Hotel California',
    //     'location' => '1234 California St, San Francisco, CA 94102',
    //     'email' => 'hotelcalifornia@gmail.com',
    //     'phone' => '+1-415-555-1234',
    //     'rating' => 4.5,

        
    // ]);

    // Employee::create([
    //     'name' => 'Malachi',
    //     'surname' => 'Thiel',
    //     'email' => 'michale33@example.net',
    //     'phone_number' => '+1-217-934-7666',
    //     'position' => 'Biologist',
    //     'hotel_id' => 2,
    // ]);
    }
};
