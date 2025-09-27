// Mock Data for Village Website
const mockData = {
    villageInfo: {
        name: "DesaInovatif",
        code: "3301012001",
        address: "Jl. Raya Desa No. 123, Kec. Makmur, Kab. Sejahtera",
        phone: "(0274) 123456",
        email: "desa@sejahteramakmur.go.id",
        website: "www.sejahteramakmur-desa.go.id"
    },

    villageProfile: {
        history: "DesaInovatif didirikan pada tahun 1945 dan telah berkembang menjadi desa yang modern dengan tetap mempertahankan nilai-nilai tradisional. Desa ini memiliki potensi alam yang luar biasa dan masyarakat yang gotong royong.",
        area: "15.5 km²",
        population: 8542,
        households: 2156,
        rw: 8,
        rt: 24,
        vision: "Mewujudkan DesaInovatif yang mandiri, sejahtera, dan berkeadilan",
        mission: [
            "Meningkatkan kualitas pelayanan publik",
            "Mengembangkan potensi ekonomi desa",
            "Memperkuat gotong royong masyarakat",
            "Melestarikan budaya lokal"
        ]
    },

    organizationStructure: [
        { position: "Kepala Desa", name: "H. Budi Santoso", phone: "081234567890" },
        { position: "Sekretaris Desa", name: "Siti Aminah, S.AP", phone: "081234567891" },
        { position: "Kasi Pemerintahan", name: "Ahmad Wijaya", phone: "081234567892" },
        { position: "Kasi Pelayanan", name: "Dewi Sartika", phone: "081234567893" },
        { position: "Kasi Kesejahteraan", name: "Joko Susanto", phone: "081234567894" },
        { position: "Kaur Keuangan", name: "Rina Marlina", phone: "081234567895" }
    ],

    services: [
        {
            id: "ktp",
            name: "Pengurusan KTP",
            requirements: ["Fotocopy KK", "Pas foto 3x4", "Surat keterangan RT/RW"],
            fee: 0,
            processing_time: "3 hari kerja"
        },
        {
            id: "kk",
            name: "Pengurusan KK",
            requirements: ["Fotocopy KTP", "Akta nikah/cerai", "Surat keterangan RT/RW"],
            fee: 0,
            processing_time: "5 hari kerja"
        },
        {
            id: "akta_lahir",
            name: "Akta Kelahiran",
            requirements: ["Surat keterangan lahir dari bidan/dokter", "Fotocopy KTP orang tua", "Fotocopy KK"],
            fee: 0,
            processing_time: "7 hari kerja"
        },
        {
            id: "surat_domisili",
            name: "Surat Keterangan Domisili",
            requirements: ["Fotocopy KTP", "Surat keterangan RT/RW"],
            fee: 5000,
            processing_time: "1 hari kerja"
        },
        {
            id: "surat_usaha",
            name: "Surat Keterangan Usaha",
            requirements: ["Fotocopy KTP", "Foto tempat usaha", "Surat keterangan RT/RW"],
            fee: 10000,
            processing_time: "2 hari kerja"
        },
        {
            id: "surat_nikah",
            name: "Surat Keterangan Belum Menikah",
            requirements: ["Fotocopy KTP", "Surat keterangan RT/RW"],
            fee: 5000,
            processing_time: "1 hari kerja"
        }
    ],

    mockApplications: [
        { id: "APP001", nik: "3301012001010001", service: "Pengurusan KTP", status: "Selesai", submission_date: "2024-01-15", completion_date: "2024-01-18" },
        { id: "APP002", nik: "3301012001010001", service: "Surat Domisili", status: "Proses Verifikasi", submission_date: "2024-01-20", completion_date: null },
        { id: "APP003", nik: "3301012001010002", service: "Akta Kelahiran", status: "Ditolak", submission_date: "2024-01-10", completion_date: "2024-01-12", rejection_reason: "Dokumen tidak lengkap" },
        { id: "APP004", nik: "3301012001010003", service: "Surat Usaha", status: "Selesai", submission_date: "2024-01-12", completion_date: "2024-01-14" }
    ],

    news: [
        {
            id: 1,
            title: "Program Bantuan Pangan Non Tunai Tahun 2024",
            excerpt: "Pemerintah desa mengumumkan pembagian kartu bantuan pangan untuk keluarga kurang mampu",
            content: "Program Bantuan Pangan Non Tunai (BPNT) tahun 2024 akan segera dimulai. Program ini ditujukan untuk membantu keluarga kurang mampu dalam memenuhi kebutuhan pangan sehari-hari. Setiap keluarga penerima akan mendapat bantuan senilai Rp 200.000 per bulan yang dapat digunakan untuk membeli beras dan telur di e-warung terdekat.",
            date: "2024-01-20",
            category: "Pengumuman"
        },
        {
            id: 2,
            title: "Gotong Royong Bersih Desa",
            excerpt: "Kegiatan gotong royong membersihkan lingkungan desa akan dilaksanakan setiap Minggu",
            content: "Dalam upaya menjaga kebersihan dan keindahan lingkungan desa, pemerintah desa mengajak seluruh masyarakat untuk berpartisipasi dalam kegiatan gotong royong yang akan dilaksanakan setiap hari Minggu pagi. Kegiatan ini meliputi pembersihan jalan, saluran air, dan fasilitas umum.",
            date: "2024-01-18",
            category: "Kegiatan"
        },
        {
            id: 3,
            title: "Pembukaan Pendaftaran PKH 2024",
            excerpt: "Program Keluarga Harapan tahun 2024 dibuka untuk keluarga yang memenuhi kriteria",
            content: "Pendaftaran Program Keluarga Harapan (PKH) tahun 2024 telah dibuka. Program ini ditujukan untuk keluarga sangat miskin yang memiliki komponen kesehatan dan pendidikan. Bantuan diberikan kepada keluarga yang memenuhi persyaratan dan komitmen untuk menggunakan layanan kesehatan dan pendidikan.",
            date: "2024-01-15",
            category: "Program"
        }
    ],

    events: [
        { id: 1, title: "Rapat Koordinasi RT/RW", date: "2024-02-05", time: "19.00 WIB", location: "Balai Desa" },
        { id: 2, title: "Posyandu Balita", date: "2024-02-10", time: "08.00 WIB", location: "Posyandu Melati" },
        { id: 3, title: "Pelatihan UMKM", date: "2024-02-15", time: "13.00 WIB", location: "Aula Desa" }
    ],

    gallery: [
        { id: 1, title: "Kegiatan Posyandu", image: "https://via.placeholder.com/300x200/16a34a/ffffff?text=Posyandu", date: "2024-01-15" },
        { id: 2, title: "Gotong Royong", image: "https://via.placeholder.com/300x200/16a34a/ffffff?text=Gotong+Royong", date: "2024-01-10" },
        { id: 3, title: "Pelatihan UMKM", image: "https://via.placeholder.com/300x200/16a34a/ffffff?text=Pelatihan+UMKM", date: "2024-01-05" },
        { id: 4, title: "Rapat Koordinasi", image: "https://via.placeholder.com/300x200/16a34a/ffffff?text=Rapat", date: "2024-01-01" }
    ],

    faq: [
        {
            question: "Bagaimana cara mengurus surat domisili?",
            answer: "Untuk mengurus surat domisili, Anda perlu membawa fotocopy KTP dan surat keterangan RT/RW. Proses pengerjaan 1 hari kerja dengan biaya Rp 5.000."
        },
        {
            question: "Apa saja syarat membuat KTP baru?",
            answer: "Syarat membuat KTP baru: fotocopy KK, pas foto 3x4, dan surat keterangan RT/RW. Tidak ada biaya alias gratis."
        },
        {
            question: "Bagaimana cara cek status pengajuan surat?",
            answer: "Anda bisa cek status pengajuan melalui menu 'Cek Status' di website ini dengan memasukkan NIK Anda."
        },
        {
            question: "Jam operasional pelayanan desa?",
            answer: "Pelayanan desa buka Senin-Jumat pukul 08.00-15.00 WIB, Sabtu pukul 08.00-12.00 WIB, dan tutup pada hari Minggu."
        }
    ],

    polls: [
        {
            id: 1,
            title: "Prioritas Pembangunan 2024",
            question: "Manakah yang menjadi prioritas pembangunan desa tahun 2024?",
            options: [
                { id: "a", text: "Perbaikan jalan desa", votes: 45 },
                { id: "b", text: "Pembangunan fasilitas kesehatan", votes: 67 },
                { id: "c", text: "Pengembangan wisata desa", votes: 23 },
                { id: "d", text: "Program ekonomi kreatif", votes: 31 }
            ],
            active: true
        }
    ]
};

// Global Variables
let currentPage = 'beranda';
let selectedService = null;
let submittedComplaints = [];
let pollVotes = {};

// Navigation Functions
function showPage(pageId) {
    // Hide all pages
    document.querySelectorAll('.page').forEach(page => {
        page.classList.remove('active');
    });

    // Show selected page
    document.getElementById(pageId).classList.add('active');

    // Update navigation
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });

    document.querySelector(`[onclick="showPage('${pageId}')"]`).classList.add('active');

    // Load page content
    loadPageContent(pageId);

    currentPage = pageId;

    // Close mobile menu if open
    closeMobileMenu();

    // Scroll to top
    window.scrollTo(0, 0);
}

function toggleMobileMenu() {
    const mobileNav = document.getElementById('mobileNav');
    mobileNav.classList.toggle('active');
}

function closeMobileMenu() {
    const mobileNav = document.getElementById('mobileNav');
    mobileNav.classList.remove('active');
}

// NIK Search Function
function searchNIK() {
    const nikInput = document.getElementById('nikInput');
    const nik = nikInput.value.trim();

    if (!nik) {
        alert('Masukkan NIK terlebih dahulu!');
        return;
    }

    if (nik.length !== 16) {
        alert('NIK harus 16 digit!');
        return;
    }

    // Show loading state
    const resultsContainer = document.getElementById('resultsContainer');
    resultsContainer.innerHTML = '<div class="loading"></div>';

    // Make AJAX request
    fetch('/search-nik', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ nikInput: nik }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displaySearchResults(data.data);
            } else {
                alert('Terjadi kesalahan saat mencari data.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghubungi server.');
        });
}

function displaySearchResults(results) {
    const searchResults = document.getElementById('searchResults');
    const resultsContainer = document.getElementById('resultsContainer');

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

// Page Content Loaders
function loadPageContent(pageId) {
    const pageElement = document.getElementById(pageId);

    switch(pageId) {
        case 'tentang':
            loadAboutPage(pageElement);
            break;
        case 'layanan':
            loadServicesPage(pageElement);
            break;
        case 'informasi':
            loadInformationPage(pageElement);
            break;
        case 'partisipasi':
            loadParticipationPage(pageElement);
            break;
    }
}

function loadAboutPage(container) {
    container.innerHTML = `
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Tentang Desa</h1>
                    <p class="hero-subtitle">Profil lengkap dan sejarah ${mockData.villageInfo.name}</p>
                </div>
            </div>
        </section>

        <section style="padding: 60px 0; background: #f8fafc;">
            <div class="container">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 60px;">
                    <div>
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                            <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-map-marker-alt"></i> Profil Desa
                            </h3>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                <div><strong>Nama Desa:</strong><br>${mockData.villageInfo.name}</div>
                                <div><strong>Kode Desa:</strong><br>${mockData.villageInfo.code}</div>
                                <div><strong>Luas Wilayah:</strong><br>${mockData.villageProfile.area}</div>
                                <div><strong>Jumlah Penduduk:</strong><br>${mockData.villageProfile.population.toLocaleString()} jiwa</div>
                                <div><strong>Jumlah KK:</strong><br>${mockData.villageProfile.households.toLocaleString()} KK</div>
                                <div><strong>Jumlah RW/RT:</strong><br>${mockData.villageProfile.rw} RW / ${mockData.villageProfile.rt} RT</div>
                            </div>
                        </div>

                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-calendar-alt"></i> Sejarah Desa
                            </h3>
                            <p style="color: #666; line-height: 1.7;">${mockData.villageProfile.history}</p>
                        </div>
                    </div>

                    <div>
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                            <h3 style="margin-bottom: 15px;">Peta Desa</h3>
                            <div style="aspect-ratio: 16/9; background: #f3f4f6; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                                <img src="https://via.placeholder.com/600x400/16a34a/ffffff?text=PETA+DESA" alt="Peta Desa" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                            </div>
                            <p style="color: #666; font-size: 14px;">Peta wilayah administratif ${mockData.villageInfo.name}</p>
                        </div>

                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-bullseye"></i> Visi & Misi
                            </h3>
                            <div style="margin-bottom: 25px;">
                                <h4 style="margin-bottom: 10px;">Visi</h4>
                                <p style="color: #666; font-style: italic;">${mockData.villageProfile.vision}</p>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 10px;">Misi</h4>
                                <ul style="list-style: none; padding: 0;">
                                    ${mockData.villageProfile.mission.map(item => `
                                        <li style="display: flex; align-items: flex-start; margin-bottom: 8px;">
                                            <span style="width: 8px; height: 8px; background: #16a34a; border-radius: 50%; margin-top: 8px; margin-right: 12px; flex-shrink: 0;"></span>
                                            <span style="color: #666;">${item}</span>
                                        </li>
                                    `).join('')}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div class="section-header">
                        <h2>Struktur Organisasi</h2>
                        <p>Pimpinan dan aparatur pemerintah desa</p>
                    </div>

                    <div class="org-grid">
                        ${mockData.organizationStructure.map((person, index) => `
                            <div class="org-card">
                                <img src="https://via.placeholder.com/150x150/16a34a/ffffff?text=${person.name.split(' ')[0]}" alt="${person.name}">
                                <h3>${person.name}</h3>
                                <p class="position">${person.position}</p>
                                <div class="contact">
                                    <i class="fas fa-phone"></i>
                                    <span>${person.phone}</span>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        </section>
    `;
}

function loadServicesPage(container) {
    container.innerHTML = `
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Layanan Online</h1>
                    <p class="hero-subtitle">Ajukan dan pantau status dokumen Anda dengan mudah</p>
                </div>
            </div>
        </section>

        <section style="padding: 60px 0; background: #f8fafc;">
            <div class="container">
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
                    <!-- Service Application -->
                    <div id="serviceApplication">
                        ${getServiceApplicationHTML()}
                    </div>

                    <!-- Sidebar -->
                    <div>
                        <!-- Status Check -->
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                            <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-search"></i> Cek Status
                            </h3>
                            <div style="margin-bottom: 15px;">
                                <input type="text" id="serviceNikInput" placeholder="Masukkan NIK" style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                                <button class="btn btn-search" style="width: 100%;" onclick="checkServiceStatus()">Cek Status</button>
                            </div>
                            <div id="serviceSearchResults" style="display: none;"></div>
                        </div>

                        <!-- Download Templates -->
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                            <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-download"></i> Download Template
                            </h3>
                            <div style="display: flex; flex-direction: column; gap: 10px;">
                                <button class="btn" style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb; justify-content: flex-start;">
                                    <i class="fas fa-file-text"></i> Formulir KTP
                                </button>
                                <button class="btn" style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb; justify-content: flex-start;">
                                    <i class="fas fa-file-text"></i> Formulir KK
                                </button>
                                <button class="btn" style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb; justify-content: flex-start;">
                                    <i class="fas fa-file-text"></i> Formulir Domisili
                                </button>
                                <button class="btn" style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb; justify-content: flex-start;">
                                    <i class="fas fa-file-text"></i> Formulir Usaha
                                </button>
                            </div>
                        </div>

                        <!-- Service Info -->
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h3 style="margin-bottom: 15px;">Informasi Layanan</h3>
                            <div style="color: #666; font-size: 14px;">
                                <p><strong>Jam Operasional:</strong></p>
                                <p>Senin - Jumat: 08.00 - 15.00</p>
                                <p>Sabtu: 08.00 - 12.00</p>
                                <p style="color: #dc2626;">Minggu: Tutup</p>

                                <div style="margin-top: 20px;">
                                    <p><strong>Kontak:</strong></p>
                                    <p>Telepon: (0274) 123456</p>
                                    <p>WhatsApp: 081234567890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    `;
}

function getServiceApplicationHTML() {
    if (!selectedService) {
        return `
            <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-file-text"></i> Ajukan Layanan Dokumen
                </h3>
                <p style="color: #666; margin-bottom: 30px;">Pilih jenis layanan yang Anda butuhkan:</p>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                    ${mockData.services.map(service => `
                        <div class="service-option" onclick="selectService('${service.id}')" style="border: 2px solid #e5e7eb; padding: 20px; border-radius: 12px; cursor: pointer; transition: all 0.3s ease;">
                            <h4 style="margin-bottom: 15px; color: #333;">${service.name}</h4>
                            <div style="font-size: 14px; color: #666;">
                                <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                    <i class="fas fa-clock" style="margin-right: 8px;"></i>
                                    ${service.processing_time}
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <i class="fas fa-dollar-sign" style="margin-right: 8px;"></i>
                                    ${service.fee === 0 ? 'Gratis' : `Rp ${service.fee.toLocaleString()}`}
                                </div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
    } else {
        const service = mockData.services.find(s => s.id === selectedService);
        return `
            <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-file-text"></i> ${service.name}
                </h3>

                <div style="background: #f0fdf4; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                    <h4 style="color: #16a34a; margin-bottom: 15px;">${service.name}</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; font-size: 14px;">
                        <div><strong>Waktu proses:</strong> ${service.processing_time}</div>
                        <div><strong>Biaya:</strong> ${service.fee === 0 ? 'Gratis' : `Rp ${service.fee.toLocaleString()}`}</div>
                    </div>
                </div>

                <div style="margin-bottom: 30px;">
                    <h4 style="margin-bottom: 15px;">Persyaratan:</h4>
                    <ul style="list-style: none; padding: 0;">
                        ${service.requirements.map(req => `
                            <li style="display: flex; align-items: center; margin-bottom: 8px; color: #666;">
                                <i class="fas fa-check-circle" style="color: #16a34a; margin-right: 10px;"></i>
                                ${req}
                            </li>
                        `).join('')}
                    </ul>
                </div>

                <form onsubmit="submitServiceApplication(event)" style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">NIK</label>
                            <input type="text" name="nik" placeholder="16 digit NIK" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Nama sesuai KTP" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                        </div>
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Alamat</label>
                        <textarea name="address" placeholder="Alamat lengkap" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; min-height: 100px; resize: vertical;"></textarea>
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">No. Telepon/WhatsApp</label>
                        <input type="tel" name="phone" placeholder="08xxxxxxxxxx" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Catatan (Opsional)</label>
                        <textarea name="notes" placeholder="Catatan tambahan jika ada" style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; min-height: 80px; resize: vertical;"></textarea>
                    </div>

                    <div style="border: 2px dashed #d1d5db; padding: 30px; border-radius: 8px; text-align: center; background: #f9fafb;">
                        <i class="fas fa-upload" style="font-size: 2rem; color: #9ca3af; margin-bottom: 15px;"></i>
                        <p style="color: #666; margin-bottom: 10px;">Upload dokumen persyaratan</p>
                        <p style="color: #9ca3af; font-size: 14px; margin-bottom: 15px;">Drag & drop file atau klik untuk memilih</p>
                        <button type="button" class="btn" style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb;">Pilih File</button>
                    </div>

                    <div style="display: flex; gap: 15px;">
                        <button type="button" class="btn" onclick="clearSelectedService()" style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb;">
                            Kembali
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Kirim Pengajuan
                        </button>
                    </div>
                </form>
            </div>
        `;
    }
}

function selectService(serviceId) {
    selectedService = serviceId;
    loadServicesPage(document.getElementById('layanan'));

    // Add hover effect to service options
    document.querySelectorAll('.service-option').forEach(option => {
        option.addEventListener('mouseenter', function() {
            this.style.borderColor = '#16a34a';
            this.style.backgroundColor = '#f0fdf4';
        });
        option.addEventListener('mouseleave', function() {
            this.style.borderColor = '#e5e7eb';
            this.style.backgroundColor = 'white';
        });
    });
}

function clearSelectedService() {
    selectedService = null;
    loadServicesPage(document.getElementById('layanan'));
}

function submitServiceApplication(event) {
    event.preventDefault();

    // Simulate form submission
    const submitButton = event.target.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;

    submitButton.innerHTML = '<div class="loading"></div> Mengirim...';
    submitButton.disabled = true;

    setTimeout(() => {
        alert('Pengajuan berhasil dikirim! Anda akan mendapat konfirmasi melalui SMS/WhatsApp.');
        clearSelectedService();
    }, 2000);
}

function checkServiceStatus() {
    const nik = document.getElementById('serviceNikInput').value.trim();

    if (!nik) {
        alert('Masukkan NIK terlebih dahulu!');
        return;
    }

    const results = mockData.mockApplications.filter(app => app.nik === nik);
    const resultsContainer = document.getElementById('serviceSearchResults');

    if (results.length === 0) {
        resultsContainer.innerHTML = `
            <div style="padding: 15px; border: 1px solid #e5e7eb; border-radius: 8px; margin-top: 15px;">
                <p style="color: #666; font-size: 14px; margin: 0;">Tidak ada pengajuan ditemukan untuk NIK tersebut.</p>
            </div>
        `;
    } else {
        resultsContainer.innerHTML = `
            <h4 style="margin: 15px 0 10px 0; font-size: 14px;">Hasil Pencarian:</h4>
            ${results.map(app => `
                <div style="padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 10px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <h5 style="font-size: 13px; margin: 0; font-weight: 600;">${app.service}</h5>
                        <div class="status-badge status-${app.status.toLowerCase().replace(' ', '-')}" style="font-size: 10px; padding: 4px 8px;">${app.status}</div>
                    </div>
                    <p style="font-size: 11px; color: #666; margin: 0;">ID: ${app.id}</p>
                    <p style="font-size: 11px; color: #666; margin: 0;">${formatDate(app.submission_date)}</p>
                </div>
            `).join('')}
        `;
    }

    resultsContainer.style.display = 'block';
}

function loadInformationPage(container) {
    container.innerHTML = `
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Informasi Desa</h1>
                    <p class="hero-subtitle">Berita, pengumuman, agenda, dan galeri kegiatan desa</p>
                </div>
            </div>
        </section>

        <section style="padding: 60px 0; background: #f8fafc;">
            <div class="container">
                <!-- Tab Navigation -->
                <div style="display: flex; justify-content: center; margin-bottom: 40px; background: white; padding: 8px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <button class="tab-btn active" onclick="showInfoTab('news')" style="padding: 12px 24px; border: none; background: #16a34a; color: white; border-radius: 8px; margin: 0 4px; cursor: pointer; font-weight: 500;">Berita</button>
                    <button class="tab-btn" onclick="showInfoTab('announcements')" style="padding: 12px 24px; border: none; background: transparent; color: #666; border-radius: 8px; margin: 0 4px; cursor: pointer; font-weight: 500;">Pengumuman</button>
                    <button class="tab-btn" onclick="showInfoTab('agenda')" style="padding: 12px 24px; border: none; background: transparent; color: #666; border-radius: 8px; margin: 0 4px; cursor: pointer; font-weight: 500;">Agenda</button>
                    <button class="tab-btn" onclick="showInfoTab('gallery')" style="padding: 12px 24px; border: none; background: transparent; color: #666; border-radius: 8px; margin: 0 4px; cursor: pointer; font-weight: 500;">Galeri</button>
                </div>

                <!-- Tab Content -->
                <div id="infoTabContent">
                    ${getNewsTabContent()}
                </div>
            </div>
        </section>
    `;
}

function showInfoTab(tabName) {
    // Update tab buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.style.background = 'transparent';
        btn.style.color = '#666';
    });

    event.target.style.background = '#16a34a';
    event.target.style.color = 'white';

    // Update content
    const contentContainer = document.getElementById('infoTabContent');

    switch(tabName) {
        case 'news':
            contentContainer.innerHTML = getNewsTabContent();
            break;
        case 'announcements':
            contentContainer.innerHTML = getAnnouncementsTabContent();
            break;
        case 'agenda':
            contentContainer.innerHTML = getAgendaTabContent();
            break;
        case 'gallery':
            contentContainer.innerHTML = getGalleryTabContent();
            break;
    }
}

function getNewsTabContent() {
    return `
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <div>
                ${mockData.news.map(article => `
                    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px; overflow: hidden;">
                        <div style="display: flex; flex-direction: column;">
                            <img src="https://via.placeholder.com/600x300/16a34a/ffffff?text=${encodeURIComponent(article.title)}" alt="${article.title}" style="width: 100%; height: 250px; object-fit: cover;">
                            <div style="padding: 30px;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <div class="status-badge" style="background: #f0fdf4; color: #16a34a;">${article.category}</div>
                                    <div style="display: flex; align-items: center; color: #666; font-size: 14px;">
                                        <i class="fas fa-calendar" style="margin-right: 5px;"></i>
                                        ${formatDate(article.date)}
                                    </div>
                                </div>
                                <h3 style="margin-bottom: 15px; color: #333;">${article.title}</h3>
                                <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">${article.excerpt}</p>
                                <button class="btn btn-primary" onclick="showArticleModal('${article.id}')">
                                    Baca Selengkapnya <i class="fas fa-chevron-right" style="margin-left: 8px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('')}
            </div>

            <!-- Sidebar -->
            <div>
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="margin-bottom: 20px;">Berita Terbaru</h3>
                    ${mockData.news.slice(0, 3).map(article => `
                        <div style="display: flex; gap: 15px; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #f3f4f6;">
                            <img src="https://via.placeholder.com/80x80/16a34a/ffffff?text=IMG" alt="${article.title}" style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover;">
                            <div>
                                <h4 style="font-size: 14px; margin-bottom: 5px; color: #333; line-height: 1.3;">${article.title}</h4>
                                <p style="font-size: 12px; color: #666; margin: 0;">${formatDate(article.date)}</p>
                            </div>
                        </div>
                    `).join('')}
                </div>

                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <h3 style="margin-bottom: 20px;">Kategori</h3>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px;">Pengumuman</span>
                            <div class="status-badge" style="background: #f3f4f6; color: #666; font-size: 12px;">5</div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px;">Kegiatan</span>
                            <div class="status-badge" style="background: #f3f4f6; color: #666; font-size: 12px;">8</div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px;">Program</span>
                            <div class="status-badge" style="background: #f3f4f6; color: #666; font-size: 12px;">3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function getAnnouncementsTabContent() {
    return `
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 25px;">
            ${mockData.news.filter(item => item.category === 'Pengumuman').map(announcement => `
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: flex-start; gap: 20px;">
                        <i class="fas fa-megaphone" style="font-size: 1.5rem; color: #dc2626; margin-top: 5px;"></i>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                <div class="status-badge" style="background: #fee2e2; color: #dc2626;">PENGUMUMAN</div>
                                <span style="font-size: 14px; color: #666;">${formatDate(announcement.date)}</span>
                            </div>
                            <h3 style="margin-bottom: 15px; color: #333;">${announcement.title}</h3>
                            <p style="color: #666; line-height: 1.6;">${announcement.excerpt}</p>
                        </div>
                    </div>
                </div>
            `).join('')}
        </div>
    `;
}

function getAgendaTabContent() {
    return `
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 25px;">
            ${mockData.events.map(event => `
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div style="display: inline-flex; align-items: center; justify-content: center; width: 80px; height: 80px; background: #f0fdf4; border-radius: 50%; margin-bottom: 20px;">
                        <i class="fas fa-calendar-alt" style="font-size: 2rem; color: #16a34a;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; color: #333;">${event.title}</h3>
                    <div style="color: #666; font-size: 14px;">
                        <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 8px;">
                            <i class="fas fa-calendar" style="margin-right: 8px;"></i>
                            <span>${formatDate(event.date)}</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 8px;">
                            <i class="fas fa-clock" style="margin-right: 8px;"></i>
                            <span>${event.time}</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>
                            <span>${event.location}</span>
                        </div>
                    </div>
                </div>
            `).join('')}
        </div>
    `;
}

function getGalleryTabContent() {
    return `
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
            ${mockData.gallery.map(item => `
                <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden; cursor: pointer;" onclick="showImageModal('${item.image}', '${item.title}')">
                    <img src="${item.image}" alt="${item.title}" style="width: 100%; height: 200px; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="padding: 20px;">
                        <h3 style="margin-bottom: 8px; color: #333; font-size: 16px;">${item.title}</h3>
                        <div style="display: flex; align-items: center; color: #666; font-size: 14px;">
                            <i class="fas fa-calendar" style="margin-right: 5px;"></i>
                            ${formatDate(item.date)}
                        </div>
                    </div>
                </div>
            `).join('')}
        </div>
    `;
}

function loadParticipationPage(container) {
    container.innerHTML = `
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Aspirasi & Partisipasi</h1>
                    <p class="hero-subtitle">Sampaikan aspirasi dan berpartisipasi dalam pembangunan desa</p>
                </div>
            </div>
        </section>

        <section style="padding: 60px 0; background: #f8fafc;">
            <div class="container">
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
                    <!-- Main Content -->
                    <div>
                        <!-- Complaint Form -->
                        <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 40px;">
                            <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-comment-dots"></i> Kirim Pengaduan/Aspirasi
                            </h3>

                            <form onsubmit="submitComplaint(event)" style="display: flex; flex-direction: column; gap: 20px;">
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                    <div>
                                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Lengkap</label>
                                        <input type="text" name="name" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                    </div>
                                    <div>
                                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">NIK</label>
                                        <input type="text" name="nik" placeholder="16 digit NIK" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                    </div>
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                    <div>
                                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">No. Telepon</label>
                                        <input type="tel" name="phone" placeholder="08xxxxxxxxxx" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                    </div>
                                    <div>
                                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Kategori</label>
                                        <select name="category" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                            <option value="">Pilih kategori</option>
                                            <option value="Pelayanan Administrasi">Pelayanan Administrasi</option>
                                            <option value="Infrastruktur">Infrastruktur</option>
                                            <option value="Kebersihan">Kebersihan</option>
                                            <option value="Keamanan">Keamanan</option>
                                            <option value="Kesehatan">Kesehatan</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 5px; font-weight: 500;">Judul Pengaduan</label>
                                    <input type="text" name="subject" placeholder="Ringkasan singkat masalah" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 5px; font-weight: 500;">Deskripsi Detail</label>
                                    <textarea name="description" placeholder="Jelaskan masalah/aspirasi Anda secara detail" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; min-height: 120px; resize: vertical;"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                                    Kirim Pengaduan
                                </button>
                            </form>
                        </div>

                        <!-- Polling Section -->
                        <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 40px;">
                            <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-vote-yea"></i> Polling & Survei
                            </h3>

                            ${mockData.polls.map(poll => `
                                <div style="margin-bottom: 30px;">
                                    <h4 style="margin-bottom: 10px; color: #333;">${poll.title}</h4>
                                    <p style="color: #666; margin-bottom: 20px;">${poll.question}</p>

                                    <div id="poll-${poll.id}" style="display: flex; flex-direction: column; gap: 15px;">
                                        ${poll.options.map(option => {
                                            const totalVotes = poll.options.reduce((sum, opt) => sum + opt.votes, 0);
                                            const percentage = totalVotes > 0 ? Math.round((option.votes / totalVotes) * 100) : 0;

                                            return `
                                                <div>
                                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                                                        <span style="font-size: 14px; font-weight: 500;">${option.text}</span>
                                                        <span style="font-size: 14px; color: #666;">${percentage}% (${option.votes})</span>
                                                    </div>
                                                    <div style="width: 100%; height: 8px; background: #e5e7eb; border-radius: 4px; overflow: hidden;">
                                                        <div style="width: ${percentage}%; height: 100%; background: #16a34a; border-radius: 4px; transition: width 0.3s ease;"></div>
                                                    </div>
                                                </div>
                                            `;
                                        }).join('')}

                                        <p style="font-size: 14px; color: #666; margin-top: 10px;">
                                            Total partisipasi: ${poll.options.reduce((sum, opt) => sum + opt.votes, 0)} suara
                                        </p>
                                    </div>
                                </div>
                            `).join('')}
                        </div>

                        <!-- FAQ Section -->
                        <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-question-circle"></i> Pertanyaan yang Sering Diajukan (FAQ)
                            </h3>

                            <div style="display: flex; flex-direction: column; gap: 15px;">
                                ${mockData.faq.map((item, index) => `
                                    <div style="border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
                                        <button onclick="toggleFAQ(${index})" style="width: 100%; padding: 20px; background: white; border: none; text-align: left; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 500;">
                                            <span>${item.question}</span>
                                            <i class="fas fa-chevron-down" id="faq-icon-${index}" style="transition: transform 0.3s ease;"></i>
                                        </button>
                                        <div id="faq-answer-${index}" style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease;">
                                            <div style="padding: 20px; border-top: 1px solid #f3f4f6; background: #f9fafb; color: #666;">
                                                ${item.answer}
                                            </div>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div>
                        ${submittedComplaints.length > 0 ? `
                            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                                <h3 style="margin-bottom: 20px;">Riwayat Pengaduan</h3>
                                ${submittedComplaints.slice(0, 3).map(complaint => `
                                    <div style="padding: 15px; border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                                            <h4 style="font-size: 14px; margin: 0; font-weight: 600;">${complaint.subject}</h4>
                                            <div class="status-badge status-${complaint.status.toLowerCase()}">${complaint.status}</div>
                                        </div>
                                        <p style="font-size: 12px; color: #666; margin: 0;">ID: ${complaint.id}</p>
                                        <p style="font-size: 12px; color: #666; margin: 0;">${formatDate(complaint.date)}</p>
                                    </div>
                                `).join('')}
                            </div>
                        ` : ''}

                        <!-- Participation Stats -->
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                            <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-chart-bar"></i> Statistik Partisipasi
                            </h3>
                            <div style="display: flex; flex-direction: column; gap: 20px;">
                                <div style="text-align: center;">
                                    <h3 style="font-size: 2rem; font-weight: 700; color: #16a34a; margin-bottom: 5px;">156</h3>
                                    <p style="font-size: 14px; color: #666; margin: 0;">Pengaduan Bulan Ini</p>
                                </div>

                                <div style="text-align: center;">
                                    <h3 style="font-size: 2rem; font-weight: 700; color: #2563eb; margin-bottom: 5px;">89%</h3>
                                    <p style="font-size: 14px; color: #666; margin: 0;">Tingkat Penyelesaian</p>
                                </div>

                                <div style="text-align: center;">
                                    <h3 style="font-size: 2rem; font-weight: 700; color: #7c3aed; margin-bottom: 5px;">234</h3>
                                    <p style="font-size: 14px; color: #666; margin: 0;">Partisipasi Polling</p>
                                </div>
                            </div>
                        </div>

                        <!-- Guidelines -->
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                            <h3 style="margin-bottom: 20px;">Panduan Pengaduan</h3>
                            <div style="font-size: 14px; color: #666;">
                                <div style="margin-bottom: 20px;">
                                    <h4 style="font-weight: 600; margin-bottom: 8px;">Tips Pengaduan Efektif:</h4>
                                    <ul style="list-style: disc; list-style-position: inside; margin: 0; padding: 0;">
                                        <li style="margin-bottom: 5px;">Jelaskan masalah dengan detail</li>
                                        <li style="margin-bottom: 5px;">Sertakan lokasi dan waktu kejadian</li>
                                        <li style="margin-bottom: 5px;">Gunakan bahasa yang sopan</li>
                                        <li style="margin-bottom: 5px;">Sertakan foto jika memungkinkan</li>
                                    </ul>
                                </div>

                                <div>
                                    <h4 style="font-weight: 600; margin-bottom: 8px;">Waktu Respons:</h4>
                                    <ul style="list-style: disc; list-style-position: inside; margin: 0; padding: 0;">
                                        <li style="margin-bottom: 5px;">Pengaduan biasa: 3-7 hari kerja</li>
                                        <li style="margin-bottom: 5px;">Pengaduan mendesak: 1-2 hari kerja</li>
                                        <li style="margin-bottom: 5px;">Pengaduan darurat: kurang dari 24 jam</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h3 style="margin-bottom: 20px;">Kontak Langsung</h3>
                            <div style="font-size: 14px; color: #666;">
                                <p style="margin-bottom: 8px;"><strong>Hotline Pengaduan:</strong></p>
                                <p style="margin-bottom: 8px;">📞 (0274) 123456</p>
                                <p style="margin-bottom: 20px;">📱 WhatsApp: 081234567890</p>

                                <div>
                                    <p style="margin-bottom: 8px;"><strong>Jam Layanan:</strong></p>
                                    <p style="margin-bottom: 5px;">Senin - Jumat: 08.00 - 15.00</p>
                                    <p style="margin: 0;">Sabtu: 08.00 - 12.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    `;
}

function submitComplaint(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const ticketId = 'TKT' + Date.now().toString().slice(-6);

    const newComplaint = {
        id: ticketId,
        name: formData.get('name'),
        nik: formData.get('nik'),
        phone: formData.get('phone'),
        category: formData.get('category'),
        subject: formData.get('subject'),
        description: formData.get('description'),
        status: 'Diterima',
        date: new Date().toISOString().split('T')[0]
    };

    submittedComplaints.unshift(newComplaint);

    // Reset form
    event.target.reset();

    // Show success message
    alert(`Pengaduan berhasil dikirim! Tiket tracking Anda: ${ticketId}`);

    // Refresh the page to show updated complaint history
    loadParticipationPage(document.getElementById('partisipasi'));
}

function toggleFAQ(index) {
    const answer = document.getElementById(`faq-answer-${index}`);
    const icon = document.getElementById(`faq-icon-${index}`);

    if (answer.style.maxHeight === '0px' || !answer.style.maxHeight) {
        answer.style.maxHeight = answer.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
    } else {
        answer.style.maxHeight = '0px';
        icon.style.transform = 'rotate(0deg)';
    }
}

// Modal Functions
function showArticleModal(articleId) {
    const article = mockData.news.find(a => a.id == articleId);
    if (!article) return;

    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.8); z-index: 10000;
        display: flex; align-items: center; justify-content: center;
        padding: 20px; overflow-y: auto;
    `;

    modal.innerHTML = `
        <div style="background: white; max-width: 800px; width: 100%; border-radius: 12px; overflow: hidden; max-height: 90vh; overflow-y: auto;">
            <div style="padding: 30px; position: relative;">
                <button onclick="this.closest('[style*=\"position: fixed\"]').remove()" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 24px; cursor: pointer; color: #666;">×</button>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <div class="status-badge" style="background: #f0fdf4; color: #16a34a;">${article.category}</div>
                    <span style="font-size: 14px; color: #666;">${formatDate(article.date)}</span>
                </div>

                <h2 style="margin-bottom: 20px; color: #333;">${article.title}</h2>
                <img src="https://via.placeholder.com/800x400/16a34a/ffffff?text=${encodeURIComponent(article.title)}" alt="${article.title}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 8px; margin-bottom: 20px;">
                <p style="color: #666; line-height: 1.7;">${article.content}</p>
            </div>
        </div>
    `;

    document.body.appendChild(modal);

    // Close modal when clicking outside
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.remove();
        }
    });
}

function showImageModal(imageSrc, title) {
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.9); z-index: 10000;
        display: flex; align-items: center; justify-content: center;
        padding: 20px;
    `;

    modal.innerHTML = `
        <div style="max-width: 90%; max-height: 90%; position: relative;">
            <button onclick="this.closest('[style*=\"position: fixed\"]').remove()" style="position: absolute; top: -40px; right: 0; background: none; border: none; color: white; font-size: 30px; cursor: pointer;">×</button>
            <img src="${imageSrc}" alt="${title}" style="max-width: 100%; max-height: 100%; border-radius: 8px;">
            <p style="color: white; text-align: center; margin-top: 15px; font-size: 18px;">${title}</p>
        </div>
    `;

    document.body.appendChild(modal);

    // Close modal when clicking outside
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.remove();
        }
    });
}

// Utility Functions
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
}

// Initialize the website
document.addEventListener('DOMContentLoaded', function() {
    // Load initial page content
    loadPageContent('beranda');

    // Add service option hover effects after DOM is loaded
    setTimeout(() => {
        document.querySelectorAll('.service-option').forEach(option => {
            option.addEventListener('mouseenter', function() {
                this.style.borderColor = '#16a34a';
                this.style.backgroundColor = '#f0fdf4';
            });
            option.addEventListener('mouseleave', function() {
                this.style.borderColor = '#e5e7eb';
                this.style.backgroundColor = 'white';
            });
        });
    }, 1000);

    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add fade-in animation to elements as they come into view
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);

    // Observe all cards and sections
    setTimeout(() => {
        document.querySelectorAll('.stat-card, .org-card, .event-card, .result-item').forEach(el => {
            observer.observe(el);
        });
    }, 500);
});
