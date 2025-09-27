document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('populationChart');
    if (!canvas) return;

    // Ambil data dari atribut data-population
    const populationData = JSON.parse(canvas.getAttribute('data-population'));

    // Pastikan data ada
    if (!populationData) return;

    const ctx = canvas.getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Penduduk', 'Jumlah KK', 'Laki-laki', 'Perempuan'],
            datasets: [{
                label: `Data Kependudukan ${populationData.tahun}`,
                data: [
                    populationData.jumlah_penduduk,
                    populationData.jumlah_kk,
                    populationData.jumlah_laki,
                    populationData.jumlah_perempuan
                ],
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
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
