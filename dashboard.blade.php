@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight">Halo, selamat datang 👋</h1>
        <p class="mt-1 text-slate-500 dark:text-slate-400">Pantau dan kelola tugas harianmu di sini.</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-3">
        @foreach ([
            ['total', 'Total Tugas', 'from-indigo-500 to-blue-500'],
            ['done', 'Selesai', 'from-emerald-500 to-teal-500'],
            ['pending', 'Belum Selesai', 'from-amber-500 to-orange-500'],
        ] as [$key, $label, $grad])
            <div class="group relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-900/5 transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:bg-slate-900 dark:ring-white/10">
                <div class="absolute inset-x-0 top-0 h-1 bg-linier-to-r {{ $grad }}"></div>
                <p class="text-sm text-slate-500 dark:text-slate-400">{{ $label }}</p>
                <p class="mt-2 text-4xl font-bold" data-stat="{{ $key }}">0</p>
            </div>
        @endforeach
    </div>

    <div id="todo-app" class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-900/5 dark:bg-slate-900 dark:ring-white/10">
        <h2 class="text-lg font-semibold">Daftar Tugas</h2>

        <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-100 dark:bg-slate-800">
            <div data-progress class="h-full rounded-full bg-linier-to-r from-indigo-500 to-fuchsia-500 transition-all duration-500" style="width: 0%"></div>
        </div>

        <form class="mt-6 flex gap-2">
            <input type="text" placeholder="Tulis tugas baru..."
                   class="flex-1 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none transition focus:ring-4 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800">
            <button type="submit"
                    class="rounded-xl bg-indigo-600 px-5 text-sm font-semibold text-white transition hover:bg-indigo-500 active:scale-95">
                Tambah
            </button>
        </form>

        <ul data-todo-list class="mt-6 space-y-2"></ul>
    </div>
</div>
@endsection