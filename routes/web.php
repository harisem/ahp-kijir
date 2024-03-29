<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', 'AuthController@authenticate')->name('loginProcess');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.welcome');
    })->name('welcome');

    Route::get('/logout', function () {
        Auth::logout();

        return redirect()->route('login');
    })->name('logout');

    Route::get('/dashboard', 'PengajuanController@dashboard')->name('dashboard');

    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/posting', 'NewsController@find')->name('posting');
        Route::get('/lihat',  'NewsController@lihat_berita')->name('lihat');
        Route::post('/create', 'NewsController@create')->name('news');
        Route::get('/delete/{id}', 'NewsController@delete_berita')->name('delete_berita');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/profil', 'UserController@profile')->name('profil');
        Route::get('/lihat', 'UserController@index')->name('lihat');
        Route::post('/update-my-self', 'UserController@update_profile_sendiri')->name('update_profile_sendiri');
        Route::post('/change-profile-pic', 'UserController@changeProfilePicture')->name('update_foto');
        Route::post('/lihat/{id}', 'UserController@update')->name('ubahData');
        Route::post('/lihat', 'UserController@create')->name('tambah');
        Route::get('/tanggungan', 'TanggunganController@index')->name('tanggungan');
        Route::delete('/tanggungan/{id}', 'TanggunganController@destroy')->name('hapusTanggungan');
        Route::get('/{id}', 'UserController@destroy')->name('hapusUser');
        Route::post('/tanggungan', 'TanggunganController@create')->name('tambahTanggungan');
    });

    Route::prefix('beasiswa')->name('beasiswa.')->group(function () {
        Route::get('/tambah', 'PengajuanController@index')->name('tambah');
        Route::post('/tambah', 'PengajuanController@create')->name('pengajuan');
        Route::get('/status', 'PengajuanController@statusPengajuan')->name('status');
        Route::get('/kelola', 'PengajuanController@kelolaPengajuan')->name('kelola');
        Route::get('/kelola/{id}', 'PengajuanController@show')->name('formKelola');
        Route::get('/rangking', 'PengajuanController@perangkingan')->name('rangking');
        Route::get('/rangking/{id}', 'PengajuanController@showRangking')->name('formRangking');
        Route::post('/verifikasi/{id}', 'PengajuanController@verifikasi_pengajuan')->name('verifikasi');
        Route::post('/verify/{id}', 'PengajuanController@verifikasi_manager')->name('verify');
        Route::get('/delete-pengajuan/{id}', 'PengajuanController@delete_pengajuan')->name('delete_pengajuan');
    });


    Route::get('/notifikasi', 'NotificationController@index')->name('notifikasi');

    Route::get('/laporan', 'PengajuanController@laporan')->name('laporan');
});
Route::get('/laporan/pdf/{year}', 'PengajuanController@download_laporan')->name('download_laporan');
