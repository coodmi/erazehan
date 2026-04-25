<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
    private function uploadImage($base64, $prefix = 'slide'): string
    {
        // Decode base64 data URL
        $data     = preg_replace('/^data:image\/\w+;base64,/', '', $base64);
        $data     = base64_decode($data);
        $filename = $prefix . '_' . time() . '_' . uniqid() . '.jpg';
        $uploadDir = '/home/khanplac/erazehan.com/uploads';
        File::ensureDirectoryExists($uploadDir);
        file_put_contents($uploadDir . '/' . $filename, $data);
        return '/uploads/' . $filename;
    }

    public function index() { return view('admin.hero.index', ['slides' => HeroSlide::orderBy('sort_order')->get()]); }

    public function create() { return view('admin.hero.form', ['slide' => new HeroSlide]); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image_base64' => 'required|string',
            'title'        => 'nullable|string|max:200',
            'highlight'    => 'nullable|string|max:200',
            'subtitle'     => 'nullable|string',
            'btn1_text'    => 'nullable|string|max:100',
            'btn1_link'    => 'nullable|string|max:200',
            'btn2_text'    => 'nullable|string|max:100',
            'btn2_link'    => 'nullable|string|max:200',
            'sort_order'   => 'integer',
        ]);
        $data['image_url'] = $this->uploadImage($request->image_base64);
        $data['active']    = $request->boolean('active');
        unset($data['image_base64']);
        HeroSlide::create($data);
        return redirect()->route('admin.hero.index')->with('success', 'Slide created.');
    }

    public function edit(HeroSlide $hero) { return view('admin.hero.form', ['slide' => $hero]); }

    public function update(Request $request, HeroSlide $hero)
    {
        $data = $request->validate([
            'image_base64' => 'nullable|string',
            'title'        => 'nullable|string|max:200',
            'highlight'    => 'nullable|string|max:200',
            'subtitle'     => 'nullable|string',
            'btn1_text'    => 'nullable|string|max:100',
            'btn1_link'    => 'nullable|string|max:200',
            'btn2_text'    => 'nullable|string|max:100',
            'btn2_link'    => 'nullable|string|max:200',
            'sort_order'   => 'integer',
        ]);
        if (!empty($request->image_base64)) {
            $data['image_url'] = $this->uploadImage($request->image_base64);
        }
        $data['active'] = $request->boolean('active');
        unset($data['image_base64']);
        $hero->update($data);
        return redirect()->route('admin.hero.index')->with('success', 'Slide updated.');
    }

    public function destroy(HeroSlide $hero) { $hero->delete(); return back()->with('success', 'Slide deleted.'); }
}
