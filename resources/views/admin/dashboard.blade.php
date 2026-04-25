<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Dashboard – GlobalVisa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<!-- Navbar -->
<header class="bg-blue-800 text-white px-6 py-4 flex items-center justify-between shadow">
    <div class="font-bold text-lg">GlobalVisa Admin</div>
    <div class="flex items-center gap-4 text-sm">
        <a href="{{ route('admin.change-password') }}" class="hover:underline">Change Password</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="bg-white text-blue-800 font-semibold px-4 py-1.5 rounded-full hover:bg-gray-100 transition">Logout</button>
        </form>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 py-8">

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 mb-6 text-sm">{{ session('success') }}</div>
    @endif

    <!-- Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-5 mb-8">
        @foreach([['Total Leads',$stats['total'],'blue'],['New',$stats['new'],'orange'],['Read',$stats['read'],'purple'],['Replied',$stats['replied'],'green']] as $s)
        <div class="bg-white rounded-2xl p-5 shadow-sm text-center">
            <div class="text-3xl font-extrabold text-{{ $s[2] }}-600">{{ $s[1] }}</div>
            <div class="text-xs text-gray-400 mt-1">{{ $s[0] }}</div>
        </div>
        @endforeach
    </div>

    <!-- Contacts Table -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b font-semibold text-gray-700">Contact Submissions</div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Service</th>
                        <th class="px-4 py-3 text-left">Message</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Date</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($contacts as $c)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">{{ $c->name }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $c->email }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $c->phone ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $c->service }}</td>
                        <td class="px-4 py-3 text-gray-500 max-w-xs truncate">{{ $c->message }}</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.contacts.status', $c) }}">
                                @csrf
                                <select name="status" onchange="this.form.submit()"
                                        class="text-xs border rounded-lg px-2 py-1 focus:outline-none
                                        {{ $c->status === 'new' ? 'bg-orange-50 text-orange-600 border-orange-200' :
                                           ($c->status === 'read' ? 'bg-purple-50 text-purple-600 border-purple-200' :
                                           'bg-green-50 text-green-600 border-green-200') }}">
                                    <option value="new"     {{ $c->status==='new'     ? 'selected':'' }}>New</option>
                                    <option value="read"    {{ $c->status==='read'    ? 'selected':'' }}>Read</option>
                                    <option value="replied" {{ $c->status==='replied' ? 'selected':'' }}>Replied</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3 text-gray-400 text-xs">{{ $c->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.contacts.delete', $c) }}"
                                  onsubmit="return confirm('Delete this entry?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:text-red-700 text-xs font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="px-4 py-8 text-center text-gray-400">No submissions yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4">{{ $contacts->links() }}</div>
    </div>
</main>
</body>
</html>
