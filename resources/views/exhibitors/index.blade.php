@extends('layouts.app')

@section('title', 'Expozanți — Timișoara Auto Expo 2026')

@section('content')

    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">

            <h1 class="text-4xl font-bold text-white mb-4">Expozanți</h1>
            <p class="text-gray-400 mb-12">Companiile participante la Timișoara Auto Expo 2026.</p>

            <div class="grid md:grid-cols-2 gap-6">
                @foreach($exhibitors as $exhibitor)
                    <a href="/expozanti/{{ $exhibitor->slug }}"
                       class="group bg-gray-900 border border-gray-800 hover:border-emerald-500/50 rounded-2xl p-6 transition flex gap-5 items-start">
                        <div class="w-14 h-14 bg-gray-800 rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-3xl">🏢</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white mb-1">{{ $exhibitor->name }}</h3>
                            <p class="text-gray-400 text-sm mb-2">{{ $exhibitor->description }}</p>
                            <div class="flex gap-4 text-xs text-gray-500">
                                <span>Stand {{ $exhibitor->stand_number }}</span>
                                <span>{{ $exhibitor->cars_count }} mașini</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>

@endsection