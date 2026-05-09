<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Timișoara Auto Expo 2026')</title>
    <meta name="description" content="@yield('description', 'Expoziția auto a anului în Timișoara')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="border-b border-gray-800 bg-gray-950/80 backdrop-blur-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold text-white">
                🚗 <span class="text-emerald-400">TAE</span> 2026
            </a>
            <div class="hidden md:flex items-center gap-8 text-sm text-gray-400">
                <a href="/" class="hover:text-white transition">Acasă</a>
                <a href="/masini" class="hover:text-white transition">Mașini</a>
                <a href="/expozanti" class="hover:text-white transition">Expozanți</a>
                <a href="/program" class="hover:text-white transition">Program</a>
                <a href="/contact" class="hover:text-white transition">Contact</a>
            </div>
        </div>
    </nav>

    {{-- Conținut --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-gray-800 mt-24 py-12">
        <div class="max-w-6xl mx-auto px-6 text-center text-gray-500 text-sm">
            <p class="text-lg font-semibold text-white mb-2">Timișoara Auto Expo 2026</p>
            <p>Organizat de MX Consulting SRL · Timișoara, România</p>
        </div>
    </footer>

</body>
</html>