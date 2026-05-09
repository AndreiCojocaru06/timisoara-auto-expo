<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Category;
use App\Models\Exhibitor;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            [
                'brand' => 'BMW',
                'model' => 'X5',
                'year' => 2024,
                'price' => 75000,
                'fuel_type' => 'Benzina',
                'transmission' => 'Automata',
                'horsepower' => 340,
                'color' => 'Negru',
                'is_featured' => true,
                'category' => 'SUV',
                'exhibitor' => 'BMW Romania',
            ],
            [
                'brand' => 'Mercedes-Benz',
                'model' => 'C-Class',
                'year' => 2024,
                'price' => 55000,
                'fuel_type' => 'Diesel',
                'transmission' => 'Automata',
                'horsepower' => 265,
                'color' => 'Argintiu',
                'is_featured' => true,
                'category' => 'Sedan',
                'exhibitor' => 'Mercedes-Benz Timișoara',
            ],
            [
                'brand' => 'Tesla',
                'model' => 'Model 3',
                'year' => 2024,
                'price' => 45000,
                'fuel_type' => 'Electric',
                'transmission' => 'Automata',
                'horsepower' => 283,
                'color' => 'Alb',
                'is_featured' => true,
                'category' => 'Electric',
                'exhibitor' => 'Tesla Motors RO',
            ],
            [
                'brand' => 'Audi',
                'model' => 'A6',
                'year' => 2023,
                'price' => 62000,
                'fuel_type' => 'Benzina',
                'transmission' => 'Automata',
                'horsepower' => 299,
                'color' => 'Gri',
                'is_featured' => false,
                'category' => 'Sedan',
                'exhibitor' => 'Audi Timișoara',
            ],
        ];

        foreach ($cars as $carData) {
            $category = Category::where('name', $carData['category'])->first();
            $exhibitor = Exhibitor::where('name', $carData['exhibitor'])->first();

            Car::create([
                'brand' => $carData['brand'],
                'model' => $carData['model'],
                'year' => $carData['year'],
                'price' => $carData['price'],
                'fuel_type' => $carData['fuel_type'],
                'transmission' => $carData['transmission'],
                'horsepower' => $carData['horsepower'],
                'color' => $carData['color'],
                'is_featured' => $carData['is_featured'],
                'category_id' => $category->id,
                'exhibitor_id' => $exhibitor->id,
                'slug' => Str::slug($carData['brand'] . '-' . $carData['model'] . '-' . $carData['year']),
            ]);
        }
    }
}