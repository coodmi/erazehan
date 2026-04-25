<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavItem;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

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
        $fields = ['logo_text','logo_url','nav_cta_text','nav_cta_link'];
        foreach ($fields as $key) {
            SiteSetting::updateOrCreate(['key'=>$key],['value'=>$request->input($key,'')]);
        }
        return back()->with('success','Header settings saved.');
    }
}
