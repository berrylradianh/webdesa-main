<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Kontak Desa</h3>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Jl. Raya Desa No. 123, Kec. Makmur, Kab. Sejahtera</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>(0274) 123456</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>desa@sejahteramakmur.go.id</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-globe"></i>
                    <span>www.sejahteramakmur-desa.go.id</span>
                </div>
            </div>

            <div class="footer-section">
                <h3>Jam Layanan</h3>
                <div class="service-hours">
                    <div class="service-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            @foreach ($operationalHours as $hour)
                                <p class="{{ $hour->is_closed ? 'text-red' : '' }}">
                                    {{ $hour->day }}:
                                    @if ($hour->is_closed)
                                        Tutup
                                    @else
                                        {{ \Carbon\Carbon::parse($hour->open_time)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($hour->close_time)->format('H:i') }} WIB
                                    @endif
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-section">
                <h3>Tautan Penting</h3>
                <div class="footer-links">
                    <a href="#">
                        <i class="fas fa-globe-asia"></i>
                        Portal Nasional Desa
                    </a>
                    <a href="#">
                        <i class="fas fa-building"></i>
                        Pemerintah Kabupaten
                    </a>
                    <a href="#">
                        <i class="fas fa-university"></i>
                        Pemerintah Provinsi
                    </a>
                    <a href="#">
                        <i class="fas fa-flag"></i>
                        Website Resmi RI
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p>&copy; 2024 DesaInovatif. Semua hak cipta dilindungi.</p>
                <div class="footer-brand">
                    <span>Melayani dengan Integritas</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Improved Footer Styles (Adjusted for Green Theme #16a34a) */
.footer {
    background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%); /* Green gradient background matching #16a34a */
    color: #ffffff;
    padding: 40px 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin-top: auto; /* Ensures footer sticks to bottom in flex layouts */
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.footer-section h3 {
    font-size: 1.2em;
    margin-bottom: 15px;
    color: #ffffff;
    border-bottom: 2px solid rgba(255, 255, 255, 0.3);
    padding-bottom: 8px;
    font-weight: 600;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
    transition: all 0.3s ease;
}

.contact-item:hover {
    color: #d1fae5; /* Light green on hover */
    transform: translateX(5px); /* Subtle slide on hover for contact items */
}

.contact-item i {
    font-size: 1.1em;
    margin-right: 12px;
    width: 20px;
    text-align: center;
    color: #4ade80; /* Green accent color for icons */
    transition: all 0.3s ease;
}

.contact-item:hover i {
    color: #ffffff; /* Icon brightens on hover */
    transform: scale(1.1); /* Slight scale for emphasis */
}

.contact-item span {
    font-size: 0.95em;
    line-height: 1.4;
}

.service-hours {
    background: rgba(255, 255, 255, 0.1); /* Subtle backdrop */
    padding: 15px;
    border-radius: 8px;
    backdrop-filter: blur(10px); /* Modern blur effect */
}

.service-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 10px;
}

.service-item i {
    font-size: 1.1em;
    margin-right: 12px;
    color: #4ade80; /* Green accent for clock icon */
    margin-top: 2px;
    transition: all 0.3s ease;
}

.service-item:hover i {
    transform: rotate(15deg); /* Fun rotation on hover for clock icon */
}

.service-item p {
    margin: 0;
    font-size: 0.95em;
    line-height: 1.4;
}

.text-red {
    color: #f87171 !important; /* Red for closed days (unchanged for contrast) */
}

.footer-links {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.footer-links a {
    display: flex;
    align-items: center;
    color: #e0f2fe; /* Light green-tinted white for links */
    text-decoration: none;
    font-size: 0.95em;
    transition: all 0.3s ease;
    padding: 8px 0;
    border-bottom: 1px solid transparent;
}

.footer-links a i {
    font-size: 0.9em;
    margin-right: 10px;
    width: 16px;
    text-align: center;
    color: #4ade80; /* Green accent for link icons */
    transition: all 0.3s ease;
}

.footer-links a:hover {
    color: #ffffff;
    border-bottom-color: #4ade80; /* Green border on hover */
    padding-left: 5px; /* Subtle slide effect */
}

.footer-links a:hover i {
    color: #ffffff;
    transform: scale(1.1); /* Icon scale on hover */
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding-top: 20px;
    text-align: center;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9em;
    opacity: 0.9;
}

.footer-brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.footer-brand img {
    border-radius: 50%; /* Circular logo */
    border: 2px solid rgba(255, 255, 255, 0.3);
    transition: all 0.3s ease;
}

.footer-brand:hover img {
    transform: scale(1.05); /* Slight zoom on hover for logo */
    box-shadow: 0 0 10px rgba(74, 222, 128, 0.5); /* Green glow effect */
}

.footer-brand span {
    font-size: 0.95em;
    font-weight: 500;
    color: #d1fae5; /* Light green for slogan */
}

/* Responsiveness */
@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: 20px;
        text-align: center;
    }

    .contact-item,
    .footer-links a,
    .service-item {
        justify-content: center;
    }

    .footer-links a i {
        margin-right: 8px;
    }

    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .footer {
        padding: 30px 0 15px;
    }

    .container {
        padding: 0 15px;
    }

    .footer-section h3 {
        font-size: 1.1em;
    }

    .contact-item i,
    .service-item i,
    .footer-links a i {
        font-size: 1em; /* Slightly smaller icons on mobile */
    }
}
</style>
