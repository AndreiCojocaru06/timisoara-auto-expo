@extends('admin.layouts.app')
@section('title', 'Mesaje')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-white">Toate mesajele</h2>
</div>
<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-800 text-gray-400 text-left">
                <th class="px-6 py-4">Nume</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4">Subiect</th>
                <th class="px-6 py-4">Data</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Actiuni</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                <td class="px-6 py-4 font-semibold text-white">{{ $contact->name }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $contact->email }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $contact->subject ?? '-' }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $contact->created_at->format('d.m.Y') }}</td>
                <td class="px-6 py-4">
                    @if(!$contact->is_read)
                        <span class="text-xs bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded-full">Nou</span>
                    @else
                        <span class="text-xs bg-gray-700 text-gray-400 px-2 py-1 rounded-full">Citit</span>
                    @endif
                </td>
                <td class="px-6 py-4 flex gap-3">
                    <a href="/admin/contacts/{{ $contact->id }}" class="text-blue-400 hover:underline">Vezi</a>
                    <form method="POST" action="/admin/contacts/{{ $contact->id }}" onsubmit="return confirm('Sigur stergi?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline">Sterge</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-400">Niciun mesaj primit.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $contacts->links() }}</div>
</div>
@endsection
