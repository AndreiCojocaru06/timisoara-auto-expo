<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;

class SearchController extends Controller
{
    public function index()
    {
        $query = request('q');
        $categorySlug = request('categorie');

        $cars = Car::with('category', 'exhibitor')
            ->when($query, function($q) use ($query) {
                $q->where(function($sub) use ($query) {
                    $sub->where('brand', 'ilike', "%{$query}%")
                        ->orWhere('model', 'ilike', "%{$query}%")
                        ->orWhere('color', 'ilike', "%{$query}%")
                        ->orWhere('fuel_type', 'ilike', "%{$query}%");
                });
            })
            ->when($categorySlug, function($q) use ($categorySlug) {
                $q->whereHas('category', function($sub) use ($categorySlug) {
                    $sub->where('slug', $categorySlug);
                });
            })
            ->latest()
            ->paginate(12);

        $categories = Category::all();

        return view('search', compact('cars', 'categories', 'query', 'categorySlug'));
    }
}