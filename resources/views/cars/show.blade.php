@extends('layouts.app')

@section('title', $car->brand . ' ' . $car->model . ' — TAE 2026')

@section('content')

    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">

            {{-- Breadcrumb --}}
            <div class="text-sm text-gray-500 mb-8">
                <a href="/" class="hover:text-white transition">Acasă</a>
                <span class="mx-2">→</span>
                <a href="/masini" class="hover:text-white transition">Mașini</a>
                <span class="mx-2">→</span>
                <span class="text-gray-300">{{ $car->brand }} {{ $car->model }}</span>
            </div>

            <div class="grid md:grid-cols-2 gap-12">

                {{-- Imagine --}}
                <div class="bg-gray-900 border border-gray-800 rounded-2xl h-80 flex items-center justify-center">
                    <span class="text-9xl">🚗</span>
                </div>

                {{-- Detalii --}}
                <div>
                    <div class="text-sm text-emerald-400 font-mono mb-2">{{ $car->category->name }}</div>
                    <h1 class="text-4xl font-bold text-white mb-2">{{ $car->brand }} {{ $car->model }}</h1>
                    <p class="text-gray-400 mb-6">{{ $car->year }} · {{ $car->exhibitor->name }}</p>

                    @if($car->price)
    <p class="text-3xl font-bold text-emerald-400 mb-4">€ {{ number_format($car->price, 0, ',', '.') }}</p>
@endif

@auth
    <form method="POST" action="/favorites/{{ $car->id }}" class="mb-8">
        @csrf
        <button type="submit" class="flex items-center gap-2 text-sm border border-gray-700 hover:border-red-400 text-gray-300 hover:text-red-400 px-4 py-2 rounded-lg transition">
            ♥ {{ auth()->user()->favoriteCars->contains($car->id) ? 'Elimina din favorite' : 'Adauga la favorite' }}
        </button>
    </form>
@else
    <p class="mb-8 text-sm text-gray-500">
        <a href="/login" class="text-emerald-400 hover:underline">Conecteaza-te</a> pentru a salva la favorite
    </p>
@endauth

                    {{-- Specificații --}}
                    <div class="grid grid-cols-2 gap-3">
                        @if($car->fuel_type)
                            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4">
                                <div class="text-xs text-gray-500 mb-1">Combustibil</div>
                                <div class="font-semibold text-white">{{ $car->fuel_type }}</div>
                            </div>
                        @endif
                        @if($car->transmission)
                            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4">
                                <div class="text-xs text-gray-500 mb-1">Transmisie</div>
                                <div class="font-semibold text-white">{{ $car->transmission }}</div>
                            </div>
                        @endif
                        @if($car->horsepower)
                            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4">
                                <div class="text-xs text-gray-500 mb-1">Putere</div>
                                <div class="font-semibold text-white">{{ $car->horsepower }} CP</div>
                            </div>
                        @endif
                        @if($car->color)
                            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4">
                                <div class="text-xs text-gray-500 mb-1">Culoare</div>
                                <div class="font-semibold text-white">{{ $car->color }}</div>
                            </div>
                        @endif
                    </div>

                    {{-- Expozant --}}
                    <div class="mt-6 p-4 bg-gray-900 border border-gray-800 rounded-xl">
                        <div class="text-xs text-gray-500 mb-1">Expozant</div>
                        <a href="/expozanti/{{ $car->exhibitor->slug }}" class="font-semibold text-emerald-400 hover:underline">
                            {{ $car->exhibitor->name }}
                        </a>
                        <span class="text-gray-500 text-sm ml-2">Stand {{ $car->exhibitor->stand_number }}</span>
                    </div>
                </div>
            </div>

            {{-- Descriere --}}
            @if($car->description)
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-white mb-4">Descriere</h2>
                    <p class="text-gray-400 leading-relaxed">{{ $car->description }}</p>
                </div>
            @endif

            {{-- Mașini similare --}}
            @if($related->count())
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-white mb-6">Mașini similare</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($related as $r)
                            <a href="/masini/{{ $r->slug }}"
                               class="bg-gray-900 border border-gray-800 hover:border-emerald-500/50 rounded-2xl overflow-hidden transition">
                                <div class="h-36 bg-gray-800 flex items-center justify-center">
                                    <span class="text-5xl">🚗</span>
                                </div>
                                <div class="p-4">
                                    <div class="text-xs text-emerald-400 font-mono mb-1">{{ $r->category->name }}</div>
                                    <h3 class="font-bold text-white">{{ $r->brand }} {{ $r->model }}</h3>
                                    <p class="text-gray-400 text-sm">{{ $r->year }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

@endsection