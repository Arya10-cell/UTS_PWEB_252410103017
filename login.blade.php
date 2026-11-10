@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="mx-auto max-w-md animate-toast">
    <div class="rounded-3xl border border-white/60 bg-white/70 p-8 shadow-2xl shadow-indigo-500/10 backdrop-blur-xl dark:border-white/10 dark:bg-slate-900/70">
        <h1 class="text-2xl font-bold tracking-tight">Selamat datang kembali</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Masuk untuk melanjutkan ke dashboard</p>

        <form id="login-form" data-redirect="{{ route('dashboard') }}" novalidate class="mt-8 space-y-5">
            @csrf

            <div>
                <label for="email" class="mb-1 block text-sm font-medium">Email</label>
                <input id="email" name="email" type="email" autocomplete="email" placeholder="nama@email.com"
                       class="w-full rounded-xl border border-slate-200 bg-white/80 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800/80">
                <p data-error-for="email" class="mt-1 hidden text-xs text-rose-500"></p>
            </div>

            <div>
                <div class="mb-1 flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <button type="button" data-toggle-password class="text-xs font-medium text-indigo-600 hover:underline dark:text-indigo-400">Tampilkan</button>
                </div>
                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="••••••••"
                       class="w-full rounded-xl border border-slate-200 bg-white/80 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800/80">
                <p data-error-for="password" class="mt-1 hidden text-xs text-rose-500"></p>
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                <input type="checkbox" name="remember" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                Ingat saya
            </label>

            <button type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-linier-to-r from-indigo-600 to-fuchsia-600 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/30 transition hover:scale-[1.01] hover:shadow-xl active:scale-[0.98] disabled:opacity-70">
                <span data-label>Masuk</span>
                <svg data-spinner class="hidden h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
            </button>
        </form>
    </div>
</div>
@endsection