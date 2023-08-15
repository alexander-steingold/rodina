<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'oid' => fake()->numberBetween(111111, 999999),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'city' => fake()->city,
            'address' => fake()->address,
            'email' => fake()->email,
            'phone' => fake()->numberBetween(1000000000, 1999999999),
            'mobile' => fake()->numberBetween(1000000000, 1999999999),
            'barcode' => fake()->numberBetween(111111111, 999999999),
            'weight' => fake()->numberBetween(1, 50),
            'prepayment' => 20,
            'boxes' => 1,
            // 'payment' => fake()->randomElement(['500', '1000', '1500', '2000', '2500']),
            'payment' => fake()->numberBetween(1_00, 1_000),
            'remarks' => fake()->paragraph(3),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')
            //'status' => fake()->randomElement(['active', 'inactive'])
        ];
    }
}
