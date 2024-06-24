<?php

namespace Database\Seeders;
use App\Models\Employee;
use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         // Seed Employees
        Employee::insert([
            [
                'name' => 'Emily',
                'surname' => 'Johnson',
                'email' => 'EmilyJ@example.com',
                'phone_number' => '123-456-7891',
                'position' => 'Manager',
                'hotel_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Michael',
                'surname' => 'Smith',
                'email' => 'MichaelS@example.com',
                'phone_number' => '123-456-7892',
                'position' => 'Receptionist',
                'hotel_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sarah',
                'surname' => 'Williams',
                'email' => 'SarahW@example.com',
                'phone_number' => '123-456-7893',
                'position' => 'Cleaner',
                'hotel_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'David',
                'surname' => 'Brown',
                'email' => 'DavidB@example.com',
                'phone_number' => '123-456-7894',
                'position' => 'Cook',
                'hotel_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jessica',
                'surname' => 'Davis',
                'email' => 'JessicaD@example.com',
                'phone_number' => '123-456-7895',
                'position' => 'Manager',
                'hotel_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
