@extends('admin.layout')
@section('title','Services')
@section('page-title','Services')
@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.services.create') }}" class="bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-blue-800 transition">+ Add Service</a>
</div>
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
            <tr>
                <th class="px-4 py-3 text-left">Icon</th>
                <th class="px-4 py-3 text-left">Title</th>
                <th class="px-4 py-3 text-left">Description</th>
                <th class="px-4 py-3 text-left">Active</th>
                <th class="px-4 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($services as $s)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 text-2xl">{{ $s->icon }}</td>
                <td class="px-4 py-3 font-medium">{{ $s->title }}</td>
                <td class="px-4 py-3 text-gray-500 max-w-xs truncate">{{ $s->description }}</td>
                <td class="px-4 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $s->active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $s->active ? 'Yes' : 'No' }}</span></td>
                <td class="px-4 py-3 flex gap-3">
                    <a href="{{ route('admin.services.edit', $s) }}" class="text-blue-600 text-xs font-semibold hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.services.destroy', $s) }}" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 text-xs font-semibold">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-4 py-8 text-center text-gray-400">No services yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
