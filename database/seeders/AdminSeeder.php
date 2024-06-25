<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=User::create([
            'name' => 'admin',
            'email' => 'feodorstjumins@gmail.com',
            'password' => bcrypt('password'),
            'role'=>User::ROLE_ADMIN,

        ]);
        $admin->assignRole(User::ROLE_ADMIN);
    }
}
