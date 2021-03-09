<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));

        return [
            'model' => $this->faker->vehicle,
            'year' => rand(1980, date('Y')),
            'brand_id' => Brand::factory(),
        ];
    }
}
