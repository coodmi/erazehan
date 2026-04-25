<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FooterController extends Controller
{
    public function index()
    {
        $links    = FooterLink::orderBy('column')->orderBy('sort_order')->get()->groupBy('column');
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.footer.index', compact('links', 'settings'));
    }

    public function saveSettings(Request $request)
    {
        $request->validate([
            'footer_logo'      => 'nullable|image|max:2048',
            'footer_about'     => 'nullable|string',
            'footer_copyright' => 'nullable|string|max:200',
            'footer_privacy_url'=> 'nullable|string|max:200',
            'footer_terms_url' => 'nullable|string|max:200',
        ]);

        foreach (['footer_about','footer_copyright','footer_privacy_url','footer_terms_url'] as $key) {
            SiteSetting::updateOrCreate(['key'=>$key], ['value'=>$request->input($key,'')]);
        }

        if ($request->hasFile('footer_logo')) {
            $file     = $request->file('footer_logo');
            $filename = 'footer_logo_' . time() . '.' . $file->getClientOriginalExtension();
            $uploadDir = '/home/khanplac/erazehan.com/uploads';
            File::ensureDirectoryExists($uploadDir);
            $file->move($uploadDir, $filename);
            SiteSetting::updateOrCreate(['key'=>'footer_logo_url'], ['value'=>'/uploads/'.$filename]);
        }

        return back()->with('success', 'Footer settings saved.');
    }

    public function storeLink(Request $request)
    {
        $request->validate(['column'=>'required','label'=>'required|string|max:100','url'=>'required|string|max:200']);
        FooterLink::create($request->only('column','label','url','sort_order') + ['active'=>true]);
        return back()->with('success', 'Link added.');
    }

    public function updateLink(Request $request, FooterLink $footer)
    {
        $request->validate(['label'=>'required|string|max:100','url'=>'required|string|max:200']);
        $footer->update(['label'=>$request->label,'url'=>$request->url,'sort_order'=>$request->sort_order??0,'active'=>$request->boolean('active')]);
        return back()->with('success', 'Link updated.');
    }

    public function destroyLink(FooterLink $footer)
    {
        $footer->delete();
        return back()->with('success', 'Deleted.');
    }
}
