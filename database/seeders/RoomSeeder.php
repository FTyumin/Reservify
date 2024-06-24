<?php

namespace Database\Seeders;
use App\Models\Room;
use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Rooms
        Room::insert([
            [
                'hotel_id' => 1,
                'type' => 'Single',
                'price' => 100,
                'capacity' => 1,
                'description' => 'A cozy single room with a comfortable bed and a stunning city view.',
                'is_available' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'hotel_id' => 2,
                'type' => 'Double',
                'price' => 150,
                'capacity' => 2,
                'description' => 'A spacious double room featuring modern amenities and a relaxing atmosphere.',
                'is_available' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'hotel_id' => 3,
                'type' => 'Triple',
                'price' => 200,
                'capacity' => 3,
                'description' => 'A charming triple room perfect for families, with ample space and elegant decor.',
                'is_available' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'hotel_id' => 4,
                'type' => 'Suite',
                'price' => 300,
                'capacity' => 4,
                'description' => 'A luxurious suite with a king-sized bed, private balcony, and breathtaking ocean views.',
                'is_available' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'hotel_id' => 5,
                'type' => 'Single',
                'price' => 120,
                'capacity' => 1,
                'description' => 'An exquisite room with premium furnishings, a large living area, and an opulent bathroom.',
                'is_available' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
