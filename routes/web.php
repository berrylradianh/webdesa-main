<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminAspirasiController;
use App\Http\Controllers\DataKependudukanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ApbdController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MutasiKependudukanController;
use App\Http\Controllers\OperationalHourController;
use App\Http\Controllers\PerangkatAspirasiController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PerangkatPengajuanSuratController;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerangkatArticleController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\VillageOfficialProfileController;
use App\Http\Controllers\VillageProfileController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BudgetTypeController;
use App\Http\Controllers\BumdController;
use App\Http\Controllers\DetailBudgetTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GroupBudgetTypeController;
use App\Http\Controllers\landing\AgendaController as LandingAgendaController;
use App\Http\Controllers\landing\AnnouncementController;
use App\Http\Controllers\landing\ApbdLandingController;
use App\Http\Controllers\landing\ArticleController;
use App\Http\Controllers\landing\AspirasiPartisipasiController;
use App\Http\Controllers\landing\BumdController as LandingBumdController;
use App\Http\Controllers\landing\InformasiDesaController;
use App\Http\Controllers\landing\LandingController;
use App\Http\Controllers\landing\LayananOnlineController;
use App\Http\Controllers\landing\TentangDesaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman depan
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::post('/search-nik', [LandingController::class, 'searchNik'])->name('landing.searchNik');
Route::get('/tentang-desa', [TentangDesaController::class, 'index'])->name('landing.tentang_desa');
Route::get('/layanan-online', [LayananOnlineController::class, 'index'])->name('landing.layanan');
Route::get('/apbd', [ApbdLandingController::class, 'index'])->name('landing.apbd');
Route::get('/informasi-desa', [InformasiDesaController::class, 'index'])->name('landing.informasidesa');
Route::get('/aspirasi-partisipasi', [AspirasiPartisipasiController::class, 'index'])->name('landing.partisipasi');
Route::post('/layanan-online/submit', [LayananOnlineController::class, 'submit'])->name('layanan-online.submit');
Route::get('/layanan-online/download/{id}', [LayananOnlineController::class, 'download'])->name('layanan-online.download');
Route::post('/layanan-online/check-status', [LayananOnlineController::class, 'checkStatus'])->name('layanan-online.check-status');
Route::post('/aspirasi-partisipasi', [AspirasiPartisipasiController::class, 'store'])->name('aspirasi.store');
Route::post('/aspirasi-partisipasi/vote/{pollId}', [AspirasiPartisipasiController::class, 'vote'])->name('aspirasi.vote');


Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/announcement/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/agenda/{id}', [LandingAgendaController::class, 'show'])->name('agenda.show');
Route::get('/bumd/{id}', [LandingBumdController::class, 'show'])->name('bumd.show');

// ----------------- AUTH -----------------
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ----------------- LUPA PASSWORD -----------------
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

// ----------------- DASHBOARD REDIRECT -----------------
Route::get('/dashboard', function () {
    $role = session('role');

    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'perangkatdesa') {
        return redirect()->route('perangkat.dashboard');
    }

    // default untuk warga
    return redirect()->route('home');
})->name('dashboard');

// ----------------- ADMIN -----------------
Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboardadmin'])->name('dashboardadmin');

    // Manajemen User
    Route::get('/admin/kelola/users', [UserController::class, 'index'])->name('users');
    Route::get('/admin/kelola/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/kelola/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/kelola/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/kelola/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/kelola/users/{id}', [UserController::class, 'destroy'])->name('users.delete');

    // Manajemen Role
    Route::get('/admin/kelola/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('/admin/kelola/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/admin/kelola/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/admin/kelola/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/admin/kelola/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/admin/kelola/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // ----------------- Pengumuman Desa -----------------
    Route::get('/admin/announcement', [\App\Http\Controllers\AnnouncementController::class, 'index'])
        ->name('admin.announcement.index');
    Route::get('/admin/announcement/create', [\App\Http\Controllers\AnnouncementController::class, 'create'])
        ->name('admin.announcement.create');
    Route::post('/admin/announcement', [\App\Http\Controllers\AnnouncementController::class, 'store'])
        ->name('admin.announcement.store');
    Route::get('/admin/announcement/{id}/edit', [\App\Http\Controllers\AnnouncementController::class, 'edit'])
        ->name('admin.announcement.edit');
    Route::put('/admin/announcement/{id}', [\App\Http\Controllers\AnnouncementController::class, 'update'])
        ->name('admin.announcement.update');
    Route::delete('/admin/announcement/{id}', [\App\Http\Controllers\AnnouncementController::class, 'destroy'])
        ->name('admin.announcement.destroy');

    // Article / Berita
    Route::get('/admin/article', [PerangkatArticleController::class, 'index'])
        ->name('admin.article.index');
    Route::get('/admin/article/create', [PerangkatArticleController::class, 'create'])
        ->name('admin.article.create');
    Route::post('/admin/article', [PerangkatArticleController::class, 'store'])
        ->name('admin.article.store');
    Route::get('/admin/article/{id}/edit', [PerangkatArticleController::class, 'edit'])
        ->name('admin.article.edit');
    Route::put('/admin/article/{id}', [PerangkatArticleController::class, 'update'])
        ->name('admin.article.update');
    Route::delete('/admin/article/{id}', [PerangkatArticleController::class, 'destroy'])
        ->name('admin.article.destroy');

    // Agenda
    Route::get('/admin/agenda', [AgendaController::class, 'index'])
        ->name('admin.agenda.index');
    Route::get('/admin/agenda/create', [AgendaController::class, 'create'])
        ->name('admin.agenda.create');
    Route::post('/admin/agenda', [AgendaController::class, 'store'])
        ->name('admin.agenda.store');
    Route::get('/admin/agenda/{id}/edit', [AgendaController::class, 'edit'])
        ->name('admin.agenda.edit');
    Route::put('/admin/agenda/{id}', [AgendaController::class, 'update'])
        ->name('admin.agenda.update');
    Route::delete('/admin/agenda/{id}', [AgendaController::class, 'destroy'])
        ->name('admin.agenda.destroy');

    // Gallery
    Route::get('/admin/gallery', [GalleryController::class, 'index'])
        ->name('admin.gallery.index');
    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])
        ->name('admin.gallery.create');
    Route::post('/admin/gallery', [GalleryController::class, 'store'])
        ->name('admin.gallery.store');
    Route::get('/admin/gallery/{id}/edit', [GalleryController::class, 'edit'])
        ->name('admin.gallery.edit');
    Route::put('/admin/gallery/{id}', [GalleryController::class, 'update'])
        ->name('admin.gallery.update');
    Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])
        ->name('admin.gallery.destroy');
    Route::delete('/admin/gallery-item/{id}', [GalleryController::class, 'destroyItem'])
        ->name('admin.gallery.item.destroy');

    // Kontrol Layanan Online -> Templates
    Route::resource('/admin/templates', TemplateController::class)->names([
        'index' => 'templates.index',
        'create' => 'templates.create',
        'store' => 'templates.store',
        'edit' => 'templates.edit',
        'update' => 'templates.update',
        'destroy' => 'templates.destroy',
    ]);

    // Kontrol Layanan Online -> Pengajuan
    Route::get('/admin/pengajuan', [PengajuanSuratController::class, 'adminIndex'])
        ->name('pengajuan.admin.index');
    Route::put('/admin/pengajuan/{id}/update-status', [PengajuanSuratController::class, 'updateStatus'])
        ->name('pengajuan.admin.updateStatus');
    Route::put('/admin/pengajuan/{id}/override', [PengajuanSuratController::class, 'overrideStatus'])
        ->name('pengajuan.admin.override');
    Route::delete('/admin/pengajuan/{id}', [PengajuanSuratController::class, 'destroy'])
        ->name('pengajuan.admin.destroy');

    // Aspirasi warga
    Route::get('/admin/aspirasi', [AdminAspirasiController::class, 'index'])
        ->name('admin.aspirasi.index');
    Route::get('/admin/aspirasi/{id}/edit', [AdminAspirasiController::class, 'edit'])
        ->name('admin.aspirasi.edit');
    Route::put('/admin/aspirasi/{id}/approve', [AdminAspirasiController::class, 'approve'])
        ->name('admin.aspirasi.approve');

    // FAQ
    Route::prefix('/admin/faq')->name('faq.')->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('/create', [FaqController::class, 'create'])->name('create');
        Route::post('/', [FaqController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [FaqController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FaqController::class, 'update'])->name('update');
        Route::delete('/{id}', [FaqController::class, 'destroy'])->name('destroy');
    });

    // SOP
    Route::prefix('/admin/sop')->name('sop.')->group(function () {
        Route::get('/', [SopController::class, 'index'])->name('index');
        Route::get('/create', [SopController::class, 'create'])->name('create');
        Route::post('/', [SopController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SopController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SopController::class, 'update'])->name('update');
        Route::delete('/{id}', [SopController::class, 'destroy'])->name('destroy');
    });

    // Polling
    Route::get('/admin/polling', [PollingController::class, 'index'])->name('polling.index');
    Route::get('/admin/polling/create', [PollingController::class, 'create'])->name('polling.create');
    Route::post('/admin/polling', [PollingController::class, 'store'])->name('polling.store');
    Route::get('/admin/polling/{id}/edit', [PollingController::class, 'edit'])->name('polling.edit');
    Route::put('/admin/polling/{id}', [PollingController::class, 'update'])->name('polling.update');
    Route::delete('/admin/polling/{id}', [PollingController::class, 'destroy'])->name('polling.destroy');

    // Survei
    Route::get('/admin/surveys', [SurveyController::class, 'index'])->name('surveys.index');
    Route::get('/admin/surveys/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/admin/surveys', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('/admin/surveys/{id}', [SurveyController::class, 'show'])->name('surveys.show');
    Route::get('/admin/surveys/{id}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
    Route::put('/admin/surveys/{id}', [SurveyController::class, 'update'])->name('surveys.update');
    Route::delete('/admin/surveys/{id}', [SurveyController::class, 'destroy'])->name('surveys.destroy');

    // Pertanyaan Survei
    Route::post('/admin/surveys/{surveyId}/questions', [SurveyController::class, 'storeQuestion'])
        ->name('surveys.questions.store');

    // Data Kependudukan
    Route::get('/admin/kependudukan', [DataKependudukanController::class, 'adminIndex'])
        ->name('admin.kependudukan.index');
    Route::put('/admin/kependudukan/{id}/update-status', [DataKependudukanController::class, 'updateStatus'])
        ->name('admin.kependudukan.updateStatus');

    // Mutasi Kependudukan
    Route::get('/admin/mutasi-kependudukan', [MutasiKependudukanController::class, 'adminIndex'])
        ->name('admin.mutasi.index');
    Route::put('/admin/mutasi-kependudukan/{id}/update-status', [MutasiKependudukanController::class, 'mutasiUpdateStatus'])
        ->name('admin.mutasi.updateStatus');

    // Struktur Organisasi Desa (Positions)
    Route::get('/admin/kelola/positions', [PositionController::class, 'index'])
        ->name('admin.positions.index');
    Route::get('/admin/kelola/positions/create', [PositionController::class, 'create'])
        ->name('admin.positions.create');
    Route::post('/admin/kelola/positions', [PositionController::class, 'store'])
        ->name('admin.positions.store');
    Route::get('/admin/kelola/positions/{id}/edit', [PositionController::class, 'edit'])
        ->name('admin.positions.edit');
    Route::put('/admin/kelola/positions/{id}', [PositionController::class, 'update'])
        ->name('admin.positions.update');
    Route::delete('/admin/kelola/positions/{id}', [PositionController::class, 'destroy'])
        ->name('admin.positions.destroy');
});

// ----------------- PERANGKAT DESA -----------------
Route::middleware(['checkRole:perangkatdesa'])->group(function () {
    Route::get('/perangkat/dashboard', [PerangkatDesaController::class, 'dashboardperangkat'])->name('dashboardperangkat');

    // Pengajuan
    Route::get('/perangkat/pengajuan', [PerangkatPengajuanSuratController::class, 'index'])
        ->name('pengajuan.perangkat.index');
    Route::get('/perangkat/pengajuan/{id}', [PerangkatPengajuanSuratController::class, 'show'])
        ->name('pengajuan.perangkat.show');
    Route::put('/perangkat/pengajuan/{id}/update-status', [PerangkatPengajuanSuratController::class, 'updateStatus'])
        ->name('pengajuan.perangkat.updateStatus');
    Route::get('/perangkat/pengajuan/{id}/cetak', [PerangkatPengajuanSuratController::class, 'cetak'])
        ->name('pengajuan.perangkat.cetak');

    // Aspirasi
    Route::get('/perangkat/aspirasi', [PerangkatAspirasiController::class, 'index'])
        ->name('perangkat.aspirasi.index');
    Route::get('/perangkat/aspirasi/{id}/edit', [PerangkatAspirasiController::class, 'edit'])
        ->name('perangkat.aspirasi.edit');
    Route::put('/perangkat/aspirasi/{id}/tanggapan', [PerangkatAspirasiController::class, 'storeDraft'])
        ->name('perangkat.aspirasi.tanggapan');
    Route::put('/perangkat/aspirasi/{id}/status', [PerangkatAspirasiController::class, 'updateStatus'])
        ->name('perangkat.aspirasi.status');

    // ----------------- Pengumuman Desa -----------------
    Route::get('/perangkat/announcement', [\App\Http\Controllers\AnnouncementController::class, 'index'])
        ->name('perangkat.announcement.index');
    Route::get('/perangkat/announcement/create', [\App\Http\Controllers\AnnouncementController::class, 'create'])
        ->name('perangkat.announcement.create');
    Route::post('/perangkat/announcement', [\App\Http\Controllers\AnnouncementController::class, 'store'])
        ->name('perangkat.announcement.store');
    Route::get('/perangkat/announcement/{id}/edit', [\App\Http\Controllers\AnnouncementController::class, 'edit'])
        ->name('perangkat.announcement.edit');
    Route::put('/perangkat/announcement/{id}', [\App\Http\Controllers\AnnouncementController::class, 'update'])
        ->name('perangkat.announcement.update');
    Route::delete('/perangkat/announcement/{id}', [\App\Http\Controllers\AnnouncementController::class, 'destroy'])
        ->name('perangkat.announcement.destroy');

    // Article / Berita
    Route::get('/perangkat/article', [PerangkatArticleController::class, 'index'])
        ->name('perangkat.article.index');
    Route::get('/perangkat/article/create', [PerangkatArticleController::class, 'create'])
        ->name('perangkat.article.create');
    Route::post('/perangkat/article', [PerangkatArticleController::class, 'store'])
        ->name('perangkat.article.store');
    Route::get('/perangkat/article/{id}/edit', [PerangkatArticleController::class, 'edit'])
        ->name('perangkat.article.edit');
    Route::put('/perangkat/article/{id}', [PerangkatArticleController::class, 'update'])
        ->name('perangkat.article.update');
    Route::delete('/perangkat/article/{id}', [PerangkatArticleController::class, 'destroy'])
        ->name('perangkat.article.destroy');

    // Agenda
    Route::get('/perangkat/agenda', [AgendaController::class, 'index'])
        ->name('perangkat.agenda.index');
    Route::get('/perangkat/agenda/create', [AgendaController::class, 'create'])
        ->name('perangkat.agenda.create');
    Route::post('/perangkat/agenda', [AgendaController::class, 'store'])
        ->name('perangkat.agenda.store');
    Route::get('/perangkat/agenda/{id}/edit', [AgendaController::class, 'edit'])
        ->name('perangkat.agenda.edit');
    Route::put('/perangkat/agenda/{id}', [AgendaController::class, 'update'])
        ->name('perangkat.agenda.update');
    Route::delete('/perangkat/agenda/{id}', [AgendaController::class, 'destroy'])
        ->name('perangkat.agenda.destroy');

    // Gallery
    Route::get('/perangkat/gallery', [GalleryController::class, 'index'])
        ->name('perangkat.gallery.index');
    Route::get('/perangkat/gallery/create', [GalleryController::class, 'create'])
        ->name('perangkat.gallery.create');
    Route::post('/perangkat/gallery', [GalleryController::class, 'store'])
        ->name('perangkat.gallery.store');
    Route::get('/perangkat/gallery/{id}/edit', [GalleryController::class, 'edit'])
        ->name('perangkat.gallery.edit');
    Route::put('/perangkat/gallery/{id}', [GalleryController::class, 'update'])
        ->name('perangkat.gallery.update');
    Route::delete('/perangkat/gallery/{id}', [GalleryController::class, 'destroy'])
        ->name('perangkat.gallery.destroy');
    Route::delete('/perangkat/gallery-item/{id}', [GalleryController::class, 'destroyItem'])
        ->name('perangkat.gallery.item.destroy');

    // Data Kependudukan
    Route::get('/perangkat/kependudukan', [DataKependudukanController::class, 'index'])
        ->name('perangkat.kependudukan.index');
    Route::get('/perangkat/kependudukan/create', [DataKependudukanController::class, 'create'])
        ->name('perangkat.kependudukan.create');
    Route::post('/perangkat/kependudukan', [DataKependudukanController::class, 'store'])
        ->name('perangkat.kependudukan.store');
    Route::get('/perangkat/kependudukan/{id}/edit', [DataKependudukanController::class, 'edit'])
        ->name('perangkat.kependudukan.edit');
    Route::put('/perangkat/kependudukan/{id}', [DataKependudukanController::class, 'update'])
        ->name('perangkat.kependudukan.update');
    Route::delete('/perangkat/kependudukan/{id}', [DataKependudukanController::class, 'destroy'])
        ->name('perangkat.kependudukan.destroy');

    // Mutasi Kependudukan
    Route::prefix('perangkat/kependudukan')->name('perangkat.kependudukan.')->group(function () {
        Route::get('mutasi', [MutasiKependudukanController::class, 'index'])->name('mutasi.index');
        Route::get('mutasi/create', [MutasiKependudukanController::class, 'create'])->name('mutasi.create');
        Route::post('mutasi', [MutasiKependudukanController::class, 'store'])->name('mutasi.store');
        Route::get('mutasi/{id}/edit', [MutasiKependudukanController::class, 'edit'])->name('mutasi.edit');
        Route::put('mutasi/{id}', [MutasiKependudukanController::class, 'update'])->name('mutasi.update');
        Route::delete('mutasi/{id}', [MutasiKependudukanController::class, 'destroy'])->name('mutasi.destroy');
    });

    // Struktur Organisasi Desa (Members)
    Route::get('/perangkat/kelola/members', [MemberController::class, 'index'])
        ->name('perangkat.members.index');
    Route::get('/perangkat/kelola/members/create', [MemberController::class, 'create'])
        ->name('perangkat.members.create');
    Route::post('/perangkat/kelola/members', [MemberController::class, 'store'])
        ->name('perangkat.members.store');
    Route::get('/perangkat/kelola/members/{id}/edit', [MemberController::class, 'edit'])
        ->name('perangkat.members.edit');
    Route::put('/perangkat/kelola/members/{id}', [MemberController::class, 'update'])
        ->name('perangkat.members.update');
    Route::delete('/perangkat/kelola/members/{id}', [MemberController::class, 'destroy'])
        ->name('perangkat.members.destroy');

    // Operational Hours
    Route::get('/perangkat/operational-hours', [OperationalHourController::class, 'index'])
        ->name('perangkat.operationalhours.index');
    Route::get('/perangkat/operational-hours/create', [OperationalHourController::class, 'create'])
        ->name('perangkat.operationalhours.create');
    Route::post('/perangkat/operational-hours', [OperationalHourController::class, 'store'])
        ->name('perangkat.operationalhours.store');
    Route::get('/perangkat/operational-hours/{id}/edit', [OperationalHourController::class, 'edit'])
        ->name('perangkat.operationalhours.edit');
    Route::put('/perangkat/operational-hours/{id}', [OperationalHourController::class, 'update'])
        ->name('perangkat.operationalhours.update');
    Route::delete('/perangkat/operational-hours/{id}', [OperationalHourController::class, 'destroy'])
        ->name('perangkat.operationalhours.destroy');

    // Village Official Profile / Profil Perangkat Desa
    Route::get('/perangkat/village-profile', [VillageOfficialProfileController::class, 'index'])
        ->name('perangkat.villageprofile.index');
    Route::get('/perangkat/village-profile/create', [VillageOfficialProfileController::class, 'create'])
        ->name('perangkat.villageprofile.create');
    Route::post('/perangkat/village-profile', [VillageOfficialProfileController::class, 'store'])
        ->name('perangkat.villageprofile.store');
    Route::get('/perangkat/village-profile/{id}/edit', [VillageOfficialProfileController::class, 'edit'])
        ->name('perangkat.villageprofile.edit');
    Route::put('/perangkat/village-profile/{id}', [VillageOfficialProfileController::class, 'update'])
        ->name('perangkat.villageprofile.update');
    Route::delete('/perangkat/village-profile/{id}', [VillageOfficialProfileController::class, 'destroy'])
        ->name('perangkat.villageprofile.destroy');

    // Badan Usaha Milik Desa
    Route::get('/perangkat/bumd', [BumdController::class, 'index'])
        ->name('perangkat.bumd.index');
    Route::get('/perangkat/bumd/create', [BumdController::class, 'create'])
        ->name('perangkat.bumd.create');
    Route::post('/perangkat/bumd', [BumdController::class, 'store'])
        ->name('perangkat.bumd.store');
    Route::get('/perangkat/bumd/{id}/edit', [BumdController::class, 'edit'])
        ->name('perangkat.bumd.edit');
    Route::put('/perangkat/bumd/{id}', [BumdController::class, 'update'])
        ->name('perangkat.bumd.update');
    Route::delete('/perangkat/bumd/{id}', [BumdController::class, 'destroy'])
        ->name('perangkat.bumd.destroy');

    // Profil Desa
    Route::get('/perangkat/desa', [VillageProfileController::class, 'index'])
        ->name('perangkat.desa.index');
    Route::get('/perangkat/desa/create', [VillageProfileController::class, 'create'])
        ->name('perangkat.desa.create');
    Route::post('/perangkat/desa', [VillageProfileController::class, 'store'])
        ->name('perangkat.desa.store');
    Route::get('/perangkat/desa/{id}/edit', [VillageProfileController::class, 'edit'])
        ->name('perangkat.desa.edit');
    Route::put('/perangkat/desa/{id}', [VillageProfileController::class, 'update'])
        ->name('perangkat.desa.update');
    Route::delete('/perangkat/desa/{id}', [VillageProfileController::class, 'destroy'])
        ->name('perangkat.desa.destroy');

    //visi-misi desa
    Route::get('/perangkat/visi-misi', [VisiMisiController::class, 'index'])
        ->name('perangkat.visi-misi.index');
    Route::get('/perangkat/visi-misi/create', [VisiMisiController::class, 'create'])
        ->name('perangkat.visi-misi.create');
    Route::post('/perangkat/visi-misi', [VisiMisiController::class, 'store'])
        ->name('perangkat.visi-misi.store');
    Route::get('/perangkat/visi-misi/{id}', [VisiMisiController::class, 'show'])
        ->name('perangkat.visi-misi.show');
    Route::get('/perangkat/visi-misi/{id}/edit', [VisiMisiController::class, 'edit'])
        ->name('perangkat.visi-misi.edit');
    Route::put('/perangkat/visi-misi/{id}', [VisiMisiController::class, 'update'])
        ->name('perangkat.visi-misi.update');
    Route::delete('/perangkat/visi-misi/{id}', [VisiMisiController::class, 'destroy'])
        ->name('perangkat.visi-misi.destroy');

    // Jenis Anggaran
    Route::resource('budget_types', BudgetTypeController::class);

    // Kelompok Jenis Anggaran
    Route::resource('group_budget_types', GroupBudgetTypeController::class);

    // Detail Jenis Anggaran
    Route::resource('detail_budget_types', DetailBudgetTypeController::class);

    // Kelola APBD
    Route::resource('apbds', ApbdController::class);
    Route::get('apbds/detail-budget-types/{budgetTypeId}', [ApbdController::class, 'getDetailBudgetTypes']);
});

// ----------------- WARGA -----------------
Route::middleware(['checkRole:warga'])->group(function () {
    // Pengajuan
    Route::get('/pengajuan', [PengajuanSuratController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/create', [PengajuanSuratController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [PengajuanSuratController::class, 'store'])->name('pengajuan.store');
});
