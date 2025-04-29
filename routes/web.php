<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\JocController;
use App\Http\Controllers\UsuariController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('dashboard');
})->middleware('auth', 'checkadmin');


Route::resource('jocs', JocController::class);
Route::resource('plataformas', PlataformaController::class);
Route::resource('usuaris', UsuariController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
