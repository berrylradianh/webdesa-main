<aside class="w-64 h-screen bg-gradient-to-b from-[#3EB489] to-[#007BFF] text-white flex flex-col shadow-xl">
    <!-- Brand (Fixed di atas) -->
    <div class="p-6 text-2xl font-bold flex items-center space-x-2 border-b border-white/30 shadow-sm flex-shrink-0">
        <i data-feather="layers" class="w-7 h-7"></i>
        <span>DesaInovatif</span>
    </div>

    <!-- Navigation (Scrollable Area) -->
    <nav class="flex-1 p-4 space-y-2 text-sm font-medium overflow-y-auto custom-scrollbar">
        @if(session('role') === 'admin')
        <!-- Dashboard -->
        <a href="{{ route('dashboardadmin') }}"
            class="flex items-center px-4 py-2 rounded-lg transition group {{ request()->routeIs('dashboardadmin') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
            aria-label="Dashboard">
            <i data-feather="home" class="mr-2 w-5 h-5 transition group-hover:scale-110"></i>
            <span>Dashboard</span>
        </a>

        <!-- Management User -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Management User</p>
            <a href="{{ route('users') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('users*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Kelola User">
                <i data-feather="user" class="mr-2 w-5 h-5"></i>
                <span>User</span>
            </a>
            <a href="{{ route('roles') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('roles*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Kelola Role">
                <i data-feather="shield" class="mr-2 w-5 h-5"></i>
                <span>Role</span>
            </a>
        </div>

        <!-- Publikasi Konten -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Publikasi Konten</p>
            <a href="{{ route('admin.announcement.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.announcement*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Pengumuman Desa">
                <i data-feather="volume-2" class="mr-2 w-5 h-5"></i>
                <span>Pengumuman Desa</span>
            </a>
            <a href="{{ route('admin.article.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.article*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Artikel">
                <i data-feather="file-text" class="mr-2 w-5 h-5"></i>
                <span>Artikel</span>
            </a>
            <a href="{{ route('admin.agenda.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.agenda*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Agenda Kegiatan">
                <i data-feather="calendar" class="mr-2 w-5 h-5"></i>
                <span>Agenda Kegiatan</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.gallery*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Galeri / Media">
                <i data-feather="camera" class="mr-2 w-5 h-5"></i>
                <span>Galeri / Media</span>
            </a>
        </div>

        <!-- Kontrol Layanan Online -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Kontrol Layanan Online</p>
            <a href="{{ route('templates.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('templates*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Template Formulir">
                <i data-feather="file-plus" class="mr-2 w-5 h-5"></i>
                <span>Template Formulir</span>
            </a>
            <a href="{{ route('pengajuan.admin.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('pengajuan.admin*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Pengajuan Surat">
                <i data-feather="inbox" class="mr-2 w-5 h-5"></i>
                <span>Pengajuan Surat</span>
            </a>
        </div>

        <!-- Kontrol Aspirasi & Survei -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Kontrol Aspirasi & Survei</p>
            <a href="{{ route('admin.aspirasi.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.aspirasi*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Aspirasi Warga">
                <i data-feather="message-circle" class="mr-2 w-5 h-5"></i>
                <span>Aspirasi Warga</span>
            </a>
            <a href="{{ route('polling.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('polling*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Polling">
                <i data-feather="bar-chart-2" class="mr-2 w-5 h-5"></i>
                <span>Polling</span>
            </a>
            <a href="{{ route('surveys.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('surveys*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Survei">
                <i data-feather="clipboard" class="mr-2 w-5 h-5"></i>
                <span>Survei</span>
            </a>
            <a href="{{ route('faq.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('faq*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="FAQ">
                <i data-feather="help-circle" class="mr-2 w-5 h-5"></i>
                <span>FAQ</span>
            </a>
            <a href="{{ route('sop.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('sop*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="SOP">
                <i data-feather="book" class="mr-2 w-5 h-5"></i>
                <span>SOP</span>
            </a>
        </div>

        <!-- Layanan Desa -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Layanan Desa</p>
            <a href="{{ route('admin.kependudukan.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.kependudukan*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Data Desa">
                <i data-feather="file-text" class="mr-2 w-5 h-5"></i>
                <span>Data Desa</span>
            </a>
            <a href="{{ route('admin.mutasi.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.mutasi*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Mutasi Desa">
                <i data-feather="tag" class="mr-2 w-5 h-5"></i>
                <span>Mutasi Desa</span>
            </a>
            <a href="{{ route('admin.positions.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('admin.positions*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Struktur Organisasi">
                <i data-feather="users" class="mr-2 w-5 h-5"></i>
                <span>Struktur Organisasi</span>
            </a>
            {{-- Ganti href="#" dengan route asli jika ada --}}
        </div>

        @elseif(session('role') === 'perangkatdesa')
        <!-- Dashboard -->
        <a href="{{ route('dashboardperangkat') }}"
            class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('dashboardperangkat') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
            aria-label="Dashboard">
            <i data-feather="home" class="mr-2 w-5 h-5"></i>
            <span>Dashboard</span>
        </a>

        <!-- Aspirasi Warga -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Aspirasi Warga</p>
            <a href="{{ route('perangkat.aspirasi.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.aspirasi.*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Kelola Aspirasi">
                <i data-feather="message-square" class="mr-2 w-5 h-5"></i>
                <span>Kelola Aspirasi</span>
            </a>
        </div>

        <!-- Publikasi Konten -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Publikasi Konten</p>
            <a href="{{ route('perangkat.announcement.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.announcement*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Pengumuman Desa">
                <i data-feather="volume-2" class="mr-2 w-5 h-5"></i>
                <span>Pengumuman Desa</span>
            </a>
            <a href="{{ route('perangkat.article.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.article*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Artikel">
                <i data-feather="file-text" class="mr-2 w-5 h-5"></i>
                <span>Artikel</span>
            </a>
            <a href="{{ route('perangkat.agenda.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.agenda*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Agenda Kegiatan">
                <i data-feather="calendar" class="mr-2 w-5 h-5"></i>
                <span>Agenda Kegiatan</span>
            </a>
            <a href="{{ route('perangkat.gallery.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.gallery*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Galeri / Media">
                <i data-feather="camera" class="mr-2 w-5 h-5"></i>
                <span>Galeri / Media</span>
            </a>
        </div>

        <!-- Layanan Desa -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Tentang Desa</p>
            <a href="{{ route('perangkat.desa.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.desa.index*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Pengajuan Surat">
                <i data-feather="info" class="mr-2 w-5 h-5"></i>
                <span>Profil Desa</span>
            </a>
            <a href="{{ route('perangkat.visi-misi.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.visi-misi.index*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Pengajuan Surat">
                <i data-feather="info" class="mr-2 w-5 h-5"></i>
                <span>Visi & Misi Desa</span>
            </a>
            <a href="{{ route('perangkat.bumd.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.bumd.index*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Pengajuan Surat">
                <i data-feather="info" class="mr-2 w-5 h-5"></i>
                <span>BUMD</span>
            </a>
        </div>

        <!-- Layanan Desa -->
        <div class="mt-5 border-t border-white/30 pt-2">
            <p class="px-4 text-xs uppercase tracking-wide text-white/70 mb-3">Layanan Desa</p>
            <a href="{{ route('pengajuan.perangkat.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('pengajuan.perangkat*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Pengajuan Surat">
                <i data-feather="inbox" class="mr-2 w-5 h-5"></i>
                <span>Pengajuan Surat</span>
            </a>
            <a href="{{ route('perangkat.kependudukan.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.kependudukan.index') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                {{-- Hapus wildcard, hanya index --}} aria-label="Data Kependudukan">
                <i data-feather="users" class="mr-2 w-5 h-5"></i>
                <span>Data Kependudukan</span>
            </a>
            <a href="{{ route('perangkat.kependudukan.mutasi.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.kependudukan.mutasi*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Mutasi Kependudukan">
                <i data-feather="refresh-cw" class="mr-2 w-5 h-5"></i>
                <span>Mutasi Kependudukan</span>
            </a>
            <a href="{{ route('perangkat.villageprofile.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.villageprofile*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Profil Perangkat Desa">
                <i data-feather="user-check" class="mr-2 w-5 h-5"></i>
                <span>Profil Perangkat Desa</span>
            </a>
            <a href="{{ route('perangkat.operationalhours.index') }}"
                class="flex items-center px-4 py-2 rounded-lg transition {{ request()->routeIs('perangkat.operationalhours*') ? 'bg-white text-[#3EB489]' : 'hover:bg-white/10' }}"
                aria-label="Jam Operasional">
                <i data-feather="clock" class="mr-2 w-5 h-5"></i>
                <span>Jam Operasional</span>
            </a>
        </div>
        @endif
    </nav>

    <!-- Logout (Fixed di bawah) -->
    <div class="p-4 border-t border-white/30 flex-shrink-0">
        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin ingin logout?')">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center bg-red-500/90 hover:bg-red-600 py-2 rounded-lg transition font-semibold text-white/90">
                <i data-feather="log-out" class="mr-2 w-5 h-5"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

{{-- Custom Scrollbar Styles --}}
<style>
    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        /* Garis tipis transparan */
        border-radius: 2px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
        /* Sedikit lebih terlihat saat hover */
    }

    /* Sembunyikan scrollbar sepenuhnya jika tidak di-scroll (opsional, tapi tetap fungsional) */
    .custom-scrollbar::-webkit-scrollbar-thumb:vertical:decrement,
    .custom-scrollbar::-webkit-scrollbar-thumb:vertical:increment {
        background: transparent;
    }
</style>

{{-- Feather Icons --}}
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>
