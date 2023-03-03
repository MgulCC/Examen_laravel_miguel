<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(1000),
            'quantity' => $this->faker->randomDigit,
            'status' => $this->faker->randomDigit,
            'seller_id' => rand(1, 20)

        ];
    }
}
