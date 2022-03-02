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
        $v = $this->faker->vehicleArray();
        return [
            'name' => $v['brand'],
            'logo' => $this->faker->imageUrl(50, 50),
        ];
    }
}
