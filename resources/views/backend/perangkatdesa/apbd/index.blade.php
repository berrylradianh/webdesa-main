@extends('backend.index')

@section('page-title', 'Laporan Anggaran Desa (APBD)')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Laporan Anggaran Desa (APBD) Tahun {{ $year }}</h2>
        <a href="{{ route('apbds.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Tambah APBD
        </a>
    </div>

    {{-- Filter Tahun --}}
    <form method="GET" action="{{ route('apbds.index') }}" class="mb-6 flex items-center space-x-4">
        <label for="year" class="font-semibold">Filter Tahun:</label>
        <select name="year" id="year" onchange="this.form.submit()" class="border border-gray-300 rounded px-3 py-1">
            @for($y = date('Y') - 5; $y <= date('Y') + 1; $y++)
                <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
        </select>
    </form>

    {{-- Menu Top Bar --}}
    <div class="mb-6 flex space-x-4 border-b border-gray-300 pb-2">
        @foreach($budgetTypes as $bt)
        <a href="#tab-{{ $bt->id }}" class="tab-link px-4 py-2 rounded-lg cursor-pointer bg-gray-200 hover:bg-gray-300 font-semibold" data-tab="{{ $bt->id }}">{{ $bt->name }}</a>
        @endforeach
        <a href="#laporan" class="tab-link px-4 py-2 rounded-lg cursor-pointer bg-gray-200 hover:bg-gray-300 font-semibold ml-auto">Laporan</a>
    </div>

    {{-- Tab Contents --}}
    @foreach($budgetTypes as $bt)
    <div id="tab-{{ $bt->id }}" class="tab-content hidden">
        <table class="w-full border border-gray-300 rounded-lg text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-3 py-2 text-left">Uraian</th>
                    <th class="border border-gray-300 px-3 py-2 text-right">Anggaran (Rp)</th>
                    <th class="border border-gray-300 px-3 py-2 text-right">Realisasi (Rp)</th>
                    <th class="border border-gray-300 px-3 py-2 text-right">Selisih (Rp)</th>
                    <th class="border border-gray-300 px-3 py-2 text-right">Persentase (%)</th>
                    <th class="border border-gray-300 px-3 py-2 text-center">Bukti Pelaksanaan</th>
                    <th class="border border-gray-300 px-3 py-2 text-center">Created At</th>
                    <th class="border border-gray-300 px-3 py-2 text-center">Updated At</th>
                    <th class="border border-gray-300 px-3 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $btData = $reportData[$bt->id] ?? null;
                @endphp

                @if(!$btData || empty($btData['groups']))
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada data.</td>
                </tr>
                @else
                {{-- Level 1: Jenis Anggaran --}}
                <tr class="bg-gray-200 font-bold">
                    <td class="pl-4">{{ $bt->id }}. {{ strtoupper($bt->name) }}</td>
                    <td class="text-right">{{ number_format($btData['total_budget'], 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($btData['total_realization'], 2, ',', '.') }}</td>
                    @php
                    $diff = $btData['total_budget'] - $btData['total_realization'];
                    $percent = $btData['total_budget'] > 0 ? ($btData['total_realization'] / $btData['total_budget']) * 100 : 0;
                    @endphp
                    <td class="text-right {{ $diff >= 0 ? 'text-green-600' : 'text-red-600' }}">{{ number_format($diff, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($percent, 2) }}%</td>
                    <td colspan="4"></td>
                </tr>

                {{-- Level 2: Kelompok Jenis Anggaran --}}
                @foreach($btData['groups'] as $group)
                <tr class="bg-gray-100 font-semibold">
                    <td class="pl-8">{{ $bt->id }}.{{ $group['group']->id }}. {{ $group['group']->name }}</td>
                    <td class="text-right">{{ number_format($group['total_budget'], 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($group['total_realization'], 2, ',', '.') }}</td>
                    @php
                    $diffGroup = $group['total_budget'] - $group['total_realization'];
                    $percentGroup = $group['total_budget'] > 0 ? ($group['total_realization'] / $group['total_budget']) * 100 : 0;
                    @endphp
                    <td class="text-right {{ $diffGroup >= 0 ? 'text-green-600' : 'text-red-600' }}">{{ number_format($diffGroup, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($percentGroup, 2) }}%</td>
                    <td colspan="4"></td>
                </tr>

                {{-- Level 3: Detail Jenis Anggaran --}}
                @foreach($group['details'] as $detail)
                @php
                $diffDetail = $detail->budget_value - $detail->realization_value;
                $percentDetail = $detail->budget_value > 0 ? ($detail->realization_value / $detail->budget_value) * 100 : 0;
                @endphp
                <tr>
                    <td class="pl-12">
                        {{ $bt->id }}.{{ $group['group']->id }}.{{ $detail->detailBudgetType->id }}.
                        {{ $detail->detailBudgetType->name }}
                        @if($detail->description)
                        <br><small class="text-gray-500">{{ $detail->description }}</small>
                        @endif
                    </td>
                    <td class="text-right">{{ number_format($detail->budget_value, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($detail->realization_value, 2, ',', '.') }}</td>
                    <td class="text-right {{ $diffDetail >= 0 ? 'text-green-600' : 'text-red-600' }}">{{ number_format($diffDetail, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($percentDetail, 2) }}%</td>
                    <td class="text-center space-x-1">
                        @if(!empty($detail->evidence_images) && is_array($detail->evidence_images))
                        @foreach($detail->evidence_images as $image)
                        <a href="{{ asset('storage/' . $image) }}" target="_blank" class="inline-block">
                            <img src="{{ asset('storage/' . $image) }}" alt="Bukti" class="w-10 h-10 object-cover rounded border border-gray-300" />
                        </a>
                        @endforeach
                        @else
                        <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $detail->created_at->format('d-m-Y') }}</td>
                    <td class="text-center">{{ $detail->updated_at->format('d-m-Y') }}</td>
                    <td class="text-center space-x-2">
                        <a href="{{ route('apbds.edit', $detail->id) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition"
                            title="Edit">
                            Edit
                        </a>

                        <form action="{{ route('apbds.destroy', $detail->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition" title="Hapus">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @endforeach

    {{-- Laporan ringkasan --}}
    <div id="laporan" class="tab-content hidden mt-8">
        <h3 class="text-xl font-bold mb-4">Ringkasan APBD Tahun {{ $year }}</h3>
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

        <table class="w-full border border-gray-300 rounded-lg text-sm">
            <tbody>
                <tr class="bg-green-100 font-semibold">
                    <td class="px-4 py-2">Jumlah Pendapatan</td>
                    <td class="text-right px-4 py-2">{{ number_format($totalPendapatan, 2, ',', '.') }}</td>
                </tr>
                <tr class="bg-red-100 font-semibold">
                    <td class="px-4 py-2">Jumlah Belanja</td>
                    <td class="text-right px-4 py-2">{{ number_format($totalBelanja, 2, ',', '.') }}</td>
                </tr>
                <tr class="{{ $surplusDefisit >= 0 ? 'bg-green-200' : 'bg-red-200' }} font-semibold">
                    <td class="px-4 py-2">Surplus / Defisit</td>
                    <td class="text-right px-4 py-2">{{ number_format($surplusDefisit, 2, ',', '.') }}</td>
                </tr>
                <tr class="bg-blue-100 font-semibold">
                    <td class="px-4 py-2">Pembiayaan Netto</td>
                    <td class="text-right px-4 py-2">{{ number_format($pembiayaanNetto, 2, ',', '.') }}</td>
                </tr>
                <tr class="bg-yellow-100 font-semibold">
                    <td class="px-4 py-2">SILPA / SIKPA Tahun Berjalan</td>
                    <td class="text-right px-4 py-2">{{ number_format($silpa, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Script untuk tab --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-link');
        const contents = document.querySelectorAll('.tab-content');

        function hideAll() {
            contents.forEach(c => c.classList.add('hidden'));
            tabs.forEach(t => t.classList.remove('bg-blue-600', 'text-white'));
            tabs.forEach(t => t.classList.add('bg-gray-200'));
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                hideAll();
                const tabId = this.getAttribute('data-tab');
                if (tabId) {
                    document.getElementById('tab-' + tabId).classList.remove('hidden');
                } else {
                    // Laporan tab
                    document.getElementById('laporan').classList.remove('hidden');
                }
                this.classList.add('bg-blue-600', 'text-white');
                this.classList.remove('bg-gray-200');
            });
        });

        // Tampilkan tab pertama secara default
        if (tabs.length > 0) {
            tabs[0].click();
        }
    });
</script>
@endsection
