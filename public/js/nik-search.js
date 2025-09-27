function searchNik() {
    const nikInput = document.getElementById('nikInput');
    const nik = nikInput.value.trim();
    const resultsContainer = document.getElementById('resultsContainer');
    const searchResults = document.getElementById('searchResults');

    // Validate input
    if (!nik) {
        alert('Masukkan NIK terlebih dahulu!');
        return;
    }

    if (nik.length !== 16) {
        alert('NIK harus 16 digit!');
        return;
    }

    // Show loading state
    resultsContainer.innerHTML = '<div class="loading"></div>';

    // Make AJAX request
    fetch('/search-nik', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ nik: nik }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                displaySearchResults(data.data);
            } else {
                alert(data.message || 'Terjadi kesalahan saat mencari data.');
                resultsContainer.innerHTML = `
                    <div class="result-item">
                        <div class="result-info">
                            <h4>Terjadi Kesalahan</h4>
                            <p>${data.message || 'Silakan coba lagi nanti.'}</p>
                        </div>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghubungi server. Silakan coba lagi.');
            resultsContainer.innerHTML = `
                <div class="result-item">
                    <div class="result-info">
                        <h4>Terjadi Kesalahan</h4>
                        <p>Silakan coba lagi nanti.</p>
                    </div>
                </div>
            `;
        });

    function displaySearchResults(results) {
        if (results.length === 0) {
            resultsContainer.innerHTML = `
                <div class="result-item">
                    <div class="result-info">
                        <h4>Tidak ada pengajuan ditemukan</h4>
                        <p>Tidak ada data pengajuan untuk NIK tersebut.</p>
                    </div>
                </div>
            `;
        } else {
            resultsContainer.innerHTML = results.map(result => `
                <div class="result-item">
                    <div class="result-info">
                        <h4>${result.service}</h4>
                        <p>ID: ${result.id}</p>
                        <p>Diajukan: ${formatDate(result.submission_date)}</p>
                        ${result.completion_date ? `<p>Selesai: ${formatDate(result.completion_date)}</p>` : ''}
                        ${result.rejection_reason ? `<p style="color: #dc2626;">Alasan: ${result.rejection_reason}</p>` : ''}
                    </div>
                    <div class="status-badge status-${result.status.toLowerCase().replace(' ', '-')}">${result.status}</div>
                </div>
            `).join('');
        }

        searchResults.style.display = 'block';
        searchResults.scrollIntoView({ behavior: 'smooth' });
    }

    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    }
}
