<div class="main-header">
    <div class="container">
        <div class="header-content">
            <div class="logo-section">
                <div class="logo-text">
                    <h1>DesaInovatif</h1>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav">
                <div class="nav-links">
                    <a href="{{ route('landing.index') }}" class="nav-link {{ request()->routeIs('landing.index') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('landing.tentang_desa') }}" class="nav-link {{ request()->routeIs('landing.tentang_desa') ? 'active' : '' }}">Tentang Desa</a>
                    <a href="{{ route('landing.layanan') }}" class="nav-link {{ request()->routeIs('landing.layanan') ? 'active' : '' }}">Layanan Online</a>
                    <a href="{{ route('landing.informasidesa') }}" class="nav-link {{ request()->routeIs('landing.informasidesa') ? 'active' : '' }}">Informasi Desa</a>
                    <a href="{{ route('landing.partisipasi') }}" class="nav-link {{ request()->routeIs('landing.partisipasi') ? 'active' : '' }}">Aspirasi & Partisipasi</a>
                </div>
                <a href="{{ route('login') }}" class="login-btn {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="mobile-nav" id="mobileNav">
            <a href="#" onclick="showPage('beranda'); closeMobileMenu()">Beranda</a>
            <a href="#" onclick="showPage('tentang'); closeMobileMenu()">Tentang Desa</a>
            <a href="#" onclick="showPage('layanan'); closeMobileMenu()">Layanan Online</a>
            <a href="#" onclick="showPage('informasi'); closeMobileMenu()">Informasi Desa</a>
            <a href="#" onclick="showPage('partisipasi'); closeMobileMenu()">Aspirasi & Partisipasi</a>
            <a href="{{ route('login') }}" class="login-btn" onclick="closeMobileMenu()">Login</a>
        </nav>
    </div>
</div>

<style>
    .desktop-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-links {
        display: flex;
        gap: 20px;
    }

    .login-btn {
        background-color: #16a34a;
        color: white;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .login-btn:hover {
        background-color: #13843b;
    }

    .login-btn.active {
        background-color: #0f6b2f;
    }

    .mobile-nav .login-btn {
        background-color: #16a34a;
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        margin: 10px 0;
    }

    .mobile-nav .login-btn:hover {
        background-color: #13843b;
    }
</style>
