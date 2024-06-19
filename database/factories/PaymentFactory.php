<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

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
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'date' => $this->faker->dateTimeThisMonth(),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
        ];
    }
}