<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TransaksiController;
use App\Models\Admin;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;

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
// Home
Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/rating', [MainController::class, 'rating'])->name('rating');
// Admin
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/pendaftaran', [AdminController::class, 'pendaftaran'])->name('pendaftaran')->middleware('auth');
Route::get('/transaksi', [AdminController::class, 'transaksi'])->name('transaksi')->middleware('auth');
Route::get('/customer', [AdminController::class, 'customer'])->name('customer')->middleware('auth');
Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan')->middleware('auth');
Route::get('/user', [AdminController::class, 'user'])->name('user')->middleware('auth');
Route::get('/tipekendaraan', [AdminController::class, 'tipekendaraan'])->name('tipekendaraan')->middleware('auth');
Route::get('/tipeservice', [AdminController::class, 'tipeservice'])->name('tipeservice')->middleware('auth');
Route::get('/kritiksaran', [AdminController::class, 'kritiksaran'])->name('kritiksaran')->middleware('auth');
// User
Route::post('/tambahuser', [AdminController::class, 'tambahuser'])->name('tambahuser')->middleware('auth');
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser'])->name('deleteuser')->middleware('auth');
Route::get('/edituser/{id}', [AdminController::class, 'edituser'])->name('edituser')->middleware('auth');
Route::post('/updateuser/{id}', [AdminController::class, 'updateuser'])->name('updateuser')->middleware('auth');
// Service
Route::post('/tambahservice', [AdminController::class, 'tambahservice'])->name('tambahservice')->middleware('auth');
Route::get('/deleteservice/{id}', [AdminController::class, 'deleteservice'])->name('deleteservice')->middleware('auth');
Route::get('/editservice/{id}', [AdminController::class, 'editservice'])->name('editservice')->middleware('auth');
Route::post('/updateservice/{id}', [AdminController::class, 'updateservice'])->name('updateservice')->middleware('auth');
// Transaksi
Route::get('/deletetransaksimobil/{id}', [TransaksiController::class, 'deletetransaksimobil'])->name('deletetransaksimobil')->middleware('auth');
// Route::get('/edittransaksimobil/{id}', [TransaksiController::class, 'edittransaksimobil'])->name('edittransaksimobil')->middleware('auth');
// Route::post('/updatetransaksimobil/{id}', [TransaksiController::class, 'updatetransaksimobil'])->name('updatetransaksimobil')->middleware('auth');
// Pendaftaran
// Mobil
Route::get('/selectservicemobil', [PendaftaranController::class, 'selectservicemobil'])->name('selectservicemobil.s');
Route::get('/selectplatnomormobil', [PendaftaranController::class, 'selectplatnomormobil'])->name('selectplatnomormobil.s');
Route::post('/prosesdaftarmobil', [PendaftaranController::class, 'prosesdaftarmobil'])->name('prosesdaftarmobil')->middleware('auth');
// Motor
Route::get('/selectservicemotor', [PendaftaranController::class, 'selectservicemotor'])->name('selectservicemotor.s');
Route::get('/selectplatnomormotor', [PendaftaranController::class, 'selectplatnomormotor'])->name('selectplatnomormotor.s');
Route::post('/prosesdaftarmotor', [PendaftaranController::class, 'prosesdaftarmotor'])->name('prosesdaftarmotor')->middleware('auth');
Route::get('/editdaftar', [PendaftaranController::class, 'editdaftar'])->name('editdaftar')->middleware('auth');
// KritikSaran
Route::get('/deleterating/{id}', [AdminController::class, 'deleterating'])->name('deleterating')->middleware('auth');
// Login
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerproses', [LoginController::class, 'registerproses'])->name('registerproses');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ChartData
Route::get('/datapelanggan', [AdminController::class, 'datapelanggan'])->name('datapelanggan');
