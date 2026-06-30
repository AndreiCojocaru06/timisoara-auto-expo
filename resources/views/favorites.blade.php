@extends('layouts.app')
@section('title', 'Masinile mele favorite - TAE 2026')
@section('content')
<section class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-white mb-4">Masinile mele favorite</h1>
        <p class="text-gray-400 mb-12">Masinile pe care le-ai salvat.</p>

        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl p-4 mb-8">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($cars as $car)
                <div class="group bg-gray-900 border border-gray-800 hover:border-emerald-500/50 rounded-2xl overflow-hidden transition">
                    <a href="/masini/{{ $car->slug }}">
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
                    <form method="POST" action="/favorites/{{ $car->id }}" class="px-5 pb-5">
                        @csrf
                        <button type="submit" class="text-xs text-red-400 hover:underline">♥ Elimina din favorite</button>
                    </form>
                </div>
            @empty
                <div class="col-span-3 bg-gray-900 border border-gray-800 rounded-xl p-12 text-center">
                    <p class="text-gray-400 mb-4">Nu ai nicio masina favorita inca.</p>
                    <a href="/masini" class="text-emerald-400 hover:underline">Vezi masinile disponibile →</a>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
