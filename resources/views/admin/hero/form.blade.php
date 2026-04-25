@extends('admin.layout')
@section('title', $slide->exists ? 'Edit Slide' : 'Add Slide')
@section('page-title', $slide->exists ? 'Edit Slide' : 'Add Slide')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form method="POST" action="{{ $slide->exists ? route('admin.hero.update', $slide) : route('admin.hero.store') }}" class="space-y-5">
            @csrf
            @if($slide->exists) @method('PUT') @endif

            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Image URL</label>
                <input type="url" name="image_url" value="{{ old('image_url', $slide->image_url) }}" required
                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                @error('image_url')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Title</label>
                    <input type="text" name="title" value="{{ old('title', $slide->title) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Highlight Text</label>
                    <input type="text" name="highlight" value="{{ old('highlight', $slide->highlight) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Subtitle</label>
                <textarea name="subtitle" rows="3" required
                          class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('subtitle', $slide->subtitle) }}</textarea>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Button 1 Text</label>
                    <input type="text" name="btn1_text" value="{{ old('btn1_text', $slide->btn1_text) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Button 1 Link</label>
                    <input type="text" name="btn1_link" value="{{ old('btn1_link', $slide->btn1_link) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Button 2 Text</label>
                    <input type="text" name="btn2_text" value="{{ old('btn2_text', $slide->btn2_text) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Button 2 Link</label>
                    <input type="text" name="btn2_link" value="{{ old('btn2_link', $slide->btn2_link) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $slide->sort_order ?? 0) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <input type="checkbox" name="active" id="active" value="1" {{ old('active', $slide->active ?? true) ? 'checked' : '' }} class="rounded"/>
                    <label for="active" class="text-sm text-gray-600 font-medium">Active</label>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white font-bold px-6 py-3 rounded-xl hover:bg-blue-800 transition text-sm">Save Slide</button>
                <a href="{{ route('admin.hero.index') }}" class="px-6 py-3 rounded-xl border text-sm font-medium hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
