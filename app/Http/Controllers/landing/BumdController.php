<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Bumd;
use App\Models\OperationalHour;
use Illuminate\Http\Request;

class BumdController extends Controller
{
    public function show($id)
    {
        $bumd = Bumd::where('id', $id)->where('status', 'active')->firstOrFail();
        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();
        return view('landing.pages.informasidesa.show-bumd', compact('bumd', 'operationalHours'));
    }
}
