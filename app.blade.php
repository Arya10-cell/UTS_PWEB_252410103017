<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Aplikasi'))</title>

    {{-- Terapkan dark mode sebelum render supaya tidak ada kedipan --}}
    <script>
        (function () {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (saved === 'dark' || (!saved && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-50 font-sans text-slate-900 antialiased transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">

    {{-- Background blob animasi --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -left-40 -top-40 h-96 w-96 animate-blob rounded-full bg-indigo-400/30 blur-3xl dark:bg-indigo-600/20"></div>
        <div class="absolute -right-40 top-1/3 h-96 w-96 animate-blob rounded-full bg-fuchsia-400/30 blur-3xl [animation-delay:4s] dark:bg-fuchsia-600/20"></div>
    </div>

    <header class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/70 backdrop-blur-md dark:border-white/10 dark:bg-slate-950/70">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 font-bold">
                <span class="grid h-8 w-8 place-items-center rounded-lg bg-linear-to-br from-indigo-500 to-fuchsia-500 text-white">A</span>
                {{ config('app.name', 'Aplikasi') }}
            </a>

            <div class="flex items-center gap-2">
                <button type="button" data-theme-toggle
                        class="rounded-full border border-slate-200 p-2 transition hover:scale-110 dark:border-white/10"
                        aria-label="Ganti tema">
                    <span class="dark:hidden">🌙</span>
                    <span class="hidden dark:inline">☀️</span>
                </button>
                <a href="{{ route('login') }}"
                   class="rounded-full px-4 py-2 text-sm font-medium transition hover:bg-slate-100 dark:hover:bg-white/10">
                    Masuk
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-10">
        @yield('content')
    </main>

    <div id="toast-root" class="fixed bottom-4 right-4 z-50 flex flex-col gap-2"></div>
</body>
</html>