<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Employee::create([
            'name' => 'Janis',
            'surname' => 'Berzins',
            'email' => 'janis.berzins@inbox.lv',
            'phone_number' => '+371 12345678',
            'position'=>'uborschik jopta',
            'hotel_id' => 2,
        ]);

    }
}
