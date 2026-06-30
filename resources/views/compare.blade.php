@extends('layouts.app')
@section('title', 'Compara masini - TAE 2026')
@section('content')
<section class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-white mb-4">Compara masini</h1>
        <p class="text-gray-400 mb-12">Compari pana la 3 masini in acelasi timp.</p>

        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl p-4 mb-8">
                {{ session('success') }}
            </div>
        @endif

        @if($cars->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="text-left p-4 text-gray-500 text-sm w-40"></th>
                            @foreach($cars as $car)
                                <th class="p-4 text-center min-w-[220px]">
                                    <div class="h-32 bg-gray-800 rounded-xl flex items-center justify-center mb-3">
                                        <span class="text-5xl">🚗</span>
                                    </div>
                                    <div class="text-white font-bold text-lg">{{ $car->brand }} {{ $car->model }}</div>
                                    <form method="POST" action="/compare/{{ $car->id }}" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 text-xs hover:underline">Elimina</button>
                                    </form>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border-t border-gray-800">
                            <td class="p-4 text-gray-500">Categorie</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->category->name }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800 bg-gray-900/50">
                            <td class="p-4 text-gray-500">An</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->year }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800">
                            <td class="p-4 text-gray-500">Pret</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-emerald-400 font-semibold">{{ $car->price ? '€'.number_format($car->price,0,',','.') : '-' }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800 bg-gray-900/50">
                            <td class="p-4 text-gray-500">Combustibil</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->fuel_type ?? '-' }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800">
                            <td class="p-4 text-gray-500">Transmisie</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->transmission ?? '-' }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800 bg-gray-900/50">
                            <td class="p-4 text-gray-500">Putere</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->horsepower ? $car->horsepower.' CP' : '-' }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800">
                            <td class="p-4 text-gray-500">Culoare</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->color ?? '-' }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800 bg-gray-900/50">
                            <td class="p-4 text-gray-500">Kilometraj</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->mileage ? number_format($car->mileage,0,',','.').' km' : '-' }}</td>
                            @endforeach
                        </tr>
                        <tr class="border-t border-gray-800">
                            <td class="p-4 text-gray-500">Expozant</td>
                            @foreach($cars as $car)
                                <td class="p-4 text-center text-white">{{ $car->exhibitor->name }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-12 text-center">
                <p class="text-gray-400 mb-4">Nu ai nicio masina adaugata la comparare inca.</p>
                <a href="/masini" class="text-emerald-400 hover:underline">Vezi masinile disponibile →</a>
            </div>
        @endif
    </div>
</section>
@endsection
