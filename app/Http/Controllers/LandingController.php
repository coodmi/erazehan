<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\FooterLink;
use App\Models\NavItem;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $settings    = SiteSetting::pluck('value', 'key');
        $navItems    = NavItem::where('active', true)->orderBy('sort_order')->get();
        $heroSlides  = \App\Models\HeroSlide::where('active', true)->orderBy('sort_order')->get();
        $footerLinks = FooterLink::where('active', true)->orderBy('sort_order')->get()->groupBy('column');
        return view('landing', compact('settings', 'navItems', 'heroSlides', 'footerLinks'));
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

        Contact::create($request->only('name','email','phone','service','message'));
        return back()->with('success', 'Thank you! We will get back to you shortly.');
    }
}
