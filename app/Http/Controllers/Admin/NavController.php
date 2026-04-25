<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavItem;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NavController extends Controller
{
    public function index()
    {
        $items    = NavItem::orderBy('sort_order')->get();
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.nav.index', compact('items', 'settings'));
    }

    public function store(Request $request)
    {
        $request->validate(['label'=>'required|string|max:100','url'=>'required|string|max:200']);
        NavItem::create(['label'=>$request->label,'url'=>$request->url,'sort_order'=>$request->sort_order??0,'active'=>true]);
        return back()->with('success','Menu item added.');
    }

    public function update(Request $request, NavItem $nav)
    {
        $request->validate(['label'=>'required|string|max:100','url'=>'required|string|max:200']);
        $nav->update(['label'=>$request->label,'url'=>$request->url,'sort_order'=>$request->sort_order??0,'active'=>$request->boolean('active')]);
        return back()->with('success','Menu item updated.');
    }

    public function destroy(NavItem $nav)
    {
        $nav->delete();
        return back()->with('success','Deleted.');
    }

    public function saveHeader(Request $request)
    {
        $request->validate([
            'logo_text'    => 'nullable|string|max:100',
            'logo_image'   => 'nullable|image|max:2048',
            'nav_cta_text' => 'nullable|string|max:100',
            'nav_cta_link' => 'nullable|string|max:200',
        ]);

        SiteSetting::updateOrCreate(['key'=>'logo_text'],    ['value'=>$request->logo_text]);
        SiteSetting::updateOrCreate(['key'=>'nav_cta_text'], ['value'=>$request->nav_cta_text]);
        SiteSetting::updateOrCreate(['key'=>'nav_cta_link'], ['value'=>$request->nav_cta_link]);

        if ($request->hasFile('logo_image')) {
            $file      = $request->file('logo_image');
            $filename  = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            // Copy directly into the domain web root uploads folder
            $uploadDir = base_path('../../erazehan.com/uploads');
            File::ensureDirectoryExists($uploadDir);
            $file->move($uploadDir, $filename);
            SiteSetting::updateOrCreate(['key'=>'logo_url'], ['value'=>'/uploads/' . $filename]);
        }

        return back()->with('success','Header settings saved.');
    }
}
