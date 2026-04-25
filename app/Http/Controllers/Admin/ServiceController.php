<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() { return view('admin.services.index', ['services' => Service::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.services.form', ['service' => new Service]); }

    public function store(Request $request)
    {
        $data = $request->validate(['icon'=>'required','title'=>'required|string|max:200','description'=>'required|string','sort_order'=>'integer','active'=>'boolean']);
        $data['active'] = $request->boolean('active');
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service) { return view('admin.services.form', ['service' => $service]); }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate(['icon'=>'required','title'=>'required|string|max:200','description'=>'required|string','sort_order'=>'integer','active'=>'boolean']);
        $data['active'] = $request->boolean('active');
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service) { $service->delete(); return back()->with('success', 'Service deleted.'); }
}
