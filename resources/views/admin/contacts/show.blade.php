@extends('admin.layouts.app')
@section('title', 'Mesaj')
@section('content')
<div class="max-w-2xl">
    <a href="/admin/contacts" class="text-gray-400 hover:text-white text-sm mb-6 inline-block">← Inapoi</a>
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-white">Mesaj de la {{ $contact->name }}</h2>
            <span class="text-xs bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded-full">Citit</span>
        </div>
        <div class="space-y-4 mb-8">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-800 rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-1">Nume</div>
                    <div class="text-white font-semibold">{{ $contact->name }}</div>
                </div>
                <div class="bg-gray-800 rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-1">Email</div>
                    <div class="text-white font-semibold">{{ $contact->email }}</div>
                </div>
                @if($contact->phone)
                <div class="bg-gray-800 rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-1">Telefon</div>
                    <div class="text-white font-semibold">{{ $contact->phone }}</div>
                </div>
                @endif
                @if($contact->subject)
                <div class="bg-gray-800 rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-1">Subiect</div>
                    <div class="text-white font-semibold">{{ $contact->subject }}</div>
                </div>
                @endif
            </div>
            <div class="bg-gray-800 rounded-lg p-4">
                <div class="text-xs text-gray-500 mb-2">Mesaj</div>
                <div class="text-white leading-relaxed">{{ $contact->message }}</div>
            </div>
            <div class="text-xs text-gray-500">Primit la: {{ $contact->created_at->format('d.m.Y H:i') }}</div>
        </div>
        <form method="POST" action="/admin/contacts/{{ $contact->id }}" onsubmit="return confirm('Sigur stergi?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500/20 hover:bg-red-500/30 text-red-400 font-semibold px-5 py-2 rounded-lg transition text-sm">Sterge mesajul</button>
        </form>
    </div>
</div>
@endsection
