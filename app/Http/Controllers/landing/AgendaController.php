<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\OperationalHour;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function show($id)
    {
        $agenda = Agenda::where('id', $id)->where('status', 'published')->firstOrFail();
        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();
        return view('landing.pages.informasidesa.show-agenda', compact('agenda', 'operationalHours'));
    }
}
