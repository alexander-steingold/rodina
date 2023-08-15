<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => fake()->sentence(5),
            'description' => fake()->paragraph(3),
            'type' => fake()->randomElement(Item::$type),
            'target' => fake()->randomElement(Item::$target),
            'year_built' => fake()->numberBetween(1980, 2023),
            'price' => fake()->numberBetween(100000, 1000000),
            'bedrooms' => fake()->numberBetween(1, 5),
            'bathrooms' => fake()->numberBetween(1, 4),
            'area' => fake()->numberBetween(30, 500),
            'city' => fake()->city,
            'address' => fake()->address,
            'contact_name' => fake()->name,
            'contact_email' => fake()->email,
            'contact_phone' => fake()->phoneNumber,
            'available_from' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'air_condition' => fake()->boolean(90),
            'balcony' => fake()->boolean(70),
            'free_parking' => fake()->boolean(60),
            'central_heating' => fake()->boolean(30),
            'window_covering' => fake()->boolean(30),
            'security' => fake()->boolean(20),
            'gym' => fake()->boolean(10),
            'alarm' => fake()->boolean(30),
            'garage' => fake()->boolean(10),
            'swimming_pool' => fake()->boolean(10),
            'laundry_room' => fake()->boolean(20),
            'wifi' => fake()->boolean(50),
            'status' => fake()->boolean(80), // 80% chance of being true (available), 20% chance of false (not available)

        ];
    }
}
