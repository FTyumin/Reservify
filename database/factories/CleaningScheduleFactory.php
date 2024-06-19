<?php

namespace Database\Factories;

use App\Models\CleaningSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class CleaningScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CleaningSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get a specific date to start cleaning
        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');

        // Calculate next cleaning dates weekly
        $cleaningDates = [];
        $currentDate = clone $startDate;
        while (count($cleaningDates) < 10) { // Generate 10 cleaning dates (adjust as needed)
            $cleaningDates[] = $currentDate;
            $currentDate = clone $currentDate;
            $currentDate->modify('+1 week');
        }

        return [
            'room_id' => function () {
                return \App\Models\Room::factory()->create()->id;
            },
            'cleaning_date' => function () use ($cleaningDates) {
                return array_shift($cleaningDates);
            },
            'employee_id' => function () {
                return \App\Models\Employee::factory()->create()->id;
            },
        ];
    }
}