<style>
    /* General Section Styling */
    .budget-section {
        padding: 4rem 0;
        background-color: #f9fafb;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Container Styling */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    /* Filter Form Styling */
    .filter-form {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .filter-form label {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
    }

    .filter-form select {
        padding: 0.5rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        background-color: #fff;
        color: #374151;
        font-size: 1rem;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .filter-form select:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    }

    /* Heading Styling */
    h2,
    h3 {
        color: #10b981;
        font-weight: 700;
    }

    h2 {
        font-size: 1.875rem;
        margin-bottom: 2rem;
    }

    h3 {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
    }

    /* Card Styling for Budget Types */
    .budget-card {
        background-color: #fff;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 3rem;
    }

    /* Table Styling for Budget Types */
    .budget-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
        color: #374151;
    }

    .budget-table th,
    .budget-table td {
        border: 1px solid #e5e7eb;
        padding: 0.75rem;
        text-align: left;
    }

    .budget-table th {
        background-color: #ecfdf5;
        font-weight: 600;
    }

    .budget-table td {
        background-color: #fff;
    }

    .budget-table .total-row {
        font-weight: 600;
        background-color: #d1fae5;
    }

    .budget-table .group-row {
        font-weight: 500;
        background-color: #e0f2fe;
    }

    .budget-table .detail-row td:first-child {
        padding-left: 2.5rem;
    }

    .budget-table .group-row td:first-child {
        padding-left: 1.5rem;
    }

    .budget-table .positive {
        color: #10b981;
    }

    .budget-table .negative {
        color: #ef4444;
    }

    .budget-table .description {
        color: #6b7280;
        font-size: 0.75rem;
    }

    /* Summary Table Styling */
    .summary-card {
        background-color: #fff;
        border-radius: 0.75rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .summary-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    }

    .summary-table {
        width: 100%;
        font-size: 0.9375rem;
        color: #1f2937;
        border-spacing: 0;
    }

    .summary-table tr {
        transition: background-color 0.2s ease;
    }

    .summary-table td {
        padding: 1rem;
        font-weight: 500;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }

    .summary-table tr:last-child td {
        border-bottom: none;
    }

    .summary-table .income-row {
        background-color: #ecfdf5;
    }

    .summary-table .income-row:hover {
        background-color: #d1fae5;
    }

    .summary-table .expense-row {
        background-color: #fef2f2;
    }

    .summary-table .expense-row:hover {
        background-color: #fee2e2;
    }

    .summary-table .surplus-row {
        background-color: #ecfdf5;
    }

    .summary-table .surplus-row:hover {
        background-color: #d1fae5;
    }

    .summary-table .deficit-row {
        background-color: #fef2f2;
    }

    .summary-table .deficit-row:hover {
        background-color: #fee2e2;
    }

    .summary-table .financing-row {
        background-color: #e0f2fe;
    }

    .summary-table .financing-row:hover {
        background-color: #bfdbfe;
    }

    .summary-table .silpa-row {
        background-color: #fef9c3;
        font-weight: 600;
    }

    .summary-table .silpa-row:hover {
        background-color: #fef08a;
    }

    .summary-table .label {
        font-weight: 600;
        color: #1f2937;
    }

    /* Responsive Table */
    @media (max-width: 768px) {

        .budget-table,
        .summary-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>

<section class="budget-section">
    <div class="container">
        <!-- Filter Tahun -->
        <form method="GET" action="{{ url()->current() }}" class="filter-form">
            <label for="year">Filter Tahun:</label>
            <select name="year" id="year" onchange="this.form.submit()">
                @for($y = date('Y') - 5; $y <= date('Y') + 1; $y++)
                    <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
            </select>
        </form>

        <h2>Laporan Anggaran Desa (APBD) Tahun {{ $year }}</h2>

        @foreach($budgetTypes as $bt)
        @php
        $btData = $reportData[$bt->id] ?? null;
        @endphp
        <div class="budget-card">
            <h3>{{ $bt->name }}</h3>
            @if(!$btData || empty($btData['groups']))
            <p class="text-gray-500 italic">Tidak ada data.</p>
            @else
            <table class="budget-table">
                <thead>
                    <tr>
                        <th>Uraian</th>
                        <th>Anggaran (Rp)</th>
                        <th>Realisasi (Rp)</th>
                        <th>Selisih (Rp)</th>
                        <th>Persentase (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Total -->
                    @php
                    $diff = $btData['total_budget'] - $btData['total_realization'];
                    $percent = $btData['total_budget'] > 0 ? ($btData['total_realization'] / $btData['total_budget']) * 100 : 0;
                    @endphp
                    <tr class="total-row">
                        <td>{{ strtoupper($bt->name) }}</td>
                        <td>{{ number_format($btData['total_budget'], 2, ',', '.') }}</td>
                        <td>{{ number_format($btData['total_realization'], 2, ',', '.') }}</td>
                        <td class="{{ $diff >= 0 ? 'positive' : 'negative' }}">{{ number_format($diff, 2, ',', '.') }}</td>
                        <td>{{ number_format($percent, 2) }}%</td>
                    </tr>

                    <!-- Groups -->
                    @foreach($btData['groups'] as $group)
                    @php
                    $diffGroup = $group['total_budget'] - $group['total_realization'];
                    $percentGroup = $group['total_budget'] > 0 ? ($group['total_realization'] / $group['total_budget']) * 100 : 0;
                    @endphp
                    <tr class="group-row">
                        <td>{{ $group['group']->name }}</td>
                        <td>{{ number_format($group['total_budget'], 2, ',', '.') }}</td>
                        <td>{{ number_format($group['total_realization'], 2, ',', '.') }}</td>
                        <td class="{{ $diffGroup >= 0 ? 'positive' : 'negative' }}">{{ number_format($diffGroup, 2, ',', '.') }}</td>
                        <td>{{ number_format($percentGroup, 2) }}%</td>
                    </tr>

                    <!-- Details -->
                    @foreach($group['details'] as $detail)
                    @php
                    $diffDetail = $detail->budget_value - $detail->realization_value;
                    $percentDetail = $detail->budget_value > 0 ? ($detail->realization_value / $detail->budget_value) * 100 : 0;
                    @endphp
                    <tr class="detail-row">
                        <td>
                            {{ $detail->detailBudgetType->name }}
                            @if($detail->description)
                            <br><small class="description">{{ $detail->description }}</small>
                            @endif
                        </td>
                        <td>{{ number_format($detail->budget_value, 2, ',', '.') }}</td>
                        <td>{{ number_format($detail->realization_value, 2, ',', '.') }}</td>
                        <td class="{{ $diffDetail >= 0 ? 'positive' : 'negative' }}">{{ number_format($diffDetail, 2, ',', '.') }}</td>
                        <td>{{ number_format($percentDetail, 2) }}%</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        @endforeach

        <!-- Ringkasan -->
        @php
        $pendapatan = $reportData[$pendapatanType->id ?? 0] ?? null;
        $belanja = $reportData[$belanjaType->id ?? 0] ?? null;
        $pembiayaan = $reportData[$pembiayaanType->id ?? 0] ?? null;

        $totalPendapatan = $pendapatan['total_realization'] ?? 0;
        $totalBelanja = $belanja['total_realization'] ?? 0;
        $surplusDefisit = $totalPendapatan - $totalBelanja;

        $penerimaanPembiayaan = 0;
        $pengeluaranPembiayaan = 0;

        if ($pembiayaan) {
        foreach ($pembiayaan['groups'] as $group) {
        if (stripos($group['group']->name, 'penerimaan') !== false) {
        $penerimaanPembiayaan += $group['total_realization'];
        } elseif (stripos($group['group']->name, 'pengeluaran') !== false) {
        $pengeluaranPembiayaan += $group['total_realization'];
        }
        }
        }

        $pembiayaanNetto = $penerimaanPembiayaan - $pengeluaranPembiayaan;
        $silpa = $surplusDefisit + $pembiayaanNetto;
        @endphp

        <h3>Ringkasan APBD Tahun {{ $year }}</h3>
        <div class="summary-card">
            <table class="summary-table">
                <tbody>
                    <tr class="income-row">
                        <td class="label">Jumlah Pendapatan</td>
                        <td>{{ number_format($totalPendapatan, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="expense-row">
                        <td class="label">Jumlah Belanja</td>
                        <td>{{ number_format($totalBelanja, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="{{ $surplusDefisit >= 0 ? 'surplus-row' : 'deficit-row' }}">
                        <td class="label">Surplus / Defisit</td>
                        <td>{{ number_format($surplusDefisit, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="financing-row">
                        <td class="label">Pembiayaan Netto</td>
                        <td>{{ number_format($pembiayaanNetto, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="silpa-row">
                        <td class="label">SILPA / SIKPA Tahun Berjalan</td>
                        <td>{{ number_format($silpa, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
