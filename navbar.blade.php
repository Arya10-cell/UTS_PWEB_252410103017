@props(['username' => 'Tamu'])

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard', ['username' => $username]) }}">
            <i class="bi bi-box-seam"></i> DemoMVC
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama"
                aria-controls="menuUtama" aria-expanded="false" aria-label="Toggle navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard', ['username' => $username]) }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengelolaan', ['username' => $username]) }}">Pengelolaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile', ['username' => $username]) }}">Profile</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">
                    <i class="bi bi-person-fill"></i> {{ $username }}
                </span>
                <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>