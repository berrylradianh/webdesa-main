<section style="padding: 60px 0; background: #f8fafc;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 60px;">
            <!-- Main Content -->
            <div>
                @if($announcements->isNotEmpty())
                <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="color: #16a34a; margin-bottom: 15px;">Pengumuman Terbaru</h3>
                    <div class="scrollable-container" style="max-height: 580px; overflow-y: auto; display: flex; flex-direction: column; gap: 20px; padding-right: 10px;">
                        @foreach($announcements as $announcement)
                        <div style="background: #f9fafb; padding: 20px; border-radius: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                <span style="background: #16a34a; color: white; padding: 5px 10px; border-radius: 5px; font-size: 14px;">{{ $announcement->category->name }}</span>
                                <span style="color: #666; font-size: 14px;">{{ \Carbon\Carbon::parse($announcement->tanggal)->translatedFormat('d F Y') }}</span>
                            </div>
                            <h4 style="color: #16a34a; margin-bottom: 10px; text-align: justify;">{{ $announcement->judul }}</h4>
                            <p style="color: #666; line-height: 1.5; margin-bottom: 15px; text-align: justify;">
                                {{ Str::limit(strip_tags($announcement->isi), 100) }}
                            </p>
                            <a href="{{ route('announcement.show', $announcement->id) }}" style="background: #16a34a; color: white; padding: 8px 15px; border-radius: 8px; text-decoration: none; display: inline-block;">Baca Selengkapnya</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($agendas->isNotEmpty())
                <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <h3 style="color: #16a34a; margin-bottom: 15px;">Agenda Terbaru</h3>
                    <div class="scrollable-container" style="max-height: 580px; overflow-y: auto; display: flex; flex-direction: column; gap: 20px; padding-right: 10px;">
                        @foreach($agendas as $agenda)
                        <div style="background: #f9fafb; padding: 20px; border-radius: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                <span style="background: #16a34a; color: white; padding: 5px 10px; border-radius: 5px; font-size: 14px;">Kegiatan</span>
                                <span style="color: #666; font-size: 14px;">{{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d F Y') }}</span>
                            </div>
                            <h4 style="color: #16a34a; margin-bottom: 10px;text-align: justify;">{{ $agenda->judul }}</h4>
                            <p style="color: #666; line-height: 1.5; margin-bottom: 15px; text-align: justify;">
                                {{ Str::limit(strip_tags($agenda->deskripsi), 100) }}
                            </p>
                            <a href="{{ route('agenda.show', $agenda->id) }}" style="background: #16a34a; color: white; padding: 8px 15px; border-radius: 8px; text-decoration: none; display: inline-block;">Baca Selengkapnya</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div>
                <!-- Berita Terbaru -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-newspaper"></i> Berita Terbaru
                    </h3>
                    <div style="margin-bottom: 20px;">
                        @foreach($latestArticles as $article)
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <h4 style="color: #16a34a; margin: 0; font-size: 16px;">
                                    <a href="{{ route('article.show', $article->slug) }}" style="text-decoration: none; color: #16a34a;">{{ $article->judul }}</a>
                                </h4>
                                <p style="color: #666; font-size: 14px; margin: 5px 0 0; text-align: justify;">{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Kategori -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-tags"></i> Kategori
                    </h3>
                    <div>
                        @foreach($categories as $category)
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <span style="color: #666;">{{ $category->name }}</span>
                            <span style="background: #16a34a; color: white; padding: 5px 10px; border-radius: 5px; font-size: 14px;">{{ $category->announcements_count }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- BUMD -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-building"></i> Badan Usaha Milik Desa
                    </h3>
                    <div>
                        @if($bumds->isEmpty())
                        <p style="color: #666; font-size: 14px;">Belum ada data BUMD.</p>
                        @else
                        @foreach($bumds as $bumd)
                        <div style="margin-bottom: 15px;text-align: justify;">
                            <h4 style="color: #16a34a; margin: 0; font-size: 16px;">
                                <a href="{{ route('bumd.show', $bumd->id) }}" style="text-decoration: none; color: #16a34a;">{{ $bumd->name }}</a>
                            </h4>
                            <p style="color: #666; font-size: 14px; margin: 5px 0 0;">Jenis: {{ $bumd->type }}</p>
                            <p style="color: #666; font-size: 14px; margin: 5px 0 0;">
                                {{ Str::limit(strip_tags($bumd->description), 100) ?: '-' }}
                            </p>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Scrollbar untuk Webkit (Chrome, Edge, Safari) */
    .scrollable-container::-webkit-scrollbar {
        width: 6px;
        /* Lebar scrollbar */
    }

    .scrollable-container::-webkit-scrollbar-track {
        background: transparent;
        /* Track transparan */
    }

    .scrollable-container::-webkit-scrollbar-thumb {
        background-color: rgba(22, 163, 74, 0.6);
        /* Warna hijau semi transparan */
        border-radius: 3px;
    }

    .scrollable-container::-webkit-scrollbar-thumb:hover {
        background-color: rgba(22, 163, 74, 0.9);
    }

    /* Scrollbar untuk Firefox */
    .scrollable-container {
        scrollbar-width: thin;
        scrollbar-color: rgba(22, 163, 74, 0.6) transparent;
    }
</style>
