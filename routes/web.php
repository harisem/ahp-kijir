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
});

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
    
    Route::get('/tanggungan', function () {
        return view('user.tanggungan');
    })->name('tanggungan');
});

Route::prefix('beasiswa')->name('beasiswa.')->group(function () {
    Route::get('/tambah', function () {
        return view('beasiswa.tambah');
    })->name('tambah');
    
    Route::get('/status', function () {
        return view('beasiswa.status');
    })->name('status');
    
    Route::get('/kelola', function () {
        return view('beasiswa.kelola');
    })->name('kelola');
    
    Route::get('/rangking', function () {
        return view('beasiswa.rangking');
    })->name('rangking');
});


Route::get('/notifikasi', function () {
    return view('notifikasi.index');
})->name('notifikasi');

Route::get('/laporan', function () {
    return view('laporan.index');
})->name('laporan');
