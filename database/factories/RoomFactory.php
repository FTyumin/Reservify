<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotel_id' => function () {
                return \App\Models\Hotel::factory()->create()->id;
            },
            'type' => $this->faker->randomElement(['Single', 'Double', 'Tripple', 'Suite']),
            'price' => $this->faker->numberBetween(50, 500),
            'capacity' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'is_available' => $this->faker->boolean(),
        ];
    }
}