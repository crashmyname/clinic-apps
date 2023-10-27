<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HwController;
use App\Http\Controllers\McuController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ExcessController;
use App\Http\Controllers\StockController;

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
    return view('auth/index');
});

    Route::post('/login', [UserController::class, 'onLogin'])->name('OnLogin');
    Route::get('/register', [UserController::class, 'register'])->name('form_tambah');
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
    
Route::middleware(['auth'])->group(function () {
    //Data User
    Route::post('/regist', [UserController::class, 'regist'])->name('regist');
    Route::get('/datauser', [UserController::class, 'dataUser'])->name('data-user');
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'LogOut'])->name('logout');
    Route::put('/edituser/{id}', [UserController::class, 'editUser'])->name('update-user');

    //Data Obat
    Route::get('/dataobat', [ObatController::class, 'dataObat'])->name('data-obat');
    Route::post('/inputobat',[ObatController::class, 'inputObat'])->name('input-obat');

    //Data Stock
    Route::post('/inputstock',[ObatController::class, 'stockObat'])->name('input-stock');

    //Data Alat
    Route::get('/dataalat', [AlatController::class, 'dataAlat'])->name('data-alat');
    Route::post('/addalat', [AlatController::class, 'addAlat'])->name('add-alat');

    //API
    Route::post('/dataapinama', [ApiController::class, 'DataApiNama'])->name('DataApi');
    Route::post('/dataapisect', [ApiController::class, 'DataApiSect'])->name('DataApiSection');

    //Data HW
    Route::get('/datahw', [HwController::class, 'dataHw'])->name('data-hw');

    //Data Pemakaian Obat
    Route::get('/formaddpemakaianobat', [PemakaianController::class, 'formPemakaian'])->name('form-pemakaian');
    Route::get('/formaddpemakaianobatmanual', [PemakaianController::class, 'formPemakaianManual'])->name('form-pemakaian-manual');
    Route::get('/pemakaianobat', [PemakaianController::class, 'showdataObat'])->name('pemakaian-obat');
    Route::get('/editpemakaianobat/{id_pemakaian}', [PemakaianController::class, 'editPemakaian'])->name('edit-pemakaian');
    Route::get('/peminjaman', [PemakaianController::class, 'peminjamanAlat'])->name('peminjaman-alat');
    Route::get('/report-weekly-pemakaian', [PemakaianController::class, 'reportWpemakaian'])->name('reportweeklyp');
    Route::get('/report-monthly-pemakaian', [PemakaianController::class, 'reportMpemakaian'])->name('reportmonthlyp');
    Route::get('/report-weekly-istirahat', [PemakaianController::class, 'reportWistirahat'])->name('reportweeklyi');
    Route::get('/report-monthly-istirahat', [PemakaianController::class, 'reportMistirahat'])->name('reportmonthlyi');
    Route::post('/import-excel', [PemakaianController::class,'import'])->name('import-excel');

    //Data Excess
    Route::get('/excess', [ExcessController::class, 'excessObat'])->name('pemakaian-lebih');
    Route::post('/import-excess', [ExcessController::class, 'importExcess'])->name('import-excess');

    //Data Karyawan Istirahat
    Route::get('/rest', [RestController::class, 'showdataRest'])->name('istirahat');
    Route::post('/add-rest', [RestController::class, 'addRest'])->name('input-rest');

    //Data MCU
    Route::get('/mcu', [McuController::class, 'showdataMcu'])->name('data-mcu');
    Route::get('/rekammedis', [McuController::class, 'showdataRM'])->name('data-rm');
    Route::post('/import-mcu', [McuController::class, 'importMcu'])->name('import-mcu');
});