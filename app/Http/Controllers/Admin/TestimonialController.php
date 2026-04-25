<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index() { return view('admin.testimonials.index', ['testimonials' => Testimonial::latest()->get()]); }
    public function create() { return view('admin.testimonials.form', ['testimonial' => new Testimonial]); }

    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required','visa_type'=>'required','content'=>'required','flag'=>'required','active'=>'boolean']);
        $data['active'] = $request->boolean('active');
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial) { return view('admin.testimonials.form', ['testimonial' => $testimonial]); }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate(['name'=>'required','visa_type'=>'required','content'=>'required','flag'=>'required','active'=>'boolean']);
        $data['active'] = $request->boolean('active');
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial) { $testimonial->delete(); return back()->with('success', 'Testimonial deleted.'); }
}
