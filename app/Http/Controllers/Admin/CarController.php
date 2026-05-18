<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\Exhibitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('category', 'exhibitor')->latest()->paginate(15);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        $categories = Category::all();
        $exhibitors = Exhibitor::all();
        return view('admin.cars.create', compact('categories', 'exhibitors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand'        => 'required',
            'model'        => 'required',
            'year'         => 'required|integer',
            'category_id'  => 'required|exists:categories,id',
            'exhibitor_id' => 'required|exists:exhibitors,id',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->brand . '-' . $request->model . '-' . $request->year . '-' . uniqid());
        $data['is_featured'] = $request->has('is_featured');

        Car::create($data);

        return redirect('/admin/cars')->with('success', 'Mașina a fost adăugată!');
    }

    public function edit(Car $car)
    {
        $categories = Category::all();
        $exhibitors = Exhibitor::all();
        return view('admin.cars.edit', compact('car', 'categories', 'exhibitors'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'brand'        => 'required',
            'model'        => 'required',
            'year'         => 'required|integer',
            'category_id'  => 'required|exists:categories,id',
            'exhibitor_id' => 'required|exists:exhibitors,id',
        ]);

        $data = $request->all();
        $data['is_featured'] = $request->has('is_featured');

        $car->update($data);

        return redirect('/admin/cars')->with('success', 'Mașina a fost actualizată!');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/admin/cars')->with('success', 'Mașina a fost ștearsă!');
    }
}