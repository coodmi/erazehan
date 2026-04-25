<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:20',
            'service' => 'required|string',
            'message' => 'required|string|max:1000',
        ]);

        // TODO: send mail / store in DB
        Contact::create($request->only('name','email','phone','service','message'));
        return back()->with('success', 'Thank you! We will get back to you shortly.');
    }
}
