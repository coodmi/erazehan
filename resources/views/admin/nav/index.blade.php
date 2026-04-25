@extends('admin.layout')
@section('title','Header & Nav')
@section('page-title','Header & Navigation')
@section('content')

<div class="grid lg:grid-cols-2 gap-6 mb-6">

    <!-- Logo & CTA settings -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <span class="w-1 h-5 bg-blue-600 rounded-full inline-block"></span> Logo & CTA Button
        </h3>
        <form method="POST" action="{{ route('admin.nav.header') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Logo Text</label>
                <input type="text" name="logo_text" value="{{ $settings['logo_text'] ?? 'Erazehan International' }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Logo Image <span class="text-gray-400 font-normal">(upload to replace text)</span></label>
                @if(!empty($settings['logo_url']))
                <div class="mb-2 flex items-center gap-3">
                    <img src="{{ $settings['logo_url'] }}" class="h-10 rounded border border-gray-200" alt="Logo"/>
                    <span class="text-xs text-gray-400">Current logo</span>
                </div>
                @endif
                <input type="file" name="logo_image" accept="image/*"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">CTA Button Text</label>
                    <input type="text" name="nav_cta_text" value="{{ $settings['nav_cta_text'] ?? 'Free Consultation' }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">CTA Button Link</label>
                    <input type="text" name="nav_cta_link" value="{{ $settings['nav_cta_link'] ?? '#contact' }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <button type="submit" class="bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-xl hover:bg-blue-800 transition text-sm">Save Header</button>
        </form>
    </div>

    <!-- Add menu item -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <span class="w-1 h-5 bg-green-500 rounded-full inline-block"></span> Add Menu Item
        </h3>
        <form method="POST" action="{{ route('admin.nav.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Label</label>
                <input type="text" name="label" required placeholder="e.g. Services"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">URL / Anchor</label>
                <input type="text" name="url" required placeholder="e.g. #services or /about"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="0"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <button type="submit" class="bg-green-600 text-white font-semibold px-5 py-2.5 rounded-xl hover:bg-green-700 transition text-sm">Add Item</button>
        </form>
    </div>
</div>

<!-- Current menu items -->
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b font-semibold text-gray-700 flex items-center gap-2">
        <span class="w-1 h-5 bg-orange-500 rounded-full inline-block"></span> Current Menu Items
    </div>
    <div class="divide-y divide-gray-100">
        @forelse($items as $item)
        <form method="POST" action="{{ route('admin.nav.update', $item) }}"
              class="flex flex-wrap items-center gap-3 px-6 py-3">
            @csrf @method('PUT')
            <input type="text" name="label" value="{{ $item->label }}"
                   class="w-28 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <input type="text" name="url" value="{{ $item->url }}"
                   class="flex-1 min-w-32 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <input type="number" name="sort_order" value="{{ $item->sort_order }}"
                   class="w-16 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <label class="flex items-center gap-1.5 text-sm text-gray-600 cursor-pointer">
                <input type="checkbox" name="active" value="1" {{ $item->active ? 'checked' : '' }} class="rounded"/>
                Active
            </label>
            <button type="submit" class="bg-blue-600 text-white text-xs font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition">Save</button>
            <form method="POST" action="{{ route('admin.nav.destroy', $item) }}" onsubmit="return confirm('Delete?')" class="inline">
                @csrf @method('DELETE')
                <button class="text-red-500 hover:text-red-700 text-xs font-semibold px-3 py-2 rounded-lg border border-red-200 hover:bg-red-50 transition">Delete</button>
            </form>
        </form>
        @empty
        <p class="px-6 py-8 text-center text-gray-400 text-sm">No menu items yet.</p>
        @endforelse
    </div>
</div>
@endsection
