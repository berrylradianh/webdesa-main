<section class="events-preview">
    <div class="container">
        <div class="section-header">
            <h2>Agenda Mendatang</h2>
            <p>Kegiatan dan acara yang akan datang</p>
        </div>

        <div class="events-grid">
            @forelse ($agendas as $agenda)
                <div class="event-card">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="event-content">
                        <h3>{{ $agenda->judul }}</h3>
                        <div class="event-details">
                            <p>{{ $agenda->formatted_tanggal_mulai }} - {{ $agenda->formatted_tanggal_selesai }}</p>
                            <div class="event-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $agenda->lokasi }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada agenda mendatang saat ini.</p>
            @endforelse
        </div>
    </div>
</section>
