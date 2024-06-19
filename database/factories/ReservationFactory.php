<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $checkIn = $this->faker->dateTimeBetween('-1 month', '+2 month');
        $checkOut = $this->faker->dateTimeBetween($checkIn, '+5 days');

        return [
            'room_id' => function () {
                return \App\Models\Room::factory()->create()->id;
            },
            'guest_id' => function () {
                return \App\Models\Guest::factory()->create()->id;
            },
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'is_active' => true,
        ];
    }
}