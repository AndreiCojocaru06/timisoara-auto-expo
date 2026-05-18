@extends('admin.layouts.app')
@section('title', 'Adauga expozant')
@section('content')
<div class="max-w-2xl">
    <a href="/admin/exhibitors" class="text-gray-400 hover:text-white text-sm mb-6 inline-block">← Inapoi</a>
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-8">
        <h2 class="text-xl font-bold text-white mb-6">Adauga expozant nou</h2>
        <form method="POST" action="/admin/exhibitors" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm text-gray-400 mb-2">Nume *</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Telefon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Numar stand</label>
                    <input type="text" name="stand_number" value="{{ old('stand_number') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-2">Website</label>
                <input type="text" name="website" value="{{ old('website') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-2">Descriere</label>
                <textarea name="description" rows="4" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-400 text-black font-semibold py-3 rounded-lg transition">Adauga expozant</button>
        </form>
    </div>
</div>
@endsection
