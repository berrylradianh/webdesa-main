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

                    <form action="{{ route('aspirasi.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                        @csrf
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Lengkap</label>
                                <input type="text" name="name" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;" value="{{ old('name') }}">
                                @error('name')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: 500;">NIK</label>
                                <input type="text" name="nik" placeholder="16 digit NIK" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;" value="{{ old('nik') }}">
                                @error('nik')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: 500;">No. Telepon</label>
                                <input type="tel" name="phone" placeholder="08xxxxxxxxxx" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;" value="{{ old('phone') }}">
                                @error('phone')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Kategori</label>
                                <select name="category" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                    <option value="">Pilih kategori</option>
                                    <option value="Pelayanan Administrasi" {{ old('category') == 'Pelayanan Administrasi' ? 'selected' : '' }}>Pelayanan Administrasi</option>
                                    <option value="Infrastruktur" {{ old('category') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                                    <option value="Kebersihan" {{ old('category') == 'Kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                                    <option value="Keamanan" {{ old('category') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                                    <option value="Kesehatan" {{ old('category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                    <option value="Pendidikan" {{ old('category') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                    <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('category')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Judul Pengaduan</label>
                            <input type="text" name="subject" placeholder="Ringkasan singkat masalah" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;" value="{{ old('subject') }}">
                            @error('subject')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Deskripsi Detail</label>
                            <textarea name="description" placeholder="Jelaskan masalah/aspirasi Anda secara detail" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; min-height: 120px; resize: vertical;">{{ old('description') }}</textarea>
                            @error('description')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
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

                    @foreach($polls as $poll)
                    <div style="margin-bottom: 30px;">
                        <h4 style="margin-bottom: 10px; color: #333;">{{ $poll['question'] }}</h4>

                        <div id="poll-{{ $poll['id'] }}" style="display: flex; flex-direction: column; gap: 15px;">
                            @php
                            $hasVoted = $poll['has_voted'];
                            $totalVotes = array_sum(array_column($poll['options'], 'votes'));
                            @endphp

                            @if($hasVoted)
                            <!-- Display results if NIK has voted -->
                            @foreach($poll['options'] as $option)
                            @php
                            $percentage = $totalVotes > 0 ? round(($option['votes'] / $totalVotes) * 100) : 0;
                            @endphp
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                                    <span style="font-size: 14px; font-weight: 500;">{{ $option['text'] }}</span>
                                    <span style="font-size: 14px; color: #666;">{{ $percentage }}% ({{ $option['votes'] }})</span>
                                </div>
                                <div style="width: 100%; height: 8px; background: #e5e7eb; border-radius: 4px; overflow: hidden;">
                                    <div style="width: {{ $percentage }}%; height: 100%; background: #16a34a; border-radius: 4px; transition: width 0.3s ease;"></div>
                                </div>
                            </div>
                            @endforeach
                            <p style="font-size: 14px; color: #666; margin-top: 10px;">
                                Anda telah memilih. Total partisipasi: {{ $totalVotes }} suara
                            </p>
                            @else
                            <!-- Voting form with name and NIK -->
                            <form action="{{ route('aspirasi.vote', $poll['id']) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
                                @csrf
                                <div>
                                    <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Lengkap</label>
                                    <input type="text" name="name" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;" value="{{ old('name') }}">
                                    @error('name')
                                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label style="display: block; margin-bottom: 5px; font-weight: 500;">NIK</label>
                                    <input type="text" name="nik" placeholder="16 digit NIK" required style="width: 100%; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;" value="{{ old('nik') }}">
                                    @error('nik')
                                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                @foreach($poll['options'] as $option)
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <input type="radio" name="option_id" value="{{ $option['id'] }}" required style="margin: 0;">
                                    <label style="font-size: 14px; font-weight: 500;">{{ $option['text'] }}</label>
                                </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                    <i class="fas fa-vote-yea" style="margin-right: 8px;"></i>
                                    Kirim Suara
                                </button>
                                @error('option_id')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </form>
                            <p style="font-size: 14px; color: #666; margin-top: 10px;">
                                Total partisipasi: {{ $totalVotes }} suara
                            </p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- FAQ Section -->
                <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-question-circle"></i> Pertanyaan yang Sering Diajukan (FAQ)
                    </h3>

                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        @foreach($faq as $index => $item)
                        <div style="border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
                            <button onclick="toggleFAQ({{ $index }})" style="width: 100%; padding: 20px; background: white; border: none; text-align: left; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 500;">
                                <span>{{ $item['question'] }}</span>
                                <i class="fas fa-chevron-down" id="faq-icon-{{ $index }}" style="transition: transform 0.3s ease;"></i>
                            </button>
                            <div id="faq-answer-{{ $index }}" style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease;">
                                <div style="padding: 20px; border-top: 1px solid #f3f4f6; background: #f9fafb; color: #666;">
                                    {{ $item['answer'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                @if(count($submittedComplaints) > 0)
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="margin-bottom: 20px;">Riwayat Pengaduan</h3>
                    @foreach($submittedComplaints as $complaint)
                    <div style="padding: 15px; border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                            <h4 style="font-size: 14px; margin: 0; font-weight: 600;">{{ $complaint['subject'] }}</h4>
                            <div class="status-badge status-{{ strtolower($complaint['status']) }}">{{ $complaint['status'] }}</div>
                        </div>
                        <p style="font-size: 12px; color: #666; margin: 0;">ID: {{ $complaint['id'] }}</p>
                        <p style="font-size: 12px; color: #666; margin: 0;">{{ \Carbon\Carbon::parse($complaint['date'])->format('d M Y') }}</p>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Participation Stats -->
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    <h3 style="color: #16a34a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-chart-bar"></i> Statistik Partisipasi
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        <div style="text-align: center;">
                            <h3 style="font-size: 2rem; font-weight: 700; color: #16a34a; margin-bottom: 5px;">{{ $complaintsThisMonth }}</h3>
                            <p style="font-size: 14px; color: #666; margin: 0;">Pengaduan Bulan Ini</p>
                        </div>

                        <div style="text-align: center;">
                            <h3 style="font-size: 2rem; font-weight: 700; color: #2563eb; margin-bottom: 5px;">{{ $completionRate }}%</h3>
                            <p style="font-size: 14px; color: #666; margin: 0;">Tingkat Penyelesaian</p>
                        </div>

                        <div style="text-align: center;">
                            <h3 style="font-size: 2rem; font-weight: 700; color: #7c3aed; margin-bottom: 5px;">{{ $pollingParticipation }}</h3>
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
                        <p style="margin-bottom: 20px;">📱 WhatsApp: <a href="https://wa.me/6282338756354" target="_blank" style="color: inherit; text-decoration: none;">+6281234567890</a></p>

                        <div>
                            <p style="margin-bottom: 8px;"><strong>Jam Layanan:</strong></p>
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
                            <p style="text-align: center;">{{ $day }}: {{ $openHours[$day]['open'] }} - {{ $openHours[$day]['close'] }} WIB</p>
                            @elseif (in_array($day, $closedDays) && !collect($closedRange)->first(fn($range) => strpos($range, $day) !== false))
                            <!-- Skip individual closed days already included in a range -->
                            @endif
                            @endforeach
                            @foreach ($closedRange as $range)
                            <p style="color: red; font-weight: bold;text-align: center;">{{ $range }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
