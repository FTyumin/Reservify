<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       
      User::insert([
        [
            'name' => 'JohnSmith',
            'email' => 'john.smith@gmail.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_GUEST,
        ],
        [
            'name' => 'Janis',
            'email' => 'janis.berzins@gmail.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_GUEST,
        ],
        [
            'name' => 'Anna_Liep',
            'email' => 'anna.liepina@inbox.lv',
            'password' => bcrypt('password'),
            'role' => User::ROLE_GUEST,
        ],
    ]);
    }
}
