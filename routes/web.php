<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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

//Route::get('/homeadmin', function () {
    //return view('layout.main');
//});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'homeadmin'], function () {
        Route::get('/', [HomeController::class, 'admin'])->name('homeadmin');
    });

    Route::group(['prefix' => 'homepeminjam'], function () {
        Route::get('/', [HomeController::class, 'peminjam'])->name('homepeminjam');
    });
});

// Buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('createbuku', [BukuController::class, 'create'])->name('buku.create');
Route::post('createbuku', [BukuController::class, 'store'])->name('buku.store');
Route::get('deletebuku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('editbuku/{id}', [BukuController::class,'edit'])->name('buku.edit');
Route::post('editbuku/{id}', [BukuController::class,'update'])->name('buku.update');

// Kategori Buku
Route::get('/kategoribuku', [KategoriBukuController::class, 'index'])->name('kategoribuku.index');
Route::get('createkategoribuku', [KategoriBukuController::class, 'create'])->name('kategoribuku.create');
Route::post('createkategoribuku', [KategoriBukuController::class, 'store'])->name('kategoribuku.store');
Route::get('deletekategoribuku/{id}', [KategoriBukuController::class, 'destroy'])->name('kategoribuku.destroy');
Route::get('editkategoribuku/{id}', [KategoriBukuController::class,'edit'])->name('kategoribuku.edit');
Route::post('editkategoribuku/{id}', [KategoriBukuController::class,'update'])->name('kategoribuku.update');

// Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('createpeminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('createpeminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('deletepeminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
Route::get('editpeminjaman/{id}', [PeminjamanController::class,'edit'])->name('peminjaman.edit');
Route::post('editpeminjaman/{id}', [PeminjamanController::class,'update'])->name('peminjaman.update');

// User
Route::get('/user', [UserController::class, 'index']);

// Ulasan Buku
Route::get('ulasanbuku', [UlasanBukuController::class, 'index'])->name('ulasanbuku.index');
Route::get('createulasanbuku', [UlasanBukuController::class, 'create'])->name('ulasanbuku.create');
Route::post('createulasanbuku', [UlasanBukuController::class, 'store'])->name('ulasanbuku.store');
Route::get('deleteulasanbuku/{id}', [UlasanBukuController::class, 'destroy'])->name('ulasanbuku.destroy');
Route::get('editulasanbuku/{id}', [UlasanBukuController::class,'edit'])->name('ulasanbuku.edit');
Route::post('editulasanbuku/{id}', [UlasanBukuController::class,'update'])->name('ulasanbuku.update');

// Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginaksi'])->name('loginaksi');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registeraksi'])->name('registeraksi');
Route::get('logout', [LoginController::class, 'logoutaksi'])->name('logout')->middleware('auth');
