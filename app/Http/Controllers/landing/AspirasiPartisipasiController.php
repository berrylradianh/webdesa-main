<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Aspirasi;
use App\Models\OperationalHour;
use App\Models\Polling;
use App\Models\PollingAnswer;
use App\Models\PollingOption;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AspirasiPartisipasiController extends Controller
{
    public function index()
    {
        // Ensure user is authenticated
        $this->middleware('auth');

        // Fetch FAQs
        $faq = Faq::select('id', 'question', 'answer')->get()->toArray();

        // Fetch Aspirasi (Complaints)
        $submittedComplaints = Aspirasi::select('id', 'judul as subject', 'status', 'created_at as date')
            ->where('warga_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($complaint) {
                return [
                    'id' => $complaint->id,
                    'subject' => $complaint->subject,
                    'status' => $complaint->status,
                    'date' => $complaint->date,
                ];
            })
            ->toArray();

        // Fetch Polls with Options and check if NIK has voted
        $polls = Polling::with(['options' => function ($query) {
            $query->select('id', 'polling_id', 'option_text as text', 'votes');
        }])
            ->select('id', 'title', 'title as question')
            ->get()
            ->map(function ($poll) {
                // Assuming NIK is passed or stored in session; for now, we'll rely on form input for voting
                $hasVoted = false; // This will be checked in the form submission
                return [
                    'id' => $poll->id,
                    'title' => $poll->title,
                    'question' => $poll->question,
                    'options' => $poll->options->toArray(),
                    'has_voted' => $hasVoted,
                ];
            })
            ->toArray();

        // Fetch Participation Stats
        $complaintsThisMonth = Aspirasi::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $completionRate = Aspirasi::count() > 0
            ? round((Aspirasi::where('status', 'Selesai')->count() / Aspirasi::count()) * 100)
            : 0;

        $pollingParticipation = PollingOption::sum('votes');

        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();

        return view('landing.pages.aspirasipartisipasi.index', compact(
            'faq',
            'submittedComplaints',
            'polls',
            'complaintsThisMonth',
            'completionRate',
            'pollingParticipation',
            'operationalHours'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'phone' => 'required|string|max:15',
            'category' => 'required|in:Pelayanan Administrasi,Infrastruktur,Kebersihan,Keamanan,Kesehatan,Pendidikan,Lainnya',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Aspirasi::create([
            'nama_lengkap' => $request->name,
            'nik' => $request->nik,
            'no_telpon' => $request->phone,
            'kategori' => $request->category,
            'judul' => $request->subject,
            'isi' => $request->description,
            'warga_id' => 3,
            'status' => 'Menunggu',
            'pd_id' => 2,
            'admin_id' => 1,
        ]);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function vote(Request $request, $pollId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'option_id' => 'required|exists:polling_options,id,polling_id,' . $pollId,
        ]);

        // Check if NIK has already voted for this poll
        $hasVoted = PollingAnswer::where('polling_id', $pollId)
            ->where('nik', $request->nik)
            ->exists();

        if ($hasVoted) {
            return redirect()->back()->with('error', 'NIK ini sudah memilih pada polling ini.')->withInput(['nik' => $request->nik]);
        }

        // Record the vote
        PollingAnswer::create([
            'polling_id' => $pollId,
            'option_id' => $request->option_id,
            'nik' => $request->nik,
            'name' => $request->name,
            'user_id' => 1,
        ]);

        // Increment votes in polling_options
        PollingOption::where('id', $request->option_id)->increment('votes');

        return redirect()->back()->with('success', 'Suara Anda berhasil dicatat!')->withInput(['nik' => $request->nik]);
    }
}
