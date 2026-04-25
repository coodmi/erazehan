<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index() { return view('admin.hero.index', ['slides' => HeroSlide::orderBy('sort_order')->get()]); }

    public function create() { return view('admin.hero.form', ['slide' => new HeroSlide]); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image'      => 'required|image|max:4096',
            'title'      => 'required|string|max:200',
            'highlight'  => 'required|string|max:200',
            'subtitle'   => 'required|string',
            'btn1_text'  => 'required|string|max:100',
            'btn1_link'  => 'required|string|max:200',
            'btn2_text'  => 'required|string|max:100',
            'btn2_link'  => 'required|string|max:200',
            'sort_order' => 'integer',
            'active'     => 'boolean',
        ]);
        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('slides', 'public');
        }
        $data['active'] = $request->boolean('active');
        unset($data['image']);
        HeroSlide::create($data);
        return redirect()->route('admin.hero.index')->with('success', 'Slide created.');
    }

    public function edit(HeroSlide $hero) { return view('admin.hero.form', ['slide' => $hero]); }

    public function update(Request $request, HeroSlide $hero)
    {
        $data = $request->validate([
            'image'      => 'nullable|image|max:4096',
            'title'      => 'required|string|max:200',
            'highlight'  => 'required|string|max:200',
            'subtitle'   => 'required|string',
            'btn1_text'  => 'required|string|max:100',
            'btn1_link'  => 'required|string|max:200',
            'btn2_text'  => 'required|string|max:100',
            'btn2_link'  => 'required|string|max:200',
            'sort_order' => 'integer',
            'active'     => 'boolean',
        ]);
        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('slides', 'public');
        }
        $data['active'] = $request->boolean('active');
        unset($data['image']);
        $hero->update($data);
        return redirect()->route('admin.hero.index')->with('success', 'Slide updated.');
    }

    public function destroy(HeroSlide $hero) { $hero->delete(); return back()->with('success', 'Slide deleted.'); }
}
