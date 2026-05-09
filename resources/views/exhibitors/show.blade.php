@extends('layouts.app')

@section('title', $exhibitor->name . ' — TAE 2026')

@section('content')

    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">

            {{-- Breadcrumb --}}
            <div class="text-sm text-gray-500 mb-8">
                <a href="/" class="hover:text-white transition">Acasă</a>
                <span class="mx-2">→</span>
                <a href="/expozanti" class="hover:text-white transition">Expozanți</a>
                <span class="mx-2">→</span>
                <span class="text-gray-300">{{ $exhibitor->name }}</span>
            </div>

            {{-- Header expozant --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 mb-12 flex gap-6 items-start">
                <div class="w-20 h-20 bg-gray-800 rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="text-4xl">🏢</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">{{ $exhibitor->name }}</h1>
                    @if($exhibitor->description)
                        <p class="text-gray-400 mb-4">{{ $exhibitor->description }}</p>
                    @endif
                    <div class="flex flex-wrap gap-4 text-sm text-gray-500">
                        @if($exhibitor->stand_number)
                            <span>📍 Stand {{ $exhibitor->stand_number }}</span>
                        @endif
                        @if($exhibitor->phone)
                            <span>📞 {{ $exhibitor->phone }}</span>
                        @endif
                        @if($exhibitor->email)
                            <span>✉️ {{ $exhibitor->email }}</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Mașinile expozantului --}}
            <h2 class="text-2xl font-bold text-white mb-6">Mașini expuse</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @forelse($exhibitor->cars as $car)
                    <a href="/masini/{{ $car->slug }}"
                       class="bg-gray-900 border border-gray-800 hover:border-emerald-500/50 rounded-2xl overflow-hidden transition">
                        <div class="h-48 bg-gray-800 flex items-center justify-center">
                            <span class="text-6xl">🚗</span>
                        </div>
                        <div class="p-5">
                            <div class="text-xs text-emerald-400 font-mono mb-1">{{ $car->category->name }}</div>
                            <h3 class="text-lg font-bold text-white mb-1">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="text-gray-400 text-sm mb-3">{{ $car->year }} · {{ $car->fuel_type }}</p>
                            @if($car->price)
                                <p class="text-emerald-400 font-semibold">€ {{ number_format($car->price, 0, ',', '.') }}</p>
                            @endif
                        </div>
                    </a>
                @empty
                    <p class="text-gray-400 col-span-3">Nicio mașină înregistrată.</p>
                @endforelse
            </div>

        </div>
    </section>

@endsection