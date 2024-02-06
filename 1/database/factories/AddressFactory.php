<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'region' => fake()->city() . 'ская Область',
            'city' => fake()->city(),
            'street' => fake()->streetName(),
            'building' => fake()->numberBetween(1, 99),
            'mail_index' => fake()->numberBetween(100000, 999999),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
