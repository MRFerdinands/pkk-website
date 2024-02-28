<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
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
// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/ifest/{view}', [Controller::class, 'ifest'])->name('ifest');

// Must Login And Admin
Route::group(['middleware' => ['auth', 'access:Admin']], function () {
    // Admin
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    Route::get('/tipeservice', [AdminController::class, 'tipeservice'])->name('tipeservice');
    Route::get('/kritiksaran', [AdminController::class, 'kritiksaran'])->name('kritiksaran');
    // User
    Route::post('/tambahuser', [AdminController::class, 'tambahuser'])->name('tambahuser');
    Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser'])->name('deleteuser');
    Route::get('/edituser/{id}', [AdminController::class, 'edituser'])->name('edituser');
    Route::post('/updateuser/{id}', [AdminController::class, 'updateuser'])->name('updateuser');
    // Service
    Route::post('/tambahservice', [AdminController::class, 'tambahservice'])->name('tambahservice');
    Route::get('/deleteservice/{id}', [AdminController::class, 'deleteservice'])->name('deleteservice');
    Route::get('/editservice/{id}', [AdminController::class, 'editservice'])->name('editservice');
    Route::post('/updateservice/{id}', [AdminController::class, 'updateservice'])->name('updateservice');
    // Transaksi
    Route::get('/deletetransaksimobil/{id}', [TransaksiController::class, 'deletetransaksimobil'])->name('deletetransaksimobil');
    // KritikSaran
    Route::get('/deleterating/{id}', [AdminController::class, 'deleterating'])->name('deleterating');
    // Customer
    Route::get('/deletecustomer/{id}', [AdminController::class, 'deletecustomer'])->name('deletecustomer');
});

// Must Login
Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pendaftaran', [AdminController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/transaksi', [AdminController::class, 'transaksi'])->name('transaksi');
    Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
    // Mobil
    Route::get('/selectservicemobil', [PendaftaranController::class, 'selectservicemobil'])->name('selectservicemobil.s');
    Route::get('/selectplatnomormobil', [PendaftaranController::class, 'selectplatnomormobil'])->name('selectplatnomormobil.s');
    Route::post('/prosesdaftarmobil', [PendaftaranController::class, 'prosesdaftarmobil'])->name('prosesdaftarmobil');
    // Motor
    Route::get('/selectservicemotor', [PendaftaranController::class, 'selectservicemotor'])->name('selectservicemotor.s');
    Route::get('/selectplatnomormotor', [PendaftaranController::class, 'selectplatnomormotor'])->name('selectplatnomormotor.s');
    Route::post('/prosesdaftarmotor', [PendaftaranController::class, 'prosesdaftarmotor'])->name('prosesdaftarmotor');
});


// Unused
// Login
// Route::get('/register', [LoginController::class, 'register'])->name('register');
// Route::post('/registerproses', [LoginController::class, 'registerproses'])->name('registerproses');
// Dashboard
// Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan')->middleware('auth');
// Route::get('/edittransaksimobil/{id}', [TransaksiController::class, 'edittransaksimobil'])->name('edittransaksimobil')->middleware('auth');
// Route::post('/updatetransaksimobil/{id}', [TransaksiController::class, 'updatetransaksimobil'])->name('updatetransaksimobil')->middleware('auth');
// Pendaftaran
// Route::get('/editdaftar', [PendaftaranController::class, 'editdaftar'])->name('editdaftar')->middleware('auth');
// ChartData
// Route::get('/datapelanggan', [AdminController::class, 'datapelanggan'])->name('datapelanggan')->middleware('auth');