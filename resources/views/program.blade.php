@extends('layouts.app')

@section('title', 'Program — Timișoara Auto Expo 2026')

@section('content')

    <section class="py-16 px-6">
        <div class="max-w-4xl mx-auto">

            <h1 class="text-4xl font-bold text-white mb-4">Program eveniment</h1>
            <p class="text-gray-400 mb-12">15-17 Iunie 2026 · Timișoara</p>

            <div class="space-y-12">
                @foreach($program as $day)
                    <div>
                        <h2 class="text-xl font-bold text-emerald-400 mb-6 font-mono">{{ $day['day'] }}</h2>
                        <div class="space-y-4">
                            @foreach($day['events'] as $event)
                                <div class="flex gap-6 bg-gray-900 border border-gray-800 rounded-xl p-5">
                                    <div class="text-emerald-400 font-mono font-bold text-sm w-16 flex-shrink-0 pt-1">
                                        {{ $event['time'] }}
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white mb-1">{{ $event['title'] }}</h3>
                                        <p class="text-gray-400 text-sm">{{ $event['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection
