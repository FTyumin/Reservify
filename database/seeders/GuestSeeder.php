<?php

namespace Database\Seeders;
use App\Models\Guest;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guest::insert([
            [
                'user_id'=>2,
                'name' => 'John',
                'surname' => 'Smith',
                'email' => 'john.smith@gmail.com',
                'phone_number' => '123-456-7891',
                'credit_card_number' => '1234-5678-9101-1121',
            ],
            [
                'user_id'=>3,
                'name' => 'Janis',
                'surname' => 'Berzins',
                'email' => 'janis.berzins@gmail.com',
                'phone_number' => '482-032-1234',
                'credit_card_number' => '5618-8429-6121-2761',
            ],
            [
                'user_id'=>4,
                'name' => 'Anna',
                'surname' => 'Liepina',
                'email' => 'anna.liepina@inbox.lv',
                'phone_number' => '482-230-1234',
                'credit_card_number' => '4726-8124-7891-5713',
            ],
        ]);
    }
}
