@extends('admin.layout')
@section('title','Change Password')
@section('page-title','Change Password')
@section('content')
<div class="max-w-md">
    <div class="bg-white rounded-2xl shadow-sm p-6">
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
            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition text-sm">Update Password</button>
        </form>
    </div>
</div>
@endsection
