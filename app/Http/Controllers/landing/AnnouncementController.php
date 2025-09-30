<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\OperationalHour;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function show($id)
    {
        $announcement = Announcement::with('category')->where('id', $id)->where('status', 'published')->firstOrFail();
        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();
        return view('landing.pages.informasidesa.show-announcement', compact('announcement', 'operationalHours'));
    }
}
