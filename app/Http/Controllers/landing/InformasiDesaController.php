<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Announcement;
use App\Models\Agenda;
use App\Models\AnnouncementCategory;
use App\Models\Bumd;
use App\Models\OperationalHour;

class InformasiDesaController extends Controller
{
    public function index()
    {
        // Fetch the two latest published articles for the main content
        $articles = Article::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get(['id', 'judul', 'slug', 'konten', 'gambar', 'created_at']);

        // Fetch the three latest published articles for the "Berita Terbaru" sidebar
        $latestArticles = Article::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(['id', 'judul', 'slug', 'gambar', 'created_at']);

        // Fetch announcement categories with their published announcement counts
        $categories = AnnouncementCategory::withCount(['announcements' => function ($query) {
            $query->where('status', 'published');
        }])->get(['id', 'name', 'announcements_count']);

        // Fetch the latest published announcement for the main content
        $announcement = Announcement::where('status', 'published')
            ->with('category')
            ->orderBy('tanggal', 'desc')
            ->first(['id', 'judul', 'isi', 'tanggal', 'category_id']);

        // Fetch the latest published agenda for the main content
        $agenda = Agenda::where('status', 'published')
            ->orderBy('tanggal_mulai', 'desc')
            ->first(['id', 'judul', 'deskripsi', 'tanggal_mulai']);

        // Fetch active BUMDs for the sidebar
        $bumds = Bumd::where('status', 'active')
            ->orderBy('name', 'asc')
            ->get(['id', 'name', 'type', 'description']);

        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();

        return view('landing.pages.informasidesa.index', compact(
            'articles',
            'latestArticles',
            'categories',
            'announcement',
            'agenda',
            'bumds',
            'operationalHours'
        ));
    }
}
