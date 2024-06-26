<?php

namespace Database\Seeders;
use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Hotel::insert([
            [
                'name' => 'Grand Royale Hotel',
                'location' => 'Willowbrook',
                'email' => 'Grand_Royale_Hotel@example.com',
                'phone' => '123-456-7891',
                'description' => 'A beautiful hotel with a view of the ocean.',
                'rating' => 5,
                'image' => 'images/hotels/hotel1.jpg.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Oceanview Retreat',
                'location' => 'Maplewood',
                'email' => 'Oceanview_Retreat@example.com',
                'phone' => '123-456-7892',
                'description' => 'A beautiful hotel with a view of the ocean.',
                'rating' => 4,
                'image' => 'images/hotels/hotel2.jpg.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mountain Peak Lodge',
                'location' => 'Pinecrest',
                'email' => 'Mountain_Peak_Lodge@example.com',
                'phone' => '123-456-7893',
                'description' => 'A beautiful hotel with a view of the ocean.',
                'rating' => 3,
                'image' => 'images/hotels/hotel3.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'City Center Inn',
                'location' => 'Riverbend',
                'email' => 'City_Center_Inn@example.com',
                'phone' => '123-456-7894',
                'description' => 'A beautiful hotel with a view of the ocean.',
                'rating' => 5,
                'image' => 'images/hotels/hotel4.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Riverside Resort',
                'location' => 'Cedarville',
                'email' => 'Riverside_Resort@example.com',
                'phone' => '123-456-7895',
                'description' => 'A beautiful hotel with a view of the ocean.',
                'rating' => 4,
                'image' => 'images/hotels/hotel5.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
