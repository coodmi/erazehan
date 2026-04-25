<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Admin') – GlobalVisa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { theme: { extend: { colors: { brand: '#1a56db' } } } }</script>
    <style>
        .nav-link { @apply flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-gray-300 hover:bg-white/10 hover:text-white transition; }
        .nav-link.active { @apply bg-white/15 text-white; }
        .nav-group { @apply text-xs font-semibold text-gray-500 uppercase tracking-widest px-4 mt-6 mb-2; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen font-sans flex">

<!-- ── Sidebar ── -->
<aside id="sidebar"
       class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-900 flex flex-col transition-transform duration-300 -translate-x-full lg:translate-x-0">

    <!-- Logo -->
    <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
        <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold text-sm">GV</div>
        <div>
            <div class="text-white font-bold text-sm">GlobalVisa</div>
            <div class="text-gray-400 text-xs">Admin Panel</div>
        </div>
    </div>

    <!-- Nav -->
    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">

        <div class="nav-group">Main</div>
        <a href="{{ route('admin.dashboard') }}"
           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>

        <div class="nav-group">Content</div>
        <a href="{{ route('admin.hero.index') }}"
           class="nav-link {{ request()->routeIs('admin.hero*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Hero Slides
        </a>
        <a href="{{ route('admin.services.index') }}"
           class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Services
        </a>
        <a href="{{ route('admin.stats.index') }}"
           class="nav-link {{ request()->routeIs('admin.stats*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            Stats
        </a>
        <a href="{{ route('admin.testimonials.index') }}"
           class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            Testimonials
        </a>
        <a href="{{ route('admin.whyus.index') }}"
           class="nav-link {{ request()->routeIs('admin.whyus*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
            Why Us
        </a>

        <div class="nav-group">CRM</div>
        <a href="{{ route('admin.contacts.index') }}"
           class="nav-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Contact Leads
            @php $newCount = \App\Models\Contact::where('status','new')->count(); @endphp
            @if($newCount > 0)
            <span class="ml-auto bg-orange-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $newCount }}</span>
            @endif
        </a>

        <div class="nav-group">Settings</div>
        <a href="{{ route('admin.settings.index') }}"
           class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Site Settings
        </a>
        <a href="{{ route('admin.change-password') }}"
           class="nav-link {{ request()->routeIs('admin.change-password') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
            Change Password
        </a>
    </nav>

    <!-- User -->
    <div class="px-4 py-4 border-t border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-white text-xs font-semibold truncate">{{ Auth::user()->name }}</div>
                <div class="text-gray-400 text-xs truncate">{{ Auth::user()->email }}</div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button title="Logout" class="text-gray-400 hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- ── Main ── -->
<div class="flex-1 flex flex-col lg:ml-64 min-h-screen">

    <!-- Top bar -->
    <header class="bg-white shadow-sm px-6 py-4 flex items-center gap-4 sticky top-0 z-30">
        <button id="sidebarToggle" class="lg:hidden text-gray-500 hover:text-gray-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <h1 class="text-gray-800 font-semibold text-base">@yield('page-title', 'Dashboard')</h1>
        <div class="ml-auto flex items-center gap-3">
            <a href="{{ url('/') }}" target="_blank"
               class="text-xs text-blue-600 hover:underline flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Site
            </a>
        </div>
    </header>

    <!-- Page content -->
    <main class="flex-1 p-6">
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 mb-6 text-sm">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl px-4 py-3 mb-6 text-sm">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</div>

<!-- Sidebar overlay (mobile) -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"></div>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle  = document.getElementById('sidebarToggle');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });
    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
</script>
</body>
</html>
