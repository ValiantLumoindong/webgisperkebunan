<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonasiLahanController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomepageController::class, 'index'])->name('homepage.home');
Route::get('/hasilproduksi', [App\Http\Controllers\HomepageController::class, 'hasilproduksi'])->name('homepage.hasilproduksi');
Route::get('/kebun', [App\Http\Controllers\HomepageController::class, 'kebun'])->name('homepage.kebun');
Route::get('/hasilproduksi/{id}', [App\Http\Controllers\HomepageController::class, 'detailproduksi'])->name('homepage.detailproduksi');
Route::get('/kebun/{id}', [App\Http\Controllers\HomepageController::class, 'detailkebun'])->name('homepage.detailkebun');
Route::get('/kecamatan/{id}', [App\Http\Controllers\HomepageController::class, 'detailkecamatan'])->name('homepage.detailkecamatan');
Route::get('/carikebun/cari', [App\Http\Controllers\HomepageController::class, 'carikebun'])->name('homepage.carikebun');

Route::group(['prefix' => 'admin', 'middleware' => ['level_admin','auth']], function(){
    // users route
	
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'Home'])->name('admin.home')->middleware('level_admin');
	
    Route::get('/kecamatan', [App\Http\Controllers\AdminController::class, 'tampilkecamatan'])->name('kecamatan.home')->middleware('level_admin');
    Route::get('/kecamatan/tambah', [App\Http\Controllers\AdminController::class, 'tambahkecamatan'])->name('kecamatan.tambah')->middleware('level_admin');
    Route::delete('/kecamatan/{id}', [App\Http\Controllers\AdminController::class, 'hapuskecamatan'])->name('kecamatan.hapus')->middleware('level_admin');	
    Route::post('/kecamatan/', [App\Http\Controllers\AdminController::class, 'prosestambahkecamatan'])->name('kecamatan.prosestambah')->middleware('level_admin');
    Route::get('/kecamatan/{id}', [App\Http\Controllers\AdminController::class, 'editkecamatan'])->name('kecamatan.edit')->middleware('level_admin');
    Route::put('/kecamatan/{id}', [App\Http\Controllers\AdminController::class, 'prosesupdatekecamatan'])->name('kecamatan.prosesupdate')->middleware('level_admin');	

    Route::get('/produksi', [App\Http\Controllers\AdminController::class, 'tampilproduksi'])->name('produksi.home')->middleware('level_admin');
    Route::get('/produksi/tambah', [App\Http\Controllers\AdminController::class, 'tambahproduksi'])->name('produksi.tambah')->middleware('level_admin');
    Route::delete('/produksi/{id}', [App\Http\Controllers\AdminController::class, 'hapusproduksi'])->name('produksi.hapus.admin')->middleware('level_admin');	
    Route::post('/produksi/', [App\Http\Controllers\AdminController::class, 'prosestambahproduksi'])->name('produksi.prosestambah')->middleware('level_admin');
    Route::get('/produksi/{id}', [App\Http\Controllers\AdminController::class, 'editproduksi'])->name('produksi.edit')->middleware('level_admin');
    Route::put('/produksi/{id}', [App\Http\Controllers\AdminController::class, 'prosesupdateproduksi'])->name('produksi.prosesupdate')->middleware('level_admin');	    
	
    Route::get('/jenis_kebun', [App\Http\Controllers\AdminController::class, 'tampiljenis_kebun'])->name('jenis_kebun.home')->middleware('level_admin');
    Route::get('/jenis_kebun/tambah', [App\Http\Controllers\AdminController::class, 'tambahjenis_kebun'])->name('jenis_kebun.tambah')->middleware('level_admin');
    Route::delete('/jenis_kebun/{id}', [App\Http\Controllers\AdminController::class, 'hapusjenis_kebun'])->name('jenis_kebun.hapus')->middleware('level_admin');	
    Route::post('/jenis_kebun/', [App\Http\Controllers\AdminController::class, 'prosestambahjenis_kebun'])->name('jenis_kebun.prosestambah')->middleware('level_admin');
    Route::get('/jenis_kebun/{id}', [App\Http\Controllers\AdminController::class, 'editjenis_kebun'])->name('jenis_kebun.edit')->middleware('level_admin');
    Route::put('/jenis_kebun/{id}', [App\Http\Controllers\AdminController::class, 'prosesupdatejenis_kebun'])->name('jenis_kebun.prosesupdate')->middleware('level_admin');	

    Route::get('/kebun', [App\Http\Controllers\AdminController::class, 'tampilkebun'])->name('kebun.home')->middleware('level_admin');
    Route::get('/kebun/tambah', [App\Http\Controllers\AdminController::class, 'tambahkebun'])->name('kebun.tambah')->middleware('level_admin');
    Route::delete('/kebun/{id}', [App\Http\Controllers\AdminController::class, 'hapuskebun'])->name('kebun.hapus.admin')->middleware('level_admin');	
    Route::post('/kebun/', [App\Http\Controllers\AdminController::class, 'prosestambahkebun'])->name('kebun.prosestambah')->middleware('level_admin');
    Route::get('/kebun/{id}', [App\Http\Controllers\AdminController::class, 'editkebun'])->name('kebun.edit')->middleware('level_admin');
    Route::put('/kebun/{id}', [App\Http\Controllers\AdminController::class, 'prosesupdatekebun'])->name('kebun.prosesupdate')->middleware('level_admin');

Route::get('/admin/kebun-pending', [App\Http\Controllers\AdminController::class, 'tampilKebunPending'])->name('admin.tampilKebunPending')->middleware('level_admin');
Route::post('/admin/verifikasi-kebun/{id}', [App\Http\Controllers\AdminController::class, 'verifikasiKebun'])->name('admin.verifikasiKebun')->middleware('level_admin');

Route::resource('/zonasi',ZonasiLahanController::class);
});

Route::group(['prefix' => 'pengguna', 'middleware' => ['level_pengguna','auth']], function(){
    // users route
	
	Route::get('/home', [App\Http\Controllers\PenggunaController::class, 'home'])->name('pengguna.home')->middleware('level_pengguna');
	
    Route::get('/kebun', [App\Http\Controllers\PenggunaController::class, 'tampilkebun'])->name('kebun1.home')->middleware('level_pengguna');
    Route::get('/kebun/tambah', [App\Http\Controllers\PenggunaController::class, 'tambahkebun'])->name('kebun1.tambah')->middleware('level_pengguna');
    Route::delete('/kebun/{id}', [App\Http\Controllers\AdminController::class, 'hapuskebun'])->name('kebun.hapus')->middleware('level_pengguna');	
    Route::post('/kebun/', [App\Http\Controllers\PenggunaController::class, 'prosestambahkebun'])->name('kebun1.prosestambah')->middleware('level_pengguna');
    Route::get('/kebun/{id}', [App\Http\Controllers\PenggunaController::class, 'detailkebun'])->name('pengguna.detailkebun')->middleware('level_pengguna');
}); 