<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Hotel::create([
            'id'=> 1,
            'name' => 'Hotel California',
            'location' => '1234 California St, San Francisco, CA 94102',
            'email' => 'hotelcalifornia@gmail.com',
            'phone' => '+1-415-555-1234',
            'rating' => 4.5,
        ]);

        Hotel::create([
            'id'=> 2,
            'name' => 'Riga Wellton Riverside SPA Hotel',
            'location' => '11. Novembra krastmala 33, Riga, LV-1050',
            'email' => 'riga.wellton@hotel.com',
            'phone' => '+371 12345678',
            'rating' => 4.5,
        ]);

        Hotel::create([
            'id'=> 3,
            'name' => 'Riga Raddison Blu Hotel & Spa',
            'location' => 'Elizabetes iela, Riga, LV-1050',
            'email' => 'riga.raddison@hotel.com',
            'phone' => '+371 87654321',
            'rating' => 4.8,
        ]);

    }
}
