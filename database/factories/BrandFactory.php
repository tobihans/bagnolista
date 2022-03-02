<?php

namespace Database\Factories;

use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        return [
            'name' => $this->faker->vehicleBrand(),
            'logo' => $this->faker->imageUrl(50, 50),
        ];
    }
}
