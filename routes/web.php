<?php

use App\Http\Controllers\Web\WebAuthController;
use App\Http\Controllers\Web\WebPostController;
use Illuminate\Support\Facades\Route;

// Redirecionar homepage para posts
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Rotas de autenticação
Route::middleware('guest')->group(function () {
    Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [WebAuthController::class, 'login'])->name('login.submit');
    
    Route::get('/register', [WebAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [WebAuthController::class, 'register'])->name('register.submit');
});

// Logout (apenas autenticados)
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rotas de posts (públicas e autenticadas)
Route::resource('posts', WebPostController::class);