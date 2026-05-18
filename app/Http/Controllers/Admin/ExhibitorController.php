<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExhibitorController extends Controller
{
    public function index()
    {
        $exhibitors = Exhibitor::withCount('cars')->latest()->paginate(15);
        return view('admin.exhibitors.index', compact('exhibitors'));
    }

    public function create()
    {
        return view('admin.exhibitors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name . '-' . uniqid());

        Exhibitor::create($data);

        return redirect('/admin/exhibitors')->with('success', 'Expozantul a fost adăugat!');
    }

    public function edit(Exhibitor $exhibitor)
    {
        return view('admin.exhibitors.edit', compact('exhibitor'));
    }

    public function update(Request $request, Exhibitor $exhibitor)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $exhibitor->update($request->all());

        return redirect('/admin/exhibitors')->with('success', 'Expozantul a fost actualizat!');
    }

    public function destroy(Exhibitor $exhibitor)
    {
        $exhibitor->delete();
        return redirect('/admin/exhibitors')->with('success', 'Expozantul a fost șters!');
    }
}