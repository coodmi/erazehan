@extends('admin.layout')
@section('title','Site Settings')
@section('page-title','Site Settings')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-5">
            @csrf
            @foreach([
                ['site_name',  'Site Name',    'text'],
                ['tagline',    'Tagline',       'text'],
                ['phone',      'Phone Number',  'text'],
                ['email',      'Email Address', 'email'],
                ['address',    'Office Address','text'],
            ] as [$key, $label, $type])
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">{{ $label }}</label>
                <input type="{{ $type }}" name="settings[{{ $key }}]" value="{{ old('settings.'.$key, $settings[$key] ?? '') }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            @endforeach
            <button type="submit" class="bg-blue-700 text-white font-bold px-6 py-3 rounded-xl hover:bg-blue-800 transition text-sm">Save Settings</button>
        </form>
    </div>
</div>
@endsection
