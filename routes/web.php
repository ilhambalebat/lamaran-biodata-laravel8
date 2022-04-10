<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PemintaController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\SeleksiController;
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

/* HOME */

Route::get('/', [HomeController::class, 'login'])->middleware("isLogin")->name("login");
Route::post('/login', [HomeController::class, 'authenticate'])->name("login.proses");
Route::get('/logout', [HomeController::class, 'logout'])->name("logout");
Route::get('/forbidden', [HomeController::class, 'forbidden'])->name("forbidden");
Route::get('/register', [HomeController::class, 'register'])->name("register");
Route::post('/register', [HomeController::class, 'proses_register'])->name("register.proses");

// Yang Sudah Login Admin
Route::group(["middleware" => ["isAdmin"]], function () {
    /* Dashboard Admin */
    Route::get('/pelamar', [HomeController::class, 'pelamar'])->name("pelamar");
    Route::get('/pelamar/detail/{id}', [HomeController::class, 'pelamar_detail'])->name("pelamar.detail");
});

// Yang Sudah Login Admin
Route::group(["middleware" => ["isUser"]], function () {
    Route::get('/biodata', [HomeController::class, 'biodata'])->name("biodata");
    Route::post('/biodata/update', [HomeController::class, 'biodata_update'])->name("biodata.update");
});
