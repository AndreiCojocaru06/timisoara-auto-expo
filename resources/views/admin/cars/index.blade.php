@extends('admin.layouts.app')

@section('title', 'Masini')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-white">Toate masinile</h2>
    <a href="/admin/cars/create" class="bg-emerald-500 hover:bg-emerald-400 text-black font-semibold px-5 py-2 rounded-lg transition text-sm">+ Adauga masina</a>
</div>

<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-800 text-gray-400 text-left">
                <th class="px-6 py-4">Masina</th>
                <th class="px-6 py-4">Categorie</th>
                <th class="px-6 py-4">Expozant</th>
                <th class="px-6 py-4">Pret</th>
                <th class="px-6 py-4">Featured</th>
                <th class="px-6 py-4">Actiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                <td class="px-6 py-4 font-semibold text-white">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</td>
                <td class="px-6 py-4 text-gray-400">{{ $car->category->name }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $car->exhibitor->name }}</td>
                <td class="px-6 py-4 text-emerald-400">{{ $car->price ? '€'.number_format($car->price,0,',','.') : '-' }}</td>
                <td class="px-6 py-4">
                    @if($car->is_featured)
                        <span class="text-xs bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded-full">Da</span>
                    @else
                        <span class="text-xs bg-gray-700 text-gray-400 px-2 py-1 rounded-full">Nu</span>
                    @endif
                </td>
                <td class="px-6 py-4 flex gap-3">
                    <a href="/admin/cars/{{ $car->id }}/edit" class="text-blue-400 hover:underline">Editeaza</a>
                    <form method="POST" action="/admin/cars/{{ $car->id }}" onsubmit="return confirm('Sigur stergi?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline">Sterge</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">{{ $cars->links() }}</div>
</div>

@endsection
