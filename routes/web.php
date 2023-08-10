<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpdController;

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




Route::middleware(['guest', 'revalidate'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'authenticate'])->name('postlogin');
});
Route::group(['middleware' => ['auth', 'ceklevel:1', 'revalidate']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/', 'App\Http\Controllers\AdminController@index');
    Route::get('admin/akun', 'App\Http\Controllers\AkunController@index');
    Route::post('admin/akun/store', 'App\Http\Controllers\AkunController@store');
    Route::post('admin/akun/update', 'App\Http\Controllers\AkunController@update');
    Route::post('admin/akun/delete', 'App\Http\Controllers\AkunController@delete');
    Route::post('admin/akun/update-password', 'App\Http\Controllers\AkunController@update_password');
    Route::get('admin/master/skpd', 'App\Http\Controllers\SkpdController@index');
    Route::post('admin/skpd/store', 'App\Http\Controllers\SkpdController@store');
    Route::post('admin/skpd/update', 'App\Http\Controllers\SkpdController@update');
    Route::post('admin/skpd/delete', 'App\Http\Controllers\SkpdController@delete');
    Route::get('admin/master/jabatan', 'App\Http\Controllers\JabatanController@index');
    Route::post('admin/jabatan/store', 'App\Http\Controllers\JabatanController@store');
    Route::post('admin/jabatan/update', 'App\Http\Controllers\JabatanController@update');
    Route::post('admin/jabatan/delete', 'App\Http\Controllers\JabatanController@delete');
    Route::get('admin/pegawai-admin', 'App\Http\Controllers\IdentitasController@index2');
    Route::post('admin/pegawai-admin/store', 'App\Http\Controllers\IdentitasController@store');
    Route::post('admin/pegawai-admin/update', 'App\Http\Controllers\IdentitasController@update');
    Route::post('admin/pegawai-admin/delete', 'App\Http\Controllers\IdentitasController@delete');
    Route::get('admin/pegawai-admin/detail/{id}', 'App\Http\Controllers\IdentitasController@detail');
    Route::post('admin/pegawai-admin/biodata', 'App\Http\Controllers\IdentitasController@biodata');
    Route::get('admin/laporan-admin', 'App\Http\Controllers\LaporanController@index2');
    Route::post('admin/pegawai-admin/rjabatan', 'App\Http\Controllers\RiwayatJabatanController@store');
    Route::post('admin/pegawai-admin/rjabatan/delete', 'App\Http\Controllers\RiwayatJabatanController@delete');
    Route::post('admin/pegawai-admin/rjabatan/update', 'App\Http\Controllers\RiwayatJabatanController@update');
    Route::post('admin/pegawai-admin/rpendidikan', 'App\Http\Controllers\RiwayatPendidikanController@store');
    Route::post('admin/pegawai-admin/rpendidikan/delete', 'App\Http\Controllers\RiwayatPendidikanController@delete');
    Route::post('admin/pegawai-admin/rpendidikan/update', 'App\Http\Controllers\RiwayatPendidikanController@update');
    Route::get('ganti-password-admin', 'App\Http\Controllers\AkunController@ganti_password');
    Route::post('update-password-admin', 'App\Http\Controllers\AkunController@update_password_user');
});

Route::group(['middleware' => ['auth', 'ceklevel:2', 'revalidate']], function () {
    Route::get('/opd', [OpdController::class, 'index'])->name('opd');
    Route::get('/', 'App\Http\Controllers\OpdController@index');
    Route::get('admin/pegawai', 'App\Http\Controllers\IdentitasController@index');
    Route::post('admin/pegawai/store', 'App\Http\Controllers\IdentitasController@store');
    Route::post('admin/pegawai/update', 'App\Http\Controllers\IdentitasController@update');
    Route::post('admin/pegawai/delete', 'App\Http\Controllers\IdentitasController@delete');
    Route::get('admin/pegawai/detail/{id}', 'App\Http\Controllers\IdentitasController@detail');
    Route::post('admin/pegawai/biodata', 'App\Http\Controllers\IdentitasController@biodata');
    Route::post('admin/akun/update-password', 'App\Http\Controllers\AkunController@update_password');
    Route::post('admin/pegawai/rjabatan', 'App\Http\Controllers\RiwayatJabatanController@store');
    Route::post('admin/pegawai/rjabatan/delete', 'App\Http\Controllers\RiwayatJabatanController@delete');
    Route::post('admin/pegawai/rjabatan/update', 'App\Http\Controllers\RiwayatJabatanController@update');
    Route::post('admin/pegawai/rpendidikan', 'App\Http\Controllers\RiwayatPendidikanController@store');
    Route::post('admin/pegawai/rpendidikan/delete', 'App\Http\Controllers\RiwayatPendidikanController@delete');
    Route::post('admin/pegawai/rpendidikan/update', 'App\Http\Controllers\RiwayatPendidikanController@update');
    Route::get('admin/laporan', 'App\Http\Controllers\LaporanController@index');
    Route::get('ganti-password', 'App\Http\Controllers\AkunController@ganti_password');
    Route::post('update-password', 'App\Http\Controllers\AkunController@update_password_user');
});

Route::group(['middleware' => ['auth', 'ceklevel:3', 'revalidate']], function () {
    Route::get('/user', [AdminController::class, 'index'])->name('user');
    Route::get('/', 'App\Http\Controllers\AdminController@index');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
