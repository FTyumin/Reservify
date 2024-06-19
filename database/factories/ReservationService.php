<?php

namespace Database\Factories;

use App\Models\ReservationService;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservationService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reservation_id' => function () {
                return \App\Models\Reservation::factory()->create()->id;
            },
            'service_id' => function () {
                return \App\Models\Service::factory()->create()->id;
            },
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}