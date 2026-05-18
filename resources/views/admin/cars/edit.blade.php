@extends('admin.layouts.app')

@section('title', 'Editeaza masina')

@section('content')

<div class="max-w-2xl">
    <a href="/admin/cars" class="text-gray-400 hover:text-white text-sm mb-6 inline-block">← Inapoi</a>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-8">
        <h2 class="text-xl font-bold text-white mb-6">Editeaza {{ $car->brand }} {{ $car->model }}</h2>

        <form method="POST" action="/admin/cars/{{ $car->id }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Brand *</label>
                    <input type="text" name="brand" value="{{ old('brand', $car->brand) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                    @error('brand')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Model *</label>
                    <input type="text" name="model" value="{{ old('model', $car->model) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                    @error('model')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">An *</label>
                    <input type="number" name="year" value="{{ old('year', $car->year) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Pret (EUR)</label>
                    <input type="number" name="price" value="{{ old('price', $car->price) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Categorie *</label>
                    <select name="category_id" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $car->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Expozant *</label>
                    <select name="exhibitor_id" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                        @foreach($exhibitors as $exhibitor)
                            <option value="{{ $exhibitor->id }}" {{ $car->exhibitor_id == $exhibitor->id ? 'selected' : '' }}>{{ $exhibitor->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-5">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Combustibil</label>
                    <input type="text" name="fuel_type" value="{{ old('fuel_type', $car->fuel_type) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Transmisie</label>
                    <input type="text" name="transmission" value="{{ old('transmission', $car->transmission) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Putere (CP)</label>
                    <input type="number" name="horsepower" value="{{ old('horsepower', $car->horsepower) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Culoare</label>
                    <input type="text" name="color" value="{{ old('color', $car->color) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Kilometraj</label>
                    <input type="number" name="mileage" value="{{ old('mileage', $car->mileage) }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Descriere</label>
                <textarea name="description" rows="4"
                          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">{{ old('description', $car->description) }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" class="w-4 h-4 accent-emerald-500" {{ $car->is_featured ? 'checked' : '' }}>
                <label for="is_featured" class="text-sm text-gray-300">Afiseaza pe homepage (Featured)</label>
            </div>

            <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-400 text-black font-semibold py-3 rounded-lg transition">
                Salveaza modificarile
            </button>
        </form>
    </div>
</div>

@endsection
