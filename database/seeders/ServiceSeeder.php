<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Hotel 1 Services
            [
                'name' => 'Room Service',
                'description' => '24/7 room service for all guests.',
                'price' => 50,
                'hotel_id' => 1,
            ],
            [
                'name' => 'Laundry Service',
                'description' => 'Same-day laundry service.',
                'price' => 30,
                'hotel_id' => 1,
            ],
            [
                'name' => 'Spa Access',
                'description' => 'Access to the hotel spa.',
                'price' => 100,
                'hotel_id' => 1,
            ],
            [
                'name' => 'Gym Access',
                'description' => 'Access to the hotel gym.',
                'price' => 40,
                'hotel_id' => 1,
            ],

            // Hotel 2 Services
            [
                'name' => 'Room Service',
                'description' => '24/7 room service for all guests.',
                'price' => 50,
                'hotel_id' => 2,
            ],
            [
                'name' => 'Laundry Service',
                'description' => 'Same-day laundry service.',
                'price' => 30,
                'hotel_id' => 2,
            ],
            [
                'name' => 'Spa Access',
                'description' => 'Access to the hotel spa.',
                'price' => 100,
                'hotel_id' => 2,
            ],
            [
                'name' => 'Gym Access',
                'description' => 'Access to the hotel gym.',
                'price' => 40,
                'hotel_id' => 2,
            ],

            // Hotel 3 Services
            [
                'name' => 'Swimming Pool Access',
                'description' => 'Access to the hotel swimming pool.',
                'price' => 60,
                'hotel_id' => 3,
            ],
            [
                'name' => 'Parking',
                'description' => 'Secure parking space.',
                'price' => 20,
                'hotel_id' => 3,
            ],
            [
                'name' => 'Spa Access',
                'description' => 'Access to the hotel spa.',
                'price' => 100,
                'hotel_id' => 3,
            ],
            [
                'name' => 'Gym Access',
                'description' => 'Access to the hotel gym.',
                'price' => 40,
                'hotel_id' => 3,
            ],

            // Hotel 4 Services
            [
                'name' => 'Room Service',
                'description' => '24/7 room service for all guests.',
                'price' => 50,
                'hotel_id' => 4,
            ],
            [
                'name' => 'Laundry Service',
                'description' => 'Same-day laundry service.',
                'price' => 30,
                'hotel_id' => 4,
            ],
            [
                'name' => 'Wi-Fi',
                'description' => 'High-speed internet access.',
                'price' => 10,
                'hotel_id' => 4,
            ],
            [
                'name' => 'Breakfast Buffet',
                'description' => 'Daily breakfast buffet.',
                'price' => 25,
                'hotel_id' => 4,
            ],

            // Hotel 5 Services
            [
                'name' => 'Airport Shuttle',
                'description' => 'Airport shuttle service.',
                'price' => 70,
                'hotel_id' => 5,
            ],
            [
                'name' => 'Conference Room',
                'description' => 'Access to conference rooms.',
                'price' => 200,
                'hotel_id' => 5,
            ],
            [
                'name' => 'Spa Access',
                'description' => 'Access to the hotel spa.',
                'price' => 100,
                'hotel_id' => 5,
            ],
            [
                'name' => 'Gym Access',
                'description' => 'Access to the hotel gym.',
                'price' => 40,
                'hotel_id' => 5,
            ],
        ];

        DB::table('services')->insert($services);
    }
}