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

                    <div class="dropdown">
                        <a href="#" class="nav-link {{ (request()->routeIs('landing.informasidesa') || request()->routeIs('landing.partisipasi')) ? 'active' : '' }}" aria-haspopup="true" aria-expanded="false" role="button" tabindex="0">
                            Informasi & Partisipasi
                        </a>
                        <div class="dropdown-content" role="menu">
                            <a href="{{ route('landing.informasidesa') }}" class="{{ request()->routeIs('landing.informasidesa') ? 'active' : '' }}" role="menuitem">Informasi Desa</a>
                            <a href="{{ route('landing.partisipasi') }}" class="{{ request()->routeIs('landing.partisipasi') ? 'active' : '' }}" role="menuitem">Aspirasi & Partisipasi</a>
                        </div>
                    </div>


                    <div class="dropdown">
                        <a href="#" class="nav-link {{ (request()->routeIs('landing.apbd') || request()->routeIs('landing.petapotensi')) ? 'active' : '' }}" aria-haspopup="true" aria-expanded="false" role="button" tabindex="0">
                            Laporan & Potensi
                        </a>
                        <div class="dropdown-content" role="menu">
                            <a href="{{ route('landing.apbd') }}" class="{{ request()->routeIs('landing.apbd') ? 'active' : '' }}" role="menuitem">Laporan APBD</a>
                            <a href="{{ route('landing.petapotensi') }}" class="{{ request()->routeIs('landing.petapotensi') ? 'active' : '' }}" role="menuitem">Peta Potensi</a>
                        </div>
                    </div>

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
    .header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* Logo kiri, login kanan */
        gap: 20px;
    }

    .logo-section {
        flex: 0 0 auto;
        /* Tidak tumbuh atau menyusut */
    }

    .desktop-nav {
        display: flex;
        align-items: center;
        flex: 1 1 auto;
        /* Boleh tumbuh dan menyusut */
        justify-content: center;
        /* Menu di tengah */
        gap: 20px;
    }

    .nav-links {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    /* Dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown button */
    .dropbtn {
        background: none;
        border: none;
        color: inherit;
        font: inherit;
        cursor: pointer;
        padding: 8px 16px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #e0e0e0;
        outline: none;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 180px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        border-radius: 5px;
        overflow: hidden;
        top: 100%;
        left: 0;
    }

    /* Dropdown links */
    .dropdown-content a {
        color: black;
        padding: 10px 16px;
        text-decoration: none;
        display: block;
        white-space: nowrap;
    }

    .dropdown-content a:hover,
    .dropdown-content a.active {
        background-color: #f1f1f1;
    }

    /* Show dropdown on hover/focus */
    .dropdown:hover .dropdown-content,
    .dropdown:focus-within .dropdown-content {
        display: block;
    }

    .login-btn {
        background-color: #16a34a;
        color: white;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
        flex-shrink: 0;
        /* Jangan menyusut */
    }

    .login-btn:hover {
        background-color: #13843b;
    }

    .login-btn.active {
        background-color: #0f6b2f;
    }

    /* Mobile nav login button */
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
