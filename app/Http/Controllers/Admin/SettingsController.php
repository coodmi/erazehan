<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Settings saved.');
    }
}
