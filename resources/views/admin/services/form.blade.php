@extends('admin.layout')
@section('title', $service->exists ? 'Edit Service' : 'Add Service')
@section('page-title', $service->exists ? 'Edit Service' : 'Add Service')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form method="POST" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" class="space-y-5">
            @csrf
            @if($service->exists) @method('PUT') @endif
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Icon (emoji)</label>
                    <input type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Title</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Description</label>
                <textarea name="description" rows="4" required
                          class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $service->description) }}</textarea>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <input type="checkbox" name="active" id="active" value="1" {{ old('active', $service->active ?? true) ? 'checked' : '' }} class="rounded"/>
                    <label for="active" class="text-sm text-gray-600 font-medium">Active</label>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white font-bold px-6 py-3 rounded-xl hover:bg-blue-800 transition text-sm">Save</button>
                <a href="{{ route('admin.services.index') }}" class="px-6 py-3 rounded-xl border text-sm font-medium hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
