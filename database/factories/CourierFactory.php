<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courier>
 */
class CourierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cid' => fake()->numberBetween(111111, 999999),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'address' => fake()->address,
            'zip' => fake()->postcode,
            'email' => fake()->email,
            'phone' => fake()->numberBetween(1000000000, 1999999999),
            'mobile' => fake()->numberBetween(1000000000, 1999999999),
            'pid' => fake()->numberBetween(300000000, 310000000),
            'remarks' => fake()->paragraph(3),
            'car_number' => fake()->numberBetween(11111111, 99999999),
            'status' => fake()->randomElement(['active', 'inactive'])
        ];
    }
}
