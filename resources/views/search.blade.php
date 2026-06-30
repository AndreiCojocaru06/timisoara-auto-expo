@extends('layouts.app')
@section('title', 'Cauta masini - TAE 2026')
@section('content')
<section class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-white mb-8">Cauta masini</h1>
        <form method="GET" action="/search" class="mb-10">
            <div class="flex gap-3">
                <input type="text" name="q" value="{{ $query }}" placeholder="Cauta dupa brand, model, culoare..."
                       class="flex-1 bg-gray-900 border border-gray-700 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-black font-semibold px-8 py-3 rounded-xl transition">
                    Cauta
                </button>
            </div>
        </form>

        <div class="flex flex-wrap gap-3 mb-10">
            <a href="/search?q={{ $query }}"
               class="px-5 py-2 rounded-full text-sm border transition
               {{ !$categorySlug ? 'bg-emerald-500 text-black border-emerald-500' : 'bg-gray-800 text-gray-300 border-gray-700 hover:border-gray-500' }}">
                Toate
            </a>
            @foreach($categories as $category)
                <a href="/search?q={{ $query }}&categorie={{ $category->slug }}"
                   class="px-5 py-2 rounded-full text-sm border transition
                   {{ $categorySlug === $category->slug ? 'bg-emerald-500 text-black border-emerald-500' : 'bg-gray-800 text-gray-300 border-gray-700 hover:border-gray-500' }}">
                    {{ $category->icon }} {{ $category->name }}
                </a>
            @endforeach
        </div>

        <p class="text-gray-400 mb-6">{{ $cars->total() }} rezultate gasite</p>

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
                        <p class="text-gray-400 text-sm mb-3">{{ $car->year }} · {{ $car->fuel_type }}</p>
                        @if($car->price)
                            <p class="text-emerald-400 font-semibold">€ {{ number_format($car->price, 0, ',', '.') }}</p>
                        @endif
                    </div>
                </a>
            @empty
                <p class="text-gray-400 col-span-3">Niciun rezultat gasit.</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $cars->links() }}</div>
    </div>
</section>
@endsection
