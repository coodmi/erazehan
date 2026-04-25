@extends('admin.layout')
@section('title','Why Us')
@section('page-title','Why Us Points')
@section('content')
<div class="grid lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4">Current Points</h3>
        @forelse($points as $p)
        <form method="POST" action="{{ route('admin.whyus.update', $p) }}" class="flex gap-3 items-center mb-3">
            @csrf @method('PUT')
            <input type="text" name="icon" value="{{ $p->icon }}" class="w-10 border border-gray-200 rounded-xl px-2 py-2 text-sm text-center focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <input type="text" name="title" value="{{ $p->title }}" required class="flex-1 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <button type="submit" class="bg-blue-700 text-white text-xs font-semibold px-3 py-2 rounded-xl hover:bg-blue-800 transition">Save</button>
            <form method="POST" action="{{ route('admin.whyus.destroy', $p) }}" onsubmit="return confirm('Delete?')" class="inline">
                @csrf @method('DELETE')
                <button class="text-red-500 hover:text-red-700 text-xs px-2 py-2">✕</button>
            </form>
        </form>
        @empty
        <p class="text-gray-400 text-sm">No points yet.</p>
        @endforelse
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4">Add New Point</h3>
        <form method="POST" action="{{ route('admin.whyus.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Icon (emoji)</label>
                <input type="text" name="icon" value="✓" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Title</label>
                <input type="text" name="title" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <button type="submit" class="bg-green-600 text-white font-bold px-5 py-2.5 rounded-xl hover:bg-green-700 transition text-sm">Add Point</button>
        </form>
    </div>
</div>
@endsection
