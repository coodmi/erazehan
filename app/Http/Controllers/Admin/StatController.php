<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index() { return view('admin.stats.index', ['stats' => Stat::orderBy('sort_order')->get()]); }

    public function update(Request $request)
    {
        foreach ($request->stats as $id => $data) {
            Stat::find($id)?->update(['value' => $data['value'], 'label' => $data['label'], 'sort_order' => $data['sort_order'] ?? 0]);
        }
        return back()->with('success', 'Stats updated.');
    }

    public function store(Request $request)
    {
        $request->validate(['value'=>'required','label'=>'required']);
        Stat::create($request->only('value','label','sort_order'));
        return back()->with('success', 'Stat added.');
    }

    public function destroy(Stat $stat) { $stat->delete(); return back()->with('success', 'Stat deleted.'); }
}
