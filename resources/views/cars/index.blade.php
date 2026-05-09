@extends('layouts.app')

@section('title', 'Mașini — Timișoara Auto Expo 2026')

@section('content')

    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">

            <h1 class="text-4xl font-bold text-white mb-8">Mașini expuse</h1>

            {{-- Filtre categorii --}}
            <div class="flex flex-wrap gap-3 mb-10">
                <a href="/masini"
                   class="px-5 py-2 rounded-full text-sm border transition
                   {{ !request('categorie') ? 'bg-emerald-500 text-black border-emerald-500' : 'bg-gray-800 text-gray-300 border-gray-700 hover:border-gray-500' }}">
                    Toate
                </a>
                @foreach($categories as $category)
                    <a href="/masini?categorie={{ $category->slug }}"
                       class="px-5 py-2 rounded-full text-sm border transition
                       {{ request('categorie') === $category->slug ? 'bg-emerald-500 text-black border-emerald-500' : 'bg-gray-800 text-gray-300 border-gray-700 hover:border-gray-500' }}">
                        {{ $category->icon }} {{ $category->name }}
                    </a>
                @endforeach
            </div>

            {{-- Grid mașini --}}
            <div class="grid md:grid-cols-3 gap-6">
                @forelse($cars as $car)
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
                @empty
                    <p class="text-gray-400 col-span-3">Nicio mașină găsită.</p>
                @endforelse
            </div>

            {{-- Paginare --}}
            <div class="mt-10">
                {{ $cars->links() }}
            </div>

        </div>
    </section>

@endsection