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
                    <a href="https://wa.me/6282338756354" target="_blank" style="color: inherit; text-decoration: none;">
                        <span>+6282338756354</span>
                    </a>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>desa@sejahteramakmur.go.id</span>
                </div zh>
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
                            @php
                            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            $closedDays = [];
                            $openHours = [];
                            foreach ($operationalHours as $hour) {
                            if ($hour->is_closed) {
                            $closedDays[] = $hour->day;
                            } else {
                            $openHours[$hour->day] = [
                            'open' => \Carbon\Carbon::parse($hour->open_time)->format('H:i'),
                            'close' => \Carbon\Carbon::parse($hour->close_time)->format('H:i')
                            ];
                            }
                            }
                            // Combine consecutive closed days (e.g., Sabtu and Minggu)
                            $closedRange = [];
                            $start = null;
                            $prev = null;
                            foreach ($days as $index => $day) {
                            if (in_array($day, $closedDays)) {
                            if ($start === null) {
                            $start = $day;
                            }
                            $prev = $day;
                            } else {
                            if ($start !== null) {
                            if ($start === $prev) {
                            $closedRange[] = $start . ': Tutup';
                            } else {
                            $closedRange[] = $start . ' - ' . $prev . ': Tutup';
                            }
                            $start = null;
                            $prev = null;
                            }
                            }
                            }
                            // Handle case where closed days extend to the last day
                            if ($start !== null) {
                            if ($start === $prev) {
                            $closedRange[] = $start . ': Tutup';
                            } else {
                            $closedRange[] = $start . ' - ' . $prev . ': Tutup';
                            }
                            }
                            @endphp
                            @foreach ($days as $day)
                            @if (array_key_exists($day, $openHours))
                            <p>{{ $day }}: {{ $openHours[$day]['open'] }} - {{ $openHours[$day]['close'] }} WIB</p>
                            @elseif (in_array($day, $closedDays) && !collect($closedRange)->first(fn($range) => strpos($range, $day) !== false))
                            <!-- Skip individual closed days already included in a range -->
                            @endif
                            @endforeach
                            @foreach ($closedRange as $range)
                            <p style="color: white; font-weight: bold;">{{ $range }}</p>
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
        background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
        color: #ffffff;
        padding: 40px 0 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: auto;
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
        text-align: left;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        transition: all 0.3s ease;
        text-align: left;
    }

    .contact-item:hover {
        color: #d1fae5;
        transform: translateX(5px);
    }

    .contact-item i {
        font-size: 1.1em;
        margin-right: 12px;
        width: 20px;
        text-align: center;
        color: #4ade80;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .contact-item:hover i {
        color: #ffffff;
        transform: scale(1.1);
    }

    .contact-item span,
    .contact-item a span {
        font-size: 0.95em;
        line-height: 1.4;
        text-align: left;
        display: block;
    }

    .service-hours {
        background: rgba(255, 255, 255, 0.1);
        padding: 15px;
        border-radius: 8px;
        backdrop-filter: blur(10px);
    }

    .service-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 10px;
        text-align: left;
    }

    .service-item i {
        font-size: 1.1em;
        margin-right: 12px;
        color: #4ade80;
        margin-top: 2px;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .service-item:hover i {
        transform: rotate(15deg);
    }

    .service-item p {
        margin: 0;
        font-size: 0.95em;
        line-height: 1.4;
        text-align: left;
    }

    .text-red {
        color: #f87171 !important;
    }

    .footer-links {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .footer-links a {
        display: flex;
        align-items: center;
        color: #e0f2fe;
        text-decoration: none;
        font-size: 0.95em;
        transition: all 0.3s ease;
        padding: 8px 0;
        border-bottom: 1px solid transparent;
        text-align: left;
    }

    .footer-links a i {
        font-size: 0.9em;
        margin-right: 10px;
        width: 16px;
        text-align: center;
        color: #4ade80;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .footer-links a:hover {
        color: #ffffff;
        border-bottom-color: #4ade80;
        padding-left: 5px;
    }

    .footer-links a:hover i {
        color: #ffffff;
        transform: scale(1.1);
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
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .footer-brand:hover img {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(74, 222, 128, 0.5);
    }

    .footer-brand span {
        font-size: 0.95em;
        font-weight: 500;
        color: #d1fae5;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .footer-content {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .contact-item,
        .footer-links a,
        .service-item {
            justify-content: center;
        }

        .contact-item span,
        .service-item p,
        .footer-links a {
            text-align: left;
            width: 100%;
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
            font-size: 1em;
        }
    }
</style>
