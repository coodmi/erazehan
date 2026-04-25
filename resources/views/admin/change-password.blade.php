<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Change Password – GlobalVisa Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<header class="bg-blue-800 text-white px-6 py-4 flex items-center justify-between shadow">
    <div class="font-bold text-lg">GlobalVisa Admin</div>
    <a href="{{ route('admin.dashboard') }}" class="text-sm hover:underline">← Back to Dashboard</a>
</header>

<main class="max-w-md mx-auto px-4 py-12">
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <h2 class="text-xl font-bold mb-6">Change Password</h2>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 mb-5 text-sm">{{ session('success') }}</div>
        @endif

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl px-4 py-3 mb-5 text-sm">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.change-password') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Current Password</label>
                <input type="password" name="current_password" required
                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">New Password</label>
                <input type="password" name="password" required
                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Confirm New Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition text-sm">
                Update Password
            </button>
        </form>
    </div>
</main>
</body>
</html>
