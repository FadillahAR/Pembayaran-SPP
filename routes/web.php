<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


// Route Home
Route::group(['middleware' => ['auth', 'level:PETUGAS,ADMIN,SISWA']], function (){
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    });
    
    // Route Histori
    Route::get('/histori', [PembayaranController::class, 'histori'])->name('histori.index');
    Route::get('/histori/siswa', [SiswaController::class, 'histori'])->name('histori.index');
    Route::get('/pembayaran/excel', [PembayaranController::class, 'export'])->name('pembayaran.export'); 
    
}

);

Route::group(['middleware' => ['auth', 'level:ADMIN']], function (){
    
    // Route Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{k}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{k}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    
    // Route Spp
    Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
    Route::post('/spp/store', [SppController::class, 'store'])->name('spp.store');
    Route::get('/spp/{spp}', [SppController::class, 'edit'])->name('spp.edit');
    Route::put('/spp/{spp}', [SppController::class, 'update'])->name('spp.update');
    Route::delete('/spp/delete/{spp}', [SppController::class, 'destroy'])->name('spp.destroy');
    
    // Route Petugas
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/petugas/{petugas}', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::put('/petugas/{petugas}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/delete/{petugas}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
    
    // Route Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/delete/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});

Route::group(['middleware' => ['auth', 'level:PETUGAS,ADMIN']], function (){
    
    // Route Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{pembayaran}', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('/pembayaran/{pembayaran}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/delete/{pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
    Route::get('/pembayaran/show/{pembayaran}', [PembayaranController::class, 'show'])->name('pembayaran.show');
});

Route::get('pembayaranGet/{id}', [PembayaranController::class, 'getData']);



