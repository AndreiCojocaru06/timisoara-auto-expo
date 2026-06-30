<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Category;
use App\Models\Exhibitor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarsTest extends TestCase
{
    use RefreshDatabase;

    public function test_cars_index_page_loads(): void
    {
        $response = $this->get('/masini');
        $response->assertStatus(200);
    }

    public function test_cars_index_shows_car_from_database(): void
    {
        $category = Category::create(['name' => 'SUV', 'slug' => 'suv']);
        $exhibitor = Exhibitor::create(['name' => 'Test Dealer', 'slug' => 'test-dealer', 'email' => 'test@test.com']);

        $car = Car::create([
            'brand' => 'TestBrand',
            'model' => 'TestModel',
            'year' => 2024,
            'category_id' => $category->id,
            'exhibitor_id' => $exhibitor->id,
            'slug' => 'testbrand-testmodel-2024',
        ]);

        $response = $this->get('/masini');
        $response->assertSee('TestBrand');
    }

    public function test_car_detail_page_loads(): void
    {
        $category = Category::create(['name' => 'SUV', 'slug' => 'suv']);
        $exhibitor = Exhibitor::create(['name' => 'Test Dealer', 'slug' => 'test-dealer', 'email' => 'test@test.com']);

        $car = Car::create([
            'brand' => 'TestBrand',
            'model' => 'TestModel',
            'year' => 2024,
            'category_id' => $category->id,
            'exhibitor_id' => $exhibitor->id,
            'slug' => 'testbrand-testmodel-2024',
        ]);

        $response = $this->get('/masini/testbrand-testmodel-2024');
        $response->assertStatus(200);
        $response->assertSee('TestModel');
    }

    public function test_nonexistent_car_returns_404(): void
    {
        $response = $this->get('/masini/nu-exista');
        $response->assertStatus(404);
    }
}