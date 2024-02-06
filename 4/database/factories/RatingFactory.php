<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->randomFloat(1,1,5),
            'user_id' => User::pluck('id')->random(),
            'product_id' => Product::pluck('id')->random(),
            'review_id' => Review::pluck('id')->random(),

        ];
    }
}
