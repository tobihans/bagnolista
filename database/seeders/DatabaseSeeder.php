<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'is_admin' => true,
        ]);

        // There might be duplicates
        try {
            Brand::factory(10)->create();
            Category::factory(5)->create();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        try {
            Car::factory()
                ->count(50)
                ->create();
        }  catch (Exception $e) {
            var_dump($e->getMessage());
        }

        // Make reservations for some users
        User::factory()
            ->count(10)
            ->has(Payment::factory()->count(5))
            ->has(
                Reservation::factory()
                    ->count(5)
                    ->for(
                        Car::factory()
                            ->state(['is_available' => false])
                            ->for(Brand::factory())
                            ->for(Category::factory())
                    )
            )
            ->create();
    }
}
