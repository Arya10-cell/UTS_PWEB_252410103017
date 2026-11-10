@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="card shadow-sm border-0 text-center p-4 h-100">
            <i class="bi bi-person-circle display-1 text-primary"></i>
            <h4 class="mt-3 mb-0">{{ $profil['nama'] }}</h4>
            <span class="text-muted">{{ $profil['peran'] }}</span>
        </div>
    </div>

    <div class="col-12 col-md-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white fw-semibold">Informasi Akun</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Username</span>
                    <strong>{{ $username }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Email</span>
                    <strong>{{ $profil['email'] }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Bergabung</span>
                    <strong>{{ $profil['bergabung'] }}</strong>
                </li>
            </ul>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-semibold">Riwayat Login</div>
            <ul class="list-group list-group-flush">
                @foreach ($riwayatLogin as $waktu)
                    <li class="list-group-item">
                        <i class="bi bi-clock-history text-secondary"></i> {{ $waktu }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection