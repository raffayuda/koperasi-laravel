<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;
use App\Models\Anggota;
use App\Models\Employee;
use App\Models\Murid;
use App\Models\Penjualan;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use Illuminate\Support\Facades\Route;

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
    $jumlahAnggota = Anggota::count();
    $pembayaran = Pinjaman::where('status', 'lunas')->count();
    $belumLunas = Pinjaman::where('status', 'belum lunas')->count();
    $pinjaman = Pinjaman::count();
    $simpanan = Simpanan::count();
    $penjualan = Penjualan::sum('jumlah');
    return view('welcome', compact('belumLunas', 'jumlahAnggota', 'pembayaran', 'pinjaman', 'simpanan', 'penjualan'));
})->middleware('auth');

Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('auth');
Route::get('/anggota/add', [AnggotaController::class, 'viewAdd'])->middleware('auth');
Route::post('/anggota/add/proses', [AnggotaController::class, 'add'])->middleware('auth');
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'viewEdit'])->middleware('auth');
Route::post('/anggota/edit/proses/{id}', [AnggotaController::class, 'edit'])->middleware('auth');
Route::get('/delete/{id}', [AnggotaController::class, 'delete'])->middleware('auth');


Route::get('/simpanan', [SimpananController::class, 'index'])->middleware('auth');
Route::get('/simpanan/add', [SimpananController::class, 'viewAdd'])->middleware('auth');
Route::post('/simpanan/add/proses', [SimpananController::class, 'add'])->middleware('auth');
Route::get('/simpanan/add/{id}', [SimpananController::class, 'tambah'])->middleware('auth');
Route::post('/simpanan/add/proses/{id}', [SimpananController::class, 'tambahProses'])->middleware('auth');

Route::get('/simpanan/edit/{id}', [SimpananController::class, 'edit']);
Route::post('/simpanan/edit/proses/{id}', [SimpananController::class, 'update']);

Route::get('/penarikan/{id}', [SimpananController::class, 'viewPenarikan'])->middleware('auth');
Route::post('/penarikan/proses/{id}', [SimpananController::class, 'penarikan'])->middleware('auth');
Route::get('/hapus/{id}', [SimpananController::class, 'hapus'])->middleware('auth');

Route::get('/pinjaman', [PinjamanController::class, 'index'])->middleware('auth');
Route::get('/pinjaman/add', [PinjamanController::class, 'viewAdd'])->middleware('auth');
Route::post('/pinjaman/add/proses', [PinjamanController::class, 'add'])->middleware('auth');
Route::get('/pinjaman/delete/{id}', [PinjamanController::class, 'delete'])->middleware('auth');
Route::get('/pinjaman/{id}', [PinjamanController::class, 'viewPinjaman'])->middleware('auth');
Route::post('/pinjaman/proses/{id}', [PinjamanController::class, 'pinjaman'])->middleware('auth');


Route::get('/bayar', [BayarController::class, 'index'])->middleware('auth');
Route::get('/bayar/{id}', [BayarController::class, 'viewBayar'])->middleware('auth');
Route::post('/bayar/proses/{id}', [BayarController::class, 'bayar'])->middleware('auth');
Route::get('/bayar/delete/{id}', [BayarController::class, 'delete'])->middleware('auth');


Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('auth');
Route::get('/penjualan/add', [PenjualanController::class, 'viewAdd'])->middleware('auth');
Route::post('/penjualan/add/proses', [PenjualanController::class, 'add'])->middleware('auth');
Route::get('/penjualan/{id}', [PenjualanController::class, 'viewEdit'])->middleware('auth');
Route::post('/penjualan/proses/{id}', [PenjualanController::class, 'edit'])->middleware('auth');
Route::get('/penjualan/delete/{id}', [PenjualanController::class, 'delete'])->middleware('auth');


Route::get('/laporanAnggota', [LaporanController::class, 'anggota'])->middleware('auth');
Route::get('/laporanPenjualan', [LaporanController::class, 'penjualan'])->middleware('auth');
// Route::get('/laporanPbyr', [LaporanController::class, 'pembayaran'])->middleware('auth');
Route::get('/laporanPem', [LaporanController::class, 'pembayaran'])->middleware('auth');
Route::get('/laporanSim', [LaporanController::class, 'simpanan'])->middleware('auth');
Route::get('/laporanPin', [LaporanController::class, 'pinjaman'])->middleware('auth');
Route::get('/detailPem/{anggota_id}', [LaporanController::class, 'detailPem'])->middleware('auth');
Route::get('/detailSim/{anggota_id}', [LaporanController::class, 'detailSim'])->middleware('auth');
Route::get('/detailPin/{anggota_id}', [LaporanController::class, 'detailPin'])->middleware('auth');


Route::get('/all_laporan', [LaporanController::class, 'all'])->middleware('auth');
Route::get('/detail/{id}', [LaporanController::class, 'detailAll'])->middleware('auth');


Route::get('/filterLaporanSimpanan', [LaporanController::class, 'filterSimpanan'])->middleware('auth');
Route::get('/filterLaporanAnggota', [LaporanController::class, 'filterAnggota'])->middleware('auth');
Route::get('/filterLaporanPinjaman/{anggota_id}', [LaporanController::class, 'filterPinjaman'])->middleware('auth');
Route::get('/filterLaporanPenjualan', [LaporanController::class, 'filterPenjualan'])->middleware('auth');
Route::get('/filterLaporanPembayaran', [LaporanController::class, 'filterPembayaran'])->middleware('auth');



Route::get('/profile', [UserController::class, 'index'])->middleware('auth');
Route::post('/updateProfile', [UserController::class, 'updateProfile'])->middleware('auth');




Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/laporanKop', [LaporanController::class, 'laporanKop']);
Route::get('/laporanDetail/{anggota_id}', [LaporanController::class, 'laporanDetail']);



Route::post('/laporan/view-pdf/{anggota_id}', [LaporanController::class, 'viewPDF'])->name('view-pdf');
Route::post('/laporan/download-pdf/{anggota_id}', [LaporanController::class, 'downloadPDF'])->name('download-pdf');
Route::post('/laporan/download-excel/{anggota_id}', [LaporanController::class, 'downloadExcel'])->name('download-excel');
