<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\DataKependudukan;
use App\Models\OperationalHour;
use App\Models\VillageProfile;
use App\Models\VisiMisi;

class TentangDesaController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::with('misi')->latest()->first();

        $villageProfile = VillageProfile::latest()->first();

        $populationData = DataKependudukan::where('status', 'approved')
            ->orderBy('tahun', 'desc')
            ->first();

        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();

        return view('landing.pages.tentangdesa.index', compact('visiMisi', 'villageProfile', 'populationData', 'operationalHours'));
    }
}
