<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AyatController;
use App\Http\Controllers\BulananController;
use App\Http\Controllers\GerejaController;
use App\Http\Controllers\InformasiGerejaController;
use App\Http\Controllers\IbadahRayaController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MingguanController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\WartaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckGereja;


// Auth Routes
Route::get('/', [AuthController::class, 'showLoginFormSA'])->name('login');
Route::post('login', [AuthController::class, 'loginSA']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Dynamic Routes Based on Church Name
Route::prefix('{nama_gereja}')->middleware(CheckGereja::class)->group(function () {

    // Auth Routes
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Home Route
    Route::get('/', [HomeController::class, 'view_home'])->name('home');

    // Sejarah Route
    Route::get('sejarah', [SejarahController::class, 'sejarah']);

    // Static View Routes
    Route::get('bph/bph', [InformasiGerejaController::class, 'view_bph']);
    Route::get('bph/gembala', [InformasiGerejaController::class, 'view_gembala']);
    Route::get('postingan/warta', [WartaController::class, 'view_warta']);
    Route::get('postingan/ayat', [AyatController::class, 'view_ayat']);
    Route::get('acara/akan_datang', [AcaraController::class, 'view_upcoming']);
    Route::get('acara/ibadah_raya', [IbadahRayaController::class, 'view_raya']);
    Route::get('keuangan/mingguan', [MingguanController::class, 'view_mingguan']);
    Route::get('keuangan/bulanan', [BulananController::class, 'view_bulanan']);



    // Apply auth middleware to routes that require authentication
    Route::middleware('auth', CheckGereja::class)->group(function () {


        // Route to display a specific resource
        Route::get('/info', [GerejaController::class, 'index']);

        Route::get('/info/create', [GerejaController::class, 'create']);

        Route::post('/info/store', [GerejaController::class, 'store']);

        Route::get('/info/edit/{id}', [GerejaController::class, 'edit']);
        
        Route::post('/info/update/{id}', [GerejaController::class, 'update']);

        Route::post('/info/destroy/{id}', [GerejaController::class, 'destroy']);


        // Admin Gereja Route
        Route::get('/list-admin', [AdminController::class, 'index'])->name('list-admin.index');
        Route::get('/list-admin/create', [AdminController::class, 'create'])->name('list-admin.create');
        Route::post('/list-admin', [AdminController::class, 'store'])->name('list-admin.store');
        Route::get('/list-admin/{id}/edit', [AdminController::class, 'edit'])->name('list-admin.edit');
        Route::post('/list-admin/{id}/update', [AdminController::class, 'update'])->name('list-admin.update');
        Route::post('/list-admin/{id}/destroy', [AdminController::class, 'destroy'])->name('list-admin.destroy');

  

        Route::get('landing', [AuthController::class, 'landing'])->name('landing');

        // Home Controller Routes
        Route::get('home/tambah_home', [HomeController::class, 'index']);
        Route::post('home/tambah_home', [HomeController::class, 'store']);

        // Warta Jemaat Routes
        Route::prefix('admin/warta')->group(function () {
            Route::get('list_warta', [WartaController::class, 'warta'])->name('list_warta');
            Route::get('tambah_warta', [WartaController::class, 'tambah_warta'])->name('tambah_warta');
            Route::post('simpan_warta', [WartaController::class, 'simpan_warta'])->name('simpan_warta');
            Route::get('edit_warta', [WartaController::class, 'edit_warta'])->name('edit_warta');
        });

        // Sejarah Routes
        Route::prefix('admin/gereja/sejarah')->group(function () {
            Route::get('add', [SejarahController::class, 'view']);
            Route::post('add', [SejarahController::class, 'store'])->name('sejarah.store');
        });

        // BPH Routes
        Route::prefix('admin/gereja/bph')->group(function () {
            Route::get('add', [InformasiGerejaController::class, 'add_bph']);
            Route::post('add', [InformasiGerejaController::class, 'post_bph']);
            Route::get('list', [InformasiGerejaController::class, 'list_bph'])->name('bph.list');
        });

        // Pendeta Routes
        Route::prefix('admin/gereja/pendeta')->group(function () {
            Route::get('add', [InformasiGerejaController::class, 'add_pendeta']);
            Route::post('add', [InformasiGerejaController::class, 'store_pendeta']);
            Route::get('list', [InformasiGerejaController::class, 'list_pendeta'])->name('pendeta.list');
        });

        // Ayat Harian Routes
        Route::prefix('admin/ayat_harian')->group(function () {
            Route::get('list_ayat', [AyatController::class, 'list_ayat'])->name('list_ayat');
            Route::get('tambah_ayat', [AyatController::class, 'tambah_ayat'])->name('tambah_ayat');
            Route::get('edit_ayat', [AyatController::class, 'edit_ayat'])->name('edit_ayat');
            Route::post('tambah_ayat', [AyatController::class, 'uploadAyat'])->name('upload_ayat');
        });

        // Laporan Kas Bulanan Routes
        Route::prefix('admin/keuangan/kas')->group(function () {
            Route::get('list_kas', [KasController::class, 'kas']);
            Route::get('edit_kas', [KasController::class, 'edit_kas'])->name('kas.edit');
            Route::get('tambah_kas', [KasController::class, 'tambah_kas']);
            Route::post('tambah_kas', [KasController::class, 'insert_kas']);
        });

        // Laporan Keuangan Mingguan Routes
        Route::prefix('admin/keuangan/persembahan')->group(function () {
            Route::get('admin/keuangan/persembahan/list_keuangan', [KeuanganController::class, 'keuangan'])->name('list_keuangan');
            Route::get('edit_keuangan/{id}', [KeuanganController::class, 'edit_keuangan']);
            Route::post('edit_keuangan/{id}', [KeuanganController::class, 'update_keuangan']);
            Route::get('hapus_keuangan/{id}', [KeuanganController::class, 'hapus_keuangan']);
            Route::get('tambah_keuangan', [KeuanganController::class, 'tambah_keuangan']);
            Route::post('tambah_keuangan', [KeuanganController::class, 'insert_keuangan']);
        });

        // Acara Upcoming Routes
        Route::prefix('admin/acara/upcoming')->group(function () {
            Route::get('list_acara', [AcaraController::class, 'upcoming_view']);
            Route::get('tambah_upcoming', [AcaraController::class, 'tambah_upcoming'])->name('tambah_upcoming');
            Route::post('tambah_upcoming', [AcaraController::class, 'insert_upcoming'])->name('acara.upcoming.tambah_upcoming');
            Route::get('edit/{id}', [AcaraController::class, 'edit_upcoming'])->name('acara.upcoming.edit');
            Route::put('update/{id}', [AcaraController::class, 'update_upcoming']);
            Route::delete('delete/{id}', [AcaraController::class, 'destroy_upcoming'])->name('acara.upcoming.delete');
            Route::get('list-upcoming', [AcaraController::class, 'listupcoming'])->name('listupcoming');
        });

        // Ibadah Raya Routes
        Route::prefix('admin/acara/ibadah_raya')->group(function () {
            Route::get('list_acara', [IbadahRayaController::class, 'listAcara'])->name('listAcara');
            Route::get('tambah_acara', [IbadahRayaController::class, 'tambahAcara'])->name('tambahAcara');
            Route::post('tambah_acara', [IbadahRayaController::class, 'insertIbadah'])->name('insert_ibadah');
        });

        // Keuangan Mingguan
        Route::get('admin/keuangan/persembahan/mingguan', [MingguanController::class, 'listmingguan'])->name('listmingguan');
        Route::get('admin/keuangan/mingguan/tambah_mingguan', [MingguanController::class, 'createmingguan'])->name('createmingguan');
        Route::post('admin/keuangan/kas/tambah_kas', [MingguanController::class, 'store'])->name('store');

        // Keuangan Bulanan
        Route::get('admin/keuangan/persembahan/bulanan', [BulananController::class, 'listbulanan'])->name('listbulanan');
        Route::get('admin/keuangan/bulanan/tambah_bulanan', [BulananController::class, 'create'])->name('createbulanan');
        Route::post('admin/keuangan/bulanan/tambah_bulanan', [BulananController::class, 'store'])->name('store.bulanan');
    });

    // Single View Routes
    Route::get('view/postingan/warta_single/{id}', [WartaController::class, 'warta_single']);
    Route::get('view/postingan/ayat_single/{id}', [AyatController::class, 'ayat_single']);
    Route::get('view/acara/akan_datang_single/{id}', [AcaraController::class, 'akan_datang_single']);
    Route::get('view/acara/ibadah_raya_single/{id}', [IbadahRayaController::class, 'ibadah_raya_single']);
});
