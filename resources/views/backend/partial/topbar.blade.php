<header class="bg-white shadow px-6 py-3 flex items-center justify-between sticky top-0 z-50">
    <!-- Left: Page Title -->
    <div class="flex flex-col">
        <span id="pageDayDate" class="text-lg font-semibold text-[#3EB489]"></span>
        <span id="pageTime" class="text-sm text-gray-500"></span>
    </div>

    <!-- Right: Actions -->
    <div class="flex items-center space-x-6 relative">
        <!-- Notification Bell -->
        <div class="relative">
            <button id="notifButton" class="relative p-2 rounded-full hover:bg-gray-100 transition focus:outline-none">
                <i data-feather="bell" class="w-6 h-6 text-gray-600"></i>
                <span id="notifCount"
                    class="absolute -top-1 -right-1 bg-[#007BFF] text-white text-xs font-bold rounded-full px-1.5 shadow">
                    3
                </span>
            </button>

            <!-- Dropdown Notifications -->
            <div id="notifDropdown"
                class="hidden absolute right-0 mt-3 w-80 bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden z-50">
                <div class="px-4 py-2 font-semibold text-gray-700 border-b bg-gray-50">🔔 Notifikasi</div>
                <ul id="notifList" class="max-h-64 overflow-y-auto divide-y text-sm">
                    <li class="px-4 py-3 hover:bg-gray-50 cursor-pointer">📌 Laporan kegiatan baru dari perangkat desa.
                    </li>
                    <li class="px-4 py-3 hover:bg-gray-50 cursor-pointer">📰 Artikel berhasil dipublikasikan.</li>
                    <li class="px-4 py-3 hover:bg-gray-50 cursor-pointer">📅 Jadwal rapat desa besok pukul 09.00.</li>
                </ul>
                <div class="p-2 text-center bg-gray-50">
                    <a href="#" class="text-[#007BFF] text-sm font-medium hover:underline">Lihat semua notifikasi</a>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <!-- <div class="relative">
            <button id="userMenuButton"
                class="flex items-center space-x-2 p-1 rounded-full hover:bg-gray-100 transition focus:outline-none">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=3EB489&color=fff"
                    class="w-10 h-10 rounded-full border-2 border-[#3EB489] shadow-sm" alt="profile">
                <span class="hidden md:block text-sm font-medium text-gray-700">
                    {{ Auth::user()->name ?? 'User' }}
                </span>
                <i data-feather="chevron-down" class="w-4 h-4 text-gray-500"></i>
            </button>

            <div id="userDropdown"
                class="hidden absolute right-0 mt-3 w-52 bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden z-50">
                <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">Profil Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50">Logout</button>
                </form>
            </div>
        </div> -->
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        feather.replace();

        function updateDateTime() {
            const now = new Date();
            const dayOptions = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

            document.getElementById('pageDayDate').textContent = now.toLocaleDateString('id-ID', dayOptions);
            document.getElementById('pageTime').textContent = now.toLocaleTimeString('id-ID', timeOptions);
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    });
</script>