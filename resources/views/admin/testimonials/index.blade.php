@extends('admin.layout')
@section('title','Testimonials')
@section('page-title','Testimonials')
@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.testimonials.create') }}" class="bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-blue-800 transition">+ Add Testimonial</a>
</div>
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
            <tr>
                <th class="px-4 py-3 text-left">Flag</th>
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Visa Type</th>
                <th class="px-4 py-3 text-left">Review</th>
                <th class="px-4 py-3 text-left">Active</th>
                <th class="px-4 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($testimonials as $t)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 text-2xl">{{ $t->flag }}</td>
                <td class="px-4 py-3 font-medium">{{ $t->name }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $t->visa_type }}</td>
                <td class="px-4 py-3 text-gray-500 max-w-xs truncate">{{ $t->content }}</td>
                <td class="px-4 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $t->active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $t->active ? 'Yes' : 'No' }}</span></td>
                <td class="px-4 py-3 flex gap-3">
                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-blue-600 text-xs font-semibold hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 text-xs font-semibold">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">No testimonials yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
