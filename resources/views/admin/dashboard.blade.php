
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">

        <div class="text-3xl font-bold text-emerald-400">{{ $stats['cars'] }}</div>

        <div class="text-gray-400 text-sm mt-1">Masini</div>

    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">

        <div class="text-3xl font-bold text-blue-400">{{ $stats['exhibitors'] }}</div>

        <div class="text-gray-400 text-sm mt-1">Expozanti</div>

    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">

        <div class="text-3xl font-bold text-purple-400">{{ $stats['categories'] }}</div>

        <div class="text-gray-400 text-sm mt-1">Categorii</div>

    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">

        <div class="text-3xl font-bold text-yellow-400">{{ $stats['unread_contacts'] }}</div>

        <div class="text-gray-400 text-sm mt-1">Mesaje necitite</div>

    </div>

</div>

<div class="grid md:grid-cols-2 gap-8">

    <div>

        <h2 class="text-lg font-bold text-white mb-4">Masini recente</h2>

        <div class="space-y-3">

            @foreach($recentCars as $car)

            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4 flex items-center justify-between">

                <div>

                    <div class="font-semibold text-white">{{ $car->brand }} {{ $car->model }}</div>

                    <div class="text-gray-400 text-sm">{{ $car->category->name }} · {{ $car->exhibitor->name }}</div>

                </div>

                <a href="/admin/cars/{{ $car->id }}/edit" class="text-emerald-400 text-sm hover:underline">Editeaza</a>

            </div>

            @endforeach

        </div>

    </div>

    <div>

        <h2 class="text-lg font-bold text-white mb-4">Mesaje recente</h2>

        <div class="space-y-3">

            @foreach($recentContacts as $contact)

            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4 flex items-center justify-between">

                <div>

                    <div class="font-semibold text-white">{{ $contact->name }}</div>

                    <div class="text-gray-400 text-sm">{{ $contact->email }}</div>

                </div>

                @if(!$contact->is_read)

                    <span class="text-xs bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded-full">Nou</span>

                @endif

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection

