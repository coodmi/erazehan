@extends('admin.layout')
@section('title','Footer')
@section('page-title','Footer Management')
@section('content')

<div class="grid lg:grid-cols-2 gap-6 mb-6">

    <!-- Footer Settings -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <span class="w-1 h-5 bg-blue-600 rounded-full"></span> Footer Branding
        </h3>
        <form method="POST" action="{{ route('admin.footer.settings') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Footer Logo</label>
                @if(!empty($settings['footer_logo_url']))
                <div class="mb-2 flex items-center gap-3">
                    <img src="{{ $settings['footer_logo_url'] }}" class="h-10 rounded border border-gray-200 bg-gray-800 p-1" alt="Footer Logo"/>
                    <span class="text-xs text-gray-400">Current logo</span>
                </div>
                @endif
                <input type="file" name="footer_logo" accept="image/*"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">About Text</label>
                <textarea name="footer_about" rows="3"
                          class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $settings['footer_about'] ?? '' }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Copyright Text</label>
                <input type="text" name="footer_copyright" value="{{ $settings['footer_copyright'] ?? '' }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">Privacy Policy URL</label>
                    <input type="text" name="footer_privacy_url" value="{{ $settings['footer_privacy_url'] ?? '#' }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">Terms of Service URL</label>
                    <input type="text" name="footer_terms_url" value="{{ $settings['footer_terms_url'] ?? '#' }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
            </div>
            <button type="submit" class="bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-xl hover:bg-blue-800 transition text-sm">Save Settings</button>
        </form>
    </div>

    <!-- Add Link -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <span class="w-1 h-5 bg-green-500 rounded-full"></span> Add Footer Link
        </h3>
        <form method="POST" action="{{ route('admin.footer.links.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Column</label>
                <select name="column" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="services">Services</option>
                    <option value="company">Company</option>
                    <option value="social">Social Media</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Label</label>
                <input type="text" name="label" required placeholder="e.g. About Us"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">URL</label>
                <input type="text" name="url" required placeholder="e.g. #services or https://..."
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <button type="submit" class="bg-green-600 text-white font-semibold px-5 py-2.5 rounded-xl hover:bg-green-700 transition text-sm">Add Link</button>
        </form>
    </div>
</div>

<!-- Links by column -->
@foreach(['services'=>'Services Links','company'=>'Company Links','social'=>'Social Media Links'] as $col => $colLabel)
<div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-5">
    <div class="px-6 py-4 border-b font-semibold text-gray-700 flex items-center gap-2">
        <span class="w-1 h-5 bg-orange-500 rounded-full"></span> {{ $colLabel }}
    </div>
    <div class="divide-y divide-gray-100">
        @forelse($links[$col] ?? [] as $link)
        <form method="POST" action="{{ route('admin.footer.links.update', $link) }}"
              class="flex flex-wrap items-center gap-3 px-6 py-3">
            @csrf @method('PUT')
            <input type="text" name="label" value="{{ $link->label }}"
                   class="w-32 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <input type="text" name="url" value="{{ $link->url }}"
                   class="flex-1 min-w-32 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <input type="number" name="sort_order" value="{{ $link->sort_order }}"
                   class="w-16 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <label class="flex items-center gap-1.5 text-sm text-gray-600 cursor-pointer">
                <input type="checkbox" name="active" value="1" {{ $link->active ? 'checked' : '' }} class="rounded"/>
                Active
            </label>
            <button type="submit" class="bg-blue-600 text-white text-xs font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition">Save</button>
            <form method="POST" action="{{ route('admin.footer.links.destroy', $link) }}" onsubmit="return confirm('Delete?')" class="inline">
                @csrf @method('DELETE')
                <button class="text-red-500 hover:text-red-700 text-xs font-semibold px-3 py-2 rounded-lg border border-red-200 hover:bg-red-50 transition">Delete</button>
            </form>
        </form>
        @empty
        <p class="px-6 py-4 text-sm text-gray-400">No links yet.</p>
        @endforelse
    </div>
</div>
@endforeach

@endsection
