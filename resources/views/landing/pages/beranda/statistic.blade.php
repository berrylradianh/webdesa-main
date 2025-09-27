<section class="statistics py-8">
    <div class="container mx-auto px-4">
        <div class="section-header text-center mb-6">
            <h2 class="text-3xl font-bold">Statistik Desa</h2>
            <p class="text-lg text-gray-600">Data terkini pelayanan dan kependudukan</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stat-card bg-white p-6 rounded-lg shadow-md text-center">
                <i class="fas fa-file-text text-3xl text-blue-500 mb-2"></i>
                <h3 class="text-2xl font-semibold">{{ number_format($totalPengajuan) }}</h3>
                <p class="text-gray-600">Total Pengajuan</p>
            </div>
            <div class="stat-card bg-white p-6 rounded-lg shadow-md text-center">
                <i class="fas fa-chart-line text-3xl text-green-500 mb-2"></i>
                <h3 class="text-2xl font-semibold">{{ number_format($disetujui) }}</h3>
                <p class="text-gray-600">Disetujui</p>
            </div>
            <div class="stat-card bg-white p-6 rounded-lg shadow-md text-center">
                <i class="fas fa-clock text-3xl text-yellow-500 mb-2"></i>
                <h3 class="text-2xl font-semibold">{{ number_format($dalamProses) }}</h3>
                <p class="text-gray-600">Dalam Proses</p>
            </div>
            <div class="stat-card bg-white p-6 rounded-lg shadow-md text-center">
                <i class="fas fa-users text-3xl text-purple-500 mb-2"></i>
                <h3 class="text-2xl font-semibold">{{ $dataKependudukan ? number_format($dataKependudukan->jumlah_penduduk) : '0' }}</h3>
                <p class="text-gray-600">Total Penduduk</p>
            </div>
        </div>

        <!-- Population Statistics -->
        <div class="population-stats">
            <div class="pop-card bg-white p-6 rounded-lg shadow-md mx-auto max-w-4xl">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-xl font-semibold">Grafik Kependudukan</h4>
                    <!-- Dropdown untuk memilih tahun -->
                    <form method="GET" action="{{ route('landing.index') }}">
                        <label for="tahun" class="mr-3 text-lg font-medium text-gray-700">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" onchange="this.form.submit()"
                            class="bg-gray-50 border-2 border-blue-300 text-gray-900 text-base rounded-lg
                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block p-2.5
                            transition duration-300 ease-in-out hover:border-blue-400 hover:bg-blue-50
                            shadow-sm w-40">
                            @foreach ($availableYears as $year)
                            <option value="{{ $year }}" {{ $dataKependudukan && $dataKependudukan->tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @if ($dataKependudukan)
                <canvas id="populationChart"
                    style="width: 100%; max-height: 500px;"
                    data-population='{{ json_encode([
                            "tahun" => $dataKependudukan->tahun,
                            "jumlah_penduduk" => $dataKependudukan->jumlah_penduduk,
                            "jumlah_kk" => $dataKependudukan->jumlah_kk,
                            "jumlah_laki" => $dataKependudukan->jumlah_laki,
                            "jumlah_perempuan" => $dataKependudukan->jumlah_perempuan
                        ]) }}'></canvas>
                @else
                <p class="text-red-500">Tidak ada data untuk ditampilkan dalam grafik.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('populationChart');
        if (!canvas) return;

        // Ambil data dari atribut data-population
        const populationData = JSON.parse(canvas.getAttribute('data-population'));

        // Pastikan data ada
        if (!populationData) return;

        // Data contoh: 2000, 1500, 1000, 500
        const dataValues = [
            populationData.jumlah_penduduk,
            populationData.jumlah_kk,
            populationData.jumlah_laki,
            populationData.jumlah_perempuan
        ];

        // Hitung nilai maksimum dari data
        const maxData = Math.max(...dataValues);
        const suggestedMax = maxData * 1.1; // Tambah 10% margin di atas nilai maksimum

        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Penduduk', 'Jumlah KK', 'Laki-laki', 'Perempuan'],
                datasets: [{
                    label: `Data Kependudukan ${populationData.tahun}`,
                    data: dataValues,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 205, 86, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: suggestedMax, // Skala maksimum dengan margin
                        title: {
                            display: true,
                            text: 'Jumlah'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Kategori'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: `Statistik Kependudukan Tahun ${populationData.tahun}`
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 10
                }
            }
        });
    });
</script>
