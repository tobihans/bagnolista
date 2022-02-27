<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->word(),
            'specs' => '{"engine": "gas", "rotor": "rooot"}',
            'photos' => $this->faker->imageUrl(),
            'pricing' => $this->faker->randomNumber(3),
            'description' => '',
            'is_available' => $this->faker->boolean() == 0,
        ];
    }
}
