@extends('layouts.app')

@section('title', 'Timișoara Auto Expo 2026')

@section('content')

    {{-- Hero --}}
    <section class="relative py-32 px-6 text-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/30 to-gray-950 pointer-events-none"></div>
        <div class="relative max-w-4xl mx-auto">
            <span class="text-emerald-400 text-sm font-mono uppercase tracking-widest">15-17 Iunie 2026 · Timișoara</span>
            <h1 class="text-5xl md:text-7xl font-bold text-white mt-4 mb-6 leading-tight">
                Timișoara<br><span class="text-emerald-400">Auto Expo</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-10">
                Cea mai mare expoziție auto din vestul României. Peste 50 de mașini, 20 de expozanți, 3 zile de evenimente.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="/masini" class="bg-emerald-500 hover:bg-emerald-400 text-black font-semibold px-8 py-3 rounded-full transition">
                    Vezi mașinile
                </a>
                <a href="/program" class="border border-gray-600 hover:border-gray-400 text-gray-300 font-semibold px-8 py-3 rounded-full transition">
                    Program eveniment
                </a>
            </div>
        </div>
    </section>

    {{-- Categorii --}}
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold text-white mb-8">Categorii</h2>
            <div class="flex flex-wrap gap-3">
                @foreach($categories as $category)
                    <a href="/masini?categorie={{ $category->slug }}"
                       class="flex items-center gap-2 px-5 py-2 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-full transition text-sm">
                        <span>{{ $category->icon }}</span>
                        <span>{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Mașini featured --}}
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-baseline justify-between mb-8">
                <h2 class="text-2xl font-bold text-white">Mașini în evidență</h2>
                <a href="/masini" class="text-emerald-400 text-sm hover:underline">Vezi toate →</a>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($featuredCars as $car)
                    <a href="/masini/{{ $car->slug }}"
                       class="group bg-gray-900 border border-gray-800 hover:border-emerald-500/50 rounded-2xl overflow-hidden transition">
                        <div class="h-48 bg-gray-800 flex items-center justify-center">
                            <span class="text-6xl">🚗</span>
                        </div>
                        <div class="p-5">
                            <div class="text-xs text-emerald-400 font-mono mb-1">{{ $car->category->name }}</div>
                            <h3 class="text-lg font-bold text-white mb-1">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="text-gray-400 text-sm mb-3">{{ $car->year }} · {{ $car->fuel_type }} · {{ $car->horsepower }}cp</p>
                            @if($car->price)
                                <p class="text-emerald-400 font-semibold">€ {{ number_format($car->price, 0, ',', '.') }}</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Expozanți --}}
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-baseline justify-between mb-8">
                <h2 class="text-2xl font-bold text-white">Expozanți</h2>
                <a href="/expozanti" class="text-emerald-400 text-sm hover:underline">Vezi toți →</a>
            </div>
            <div class="grid md:grid-cols-4 gap-4">
                @foreach($exhibitors as $exhibitor)
                    <a href="/expozanti/{{ $exhibitor->slug }}"
                       class="bg-gray-900 border border-gray-800 hover:border-emerald-500/50 rounded-xl p-6 text-center transition">
                        <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">🏢</span>
                        </div>
                        <p class="font-semibold text-white text-sm">{{ $exhibitor->name }}</p>
                        <p class="text-gray-500 text-xs mt-1">Stand {{ $exhibitor->stand_number }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection