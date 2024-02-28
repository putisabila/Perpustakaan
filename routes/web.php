<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UlasanBukuController;
use App\Http\Controllers\KategoriBukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('komponen.konten');
});

    Route::group(['prefix' => 'homepeminjam'], function () {
        Route::get('/', [HomeController::class, 'peminjam'])->name('homepeminjam');
    });

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'homeadmin'], function () {
        Route::get('/', [HomeController::class, 'admin'])->name('homeadmin');

    });
});

Route::group(['prefix' => 'homepetugas'], function () {
    Route::get('/', [HomeController::class, 'petugas'])->name('homepetugas');
});


// Kategori Buku
Route::get('/kategoribuku', [KategoriBukuController::class, 'index'])->name('kategoribuku.index')->middleware('auth');
Route::get('createkategoribuku', [KategoriBukuController::class, 'create'])->name('kategoribuku.create')->middleware('auth');
Route::post('createkategoribuku', [KategoriBukuController::class, 'store'])->name('kategoribuku.store')->middleware('auth');
Route::delete('deletekategoribuku/{id}', [KategoriBukuController::class, 'destroy'])->name('kategoribuku.destroy')->middleware('auth');
Route::get('editkategoribuku/{id}', [KategoriBukuController::class,'edit'])->name('kategoribuku.edit')->middleware('auth');
Route::post('editkategoribuku/{id}', [KategoriBukuController::class,'update'])->name('kategoribuku.update')->middleware('auth');
Route::get('kategoribukupdf', [KategoriBukuController::class, 'generatePDF'])->name('kategoribuku.kategoribukupdf')->middleware('auth');
Route::get('kategoribuku/search', [KategoriBukuController::class, 'search'])->name('kategoribuku.search');

// Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index')->middleware('auth');
Route::get('createpeminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.create')->middleware('auth');
Route::post('createpeminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store')->middleware('auth');
Route::delete('deletepeminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy')->middleware('auth');
Route::get('editpeminjaman/{id}', [PeminjamanController::class,'edit'])->name('peminjaman.edit')->middleware('auth');
Route::post('editpeminjaman/{id}', [PeminjamanController::class,'update'])->name('peminjaman.update')->middleware('auth');
Route::get('peminjamanpdf', [PeminjamanController::class, 'generatePDF'])->name('peminjaman.peminjamanpdf')->middleware('auth');
Route::get('peminjaman/search', [PeminjamanController::class, 'search'])->name('peminjaman.search');

// Ulasan Buku
Route::get('/ulasanbuku', [UlasanBukuController::class, 'index'])->name('ulasanbuku.index')->middleware('auth');
Route::get('createulasanbuku', [UlasanBukuController::class, 'create'])->name('ulasanbuku.create')->middleware('auth');
Route::post('createulasanbuku', [UlasanBukuController::class, 'store'])->name('ulasanbuku.store')->middleware('auth');
Route::delete('deleteulasanbuku/{id}', [UlasanBukuController::class, 'destroy'])->name('ulasanbuku.destroy')->middleware('auth');
Route::get('editulasanbuku/{id}', [UlasanBukuController::class,'edit'])->name('ulasanbuku.edit')->middleware('auth');
Route::post('editulasanbuku/{id}', [UlasanBukuController::class,'update'])->name('ulasanbuku.update')->middleware('auth');
Route::get('ulasanbukupdf', [UlasanBukuController::class, 'generatePDF'])->name('ulasanbuku.ulasanbukupdf')->middleware('auth');
Route::get('ulasanbuku/search', [UlasanBukuController::class, 'search'])->name('ulasanbuku.search');

// Buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('createbuku', [BukuController::class, 'create'])->name('buku.create');
Route::post('createbuku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('deletebuku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('editbuku/{id}', [BukuController::class,'edit'])->name('buku.edit');
Route::post('editbuku/{id}', [BukuController::class,'update'])->name('buku.update');
Route::get('bukupdf', [BukuController::class, 'generatePDF'])->name('buku.bukupdf');
Route::get('buku/search', [BukuController::class, 'search'])->name('buku.search');

// Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginaksi'])->name('loginaksi');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registeraksi'])->name('registeraksi');
Route::get('logout', [LoginController::class, 'logoutaksi'])->name('logout')->middleware('auth');

// Petugas
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
Route::get('/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
Route::post('/petugas', [PetugasController::class, 'store'])->name('petugas.store');
Route::get('/petugas/{user}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::put('/petugas/{user}', [PetugasController::class, 'update'])->name('petugas.update');
Route::delete('/petugas/{user}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
