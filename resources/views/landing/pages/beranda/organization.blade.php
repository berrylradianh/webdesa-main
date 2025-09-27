<section class="organization-preview">
    <div class="container">
        <div class="section-header">
            <h2>Struktur Organisasi</h2>
            <p>Pimpinan dan Staf Pemerintah Desa</p>
        </div>

        <div class="org-grid">
            @foreach ($perangkatDesa as $official)
                <div class="org-card">
                    <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->name }}">
                    <h3>{{ $official->name }}</h3>
                    <p class="position">
                        @php
                            $positionName = $official->position ? $official->position->name : 'Unknown Position';
                        @endphp
                        {{ $positionName }}
                    </p>
                    <div class="contact">
                        <i class="fas fa-phone"></i>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $official->phone) }}" target="_blank">
                            <span>{{ $official->phone }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
