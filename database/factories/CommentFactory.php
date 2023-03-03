<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "content" => $this->faker->text(50),
            //"user_id" => User::factory(),
            "product_id" => Product::factory(),
            "created_at" => now()
        ];
    }
}
