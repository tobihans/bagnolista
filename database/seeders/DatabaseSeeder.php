<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;

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

        User::factory()
            ->count(10)
            ->has(Payment::factory()->count(3))
            ->has(
                Reservation::factory()
                    ->count(5)
                    ->for(
                        Car::factory()
                            ->for(Brand::factory())
                            ->for(Category::factory())
                    )
            )
            ->create();
    }
}
