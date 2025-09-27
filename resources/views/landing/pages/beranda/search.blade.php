<section class="nik-search">
    <div class="container">
        <div class="search-header">
            <h2>Cek Status Pengajuan</h2>
            <p>Masukkan NIK Anda untuk melihat status semua pengajuan surat</p>
        </div>

        <div class="search-form">
            <div class="search-input-group">
                <input type="text" id="nikInput" placeholder="Masukkan NIK (16 digit)" maxlength="16">
                <button class="btn btn-search" onclick="searchNik()">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </div>

        <div id="searchResults" class="search-results" style="display: none;">
            <h3>Hasil Pencarian</h3>
            <div id="resultsContainer"></div>
        </div>
    </div>
</section>

<script src="{{ asset('js/nik-search.js') }}"></script>
