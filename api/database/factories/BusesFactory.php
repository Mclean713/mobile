<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buses>
 */
class BusesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          return [
            'name' => $this->faker->company,
            'departure_time' => $this->faker->time('H:i A'),
            'price' => $this->faker->numberBetween(3000, 10000),
            'route' => $this->faker->city . ' to ' . $this->faker->city,
            'available_seats' => $this->faker->numberBetween(10, 50),
        ];
    }
}
