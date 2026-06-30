<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $cars = auth()->user()->favoriteCars()->with('category', 'exhibitor')->get();
        return view('favorites', compact('cars'));
    }

    public function toggle(Car $car)
    {
        $user = auth()->user();

        if ($user->favoriteCars()->where('car_id', $car->id)->exists()) {
            $user->favoriteCars()->detach($car->id);
            $message = 'Masina a fost eliminata din favorite!';
        } else {
            $user->favoriteCars()->attach($car->id);
            $message = 'Masina a fost adaugata la favorite!';
        }

        return back()->with('success', $message);
    }
}