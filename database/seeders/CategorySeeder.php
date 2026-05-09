<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'SUV', 'icon' => '🚙'],
            ['name' => 'Sedan', 'icon' => '🚗'],
            ['name' => 'Electric', 'icon' => '⚡'],
            ['name' => 'Coupe', 'icon' => '🏎️'],
            ['name' => 'Kombi', 'icon' => '🚐'],
            ['name' => 'Cabriolet', 'icon' => '🌞'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'icon' => $cat['icon'],
            ]);
        }
    }
}