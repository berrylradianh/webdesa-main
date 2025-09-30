<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\OperationalHour;
use Illuminate\Http\Request;

class PetaPotensiController extends Controller
{
    public function index()
    {
        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();

        return view('landing.pages.petapotensi.index', compact('operationalHours'));
    }
}
