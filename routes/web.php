<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\MediaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('', function () {
    return view('home');
});

Route::get('/sitemap.xml', [SitemapController::class, 'generateXmlSitemap']);

Route::get('/new', function () {
    return view('home');
});

Route::get('/sitemap', function () {
    return view('sitemap');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/about-the-site', function () {
    return view('about-the-site');
});

Route::get('/troop-profile', function () {
    return view('troop-profile');
});

Route::get('/troop', function () {
    return view('troop');
});

Route::get('/photo-gallery', function () {
    return view('photo-gallery');
});

Route::get('/badgework-new-syllabus', function () {
    return view('badgework-new-syllabus');
});

Route::get('/the-group-committee', function () {
    return view('the-group-committee');
});

Route::get('/the-scout-dunk', function () {
    return view('the-scout-dunk');
});

Route::get('/kindling-legacy', function () {
    return view('kindling-legacy');
});

Route::get('/badgework-old-syllabus', function () {
    return view('badgework-old-syllabus');
});

Route::get('/cub-pack-leaders', function () {
    return view('cub-pack-leaders');
});

Route::get('/history-of-scouting-at-college', function () {
    return view('History/history-of-scouting-at-college');
});

Route::get('/history-of-scouting-at-college-2', function () {
    return view('History/history-of-scouting-at-college-2');
});

Route::get('/history-of-scouting-at-college-3', function () {
    return view('History/history-of-scouting-at-college-3');
});

Route::get('/history-of-the-16th-colombo-cub-pack', function () {
    return view('History/history-of-the-16th-colombo-cub-pack');
});

Route::get('/mr-w-i-muttiah', function () {
    return view('History/mr-w-i-muttiah');
});

Route::get('/mr-rex-jayasinha', function () {
    return view('History/mr-rex-jayasinha');
});

/*
|--------------------------------------------------------------------------
| Year Reports roster pages (static — not part of the editable timeline)
|--------------------------------------------------------------------------
*/

Route::get('/Past-Troop-Leaders', function () {
    return view('Recent_Year_Reports/Past-Troop-Leaders');
});

Route::get('/King’s-and-Queen’s-Scouts', function () {
    return view('Recent_Year_Reports/King’s-and-Queen’s-Scouts');
});

Route::get('/President’s-Award-Winners', function () {
    return view('Recent_Year_Reports/President’s-Award-Winners');
});

/*
|--------------------------------------------------------------------------
| Year Reports — database-driven timeline + individual report pages
|--------------------------------------------------------------------------
*/

Route::get('/recent-year-reports', [ReportController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Admin (password-protected report management)
|--------------------------------------------------------------------------
*/

Route::get('/admin', fn () => redirect()->route('admin.reports.index'));

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.attempt');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/create', [AdminReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [AdminReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/{report}/edit', [AdminReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{report}', [AdminReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{report}', [AdminReportController::class, 'destroy'])->name('reports.destroy');

    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
});

/*
|--------------------------------------------------------------------------
| Catch-all: serve a database report by its slug. MUST stay last so it only
| handles paths not matched by any static route above. Preserves every
| original /year-report-YYYY and event URL.
|--------------------------------------------------------------------------
*/

Route::get('/{slug}', [ReportController::class, 'show'])->where('slug', '[^/]+');
