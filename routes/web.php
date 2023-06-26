<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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



    Route::middleware(['auth','ceklevel:admin,karyawan'])->group(function(){

        Route::get('/', [HomeController::class, 'home']);
        // Route::get('dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');
        Route::get('home', function () {
            return view('home');
        })->name('home');

        Route::get('tampil-trafic', [DashboardController::class, 'index'])->name('tampil-trafic');
    
        // Route::get('tampil-trafic', function () {
        //     return view('billing');
        // })->name('billing');
    
        // Route::get('profile', function () {
        //     return view('profile');
        // })->name('profile');
    
        Route::get('rtl', function () {
            return view('rtl');
        })->name('rtl');
    
        Route::get('user-management', function () {
            return view('laravel-examples/user-management');
        })->name('user-management');
    
        Route::get('createUser', function () {
            return view('laravel-examples/create-user');
        })->name('createUser');
    
        Route::get('tables', function () {
            return view('tables');
        })->name('tables');
    
        Route::get('virtual-reality', function () {
            return view('virtual-reality');
        })->name('virtual-reality');
    
        Route::get('static-sign-in', function () {
            return view('static-sign-in');
        })->name('sign-in');
    
        Route::get('static-sign-up', function () {
            return view('static-sign-up');
        })->name('sign-up');


        Route::get('/index-penjualan', function () {
            return view('livewire.penjualan-index');
        });
        

        // Route::get('filter-menu', [PenjualanController::class, 'index']);
        Route::get('filter-menu', [PenjualanController::class, 'tampilMenu']) -> name('filter-menu');
        Route::get('/register', [RegisterController::class, 'create']);
        Route::post('/register2', [RegisterController::class, 'store']);

        Route::get('tampil-produk', [ProdukController::class, 'index']);
        Route::get('tambah-produk', [ProdukController::class, 'create']) -> name('produk.create');
        
        Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']) -> name('produk.edit');
        Route::post('/produk/edit/{id}', [ProdukController::class, 'update']) -> name('produk.update');
        Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy']) -> name('produk.destroy');
        Route::get('transaksi', function () {return view('transaksi');});
        Route::get('laporan', function () {return view('laporan');});
    
        Route::get('tampil-karyawan', [PegawaiController::class, 'index']);
        Route::post('tampil-karyawan', [PegawaiController::class, 'store']) -> name('pegawai.store');
        Route::post('/pegawai/edit/{id}', [PegawaiController::class, 'update']) -> name('pegawai.update');
        Route::post('/pegawai/delete/{id}', [PegawaiController::class, 'destroy']) -> name('pegawai.destroy');
        Route::get('tambah-pegawai', [PegawaiController::class, 'create']) -> name('pegawai.create');
        Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']) -> name('pegawai.edit');
        Route::get('cetakPdfPegawai', [PegawaiController::class, 'pdfPegawai']) ->name('pdfPegawai');
        
        //stand//
        Route::get('tampil-stand', [StandController::class, 'index']);
        Route::post('tampil-stand', [StandController::class, 'store']) -> name('stand.store');
        Route::post('/stand/edit/{id}', [StandController::class, 'update']) -> name('stand.update');
        Route::post('/stand/delete/{id}', [StandController::class, 'destroy']) -> name('stand.destroy');
        Route::get('tambah-stand', [StandController::class, 'create']) -> name('stand.create');
        Route::get('/stand/edit/{id}', [StandController::class, 'edit']) -> name('stand.edit');
        // Route::get('cetakPdfPegawai', [StandController::class, 'pdfPegawai']) ->name('pdfPegawai');


        Route::get('tampil-presensi', [PresensiController::class, 'index']);
        Route::post('tampil-presensi', [PresensiController::class, 'store']) -> name('presensi.store');
        Route::get('tambah-presensi', [PresensiController::class, 'index_stand']) -> name('presensi.create');
        Route::get('cetakPdfPresensi', [PresensiController::class, 'pdfPresensi']) ->name('pdfPresensi');

        Route::post('/hitung', [PenjualanController::class, 'hitung'])->name('hitung');
        Route::get('tampil-penjualan', [PenjualanController::class, 'index']);
        Route::get('cetakPdfPenjualan', [PenjualanController::class, 'pdfPenjualan']) ->name('pdfPenjualan');
        Route::get('cari-penjualan', [PenjualanController::class, 'search']) ->name('cari-penjualan');

        Route::get('finish', [TotalController::class, 'calculate']) ->name('finish');
        

        Route::get('tampil-transaksi', [PenjualanController::class, 'index1']);
        Route::post('tampil-transaksi', [PenjualanController::class, 'store']) -> name('transaksi.store');
        Route::get('tambah-transaksi', [PenjualanController::class, 'create']) -> name('transaksi.create');
        
        Route::get('tampil-riwayat', [RiwayatController::class, 'index']);
        Route::get('cetakPdfRiwayat', [RiwayatController::class, 'pdfRiwayat']) ->name('pdfRiwayat');

    // Route::post('/createKaryawan', [KaryawanController::class, 'store']);
	// Route::get('/tampilKaryawan', [KaryawanController::class, 'index']);
    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
        
    });


    
    Route::group(['middleware' => 'guest'], function () {


        // Route::get('tampil-pegawai', [PegawaiController::class, 'index']);
        // Route::post('tampil-pegawai', [PegawaiController::class, 'store']) -> name('pegawai.store');
        // Route::post('/pegawai/edit/{id}', [PegawaiController::class, 'update']) -> name('pegawai.update');
        // Route::post('/pegawai/delete/{id}', [PegawaiController::class, 'destroy']) -> name('pegawai.destroy');
        // Route::get('tambah-pegawai', [PegawaiController::class, 'create']) -> name('pegawai.create');
        // Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']) -> name('pegawai.edit');
        // Route::get('cetakPdfPegawai', [PegawaiController::class, 'pdfPegawai']) ->name('pdfPegawai');
    
        Route::get('/register', [RegisterController::class, 'create']);
        Route::post('/register', [RegisterController::class, 'store']);
        Route::get('/login', [SessionsController::class, 'create']);
        Route::post('/session', [SessionsController::class, 'store']);
        Route::get('/login/forgot-password', [ResetController::class, 'create']);
        Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
        Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
        Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    
    });
    // Route::get('/login', function () {
    //     return view('session/login-session');
    // })->name('login');
    Route::get('/login', function () {
        return view('session/login-session');
    })->name('login');