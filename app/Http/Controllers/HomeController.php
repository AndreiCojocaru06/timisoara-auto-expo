<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Exhibitor;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCars = Car::with('category', 'exhibitor')
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        $exhibitors = Exhibitor::latest()->take(4)->get();
        $categories = Category::all();

        return view('home', compact('featuredCars', 'exhibitors', 'categories'));
    }
}