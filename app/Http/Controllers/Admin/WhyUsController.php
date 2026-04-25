<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUsPoint;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index() { return view('admin.whyus.index', ['points' => WhyUsPoint::orderBy('sort_order')->get()]); }

    public function store(Request $request)
    {
        $request->validate(['title'=>'required|string|max:200']);
        WhyUsPoint::create($request->only('icon','title','description','sort_order'));
        return back()->with('success', 'Point added.');
    }

    public function update(Request $request, WhyUsPoint $whyus)
    {
        $request->validate(['title'=>'required|string|max:200']);
        $whyus->update($request->only('icon','title','description','sort_order'));
        return back()->with('success', 'Updated.');
    }

    public function destroy(WhyUsPoint $whyus) { $whyus->delete(); return back()->with('success', 'Deleted.'); }
}
