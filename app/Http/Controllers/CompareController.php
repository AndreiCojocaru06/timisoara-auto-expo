<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $ids = $request->session()->get('compare_ids', []);
        $cars = Car::with('category', 'exhibitor')->whereIn('id', $ids)->get();

        return view('compare', compact('cars'));
    }

    public function add(Request $request, Car $car)
    {
        $ids = $request->session()->get('compare_ids', []);

        if (!in_array($car->id, $ids) && count($ids) < 3) {
            $ids[] = $car->id;
            $request->session()->put('compare_ids', $ids);
        }

        return back()->with('success', 'Masina a fost adaugata la comparare!');
    }

    public function remove(Request $request, Car $car)
    {
        $ids = $request->session()->get('compare_ids', []);
        $ids = array_diff($ids, [$car->id]);
        $request->session()->put('compare_ids', array_values($ids));

        return back()->with('success', 'Masina a fost eliminata din comparare!');
    }
}