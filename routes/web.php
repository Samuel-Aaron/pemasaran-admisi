<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EskalasiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TiketController;
use App\Http\Middleware\EnsureRole;
use App\Http\Middleware\EnsureRoleAdmin;
use App\Http\Middleware\EnsureRoleEskalasi;
use App\Http\Middleware\EnsureRoleLayanan;
use App\Http\Middleware\EnsureRoleTiket;
use Illuminate\Support\Facades\Route;

// Auth 
Route::get('/', function(){
    return redirect('/login');
});
Route::middleware([
    'guest'
])->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy']);
Route::view('/logout', 'content.logout');


// Admin
Route::middleware([
    'auth'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    // Akses Admin Eksklusif
    Route::group([
        'middleware' => [EnsureRoleAdmin::class],
    ],function () {
        Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
        Route::get('/admin/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::get('/admin/{slug:username}/edit', [RegisteredUserController::class, 'edit'])->name('edit');
        Route::patch('/admin/{slug:username}', [RegisteredUserController::class, 'update'])->name('user.update');
        Route::delete('/admin/{slug:username}', [RegisteredUserController::class, 'destroy'])->name('user.destroy');
        Route::post('/admin/register', [RegisteredUserController::class, 'store'])->name('register.store');
    });

    // Akses Layanan Eksklusif
    Route::group([
        'middleware' => [EnsureRoleLayanan::class],
    ],function () {
        Route::get('/telefon', [LayananController::class, 'telefon']);
        Route::get('/tambah-telefon', [LayananController::class, 'CreateTelefon'])->name('telefon.create');
        Route::post('/tambah-telefon', [LayananController::class, 'StoreTelefon'])->name('telefon.store');
        Route::patch('/edit-telefon/{slug}', [LayananController::class, 'UpdateTelefon'])->name('telefon.update');
        Route::get('/edit-telefon/{slug}/edit', [LayananController::class, 'EditTelefon'])->name('telefon.edit');
    });

    // Akses Tiket Eksklusif
    Route::group([
        'middleware' => [EnsureRoleTiket::class],
    ],function () {
       Route::get('/tiket', [TiketController::class, 'tiket']); 
    });

    // Akses Eskalasi Eksklusif
    Route::group([
        'middleware' => [EnsureRoleEskalasi::class],
    ],function () {
       Route::get('/eskalasi', [EskalasiController::class, 'eskalasi']); 
    });
});


