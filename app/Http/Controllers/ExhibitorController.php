<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;

class ExhibitorController extends Controller
{
    public function index()
    {
        $exhibitors = Exhibitor::withCount('cars')->latest()->get();

        return view('exhibitors.index', compact('exhibitors'));
    }

    public function show($slug)
    {
        $exhibitor = Exhibitor::with('cars.category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('exhibitors.show', compact('exhibitor'));
    }
}