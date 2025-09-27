<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\OperationalHour;
use App\Models\VillageOfficialProfile;
use App\Models\VillageProfile;
use App\Models\DataKependudukan;
use App\Models\PengajuanSurat;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $agendas = Agenda::where('tanggal_mulai', '>=', Carbon::today())
            ->where('status', 'published')
            ->orderBy('tanggal_mulai', 'desc')
            ->get()
            ->map(function ($agenda) {
                $agenda->formatted_tanggal_mulai = Carbon::parse($agenda->tanggal_mulai)->format('d M Y');
                $agenda->formatted_tanggal_selesai = Carbon::parse($agenda->tanggal_selesai)->format('d M Y');
                return $agenda;
            });

        $perangkatDesa = VillageOfficialProfile::get();

        $tahun = $request->input('tahun', DataKependudukan::where('status', 'approved')->max('tahun'));

        $dataKependudukan = DataKependudukan::where('status', 'approved')
            ->where('tahun', $tahun)
            ->first();

        $availableYears = DataKependudukan::where('status', 'approved')
            ->distinct()
            ->pluck('tahun')
            ->sortDesc();

        $totalPengajuan = PengajuanSurat::count();
        $disetujui = PengajuanSurat::where('status', 'selesai')->count();
        $dalamProses = PengajuanSurat::where('status', 'diproses')->count();

        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();

        return view('landing.pages.beranda.index', compact(
            'agendas',
            'perangkatDesa',
            'dataKependudukan',
            'availableYears',
            'totalPengajuan',
            'disetujui',
            'dalamProses',
            'operationalHours'
        ));
    }

    public function searchNik(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|digits:16',
            ]);

            $nik = $request->input('nik');

            $results = PengajuanSurat::join('templates', 'pengajuan_surat.template_id', '=', 'templates.id')
                ->where('pengajuan_surat.nik', $nik)
                ->select(
                    'pengajuan_surat.id',
                    'pengajuan_surat.nik',
                    'templates.name as service',
                    'pengajuan_surat.status',
                    'pengajuan_surat.created_at as submission_date',
                    'pengajuan_surat.keperluan'
                )
                ->get()
                ->map(function ($pengajuan) {
                    return [
                        'id' => $pengajuan->id,
                        'nik' => $pengajuan->nik,
                        'service' => $pengajuan->service,
                        'status' => $pengajuan->status,
                        'submission_date' => Carbon::parse($pengajuan->submission_date)->format('Y-m-d'),
                        'keperluan' => $pengajuan->keperluan,
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $results,
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal: ' . $e->getMessage(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server: ' . $e->getMessage(),
            ], 500);
        }
    }
}
