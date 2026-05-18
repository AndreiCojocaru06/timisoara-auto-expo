<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Exhibitor;
use App\Models\Contact;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'cars' => Car::count(),
            'exhibitors' => Exhibitor::count(),
            'categories' => Category::count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
        ];

        $recentCars = Car::with('category', 'exhibitor')->latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentCars', 'recentContacts'));
    }
}