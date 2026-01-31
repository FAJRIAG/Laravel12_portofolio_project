<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PortfolioController;
use App\Models\Portfolio;
use Illuminate\Support\Facades\App;

// Halaman utama (Publik)
Route::get('/', function () {
    $portfolios = Portfolio::latest()->get();
    $certificates = \App\Models\Certificate::latest('issued_at')->get();
    $about = \App\Models\About::first();
    return view('welcome', compact('portfolios', 'certificates', 'about'));
});

// Route for changing language
Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'id', 'ja'])) {
        session(['locale' => $lang]);
    }
    return back();
})->name('set_locale');

// Rute ini menangani redirect setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Rute untuk semua halaman Admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Rute CRUD untuk portofolio
    // URL akan menjadi /admin/portfolios, /admin/portfolios/create, dll.
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('certificates', \App\Http\Controllers\Admin\CertificateController::class);

    // Rute untuk About Me (singleton)
    Route::get('about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about.index');
    Route::put('about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');
});

require __DIR__ . '/auth.php';