@extends('admin.layout')
@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')
@section('page-title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" class="space-y-5">
            @csrf
            @if($testimonial->exists) @method('PUT') @endif
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Name</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Visa Type</label>
                    <input type="text" name="visa_type" value="{{ old('visa_type', $testimonial->visa_type) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Review</label>
                <textarea name="content" rows="4" required
                          class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $testimonial->content) }}</textarea>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Flag (emoji)</label>
                    <input type="text" name="flag" value="{{ old('flag', $testimonial->flag) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <input type="checkbox" name="active" id="active" value="1" {{ old('active', $testimonial->active ?? true) ? 'checked' : '' }} class="rounded"/>
                    <label for="active" class="text-sm text-gray-600 font-medium">Active</label>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white font-bold px-6 py-3 rounded-xl hover:bg-blue-800 transition text-sm">Save</button>
                <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 rounded-xl border text-sm font-medium hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
