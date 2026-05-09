@extends('layouts.app')

@section('title', 'Contact — Timișoara Auto Expo 2026')

@section('content')

    <section class="py-16 px-6">
        <div class="max-w-2xl mx-auto">

            <h1 class="text-4xl font-bold text-white mb-4">Contact</h1>
            <p class="text-gray-400 mb-12">Ai întrebări? Trimite-ne un mesaj și te vom contacta în curând.</p>

            {{-- Mesaj succes --}}
            @if(session('success'))
                <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl p-4 mb-8">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/contact" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm text-gray-400 mb-2">Nume *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-2">Telefon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                           class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-2">Subiect</label>
                    <input type="text" name="subject" value="{{ old('subject') }}"
                           class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-2">Mesaj *</label>
                    <textarea name="message" rows="5"
                              class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-emerald-500 hover:bg-emerald-400 text-black font-semibold py-3 rounded-xl transition">
                    Trimite mesajul
                </button>

            </form>

        </div>
    </section>

@endsection