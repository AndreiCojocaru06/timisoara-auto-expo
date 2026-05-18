
<!DOCTYPE html>

<html lang="ro">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin — @yield('title', 'TAE 2026')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-950 text-gray-100 min-h-screen">

    <div class="flex min-h-screen">

        <aside class="w-64 bg-gray-900 border-r border-gray-800 flex flex-col">

            <div class="p-6 border-b border-gray-800">

                <a href="/admin" class="text-lg font-bold text-white">

                    🚗 <span class="text-emerald-400">TAE</span> Admin

                </a>

            </div>

            <nav class="flex-1 p-4 space-y-1">

                <a href="/admin" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white transition text-sm">📊 Dashboard</a>

                <a href="/admin/cars" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white transition text-sm">🚗 Masini</a>

                <a href="/admin/exhibitors" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white transition text-sm">🏢 Expozanti</a>

                <a href="/admin/contacts" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white transition text-sm">✉️ Mesaje</a>

            </nav>

            <div class="p-4 border-t border-gray-800">

                <a href="/" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white transition text-sm">🌐 Vezi site-ul</a>

                <form method="POST" action="/logout">

                    @csrf

                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white transition text-sm text-left">🚪 Logout</button>

                </form>

            </div>

        </aside>

        <main class="flex-1 flex flex-col">

            <header class="bg-gray-900 border-b border-gray-800 px-8 py-4 flex items-center justify-between">

                <h1 class="text-lg font-semibold text-white">@yield('title', 'Dashboard')</h1>

                <span class="text-sm text-gray-400">{{ auth()->user()->name }}</span>

            </header>

            <div class="flex-1 p-8">

                @if(session('success'))

                    <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl p-4 mb-6">{{ session('success') }}</div>

                @endif

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>

