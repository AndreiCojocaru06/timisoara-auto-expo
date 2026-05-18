@extends('admin.layouts.app')

@section('title', 'Expozanti')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-white">Toti expozantii</h2>
    <a href="/admin/exhibitors/create" class="bg-emerald-500 hover:bg-emerald-400 text-black font-semibold px-5 py-2 rounded-lg transition text-sm">+ Adauga expozant</a>
</div>

<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-800 text-gray-400 text-left">
                <th class="px-6 py-4">Nume</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4">Stand</th>
                <th class="px-6 py-4">Masini</th>
                <th class="px-6 py-4">Actiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exhibitors as $exhibitor)
            <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                <td class="px-6 py-4 font-semibold text-white">{{ $exhibitor->name }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $exhibitor->email }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $exhibitor->stand_number }}</td>
                <td class="px-6 py-4 text-emerald-400">{{ $exhibitor->cars_count }}</td>
                <td class="px-6 py-4 flex gap-3">
                    <a href="/admin/exhibitors/{{ $exhibitor->id }}/edit" class="text-blue-400 hover:underline">Editeaza</a>
                    <form method="POST" action="/admin/exhibitors/{{ $exhibitor->id }}" onsubmit="return confirm('Sigur stergi?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline">Sterge</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">{{ $exhibitors->links() }}</div>
</div>

@endsection
