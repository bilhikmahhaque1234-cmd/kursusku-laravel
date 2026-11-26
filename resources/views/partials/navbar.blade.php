<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <!-- Logo & Nama Aplikasi -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="{{ asset('images/logo.jpg') }}" 
                 alt="Logo KursusKu" 
                 width="36" 
                 height="36" 
                 style="object-fit: cover; border-radius: 50%; display: inline-block;">
            <span class="fw-bold">KursusKu</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuUtama"
                aria-controls="menuUtama" aria-expanded="false" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Daftar Kursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('enrollments*') ? 'active' : '' }}" href="{{ route('enrollments.index') }}">Enrollment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pendaftaran*') ? 'active' : '' }}"
                       href="{{ url('/pendaftaran') }}">Pendaftaran</a>
                </li>

                {{-- Tombol Login (tampil saat belum login) --}}
                @guest
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-light btn-sm fw-bold px-3" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endguest

                {{-- Menu Profil & Tombol Logout (tampil setelah login) --}}
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}" href="{{ route('dashboard') }}">
                            Profil
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm fw-bold px-3">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>