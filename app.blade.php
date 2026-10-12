<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog CRUD')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-[#0f0f0f] text-white min-h-screen">

    {{-- Navbar --}}
    <nav class="border-b border-white/10 px-6 py-4 sticky top-0 bg-[#0f0f0f]/90 backdrop-blur z-50">
        <div class="max-w-5xl mx-auto flex items-center justify-between">
            <a href="{{ route('posts.index') }}" class="text-sm font-semibold tracking-widest uppercase text-white/40 hover:text-white/70 transition">
                TugasWeb P10
            </a>
            <div class="flex items-center gap-4">
                {{-- Search Form --}}
                <form action="{{ route('posts.search') }}" method="GET" class="flex items-center gap-2">
                    <input
                        type="text"
                        name="q"
                        placeholder="Cari post..."
                        value="{{ request('q') }}"
                        class="bg-white/5 border border-white/10 rounded-lg px-3 py-1.5 text-sm text-white/70 placeholder-white/20 focus:outline-none focus:border-white/30 w-40"
                    >
                </form>
                <a href="{{ route('posts.create') }}" class="bg-white text-black px-4 py-1.5 rounded-lg text-sm font-semibold hover:bg-white/90 transition">
                    + Tulis Post
                </a>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    <div class="max-w-5xl mx-auto px-6 pt-4">
        @if(session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif
        @if(session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif
    </div>

    {{-- Main Content --}}
    <main class="max-w-5xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-white/10 px-6 py-6 mt-10">
        <div class="max-w-5xl mx-auto text-center text-xs text-white/20">
            Tugas Rutin 10 — Blog CRUD Laravel · {{ date('Y') }}
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
