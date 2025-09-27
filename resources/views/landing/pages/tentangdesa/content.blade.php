<section style="padding: 60px 0; background: #f8fafc;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 60px;">
            <div>
                <!-- Profil Desa -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-map-marker-alt"></i> Profil Desa
                    </h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div>
                            <strong>Nama Desa:</strong><br>
                            {{ $villageProfile->village_name ?? 'Sukamaju' }}
                        </div>
                        <div>
                            <strong>Jumlah Penduduk:</strong><br>
                            @if($populationData && !is_null($populationData->jumlah_penduduk))
                            {{ number_format($populationData->jumlah_penduduk) }} jiwa
                            @if($populationData->tahun)
                            (Tahun {{ $populationData->tahun }})
                            @else
                            (Tahun tidak tersedia)
                            @endif
                            @else
                            Data tidak tersedia
                            @endif
                        </div>
                        <div>
                            <strong>Jumlah KK:</strong><br>
                            @if($populationData && !is_null($populationData->jumlah_kk))
                            {{ number_format($populationData->jumlah_kk) }} KK
                            @else
                            Data tidak tersedia
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sejarah Desa -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-calendar-alt"></i> Sejarah Desa
                    </h3>
                    <p style="color: #666; line-height: 1.7;">
                        {{ $villageProfile->history ?? 'Data sejarah desa belum tersedia. Desa Sukamaju berdiri pada tahun 1950, awalnya merupakan pemukiman kecil yang dibangun oleh para petani dari wilayah tetangga.' }}
                    </p>
                </div>
            </div>

            <div>
                <!-- Peta Desa -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="margin-bottom: 15px; color: #16a34a; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-map-marked-alt"></i> Peta Desa
                    </h3>
                    <div style="aspect-ratio: 16/9; background: #f3f4f6; border-radius: 8px; overflow: hidden; margin-bottom: 10px;">
                        @if($villageProfile->map_embed_url ?? false)
                        <iframe
                            src="{{ $villageProfile->map_embed_url }}"
                            width="100%"
                            height="100%"
                            style="border:0; border-radius: 8px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        @else
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15858.5!2d107.6191!3d-6.9175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTUgMDknMjAuMyJTIDEwN8KwMzcprimeyMzQuMiJF!5e0!3m2!1sen!2sid!4v1690000000000!5m2!1sen!2sid"
                            width="100%"
                            height="100%"
                            style="border:0; border-radius: 8px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        @endif
                    </div>
                    <p style="color: #666; font-size: 14px; margin: 0;">
                        Peta wilayah administratif {{ $villageProfile->village_name ?? 'Sukamaju' }}.
                        @if($villageProfile->map_embed_url ?? false)
                        Klik untuk zoom dan eksplorasi lebih lanjut.
                        @else
                        Silakan hubungi admin untuk informasi lebih lanjut.
                        @endif
                    </p>
                </div>

                <!-- Visi & Misi -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-bullseye"></i> Visi & Misi
                    </h3>
                    <div style="margin-bottom: 25px;">
                        <h4 style="margin-bottom: 10px;">Visi</h4>
                        <p style="color: #666; font-style: italic;">
                            {{ $visiMisi->visi ?? 'Data visi belum tersedia' }}
                        </p>
                    </div>
                    <div>
                        <h4 style="margin-bottom: 10px;">Misi</h4>
                        <ul style="list-style: none; padding: 0;">
                            @forelse ($visiMisi->misi ?? [] as $misi)
                            <li style="display: flex; align-items: flex-start; margin-bottom: 8px;">
                                <span style="width: 8px; height: 8px; background: #16a34a; border-radius: 50%; margin-top: 8px; margin-right: 12px; flex-shrink: 0;"></span>
                                <span style="color: #666;">{{ $misi->misi ?? 'Data misi tidak tersedia.' }}</span>
                            </li>
                            @empty
                            <span style="color: #666;">Data misi belum tersedia</span>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
