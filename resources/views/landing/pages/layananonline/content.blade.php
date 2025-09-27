<section style="padding: 60px 0; background: #f8fafc;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <!-- Service Application -->
            <div>
                @if (session('success'))
                    <div style="background: #16a34a; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div style="background: #dc2626; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        {{ session('error') }}
                    </div>
                @endif

                <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-file-text"></i> Ajukan Layanan Dokumen
                    </h3>
                    <p style="color: #666; margin-bottom: 30px;">Pilih jenis layanan yang Anda butuhkan:</p>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                        @foreach ($templates as $template)
                            <a href="{{ route('landing.layanan') }}?template_id={{ $template['id'] }}"
                               style="border: 2px solid #e5e7eb; padding: 20px; border-radius: 12px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; color: inherit;">
                                <h4 style="margin-bottom: 15px; color: #333;">{{ $template['name'] }}</h4>
                            </a>
                        @endforeach
                    </div>

                    @if (request('template_id'))
                        @php
                            $selectedTemplate = collect($templates)->firstWhere('id', request('template_id'));
                        @endphp
                        @if ($selectedTemplate)
                            <div style="margin-top: 30px;">
                                <h3 style="color: #16a34a; margin-bottom: 15px;">{{ $selectedTemplate['name'] }}</h3>
                                <form action="{{ route('layanan-online.submit') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="template_id" value="{{ $selectedTemplate['id'] }}">
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                                        <div>
                                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">NIK</label>
                                            <input type="text" name="nik" placeholder="16 digit NIK" required
                                                   style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;"
                                                   value="{{ old('nik') }}">
                                            @error('nik')
                                                <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Lengkap</label>
                                            <input type="text" name="name" placeholder="Nama sesuai KTP" required
                                                   style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;"
                                                   value="{{ old('name') }}">
                                            @error('name')
                                                <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 20px;">
                                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Alamat</label>
                                        <textarea name="address" placeholder="Alamat lengkap" required
                                                  style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; min-height: 100px; resize: vertical;">{{ old('address') }}</textarea>
                                        @error('address')
                                            <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div style="margin-bottom: 20px;">
                                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">No. Telepon/WhatsApp</label>
                                        <input type="tel" name="phone" placeholder="08xxxxxxxxxx" required
                                               style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;"
                                               value="{{ old('phone') }}">
                                        @error('phone')
                                            <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div style="display: flex; gap: 15px;">
                                        <a href="{{ route('landing.layanan') }}"
                                           style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb; padding: 12px 20px; border-radius: 8px; text-decoration: none;">
                                            Kembali
                                        </a>
                                        <button type="submit" style="background: #16a34a; color: white; padding: 12px 20px; border: none; border-radius: 8px;">
                                            Kirim Pengajuan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <!-- Status Check -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-search"></i> Cek Status
                    </h3>
                    <form action="{{ route('layanan-online.check-status') }}" method="POST">
                        @csrf
                        <div style="margin-bottom: 15px;">
                            <input type="text" name="nik" placeholder="Masukkan NIK"
                                   style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                            <button type="submit" style="width: 100%; background: #16a34a; color: white; padding: 12px; border: none; border-radius: 8px;">
                                Cek Status
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Download Templates -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="color: #16a34a; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-download"></i> Download Template
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        @foreach ($templates as $template)
                            <a href="{{ route('layanan-online.download', $template['id']) }}"
                               style="background: #f8fafc; color: #333; border: 1px solid #e5e7eb; padding: 12px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-file-text"></i> {{ $template['name'] }}
                            </a>
                        @endforeach
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
