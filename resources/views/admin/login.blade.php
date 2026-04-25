<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Login – GlobalVisa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-900 to-blue-600 flex items-center justify-center px-4">

<div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
    <div class="text-center mb-8">
        <div class="text-3xl font-extrabold text-blue-700">GlobalVisa</div>
        <p class="text-gray-400 text-sm mt-1">Admin Panel</p>
    </div>

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl px-4 py-3 mb-5 text-sm">
        {{ $errors->first() }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
        @csrf
        <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Password</label>
            <input type="password" name="password" required
                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="remember" id="remember" class="rounded"/>
            <label for="remember" class="text-sm text-gray-500">Remember me</label>
        </div>
        <button type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition text-sm">
            Sign In
        </button>
    </form>
</div>

</body>
</html>
