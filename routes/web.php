<?php

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
    
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/posting', function () {
            return view('berita.posting');
        })->name('posting');
        
        Route::get('/lihat', function () {
            return view('berita.lihat');
        })->name('lihat');
    });
    
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/profil', function () {
            return view('user.profil');
        })->name('profil');
        
        Route::get('/lihat', function () {
            return view('user.lihat');
        })->name('lihat');

        Route::get('/tanggungan', 'TanggunganController@index')->name('tanggungan');
        Route::post('/tanggungan', 'TanggunganController@create')->name('tambahTanggungan');
    });
    
    Route::prefix('beasiswa')->name('beasiswa.')->group(function () {
        Route::get('/tambah', 'PengajuanController@index')->name('tambah');
        Route::post('/tambah', 'PengajuanController@create')->name('pengajuan');
        Route::get('/status', 'PengajuanController@statusPengajuan')->name('status');
        Route::get('/kelola', 'PengajuanController@kelolaPengajuan')->name('kelola');
        Route::get('/rangking', 'PengajuanController@perangkingan')->name('rangking');
    });
    
    
    Route::get('/notifikasi', function () {
        return view('notifikasi.index');
    })->name('notifikasi');
    
    Route::get('/laporan', function () {
        return view('laporan.index');
    })->name('laporan');
});
