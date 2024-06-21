<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Hotels
        DB::table('hotels')->insert([
            [
                'name' => 'Grand Royale Hotel',
                'location' => 'Willowbrook',
                'email' => 'Grand_Royale_Hotel@example.com',
                'phone' => '123-456-7891',
                'rating' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Oceanview Retreat',
                'location' => 'Maplewood',
                'email' => 'Oceanview_Retreat@example.com',
                'phone' => '123-456-7892',
                'rating' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mountain Peak Lodge',
                'location' => 'Pinecrest',
                'email' => 'Mountain_Peak_Lodge@example.com',
                'phone' => '123-456-7893',
                'rating' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'City Center Inn',
                'location' => 'Riverbend',
                'email' => 'City_Center_Inn@example.com',
                'phone' => '123-456-7894',
                'rating' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Riverside Resort',
                'location' => 'Cedarville',
                'email' => 'Riverside_Resort@example.com',
                'phone' => '123-456-7895',
                'rating' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Seed Rooms
        DB::table('rooms')->insert([
            [
                'hotel_id' => 1,
                'type' => 'Single',
                'price' => 100,
                'capacity' => 1,
                'description' => 'A cozy single room with a comfortable bed and a stunning city view.',
                'image' => 'https://example.com/image11.jpg',
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
                'image' => 'https://example.com/image22.jpg',
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
                'image' => 'https://example.com/image33.jpg',
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
                'image' => 'https://example.com/image44.jpg',
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
                'image' => 'https://example.com/image55.jpg',
                'is_available' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Seed Employees
        DB::table('employees')->insert([
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

        // Seed Reservations
        DB::table('reservations')->insert([
            [
                'room_id' => 1,
                'guest_id' => 1,
                'check_in' => Carbon::now()->addDays(5),
                'check_out' => Carbon::now()->addDays(10),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_id' => 2,
                'guest_id' => 2,
                'check_in' => Carbon::now()->addDays(15),
                'check_out' => Carbon::now()->addDays(20),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_id' => 3,
                'guest_id' => 3,
                'check_in' => Carbon::now()->addDays(-10),
                'check_out' => Carbon::now()->addDays(-5),
                'is_active' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_id' => 4,
                'guest_id' => 4,
                'check_in' => Carbon::now()->addDays(25),
                'check_out' => Carbon::now()->addDays(30),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_id' => 5,
                'guest_id' => 5,
                'check_in' => Carbon::now()->addDays(35),
                'check_out' => Carbon::now()->addDays(40),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Seed Payments
        DB::table('payments')->insert([
            [
                'reservation_id' => 1,
                'amount' => 200.50,
                'date' => Carbon::now()->subDays(5),
                'payment_method' => 'credit_card',
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 2,
                'amount' => 300.75,
                'date' => Carbon::now()->subDays(10),
                'payment_method' => 'paypal',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 3,
                'amount' => 150.00,
                'date' => Carbon::now()->subDays(15),
                'payment_method' => 'bank_transfer',
                'status' => 'failed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 4,
                'amount' => 400.25,
                'date' => Carbon::now()->subDays(20),
                'payment_method' => 'credit_card',
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 5,
                'amount' => 500.00,
                'date' => Carbon::now()->subDays(25),
                'payment_method' => 'paypal',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Seed Services
        DB::table('services')->insert([
            [
                'name' => 'Laundry',
                'price' => 20.00,
                'description' => 'Laundry service description',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Room Service',
                'price' => 25.00,
                'description' => 'Room service description',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spa',
                'price' => 50.00,
                'description' => 'Spa service description',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gym',
                'price' => 30.00,
                'description' => 'Gym service description',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Breakfast',
                'price' => 15.00,
                'description' => 'Breakfast service description',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        DB::table('reviews')->insert([
            [
                'user_id' => 1,
                'hotel_id' => 1,
                'rating' => 5,
                'comment' => 'Amazing stay!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'hotel_id' => 2,
                'rating' => 4,
                'comment' => 'Very good service.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'hotel_id' => 3,
                'rating' => 3,
                'comment' => 'Average experience.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'hotel_id' => 4,
                'rating' => 5,
                'comment' => 'Excellent!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'hotel_id' => 5,
                'rating' => 4,
                'comment' => 'Very good, but a bit noisy.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Seed CleaningSchedules
        DB::table('cleaning_schedules')->insert([
            [
                'room_id' => 3,
                'cleaning_date' => Carbon::now()->subWeeks(3),
                'employee_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            
        ]);

        // Seed ReservationServices
        DB::table('reservation_services')->insert([
            [
                'reservation_id' => 1,
                'service_id' => 1,
                'quantity' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 2,
                'service_id' => 2,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 3,
                'service_id' => 3,
                'quantity' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 4,
                'service_id' => 4,
                'quantity' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reservation_id' => 5,
                'service_id' => 5,
                'quantity' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
