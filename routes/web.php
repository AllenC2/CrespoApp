<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/reportes', [AuthController::class, 'storeReport'])->name('reportes.store');
    Route::get('/arbol/{id}', [AuthController::class, 'showArbolProfile'])->name('arbol.profile');
    Route::get('/perfil', [AuthController::class, 'editProfile'])->name('perfil.edit');
    Route::post('/perfil', [AuthController::class, 'updateProfile'])->name('perfil.update');
    Route::post('/perfil/avatar', [AuthController::class, 'updateAvatar'])->name('perfil.update-avatar');
    Route::get('/perfil/contrasena', [AuthController::class, 'editPassword'])->name('password.edit');
    Route::post('/perfil/contrasena', [AuthController::class, 'updatePassword'])->name('password.update');
});
