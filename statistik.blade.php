<div class="card shadow-sm border-0 h-100">
    <div class="card-body d-flex align-items-center gap-3">
        <div class="fs-2 text-{{ $item['warna'] }}">
            <i class="bi {{ $item['ikon'] }}"></i>
        </div>
        <div>
            <div class="text-muted small">{{ $item['label'] }}</div>
            <div class="fs-4 fw-bold">{{ $item['nilai'] }}</div>
        </div>
    </div>
</div>