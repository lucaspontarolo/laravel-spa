<?php

namespace Tests\Feature\Api;

use App\Models\Car;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCaseFeature;

class CarControllerTest extends TestCaseFeature
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        Car::factory()->count(5)->create();
    }

    public function testShouldReturnAllCars()
    {
        $response = $this->get('/api/cars');
        $response->assertStatus(200);
    }

    public function testShouldReturnCarById()
    {
        $response = $this->get('/api/cars/1');
        $response->assertStatus(200);
    }

    public function testShouldStoreCar()
    {
        $response = $this->json('POST', '/api/cars', [
            'model' => 'Gol g4',
            'year' => 2013,
            'brand_id' => 1
        ]);

        $response->assertStatus(201);
    }

    public function testShouldntStoreCarWithInvalidData()
    {
        $response = $this->json('POST', '/api/cars', [
            'model' => null,
            'year' => 2013,
            'brand_id' => 1
        ]);

        $response->assertStatus(422);
    }

    public function testShouldUpdateCarById()
    {
        $response = $this->put('/api/cars/1', [
            'model' => 'Corsa',
            'year' => 2020,
            'brand_id' => 4
        ]);

        $response->assertStatus(200);
    }

    public function testShouldntUpdateCarByIdWihInvalidData()
    {
        $response = $this->json('PUT', '/api/cars/1', [
            'model' => null,
            'year' => 2020,
            'brand_id' => 4
        ]);

        $response->assertStatus(422);
    }

    public function testShouldDeleteCarById()
    {
        $response = $this->delete('/api/cars/1');
        $response->assertStatus(200);
    }
}
