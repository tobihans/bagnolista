<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Exception;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
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
        $this->faker->addProvider(new Fakecar($this->faker));
        $specs = json_encode([
            'Carburant' => $this->faker->vehicleFuelType(),
            'Boite de vitesse' => $this->faker->vehicleGearBoxType(),
            'Nombre de portes' => $this->faker->vehicleDoorCount(),
            'Nombre de sieges' => $this->faker->vehicleSeatCount(),
            'Autres' => implode(', ', $this->faker->vehicleProperties()),
        ], true);
        $images = <<<END
https://source.unsplash.com/random/1600x900?automobile&car&automotive&vehicle&sig=121
https://source.unsplash.com/random/1600x900?automobile&car&automotive&vehicle&sig=122
https://source.unsplash.com/random/1600x900?automobile&car&automotive&vehicle&sig=123
https://source.unsplash.com/random/1600x900?automobile&car&automotive&vehicle&sig=124
https://source.unsplash.com/random/1600x900?automobile&car&automotive&vehicle&sig=125
END;
        try {
            $brand = Brand::all()->pluck('id')->random();
            $category = Category::all()->pluck('id')->random();
        } catch (Exception $e) {
            $brand = 1;
            $category = 1;
        }
        $fake_desc = file_get_contents(__DIR__ . '/fake_desc.json');

        return [
            'brand_id' => $brand,
            'category_id' => $category,
            'model' => $this->faker->vehicleModel(),
            'specs' => $specs,
            'photos' => $images,
            'pricing' => $this->faker->randomNumber(3),
            'description' => $fake_desc,
            'is_available' => true,
        ];
    }
}
