<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = Brand::select('id')->get();

        Car::factory()
            ->count(30)
            ->create([
                'brand_id' => function () use ($brands) {
                    return $brands->random()->id;
                },
            ]);
    }
}
