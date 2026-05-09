<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('category', 'exhibitor')
            ->when(request('categorie'), function($query) {
                $query->whereHas('category', function($q) {
                    $q->where('slug', request('categorie'));
                });
            })
            ->latest()
            ->paginate(12);

        $categories = Category::all();

        return view('cars.index', compact('cars', 'categories'));
    }

    public function show($slug)
    {
        $car = Car::with('category', 'exhibitor', 'images')
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Car::with('category')
            ->where('category_id', $car->category_id)
            ->where('id', '!=', $car->id)
            ->take(3)
            ->get();

        return view('cars.show', compact('car', 'related'));
    }
}