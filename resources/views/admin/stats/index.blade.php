@extends('admin.layout')
@section('title','Stats')
@section('page-title','Stats')
@section('content')
<div class="grid lg:grid-cols-2 gap-6">
    <!-- Edit existing -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4">Edit Stats</h3>
        <form method="POST" action="{{ route('admin.stats.update') }}" class="space-y-4">
            @csrf
            @foreach($stats as $s)
            <div class="flex gap-3 items-center">
                <input type="text" name="stats[{{ $s->id }}][value]" value="{{ $s->value }}" placeholder="Value"
                       class="w-24 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                <input type="text" name="stats[{{ $s->id }}][label]" value="{{ $s->label }}" placeholder="Label"
                       class="flex-1 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                <input type="number" name="stats[{{ $s->id }}][sort_order]" value="{{ $s->sort_order }}" placeholder="Order"
                       class="w-16 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                <form method="POST" action="{{ route('admin.stats.destroy', $s) }}" onsubmit="return confirm('Delete?')" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-500 hover:text-red-700 text-xs">✕</button>
                </form>
            </div>
            @endforeach
            <button type="submit" class="bg-blue-700 text-white font-bold px-5 py-2.5 rounded-xl hover:bg-blue-800 transition text-sm">Save Changes</button>
        </form>
    </div>

    <!-- Add new -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4">Add New Stat</h3>
        <form method="POST" action="{{ route('admin.stats.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Value (e.g. 10K+)</label>
                <input type="text" name="value" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Label</label>
                <input type="text" name="label" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <button type="submit" class="bg-green-600 text-white font-bold px-5 py-2.5 rounded-xl hover:bg-green-700 transition text-sm">Add Stat</button>
        </form>
    </div>
</div>
@endsection
