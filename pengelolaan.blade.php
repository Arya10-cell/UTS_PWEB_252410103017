@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-2">
    <div>
        <h2 class="mb-1">Pengelolaan Proyek</h2>
        <p class="text-muted mb-0">Dikelola oleh: <strong>{{ $username }}</strong></p>
    </div>
    <span class="badge bg-secondary align-self-start align-self-md-center">
        Total: {{ count($daftarProyek) }} proyek
    </span>
</div>

<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama Proyek</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Deadline</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarProyek as $proyek)
                    <tr>
                        <td>{{ $proyek['id'] }}</td>
                        <td class="fw-semibold">{{ $proyek['nama'] }}</td>
                        <td>{{ $proyek['kategori'] }}</td>
                        <td>
                            <span class="badge bg-{{ $proyek['warna'] }}">{{ $proyek['status'] }}</span>
                        </td>
                        <td>{{ $proyek['deadline'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data proyek.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection