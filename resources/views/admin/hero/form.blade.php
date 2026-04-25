@extends('admin.layout')
@section('title', $slide->exists ? 'Edit Slide' : 'Add Slide')
@section('page-title', $slide->exists ? 'Edit Slide' : 'Add Slide')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form method="POST" action="{{ $slide->exists ? route('admin.hero.update', $slide) : route('admin.hero.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if($slide->exists) @method('PUT') @endif

            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Slide Image</label>
                @if($slide->exists && $slide->image_url)
                <div class="mb-2">
                    <img src="{{ $slide->image_url }}" class="h-28 w-full object-cover rounded-xl border border-gray-200"/>
                    <p class="text-xs text-gray-400 mt-1">Current image — upload a new one to replace</p>
                </div>
                @endif
                <input type="file" name="image" accept="image/*" {{ $slide->exists ? '' : 'required' }}
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Title</label>
                    <input type="text" name="title" value="{{ old('title', $slide->title) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Highlight Text</label>
                    <input type="text" name="highlight" value="{{ old('highlight', $slide->highlight) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Subtitle</label>
                <textarea name="subtitle" rows="3"
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
