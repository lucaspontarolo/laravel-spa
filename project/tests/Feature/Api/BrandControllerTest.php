<?php

namespace Tests\Feature\Api;

use App\Models\Brand;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCaseFeature;

class BrandControllerTest extends TestCaseFeature
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        Brand::factory()
            ->count(5)
            ->create();
    }

    public function testShouldReturnAllBrandsToSelect()
    {
        $response = $this->get('/api/brands/toSelect');
        $response->assertStatus(200);
    }
}
