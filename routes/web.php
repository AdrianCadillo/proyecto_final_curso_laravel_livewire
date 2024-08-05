<?php

use App\Http\Controllers\SocialiteGoogleController;
use App\Livewire\Categorias;
use App\Livewire\Cursos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/**
 * Crear dos rutas para categorias y cursos
 */
Route::get("/categorias",Categorias::class)->middleware("auth")->name("catgorias-page");
Route::get("/cursos",Cursos::class)->middleware("auth")->name("curso-page");

Route::get('/auth/redirect/login',[SocialiteGoogleController::class,"loginSocialite"])->name("login-socialite");
Route::get('/callback/redirect',[SocialiteGoogleController::class,"redirectCallbackSocialite"])->name("redirect.socialite");