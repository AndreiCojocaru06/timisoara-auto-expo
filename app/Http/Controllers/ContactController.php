<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|min:2',
            'email'   => 'required|email',
            'message' => 'required|min:10',
        ]);

        Contact::create($request->only('name', 'email', 'phone', 'subject', 'message'));

        return back()->with('success', 'Mesajul tău a fost trimis! Te vom contacta în curând.');
    }
}